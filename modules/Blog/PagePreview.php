

<?php
$datablog = DB::query('SELECT * FROM blog_preview WHERE id=:id', array(':id'=>$_GET['id']))[0];
?>
<div class="alert alert-warning" role="alert">
You are viewing a preview of a blog post.
</div>
<h1 id="contact" style="text-align: start;" class="price__header"><?=$datablog['title']?></h1>
<p><?=nl2br(htmlentities($datablog['text']))?></p>