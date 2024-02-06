<?php include $_SERVER['DOCUMENT_ROOT']."/classes/DB.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$data = DB::query('SELECT * FROM status WHERE id=1')[0];
if (isset($_POST['createpost'])) {
    var_dump($_POST);
    DB::query('UPDATE status SET cheat=:d, valorant=:v, apex=:ap, overwatch=:ov, farlight=:f, csgo=:cs WHERE id=1', array(':d'=>$_POST['cheat'], ':v'=>$_POST['valorant'], ':ap'=>$_POST['apex'], ':ov'=>$_POST['overwatch'], ':f'=>$_POST['farlight'], ':cs'=>$_POST['csgo']));
    header('Location: /admin/status');
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
        <h1>Status</h1>
        <form action="index" method="post">
        <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Tarkov</label>
  <select name="cheat" class="form-select" aria-label="Default select example">
    <option name="cheat" value="1" <?php if ((int)$data['cheat'] === 1) { echo 'selected'; } ?>>Undetected</option>
    <option name="cheat" value="2" <?php if ((int)$data['cheat'] === 2) { echo 'selected'; } ?>>Updating</option>
    <option name="cheat" value="3" <?php if ((int)$data['cheat'] === 3) { echo 'selected'; } ?>>Detected</option>
  </select>
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Spoofer</label>
    <select name="spoofer" class="form-select" aria-label="Default select example">
    <option value="1" <?php if ((int)$data['spoofer'] === 1) { echo 'selected'; } ?>>Undetected</option>
    <option value="2" <?php if ((int)$data['spoofer'] === 2) { echo 'selected'; } ?>>Updating</option>
    <option value="3" <?php if ((int)$data['spoofer'] === 3) { echo 'selected'; } ?>>Detected</option>
  </select>
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">CS2</label>
    <select name="csgo" class="form-select" aria-label="Default select example">
    <option value="1" <?php if ((int)$data['csgo'] === 1) { echo 'selected'; } ?>>Undetected</option>
    <option value="2" <?php if ((int)$data['csgo'] === 2) { echo 'selected'; } ?>>Updating</option>
    <option value="3" <?php if ((int)$data['csgo'] === 3) { echo 'selected'; } ?>>Detected</option>
  </select>
</div>
<div class="mb-3">
    <button class="btn btn-primary" name="createpost">Create</button>
</div>
        </form>
        </div>
    </body>
</html>