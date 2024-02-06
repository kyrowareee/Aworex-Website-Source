<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include($_SERVER['DOCUMENT_ROOT'] . '/classes/DB.php');



$ft = 'True';
if ($_SERVER['REQUEST_METHOD'] == "POST") {


        /*$curl = curl_init();

        $login = 'aworex';
        $password = 'aworexsoftware';
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://awo.erqt.ru/sefidhgmosdfgiusdf/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('keystr' => $_POST['password'], 'length' => $length, 'add' => 'add'),
            CURLOPT_HTTPHEADER => array(
                "Authorization: Basic " . base64_encode($login . ":" . $password)
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);*/
        DBA::query('INSERT INTO accounts_'.$_POST['select'].' VALUES (\'0\', :key_t, :ft, :t, :ab)', array(':ft' => $ft, ':key_t' => $_POST['password'], ':t' => 'freetest', ':ab' => 0));
        echo json_encode(array(
            'error' => 0,
            'errorcode' => '0',
        ));
    
}
