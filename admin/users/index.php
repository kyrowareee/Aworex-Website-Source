<?php include $_SERVER['DOCUMENT_ROOT']."/classes/DB.php"; ?>
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
        <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
                <center><h1 class="h3 mb-3 mt-4 fw-normal text-center">Add Review</h1></center>
            <div class="modal-body">
            <form id="reviewAdd" action="" method="post">
            <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Code</label>
  <input type="text" name="text" class="form-control" id="exampleFormControlInput1">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Discount</label>
  <input type="text" name="value" class="form-control" id="exampleFormControlInput1">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Amount of use</label>
  <input type="text" name="uses" class="form-control" id="exampleFormControlInput1">
</div>
            
            </div>

            <div class="modal-footer">
            <button data-bs-dismiss="modal" type="submit" style="margin-top: 20px; margin-left: 7px;" class="price__card__button">Add</button>
      </div>
      </form>
            
        </div>
    </div>
</div>
        <div class="col-md-auto d-flex align-items-center">
        <h1>Users</h1>
        
        </div>
        <p>Registered Users: <?=DB::query('SELECT COUNT(*) FROM users')[0]['COUNT(*)'];?></p>
        <input id="txt_username" onkeyup="funct()" type="text" name="searcht" <?php if (isset($_GET['search'])) { ?> value="<?= $_GET['search'] ?>" <?php } ?>
                                class="form-control" placeholder="Search..." aria-label="Search..."
                                aria-describedby="button-addon2"><br>

                                <script>
        function funct() {
            $.ajax({
                url: '/api/Admin/Users/Search',
                method: 'POST',
                data: JSON.stringify({ "value": $("#txt_username").val() }),
                success: function (response) {
                    var jsonData = JSON.parse(JSON.stringify(response));

                    console.log(response);
                    $('#chatc').html(response);
                }
            });
        }
    </script>
        
       <div id="chatc">
       <?php
        $reviews = DB::query('SELECT * FROM users ORDER BY id DESC');
        foreach ($reviews as $r) {

            echo '<a style="color: #fff;" href="edit?id='.$r['id'].'"><div style="background-color: #292929;" class="card mb-3">
            <div class="card-body">
                Username: '.$r['username'].'<br>
                Email: '.$r['email'].'<br>
            </div>
        </div></a>';
        }
        ?>
       </div>
        
    </body>
</html>