<?php

// URLS via GET or POST, directed to a controller and a function
$router->get('', 'PagesController@home');

$router->get('create_post', 'PagesController@create_post');
$router->post('create_post', 'PagesController@insert_post');

$router->get('show_post', 'PagesController@show_post');

$router->get('about', 'PagesController@about');
$router->get('contact', 'PagesController@contact');
$router->get('logout', 'PagesController@logout');

$router->get('login', 'PagesController@login');
$router->post('login', 'PagesController@sign_in');

$router->get('register', 'PagesController@register');
$router->post('register', 'PagesController@sign_up');



$router->get('users', 'UsersController@index');
$router->post('users', 'UsersController@store');

