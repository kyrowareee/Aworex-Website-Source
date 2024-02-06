<?php
session_start();
require $_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php";
require $_SERVER['DOCUMENT_ROOT']."/classes/DB.php";
require $_SERVER['DOCUMENT_ROOT']."/classes/Auth.php";
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
  <meta name="description" content="Elevate your gaming experience with AwoRex! Explore the most effective hacks for EFT and access the best EFT cheats. Gain a competitive edge in Escape from Tarkov with our premium services and enhance your gameplay like never before.">
<meta name="keywords" content="Hacks for Eft, Best Eft Cheats">
<meta name="robots" content="index, follow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="language" content="English">
<meta name="language" content="English">
<link rel="canonical" href="https://aworex.com/<?=basename($_SERVER['PHP_SELF'],'.php')?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Best EFT Cheats and Hacks For EFT | Tarkov Accounts | Aworex</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link href="/static/fonts/tt/stylesheet.css" rel="stylesheet">
  <link href="/static/fonts/sfpro/stylesheet.css" rel="stylesheet">
  <link href="/root.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
  <link rel="icon" type="image/x-icon" href="/static/img/logo.png">
  <script async="" src="https://mc.yandex.ru/metrika/tag.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
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
    <title>Tarkov Elite</title>
</head>

<body>
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

    <div class="container">
        

       
        
                
    <?php

            require $_SERVER['DOCUMENT_ROOT']."/modules/Blog/PagePreview.php";
        ?>
        
    </div>
</body>

</html>