<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BlogSignInRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Posts;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    private $POST_MODEL;
    public function __construct()
    {
        $this->POST_MODEL = new Posts();
    }
    // VIEWS
    public function index()
    {
        $title = 'Home';
        $header = [
            'imageUrl' => 'https://startbootstrap.github.io/startbootstrap-clean-blog/assets/img/home-bg.jpg',
            'title' => 'Clean Blog',
            'desc' => 'A Blog Theme by Start Bootstrap'
        ];
        $posts = $this->POST_MODEL->getAllPosts();

        return view('blog.home', compact('title', 'header', 'posts'));
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
    public function detail(string $slug, string $id)
    {
        $posts = $this->POST_MODEL->getPostDetail(
            $slug,
            $id
        );
        $title = $posts->title;
        $header = [
            'imageUrl' => 'https://startbootstrap.github.io/startbootstrap-clean-blog/assets/img/about-bg.jpg',
            'title' =>  $title,
            'desc' => $posts->author
        ];
        return view('blog.detail', compact('title', 'header', 'posts'));
    }
    public function add()
    {
        $title = 'Add new post';
        $header = [
            'imageUrl' => 'https://startbootstrap.github.io/startbootstrap-clean-blog/assets/img/about-bg.jpg',
            'title' => 'Add new post',
            'desc' => 'Post everything you like'
        ];
        return view('blog.actions.add', compact('title', 'header'));
    }
    public function delete(string $slug, string $id)
    {
        if (!empty($slug) && !empty($id)) {
            $this->POST_MODEL->deletePost(
                $slug,
                $id
            );
        }
        return redirect()->route('blog.home');
    }
    public function edit(Request $request, string $slug, string $id)
    {
        if (!empty($slug) && !empty($id)) {
            session()->put(['post_slug' => $slug, 'post_id' => $id]);
            $post = $this->POST_MODEL->getPostDetail(
                $slug,
                $id
            );
            $title = 'Edit post';
            $header = [
                'imageUrl' => 'https://startbootstrap.github.io/startbootstrap-clean-blog/assets/img/about-bg.jpg',
                'title' => 'Edit post',
                'desc' => 'Edit your post'
            ];
            return view('blog.actions.edit', compact('title', 'header', 'post'));
        } else {
            return redirect()->route('blog.home');
        }
    }
    // ACTIONS
    public function store(Request $request)
    {
        $request->validate([
            'post_title' => 'required|min:18',
            'post_content' => 'required|max:600',
        ]);
        $newPost = [
            $request->post_title,
            $request->post_content,
            Str::of($request->post_title)->slug('-'),
            1,
            date('Y-m-d H:i:s')
        ];
        $this->POST_MODEL->addNewPost($newPost);
        return redirect()->route('blog.home');
    }
    public function updatePost(Request $request)
    {
        $request->validate([
            'post_title' => 'required|min:18',
            'post_content' => 'required|max:600',
        ]);
        $updatePost = [
            $request->post_title,
            $request->post_content,
            Str::of($request->post_title)->slug('-'),
        ];
        $this->POST_MODEL->updatePost(session('post_slug'), session('post_id'), $updatePost);
        return redirect()->route('blog.home');
    }
    // AUTH
    public function signIn()
    {
        $title = 'Sign In';
        return view('blog.auth.signin', compact('title'));
    }
    public function register()
    {
        $title = 'Register';
        return view('blog.auth.register', compact('title'));
    }
    public function handleSignIn(BlogSignInRequest $request)
    {
    }
    public function handleRegister(Request $request)
    {
        $title = 'Register';
        return view('blog.auth.register', compact('title'));
    }
}
