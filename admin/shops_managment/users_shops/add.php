<?php 

include $_SERVER['DOCUMENT_ROOT']."/classes/DB.php";
$data = DB::query('SELECT * FROM shops_tokens WHERE id=:id', array(':id'=>$_GET['id']))[0];

if ($data['account_id'] === '1') {
    $selected = 'selected';
} else if ($data['account_id'] === '2') {
    $selected = 'selected';
} else if ($data['account_id'] === '3') {
    $selected = 'selected';
} else if ($data['account_id'] === '4') {
    $selected = 'selected';
}



if (isset($_POST['createpost'])) {
    DB::query('INSERT INTO shops_tokens VALUES (\'0\', :uid, :aid, :pm, 0)', array(':uid'=>$_GET['id'], ':aid'=>$_POST['accountid'], ':pm'=>'manually'));
    header('Location: /admin/shops_managment/users_shops/?id='.$_GET['id']);
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

        <title>Admin</title>
        <?php include $_SERVER['DOCUMENT_ROOT']."/classes/Navbar.php"; ?>
        </head>
    <body>
    

        <div class="container mt-3">
            <h1>Create Purchase</h1>
        <form action="add?id=<?=$_GET['id']?>" method="post">

<label for="formFile" class="form-label">Category</label>
  <select name="accountid" class="form-select mt-1" aria-label="Default select example">
  <option value="1">Standard</option>
  <option value="2">Left Behind</option>
  <option value="3">Prepare for Escape</option>
  <option value="4">Edge of Darkness</option>
  <option value="cheat1">Cheat for 1 Day</option>
  <option value="cheat3">Cheat for 7 Days</option>
  <option value="cheat4">Cheat for 15 Days</option>
  <option value="cheat5">Cheat for 30 Days</option>
  <option value="cheat6">Cheat for Lifetime</option>
  <option value="spoofer">Spoofer</option>
</select>


<div class="mb-3 mt-3">
    <button class="btn btn-primary" name="createpost">Create</button>
</div>
  </form>
        
        </div>
    </body>
</html>