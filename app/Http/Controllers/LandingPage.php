<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Page;

class LandingPage extends Controller
{
    public function index()
    {
        $pages = Page::where('published', 1)->get();
        return view('welcome', [
            'pages' => $pages
        ]);
    }
}
