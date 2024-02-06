<?php
include($_SERVER['DOCUMENT_ROOT'] . '/classes/DB.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['title']) && isset($_POST['text']) && isset($_POST['date']) && isset($_POST['type'])) {
        if ((int)$_POST['dsid'] > 0) {
            $ds = 1;
        } else {
            $ds = 0;
        }
        DB::query('INSERT INTO reviews VALUES (\'0\', :title, :date, :text, :type, :ds, :dsid, :r)', array(':title'=>$_POST['title'], ':date'=>$_POST['date'], ':text'=>$_POST['text'], ':type'=>$_POST['type'].'_a', ':r'=>1, ':ds'=>$ds, ':dsid'=>$_POST['dsid']));
        echo json_encode(array(
            'error' => 0,
            'errorcode' => '0',
        ));
    } else {
        echo json_encode(array(
            'error' => 0,
            'errorcode' => '1',
        ));
    }
            
} else {
    echo 'крылышки';
}