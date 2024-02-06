<?php
include($_SERVER['DOCUMENT_ROOT']."/classes/DB.php");
include($_SERVER['DOCUMENT_ROOT']."/classes/Auth.php");
include($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');

if (isLoggedIn()) {
  header("Location: https://{$_SERVER['SERVER_NAME']}/my");
}


$username = $_POST['email'];
$password = $_POST['password'];
if (isset($_POST['loginaccount'])) {
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
  if (DB::query('SELECT email FROM users WHERE email=:username', array(':username'=>$username)) or DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$username))) {
    if (password_verify($password, DB::query('SELECT password FROM users WHERE email=:username', array(':username'=>$username))[0]['password']) or password_verify($password, DB::query('SELECT password FROM users WHERE username=:username', array(':username'=>$username))[0]['password'])) {
            $cstrong = True;
            $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
            $user_id = DB::query('SELECT id FROM users WHERE email=:username', array(':username'=>$username))[0]['id'];
            $email = DB::query('SELECT email FROM users WHERE id=:username', array(':username'=>$user_id))[0]['email'];
            if (!$user_id) {
                $user_id = DB::query('SELECT id FROM users WHERE username=:username', array(':username'=>$username))[0]['id'];
            }
            
                DB::query('INSERT INTO restr_tokens VALUES (\'0\', :user_id, :token)', array(':token'=>sha1($token), ':user_id'=>$user_id));
$api_key = '9f6c49ce2edae2fe902b2d7670cf728d-78f6ccbe-9e953fc9';
$domain_name = 'sandbox8aebc416e956415ab373263e2323c4c9.mailgun.org';

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v3/' . $domain_name . '/messages');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERPWD, 'api:' . $api_key);

$data = [
    'from' => 'Account Password Restore <aworex-noreply@' . $domain_name . '>',
    'to' => $email,
    'subject' => 'Aworex',
    'text' => 'Follow this link to recover your account password: https://aworex.com/api/AccountRestore?token='.$token.'',
    'html' => 'Follow this link to recover your account password:<br> <a href="https://aworex.com/api/AccountRestore?token='.$token.'">https://aworex.com/api/AccountConfirm?token='.$token.'</a>',
];

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

$response = curl_exec($ch);
curl_close($ch);

                 $error = '1';

            } else {
              $error = '1';
              
        }

} else {
    $error = '1';
}
} else {
  $error = '1';
}
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

if (isLoggedIn()) {
  header('Location: /my');
}
?>
    <div class=" container col-xxl-8 px-4 py-5">
  <div class="row align-items-center g-5 py-5">
    
    <div class="col-lg-6">

      <h1 style="color: #fff !important; font-size: 75px;" class="fw-bold text-body-emphasis lh-1 mb-3">Password<br>Recovery</h1>
     

    </div>
    <div class="col-10 col-sm-8 col-lg-6">
    <?php

if ($error === '1') {
   echo '<div class="alert alert-success" role="alert">
An email with a password recovery link has been sent if the account exists.
</div>';
}
?>
        <form method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Username/Email</label>
                <input name="email" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name">
              </div>
             
              <script src="https://www.google.com/recaptcha/api.js"></script>
                
                <div class="mt-3 mb-3"><div class="g-recaptcha" data-sitekey="6Lft_vEcAAAAAGTgU9L2BtV0j-CAzFD37p3E1wRs"></div></div>
              <button name="loginaccount" class="loginbtn">Restore</button>
              
        </form>
    </div>
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