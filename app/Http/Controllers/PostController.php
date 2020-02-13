<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PostController extends Controller
{
    private $user;
    public function __construct()
    {
        $this->user = User::find(2);
    }

    // check credential
    private function checkCredential($userId, $fn)
    {
        if($userId != $this->user->id) {
            return $fn();
        }
    }

    public function get()
    {
        $posts = Post::get();

        return view('posts.ViewPosts', [
            'posts' => $posts
        ]);
    }

    // Update post preview
    public function update($id)
    {
        $post = Post::findOrFail($id);

        // Check credential user
        if($this->user->id != $post->user_id) {
            return redirect('/admin/posts');
        }

        return view('posts.EditPost', [
            'post' => $post,
            'categories' => Category::get()
        ]);
    }

    // get categories
    public function getCategories()
    {
        return response()->json(
            Category::get()
        );
    }

    // upload post
    public function save(Request $req)
    {
        $validated = Validator::make($req->all(), [
            'title' => 'required|min:3|max:191',
            'content' => 'required|min:5',
            'category_id' => 'required|exists:categories,id',
            'published' => 'required|in:0,1'
        ]);

        if($validated->fails()) {
            // if failed, response to create view with error
            return response()->json([
                'message' => 'failed',
                $validated->errors()
            ], 422);
        }

        try {
            $post = new Post;
            $post->user_id = $this->user->id;
            $post->title = $req->title;
            $post->category_id = $req->category_id;
            $post->content = $req->content;
            $post->slug = Str::slug($req->title);
            $post->published = $req->published;
            $post->save();
        } catch (\Exception $e) {
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

    // put post
    public function put($id, Request $req)
    {
        $validated = Validator::make([
            'id' => $id,
            'title' => $req->title,
            'content' => $req->content,
            'category_id' => $req->category_id,
            'published' => $req->published,
        ], [
            'id' => 'required|exists:posts,id',
            'title' => 'required|min:3|max:191',
            'content' => 'required|min:5',
            'category_id' => 'required|exists:categories,id',
            'published' => 'required|in:0,1'
        ]);

        if($validated->fails()) {
            // if failed, redirect to create view with error
            return response()->json([
                'message' => 'failed',
                $validated->errors()
            ], 422);
        }

        try {
            $post = Post::find($id);

            // Check credential user
            $this->checkCredential($post->user_id, function() {
                return new \Exception("Unauthorized user");
            });

            $post->user_id = $this->user->id;
            $post->title = $req->title;
            $post->content = $req->content;
            $post->category_id = $req->category_id;
            $post->slug = Str::slug($req->title);
            $post->published = $req->published;
            $post->save();
        } catch (\Exception $e) {
            // Internal error, redirect to create view with error
            dd($e->getMessage());
            return response()->json([
                'message' => 'failed',
                'errors' => [
                    'internal_server' => $e->getMessage()
                ]
            ], 500);
        }

        // redirect if success
        return response()->json([
            'message' => 'success'
        ], 200);
    }

    // delete post
    public function delete($id)
    {
        $validated = Validator::make([
            'id' => $id
        ], [
            'id' => 'required|exists:posts,id',
        ]);

        if($validated->fails()) {
            // if failed, redirect to create view with error
            return redirect('/admin/posts');
        }

        try {
            $post = Post::find($id);

            // Check credential user
            $this->checkCredential($post->user_id, function() {
                return new \Exception("Unauthorized user");
            });

            $post->delete();
        } catch (\Exception $e) {
            // Internal error, redirect to create view with error
            return redirect('/admin/posts');
        }

        // redirect if success
        return redirect('/admin/posts');
    }
}
