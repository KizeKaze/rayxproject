<?php
session_start();
require 'views/includes/functions.php';
require 'vendor/autoload.php';
$sql = require "core/bootstrap.php";

$uri = Request::uri();
if (strpos($uri, '/' !== false)) {
    $uriChunks = explode('/', $uri);
    $uri = $uriChunks[0];
}

Router::load('routes.php')
    ->direct($uri, Request::method());

