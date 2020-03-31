<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exception;
use App\Category;
use App\Major;
use App\Official;
use App\Page;
use App\Post;

class LandingPage extends Controller
{
    public function index()
    {
        $pages = Page::where('published', 1)->get();
        $official = Official::get();

        $news = Post::where('published', 1)->where('category_id', 1)->orderBy('created_at', 'desc')->limit(3)->get();
        $events = Post::where('published', 1)->where('category_id', 4)->orderBy('created_at', 'desc')->limit(4)->get();
        $prestasi = Post::where('published', 1)->where('category_id', 3)->orderBy('created_at', 'desc')->limit(3)->get();

        return view('landing_sections.home', [
            'pages' => $pages,
            'news' => $news,
            'events' => $events,
            'prestasi' => $prestasi,
            'officials' => $official,
            'categories' => Category::get(),
            'majors' => Major::get()
        ]);
    }

    public function page($page_slug)
    {
        $pages = Page::where('published', 1)->get();
        $page = Page::where('slug', $page_slug)->where('published', 1)->get();
        if (count($page) != 1) {
            return abort(404);
        } else {
            return view('page', [
                'page' => $page[0],
                'pages' => $pages,
                'categories' => Category::get()
            ]);
        }
    }

    public function post($post_category, $post_slug)
    {
        $pages = Page::where('published', 1)->get();

        $post = Post::where('slug', $post_slug)->get()->first();

        if(!$post) {
            return abort(404);
        }

        $category = $post->category;

        return view('landing_sections.post', [
            'post' => $post,
            'pages' => $pages,
            'categories' => Category::get(),
            'category' => $category
        ]);
    }

    public function news()
    {
        //Latest articles
        $single = Post::where('published', 1)->orderBy('created_at', 'desc')->skip(0)->take(1)->get();
        $latest = Post::where('published', 1)->orderBy('created_at', 'desc')->skip(1)->take(3)->get();
        //big view
        $post = Post::where('published', 1)->where('category_id', 1)->orderBy('created_at', 'desc')->get();
        $pages = Page::where('published', 1)->get();

        
        return view('landing_sections.landing_post',[
            'post' => $post,
            'pages' => $pages,
            'single' => $single,
            'latest' => $latest,
            'title' => 'RECENTLY NEWS',
            'categories' => Category::get(),
            'majors' => Major::get()

        ]);
    }

    public function articles()
    {
        //Latest articles
        $single = Post::where('published', 1)->orderBy('created_at', 'desc')->skip(0)->take(1)->get();
        $latest = Post::where('published', 1)->orderBy('created_at', 'desc')->skip(1)->take(3)->get();
        //big view
        $post = Post::where('published', 1)->where('category_id', 2)->orderBy('created_at', 'desc')->get();
        $pages = Page::where('published', 1)->get();

        
        return view('landing_sections.landing_post',[
            'post' => $post,
            'pages' => $pages,
            'single' => $single,
            'latest' => $latest,
            'title' => 'RECENTLY ARTICLES',
            'categories' => Category::get(),
            'majors' => Major::get()

        ]);
    }

    public function prestasi()
    {
        //Latest articles
        $single = Post::where('published', 1)->orderBy('created_at', 'desc')->skip(0)->take(1)->get();
        $latest = Post::where('published', 1)->orderBy('created_at', 'desc')->skip(1)->take(3)->get();

        //big view
        $post = Post::where('published', 1)->where('category_id', 3)->orderBy('created_at', 'desc')->get();
        $pages = Page::where('published', 1)->get();

        
        return view('landing_sections.landing_post',[
            'post' => $post,
            'pages' => $pages,
            'single' => $single,
            'latest' => $latest,
            'title' => 'RECENTLY PRESTASI',
            'categories' => Category::get(),
            'majors' => Major::get()

        ]);
    }

    public function event()
    {
        

        //Latest articles
        $single = Post::where('published', 1)->orderBy('created_at', 'desc')->skip(0)->take(1)->get();
        $latest = Post::where('published', 1)->orderBy('created_at', 'desc')->skip(1)->take(3)->get();
        //big view
        $post = Post::where('published', 1)->where('category_id', 4)->orderBy('created_at', 'desc')->get();
        $pages = Page::where('published', 1)->get();

        
        return view('landing_sections.landing_post',[
            'post' => $post,
            'pages' => $pages,
            'single' => $single,
            'latest' => $latest,
            'title' => 'RECENTLY EVENT',
            'categories' => Category::get(),
            'majors' => Major::get()

        ]);  
        
    }

    
}
