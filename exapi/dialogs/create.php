<?php
include($_SERVER['DOCUMENT_ROOT'] . '/classes/DB.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
$json = file_get_contents('php://input');
$data = json_decode($json, true);
    DB::query('INSERT INTO blog VALUES (\'0\', :title, :body)', array(':title'=>$data['title'], ':body'=>$data['bodypost']));
    echo json_encode(array(
        'error' => 0,
        'errorcode' => '0'
    ));
}