<?php
include($_SERVER['DOCUMENT_ROOT']."/classes/DB.php");
include($_SERVER['DOCUMENT_ROOT']."/classes/Auth.php");
include($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');
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

if (!isLoggedIn()) {
    header('Location: /login');
}
?>
    <link rel="stylesheet" href="/static/css/sidebar.appx.css">
    <div class="container" style="margin-top: 50px;">
        <img width="75px" style="display: inline-block !important; border-radius: 1000px;" src="https://www.gravatar.com/avatar/182467ef91b53abd882c3bb8ca59326e?d=&amp;s=" alt="">
        <h1 style="display: inline-block !important; margin-top: 30px; margin-left: 15px; font-weight: 600;"><?=DB::query('SELECT username FROM users WHERE id=:id', array(':id'=>isLoggedIn()))[0]['username'];?></h1>
        <div class="row mt-3">
    
            <div class="col-md-3">
            
            <div class="position-sticky" style="top: 8.5rem;">
              
              
                    <aside style="background-color: #ffffff00 !important;" class="bd-sidebar">
                        <nav class="bd-links" id="bd-docs-nav" aria-label="Docs navigation"><ul class="list-unstyled mb-0 py-3 pt-md-1">
                        <li class="mb-1">
                          
                  
                          <div class="collapse show" id="getting-started-collapse">
    
                            <ul class="list-unstyled fw-normal pb-1 small">
                                <li><a style="font-size: 17.2px; margin-bottom: 15px; color: #aca8a9 !important; font-weight: 500;" href="/my/orders" class="d-inline-flex align-items-center rounded active text-black" aria-current="page"><div style="border-left:3px solid #ffffff00; margin-left: -25px; margin-right: 20px; height:20px; border-radius: 500px;"></div>
                                    
<svg style="margin-right: 10px; margin-left: -12px; " width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M1 1H2.30616C2.55218 1 2.67519 1 2.77418 1.04524C2.86142 1.08511 2.93535 1.14922 2.98715 1.22995C3.04593 1.32154 3.06333 1.44332 3.09812 1.68686L3.57143 5M3.57143 5L4.62332 12.7314C4.75681 13.7125 4.82355 14.2031 5.0581 14.5723C5.26478 14.8977 5.56108 15.1564 5.91135 15.3174C6.30886 15.5 6.80394 15.5 7.79411 15.5H16.352C17.2945 15.5 17.7658 15.5 18.151 15.3304C18.4905 15.1809 18.7818 14.9398 18.9923 14.6342C19.2309 14.2876 19.3191 13.8247 19.4955 12.8988L20.8191 5.94969C20.8812 5.62381 20.9122 5.46087 20.8672 5.3335C20.8278 5.22177 20.7499 5.12768 20.6475 5.06802C20.5308 5 20.365 5 20.0332 5H3.57143ZM9 20C9 20.5523 8.55228 21 8 21C7.44772 21 7 20.5523 7 20C7 19.4477 7.44772 19 8 19C8.55228 19 9 19.4477 9 20ZM17 20C17 20.5523 16.5523 21 16 21C15.4477 21 15 20.5523 15 20C15 19.4477 15.4477 19 16 19C16.5523 19 17 19.4477 17 20Z" stroke="#aca8a9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    
                                    Orders</a></li>
                          
                                <li><a style="font-size: 17.2px; margin-bottom: 15px; color: #aca8a9 !important; font-weight: 500;" href="/my/account" class="d-inline-flex align-items-center rounded active text-black" aria-current="page"><div style="border-left:3px solid #ffffff00; margin-left: -25px; margin-right: 20px; height:20px; border-radius: 500px;"></div>
                                    <svg style="margin-right: 10px; margin-left: -12px; " width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11 14C12.6569 14 14 12.6569 14 11C14 9.34315 12.6569 8 11 8C9.34315 8 8 9.34315 8 11C8 12.6569 9.34315 14 11 14Z" stroke="white" stroke-opacity="0.65" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M17.7273 13.7273C17.6063 14.0015 17.5702 14.3056 17.6236 14.6005C17.6771 14.8954 17.8177 15.1676 18.0273 15.3818L18.0818 15.4364C18.2509 15.6052 18.385 15.8057 18.4765 16.0265C18.568 16.2472 18.6151 16.4838 18.6151 16.7227C18.6151 16.9617 18.568 17.1983 18.4765 17.419C18.385 17.6397 18.2509 17.8402 18.0818 18.0091C17.913 18.1781 17.7124 18.3122 17.4917 18.4037C17.271 18.4952 17.0344 18.5423 16.7955 18.5423C16.5565 18.5423 16.3199 18.4952 16.0992 18.4037C15.8785 18.3122 15.678 18.1781 15.5091 18.0091L15.4545 17.9545C15.2403 17.745 14.9682 17.6044 14.6733 17.5509C14.3784 17.4974 14.0742 17.5335 13.8 17.6545C13.5311 17.7698 13.3018 17.9611 13.1403 18.205C12.9788 18.4489 12.8921 18.7347 12.8909 19.0273V19.1818C12.8909 19.664 12.6994 20.1265 12.3584 20.4675C12.0174 20.8084 11.5549 21 11.0727 21C10.5905 21 10.1281 20.8084 9.78708 20.4675C9.4461 20.1265 9.25455 19.664 9.25455 19.1818V19.1C9.24751 18.7991 9.15011 18.5073 8.97501 18.2625C8.79991 18.0176 8.55521 17.8312 8.27273 17.7273C7.99853 17.6063 7.69437 17.5702 7.39947 17.6236C7.10456 17.6771 6.83244 17.8177 6.61818 18.0273L6.56364 18.0818C6.39478 18.2509 6.19425 18.385 5.97353 18.4765C5.7528 18.568 5.51621 18.6151 5.27727 18.6151C5.03834 18.6151 4.80174 18.568 4.58102 18.4765C4.36029 18.385 4.15977 18.2509 3.99091 18.0818C3.82186 17.913 3.68775 17.7124 3.59626 17.4917C3.50476 17.271 3.45766 17.0344 3.45766 16.7955C3.45766 16.5565 3.50476 16.3199 3.59626 16.0992C3.68775 15.8785 3.82186 15.678 3.99091 15.5091L4.04545 15.4545C4.25503 15.2403 4.39562 14.9682 4.4491 14.6733C4.50257 14.3784 4.46647 14.0742 4.34545 13.8C4.23022 13.5311 4.03887 13.3018 3.79497 13.1403C3.55107 12.9788 3.26526 12.8921 2.97273 12.8909H2.81818C2.33597 12.8909 1.87351 12.6994 1.53253 12.3584C1.19156 12.0174 1 11.5549 1 11.0727C1 10.5905 1.19156 10.1281 1.53253 9.78708C1.87351 9.4461 2.33597 9.25455 2.81818 9.25455H2.9C3.2009 9.24751 3.49273 9.15011 3.73754 8.97501C3.98236 8.79991 4.16883 8.55521 4.27273 8.27273C4.39374 7.99853 4.42984 7.69437 4.37637 7.39947C4.3229 7.10456 4.18231 6.83244 3.97273 6.61818L3.91818 6.56364C3.74913 6.39478 3.61503 6.19425 3.52353 5.97353C3.43203 5.7528 3.38493 5.51621 3.38493 5.27727C3.38493 5.03834 3.43203 4.80174 3.52353 4.58102C3.61503 4.36029 3.74913 4.15977 3.91818 3.99091C4.08704 3.82186 4.28757 3.68775 4.50829 3.59626C4.72901 3.50476 4.96561 3.45766 5.20455 3.45766C5.44348 3.45766 5.68008 3.50476 5.9008 3.59626C6.12152 3.68775 6.32205 3.82186 6.49091 3.99091L6.54545 4.04545C6.75971 4.25503 7.03183 4.39562 7.32674 4.4491C7.62164 4.50257 7.9258 4.46647 8.2 4.34545H8.27273C8.54161 4.23022 8.77093 4.03887 8.93245 3.79497C9.09397 3.55107 9.18065 3.26526 9.18182 2.97273V2.81818C9.18182 2.33597 9.37338 1.87351 9.71435 1.53253C10.0553 1.19156 10.5178 1 11 1C11.4822 1 11.9447 1.19156 12.2856 1.53253C12.6266 1.87351 12.8182 2.33597 12.8182 2.81818V2.9C12.8193 3.19253 12.906 3.47834 13.0676 3.72224C13.2291 3.96614 13.4584 4.15749 13.7273 4.27273C14.0015 4.39374 14.3056 4.42984 14.6005 4.37637C14.8954 4.3229 15.1676 4.18231 15.3818 3.97273L15.4364 3.91818C15.6052 3.74913 15.8057 3.61503 16.0265 3.52353C16.2472 3.43203 16.4838 3.38493 16.7227 3.38493C16.9617 3.38493 17.1983 3.43203 17.419 3.52353C17.6397 3.61503 17.8402 3.74913 18.0091 3.91818C18.1781 4.08704 18.3122 4.28757 18.4037 4.50829C18.4952 4.72901 18.5423 4.96561 18.5423 5.20455C18.5423 5.44348 18.4952 5.68008 18.4037 5.9008C18.3122 6.12152 18.1781 6.32205 18.0091 6.49091L17.9545 6.54545C17.745 6.75971 17.6044 7.03183 17.5509 7.32674C17.4974 7.62164 17.5335 7.9258 17.6545 8.2V8.27273C17.7698 8.54161 17.9611 8.77093 18.205 8.93245C18.4489 9.09397 18.7347 9.18065 19.0273 9.18182H19.1818C19.664 9.18182 20.1265 9.37338 20.4675 9.71435C20.8084 10.0553 21 10.5178 21 11C21 11.4822 20.8084 11.9447 20.4675 12.2856C20.1265 12.6266 19.664 12.8182 19.1818 12.8182H19.1C18.8075 12.8193 18.5217 12.906 18.2778 13.0676C18.0339 13.2291 17.8425 13.4584 17.7273 13.7273Z" stroke="white" stroke-opacity="0.65" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    Account Details</a></li>
                                <!--li><a style="font-size: 17.2px; margin-bottom: 15px; color: #636364 !important;" href="/my/?page=support" class="d-inline-flex align-items-center rounded active text-black" aria-current="page"><div style="border-left:3px solid #ffffff00; margin-left: -25px; margin-right: 20px; height:20px; border-radius: 500px;"></div><img src="/static/img/support.svg" style="font-size: 25px; margin-right: 10px; margin-left: -12px; filter: invert(100%) sepia(0%) saturate(0%) hue-rotate(137deg) brightness(103%) contrast(102%);">Support</a></li-->
                                <li><a style="font-size: 17.2px; margin-bottom: 15px; color: #aca8a9 !important; font-weight: 500;" href="/my/logout" class="d-inline-flex align-items-center rounded active text-black" aria-current="page"><div style="border-left:3px solid #ffffff00; margin-left: -25px; margin-right: 20px; height:20px; border-radius: 500px;"></div><svg style="margin-right: 10px; margin-left: -12px; " width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 7L14 11M14 11L10 15M14 11H1M1.33782 6C3.06687 3.01099 6.29859 1 10 1C15.5228 1 20 5.47715 20 11C20 16.5228 15.5228 21 10 21C6.29859 21 3.06687 18.989 1.33782 16" stroke="white" stroke-opacity="0.65" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>Logout</a></li>
                            </ul>
                          </div>
                        </li>
                        
                    </ul>
                  </nav>
                  
                      </aside>
                </div>
              </div>
              <style>
                .frmct {
                    background-image: url("data:image/svg+xml,%3Csvg width='20' height='21' viewBox='0 0 20 21' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='9.7859' cy='9.78614' r='8.23951' stroke='%235E5E5E' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/%3E%3Cpath d='M15.5166 15.9448L18.747 19.1668' stroke='%235E5E5E' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: left 10px center;
        background-size: 16px 16px;
        padding-left: 35px !important;
    
    
                }

                table, tr, td, th{

padding: 10px;

margin: auto;

border: none;

}
              </style>
            <div class="col-md-9">
                <h2>
                Instruction


                </h2>     
                                <?php
                
                if ($_GET['id'] === 'spoofer' || $_GET['id'] === 'spoofer1' || $_GET['id'] === 'spoofer2' || $_GET['id'] === 'spoofer3') {
                  $i = 'spoofer';
                   $id = 'spoofer';
                } else if ($_GET['id'] === 'csgo1' || $_GET['id'] === 'csgo2' || $_GET['id'] === 'csgo3' || $_GET['id'] === 'csgo4') {
                  $i = 'csgo';
                   $id = 'csgo';
                } else if ($_GET['id'] === 'cheat1' || $_GET['id'] === 'cheat2' || $_GET['id'] === 'cheat3' || $_GET['id'] === 'cheat4' || $_GET['id'] === 'cheat5' || $_GET['id'] === 'cheat6') {
                  $i = 'downloadtext';
                  $id = 'cheat';
                } else if ($_GET['id'] === 'fivem1' || $_GET['id'] === 'fivem2' || $_GET['id'] === 'fivem3' || $_GET['id'] === 'fivem4') {
                    $i = 'fivem';
                     $id = 'fivem';
                } else if ($_GET['id'] === 'arena1' || $_GET['id'] === 'arena2' || $_GET['id'] === 'arena3' || $_GET['id'] === 'arena4') {
                    $i = 'arena';
                     $id = 'cheata';
                } else {
                    $id = False;
                }
                if ($id != False) {
                $data = DB::query("SELECT * FROM files WHERE product=:prod ORDER BY id DESC", array(':prod'=>$id))[0];
                }
                echo preg_replace('!(http://[a-z0-9_./?=&-]+)!i', '<a target="_blank" href="$1">$1</a>', preg_replace('!(https://[a-z0-9_./?=&-]+)!i', '<a target="_blank" href="$1">$1</a>', nl2br(DB::query("SELECT {$i} FROM root WHERE id=1")[0][$i])));
                ?>   
               
        </div>

    
    </div></div>


    
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