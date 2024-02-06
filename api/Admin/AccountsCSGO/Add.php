<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include($_SERVER['DOCUMENT_ROOT'] . '/classes/DB.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    

    
    if ($_POST['select'] === '1') {
        $select = '1day';
        $length = '1d';
        $ft = 'False';
    } else if ($_POST['select'] === '2') {
        $select = '7days';
        $length = '7d';
        $ft = 'False';
    } else if ($_POST['select'] === '3') {
        $select = '30days';
        $length = '30d';
        $ft = 'False';
    } else if ($_POST['select'] === '4') {
        $select = 'lifetime';
        $length = 'lifetime';
        $ft = 'False';
    } else {
        $select = 'freetest';
        $ft = 'True';
    }


        DBA::query('INSERT INTO accounts_csgo VALUES (\'0\', :key_t, :ft, :t, :ab)', array(':ft'=>$ft, ':key_t'=>$_POST['password'], ':t'=>$select, ':ab'=>0));
        echo json_encode(array(
            'error' => 0,
            'errorcode' => '0',
        ));
            
} else {
    echo 'крылышки';
}