<?php 

include $_SERVER['DOCUMENT_ROOT']."/classes/DB.php";

    DBA::query('DELETE FROM accounts_csgo WHERE id=:id', array(':id'=>$_GET['id']));
    header('Location: /admin/accounts_csgo');

?>