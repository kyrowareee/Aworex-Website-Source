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

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

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
                        url: '/api/Admin/AccountsCheat/Add',
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
                        url: '/api/Admin/AccountsCheat/List',
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
            <form id="reviewAdd" action="" method="post">
            
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Key</label>
  <input id="keystr" name="password" type="text" class="form-control" id="exampleFormControlInput1">
</div>
<div style="margin-bottom:125px;" class="form__div col-sm-8">
                    <select id="length" style="background-color: #121414; border-color: #80868b; color: #80868b; border-radius: 10px;" class="form-select" aria-label="Default select example" name="select">
  <option selected disabled>Select option</option>
  <option value="1">1 Day</option>
  <option value="2">7 Days</option>
  <option value="3">30 Days</option>
  <option value="4">Lifetime</option>
  <option value="ft">Free Test</option>
</select>
                </div>




            
            </div>

            <div class="modal-footer">
            <button data-bs-dismiss="modal" type="submit" style="margin-top: 20px; margin-left: 7px;" class="price__card__button">Add</button>
      </div>
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
 $link1 = '?sort=id-down';
    $link3 = '?sort=user-down';
    $link4 = '?sort=buydate-down';
    $link5 = '?sort=ip-down';

    $ic1 = 'bx-up-arrow-alt';
    $ic3 = 'bx-up-arrow-alt';
    $ic4 = 'bx-up-arrow-alt';
    $ic5 = 'bx-up-arrow-alt';
    if ($_GET['sort'] === 'id-down') {

      $table = 'ORDER BY id DESC';
      $link1 = '?';
      $ic1 = 'bx-down-arrow-alt';
    }

    if ($_GET['sort'] === 'user-down') {

      $table = 'ORDER BY user_id DESC';
      $link3 = '?';
      $ic3 = 'bx-down-arrow-alt';
    }

    if ($_GET['sort'] === 'buydate-down') {

      $table = 'ORDER BY date DESC';
      $link4 = '?';
      $ic4 = 'bx-down-arrow-alt';
    }

    if ($_GET['sort'] === 'ip-down') {

      $table = 'ORDER BY ip DESC';
      $link5 = '?';
      $ic5 = 'bx-down-arrow-alt';
    }





    ?>
        <div class="col-md-auto d-flex align-items-center">
        <h1>Accounts Cheat Selled</h1>
        </div>
        <table class="table">
  <thead>
    <tr style="color: #fff;">
      <th scope="col">ID <a href="<?= $link1 ?>"><i style="font-size: 17px; color: #fff;" class='bx <?= $ic1 ?>'></i></a></th>
      <th scope="col">Key</th>
      <th scope="col">Product</th>
      <th scope="col">User <a href="<?= $link3 ?>"><i style="font-size: 17px; color: #fff;" class='bx <?= $ic3 ?>'></i></a></th>
      <th scope="col">Buy Date <a href="<?= $link4 ?>"><i style="font-size: 17px; color: #fff;" class='bx <?= $ic4 ?>'></i></a></th>
      <th scope="col">IP <a href="<?= $link5 ?>"><i style="font-size: 17px; color: #fff;" class='bx <?= $ic5 ?>'></i></a></th>
    </tr>
  </thead>
  <tbody style="color: #fff;">
   <?php
        if (!isset($_GET['sort'])) {
            $reviews = DB::query('SELECT * FROM shops_tokens');
        } else {
            $reviews = DB::query('SELECT * FROM shops_tokens '.$table);
        }
        foreach ($reviews as $r) {
             
             $datauser = DB::query('SELECT * FROM users WHERE id=:id', array(':id'=>$r['user_id']))[0];
             if ($r['account_id'] === '1') {

    $name = 'Standard Account';
    $descp = '✅ NEW Account<br>
        ✅ Any region - USA/EU/CIS<br>
        ✅ Full access<br>
        ✅ New email only for Tarkov acc<br>
        ✅ You will get Email/ Email password / Tarkov password';
  } else if ($r['account_id'] === '2') {

    $name = 'Left Behind Account';
    $descp = '✅ NEW Account<br>
        ✅ Any region - USA/EU/CIS<br>
        ✅ Full access<br>
        ✅ New email only for Tarkov acc<br>
        ✅ You will get Email/ Email password / Tarkov password';
  } else if ($r['account_id'] === '3') {

    $name = 'Prepare for Escape Account';
    $descp = '✅ NEW Account<br>
        ✅ Any region - USA/EU/CIS<br>
        ✅ Full access<br>
        ✅ New email only for Tarkov acc<br>
        ✅ You will get Email/ Email password / Tarkov password';
  } else if ($r['account_id'] === '4') {

    $name = 'Edge of Darkness Account';
    $descp = '✅ NEW Account<br>
        ✅ Any region - USA/EU/CIS<br>
        ✅ Full access<br>
        ✅ New email only for Tarkov acc<br>
        ✅ You will get Email/ Email password / Tarkov password';
  } else if ($r['account_id'] === 'cheat1') {
$data = DBA::query('SELECT * FROM accounts_cheat WHERE id=:id', array(':id'=>$r['accountcr_id']))[0];
    $name = 'Cheat for 1 Day';
    $descp = '⭐ ESP (Opponents)<br>
    ⭐ ESP (Items)<br>
    ⭐ NoRecoil<br>
    ⭐ Big heads<br>';
  } else if ($r['account_id'] === 'cheat3') {
$data = DBA::query('SELECT * FROM accounts_cheat WHERE id=:id', array(':id'=>$r['accountcr_id']))[0];
    $name = 'Cheat for 7 Days';

    $descp = '⭐ ESP (Opponents)<br>
    ⭐ ESP (Items)<br>
    ⭐ NoRecoil<br>
    ⭐ Big heads<br>';
  } else if ($r['account_id'] === 'cheat4') {
$data = DBA::query('SELECT * FROM accounts_cheat WHERE id=:id', array(':id'=>$r['accountcr_id']))[0];
    $name = 'Cheat for 15 Days';
    $descp = '⭐ ESP (Opponents)<br>
    ⭐ ESP (Items)<br>
    ⭐ NoRecoil<br>
    ⭐ Big heads<br>';
  } else if ($r['account_id'] === 'cheat5') {
$data = DBA::query('SELECT * FROM accounts_cheat WHERE id=:id', array(':id'=>$r['accountcr_id']))[0];
    $name = 'Cheat for 30 Days';
    $descp = '⭐ ESP (Opponents)<br>
    ⭐ ESP (Items)<br>
    ⭐ NoRecoil<br>
    ⭐ Big heads<br>';
  } else if ($r['account_id'] === 'cheat6') {
$data = DBA::query('SELECT * FROM accounts_cheat WHERE id=:id', array(':id'=>$r['accountcr_id']))[0];
    $name = 'Cheat for Lifetime';
    $descp = '⭐ ESP (Opponents)<br>
    ⭐ ESP (Items)<br>
    ⭐ NoRecoil<br>
    ⭐ Big heads<br>';
  } else if ($r['account_id'] === 'spoofer') {
$data = DBA::query('SELECT * FROM accounts_spoofer WHERE id=:id', array(':id'=>$r['accountcr_id']))[0];
    $name = 'Spoofer';
    $descp = 'OLD SPOOFER';
  } else if ($r['account_id'] === 'spoofer1') {
$data = DBA::query('SELECT * FROM accounts_spoofer WHERE id=:id', array(':id'=>$r['accountcr_id']))[0];
    $name = 'Spoofer for 7 Days';
    $descp = '<br>⚡ Enjoy your games while staying undetected.<br> Bypass detections with the help from our HWID Spoofer ⚡<br><br>

    ⭐ Works in many games<br>
            ⭐ For Anti cheat: BattlEye, EasyAntiCheat<br>
            ⭐ Changes data only until the PC is restarted<br><br>
            ✅ Mac address<br>
    ✅ Disk serial number<br>
    ✅ Libraries<br>
    ✅ Cleaning usn magazines<br>
    ✅ Clean up system token logs<br>';
  } else if ($r['account_id'] === 'spoofer2') {
$data = DBA::query('SELECT * FROM accounts_spoofer WHERE id=:id', array(':id'=>$r['accountcr_id']))[0];
    $name = 'Spoofer for 30 Days';
    $descp = '<br>⚡ Enjoy your games while staying undetected.<br> Bypass detections with the help from our HWID Spoofer ⚡<br><br>

    ⭐ Works in many games<br>
            ⭐ For Anti cheat: BattlEye, EasyAntiCheat<br>
            ⭐ Changes data only until the PC is restarted<br><br>
            ✅ Mac address<br>
    ✅ Disk serial number<br>
    ✅ Libraries<br>
    ✅ Cleaning usn magazines<br>';
   } else if ($r['account_id'] === 'spoofer3') {
$data = DBA::query('SELECT * FROM accounts_spoofer WHERE id=:id', array(':id'=>$r['accountcr_id']))[0];
    $name = 'Spoofer for 30 Days';
    $descp = '<br>⚡ Enjoy your games while staying undetected.<br> Bypass detections with the help from our HWID Spoofer ⚡<br><br>

    ⭐ Works in many games<br>
            ⭐ For Anti cheat: BattlEye, EasyAntiCheat<br>
            ⭐ Changes data only until the PC is restarted<br><br>
            ✅ Mac address<br>
    ✅ Disk serial number<br>
    ✅ Libraries<br>
    ✅ Cleaning usn magazines<br>';
  } else if ($r['account_id'] === 'update') {
    $name = 'Update';
    $descp = ' <br>UPDATE';
  } else if ($r['account_id']=== 'val1') {
$data = DBA::query('SELECT * FROM accounts_valorant WHERE id=:id', array(':id'=>$r['accountcr_id']))[0];
    $name = 'Valorant Cheat 1 Day';
    $descp = ' <br>';
  } else if ($r['account_id'] === 'val2') {
$data = DBA::query('SELECT * FROM accounts_valorant WHERE id=:id', array(':id'=>$r['accountcr_id']))[0];
    $name = 'Valorant Cheat 7 Days';
    $descp = ' <br>';
  } else if ($r['account_id'] === 'val3') {
$data = DBA::query('SELECT * FROM accounts_valorant WHERE id=:id', array(':id'=>$r['accountcr_id']))[0];
    $name = 'Valorant Cheat 30 Days';
    $descp = ' <br>';
  






   } else if ($r['account_id'] === 'frl1') {
$data = DBA::query('SELECT * FROM accounts_farlight WHERE id=:id', array(':id'=>$r['accountcr_id']))[0];
    $name = 'Farlight Cheat 1 Day';
    $descp = ' <br>';
  } else if ($r['account_id'] === 'frl2') {
$data = DBA::query('SELECT * FROM accounts_farlight WHERE id=:id', array(':id'=>$r['accountcr_id']))[0];
    $name = 'Farlight Cheat 7 Days';
    $descp = ' <br>';
  } else if ($r['account_id'] === 'frl3') {
$data = DBA::query('SELECT * FROM accounts_farlight WHERE id=:id', array(':id'=>$r['accountcr_id']))[0];
    $name = 'Farlight Cheat 30 Days';
    $descp = ' <br>';
  



  } else if ($r['account_id'] === 'csgo1') {
$data = DBA::query('SELECT * FROM accounts_csgo WHERE id=:id', array(':id'=>$r['accountcr_id']))[0];
    $name = 'CS2 Cheat 1 Day';
    $descp = ' <br>';
  } else if ($r['account_id'] === 'csgo2') {
$data = DBA::query('SELECT * FROM accounts_csgo WHERE id=:id', array(':id'=>$r['accountcr_id']))[0];
    $name = 'CS2 Cheat 7 Days';
    $descp = ' <br>';
  } else if ($r['account_id'] === 'csgo3') {
$data = DBA::query('SELECT * FROM accounts_csgo WHERE id=:id', array(':id'=>$r['accountcr_id']))[0];
    $name = 'CS2 Cheat 30 Days';
    $descp = ' <br>';
  



   } else if ($r['account_id'] === 'ap1') {

    $name = 'Apex Cheat 1 Day';
    $descp = ' <br>';
  } else if ($r['account_id'] === 'ap2') {

    $name = 'Apex Cheat 7 Days';
    $descp = ' <br>';
  } else if ($r['account_id'] === 'ap3') {

    $descp = ' <br>';
  } else if ($r['account_id'] === 'ap4') {

    $name = 'Apex Cheat Lifetime';
    $descp = ' <br>';
  


 } else if ($r['account_id']=== 'ov1') {
    $name = 'Overwatch Cheat 1 Day';
    $descp = ' <br>';
  } else if ($r['account_id'] === 'ov2') {
    $name = 'Overwatch Cheat 7 Days';
    $descp = ' <br>';
  } else if ($r['account_id'] === 'ov3') {

    $name = 'Overwatch Cheat 30 Days';
    $descp = ' <br>';
  } else if ($r['account_id'] === 'ov4') {
    $name = 'Overwatch Cheat Lifetime';
    $descp = ' <br>';
  }
  if ((int)$r['accountcr_id'] === 10000013) {
    $key = '<i>The key was issued manually</i>';
  } else {
    $key = $data['key_t'];
  }
    echo '<tr>
      <th scope="row">'.$r['id'].'</th>
      <td>'.$key.'</td>
      <td>'.$name.'</td>
      <td>'.$datauser['email'].'</td>
      <td>'.$r['date'].'</td>
      <td>'.$r['ip'].'</td>
    </tr>';
        
        }
        ?>
  </tbody>
</table>
       <div id="chatc">
      
            
       </div>
        
    </body>
</html>