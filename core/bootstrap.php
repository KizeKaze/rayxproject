<?php

// dependancy injection container
App::bind('config', require 'database/config.php');

(App::get('config'));

App::bind('database', new QueryBuilder(
    Connection::make(App::get('config')['database'])
));

function view($name, $data = [])
{
    extract($data);
    return require "views/$name.view.php";
}

function redirect($path)
{
    header("Location: /$path");
}



