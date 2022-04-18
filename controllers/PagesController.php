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

    public function sign_in()
    {
        var_dump($_POST);

        $users = App::get('database')->selectAll('users');

        return view('login', [
            'users' => $users
        ]);

    }

    public function register()
    {
        return view('register');
    }

    public function sign_up()
    {
        $errors = [];

        $user_email = sanitize($_POST['email']);
        $user_username = sanitize($_POST['username']);
        $password = sanitize($_POST['password']);
        $confirm_password = sanitize(($_POST['confirm_password']));

        if(!$user_email) {
            $errors[] = 'Please enter a valid email';
        }
        if(!$user_username) {
            $errors[] = 'Please enter a valid username';
        }
        if(!$password || $password != $confirm_password) {
            $errors[] = 'Please enter a valid password';
        }

        if(!$errors) {
            $array = [
                'success' => true
            ];

            $hashed_password = password_hash($password, CRYPT_BLOWFISH);

            App::get('database')->insert('users', [
                'user_email' => $user_email,
                'username' => $user_username,
                'user_password' => $hashed_password
            ]);

        } else {
            $array = [
                'failed' => true,
                'errors' => $errors
            ];
        }

        return view('register', $array);
    }
}