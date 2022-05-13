<?php

class PagesController
{

    public function home()
    {
        if(isset($_SESSION['user_id'])){
            $parameters = array("order" => "DESC", "user_id" => $_SESSION['user_id']);
        } else {
            $parameters = array("order" => "DESC");
        }
        $posts = App::get('database')->selectAll('posts', $parameters);

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
        $user_email = sanitize($_POST['user_email']);
        $user_password = sanitize($_POST['user_password']);

        $errors = [];


        if(!$user_email) {
            $errors[] = 'Please enter a valid email';
        }
        if(!$user_password) {
            $errors[] = 'Please enter a valid password';
        }

        if ($errors) {
            $array = [
                'failed' => true,
                'errors' => $errors
            ];

        return view('login', $array);
        }

        $result = App::get('database')->selectQuery('users', [
            'user_email' => $user_email
            ]);
        $db_user_email = $result[0]->user_email;
        $db_user_password = $result[0]->user_password;

        $verified_pass = password_verify($user_password, $db_user_password);

        if ($user_email !== $db_user_email || $verified_pass != true) {
            $errors[] = 'Email or Password not found';

            if ($errors) {
                $array = [
                    'failed' => true,
                    'errors' => $errors
                ];
                return view('login', $array);
        }
        } else if ($user_email == $db_user_email && $verified_pass) {
            $_SESSION['user_id'] = $result[0]->user_id;
            $_SESSION['username'] = $result[0]->username;
            $_SESSION['user_email'] = $result[0]->user_email;
            $_SESSION['user_role'] = $result[0]->user_role;
        }

        $parameters = array("order" => "DESC", "user_id" => $_SESSION['user_id']);
        $posts = App::get('database')->selectAll('posts', $parameters);

        return view('index', [
            'posts' => $posts
        ]);

    }

    public function register()
    {
        return view('register');
    }

    public function logout()
    {
        session_start();

        $_SESSION['username'] = null;
        $_SESSION['user_id'] = null;
        $_SESSION['user_fname'] = null;
        $_SESSION['user_lname'] = null;
        $_SESSION['user_email'] = null;
        $_SESSION['user_role'] = null;
        header("Location: /");
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

    public function create_post()
    {
        // get id here
//        dd(Request::id());
        return view('create_post');

    }

    public function insert_post()
    {
        $errors = [];

        $post_title = sanitize($_POST['post_title']);
        $post_content = sanitize($_POST['post_content']);
        $user_id = sanitize($_SESSION['user_id']);
        $post_username = sanitize(($_SESSION['username']));

        if(!$post_title) {
            $errors[] = 'Please enter a title';
        }
        if(!$post_content) {
            $errors[] = 'Post body cannot be empty';
        }

        if(!$errors) {
            $array = [
                'success' => true
            ];

        App::get('database')->insert('posts', [
            'post_title' => $post_title,
            'post_content' => $post_content,
            'post_user' => $post_username
        ]);

    } else {
            $array = [
            'failed' => true,
            'errors' => $errors
            ];
        }
        return view('create_post', $array);
    }

    public function show_post()
    {
        echo "You're in show post right now hey.";

        dd($_GET);

    }



}