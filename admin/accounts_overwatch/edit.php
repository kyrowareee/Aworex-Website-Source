<?php 

include $_SERVER['DOCUMENT_ROOT']."/classes/DB.php";
$data = DBA::query('SELECT * FROM accounts_spoofer WHERE id=:id', array(':id'=>$_GET['id']))[0];


if (isset($_POST['createpost'])) {
  DBA::query('UPDATE accounts_spoofer SET  email = :e, password = :p WHERE id= :aid)', array(':e'=>$_POST['email'], ':p'=>$_POST['password']));
  header('Location: /admin/accounts_spoofer');
}


if (isset($_POST['deletepost'])) {
  DBA::query('DELETE FROM accounts_spoofer WHERE id= :aid', array(':aid'=>$_GET['id']));
  header('Location: /admin/accounts_spoofer');
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
            <h1>Edit Account</h1>
        <form action="edit?id=<?=$_GET['id']?>" method="post">
             <div class="mt-3 mb-3">
  <button class="btn btn-danger" name="deletepost">Delete</button>
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Login</label>
  <input value="<?=$data['email']?>" type="text" name="e" class="form-control" id="exampleFormControlInput1">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Password</label>
  <input value="<?=$data['password']?>" type="password" name="ep" class="form-control" id="exampleFormControlInput1">
</div>




<div class="mb-3 mt-3">
    <button class="btn btn-primary" name="createpost">Update</button>
</div>

    
  </form>
        
        </div>
    </body>
</html>