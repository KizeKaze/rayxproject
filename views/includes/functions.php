<?php

function sanitize($data) {
    return $data = htmlspecialchars(trim($data));
}

function dd($data, $verbose = 0) {
    echo "<pre>";
    if ($verbose == 1) {
        var_dump($data);
    } else {
        print_r($data);
    }
    echo "</pre>";
    die();
}




