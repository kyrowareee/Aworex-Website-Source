<?php

require $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";
require $_SERVER['DOCUMENT_ROOT'] . "/classes/DB.php";
include($_SERVER['DOCUMENT_ROOT'] . '/classes/Auth.php');


if (isset($_POST['send'])) { 
    $post_data = "secret=6Lft_vEcAAAAAEU1FG2KnTsP6O7HIbF65YE388wH&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR'];
  
      $ch = curl_init(); 
      curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded; charset=utf-8', 'Content-Length: ' . strlen($post_data)));
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
      $googresp = curl_exec($ch);      
      $decgoogresp = json_decode($googresp);
      curl_close($ch);
  
  if ($decgoogresp->success == true) {
          
      
          
      /*$client = new Client();
      
      
              
              $telegramMessage =  "<strong>Support</strong>\n<strong>Имя: ".$_POST['name']."</strong>\n<strong>Дискорд/Telegram ".$_POST['discord']."</strong>\n<strong>Почта: ".$_POST['email']."</strong>\n<strong>Комментарий: ".$_POST['comment']."</strong>";
  
          try {
              $client->post('https://api.telegram.org/bot6167230052:AAELxKySZSK2WdEa90nMV1vhNZQAU6VbwhY/sendMessage', [
                  RequestOptions::JSON => [
                      'chat_id' => '-1001534101240',
                      'parse_mode' => 'HTML',
                      'text' => $telegramMessage,
                  ]
              ]);
              header('Location: ?linked');
          } catch (\Exception $e) {
              var_dump($e->getMessage());
          }
      } else {
      }*/
      
      $myChannel = "1194341180582924428";
      if ($_POST['select'] === '1') {
          $select = 'Payment PayPal/Crypto';
      } else if ($_POST['select'] === '2') {
          $select = 'Free trial';
      } else {
          $select = 'Need help';
      }
  $myToken = "MTE0MjU3MDUzNTI2NDQ3MzA5OA.GEcRQW.7miPTU5G9uzPERfa6pNxMl_sn056ggPI7kGoxM";
  $msg = "Support\nName: ".$_POST['name']."\nDiscord ".$_POST['discord']."\nComment: ".$_POST['comment']."\nSelect type: ".$select;
  $data = array('content' => $msg);
  $data_string = json_encode($data);
  $ch = curl_init('https://discordapp.com/api/v6/channels/' . $myChannel . '/messages');
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json',
      'Content-Length: ' . strlen($data_string),
      'Authorization: Bot ' . $myToken
      )
  );
  
  $answer  = curl_exec($ch);
  
  
  
  }}
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
<style>
            .myButton {
            transition: 0.3s;
            animation-delay: 0.3s;
    background-color:#167bff;
	border-radius:6px;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:18px;
	font-weight:bold;
	padding:9px 28px;
	text-decoration:none;
}
.myButton:hover {
    transition: 0.3s;
    animation-delay: 0.3s;
	background-color:#0b3d7f;
    color: #fff;
}
.myButton:active {
	position:relative;
	top:1px;
}
        .modall {
  position: fixed !important;
  top: 50% !important;
  left: 50% !important;
  transform: translate(-50%, -50%) scale(0) !important;
  transition: 200ms ease-in-out !important;
  border: 1px solid black !important;
  border-radius: 10px !important;
  z-index: 99999 !important;
  background-color: white !important;
  width: 500px !important;
  max-width: 80% !important;
  
}

.modall.active {
  transform: translate(-50%, -50%) scale(1) !important;
}

.modal-headerr {
  padding: 10px 15px !important;
  display: flex !important;
  justify-content: space-between !important;
  align-items: center !important;
  border-bottom: 1px solid black !important;
}

.modal-headerr .title {
  font-size: 1.25rem !important;
  font-weight: bold !important;
}

.modal-headerr .close-button {
  cursor: pointer;
  border: none;
  outline: none;
  background: none;
  font-size: 1.25rem;
  font-weight: bold;
}

.modal-bodyy {
  padding: 10px 15px !important;
}

.overlay {
  z-index: 99998;
  position: fixed;
  opacity: 0;
  transition: 200ms ease-in-out;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0, 0, 0, .5);
  pointer-events: none;
}

.overlay.active {
  opacity: 1;
  pointer-events: all;
}
    </style>
<?php
    if (isset($_GET['linked'])) {
        echo '<div class="modall active" id="privacymodal">
    <div class="modal-headerr">
      <div style="color: #000;" class="title">Thank you!</div>
    </div>
    <div style="color: #000; padding: 15px;" class="modal-body">
    We have received your application. We also recommend joining our Discord group<br><br>
    <a name="send" class="loginbtn">Join</a>
    </div>
  </div><div class="overlay active"></div>';
    }
    

     ?>
    <div class=" container col-xxl-8 px-4 py-5">
     <h1 style="color: #fff !important; font-size: 75px;" class="fw-bold text-body-emphasis lh-1 mb-3">Support</h1>
        <form method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Discord</label>
                <input name="discord" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Discord">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Comment</label>
                <textarea  name="comment" style="resize: none;" class="form-control" id="exampleFormControlInput1" placeholder="Comment..." rows="5"></textarea>
              </div>
              <div style="margin-bottom:125px;" class="mb-3">
                    <select style="background-color: #060b14; border-color: #1a253b; color: #8da2b8; box-shadow: none;" class="form-select" aria-label="Default select example" name="select">
  <option selected disabled>Select option</option>
  <option value="2">Free trial</option>
  <option value="3">Need help</option>
  <option value="1">I want to buy product</option>
  
  
</select>
                </div>
              <script src="https://www.google.com/recaptcha/api.js"></script>
                
                <br><div class="g-recaptcha mb-3" data-sitekey="6Lft_vEcAAAAAGTgU9L2BtV0j-CAzFD37p3E1wRs"></div>
              <button type="submit" name="send" class="loginbtn">Send request</button>
        </form>
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