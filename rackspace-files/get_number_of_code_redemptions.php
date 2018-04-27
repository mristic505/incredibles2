<?php

require_once 'meekrodb.2.3.class.php';
DB::$user     = 'matejar';
DB::$password = 'BCconnect1500$-';
DB::$dbName   = 'temp2';

$current_date = date('m');

// Get number of times codes were reedemed in one month
$result = DB::query("SELECT * FROM used_codes WHERE used_by=%s", $email);

$times_enetered=0;
foreach ($result as $row) {
	$entry_date = $row['entry_date'];
	$entry_date = date('m', strtotime($entry_date));
	if($entry_date == $current_date) {
		$times_enetered++;
	}
}

if ($times_enetered > 4) {
	$data['message'] = 'played_4_times_this_month';
    return_response($data);
    die();
}