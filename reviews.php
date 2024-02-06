<?php 
require $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";
require $_SERVER['DOCUMENT_ROOT'] . "/classes/DB.php";
include($_SERVER['DOCUMENT_ROOT'] . '/classes/Auth.php');

if (isset($_POST['createpost'])) {
    if (isset($_COOKIE['SNID_'])) {

        DB::query('INSERT INTO reviews VALUES (\'0\', :title, :date, :text, :type, :r)', array(':title'=>$_POST['title'], ':date'=>time(), ':text'=>$_POST['text'], ':type'=>$_POST['type'], ':r'=>1));
        $alert = 1;
    } else {
        DB::query('INSERT INTO reviews VALUES (\'0\', :title, :date, :text, :type, :r)', array(':title'=>$_POST['title'], ':date'=>time(), ':text'=>$_POST['text'], ':type'=>$_POST['type'], ':r'=>0));
        $alert = 2;
    }
}



session_start();
require $_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php";
use GuzzleHttp\Client;

use GuzzleHttp\RequestOptions;


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
        
    
        
    $client = new Client();
            
            $telegramMessage =  "<strong>Free Test</strong>\n<strong>Имя: ".$_POST['name']."</strong>\n<strong>Дискорд ".$_POST['discord']."</strong>\n<strong>Почта: ".$_POST['email']."</strong>\n<strong>Комментарий: ".$_POST['comment']."</strong>";

        try {
            $client->post('https://api.telegram.org/bot5156034384:AAHZ0tQJfvUeZMEimOxCdg6KvSEJWVUnjYM/sendMessage', [
                RequestOptions::JSON => [
                    'chat_id' => '-1001526084073',
                    'parse_mode' => 'HTML',
                    'text' => $telegramMessage,
                ]
            ]);
            header('Location: ?linked');
        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }
    } else {
    }
} 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-228578099-1">
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-228578099-1');
</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Your feedback on Aworex. Share your experience - tell us about your favorite cheat, convenient support and convenient payment on the site">
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
    <script>
        $(function () {
  $(document).scroll(function () {
    var $nav = $(".header");
    $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
  });

});
function one() {
    $('.s1').html('<img width="550" src="/static/img/gallery/g/1/1.png" alt="">');
    $('.s2').html('<img width="550" src="/static/img/gallery/g/1/2.png" alt="">');
}

function two() {
    $('.s1').html('<img width="550" src="/static/img/gallery/g/2/1.png" alt="">');
    $('.s2').html('<img width="550" src="/static/img/gallery/g/2/2.png" alt="">');
}
function three() {
    $('.s1').html('<img width="550" src="/static/img/gallery/g/3/1.png" alt="">');
    $('.s2').html('<img width="550" src="/static/img/gallery/g/3/2.png" alt="">');
}
function four() {
    $('.s1').html('<img width="550" src="/static/img/gallery/g/4/1.png" alt="">');
    $('.s2').html('<img width="550" src="/static/img/gallery/g/4/2.png" alt="">');
    }
    </script>
        <link rel="icon" type="image/x-icon" href="/static/img/logo.png">
    <title>Aworex Reviews</title>
</head>
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
<body style="background-image: url('/static/img/bckalt.png') !important;
background-repeat: no-repeat; background-color: #020712; background-size: 100%;">
    <?php
    if (isset($_GET['linked'])) {
        echo '<div class="modall active" id="privacymodal">
    <div class="modal-headerr">
      <div style="color: #000;" class="title">Thank you!</div>
    </div>
    <div style="color: #000;" class="modal-body">
    We have received your application. We also recommend joining our Discord group<br><br>
    <a href="https://discord.gg/Ab69c3HJEk" class="myButton">Join</a>
    </div>
  </div><div class="overlay active"></div>';
    } ?>
    <script>
        var player = new Playerjs({ id: "player", file: "/static/video.mp4" });
    </script>
    <?php require $_SERVER['DOCUMENT_ROOT']."/classes/Navbar.php"; ?>
    <script src="/static/js/header.js"></script>


        

       
        
                
    

        <?php
        if ($alert === 1) {
            echo '<div class="alert alert-success" role="alert">
  Thanks for your feedback! It will be reviewed and published soon.
</div>';
        } else if ($alert === 2)  {
            echo '<div class="alert alert-success" role="alert">
  Thank you for your review!
</div>';

        } ?>
        <div class=" container col-xxl-8 px-4 py-5">
  <div class="row align-items-center g-5 py-5">
   
    <div class="col-lg-6">

      <h1 style="color: #fff !important; font-size: 75px;" class="fw-bold text-body-emphasis lh-1 mb-3">Reviews</h1>
     
    </div>
    <div class="col-10 col-sm-8 col-lg-6">
    <form action="reviews" method="post">
            <?php
            if (!isLoggedIn()) {
                echo '<div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nickname</label>
                <input style="background-color: #0d1012; border-color: #40424b; color: #fff;" type="text" name="title" class="form-control" id="exampleFormControlInput1">
              </div>';
            } ?>
  
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Description</label>
  <textarea type="text" name="text" class="form-control" id="exampleFormControlInput1"></textarea>
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Type</label>
  <select style="background-color: #060b14; border-color: #1a253b; color: #8da2b8; box-shadow: none;" name="type" class="form-select" aria-label="Default select example">
  <option value="1">Positive</option>
  <option value="2">Negative</option>
</select>
</div>
 <script src="https://www.google.com/recaptcha/api.js"></script>
                
                <div class="mt-3 mb-3"><div class="g-recaptcha" data-sitekey="6Lft_vEcAAAAAGTgU9L2BtV0j-CAzFD37p3E1wRs"></div></div>

<div class="mb-3">
<button type="submit" name="createpost" class="loginbtn">Create</button>
</div>
  </form>
    </div>

  </div>


    

       
        
            <?php
            $reviews = DB::query('SELECT * FROM reviews WHERE rewed=1 ORDER BY id DESC');
            foreach ($reviews as $r) {
                if ($r['type'] === '1_a' || $r['type'] === '2_a') {
                    $date = $r['date'];
                } else {
                    
                    $date = gmdate("Y-m-d", $r['date']);
                }
                if ($r['type'] === '1' || $r['type'] === '1_a') {
                    $img = 'good';
                    $color = '#00ff66;';
                } else {
                    $img = 'bad';
                    $color = '#ff002e;';
                }
                echo '
                <div style="text-align: start; background-color: #05112A;" class="card mb-3">
            <div class="card-body">
            
                <img src="/static/img/'.$img.'.png" style="object-fit: cover; width: 45px; height: 45px; border-radius: 150px; margin-top: -33px;" class="fill-current mp-5 imgav' . $p['id'] . '" onerror="imgError(this);">
                <h5 style="margin-bottom: -0px; margin-left: 4px; color: '.$color.';" href="testings" class="col-md-10 ml-3  d-inline-block font-weight-bold">'.$r['title'].'
                
                    <br><p href="testings" style="font-size: 15px; font-weight: 500; margin-top: -45px;" class="col-md-10 d-inline-block font-weight-bold">'.$date.'</p></h5>
             
                <p href="testings" class="col-10 d-inline-block font-weight-bold">'.$r['text'].'</p>
               

                </div></div>';
            } ?>
                        
                   


            </div>
       


    <div class="footer">


        <hr>
        <p style="text-align: center !important; margin-bottom: 45px; margin-top: 45px;">By using this site, You agree to be bound by the <a href="/terms">terms</a><br>.
<br>© 2023 Aworex</p>
    </div></body>

</html>