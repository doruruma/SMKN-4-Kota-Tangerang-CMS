<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function get()
    {
        $pages = Page::get();

        return view('pages.index', [
            'pages' => $pages
        ]);
    }

    public function new()
    {
        return view('pages.create');
    }

    public function edit($id)
    {
        $page = Page::find($id);

        return view('pages.edit', [
            'page' => $page
        ]);
    }

    public function save(Request $req)
    {
        $validated = Validator::make($req->all(), [
            'title' => 'required|min:3|max:191',
            'content' => 'required|min:5',
            'published' => 'required|in:0,1'
        ]);

        if($validated->fails())
        {
            // if failed, response to create view with error
            return response()->json([
                'message' => 'failed',
                $validated->errors()
            ], 422);
        }

        try {
            $page = new Page;
            $page->title = $req->title;
            $page->content = $req->content;
            $page->published = $req->published;
            $page->user_id = $req->user_id;
            $page->slug = Str::slug($req->title);
            $page->save();
        } catch(\Exception $e) {
            // if failed, response to create view with error
            return response()->json([
                'message' => 'failed',
                'errors' => [
                    'internal_server' => $e->getMessage()
                ]
            ], 500);
        }

        // response if success
        return response()->json([
            'message' => 'success'
        ], 200);
    }

    public function put($id, Request $req)
    {
        $validated = Validator::make([
            'id' => $id,
            'title' => $req->title,
            'content' => $req->content,
            'published' => $req->published,
        ], [
            'id' => 'required|exists:pages,id',
            'title' => 'required|min:3|max:191',
            'content' => 'required|min:5',
            'published' => 'required|in:0,1'
        ]);

        if ($validated->fails()) {
            // if failed, redirect to create view with error
            return response()->json([
                'message' => 'failed',
                $validated->errors()
            ], 422);
        }

        try {
            $page = Page::find($id);
            $page->title = $req->title;
            $page->content = $req->content;
            $page->published = $req->published;
            $page->user_id = $req->user_id;
            $page->slug = Str::slug($req->title);
            $page->save();
        } catch(\Exception $e) {
            // if failed, response to create view with error
            return response()->json([
                'message' => 'failed',
                'errors' => [
                    'internal_server' => $e->getMessage()
                ]
            ], 500);
        }

        // response if success
        return response()->json([
            'message' => 'success'
        ], 200);
    }

    public function delete($id)
    {
        try {
            $page = Page::findOrFail($id);
            $page->delete();
        } catch(\Exception $e) {
            // if failed, response to create view with error
            return redirect("/admin/pages");
        }

        // response if success
        return redirect("/admin/pages");
    }
}
