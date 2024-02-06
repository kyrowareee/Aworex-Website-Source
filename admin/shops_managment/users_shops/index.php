<?php include $_SERVER['DOCUMENT_ROOT']."/classes/DB.php"; 

$data = DB::query('SELECT * FROM shops_tokens WHERE user_id=:id', array(':id'=>$_GET['id']))[0];


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
  <h1>Purchases <?=$data['email']?></h1>
  <a class="btn btn-primary mb-3" href="add?id=<?=$_GET['id']?>">Create Purchase</a><br>
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
    
        <h5 style="margin-bottom: -0px;" href="testings" class="col-sm-10 d-inline-block font-weight-bold"><a style="text-decoration: none;" href="edit?id='.$r['id'].'">'.$name.'</a></h5><br>

        




    </div>
</div> ';
} ?>
              
           </div>
</div>
    </body>
</html>