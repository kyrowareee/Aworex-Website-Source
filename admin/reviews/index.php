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
    <script>
            $(document).ready(function() {


                    




                $('#reviewAdd').submit(function(e) {


                    e.preventDefault();
                    var formData = new FormData(this);
                    $.ajax({
                        type: "POST",
                        url: '/api/Admin/Reviews/Add',
                        data: formData,
                        processData: false,
            contentType: false,

                       
                        success: function(response) {
                            var jsonData = JSON.parse(response);

                            console.log(response);
                            if (jsonData.errorcode == "0") {
                                Notify.noty('success', 'Created successfully!');
                                $.ajax({
                        type: "GET",
                        url: '/api/Admin/Reviews/List',
                        processData: false,
            contentType: false,

                       
                        success: function(response) {
                            $('#chatc').html(response);
                        },
                        
                    });
              
                        
                  
                
                

            


                                
                            } else {
                                Notify.noty('danger', 'Unknown Error');
                            }
                        },
                        
                    });
                });
            });
        </script>
    

        <div class="container" style="margin-top: 75px;">
            
        <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
                <center><h1 class="h3 mb-3 mt-4 fw-normal text-center">Add Review</h1></center>
                
            <div class="modal-body">
            <form id="reviewAdd" action="" method="post">
            <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Username</label>
  <input name="title" type="text" class="form-control" id="exampleFormControlInput1">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Description</label>
  <textarea name="text" type="text" class="form-control" id="exampleFormControlInput1"></textarea>
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Date</label>
  <input name="date" type="text" class="form-control" id="exampleFormControlInput1">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Review Type</label>
  <select name="type" class="form-select" aria-label="Default select example">
  <option value="1">Good</option>
  <option value="2">Bad</option>
</select>
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Message ID</label>
  <input name="dsid" type="text" class="form-control" id="exampleFormControlInput1">
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
        <h1>Reviews</h1>
        <a style="margin-top: 20px; margin-left: 7px;" data-bs-toggle="modal" href="#" data-bs-target="#reviewModal" class="price__card__button">Add</a>
        </div>
        <div class="col-md-auto d-flex align-items-center">
         <a style="margin-right: 15px;" class="btn btn-primary mb-3" href="/api/Admin/Reviews/5">Up date for 5 Days</a> <a style="margin-right: 15px;" class="btn btn-primary mb-3" href="/api/Admin/Reviews/30">Up date for 30 Days</a>  <a class="btn btn-primary mb-3" href="/api/Admin/Reviews/90">Up date for 90 Days</a>
        </div>
       
        
       <div id="chatc">
       <?php
        $reviews = DB::query('SELECT * FROM reviews ORDER BY id DESC');
        foreach ($reviews as $r) {
            if ((int)$r['rewed'] === 1) {
                $color = '#1BB84B';
            } else if ((int)$r['rewed'] === 0) {
                $color = '#B1183C';
            }
            if ($r['type'] === '1' || $r['type'] === '2') {
                $created = 'User';
            } else {
                $created = 'Admin';
            }
            echo '<a style="color: #fff;" href="edit?id='.$r['id'].'"><div style="background-color: '.$color.';" class="card mb-3">
            <div class="card-body">
                Username: '.htmlspecialchars($r['title']).'<br>
                Date: '.$r['date'].'<br>
                Text: '.htmlspecialchars($r['text']).'<br>
                Created by: '.$created.'
            </div>
        </div></a>';
        }
        ?>
       </div>
        
    </body>
</html>