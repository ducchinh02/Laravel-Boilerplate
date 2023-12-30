<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $title = 'Home';
        $header = [
            'imageUrl' => 'https://startbootstrap.github.io/startbootstrap-clean-blog/assets/img/home-bg.jpg',
            'title' => 'Clean Blog',
            'desc' => 'A Blog Theme by Start Bootstrap'
        ];
        return view('blog.home', compact('title', 'header'));
    }
    public function about()
    {
        $title = 'About';
        $header = [
            'imageUrl' => 'https://startbootstrap.github.io/startbootstrap-clean-blog/assets/img/about-bg.jpg',
            'title' => 'About Me',
            'desc' => 'This is what I do.'
        ];
        return view('blog.about', compact('title', 'header'));
    }
}
