<?php
if (isset($_GET['changeval']) && $_GET['changeval'] === 'us' || $_GET['changeval'] === 'eu') {
    $_SESSION['val'] = $_GET['changeval'];
    header('Location: '.$_SERVER['HTTP_REFERER']);
}
$nonreadnotify = DB::query('SELECT notfs FROM users WHERE id=:id', array(':id'=>isLoggedIn()))[0]['notfs'];

if ((int)$nonreadnotify > 0) {
    $nonreadnotify_title = "<span class='badge rounded-pill text-bg-secondary'>{$nonreadnotify}</span>";
}

?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();
   for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
   k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(94687163, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script><!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-T5LRY4TV4R"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-T5LRY4TV4R');
</script>
<meta name="title" content="Aworex">

<meta name="robots" content="index, follow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="language" content="English">
<meta name="language" content="English">
<link rel="canonical" href="https://aworex.com/<?=basename($_SERVER['PHP_SELF'],'.php')?>">

<style>
.splash__block.active {
    display: block;
}
.splash__block {
    z-index: 4;
}
.splash__block {
    padding-bottom: 25px;
    top: 0;
    left: 0;
    width: 100%;
    overflow: hidden;
    display: none;
    padding: 10px;
    text-align: center;
    color: #FAFAFD;
    font-weight: 400;
    z-index: 3;
    font-size: 16px;
    line-height: 19px;
    background: #00A8AE;
}
.splash__wrapper {
    max-width: 1320px;
    margin: 0 auto;
    position: relative;
}
.splash__block p {
    margin: 0;
    padding: 0;
    width: calc(100% - 30px);
}
.splash__block a {
    text-decoration: none;
    font-weight: 500;
    color: #FAFAFD;
}
.splash__close {
    position: absolute;
    right: 10px;
    top: 50%;
    z-index: 4;
    cursor: pointer;
    transform: translateY(-50%);
}
.accordion-button::after {
    background-image: none !important;
}
.accordion-item {
    border: none !important;
}
@media screen and (max-width: 768px) {
    .splash__block {
    margin-top: -48px; !important}
}
</style>
<noscript><div><img src="https://mc.yandex.ru/watch/94687163" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<div class="splash__block active">
<a href="/freetrial">
		<div class="splash__wrapper">
							<p>Free trial 3 hours For Escape From Tarkov | CS2 | EFT Arena | FiveM</p>
                            </a>
						<span class="splash__close">
<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1 0.924805L11 11.0748M11 0.924805L1 11.0748L11 0.924805Z" stroke="#FAFAFD" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
</span>
		</div>
	</div>
    <script>
    function readtnotfs() {
     $.ajax({
                        type: "GET",
                        url: '/api/ReadNotfs',
                        processData: false,
            contentType: false,

                       
                        });
                        
    } 
    </script>
<header style="margin-top: 15px;" class="header" id="header">
        <nav class="nav container">
            <a href="/" class="nav__logo" style="margin-left: 55px; margin-right: 50px;">
                
<img width="40" src="/static/img/logo.png">
    
                </a>

            <div class="nav__menu" id="nav-menu">
                <ul style=" margin-top: 15px; padding-left: 0rem;" class="nav__list">
                
                    <li class="nav__item">
                        <a href="/support" class="nav__link"><h4 style="font-weight: 400; font-size: 20px; display: inline-block !important; margin-right: 8px; margin-top: 10px; color: #aca6a7;">Support</h4></a>
                    </li>
                     <li class="nav__item">
                        <a href="/freetrial" class="nav__link"><h4 style="font-weight: 400; font-size: 20px; display: inline-block !important; margin-right: 8px; margin-top: 10px; color: #aca6a7;">Free Trial</h4></a>
                    </li>
                     <li class="nav__item">
                        <a href="/faq" class="nav__link"><h4 style="font-weight: 400; font-size: 20px; display: inline-block !important; margin-right: 8px; margin-top: 10px; color: #aca6a7;">FAQ</h4></a>
                    </li>
                    <li class="nav__item">
                        <a href="/blog" class="nav__link"><h4 style="font-weight: 400; font-size: 20px; display: inline-block !important; margin-right: 8px; margin-top: 10px; color: #aca6a7;">Blog</h4></a>
                    </li>
                    <li class="nav__item">
                        <a href="https://discord.gg/yMcSssBEJf" class="nav__link"><h4 style="font-weight: 400; font-size: 20px; display: inline-block !important; margin-right: 8px; margin-top: 10px; color: #aca6a7;">Discord</h4></a>
                    </li>

                    <i class='change-theme' id="theme-button"></i>
                </ul>
            </div>



            <div class="nav__toggle burgerLink" id="nav-toggle">
                <i class='bx bx-menu'></i>
            </div>



            
            

<style>
@media screen and (max-width: 768px) {

    .mdt {
        margin-left: 15%;
    }
    .mtd {
        margin-top: -20px;
    }
}
@media screen and (min-width: 768px) {

    .mdt {
        margin-left: 25%;
    }
}
</style>


<div class="dropdown mdt" >
 <li class="nav__item">
      <!--a onmouseover="readtnotfs()" class="nav__link" href="#"><h4 style="font-weight: 400; font-size: 20px; display: inline-block !important; margin-right: 0px; margin-top: 10px; color: #aca6a7;"><img <?php if ((int)$nonreadnotify > 0) {
                                                                echo 'position-relative';
                                                            } ?> src="/static/img/notify.svg" width="30"><?php if ((int)$nonreadnotify > 0) { ?><span style="font-size: 8.5px;" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        <?php echo $nonreadnotify; } ?>
                                    </span></h4></a-->
                        
                    </li>
  <div class="dropdown-content" style="margin-left: -150px; min-width: 350px; max-width: 350px; max-height: 350px; overflow-y: scroll; /* Добавляем полосы прокрутки */">
  <?php
                    $reviews = DB::query('SELECT * FROM notifications ORDER BY id DESC');
            $start = 8;
            $style = '';
           foreach ($reviews as $r) {
               if ($r['uid'] === isLoggedIn() || (int)$r['uid'] === 0)
                echo '
                <div style="text-align: start; background-color: #060b14;" class="card mb-3">
            <div class="card-body">
            
                <img src="/static/img/info.png" style="object-fit: cover; width: 25px; height: 25px; border-radius: 150px; margin-top: -25px;" class="fill-current mp-5 imgav' . $p['id'] . '" onerror="imgError(this);">
                <h5 style="font-size: 15px; margin-bottom: -0px; margin-left: 4px; font-weight: 700;" href="testings" class="col-md-10 ml-3  d-inline-block font-weight-bold">'.$r['title'].'
                
                    <br><p href="testings" style="font-size: 10px; font-weight: 400; margin-top: -45px;" class="col-md-10 d-inline-block font-weight-bold">'.$r['date'].'</p></h5>
             
                <p href="testings" style="color: #9b9da1; font-size: 15px;" class="col-10 d-inline-block font-weight-bold">'.$r['text'].'</p>
               

                </div></div>';
            } ?>
  </div>
</div>
            <?php
            if (!isLoggedIn()) { ?>
            <a style="margin-left: 1%;"  href="/my/login" class="loginbtn tm">Login</a>
            <a style="margin-left: 15px;" href="/my/reg" class="regbtn tm">Register</a>
            <?php

            } else { ?>
                 <a style="margin-left: 2%;"  href="/my/" class="loginbtn tm">Profile</a>
            <?php } ?>

            
        </nav>
    </header> 
    
    <div class="mobile_bar">
			<div class="mobile_bar-close">✕</div>
			<div class="mobile_bar-menu">
				<ul>
					<li class="nav__item">
            <a href="/support" class="nav__link"><h4 style="font-weight: 400; font-size: 20px; display: inline-block !important; margin-right: 8px; margin-top: 10px; color: #aca6a7;">Support</h4></a>
        </li>
        <li class="nav__item">
            <a href="/freetrial" class="nav__link"><h4 style="font-weight: 400; font-size: 20px; display: inline-block !important; margin-right: 8px; margin-top: 10px; color: #aca6a7;">Free Trial</h4></a>
        </li>
        <li class="nav__item">
            <a href="https://discord.gg/RzFmbx94YU" class="nav__link"><h4 style="font-weight: 400; font-size: 20px; display: inline-block !important; margin-right: 8px; margin-top: 10px; color: #aca6a7;">Discord</h4></a>
        </li>
         <li class="nav__item">
            <a href="/faq" class="nav__link"><h4 style="font-weight: 400; font-size: 20px; display: inline-block !important; margin-right: 8px; margin-top: 10px; color: #aca6a7;">FAQ</h4></a>
        </li>
         <?php
            if (!isLoggedIn()) { ?>
        <li class="nav__item">
          <a href="/my/login" class="nav__link"><h4 style="font-weight: 400; font-size: 20px; display: inline-block !important; margin-right: 8px; margin-top: 10px; color: #aca6a7;">Login</h4></a>
      </li>
      <li class="nav__item">
          <a href="/my/reg" class="nav__link"><h4 style="font-weight: 400; font-size: 20px; display: inline-block !important; margin-right: 8px; margin-top: 10px; color: #aca6a7;">Register</h4></a>
      </li>
      <?php } else { ?>
       <li class="nav__item">
          <a href="/my/" class="nav__link"><h4 style="font-weight: 400; font-size: 20px; display: inline-block !important; margin-right: 8px; margin-top: 10px; color: #aca6a7;">Profile</h4></a>
      </li>
      <?php } ?>
					
				</ul>
			</div>
			<div class="mobile_bar-out"></div>
		</div>
    <script>
      $( document ).ready(function() {

$('.burgerLink').on('click touch', function(){
    mobileMenu = $('.mobile_bar');
    if(mobileMenu.hasClass('active')){
        mobileMenu.removeClass('active');
    }
    else{
        mobileMenu.addClass('active');
    }
});
$('.mobile_bar-close').on('click touch', function(){
    mobileMenu = $('.mobile_bar');
    if(mobileMenu.hasClass('active')){
        mobileMenu.removeClass('active');
    }
});
$('.mobile_bar-out').on('click touch', function(){
    mobileMenu = $('.mobile_bar');
    if(mobileMenu.hasClass('active')){
        mobileMenu.removeClass('active');
    }
});
});

    </script>
    <script>jQuery(function ($) {

		
		$('.splash__close').on('click touch', function(){
			$('.header').removeClass('active');
			$('.splash__block').removeClass('active');
			$('body').removeClass('splashed');
			console.log('1');
		});
	
});</script>  
<?php
$data_tvt = DB::query('SELECT * FROM status WHERE id=1')[0];
?>