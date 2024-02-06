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
    <?php 
    if (isset($_GET["sort"])) { $ty = '/api/Admin/AccountsCheat/List?sort='.$_GET['sort']; } else {$ty = '/api/Admin/AccountsCheat/List'; }
    ?>
    <script>
            $(document).ready(function() {


                    




                $('#reviewAdd').submit(function(e) {


                    e.preventDefault();
                    var formData = new FormData(this);
                    $.ajax({
                        type: "POST",
                        url: '/api/Admin/AccountsApex/Add',
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
                        url: '<?=$ty?>',
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
                <center><h1 class="h3 mb-3 mt-4 fw-normal text-center">Add Account Cheat</h1></center>
            <div class="modal-body">
            <form id="reviewAdd" method="post">
            
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Key</label>
  <input id="keystr" name="password" type="text" class="form-control" id="exampleFormControlInput1">
</div>

<div style="margin-bottom:125px;" class="form__div col-sm-8">
                    <select id="length" style="background-color: #121414; border-color: #80868b; color: #80868b; border-radius: 10px;" class="form-select" aria-label="Default select example" name="select">
  <option selected disabled>Select option</option>
  <option value="1">1 Day</option>
  <option value="2">3 Days</option>
  <option value="3">7 Days</option>
  <option value="4">30 Days</option>
  <option value="5">Free Trial</option>
</select>
                </div>




            
            </div>

        <button name="add" data-bs-dismiss="modal" type="submit"  style="margin-bottom: 20px; margin-right: 7px;" class="btn btn-sm btn-primary">Add</button>
      </form>
            <script>
            document.getElementById("length").onchange = changeListener;
function changeListener(){
    var keyinput = document.getElementById("keystr").value;
    var value = this.value;
    switch(value) {
        case "4":
            document.getElementById("keystr").value = generate(2300);  
            break;
        case "3":
            document.getElementById("keystr").value = generate(2288);  
            break;
        case "2":
            document.getElementById("keystr").value = generate(2244);  
            break;
        case "1":
            document.getElementById("keystr").value = generate(2222);  
            break;
        case "ft":
            document.getElementById("keystr").value = generate(2240);  
            break;
       
    }
}
function getRandomInt(max) {
    return Math.floor(Math.random() * max);
}            
function strpos( haystack, needle, offset){	// Find position of first occurrence of a string
    var i = haystack.indexOf( needle, offset ); // returns -1
    return i >= 0 ? i : false;
}
function ord( string ) {	// Return ASCII value of character
    return string.charCodeAt(0);
}                       
function chr( ascii ) {
    return String.fromCharCode(ascii);
}                               
function generate(reqsum)
{
    var letters = "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM0123456789";
    var char = 0;
    var sum = 0;
    var origsum = reqsum;
    keystr = [];
    while (1){
        while (reqsum>122){
            char = letters[getRandomInt(62)];
            reqsum-=ord(char);
            keystr.push(char);
            //console.log(keystr);
        }
        keystr.push(chr(reqsum));
        if (!letters.includes(keystr.at(-1))){
            reqsum = origsum;
            sum = 0;
            keystr = [];
        }
        else
        {
            keystr = keystr.join("");
            return keystr;
        }
    }                    
}

</script>
        </div>
    </div>
</div>
<?php
if (isset($_GET['sort'])) {
           $count = DBA::query("SELECT COUNT(*) FROM accounts_apex WHERE t=:t AND account_buyed=0 ORDER BY id DESC", array(':t'=>$_GET['sort']))[0]['COUNT(*)'];
       } else {
           $count = DBA::query("SELECT COUNT(*) FROM accounts_apex WHERE account_buyed=0 ORDER BY id DESC")[0]['COUNT(*)'];
       }
       ?>
        <div class="col-md-auto d-flex align-items-center">
        <h1>Accounts Apex</h1>
        <a style="margin-top: 20px; margin-left: 7px;" data-bs-toggle="modal" href="#" data-bs-target="#reviewModal" class="price__card__button">Add</a>
        </div>

        <p>Free Accounts: <?=$count?></p>
        <div class="col-md-auto d-flex align-items-center">
        <a style="margin-bottom: 20px; margin-right: 7px;" href="?sort=1day" class="btn btn-sm btn-primary">1 day</a>
        <a style="margin-bottom: 20px; margin-right: 7px;" href="?sort=3days" class="btn btn-sm btn-primary">7 days</a>
        <a style="margin-bottom: 20px; margin-right: 7px;" href="?sort=7days" class="btn btn-sm btn-primary">30 days</a>
        </div>
        
       <div id="chatc">
       <?php
       if (isset($_GET['sort'])) {
           $reviews = DBA::query("SELECT * FROM accounts_apex WHERE t=:t AND account_buyed=0 ORDER BY id DESC", array(':t'=>$_GET['sort']));
       } else {
           $reviews = DBA::query("SELECT * FROM accounts_apex WHERE account_buyed=0 ORDER BY id DESC");
       }
        
        foreach ($reviews as $r) {
            $color = '#1BB84B';
            echo '<a style="color: #fff;"><div style="background-color: '.$color.';" class="card mb-3">
            <div class="card-body">
                Key: '.$r['key_t'].'<br>
                '.$r['t'].'<br>
                <a class="btn btn-danger" href="/api/Admin/AccountsCheat/Delete?id='.$r['id'].'">Delete</a>
            </div>
            
        </div></a>';
        }
        ?>
       </div>
        
    </body>
</html>