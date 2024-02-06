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
    <title>Aworex</title>
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
background-repeat: no-repeat; background-color: #000610; background-size: 100%;">
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


        

       
        
                
    


        <div class=" container col-xxl-8 px-4 py-5">
<h2>Terms</h2>


    <p>
These themes are only compatible with Aworex Community. They will not work on other software. Unfortunately refunds cannot be offered for incorrect software compatibility, so please make sure you are using Aworex Community before purchasing any of these themes.<br>

<br><br><h2>Fees, refunds & exchanges</h2>

When large scale upgrades are required on our products (ie. if themes need to be recoded from scratch to be compatible with new Aworex updates), those products may need to be repurchased. A renewal fee of $50.00 every wipe applies for all products in order to maintain access to support & updates.<br>
Since the products on this website are digital items, refunds or exchanges are not offered. Any attempts at payment disputes (without first trying to come to a solution) may result in the cancellation of your customer account.<br>

<br><br><h2>Modifications & Copyright removal</h2>

You may modify the product you have purchased as much as you like to fit your own requirements.<br>
There is no guarantee these themes will work 100% with all 3rd party modifications by default.<br>
File-sharing and distributing<br>
When purchasing and downloading any products from this site, you agree that you will not redistribute or resell your purchased item, or any part of the design (including but not limited to images, code, xml files or psd files) under any circumstance. Distributing these files (eg. on file-sharing sites or warez sites) is highly prohibited. If you are caught distributing any files from Aworex or if you buy an item on behalf of a warez site, your account will be banned without warning or refund.<br>
You do not have permission to purchase any products from this website if you are actively involved in administrating or contributing to warez sites (including but not limited to posting, requesting or downloading items, donating or posting links to items originating from this site). Doing so will result in the immediate cancellation of your account without refund.<br>

  <br><br><h2>Product updates</h2> 
On regular occasions our products may be updated. Depending on the developer the time this takes may vary. During this time you are requested not to ask for any ETA as we sometimes cannot tell due to the nature of our digital products. <br>
We will notify everyone using our Discord channel as well as the Status page. 
During these updates it may be that the purchased product is not available for use. Compensation of time not being able to use each hack, depends on the developer and the nature of the cause for update. <br>

  <br><br><h2>Cheating is against game policies </h2>
When you use one of our hacks, you are willingly and knowingly going against the game policies that the hack is made for. The game may impose and apply any punishment for doing this as they see fit. <br>
We are not responsible for the use nor for the outcome of the use of any of our products. 

  <br><br><h2>Compensation </h2>
Due to the characteristics of the digital product,  you can not request a refund or exchange it even if you cannot use it, whether this is due to system incompatibility or change of heart. <br>
We are not capable nor willing to check whether or not a license key has been used. Therefore we must assume each key sold has been used. Gaining access to the license key equals it being used. <br>

 <br><br> <h2>Support ≠ refund </h2>
Unfortunately many associate support directly with refund if a product does not work perfectly. We value our customer satisfaction a lot and we do offer the best support we can. <br>
However, effort must be given from both the buyer as well as the seller to get things working. Simpy asking a refund without first asking help or showing proof of effort will be rejected by default. Support may take a while but we do our best to improve it for future customers as well. <br>
Please cooperate in a friendly manner so we can solve your issue as quickly as possible and we may be able to return the favor. 

    <br><br><h2>Cookies </h2>
We employ the use of cookies. By accessing Aworex.shop, you agreed to use cookies in agreement with the Aworex.shop Privacy Policy.<br><br>
Most interactive websites use cookies to let us retrieve the user’s details for each visit. Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. Some of our affiliate/advertising partners may also use cookies<br><br>

Modifications to Terms & Conditions
These Terms & Conditions may be modified at any time without notice. When purchasing a product and using this website, you are bound to the latest version of these Terms & Conditions. Last modified on January 18, 2020.
</p>

       
        

                        
                   


            </div>
       


   </body>

</html>