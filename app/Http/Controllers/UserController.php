<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $title = 'Users';
        $header = [
            'imageUrl' => 'https://startbootstrap.github.io/startbootstrap-clean-blog/assets/img/home-bg.jpg',
            'title' => 'Blog users',
            'desc' => ''
        ];
        return view('blog.users.list', ['title' => $title, 'header' => $header]);
    }
}
