<?php

$url_string = $_SERVER['QUERY_STRING'];

// Routing 
if (strpos($url_string, 'page') !== false) {
    
    $page = $_GET['page'];
    
    if ($page == 'enter') {
        $page_title = 'Enter';
        $include    = 'entry.php';
    }
    
} else {
    $page_title = 'Get Started';
    $page       = 'get-started';
    $include    = 'landing.php';
    
}