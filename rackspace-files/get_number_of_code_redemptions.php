<?php




// Get number of times codes were reedemed in one month
$result = DB::query("SELECT * FROM used_codes WHERE used_by=%s", $email);

$times_enetered=0;
foreach ($result as $row) {
	$entry_month = $row['month'];
	if($entry_month == $current_month) {
		$times_enetered++;
	}
}

if ($times_enetered > 11) {
	$data['message'] = 'played_4_times_this_month';
    return_response($data);
    die();
}