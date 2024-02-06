<?php
include($_SERVER['DOCUMENT_ROOT'] . '/classes/DB.php');
include($_SERVER['DOCUMENT_ROOT'] . '/classes/Auth.php');
DB::query('DELETE FROM login_tokens WHERE user_id=:userid', array(':userid'=>isLoggedIn()));
header('Location: /my/login');
?>