<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Official;
use App\Position;
use File;
use Exception;

class OfficialController extends Controller
{
    public function index()
    {
        $official = Official::all();
        return view('official/index', compact('official'));
    }

    public function position_data()
    {
        $position = Position::all();
        return view('official/create',['position' => $position]);
    }

    public function store(Request $request)
    {

        //====================================================
        //ADD VALIDATION , I GOT SOME PROBLEM WHEN I CREATE IT
        //DONT FORGET TO DELETE THIS MESSAGE
        //====================================================

        //pharse/put file to variable
        $file = $request->file('img');

        //put name of image
        $name_img = time().$request->file('img')->getClientOriginalName();

        //set folder location
        $location = 'officials';

       //dd($request->position,$request->nama,$name_img);

        try{

            //add teacher data to database
            Official::create([
                'name' => $request->nama,
                'position_id' => $request->position,
                'image' => $name_img
            ]);

            //move file
            $file->move($location,$name_img);

            return redirect(route('official.index'));

        }
        catch(\Exception $ex)
        {
            return redirect(route('official.create'));
        }

    }

    public function put($id)
    {
        //put all data from db to view update
        $official = Official::find($id);
        $position = Position::all();
        return view('official/edit',['official' => $official, 'position' => $position]);


    }

    public function update(Request $request, $id)
    {
        //====================================================
       //ADD VALIDATION , I GOT SOME PROBLEM WHEN I CREATE IT
       //DONT FORGET TO DELETE THIS MESSAGE
        //====================================================

        //pharse/put file to variable
        $file = $request->file('img');

        $image = Official::where('id',$id)->first();

        //put name of image
        if($request->has('img')) {
            $name_img = time().$request->file('img')->getClientOriginalName();
        } else {
            $name_img = $image->image;
        }

        //set folder location
        $location = 'officials';

        //get image teacher by id

        try {

            $official = Official::find($id);
            $official->name = $request->nama;
            $official->position_id = $request->position;
            $official->image = $name_img;
            $official->save();

            if($request->has('img')) {
                //Delete image at image (teachers) dir.
                file::delete('officials/'.$image->image);

                //move file
                $file->move($location,$name_img);
            }


           return redirect(route('official.index'));

        }
        catch (Exception $ex)
        {
            report($ex);
            return redirect(route('official.put'), $request->id);
        }

    }

    public function delete($id)
    {
        //delete image
        $image = Official::where('id',$id)->first();
        file::delete('officials/'.$image->image);

        //delete data
        $official = Official::find($id);
        $official->delete();

        return redirect(route('official.index'));

    }
}
