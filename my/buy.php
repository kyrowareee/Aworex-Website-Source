<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";
require $_SERVER['DOCUMENT_ROOT'] . "/classes/DB.php";
include($_SERVER['DOCUMENT_ROOT'] . '/classes/Auth.php');

$data1 = DBA::query('SELECT COUNT(1) FROM accounts WHERE account_id=1 AND account_buyed=0')[0]['COUNT(1)'];
$data2 = DBA::query('SELECT COUNT(1) FROM accounts WHERE account_id=2 AND account_buyed=0')[0]['COUNT(1)'];
$data3 = DBA::query('SELECT COUNT(1) FROM accounts WHERE account_id=3 AND account_buyed=0')[0]['COUNT(1)'];
$data4 = DBA::query('SELECT COUNT(1) FROM accounts WHERE account_id=4 AND account_buyed=0')[0]['COUNT(1)'];


if (isset($_GET['id'])) {
  if ($_GET['id'] === '1') {
    $price = '35';
    $pricetoken = '$'.$price;
    $_SESSION['productid'] = $_GET['id'];
    $_SESSION['price'] = $price;
    $name = 'Standard Account';
    $descp = '✅ NEW Account<br>
        
        ✅ Full access<br>
        ✅ New email only for Tarkov acc<br>
        ✅ You will get Email/ Email password / Tarkov password';
  } else if ($_GET['id'] === '2') {
    $price = '50';
    $pricetoken = '$'.$price;
    $_SESSION['productid'] = $_GET['id'];
    $_SESSION['price'] = $price;
    $name = 'Left Behind Account';
    $descp = '✅ NEW Account<br>
        
        ✅ Full access<br>
        ✅ New email only for Tarkov acc<br>
        ✅ You will get Email/ Email password / Tarkov password';
  } else if ($_GET['id'] === '3') {
    $price = '75';
    $pricetoken = '$'.$price;
    $_SESSION['productid'] = $_GET['id'];
    $_SESSION['price'] = $price;
    $name = 'Prepare for Escape Account';
    $descp = '✅ NEW Account<br>
        
        ✅ Full access<br>
        ✅ New email only for Tarkov acc<br>
        ✅ You will get Email/ Email password / Tarkov password';
  } else if ($_GET['id'] === '4') {
    $price = '99';
    $pricetoken = '$'.$price;
    $_SESSION['productid'] = $_GET['id'];
    $_SESSION['price'] = $price;
    $name = 'Edge of Darkness Account';
    $descp = '✅ NEW Account<br>
        
        ✅ Full access<br>
        ✅ New email only for Tarkov acc<br>
        ✅ You will get Email/ Email password / Tarkov password';
  } else if ($_GET['id'] === 'cheat1') {
    if ($_SESSION['val'] === 'eu') {
      $price = '5.49';
      $pricetoken = '€'.$price;
    } else {
      $price = '5';
      $pricetoken = '$'.$price;
    }
    $_SESSION['productid'] = $_GET['id'];
    $_SESSION['price'] = $price;
    $name = 'Cheat for 1 Day';
    $descp = '⭐ ESP (Opponents)<br>
    ⭐ ESP (Items)<br>
    ⭐ NoRecoil<br>
    ⭐ Big heads<br>⭐ LagSwitch<br>';
  } else if ($_GET['id'] === 'cheat3') {
    if ($_SESSION['val'] === 'eu') {
      $price = '24.99';
      $pricetoken = '€'.$price;
    } else {
      $price = '30';
      $pricetoken = '$'.$price;
    }
    $_SESSION['productid'] = $_GET['id'];
    $_SESSION['price'] = $price;
    $name = 'Cheat for 7 Days';
    $descp = '⭐ ESP (Opponents)<br>
    ⭐ ESP (Items)<br>
    ⭐ NoRecoil<br>
    ⭐ Big heads<br>⭐ LagSwitch<br>';
  } else if ($_GET['id'] === 'cheat4') {
    $price = '50';
    $pricetoken = '$'.$price;
    $_SESSION['productid'] = $_GET['id'];
    $_SESSION['price'] = $price;
    $name = 'Cheat for 15 Days';
    $descp = '⭐ ESP (Opponents)<br>
    ⭐ ESP (Items)<br>
    ⭐ NoRecoil<br>
    ⭐ Big heads<br>⭐ LagSwitch<br>';
  } else if ($_GET['id'] === 'cheat5') {
    if ($_SESSION['val'] === 'eu') {
      $price = '74.99';
      $pricetoken = '€'.$price;
    } else {
      $price = '80';
      $pricetoken = '$'.$price;
    }
    $_SESSION['productid'] = $_GET['id'];
    $_SESSION['price'] = $price;
    $name = 'Cheat for 30 Days';
    $descp = '⭐ ESP (Opponents)<br>
    ⭐ ESP (Items)<br>
    ⭐ NoRecoil<br>
    ⭐ Big heads<br>⭐ LagSwitch<br>';
  } else if ($_GET['id'] === 'cheat6') {
    if ($_SESSION['val'] === 'eu') {
      $price = '164.99';
      $pricetoken = '€'.$price;
    } else {
      $price = '179';
      $pricetoken = '$'.$price;
    }
    $_SESSION['productid'] = $_GET['id'];
    $_SESSION['price'] = $price;
    $name = 'Cheat for Lifetime';
    $descp = '⭐ ESP (Opponents)<br>
    ⭐ ESP (Items)<br>
    ⭐ NoRecoil<br>
    ⭐ Big heads<br>
    ⭐ LagSwitch<br>';
  } else if ($_GET['id'] === 'spoofer') {
    $price = '9999';
    $pricetoken = '$'.$price;
    $_SESSION['productid'] = $_GET['id'];
    $_SESSION['price'] = $price;
    $name = 'Spoofer';
    $descp = 'OLD SPOOFER LINK, NOT WORKED';
  } else if ($_GET['id'] === 'spoofer1') {
   if ($_SESSION['val'] === 'eu') {
      $price = '18.49';
      $pricetoken = '€'.$price;
    } else {
      $price = '20';
      $pricetoken = '$'.$price;
    }
    $_SESSION['productid'] = $_GET['id'];
    $_SESSION['price'] = $price;
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
  } else if ($_GET['id'] === 'spoofer2') {
   if ($_SESSION['val'] === 'eu') {
      $price = '46.29';
      $pricetoken = '€'.$price;
    } else {
      $price = '50';
      $pricetoken = '$'.$price;
    }
    $_SESSION['productid'] = $_GET['id'];
    $_SESSION['price'] = $price;
    $name = 'Spoofer for 30 Days';
    $descp = '<br>⚡ Enjoy your games while staying undetected.<br> Bypass detections with the help from our HWID Spoofer ⚡<br><br>

    ⭐ Works in many games<br>
            ⭐ For Anti cheat: BattlEye, EasyAntiCheat<br>
            ⭐ Changes data only until the PC is restarted<br><br>
            ✅ Mac address<br>
    ✅ Disk serial number<br>
    ✅ Libraries<br>
    ✅ Cleaning usn magazines<br>';
   } else if ($_GET['id'] === 'spoofer3') {
   if ($_SESSION['val'] === 'eu') {
      $price = '46.29';
      $pricetoken = '€'.$price;
    } else {
      $price = '99';
      $pricetoken = '$'.$price;
    }
    $_SESSION['productid'] = $_GET['id'];
    $_SESSION['price'] = $price;
    $name = 'Spoofer for Lifetime';
    $descp = '<br>⚡ Enjoy your games while staying undetected.<br> Bypass detections with the help from our HWID Spoofer ⚡<br><br>

    ⭐ Works in many games<br>
            ⭐ For Anti cheat: BattlEye, EasyAntiCheat<br>
            ⭐ Changes data only until the PC is restarted<br><br>
            ✅ Mac address<br>
    ✅ Disk serial number<br>
    ✅ Libraries<br>
    ✅ Cleaning usn magazines<br>';
  } else if ($_GET['id'] === 'update') {
    $price = '50';
    $pricetoken = '$'.$price;
    $_SESSION['productid'] = $_GET['id'];
    $_SESSION['price'] = $price;
    $name = 'Update';
    $descp = ' <br>UPDATE';
  } else if ($_GET['id'] === 'val1') {
   if ($_SESSION['val'] === 'eu') {
      $price = '6.59';
      $pricetoken = '€'.$price;
    } else {
      $price = '7';
      $pricetoken = '$'.$price;
    }
    $_SESSION['productid'] = $_GET['id'];
    $_SESSION['price'] = $price;
    $name = 'Valorant Cheat 1 Day';
    $descp = ' <br>';
  } else if ($_GET['id'] === 'val2') {
   if ($_SESSION['val'] === 'eu') {
      $price = '32.29';
      $pricetoken = '€'.$price;
    } else {
      $price = '35';
      $pricetoken = '$'.$price;
    }
    $_SESSION['productid'] = $_GET['id'];
    $_SESSION['price'] = $price;
    $name = 'Valorant Cheat 7 Days';
    $descp = ' <br>';
  } else if ($_GET['id'] === 'val3') {
   if ($_SESSION['val'] === 'eu') {
      $price = '72.99';
      $pricetoken = '€'.$price;
    } else {
      $price = '90';
      $pricetoken = '$'.$price;
    }
    $_SESSION['productid'] = $_GET['id'];
    $_SESSION['price'] = $price;
    $name = 'Valorant Cheat 30 Days';
    $descp = ' <br>';
  






   } else if ($_GET['id'] === 'frl1') {
   if ($_SESSION['val'] === 'eu') {
      $price = '72.99';
      $pricetoken = '€'.$price;
    } else {
      $price = '3';
      $pricetoken = '$'.$price;
    }
    $_SESSION['productid'] = $_GET['id'];
    $_SESSION['price'] = $price;
    $name = 'Farlight Cheat 1 Day';
    $descp = ' <br>';
  } else if ($_GET['id'] === 'frl2') {
   if ($_SESSION['val'] === 'eu') {
      $price = '72.99';
      $pricetoken = '€'.$price;
    } else {
      $price = '15';
      $pricetoken = '$'.$price;
    }
    $_SESSION['productid'] = $_GET['id'];
    $_SESSION['price'] = $price;
    $name = 'Farlight Cheat 7 Days';
    $descp = ' <br>';
  } else if ($_GET['id'] === 'frl3') {
   if ($_SESSION['val'] === 'eu') {
      $price = '72.99';
      $pricetoken = '€'.$price;
    } else {
      $price = '50';
      $pricetoken = '$'.$price;
    }
    $_SESSION['productid'] = $_GET['id'];
    $_SESSION['price'] = $price;
    $name = 'Farlight Cheat 30 Days';
    $descp = ' <br>';
  



  } else if ($_GET['id'] === 'csgo1') {
   if ($_SESSION['val'] === 'eu') {
      $price = '72.99';
      $pricetoken = '€'.$price;
    } else {
      $price = '3';
      $pricetoken = '$'.$price;
    }
    $_SESSION['productid'] = $_GET['id'];
    $_SESSION['price'] = $price;
    $name = 'CS2 Cheat 1 Day';
    $descp = ' <br>';
  } else if ($_GET['id'] === 'csgo2') {
   if ($_SESSION['val'] === 'eu') {
      $price = '72.99';
      $pricetoken = '€'.$price;
    } else {
      $price = '15';
      $pricetoken = '$'.$price;
    }
    $_SESSION['productid'] = $_GET['id'];
    $_SESSION['price'] = $price;
    $name = 'CS2 Cheat 7 Days';
    $descp = ' <br>';
  } else if ($_GET['id'] === 'csgo3') {
   if ($_SESSION['val'] === 'eu') {
      $price = '72.99';
      $pricetoken = '€'.$price;
    } else {
      $price = '25';
      $pricetoken = '$'.$price;
    }
    $_SESSION['productid'] = $_GET['id'];
    $_SESSION['price'] = $price;
    $name = 'CS2 Cheat 30 Days';
    $descp = ' <br>';
    } else if ($_GET['id'] === 'csgo4') {
   if ($_SESSION['val'] === 'eu') {
      $price = '72.99';
      $pricetoken = '€'.$price;
    } else {
      $price = '75';
      $pricetoken = '$'.$price;
    }
    $_SESSION['productid'] = $_GET['id'];
    $_SESSION['price'] = $price;
    $name = 'CS2 Cheat Lifetime';
    $descp = ' <br>';
  



   } else if ($_GET['id'] === 'ap1') {
   if ($_SESSION['val'] === 'eu') {
      $price = '72.99';
      $pricetoken = '€'.$price;
    } else {
      $price = '4';
      $pricetoken = '$'.$price;
    }
    $_SESSION['productid'] = $_GET['id'];
    $_SESSION['price'] = $price;
    $name = 'Apex Cheat 1 Day';
    $descp = ' <br>';
  } else if ($_GET['id'] === 'ap2') {
   if ($_SESSION['val'] === 'eu') {
      $price = '72.99';
      $pricetoken = '€'.$price;
    } else {
      $price = '10';
      $pricetoken = '$'.$price;
    }
    $_SESSION['productid'] = $_GET['id'];
    $_SESSION['price'] = $price;
    $name = 'Apex Cheat 7 Days';
    $descp = ' <br>';
  } else if ($_GET['id'] === 'ap3') {
   if ($_SESSION['val'] === 'eu') {
      $price = '72.99';
      $pricetoken = '€'.$price;
    } else {
      $price = '20';
      $pricetoken = '$'.$price;
    }
    $_SESSION['productid'] = $_GET['id'];
    $_SESSION['price'] = $price;
    $name = 'Apex Cheat 30 Days';
    $descp = ' <br>';
  } else if ($_GET['id'] === 'ap4') {
   if ($_SESSION['val'] === 'eu') {
      $price = '72.99';
      $pricetoken = '€'.$price;
    } else {
      $price = '50';
      $pricetoken = '$'.$price;
    }
    $_SESSION['productid'] = $_GET['id'];
    $_SESSION['price'] = $price;
    $name = 'Apex Cheat Lifetime';
    $descp = ' <br>';
  


 } else if ($_GET['id'] === 'ov1') {
   if ($_SESSION['val'] === 'eu') {
      $price = '72.99';
      $pricetoken = '€'.$price;
    } else {
      $price = '4';
      $pricetoken = '$'.$price;
    }
    $_SESSION['productid'] = $_GET['id'];
    $_SESSION['price'] = $price;
    $name = 'Overwatch Cheat 1 Day';
    $descp = ' <br>';
  } else if ($_GET['id'] === 'ov2') {
   if ($_SESSION['val'] === 'eu') {
      $price = '25';
      $pricetoken = '€'.$price;
    } else {
      $price = '10';
      $pricetoken = '$'.$price;
    }
    $_SESSION['productid'] = $_GET['id'];
    $_SESSION['price'] = $price;
    $name = 'Overwatch Cheat 7 Days';
    $descp = ' <br>';
  } else if ($_GET['id'] === 'ov3') {
   if ($_SESSION['val'] === 'eu') {
      $price = '72.99';
      $pricetoken = '€'.$price;
    } else {
      $price = '65';
      $pricetoken = '$'.$price;
    }
    $_SESSION['productid'] = $_GET['id'];
    $_SESSION['price'] = $price;
    $name = 'Overwatch Cheat 30 Days';
    $descp = ' <br>';
  } else if ($_GET['id'] === 'ov4') {
   if ($_SESSION['val'] === 'eu') {
      $price = '72.99';
      $pricetoken = '€'.$price;
    } else {
      $price = '129';
      $pricetoken = '$'.$price;
    }
    $_SESSION['productid'] = $_GET['id'];
    $_SESSION['price'] = $price;
    $name = 'Overwatch Cheat Lifetime';
    $descp = ' <br>';
  } else if ($_GET['id'] === 'valk1') {
    $price = '7.99';
    $pricetoken = '€'.$price;
    $_SESSION['productid'] = $_GET['id'];
    $_SESSION['price'] = $price;
    $name = 'Valkyrie EFT Cheat 1 Day';
    $descp = ' <br>';
  } else if ($_GET['id'] === 'valk2') {
    $price = '34.99';
    $pricetoken = '€'.$price;
    $_SESSION['productid'] = $_GET['id'];
    $_SESSION['price'] = $price;
    $name = 'Valkyrie EFT Cheat 7 Days';
    $descp = ' <br>';
  } else if ($_GET['id'] === 'valk3') {
    $price = '79.99';
    $pricetoken = '€'.$price;
    $_SESSION['productid'] = $_GET['id'];
    $_SESSION['price'] = $price;
    $name = 'Valkyrie EFT Cheat 30 Days';
    $descp = ' <br>';
  } else if ($_GET['id'] === 'valk4') {
    $price = '369.99';
    $pricetoken = '€'.$price;
    $_SESSION['productid'] = $_GET['id'];
    $_SESSION['price'] = $price;
    $name = 'Valkyrie EFT Cheat Lifetime';
    $descp = ' <br>';
  } else if ($_GET['id'] === 'arena1') {
    $price = '4';
    $pricetoken = '$'.$price;
    $_SESSION['productid'] = $_GET['id'];
    $_SESSION['price'] = $price;
    $name = 'EFT: Arena for 1 day';
    $descp = ' <br>';
  } else if ($_GET['id'] === 'arena2') {
    $price = '25';
    $pricetoken = '$'.$price;
    $_SESSION['productid'] = $_GET['id'];
    $_SESSION['price'] = $price;
    $name = 'EFT: Arena for 7 days';
    $descp = ' <br>';
  } else if ($_GET['id'] === 'arena3') {
    $price = '75';
    $pricetoken = '$'.$price;
    $_SESSION['productid'] = $_GET['id'];
    $_SESSION['price'] = $price;
    $name = 'EFT: Arena for 30 days';
    $descp = ' <br>';
  } else if ($_GET['id'] === 'arena4') {
    $price = '149';
    $pricetoken = '$'.$price;
    $_SESSION['productid'] = $_GET['id'];
    $_SESSION['price'] = $price;
    $name = 'EFT: Arena for Lifetime';
    $descp = ' <br>';
  } else if ($_GET['id'] === 'fivem1') {
    $price = '3';
    $pricetoken = '$'.$price;
    $_SESSION['productid'] = $_GET['id'];
    $_SESSION['price'] = $price;
    $name = 'FiveM for 1 day';
    $descp = ' <br>';
  } else if ($_GET['id'] === 'fivem2') {
    $price = '12';
    $pricetoken = '$'.$price;
    $_SESSION['productid'] = $_GET['id'];
    $_SESSION['price'] = $price;
    $name = 'FiveM for 7 days';
    $descp = ' <br>';
  } else if ($_GET['id'] === 'fivem3') {
    $price = '25';
    $pricetoken = '$'.$price;
    $_SESSION['productid'] = $_GET['id'];
    $_SESSION['price'] = $price;
    $name = 'FiveM for 30 days';
    $descp = ' <br>';
  } else if ($_GET['id'] === 'fivem4') {
    $price = '75';
    $pricetoken = '$'.$price;
    $_SESSION['productid'] = $_GET['id'];
    $_SESSION['price'] = $price;
    $name = 'FiveM for Lifetime';
    $descp = ' <br>';
  }
}



if (isset($_POST['cardapply'])) {
  var_dump($_POST);
  $_SESSION['productid'] = $_GET['id'];
  $_SESSION['price'] = $price;
  header("Location: https://{$_SERVER['SERVER_NAME']}/api/Accounts/Checkout");
  
}

if (isset($_POST['paypalapply'])) {
  var_dump($_POST);
  $_SESSION['productid'] = $_GET['id'];
  $_SESSION['price'] = $price;
  header("Location: https://{$_SERVER['SERVER_NAME']}/api/Accounts/PayPalCheckout");
}

if (!isLoggedIn()) {
  header("Location: https://{$_SERVER['SERVER_NAME']}/my/login?redirect=".$_SERVER['REQUEST_URI']);
}

?>

<?php
if (isset($_POST['apply'])) {
  if (DB::query('SELECT text FROM promocodes WHERE text=:code', array(':code' => $_POST['code']))[0]['text'] === $_POST['code'] & DB::query('SELECT uses FROM promocodes WHERE text=:code', array(':code' => $_POST['code']))[0]['uses'] > 0) {
    if (DB::query('SELECT time FROM promocodes WHERE text=:code', array(':code' => $_POST['code']))[0]['time'] === '-1' || (int)DB::query('SELECT time FROM promocodes WHERE text=:code', array(':code' => $_POST['code']))[0]['time'] < time()) {
      if (DB::query('SELECT forp FROM promocodes WHERE text=:code', array(':code' => $_POST['code']))[0]['forp'] === 'NONE') {
    $_SESSION['code'] = '1';
    $_SESSION['promocode'] = $_POST['code'];
    $a = $price;
    $b = DB::query('SELECT value FROM promocodes WHERE text=:code', array(':code' => $_POST['code']))[0]['value'];
    $c = $a - ($a * ($b / 100));
    $price = $c;
    $pricetoken = '$'.$price;
    $_SESSION['price'] = $c;
      } else if (DB::query('SELECT forp FROM promocodes WHERE text=:code', array(':code' => $_POST['code']))[0]['forp'] === $_GET['id']) {
         $_SESSION['code'] = '1';
    $_SESSION['promocode'] = $_POST['code'];
    $a = $price;
    $b = DB::query('SELECT value FROM promocodes WHERE text=:code', array(':code' => $_POST['code']))[0]['value'];
    $c = $a - ($a * ($b / 100));
    $price = $c;
    $pricetoken = '$'.$price;
    $_SESSION['price'] = $c;
      } else {
          $alert = '3';
      }
  } else {
    $alert = '1';
  }
} else {
$alert = '2';
}
} else {
  $_SESSION['code'] = '0';
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aworex</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link href="/static/fonts/tt/stylesheet.css" rel="stylesheet">
  <link href="/static/fonts/sfpro/stylesheet.css" rel="stylesheet">
  <link href="/root.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
    integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
    crossorigin="anonymous"></script>
    <script
  src="https://code.jquery.com/jquery-3.6.4.min.js"
  integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
  crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
  <link rel="icon" type="image/x-icon" href="/static/img/logo.png">
  <script async="" src="https://mc.yandex.ru/metrika/tag.js"></script><script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
</head>

<body style="
background-image: url('/static/img/bckalt.png') !important;
background-repeat: no-repeat; background-size: cover; background-color: #020712;">
<?php
require $_SERVER['DOCUMENT_ROOT']."/classes/Navbar.php";0
?>
    <style>


.dropdown-content {
  display: none;
  position: absolute;
  background-color: #252525;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}
      .mobile_bar-close {
    font-size: 25px;
    right: 10px;
    top: 10px;
    position: absolute;
    cursor: pointer;
}
      .mobile_bar.active {
    display: block;
}
.mobile_bar {
    height: 100vh;
    width: 70%;
    position: fixed;
    top: 0;
    left: 0;
    background: #101014;
    color: #fff;
    z-index: 20;
    display: none;
    transition: 0.5s;
}
.mobile_bar-menu {
    height: calc(100vh - 60px);
    padding: 30px;
    width: calc(100% - 60px);
    overflow: hidden;
    overflow-y: auto;
    transition: 0.5s;
}
.mobile_bar ul {
    height: max-content;
    margin: 0;
    padding: 0;
}
.mobile_bar ul li {
    display: block;
    list-style: none;
    margin-bottom: 10px;
    transition: 0.5s;
}
.mobile_bar ul li a {
    font-size: 16px;
    text-decoration: none;
    color: #fff;
    display: block;
    font-weight: 800;
    transition: 0.5s;
}
.mobile_bar-out {
    width: 30%;
    height: 100vh;
    top: 0;
    right: 0;
    position: fixed;
    background: rgb(0 0 0 / 5%);
    backdrop-filter: blur(8px);
}
        .accordion-item:first-of-type .accordion-button {
    border-top-left-radius: none !important;
    border-top-right-radius: none !important;
}
@media screen and (max-width: 768px) {


  .tm {
    display: none !important;
  }

}


@media screen and (max-width: 768px) {


.tm {
  display: none !important;
}


.chtsb {
  font-size: 50px;
}



}

@media screen and (min-width: 768px) {

  .colch {
    float: none;
    margin: 0 auto;
  }


.chtsb {
     text-align: center;
     font-size: 75px;
  }

}



.applybtn {
	color:#246bf4;
	border-radius:42px;
	display:inline-block;
	cursor:pointer;
	background-color:#31080e;
	font-size:20px;
	padding:13px 30px;
	text-decoration:none;
}


        .loginbtn {
	background:#246bf4;
	border-radius:42px;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-size:20px;
	padding:13px 30px;
	text-decoration:none;
}

.buybtn {
    border:3px solid #246bf4;
	background:#00000000;
	border-radius:42px;
	display:inline-block;
	cursor:pointer;
	color:#246bf4;
	font-size:20px;
	padding:13px 30px;
	text-decoration:none;
}
.regbtn {
    border:1px solid #3b3b3b;
	background:#00000000;
	border-radius:42px;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-size:20px;
	padding:13px 30px;
	text-decoration:none;
}

.accordion-button:not(.collapsed)::after {
    background-image: url("data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23bd1c32'><path fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/></svg>");
    transform: var(--bs-accordion-btn-icon-transform);
}

.accordion-button::after {
    flex-shrink: 0;
    width: var(--bs-accordion-btn-icon-width);
    height: var(--bs-accordion-btn-icon-width);
    margin-left: auto;
    content: "";
    background-image: url("data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23bd1c32'><path fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/></svg>");
    background-repeat: no-repeat;
    background-size: var(--bs-accordion-btn-icon-width);
    transition: var(--bs-accordion-btn-icon-transition);
}

.accordion-button:not(.collapsed) {
    box-shadow: none;
}

.accordion-button {
    box-shadow: none;
}

.accordion-button:focus {
    box-shadow: none;
}



        body {
            font-family: SF Pro Display;
            background-color: #0E110F;
            color: #fff;
        }
        .form-control::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
  
}

.form-control:-ms-input-placeholder { /* Internet Explorer 10-11 */
  
}

.form-control::-ms-input-placeholder { /* Microsoft Edge */
  
}
.divided {
  display: flex;
  align-items: center;
  margin-top: 15px;
  margin-left: 5px;
}

.divider {
  flex-grow: 1;
  border-bottom: 1px solid #797979;
  margin-right: 35px;
  margin-left: 35px;
}

.form-control::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
    
}

.form-control {
   
}

.form-control:focus {
    color: #72575d;
    background-color: #13070a;
    box-shadow: none;
    border-color: #a34552 !important;
}

@media screen and (min-width: 767px) {
.cntch {
    margin-left: 275px;
}
}

    </style>
    <div class=" container col-xxl-8 px-4 py-5">
        <center><h1 style="font-size: 75px; font-weight: 700;">Buy product</h1></center>
        <div class="row cntch mt-5">
          
              <?php
if ($alert === '1') {
  echo '<div class="col-md-8"><div class="alert alert-danger" role="alert">
Promocode expired
</div></div><div class="col-md-4"></div>';
} else if ($alert === '2') {
   echo '<div class="col-md-8"><div class="alert alert-danger" role="alert">
Invalid promocode
</div></div><div class="col-md-4"></div>';
} else if ($alert === '3') {
   echo '<div class="col-md-8"><div class="alert alert-danger" role="alert">
Promocode not for this product
</div></div><div class="col-md-4"></div>';
}
?>
           
            


            <div class="col-md-6">
              <h1 style="font-size: 50px; margin-bottom: 15px; margin-top: -15px;"><b><?= $name ?></b></h2>
              
            </div>
             <div class="col-md-4"></div>



            <div class="col-md-2"></div>
            <div class="col-md-2"><h2 style="color: #246bf4; margin-top: 20px; font-size: 55px;"><b><?=$pricetoken?></b></h2></div>

            <div class="col-md-3"></div>
            <div class="col-md-3"></div>
            <div class="col-md-3"></div>


            <div class="col-md-3 mt-5"></div>
            <form action="buy?id=<?= $_GET['id'] ?>" method="post">
              
              <div style="margin-top: -35px;" class="col-md-auto d-flex align-items-center">

                    <div class="mb-3 col-6 mb-6">
                        <label for="exampleFormControlInput1" class="form-label">Have promocode?</label>
                        <input name="code" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Promocode">
                      </div>
                      <button style="margin-left: 15px; margin-top: 15px; border: none; background-color: #0D2E6F;" name="apply" type="submit" class="applybtn">Apply</butto>


              </div>
            </form>
            
            
            <form method="post" action="/api/checkout">
              <input type="text" name="buyacc" style="display: none;">
              <div style="margin-top: -15px;" class="col-md-auto d-flex align-items-center">
                <button name="cardapply" class="loginbtn mt-3">Buy</button>
                <!--button style="background-color: #bd2f42; font-size: 14px; padding: 0.8rem 5rem; margin-right: 15px;" name="paypalapply" class="button">BUY</button-->
              </div>
            </form>

            <p style="margin-top: 25px; font-size: 17px; color: #FFFFFFA6;">If you want to pay for your purchase with PayPal or Crypto. Please write to support</p>
            
          </div>
  </div>


    
</div>

<script>


  function changePrice(btnid, price) {
      if (btnid === 'btn1') {
        document.getElementById(btnid).classList.add("loginbtn");
        document.getElementById(btnid).classList.remove("buybtn");

        document.getElementById('btn2').classList.remove("loginbtn");
        document.getElementById('btn2').classList.add("buybtn");

        document.getElementById('btn3').classList.remove("loginbtn");
        document.getElementById('btn3').classList.add("buybtn");

        document.getElementById('btn4').classList.remove("loginbtn");
        document.getElementById('btn4').classList.add("buybtn");

        document.getElementById('price').innerHTML = '<b style="color: #246bf4; font-weight: 500;">$</b>5';
      }

      if (btnid === 'btn2') {
        document.getElementById(btnid).classList.add("loginbtn");
        document.getElementById(btnid).classList.remove("buybtn");

        document.getElementById('btn1').classList.remove("loginbtn");
        document.getElementById('btn1').classList.add("buybtn");

        document.getElementById('btn3').classList.remove("loginbtn");
        document.getElementById('btn3').classList.add("buybtn");

        document.getElementById('btn4').classList.remove("loginbtn");
        document.getElementById('btn4').classList.add("buybtn");

        document.getElementById('price').innerHTML = '<b style="color: #246bf4; font-weight: 500;">$</b>30';
      }

      if (btnid === 'btn3') {
        document.getElementById(btnid).classList.add("loginbtn");
        document.getElementById(btnid).classList.remove("buybtn");

        document.getElementById('btn1').classList.remove("loginbtn");
        document.getElementById('btn1').classList.add("buybtn");

        document.getElementById('btn2').classList.remove("loginbtn");
        document.getElementById('btn2').classList.add("buybtn");

        document.getElementById('btn4').classList.remove("loginbtn");
        document.getElementById('btn4').classList.add("buybtn");

        document.getElementById('price').innerHTML = '<b style="color: #246bf4; font-weight: 500;">$</b>80';
      }

      if (btnid === 'btn4') {
        document.getElementById(btnid).classList.add("loginbtn");
        document.getElementById(btnid).classList.remove("buybtn");

        document.getElementById('btn1').classList.remove("loginbtn");
        document.getElementById('btn1').classList.add("buybtn");

        document.getElementById('btn2').classList.remove("loginbtn");
        document.getElementById('btn2').classList.add("buybtn");

        document.getElementById('btn3').classList.remove("loginbtn");
        document.getElementById('btn3').classList.add("buybtn");

        document.getElementById('price').innerHTML = '<b style="color: #246bf4; font-weight: 500;">$</b>179';
      }

  

      
      
      
    
    

    
    
  }
</script>
 

</body>

</html>