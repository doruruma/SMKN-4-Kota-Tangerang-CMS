<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Str, Redirect, Exception, File;

use App\Media;

class GalleryController extends Controller
{
    public function index()
    {
        // get all media
        $media = Media::all();
        // return view gallery
        return view('gallery/index', [
            'media' => $media,
        ]);
    }

    public function storeFile(Request $req)
    {
        $validator = Validator::make($req->all, [
            'image' => 'required|mimes:jpg,jpeg,png,mp4'
        ]);
        // check validator isn't failed
        if ( !$validator->fails() ) {
            // get image to variable file
            $file = $req->file('image');
            // get extension file
            $extFile = strtolower($file->getClientOriginalExtension());
            // check file picture or video
            if ( \in_array( $extFile, ['jpg','jpeg','png'] ) ) {
                // file is picture
                $validator = $this->_fileIsPicture($file, $validator);
                $mb = 2097152;
            } else if ( \in_array( $extFile, ['mp4'] ) ) {
                // file is video
                $validator = $this->_fileIsVideo($file, $validator);
            }
        }
        // redirect back
        return Redirect::back()->withErrors($validator)->withInput();
    }

    private function _fileIsImage($file, $validator)
    {
        return $validator;
    }

    public function storeImage(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:2048'
        ]);

        if ( !$validator->fails() ) {

            $file = $req->file('image');
            // setting
            $destinationPath = public_path() . '/img/media/';
            $nameFile = time() . '_' . $file->getClientOriginalName();
            $nameFileWithoutExtention = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

            // $extFile = strtolower($file->getClientOriginalExtension()); // extension to lowercase
            // $forSlug = Str::slug($nameFile) . '.' . $extFile; // mix name slug & extensiony

            // store data image to media
            try {
                // store to database media
                Media::create([
                    'name' => $nameFile,
                    'type' => $file->getClientOriginalExtension(),
                    'slug' => Str::slug($nameFile),
                ]);
                // move file to destination path
                $file->move($destinationPath, $nameFile);
            } catch( \Exception $e ) {
                // adding error to validator error message
                $validator->errors()->add('image', $e->getMessage());
                // $this->_findAndRemoveFile($forSlug);
            }
        }
        // redirect back
        return Redirect::back()->withErrors($validator)->withInput();
    }

    public function deleteFile(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'image' => 'required'
        ]);

        if ( !$validator->fails() ) {
            $file = Media::where('slug', $req->image)->first();
            $filePath =  'img/media/' . $file->name;

            try {
                Media::find($file->id)->delete();
                $this->_findAndRemoveFile($filePath);
            } catch ( \Exception $e ) {

                // $this->_findAndRemoveFile($filePath);
            }
        }

        return Redirect::back()->withErrors($validator)->withInput();
    }

    // find file and remove it
    private function _findAndRemoveFile($filepath)
    {
        // find file
        if ( \File::exists($filepath) ) {
            // remove file
            return \File::delete($filepath);
        }
    }

}
