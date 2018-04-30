<?php

$url_string = $_SERVER['QUERY_STRING'];

// Routing 
if (strpos($url_string, 'page') !== false) {
    
    $page = $_GET['page'];
    
    if ($page == 'enter') {
        $page_title = 'Enter';
        $include    = 'entry.php';
        $flood_light = '';
    }
    if ($page == 'thank-you') {
        $page_title = 'Thank You!';
        $include    = 'thank-you.php';
        $flood_light = '<!--
            Start of DoubleClick Floodlight Tag: Please do not remove
            Activity name of this tag: Incredibles 2 Submission
            URL of the webpage where the tag is expected to be placed: http://juicyjuice.com/incredibles2/confirmation
            This tag must be placed between the <body> and </body> tags, as close as possible to the opening tag.
            Creation Date: 04/25/2018
            -->
            <script type="text/javascript">
            var axel = Math.random() + "";
            var a = axel * 10000000000000;
            document.write(\'<iframe src="https://8096545.fls.doubleclick.net/activityi;src=8096545;type=incre0;cat=incre00;dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;ord=\' + a + \'?" width="1" height="1" frameborder="0" style="display:none"></iframe>\');
            </script>
            <noscript>
            <iframe src="https://8096545.fls.doubleclick.net/activityi;src=8096545;type=incre0;cat=incre00;dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;ord=1?" width="1" height="1" frameborder="0" style="display:none"></iframe>
            </noscript>
            <!-- End of DoubleClick Floodlight Tag: Please do not remove -->';
    }
    if ($page == 'rules') {
        $page_title = 'Rules';
        $include    = 'rules.php';
        $flood_light = '';
    }
    if ($page == 'faq') {
        $page_title = 'FAQ';
        $include    = 'faq.php';
        $flood_light = '';
    }

} else {
    $page_title = 'Get Started';
    $page       = 'get-started';
    $include    = 'landing.php';
    $flood_light = '<!--
        Start of DoubleClick Floodlight Tag: Please do not remove
        Activity name of this tag: Incredibles 2 Page Visit
        URL of the webpage where the tag is expected to be placed: https://www.juicyjuice.com/Incredibles2
        This tag must be placed between the <body> and </body> tags, as close as possible to the opening tag.
        Creation Date: 04/25/2018
        -->
        <script type="text/javascript">
        var axel = Math.random() + "";
        var a = axel * 10000000000000;
        document.write(\'<iframe src="https://8096545.fls.doubleclick.net/activityi;src=8096545;type=incre0;cat=incre0;dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;ord=\' + a + \'?" width="1" height="1" frameborder="0" style="display:none"></iframe>\');
        </script>
        <noscript>
        <iframe src="https://8096545.fls.doubleclick.net/activityi;src=8096545;type=incre0;cat=incre0;dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;ord=1?" width="1" height="1" frameborder="0" style="display:none"></iframe>
        </noscript>
        <!-- End of DoubleClick Floodlight Tag: Please do not remove -->';
    
}