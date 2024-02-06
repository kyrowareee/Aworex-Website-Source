<?php 

include $_SERVER['DOCUMENT_ROOT']."/classes/DB.php";
$data = DBA::query('SELECT * FROM accounts WHERE id=:id', array(':id'=>$_GET['id']))[0];


if (isset($_POST['createpost'])) {
  DBA::query('UPDATE accounts SET email_link = :el, email = :e, email_password = :ep, account_password = :ap, account_remail = :er WHERE id= :aid)', array(':el'=>$_POST['eli'], ':e'=>$_POST['e'], ':ep'=>$_POST['ep'], ':ap'=>$_POST['ap'], ':er'=>$_POST['el'], ':ab'=>0, ':aid'=>$_POST['accountid']));
  header('Location: /admin/accounts');
}


if (isset($_POST['deletepost'])) {
  DBA::query('DELETE FROM accounts WHERE id= :aid', array(':aid'=>$_POST['accountid']));
  header('Location: /admin/accounts');
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
  <label for="exampleFormControlInput1" class="form-label">Email Link</label>
  <input value="<?=$data['email_link']?>" type="text" name="eli" class="form-control" id="exampleFormControlInput1">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Email</label>
  <input value="<?=$data['email']?>" type="text" name="e" class="form-control" id="exampleFormControlInput1">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Email Password</label>
  <input value="<?=$data['email_password']?>" type="text" name="ep" class="form-control" id="exampleFormControlInput1">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Account Password</label>
  <input value="<?=$data['account_password']?>" type="text" name="ap" class="form-control" id="exampleFormControlInput1">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Reserve Email</label>
  <input value="<?=$data['account_remail']?>" type="text" name="el" class="form-control" id="exampleFormControlInput1">
</div>



<div class="mb-3 mt-3">
    <button class="btn btn-primary" name="createpost">Update</button>
</div>

    
  </form>
        
        </div>
    </body>
</html>