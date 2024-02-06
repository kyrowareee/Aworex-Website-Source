<?php
require $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";
require $_SERVER['DOCUMENT_ROOT'] . "/classes/DB.php";
include($_SERVER['DOCUMENT_ROOT'] . '/classes/Auth.php');

if ((int)DB::query('SELECT verified FROM users WHERE id=:id', array(':id'=>isLoggedIn()))[0]['verified'] != 0) {
  header('Location: account-verify');
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
require $_SERVER['DOCUMENT_ROOT']."/classes/Navbar.php";
?>

    <div class=" container col-xxl-8 px-4 py-5">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6"></div>
            
            <div class="col-md-3"></div>
            <h1 id="contact" class="price__header" style="font-size: 45px; margin-top: -35px; text-align: center;">Account Verification Needed</h1>
        <div class="col-md-3"></div>
         <div class="col-md-6">
         <p style="font-size: 19px;">
         We have sent an email with a link to confirm your account to your email that you provided during registration. If you did not find it, please check your SPAM folder.
         </p>
         </div>
         <div class="col-md-3"></div>
          <div style="margin-left: 55px;" class="col-md-6">
 
         </div>
         <div class="col-3"></div>
         <div class="col-3"></div>
         <div class="col-md-6"><a href="account-verify" class="loginbtn">Refresh</a></div>
   <div class="col-3"></div>
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

        document.getElementById('price').innerHTML = '<b style="color: #f4243f; font-weight: 500;">$</b>5';
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

        document.getElementById('price').innerHTML = '<b style="color: #f4243f; font-weight: 500;">$</b>30';
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

        document.getElementById('price').innerHTML = '<b style="color: #f4243f; font-weight: 500;">$</b>80';
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

        document.getElementById('price').innerHTML = '<b style="color: #f4243f; font-weight: 500;">$</b>179';
      }

  

      
      
      
    
    

    
    
  }
</script>
 

</body>

</html>