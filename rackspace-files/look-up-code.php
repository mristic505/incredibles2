<?php
// DB::$user = 'matejar';
// DB::$password = 'BCconnect1500$-';
// DB::$dbName = 'temp2';

// $firstCode = 'VN1W7PXDz';
// $secondCode = 'K4DJHCGQz';
// $thirdCode = 'PPRNKQH6z';
// // $thirdCode = 'PPRNKQH69';
// $email = 'test@test.com';



// ===============================================================
// ================== CODE DATABASE VALIDATION ===================
// ===============================================================

// Create empty array to store code search results
$codes_search_result      = array();
$used_codes_search_result = array();

// Check if codes are already used and if already exist in DB
$i = 0;
$z = 0;
// Check if each submitted code has been used ============
foreach ($codes as $code) {
    $z++;
    $result = DB::query("SELECT codes FROM used_codes WHERE codes=%s", $code);
    // if code not found, set variable as not_found
    if (empty($result))
        ${"code_" . $z} = 'not_found';
    // if code found, set variable as found
    else
        ${"code_" . $z} = 'found';
    // push single code result in array
    array_push($used_codes_search_result, ${"code_" . $z});
}

if (in_array('found', $used_codes_search_result)) {
    $data['message'] = 'already_used';
    return_response($data);
    die();
}

// Check if each submitted code exists in DB ==========
foreach ($codes as $code) {
    $i++;
    $result = DB::query("SELECT codes FROM codes WHERE codes=%s", $code);
    // if code not found, set variable as not_found
    if (empty($result))
        ${"code_" . $i} = 'not_found';
    // if code found, set variable as code as value
    else
        ${"code_" . $i} = $result[0]['codes'];
    // push single code result in array
    array_push($codes_search_result, ${"code_" . $i});
}


// check if all three codes exist =============================
if (!empty($codes_search_result)) {
    if (in_array('not_found', $codes_search_result)) {
        $data['message'] = 'codes_not_found';
        return_response($data);
        die();
    } else {
        $data['message'] = 'all_codes_found_entry_made';
        // insert into used_codes table ======================
        foreach ($codes_search_result as $code) {
            DB::insert('used_codes', array(
                'used_by' => $email,
                'codes' => $code,
                'month' => $current_month
            ));
        }
    }
}

?>