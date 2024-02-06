<?php
include($_SERVER['DOCUMENT_ROOT'] . '/classes/DB.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
$json = file_get_contents('php://input');
$data = json_decode($json, true);
    DB::query('INSERT INTO blog_preview VALUES (\'0\', :title, :body)', array(':title'=>$data['title'], ':body'=>$data['bodypost']));
    $lastid = DB::query('SELECT id FROM blog_preview ORDER BY id DESC LIMIT 1')[0]['id'];
    echo json_encode(array(
        'error' => 0,
        'errorcode' => '0',
        'preid' => $lastid
    ));
}



