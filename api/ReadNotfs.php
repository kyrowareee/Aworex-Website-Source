<?php
require $_SERVER['DOCUMENT_ROOT'] . "/classes/DB.php";
require $_SERVER['DOCUMENT_ROOT'] . "/classes/Auth.php";

DB::query('UPDATE users SET notfs=0 WHERE id=:id', array(':id'=>isLoggedIn()));