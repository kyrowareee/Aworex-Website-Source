<?php 

include $_SERVER['DOCUMENT_ROOT']."/classes/DB.php";
$data = DB::query('SELECT * FROM users WHERE id=:id', array(':id'=>$_GET['id']))[0];


if (isset($_POST['createpost'])) {
    DB::query('UPDATE users SET email = :email, password= :password, username=:un, fname=:f, lname=:l, discord=:d, facebook=:d WHERE id=:id', array(':id'=>$_GET['id'], ':email'=>$_POST['email'], ':password'=>password_hash($_POST['password'], PASSWORD_BCRYPT), ':un'=>$_POST['username'], ':f'=>$_POST['fname'], ':l'=>$_POST['lname'], ':d'=>$_POST['discord'], ':f'=>$_POST['facebook']));
    header('Location: /admin/users');
}

if (isset($_POST['deletepost'])) {
    DB::query('DELETE FROM users WHERE id=:id', array( ':id'=>$_GET['id']));
    header('Location: /admin/users');
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
            <h1>Edit User</h1>
        <form action="edit?id=<?=$_GET['id']?>" method="post">
            <div class="mt-3 mb-3">
  <button class="btn btn-danger" name="deletepost">Delete</button>
</div>


<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Discord</label>
  <input value="<?=$data['discord']?>" type="text" name="discord" class="form-control" id="exampleFormControlInput1">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Email</label>
  <input value="<?=$data['email']?>" type="text" name="email" class="form-control" id="exampleFormControlInput1">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Password</label>
  <input type="password" name="password" class="form-control" id="exampleFormControlInput1">
</div>





<div class="mb-3">
    <button class="btn btn-primary" name="createpost">Update</button>
</div>
  </form>


  <h1>Purchases <?=$data['email']?></h1>
  <a class="btn btn-primary mb-3" href="/admin/shops_managment/users_shops/add?id=<?=$_GET['id']?>">Create Purchase</a><br>
  <div class="row">
<?php
$reviews = DB::query('SELECT * FROM shops_tokens WHERE user_id=:id ORDER BY id DESC', array(':id'=>$_GET['id']));
foreach ($reviews as $r) {
    if ($r['account_id'] === '1') {
        $price = '25';
        $name = 'Standard Account';
    } else if ($r['account_id'] === '2') {
        $price = '40';
        $name = 'Left Behind Account';
    } else if ($r['account_id'] === '3') {
        $price = '65';
        $name = 'Prepare for Escape Account';
    } else if ($r['account_id'] === '4') {
        $price = '99';
        $name = 'Edge of Darkness Account';
    } else if ($r['account_id'] === 'cheat1') {
        $price = '5';
        $name = 'Cheat for 1 Day';
    } else if ($r['account_id'] === 'cheat3') {
        $price = '30';
        $name = 'Cheat for 7 Days';
    } else if ($r['account_id'] === 'cheat4') {
        $price = '50';
        $name = 'Cheat for 15 Days';
    } else if ($r['account_id'] === 'cheat5') {
        $price = '80';
        $name = 'Cheat for 30 Days';
    } else if ($r['account_id'] === 'cheat6') {
        $price = '119';
        $name = 'Cheat for 1 Lifetime';
    } else if ($r['account_id'] === 'spoofer') {
        $price = '35';
        $name = 'Spoofer';
    }

    echo '  <div class="card mb-3">
    <div class="card-body">
    
        <h5 style="margin-bottom: -0px;" href="testings" class="col-sm-10 d-inline-block font-weight-bold"><a style="text-decoration: none;" href="/admin/shops_managment/users_shops/edit?id='.$r['id'].'">'.$name.'</a></h5><br>

        




    </div>
</div> ';
} ?>
              
           </div>
        
        </div>
    </body>
</html>