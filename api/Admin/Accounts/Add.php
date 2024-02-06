<?php

include($_SERVER['DOCUMENT_ROOT'] . '/classes/DB.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
       
            DBA::query('INSERT INTO accounts VALUES (\'0\', :eli, :e, :ep, :ap, 0, :ar, :aid)', array(':eli'=>'NONE', ':e'=>$_POST['email'],  ':ep'=>'NONE', ':ap'=>'NONE', ':el'=>'NONE', ':aid'=>$_POST['accountid']));
        echo json_encode(array(
            'error' => 0,
            'errorcode' => '0',
        ));
        }