<?php
session_start();
require 'views/includes/functions.php';
require 'vendor/autoload.php';
$sql = require "core/bootstrap.php";

Router::load('routes.php')
    ->direct(Request::uri(), Request::method());

