<?php
require $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";
require $_SERVER['DOCUMENT_ROOT'] . "/classes/DB.php";
include($_SERVER['DOCUMENT_ROOT'] . '/classes/Auth.php');
DB::query('INSERT INTO reviews VALUES (\'0\', :title, :date, :text, :type, 1, :id, :r)', array(':title'=>$_GET['title'], ':date'=>time(), ':text'=>$_GET['text'], ':type'=>'1', ':r'=>0, ':id'=>$_GET['id']));