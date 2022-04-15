<?php

class PagesController
{

    public function home()
    {
        $posts = App::get('database')->selectAll('posts');

        return view('index', [
            'posts' => $posts
        ]);
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function login()
    {
        return view('login');
    }

    public function profile()
    {
        $users = App::get('database')->selectAll('users');

        return view('profile', [
            'users' => $users
        ]);

    }
}