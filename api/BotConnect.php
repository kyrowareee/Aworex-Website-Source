<?php
require $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";
$stripe = new \Stripe\StripeClient(
    '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'
);
include $_SERVER['DOCUMENT_ROOT'] . "/classes/DB.php";
function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function getRandomInt($max) {
    return mt_rand(0, $max - 1);
}




if ($_GET['req'] === 'ft-eft') {
    $randn = generateRandomString();

    $randn_f = generateRandomString();
    $randn_v = generateRandomString();
    $data_acc = DBA::query('SELECT * FROM accounts_cheat WHERE t=:t AND account_buyed=0 AND ft=:ft', array(':t'=>'freetest', ':ft'=>'True'))[0];
    DBA::query('UPDATE accounts_cheat SET account_buyed=1 WHERE id=:id', array(':id'=>$data_acc['id']));;

    $select = 'freetest';
    $ft = 'True';
    $length = '3h';
    /*DB::query('INSERT INTO promocodes VALUES (\'0\', :uses, 1, :text, :value, 0, :time, :cheat)', array(':text' => $randn, ':uses' => 1, ':value' => 10, ':time'=>'259200', ':cheat'=>'cheat3'));
    DB::query('INSERT INTO promocodes VALUES (\'0\', :uses, 1, :text, :value, 0, :time, :cheat)', array(':text' => $randn_f, ':uses' => 1, ':value' => 20, ':time'=>'86400', ':cheat'=>'cheat1'));
    DB::query('INSERT INTO promocodes VALUES (\'0\', :uses, 1, :text, :value, 0, :time, :cheat)', array(':text' => $randn_v, ':uses' => 1, ':value' => 5, ':time'=>'604800', ':cheat'=>'cheat6'));*/
    $i = DB::query('SELECT downloadtext FROM root_ft WHERE id=1')[0]['downloadtext'];
    echo json_encode(array(
        'promocode' => $randn,
        'accountkey' => $data_acc['key_t'],
        'twp_promo' => $randn_f,
        'fvp_promo' => $randn_v,
        'instruction' => $i."\nYour Free Trial key: ".$data_acc['key_t']
    ));
} else if (explode('_', $_GET['req'])[0] === 'prom') {
    if (explode('_', $_GET['req'])[1] === '1d') {
        $time = '95160';
        $percent = 20;
        $for = 'cheat1';
    } else if (explode('_', $_GET['req'])[1] === '3d') {
        $time = '142740';
        $percent = 10;
        $for = 'cheat3';
    } else if (explode('_', $_GET['req'])[1] === '7d') {
        $time = '333060';
        $percent = 5;
        $for = 'cheat6';
    }
    $randpromo = generateRandomString();
    $stripe->coupons->create(
        ['duration' => 'forever', 'id' => $randpromo, 'percent_off' => $percent]
    );
    DB::query('INSERT INTO promocodes VALUES (\'0\', :uses, 1, :text, :value, 0, :time, NOW(), :cheat)', array(':text' => $randpromo, ':uses' => 9999999999, ':value' => $percent, ':time'=>$time, ':cheat'=>$for));
    echo json_encode(array(
        'promo' => $randpromo
    ));
} else if (explode('_', $_GET['req'])[0] === 'ft-ap') {
    $randn = generateRandomString();

    $randn_f = generateRandomString();
    $randn_v = generateRandomString();
    $data_acc = DBA::query('SELECT * FROM accounts_apex WHERE t=:t AND account_buyed=0 AND ft=:ft', array(':t'=>'freetest', ':ft'=>'True'))[0];
    DBA::query('UPDATE accounts_apex SET account_buyed=1 WHERE id=:id', array(':id'=>$data_acc['id']));;

    $select = 'freetest';
    $ft = 'True';
    $length = '3h';

    $curl = curl_init();

  

    curl_close($curl);
    $stripe->coupons->create(
        ['duration' => 'forever', 'id' => $randn, 'percent_off' => 10]
    );
    $twp = $stripe->coupons->create(['duration' => 'forever', 'id' => $randn_f, 'percent_off' => 20]);
    $fvp = $stripe->coupons->create(['duration' => 'forever', 'id' => $randn_v, 'percent_off' => 5]);
    /*DB::query('INSERT INTO promocodes VALUES (\'0\', :uses, 1, :text, :value, 0, :time, :cheat)', array(':text' => $randn, ':uses' => 1, ':value' => 10, ':time'=>'259200', ':cheat'=>'cheat3'));
    DB::query('INSERT INTO promocodes VALUES (\'0\', :uses, 1, :text, :value, 0, :time, :cheat)', array(':text' => $randn_f, ':uses' => 1, ':value' => 20, ':time'=>'86400', ':cheat'=>'cheat1'));
    DB::query('INSERT INTO promocodes VALUES (\'0\', :uses, 1, :text, :value, 0, :time, :cheat)', array(':text' => $randn_v, ':uses' => 1, ':value' => 5, ':time'=>'604800', ':cheat'=>'cheat6'));*/
    $i = DB::query('SELECT apex FROM root_ft WHERE id=1')[0]['apex'];
    echo json_encode(array(
        'promocode' => $randn,
        'accountkey' => $data_acc['key_t'],
        'twp_promo' => $randn_f,
        'fvp_promo' => $randn_v,
        'instruction' => $i."\nYour Free Trial key: ".$data_acc['key_t']
    ));
} else if (explode('_', $_GET['req'])[0] === 'ft-frl') {
    $randn = generateRandomString();

    $randn_f = generateRandomString();
    $randn_v = generateRandomString();
    $data_acc = DBA::query('SELECT * FROM accounts_farlight WHERE t=:t AND account_buyed=0 AND ft=:ft', array(':t'=>'freetest', ':ft'=>'True'))[0];
    DBA::query('UPDATE accounts_farlight SET account_buyed=1 WHERE id=:id', array(':id'=>$data_acc['id']));;

    $select = 'freetest';
    $ft = 'True';
    $length = '3h';

    $curl = curl_init();

  

    curl_close($curl);
    $stripe->coupons->create(
        ['duration' => 'forever', 'id' => $randn, 'percent_off' => 10]
    );
    $twp = $stripe->coupons->create(['duration' => 'forever', 'id' => $randn_f, 'percent_off' => 20]);
    $fvp = $stripe->coupons->create(['duration' => 'forever', 'id' => $randn_v, 'percent_off' => 5]);
    /*DB::query('INSERT INTO promocodes VALUES (\'0\', :uses, 1, :text, :value, 0, :time, :cheat)', array(':text' => $randn, ':uses' => 1, ':value' => 10, ':time'=>'259200', ':cheat'=>'cheat3'));
    DB::query('INSERT INTO promocodes VALUES (\'0\', :uses, 1, :text, :value, 0, :time, :cheat)', array(':text' => $randn_f, ':uses' => 1, ':value' => 20, ':time'=>'86400', ':cheat'=>'cheat1'));
    DB::query('INSERT INTO promocodes VALUES (\'0\', :uses, 1, :text, :value, 0, :time, :cheat)', array(':text' => $randn_v, ':uses' => 1, ':value' => 5, ':time'=>'604800', ':cheat'=>'cheat6'));*/
    $i = DB::query('SELECT farlight FROM root_ft WHERE id=1')[0]['farlight'];
    echo json_encode(array(
        'promocode' => $randn,
        'accountkey' => $data_acc['key_t'],
        'twp_promo' => $randn_f,
        'fvp_promo' => $randn_v,
        'instruction' => $i."\nYour Free Trial key: ".$data_acc['key_t']
    ));
} else if (explode('_', $_GET['req'])[0] === 'ft-cs2') {
    $randn = generateRandomString();

    $randn_f = generateRandomString();
    $randn_v = generateRandomString();
    $data_acc = DBA::query('SELECT * FROM accounts_csgo WHERE t=:t AND account_buyed=0 AND ft=:ft', array(':t'=>'freetest', ':ft'=>'True'))[0];
    DBA::query('UPDATE accounts_csgo SET account_buyed=1 WHERE id=:id', array(':id'=>$data_acc['id']));;

    $select = 'freetest';
    $ft = 'True';
    $length = '3h';

    $curl = curl_init();

  

    curl_close($curl);
    /*DB::query('INSERT INTO promocodes VALUES (\'0\', :uses, 1, :text, :value, 0, :time, :cheat)', array(':text' => $randn, ':uses' => 1, ':value' => 10, ':time'=>'259200', ':cheat'=>'cheat3'));
    DB::query('INSERT INTO promocodes VALUES (\'0\', :uses, 1, :text, :value, 0, :time, :cheat)', array(':text' => $randn_f, ':uses' => 1, ':value' => 20, ':time'=>'86400', ':cheat'=>'cheat1'));
    DB::query('INSERT INTO promocodes VALUES (\'0\', :uses, 1, :text, :value, 0, :time, :cheat)', array(':text' => $randn_v, ':uses' => 1, ':value' => 5, ':time'=>'604800', ':cheat'=>'cheat6'));*/
    $i = DB::query('SELECT csgo FROM root_ft WHERE id=1')[0]['csgo'];
    echo json_encode(array(
        'promocode' => $randn,
        'accountkey' => $data_acc['key_t'],
        'twp_promo' => $randn_f,
        'fvp_promo' => $randn_v,
        'instruction' => $i."\nYour Free Trial key: ".$data_acc['key_t']
    ));
} else if (explode('_', $_GET['req'])[0] === 'ft-fivem') {
    $randn = generateRandomString();

    $randn_f = generateRandomString();
    $randn_v = generateRandomString();
    $data_acc = DBA::query('SELECT * FROM accounts_fivem WHERE t=:t AND account_buyed=0 AND ft=:ft', array(':t'=>'freetest', ':ft'=>'True'))[0];
    DBA::query('UPDATE accounts_fivem SET account_buyed=1 WHERE id=:id', array(':id'=>$data_acc['id']));;

    $select = 'freetest';
    $ft = 'True';
    $length = '3h';

    $curl = curl_init();

  

    curl_close($curl);
    /*DB::query('INSERT INTO promocodes VALUES (\'0\', :uses, 1, :text, :value, 0, :time, :cheat)', array(':text' => $randn, ':uses' => 1, ':value' => 10, ':time'=>'259200', ':cheat'=>'cheat3'));
    DB::query('INSERT INTO promocodes VALUES (\'0\', :uses, 1, :text, :value, 0, :time, :cheat)', array(':text' => $randn_f, ':uses' => 1, ':value' => 20, ':time'=>'86400', ':cheat'=>'cheat1'));
    DB::query('INSERT INTO promocodes VALUES (\'0\', :uses, 1, :text, :value, 0, :time, :cheat)', array(':text' => $randn_v, ':uses' => 1, ':value' => 5, ':time'=>'604800', ':cheat'=>'cheat6'));*/
    $i = DB::query('SELECT fivem FROM root_ft WHERE id=1')[0]['fivem'];
    echo json_encode(array(
        'promocode' => $randn,
        'accountkey' => $data_acc['key_t'],
        'twp_promo' => $randn_f,
        'fvp_promo' => $randn_v,
        'instruction' => $i."\nYour Free Trial key: ".$data_acc['key_t']
    ));
} else if (explode('_', $_GET['req'])[0] === 'ft-arena') {
    $randn = generateRandomString();

    $randn_f = generateRandomString();
    $randn_v = generateRandomString();
    $data_acc = DBA::query('SELECT * FROM accounts_cheata WHERE t=:t AND account_buyed=0 AND ft=:ft', array(':t'=>'freetest', ':ft'=>'True'))[0];
    DBA::query('UPDATE accounts_cheata SET account_buyed=1 WHERE id=:id', array(':id'=>$data_acc['id']));;

    $select = 'freetest';
    $ft = 'True';
    $length = '3h';

    $curl = curl_init();

  

    curl_close($curl);
    /*DB::query('INSERT INTO promocodes VALUES (\'0\', :uses, 1, :text, :value, 0, :time, :cheat)', array(':text' => $randn, ':uses' => 1, ':value' => 10, ':time'=>'259200', ':cheat'=>'cheat3'));
    DB::query('INSERT INTO promocodes VALUES (\'0\', :uses, 1, :text, :value, 0, :time, :cheat)', array(':text' => $randn_f, ':uses' => 1, ':value' => 20, ':time'=>'86400', ':cheat'=>'cheat1'));
    DB::query('INSERT INTO promocodes VALUES (\'0\', :uses, 1, :text, :value, 0, :time, :cheat)', array(':text' => $randn_v, ':uses' => 1, ':value' => 5, ':time'=>'604800', ':cheat'=>'cheat6'));*/
    $i = DB::query('SELECT cheata FROM root_ft WHERE id=1')[0]['cheata'];
    echo json_encode(array(
        'promocode' => $randn,
        'accountkey' => $data_acc['key_t'],
        'twp_promo' => $randn_f,
        'fvp_promo' => $randn_v,
        'instruction' => $i."\nYour Free Trial key: ".$data_acc['key_t']
    ));
} else if (explode('_', $_GET['req'])[0] === 'ft-ov') {
    $randn = generateRandomString();

    $randn_f = generateRandomString();
    $randn_v = generateRandomString();
    $data_acc = DBA::query('SELECT * FROM accounts_overwatch WHERE t=:t AND account_buyed=0 AND ft=:ft', array(':t'=>'freetest', ':ft'=>'True'))[0];
    DBA::query('UPDATE accounts_overwatch SET account_buyed=1 WHERE id=:id', array(':id'=>$data_acc['id']));;

    $select = 'freetest';
    $ft = 'True';
    $length = '3h';

    $curl = curl_init();

  

    curl_close($curl);
    $stripe->coupons->create(
        ['duration' => 'forever', 'id' => $randn, 'percent_off' => 10]
    );
    $twp = $stripe->coupons->create(['duration' => 'forever', 'id' => $randn_f, 'percent_off' => 20]);
    $fvp = $stripe->coupons->create(['duration' => 'forever', 'id' => $randn_v, 'percent_off' => 5]);
    /*DB::query('INSERT INTO promocodes VALUES (\'0\', :uses, 1, :text, :value, 0, :time, :cheat)', array(':text' => $randn, ':uses' => 1, ':value' => 10, ':time'=>'259200', ':cheat'=>'cheat3'));
    DB::query('INSERT INTO promocodes VALUES (\'0\', :uses, 1, :text, :value, 0, :time, :cheat)', array(':text' => $randn_f, ':uses' => 1, ':value' => 20, ':time'=>'86400', ':cheat'=>'cheat1'));
    DB::query('INSERT INTO promocodes VALUES (\'0\', :uses, 1, :text, :value, 0, :time, :cheat)', array(':text' => $randn_v, ':uses' => 1, ':value' => 5, ':time'=>'604800', ':cheat'=>'cheat6'));*/
    $i = DB::query('SELECT overwatch FROM root_ft WHERE id=1')[0]['overwatch'];
    echo json_encode(array(
        'promocode' => $randn,
        'accountkey' => $data_acc['key_t'],
        'twp_promo' => $randn_f,
        'fvp_promo' => $randn_v,
        'instruction' => $i."\nYour Free Trial key: ".$data_acc['key_t']
    ));
}
