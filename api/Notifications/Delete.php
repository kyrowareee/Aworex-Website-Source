<?php 

include $_SERVER['DOCUMENT_ROOT']."/classes/DB.php";

    DBA::query('DELETE FROM notifications WHERE id=:id', array(':id'=>$_GET['id']));
    header('Location: /admin/notifications_user');

?>