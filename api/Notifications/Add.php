<?php

include($_SERVER['DOCUMENT_ROOT'] . '/classes/DB.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
       
            DB::query('INSERT INTO notifications VALUES (\'0\', :title, :text, NOW(), 0)', array(':title'=>$_POST['title'],':text'=>$_POST['text']));
            $users = DB::query('SELECT * FROM users');
            foreach ($users as $u) {
                DB::query('UPDATE users SET notfs=notfs+1 WHERE id=:id', array(':id'=>$u['id']));
            }
        echo json_encode(array(
            'error' => 0,
            'errorcode' => '0',
        ));
        }