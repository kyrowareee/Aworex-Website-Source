<?php
include($_SERVER['DOCUMENT_ROOT'] . '/classes/DB.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    

    $ft = 'False';
    if ($_POST['select'] === '1') {
        $select = '1day';
        $length = '1d';
    } else if ($_POST['select'] === '2') {
        $select = '3days';
        $length = '3d';
    } else if ($_POST['select'] === '3') {
        $select = '7days';
        $length = '7d';
    }



    $response = curl_exec($curl);

    curl_close($curl);
        DBA::query('INSERT INTO accounts_apex VALUES (\'0\', :key_t, :ft, :t, :ab)', array(':ft'=>$ft, ':key_t'=>$_POST['password'], ':t'=>$select, ':ab'=>0));
        echo json_encode(array(
            'error' => 0,
            'errorcode' => '0',
        ));
            
} else {
    echo 'крылышки';
}