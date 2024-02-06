<?php include $_SERVER['DOCUMENT_ROOT']."/classes/DB.php"; ?>
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
  <h1>Select User</h1>

  <div class="row">
<?php
$reviews = DB::query('SELECT * FROM users ORDER BY id DESC');
foreach ($reviews as $r) {
    echo '  <div class="card mb-3">
    <div class="card-body">
    
        <h5 style="margin-bottom: -0px;" href="testings" class="col-sm-10 d-inline-block font-weight-bold"><a style="text-decoration: none;" href="/admin/shops_managment/users_shops/?id='.$r['id'].'">'.$r['email'].'</a></h5><br>

        




    </div>
</div> ';
} ?>
              
           </div>
</div>
    </body>
</html>