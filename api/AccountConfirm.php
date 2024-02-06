<?php
require $_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php";
session_start();
include($_SERVER['DOCUMENT_ROOT'] . '/classes/DB.php');
include($_SERVER['DOCUMENT_ROOT'] . '/classes/Auth.php');
$data = DB::query('SELECT * FROM verf_tokens WHERE token=:token', array(':token'=>$_GET['token']))[0];
DB::query('UPDATE users SET verified=1 WHERE id=:id', array(':id'=>$data['user_id']));
header('Location: /my');