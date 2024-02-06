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
<body style="background-color: #0D0D0D; background-image: url(/static/img/bckm.png); background-repeat: no-repeat;">
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
<h2>Refund Policy</h2>


    <p>
<h2>Cancellation</h2><br>
Subscriptions without automatic renewal cannot be canceled. Subscriptions with automatic renewal can be cancelled at any time but must be cancelled before it renews for a subsequent month in order to avoid being charged for the next month's subscription fee. If a subscription is cancelled, the cancellation will become effective at the end of the then-current monthly subscription period.<br><br>
<h2>No Refunds</h2><br>
If you are not a customer domiciled in the European Union, refunds will not be provided for any subscription. we do not provide credit, refunds, or prorated billing for subscriptions that are cancelled mid-month. In such a circumstance, access to the subscription remains until the end of the monthly billing cycle. We reserve the right to offer refunds, discounts or other consideration in select circumstances at its sole discretion. Please note that each circumstance is unique and election to make such an offer in one instance does not create the obligation to do so in another.<br><br>
<h2>Right of Withdrawal</h2><br>
If you are a customer domiciled in the European Union, you can withdraw from this contract without giving any reason. The withdrawal period will expire 14 days from the day of the conclusion of the contract. To exercise the right of withdrawal you must inform us (Phillip Bach und Moritz Dahlke GbR) of your decision to withdraw from this contract by an unequivocal statement (e.g. a letter sent by post or e-mail). You can use the model withdrawal form below, but this is not mandatory.<br><br>

To meet the withdrawal deadline, it is sufficient for you to send your communication concerning your exercise of the right of withdrawal before the withdrawal period has expired.<br><br>
<h2>Effects of Withdrawal</h2><br>
If you withdraw from this contract, we will reimburse to you all payments received from you, including the costs of delivery (with the exception of supplementary costs resulting from your choice of a type of delivery other than the least expensive type of standard delivery offered by us), without undue delay and in any event not later than 14 calendar days from the day on which we are informed about your decision to withdraw from this contract. We will carry out such reimbursement using the same means of payment you used for the initial transaction, unless you have expressly agreed otherwise, in any event, you will not incur any fees as a result of such reimbursement.<br><br>
<h2>Important</h2><br>
You will lose your right of withdrawal if the contract regards the supply of digital content which is not supplied on a tangible medium and the performance has begun before the end of the withdrawal period with your prior express consent and acknowledgment that you thereby lose your right of withdrawal. While performance of the supply of digital content typically refers to the moment that download of that content begins, we voluntarily honor requests to withdraw from the purchase of a software subscription within 14 days of purchase, as long as the software has not been used, ie. downloaded and no login has been performed<br><br>

<h2>Additional Information</h2><br>
Refunds and special payment methods
Please note that not all payment methods which can be used for payments allow a direct reimbursement (e.g. pre-paid cards). Reimbursements for such payments will be facilitated by us via another, common payment method. In any case, you will not incur any fees as a result of such reimbursement.<br><br>
<h2>Fraudulent chargebacks</h2><br>
Attempting to perform a fraudulent chargeback through a payment provider will result in the account being suspended immediately.<br><br>

</p>

       
        

                        
                   


            </div>
       


   </body>

</html>