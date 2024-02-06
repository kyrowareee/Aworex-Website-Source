<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require $_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php";
session_start();
include($_SERVER['DOCUMENT_ROOT'] . '/classes/DB.php');
include($_SERVER['DOCUMENT_ROOT'] . '/classes/Auth.php');
if (isset($_GET['token'])) {
    $data = DB::query('SELECT * FROM buy_tokens WHERE token=:token', array(':token'=>$_GET['token']))[0];
    if ($data['token'] === $_GET['token']) {
        if ($data['user_id'] === isLoggedIn()) {
            if ($data['account_id'] === '1' || $data['account_id'] === '2' || $data['account_id'] === '3' || $data['account_id'] === '4') {
                $data_acc = DBA::query('SELECT * FROM accounts WHERE account_id=:aid AND account_buyed=0', array(':aid'=>$data['account_id']))[0];
            }
            if ($data['account_id'] === 'spoofer1' || $data['account_id'] === 'spoofer2') {
                $data_acc = DBA::query('SELECT * FROM accounts_spoofer WHERE account_buyed=0', array(':aid'=>$data['account_id']))[0];
            }
            if ($_SESSION['code'] === '1') {
                DB::query('UPDATE promocodes SET uses=uses-1 WHERE text=:id', array(':id'=>$_SESSION['promocode']));
            }
            if ($data['account_id'] === '1' || $data['account_id'] === '2' || $data['account_id'] === '3' || $data['account_id'] === '4') {
                DBA::query('UPDATE accounts SET account_buyed=1 WHERE id=:id', array(':id'=>$data_acc['id']));
            }
            if ($data['account_id'] === 'spoofer1' || $data['account_id'] === 'spoofer2') {
                DBA::query('UPDATE accounts_spoofer SET account_buyed=1 WHERE id=:id', array(':id'=>$data_acc['id']));
            }
            if ($data['account_id'] === 'val1' || $data['account_id'] === 'val2' || $data['account_id'] === 'val3') {
                if ($data['account_id'] === 'val1') {
                    $cid = '1day';
                } else if ($data['account_id'] === 'val2') {
                    $cid = '7days';
                } else if ($data['account_id'] === 'val3') {
                    $cid = '30days';
                } else {
                    $cid = 'lifetime';
                }
                $data_acc = DBA::query('SELECT * FROM accounts_valorant WHERE t=:t AND account_buyed=0 AND ft=:ft', array(':t'=>$cid, ':ft'=>'False'))[0];
                if ((int)$data_acc['id'] > 0) {
                    $accid = $data_acc['id'];
                } else {
                    $accid = 10000013;
                }
                DBA::query('UPDATE accounts_valorant SET account_buyed=1 WHERE id=:id', array(':id'=>$data_acc['id']));
            }

            if ($data['account_id'] === 'arena1' || $data['account_id'] === 'arena2' || $data['account_id'] === 'arena3' || $data['account_id'] === 'arena4') {
                $accid = 1000013;
            }

            if ($data['account_id'] === 'ov1' || $data['account_id'] === 'ov2' || $data['account_id'] === 'ov3' || $data['account_id'] === 'ov4') {
                if ($data['account_id'] === 'ov1') {
                    $cid = '1day';
                } else if ($data['account_id'] === 'ov2') {
                    $cid = '7days';
                } else if ($data['account_id'] === 'ov3') {
                    $cid = '30days';
                } else {
                    $cid = 'lifetime';
                }
                $data_acc = DBA::query('SELECT * FROM accounts_overwatch WHERE t=:t AND account_buyed=0 AND ft=:ft', array(':t'=>$cid, ':ft'=>'False'))[0];
                if ((int)$data_acc['id'] > 0) {
                    $accid = $data_acc['id'];
                } else {
                    $accid = 10000013;
                }
                DBA::query('UPDATE accounts_overwatch SET account_buyed=1 WHERE id=:id', array(':id'=>$data_acc['id']));
            }

            if ($data['account_id'] === 'ap1' || $data['account_id'] === 'ap2' || $data['account_id'] === 'ap3' || $data['account_id'] === 'ap4') {
                if ($data['account_id'] === 'ap1') {
                    $cid = '1day';
                } else if ($data['account_id'] === 'ap2') {
                    $cid = '3days';
                } else if ($data['account_id'] === 'ap3') {
                    $cid = '7days';
                } else {
                    $cid = '30days';
                }
                $data_acc = DBA::query('SELECT * FROM accounts_apex WHERE t=:t AND account_buyed=0 AND ft=:ft', array(':t'=>$cid, ':ft'=>'False'))[0];
                if ((int)$data_acc['id'] > 0) {
                    $accid = $data_acc['id'];
                } else {
                    $accid = 10000013;
                }
                DBA::query('UPDATE accounts_apex SET account_buyed=1 WHERE id=:id', array(':id'=>$data_acc['id']));
            }

            if ($data['account_id'] === 'frl1' || $data['account_id'] === 'frl2' || $data['account_id'] === 'frl3') {
                if ($data['account_id'] === 'frl1') {
                    $cid = '1day';
                } else if ($data['account_id'] === 'frl2') {
                    $cid = '7days';
                } else if ($data['account_id'] === 'frl3') {
                    $cid = '30days';
                } else {
                    $cid = 'lifetime';
                }
                $data_acc = DBA::query('SELECT * FROM accounts_farlight WHERE t=:t AND account_buyed=0 AND ft=:ft', array(':t'=>$cid, ':ft'=>'False'))[0];
                if ((int)$data_acc['id'] > 0) {
                    $accid = $data_acc['id'];
                } else {
                    $accid = 10000013;
                }
                DBA::query('UPDATE accounts_farlight SET account_buyed=1 WHERE id=:id', array(':id'=>$data_acc['id']));
            }

            if ($data['account_id'] === 'csgo1' || $data['account_id'] === 'csgo2' || $data['account_id'] === 'csgo3' || $data['account_id'] === 'csgo4') {
                if ($data['account_id'] === 'csgo1') {
                    $cid = '1day';
                } else if ($data['account_id'] === 'csgo2') {
                    $cid = '7days';
                } else if ($data['account_id'] === 'csgo3') {
                    $cid = '30days';
                } else {
                    $cid = 'lifetime';
                }
                $data_acc = DBA::query('SELECT * FROM accounts_csgo WHERE t=:t AND account_buyed=0 AND ft=:ft', array(':t'=>$cid, ':ft'=>'False'))[0];
                if ((int)$data_acc['id'] > 0) {
                    $accid = $data_acc['id'];
                } else {
                    $accid = 10000013;
                }
                DBA::query('UPDATE accounts_csgo SET account_buyed=1 WHERE id=:id', array(':id'=>$data_acc['id']));
            }

            if ($data['account_id'] === 'valk1' || $data['account_id'] === 'valk2' || $data['account_id'] === 'valk3' || $data['account_id'] === 'valk4') {
                if ($data['account_id'] === 'valk1') {
                    $cid = '1day';
                } else if ($data['account_id'] === 'valk2') {
                    $cid = '7days';
                } else if ($data['account_id'] === 'valk3') {
                    $cid = '30days';
                } else {
                    $cid = 'lifetime';
                }
                $data_acc = DBA::query('SELECT * FROM accounts_valk WHERE t=:t AND account_buyed=0 AND ft=:ft', array(':t'=>$cid, ':ft'=>'False'))[0];
                if ($data_acc > 0) {
                    $accid = $data_acc['id'];
                } else {
                    $accid = 10000013;
                }
                DBA::query('UPDATE accounts_valk SET account_buyed=1 WHERE id=:id', array(':id'=>$data_acc['id']));
            }

            if ($data['account_id'] === 'cheat1' || $data['account_id'] === 'cheat3' || $data['account_id'] === 'cheat4' || $data['account_id'] === 'cheat5' || $data['account_id'] === 'cheat6') {
                if ($data['account_id'] === 'cheat1') {
                    $cid = '1day';
                } else if ($data['account_id'] === 'cheat3') {
                    $cid = '7days';
                } else if ($data['account_id'] === 'cheat5') {
                    $cid = '30days';
                } else {
                    $cid = 'lifetime';
                }
                $data_acc = DBA::query('SELECT * FROM accounts_cheat WHERE t=:t AND account_buyed=0 AND ft=:ft', array(':t'=>$cid, ':ft'=>'False'))[0];
                DBA::query('UPDATE accounts_cheat SET account_buyed=1 WHERE id=:id', array(':id'=>$data_acc['id']));
            
                if ($data_acc > 0) {
                    $accid = $data_acc['id'];
                } else {
                    $accid = 10000013;
                }
            }

            if ($data['account_id'] === 'update') {

                    $accid = 10000013;
            }
            $date = gmdate("Y-m-d", time());
            DB::query('INSERT INTO shops_tokens VALUES (\'0\', :uid, :aid, :pm, :ida, NOW(), :ip)', array(':uid'=>isLoggedIn(), ':aid'=>$data['account_id'], ':pm'=>$data['paymethod'], ':ida'=>$accid, ':ip'=>$_SERVER['REMOTE_ADDR']));
        //DB::query('INSERT INTO total VALUES (\'0\', :uid, :aid, :time)', array(':uid'=>$data['user_id'], ':aid'=>$data['account_id'], ':time'=>time()));
       //DB::query('INSERT INTO totaled VALUES (\'0\', :uidd, :aeid, :timed)', array(':uidd'=>'11111', ':aeid'=>'11111', ':timed'=>'11111'));
            $login = DB::query('SELECT username FROM users WHERE id=:id', array(':id'=>isLoggedIn()))[0]['username'];
            $price = $_GET['price'];
            Notification::purchase($data['account_id'], email(), $data['paymethod'], $login, $_SESSION['price']);
            DB::query('DELETE FROM buy_tokens WHERE token=:token', array(':token'=>$_GET['token']));
        header('Location: /my/orders');
        } else {
            die('<pre>Unknown Error</pre>');
        }
    } else {
        die('<pre>Unknown Error</pre>');
    }
} else {
    die('<pre>Unknown Error</pre>');
}