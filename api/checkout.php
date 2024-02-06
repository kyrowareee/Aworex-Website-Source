<?php
die('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"><center><h1>Contact technical support to purchase an cheat:<br><br><a href="https://discord.gg/yMcSssBEJf">https://discord.gg/yMcSssBEJf</a></h1></center>');
require $_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php";
$stripe = new \Stripe\StripeClient(
    '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'
  );
function generateRandomString($length = 256) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

session_start();
include($_SERVER['DOCUMENT_ROOT'] . '/classes/DB.php');
include($_SERVER['DOCUMENT_ROOT'] . '/classes/Auth.php');
    DB::query('INSERT INTO buy_tokens VALUES (\'0\', :uid, :token, :aid, :pm)', array(':uid'=>isLoggedIn(), ':token'=>generateRandomString(), ':aid'=>$_SESSION['productid'], ':pm'=>'card'));
    $lasttoken = DB::query('SELECT * FROM buy_tokens ORDER BY id DESC LIMIT 1')[0];
      if ($_SESSION['productid'] === '1') {
          $stripekey = 'price_1NUVRRCA69qmMx1sw9GJ1Wiv';
      } else if ($_SESSION['productid'] === '2') {
          $stripekey = 'price_1NUVRdCA69qmMx1svYShRNBX';
      } else if ($_SESSION['productid'] === '3') {
          $stripekey = 'price_1NUVRmCA69qmMx1ssV252oKB';
      } else if ($_SESSION['productid'] === '4') {
          $stripekey = 'price_1NUVRxCA69qmMx1sHxj9Jd9j';
      } else if ($_SESSION['productid'] === 'cheat1') {
        $stripekey = 'price_1OW2C0HOu1RKTJCO6p5MeOw3';
    } else if ($_SESSION['productid'] === 'cheat3') {
      $stripekey = 'price_1OW2CWHOu1RKTJCO0xfEtSoz';
    } else if ($_SESSION['productid'] === 'cheat5') {
      $stripekey = 'price_1OW2FIHOu1RKTJCOV12dfXGX';
    } else if ($_SESSION['productid'] === 'cheat6') {
      $stripekey = 'price_1OW2PBHOu1RKTJCO6HF3fVV2';
  } else if ($_SESSION['productid'] === 'spoofer1') {
    $stripekey = 'price_1OW2QnHOu1RKTJCOAcUdKIHK';
} else if ($_SESSION['productid'] === 'arena1') {
    $stripekey = 'price_1OW2QEHOu1RKTJCOhMfkRyX2';
} else if ($_SESSION['productid'] === 'arena2') {
    $stripekey = 'price_1OW2QKHOu1RKTJCO7tttGCjG';
} else if ($_SESSION['productid'] === 'arena3') {
    $stripekey = 'price_1OW2QSHOu1RKTJCOrSXODuLw';
} else if ($_SESSION['productid'] === 'arena4') {
    $stripekey = 'price_1OW2LpHOu1RKTJCOrX1dNwIT';
  } else if ($_SESSION['productid'] === 'spoofer2') {
    $stripekey = 'price_1OW2QnHOu1RKTJCOAcUdKIHK';
  } else if ($_SESSION['productid'] === 'spoofer3') {
    $stripekey = 'price_1OW2R2HOu1RKTJCOR2MJHIIZ';
  } else if ($_SESSION['productid'] === 'update') {
    $stripekey = 'price_1OW5DzHOu1RKTJCO4Gr8bvRa';
   } else if ($_SESSION['productid'] === 'csgo1') {
    $stripekey = 'price_1OW2MIHOu1RKTJCOWCYEKsZK';
  } else if ($_SESSION['productid'] === 'csgo2') {
    $stripekey = 'price_1OW2MbHOu1RKTJCOUfhlBFEl';
  } else if ($_SESSION['productid'] === 'csgo3') {
    $stripekey = 'price_1OW2MsHOu1RKTJCOJgYh8hLl';
  } else if ($_SESSION['productid'] === 'csgo4') {
    $stripekey = 'price_1OW2QhHOu1RKTJCOdhvehnsY';
  } else if ($_SESSION['productid'] === 'fivem1') {
    $stripekey = 'price_1OXoTmHOu1RKTJCOb4IuBtCo';
  } else if ($_SESSION['productid'] === 'fivem2') {
    $stripekey = 'price_1OXoTmHOu1RKTJCOb4IuBtCo';
  } else if ($_SESSION['productid'] === 'fivem3') {
    $stripekey = 'price_1OXoTwHOu1RKTJCOVW0hKDQU';
  } else if ($_SESSION['productid'] === 'fivem4') {
    $stripekey = 'price_1OXoU0HOu1RKTJCOwBl7URwY';
  }
     


    if ($_SESSION['code'] === '1') {
        if (DB::query('SELECT text FROM promocodes WHERE text=:code', array(':code'=>$_SESSION['promocode']))[0]['text'] === $_SESSION['promocode']) {
          

         
            $surl = $stripe->checkout->sessions->create([
                'success_url' => 'https://'.$_SERVER['SERVER_NAME'].'/api/AccountHandler?token='.$lasttoken['token'].'&tokenvalue='.$_SESSION['productid'].'&price='.$_SESSION['price'],
                'cancel_url' => 'https://'.$_SERVER['SERVER_NAME'].'/my',
                'line_items' => [
                  [
                    'price' => $stripekey,
                    'quantity' => 1,
                  ],
                ],
                'mode' => 'payment',
                'discounts' => [[
                  'coupon' => $_SESSION['promocode'],
                ]],
              ])['url'];
              header('Location: '. $surl);
      
    } else {

        $surl = $stripe->checkout->sessions->create([
            'success_url' => 'https://'.$_SERVER['SERVER_NAME'].'/api/AccountHandler?token='.$lasttoken['token'].'&tokenvalue='.$_SESSION['productid'].'&price='.$_SESSION['price'],
                'success_url' => 'https://'.$_SERVER['SERVER_NAME'].'/api/AccountHandler?token='.$lasttoken['token'].'&tokenvalue='.$_SESSION['productid'].'&price='.$_SESSION['price'],
            'line_items' => [
              [
                'price' => $stripekey,
                'quantity' => 1,
              ],
            ],
            'mode' => 'payment',
          ])['url'];
          header('Location: '. $surl);
    
  }
} else {
  $surl = $stripe->checkout->sessions->create([
    'success_url' => 'https://'.$_SERVER['SERVER_NAME'].'/api/AccountHandler?token='.$lasttoken['token'].'&tokenvalue='.$_SESSION['productid'].'&price='.$_SESSION['price'],
        'success_url' => 'https://'.$_SERVER['SERVER_NAME'].'/api/AccountHandler?token='.$lasttoken['token'].'&tokenvalue='.$_SESSION['productid'].'&price='.$_SESSION['price'],
    'line_items' => [
      [
        'price' => $stripekey,
        'quantity' => 1,
      ],
    ],
    'mode' => 'payment',
  ])['url'];
  header('Location: '. $surl);
}
?>