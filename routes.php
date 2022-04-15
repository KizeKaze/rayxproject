<?php


$router->get('', 'PagesController@home');
$router->get('about', 'PagesController@about');
$router->get('contact', 'PagesController@contact');
$router->get('login', 'PagesController@login');


$router->get('users', 'UsersController@index');
$router->post('users', 'UsersController@store');

