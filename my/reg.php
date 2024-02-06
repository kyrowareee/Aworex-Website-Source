<?php
include($_SERVER['DOCUMENT_ROOT']."/classes/DB.php");
include($_SERVER['DOCUMENT_ROOT']."/classes/Auth.php");
include($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');




use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
function generateRandomString($length = 256) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}

if (isset($_POST['createaccount'])) {
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

    $ip = $_SERVER['REMOTE_ADDR'];
if ($decgoogresp->success == true) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  if (!DB::query('SELECT email FROM users WHERE email=:email', array(':email'=>$email))) {
   
      DB::query('INSERT INTO users VALUES (\'0\', :fn, :ln, :d, :f, :username, :email, :password, 0, :token, :ip, 0, 1)', array(':username'=>$_POST['username'], ':password'=>password_hash($password, PASSWORD_BCRYPT), ':email'=>$email, ':fn'=>'EXAMPLE', ':ln'=>'EXAMPLE', ':f'=>'facebook.com/EXAMPLE', ':d'=>'EXAMPLE#1234', ':token'=>generateRandomString(), ':ip'=>'111.111'));
      $cstrong = True;
      $token = generateRandomString();
      $user_id = DB::query('SELECT id FROM users WHERE email=:username', array(':username'=>$email))[0]['id'];
      DB::query('INSERT INTO login_tokens VALUES (\'0\', :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$user_id));
      setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
      setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);
      Notification::register($_POST['email']);
      DB::query('INSERT INTO notifications VALUES (\'0\', :title, NOW(), :text, :uid)', array(':title'=>'Welcome!',':text'=>'You have successfully registered on our website. We wish you good luck to find a great cheat and have fun with it to the fullest!', ':uid'=>$user_id));
      $verftoken = generateRandomString();
      DB::query('INSERT INTO verf_tokens VALUES (\'0\', :uid, :token)', array(':uid'=>$user_id, ':token'=>$verftoken));
$api_key = '9f6c49ce2edae2fe902b2d7670cf728d-78f6ccbe-9e953fc9';
$domain_name = 'sandbox8aebc416e956415ab373263e2323c4c9.mailgun.org';

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v3/' . $domain_name . '/messages');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERPWD, 'api:' . $api_key);

$data = [
    'from' => 'Welcome to Aworex! <aworex-noreply@' . $domain_name . '>',
    'to' => $email,
    'subject' => 'Aworex',
    'text' => 'Welcome! You have successfully registered an account on the Aworex website.',
    'html' => 'Welcome! You have successfully registered an account on the Aworex website.'
];

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

$response = curl_exec($ch);
curl_close($ch);




      
      header('Location: /my/');
  
      
    } else {
      $error = '1';
    }
} else {
  $error = '2';
}
}

if (isset($_POST['signup'])) {
  header("Location: https://{$_SERVER['SERVER_NAME']}/login");
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

<?php include($_SERVER['DOCUMENT_ROOT']."/classes/Navbar.php"); ?>
    <div class=" container col-xxl-8 px-4 py-5">
  <div class="row g-5 py-5">

    <div class="col-lg-6">

      <h1 style="color: #fff !important; font-size: 75px;" class="fw-bold text-body-emphasis lh-1 mb-3">Account <br>Sign up</h1>
     

    </div>
    <div class="col-10 col-sm-8 col-lg-6">
    <?php
if ($error === '1') {
  echo '<div class="alert alert-danger" role="alert">
Email already registered!
</div>';
} else if ($error === '2') {
   echo '<div class="alert alert-danger" role="alert">
Captcha error!
</div>';
} else if ($error === '3') {
   echo '<div class="alert alert-danger" role="alert">
You have already registered your account. Please log in
</div>';
  }
?>
        <form action="reg" method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Username</label>
                <input name="username" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="Email">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="exampleFormControlInput1" placeholder="Password">
              </div>
              <script src="https://www.google.com/recaptcha/api.js"></script>
                
                <div class="mt-3 mb-3"><div class="g-recaptcha" data-sitekey="6Lft_vEcAAAAAGTgU9L2BtV0j-CAzFD37p3E1wRs"></div></div>
              <button type="submit" name="createaccount" class="loginbtn">Register</button>
              <p style="color: #aba5a7;" class="mt-5">Already having an account? <a href="login" style="color: #246bf4;">Log in</a></p>
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