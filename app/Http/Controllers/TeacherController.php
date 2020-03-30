<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use File;
use Exception;

class TeacherController extends Controller
{
    public function teacher()
    {
        $teacher = Teacher::all();

        return view('teacher.index', [
            'teacher' => $teacher,
            'title' => 'Teacher|index'

        ]);
    }

    public function new()
    {
        return view('teacher.create');
    }

    public function store(Request $request)
    {
        //validation form required
        $request->validate([
            'name' => 'required',
            'subject' => 'required',
            'img' => 'required|file|image|mimes:jpeg,jpg,png|max:6048'
        ]);

        //pharse/put file to variable 
        $file = $request->file('img');

        //put name of image 
        $name_img = time() . $request->file('img')->getClientOriginalName();

        //set folder location
        $location = 'teachers';

        try {

            //add teacher data to database
            Teacher::create([
                'name' => $request->name,
                'subject' => $request->subject,
                'image' => $name_img
            ]);

            //move file
            $file->move($location, $name_img);
        } catch (\Exception $ex) {
            echo ("Input Failed ! Please Try again");
            return redirect(route('teacher.index'));
        }
        return redirect(route('teacher.index'));
    }

    public function put($id)
    {
        //put all data from db to view update
        $teacher = Teacher::find($id);
        return view('teacher.edit', ['teacher' => $teacher]);
    }

    public function update(Request $request, $id)
    {
        //validate data on textfield
        $request->validate([
            'name' => 'required',
            'subject' => 'required',
            'img' => 'file|image|mimes:jpeg,jpg,png|max:6048'
        ]);

        try {
            $teacher = Teacher::find($id);
            $teacher->name = $request->name;
            $teacher->subject = $request->subject;

            //pharse/put file to variable 
            $file = $request->file('img');
            if ($file) {
                //put name of image 
                $name_img = time() . $request->file('img')->getClientOriginalName();

                // set img to database
                $teacher->image = $name_img;

                //set folder location
                $location = 'teachers';

                //get image teacher by id
                $image = Teacher::where('id', $id)->first();

                //Delete image at image (teachers) dir.
                file::delete('teachers/' . $image->image);

                //move file
                $file->move($location, $name_img);
            }
            $teacher->save();
            return redirect(route('teacher.index'))->with('success', 'Berhasil Update Data');
        } catch (\Exception $ex) {
            echo ("Update Data Failed ! Please Try Again");
            return redirect(route('teacher.edit', $request->id));
        }
    }

    public function delete($id)
    {
        //delete image 
        $image = Teacher::where('id', $id)->first();
        file::delete('teachers/' . $image->image);

        //delete data 
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        return redirect(route('teacher.index'))->with('success', 'Data Berhasil Dihapus');
    }
}
