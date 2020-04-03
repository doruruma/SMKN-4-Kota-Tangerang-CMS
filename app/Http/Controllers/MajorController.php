<?php

namespace App\Http\Controllers;

use App\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $major = Major::all();
        return view('major.index', compact('major'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('major.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png',
            'description' => 'required'
        ]);

        if($request->hasFile('image'))
        {
            $file = $request->file('image');

            $fileName = Str::slug($request->name). '.' . $file->getClientOriginalExtension();

            $major = Major::create([
                'name' => $request->name,
                'image' => $fileName,
                'description' => $request->description
            ]);

            $file->move(public_path('majors'), $fileName);
            // $file->storeAs('public/assets/majors', $fileName);


            return redirect(route('major.index'))->with('success', 'data berhasil di tambahkan');
        }
    }

    /**
     * Display the specified resource
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $major = Major::find($id);
        return view('major.edit', compact('major'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png',
            'description' => 'required'
        ]);

        if($request->hasFile('image'))
        {
            $file = $request->file('image');

            $fileName = Str::slug($request->name). '.' . $file->getClientOriginalExtension();

            $major = Major::findOrFail($id);
            unlink(public_path('majors/'. $major->image));
            $major = Major::whereId($id)->update([
                'name' => $request->name,
                'image' => $fileName,
                'description' => $request->description
            ]);

            $file->move(public_path('majors'), $fileName);
            // $file->storeAs('public/assets/majors', $fileName);


            return redirect(route('major.index'))->with('success', 'data berhasil di edit');
        }
        else{
            Major::whereId($id)->update([
                'name' => $request->name,
                'description' => $request->description
            ]);
            return redirect(route('major.index'))->with('success', 'data berhasil di edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $major = Major::findOrFail($id);
        $major->delete();

        return redirect(route('major.index'))->with('success', 'Data Berhasil Di Hapus');
    }
}
