<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'] . '/classes/DB.php');
if (isset($_GET['id'])) {
    
    DBA::query('DELETE FROM accounts WHERE id=:id', array(':id'=>$_GET['id']));
    header('Location: /admin/accounts');
       
  }