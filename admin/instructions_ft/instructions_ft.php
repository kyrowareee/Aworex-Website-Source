<?php include $_SERVER['DOCUMENT_ROOT']."/classes/DB.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$data = DB::query('SELECT * FROM root WHERE id=1')[0];
if (isset($_POST['createpost'])) {
    DB::query('UPDATE root_ft SET downloadtext=:d, spoofer=:s, account=:a, valorant=:v, apex=:ap, overwatch=:ov, farlight=:f, csgo=:cs WHERE id=1', array(':d'=>$_POST['cheat'], ':s'=>$_POST['spoofer'], ':a'=>$_POST['accounts'], ':v'=>$_POST['valorant'], ':ap'=>$_POST['apex'], ':ov'=>$_POST['overwatch'], ':f'=>$_POST['farlight'], ':cs'=>$_POST['csgo']));
    header('Location: /admin/instructions_ft');
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
        <h1>Instructions</h1>
        <form action="index" method="post">
        <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Cheat</label>
  <textarea type="text" name="cheat" class="form-control" id="exampleFormControlInput1"><?=$data['downloadtext']?></textarea>
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Apex</label>
  <textarea type="text" name="apex" class="form-control" id="exampleFormControlInput1"><?=$data['apex']?></textarea>
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Overwatch</label>
  <textarea type="text" name="overwatch" class="form-control" id="exampleFormControlInput1"><?=$data['overwatch']?></textarea>
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Farlight</label>
  <textarea type="text" name="farlight" class="form-control" id="exampleFormControlInput1"><?=$data['farlight']?></textarea>
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">CS2</label>
  <textarea type="text" name="csgo" class="form-control" id="exampleFormControlInput1"><?=$data['csgo']?></textarea>
</div>
<div class="mb-3">
    <button class="btn btn-primary" name="createpost">Create</button>
</div>
        </form>
        </div>
    </body>
</html>