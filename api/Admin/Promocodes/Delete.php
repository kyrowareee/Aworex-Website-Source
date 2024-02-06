<?php 

include $_SERVER['DOCUMENT_ROOT']."/classes/DB.php";

    DB::query('DELETE FROM promocodes WHERE id=:id', array(':id'=>$_GET['id']));
    header('Location: /admin/promocodes');

?>