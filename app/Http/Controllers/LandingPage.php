<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Major;
use App\Page;
use App\Post;

class LandingPage extends Controller
{
    public function index()
    {
        $pages = Page::where('published', 1)->get();

        $news = Post::where('published', 1)->where('category_id', 1)->orderBy('created_at', 'desc')->limit(3)->get();
        $events = Post::where('published', 1)->where('category_id', 4)->orderBy('created_at', 'desc')->limit(4)->get();

        return view('landing_sections.home', [
            'pages' => $pages,
            'news' => $news,
            'events' => $events,
            'categories' => Category::get(),
            'majors' => Major::get()
        ]);
    }

    public function page($page_slug)
    {
        $pages = Page::where('published', 1)->get();
        $page = Page::where('slug', $page_slug)->where('published', 1)->get();
        if(count($page) != 1) {
            return abort(404);
        } else {
            return view('page', [
                'page' => $page[0],
                'pages' => $pages,
                'categories' => Category::get()
            ]);
        }
    }
}
