<?php 

include $_SERVER['DOCUMENT_ROOT']."/classes/DB.php";

    DBA::query('DELETE FROM accounts_valk WHERE id=:id', array(':id'=>$_GET['id']));
    header('Location: /admin/accounts_valkyrie');

?>