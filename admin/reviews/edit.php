<?php 

include $_SERVER['DOCUMENT_ROOT']."/classes/DB.php";
$data = DB::query('SELECT * FROM reviews WHERE id=:id', array(':id'=>$_GET['id']))[0];


if (isset($_POST['createpost'])) {
    DB::query('UPDATE reviews SET title = :title, text= :text, rewed=1, date=:date, type=:type, dsid=:dsid WHERE id=:id', array(':title'=>$_POST['title'], ':text'=>$_POST['text'], ':id'=>$_GET['id'], ':type'=>$_POST['type'], ':date'=>$_POST['date'], ':dsid'=>$_POST['dsid']));
    header('Location: /admin/reviews');
}

if (isset($_POST['deletepost'])) {
    DB::query('DELETE FROM reviews WHERE id=:id', array( ':id'=>$_GET['id']));
    header('Location: /admin/reviews');
}

if ($data['type'] === '1_a') {
    $type = 'Good';
} else {
    $type = 'Bad';
}

?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
<link rel="stylesheet" href="/static/css/root.admin.css">

        <title>Admin</title>
        <?php include $_SERVER['DOCUMENT_ROOT']."/classes/NavbarAdminNew.php"; ?>
        </head>
    <body>
    

        <div class="container" style="margin-top: 75px;">
            <h1>Edit Review</h1>
        <form action="edit?id=<?=$_GET['id']?>" method="post">
            <div class="mt-3 mb-3">
  <button class="btn btn-danger" name="deletepost">Delete</button>
</div>
<?php
if ($data['type'] != '1_a') {
    echo '<p>Review has created from website</p>';
} else if ($data['type'] != '2_a') {
    echo '<p>Review has created from website</p>';
}


?>
<p>Review <?=$type?></p>
  <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Date</label>
  <input value="<?=$data['date']?>" type="text" name="date" class="form-control" id="exampleFormControlInput1">
</div>
  <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Type</label>
  <select name="type">
      <option value="1" <?php if ($data['type'] === '1_a' || $data['type'] === '1') { echo 'selected'; } ?>>Positive</option>
      <option value="2" <?php if ($data['type'] === '2_a' || $data['type'] === '2') { echo 'selected'; } ?>>Negative</option>
  </select>
</div>
  <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Title</label>
  <input value="<?=$data['title']?>" type="text" name="title" class="form-control" id="exampleFormControlInput1">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Description</label>
  <textarea type="text" name="text" class="form-control" id="exampleFormControlInput1"><?=$data['text']?></textarea>
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Message ID</label>
  <textarea type="text" name="dsid" class="form-control" id="exampleFormControlInput1"><?=$data['dsid']?></textarea>
</div>


<div class="mb-3">
    <button class="btn btn-primary" name="createpost">Update</button>
</div>
  </form>
        
        </div>
    </body>
</html>