<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include($_SERVER['DOCUMENT_ROOT'] . '/classes/DB.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
        DBA::query('INSERT INTO accounts_spoofer VALUES (\'0\', :e, :p, :r, :aid)', array(':e'=>$_POST['email'], ':r'=>'NONE', ':p'=>'NONE', ':aid'=>$_POST['select']));
        echo json_encode(array(
            'error' => 0,
            'errorcode' => '0',
        ));
            
} else {
    echo 'крылышки';
}