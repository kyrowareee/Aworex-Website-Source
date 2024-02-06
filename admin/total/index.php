

<?php include $_SERVER['DOCUMENT_ROOT']."/classes/DB.php"; ?>
<?php include $_SERVER['DOCUMENT_ROOT']."/classes/Date.php"; ?>
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
  <h1>Total</h1>
  <?php
  $total = DB::query('SELECT * FROM total');
$totalprice = 0;
  foreach ($total as $t) {
    
    if ($t['account_id'] === '1') {
        $price = 35;
        $totalprice = $totalprice+35;
        $name = 'Standard Account';
      } else if ($t['account_id'] === '2') {
        $price = 50;
        $totalprice = $totalprice+50;
        $name = 'Left Behind Account';
      } else if ($t['account_id'] === '3') {
        $price = 75;
        $totalprice = $totalprice+75;
        $name = 'Prepare for Escape Account';
      } else if ($t['account_id'] === '4') {
        $price = 99;
        $name = 'Edge of Darkness Account';
      } else if ($t['account_id'] === 'cheat1') {
        $price = 5;
        $totalprice = $totalprice+5;
        $name = 'Cheat for 1 Day';
      } else if ($t['account_id'] === 'cheat3') {
        $price = 30;
        $totalprice = $totalprice+30;
        $name = 'Cheat for 7 Days';
      } else if ($t['account_id'] === 'cheat4') {
        $price = 50;
        $totalprice = $totalprice+50;
        $name = 'Cheat for 15 Days';
      } else if ($t['account_id'] === 'cheat5') {
        $price = 80;
        $totalprice = $totalprice+80;
        $name = 'Cheat for 30 Days';
      } else if ($t['account_id'] === 'cheat6') {
        $price = 119;
        $totalprice = $totalprice+119;
        $name = 'Cheat for Lifetime';
      } else if ($t['account_id'] === 'spoofer') {
        $price = 35;
        $totalprice = $totalprice+35;
        $name = 'Spoofer';
      }
      $totalprice+$price;
  }
?>
<h4>Total earned: <?=$totalprice?>$</h4>
  <table class="table">
  <thead>
    <tr>
      <th style="color: #fff;" scope="col">#</th>
      <th style="color: #fff;" scope="col">Name Product</th>
      <th style="color: #fff;" scope="col">Time</th>
      <th style="color: #fff;" scope="col">User</th>
    </tr>
  </thead>
  <tbody>
   <?php
   $total = DB::query('SELECT * FROM total ORDER BY id DESC');
   foreach ($total as $t) {
    $username = DB::query('SELECT username FROM users WHERE id=:id', array(':id'=>$t['user_id']))[0]['username'];
    if ($t['account_id'] === '1') {
        $price = 35;
        $name = 'Standard Account';
      } else if ($t['account_id'] === '2') {
        $price = 50;
        $name = 'Left Behind Account';
      } else if ($t['account_id'] === '3') {
        $price = 75;
        $name = 'Prepare for Escape Account';
      } else if ($t['account_id'] === '4') {
        $price = 99;
        $name = 'Edge of Darkness Account';
      } else if ($t['account_id'] === 'cheat1') {
        $price = 5;
        $name = 'Cheat for 1 Day';
      } else if ($t['account_id'] === 'cheat3') {
        $price = 30;
        $name = 'Cheat for 7 Days';
      } else if ($t['account_id'] === 'cheat4') {
        $price = 50;
        $name = 'Cheat for 15 Days';
      } else if ($t['account_id'] === 'cheat5') {
        $price = 80;
        $name = 'Cheat for 30 Days';
      } else if ($t['account_id'] === 'cheat6') {
        $price = 119;
        $name = 'Cheat for Lifetime';
      } else if ($t['account_id'] === 'spoofer') {
        $price = 35;
        $name = 'Spoofer';
      }
    echo ' <tr>
    <th style="color: #fff;" scope="row">'.$t['id'].'</th>
    <td style="color: #fff;">'.$name.'</td>
    <td style="color: #fff;">'.zmdate($t['time']).'</td>
    <td style="color: #fff;">'.$username.'</td>
  </tr>';
   } ?>
  </tbody>
</table>
</div>
    </body>
</html>