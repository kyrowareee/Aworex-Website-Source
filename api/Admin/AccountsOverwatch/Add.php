<?php
include($_SERVER['DOCUMENT_ROOT'] . '/classes/DB.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    

    $ft = 'False';
    if ($_POST['select'] === '1') {
        $select = '1day';
        $length = '1d';
    } else if ($_POST['select'] === '2') {
        $select = '7days';
        $length = '7d';
    } else if ($_POST['select'] === '3') {
        $select = '30days';
        $length = '30d';
    } else if ($_POST['select'] === '4') {
        $select = 'lifetime';
        $length = 'lifetime';
    } else if ($_POST['select'] === 'ft') {
        $select = 'freetest';
        $ft = 'True';
        $length = '3h';
    }



    $response = curl_exec($curl);

    curl_close($curl);
        DBA::query('INSERT INTO accounts_overwatch VALUES (\'0\', :key_t, :ft, :t, :ab)', array(':ft'=>$ft, ':key_t'=>$_POST['password'], ':t'=>$select, ':ab'=>0));
        echo json_encode(array(
            'error' => 0,
            'errorcode' => '0',
        ));
            
} else {
    echo 'крылышки';
}