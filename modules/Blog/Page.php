<?php require $_SERVER['DOCUMENT_ROOT']."/classes/BBCodes.php"; ?>
<?php require $_SERVER['DOCUMENT_ROOT']."/classes/Date.php"; ?>

<?php
$datablog = DB::query('SELECT * FROM blog WHERE id=:id', array(':id'=>$_GET['page']))[0];
?>

<h1 id="contact" style="text-align: start;" class="price__header"><?=$datablog['title']?></h1>
<p style="color: #4E4F60;"><?=zmdate($datablog['date'])?></p>
<p><?=BBCodes(nl2br(htmlentities($datablog['text'])))?></p>