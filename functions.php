<?php

$url_string = $_SERVER['QUERY_STRING'];

// Routing 
if (strpos($url_string, 'page') !== false) {
    
    $page = $_GET['page'];
    
    if ($page == 'enter') {
        $page_title = 'Enter';
        $include    = 'entry.php';
    }
    if ($page == 'thank-you') {
        $page_title = 'Thank You!';
        $include    = 'thank-you.php';
    }
    if ($page == 'rules') {
        $page_title = 'Rules';
        $include    = 'rules.php';
    }

} else {
    $page_title = 'Get Started';
    $page       = 'get-started';
    $include    = 'landing.php';
    
}