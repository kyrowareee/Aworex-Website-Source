<?php
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class Notification {


        public static function purchase($type, $email, $paymethod, $login, $price) {

            if ($type === 1) {
                $name = 'Standard Account';
                $value = '35';
                $game = 'Escape From Tarkov';

               
              } else if ($type === 2) {
                
               
                $name = 'Left Behind Account';
                $value = '50';
                $game = 'Escape From Tarkov';
               
              } else if ($type === 3) {
              
                $name = 'Prepare for Escape Account';
                $value = '75';
                $game = 'Escape From Tarkov';
             
              } else if ($type === 4) {
             
                $name = 'Edge of Darkness Account';
                $value = '99';
               
              } else if ($type === 'cheat1') {
                $game = 'Escape From Tarkov';
              
                $name = 'Cheat for 1 Day';
                $value = '$5';
               
              } else if ($type === 'cheat3') {
               
                $name = 'Cheat for 7 Days';
                $game = 'Escape From Tarkov';
                $value = '$30';
              
              } else if ($type === 'cheat4') {
              
                $name = 'Cheat for 15 Days';
                $value = '$50';
                $game = 'Escape From Tarkov';

               
              } else if ($type === 'cheat5') {
               
                $name = 'Cheat for 30 Days';
                $value = '$80';
                $game = 'Escape From Tarkov';

              
              } else if ($type === 'cheat6') {
              
                $name = 'Cheat for Lifetime';
                $value = '$119';
                $game = 'Escape From Tarkov';

              
              } else if ($type === 'spoofer1') {
               
                $name = 'Spoofer';
                $value = '$20';
                $game = 'Escape From Tarkov';
              } else if ($type === 'spoofe2') {
               
                $name = 'Spoofer';
                $value = '$20';
                $game = 'Escape From Tarkov';
              } else if ($type === 'spoofe3') {
               
                $name = 'Spoofer';
                $value = '$99';
                $game = 'Escape From Tarkov';

               
               } else if ($type === 'val1') {
               
                $name = 'Cheat for 1 Day';
                $value = '7';
                $game = 'Valorant';

               
              } else if ($type === 'val2') {
               
                $name = 'Cheat for 3 Days';
                $value = '35';
               
               $game = 'Valorant';
              } else if ($type === 'val3') {
               
                $name = 'Cheat for 30 Days';
                $value = '80';
                $game = 'Valorant';
               
               } else if ($type === 'ovr1') {
               
                $name = 'Cheat for 1 Day';
                $value = '4';
                $game = 'Overwatch 2';
               
              } else if ($type === 'ovr2') {
               
                $name = 'Cheat for 7 Days';
                $value = '25';
                $game = 'Overwatch 2';
               
              
              } else if ($type === 'ovr3') {
               
                $name = 'Cheat for 30 Days';
                $value = '65';
                $game = 'Overwatch 2';
               
              } else if ($type === 'ovr4') {
               
                $name = 'Cheat for 30 Days';
                $value = '129';
                $game = 'Overwatch 2';
               
              } else if ($type === 'frl1') {
               
                $name = 'Cheat for 1 Day';
                $value = '3';
                $game = 'Farlight';
               
              } else if ($type === 'frl2') {
               
                $name = 'Cheat for 7 Days';
                $value = '15';
                $game = 'Farlight';
               
              } else if ($type === 'frl3') {
               
                $name = 'Cheat for 30 Days';
                $value = '50';
                $game = 'Farlight';
               
              } else if ($type === 'apex1') {
               
                $name = 'Cheat for 1 Day';
                $value = '4';
                $game = 'Apex';
               
              } else if ($type === 'apex2') {
               
                $name = 'Cheat for 3 Days';
                $value = '10';
                $game = 'Apex';
               
              } else if ($type === 'apex3') {
               
                $name = 'Cheat for 7 Days';
                $value = '20';
                $game = 'Apex';
               
              } else if ($type === 'csgo1') {
               
                $name = 'Cheat for 1 Day';
                $value = '$3';
                $game = 'CS2';
               
              } else if ($type === 'csgo2') {
               
                $name = 'Cheat for 7 Days';
                $value = '$15';
                $game = 'CS2';
               
              } else if ($type === 'csgo3') {
               
                $name = 'Cheat for 30 Days';
                $value = '$25';
                $game = 'CS2';
               
              } else if ($type === 'csgo4') {
               
                $name = 'Cheat for Lifetime';
                $value = '$75';
                $game = 'CS2';
               
              } else if ($type === 'csgo4') {
               
                $name = 'Cheat for Lifetime';
                $value = '$150';
                $game = 'CS2';
               
              } else if ($type === 'csgo4') {
               
                $name = 'Cheat for Lifetime';
                $value = '$150';
                $game = 'CS2';
               
              } else if ($type === 'spoofer1') {
               
                $name = 'Spoofer for 7 Days';
                $value = '$20';
                $game = 'EFT';
               
               } else if ($type === 'spoofer2') {
               
                $name = 'Spoofer for 30 Days';
                $value = '$50';
                $game = 'EFT';
               
               } else if ($type === 'spoofer3') {
               
                $name = 'Spoofer for Lifetime';
                $value = '$99';
                $game = 'EFT';
              
               } else if ($type === 'update') {
               
                $name = 'Update';
                $value = '$50';
                $game = 'EFT';
               
              }





            $msg = 'New Purchase! '.$name.', from '.$email.', by '.$paymethod;
            $client = new Client();
            
            $telegramMessage =  "New Purchase!\nEmail: ".$email."\nLogin: ".$login."\nGame: ".$game."\nProduct: ".$name."\nPrice: ".$price."\nPay Method: ".$paymethod."";
 $myChannel = "1087377493952045066";
$myToken = "MTA4NzM3NjkzMTI1NjgxMTUzMA.GsW0Rx.cwmjDCDmICDIFEAfEqyPmpdnD9dXEdlCgpHCjU";
$msg = $telegramMessage;
$data = array('content' => $msg);
$data_string = json_encode($data);
$ch = curl_init('https://discordapp.com/api/v6/channels/' . $myChannel . '/messages');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data_string),
    'Authorization: Bot ' . $myToken
    )
);

$answer  = curl_exec($ch);
        /*try {
            $client->post('https://api.telegram.org/bot5786925364:AAE_mlWLHNE134mctETh5Z2ihND2aLmc4Is/sendMessage', [
                RequestOptions::JSON => [
                    'chat_id' => '-1001719009332',
                    'parse_mode' => 'HTML',
                    'text' => $telegramMessage,
                ]
            ]);
        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }*/
            DB::query('INSERT INTO admin_notifications VALUES (\'0\', :msg, :time, 0, 2)', array(':msg'=>$msg, ':time'=>time()));
        }

        public static function register($email) {


            $msg = 'New User! '.$email;
            $client = new Client();
            
            $telegramMessage =  "".$msg."";

       /* try {
            $client->post('https://api.telegram.org/bot5438715725:AAHknVDuVBoNhhNsHTJpYgT2mSosFBlKX-U/sendMessage', [
                RequestOptions::JSON => [
                    'chat_id' => '-1001839526188',
                    'parse_mode' => 'HTML',
                    'text' => $telegramMessage,
                ]
            ]);
        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }*/
        
         $myChannel = "1087377455846797333";
$myToken = "MTA4NzM3Njk4NjUyNTE0NzE2Ng.GH8QlY.dhm5YXCcIk_wPgBf1tfCFrtQCNjYkrn4I5ERQQ";
$msg = $telegramMessage;
$data = array('content' => $msg);
$data_string = json_encode($data);
$ch = curl_init('https://discordapp.com/api/v6/channels/' . $myChannel . '/messages');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data_string),
    'Authorization: Bot ' . $myToken
    )
);

$answer  = curl_exec($ch);
            DB::query('INSERT INTO admin_notifications VALUES (\'0\', :msg, :time, 0, 1)', array(':msg'=>$msg, ':time'=>time()));
        }
        
        public static function ticket($email) {


            $msg = 'New Ticket! '.$email;
            $client = new Client();
            
            $telegramMessage =  "".$msg."";

        try {
            $client->post('https://api.telegram.org/bot5592355562:AAGLXwpbzvmqGJPUyvjMOQj5Reapx_YFxHk/sendMessage', [
                RequestOptions::JSON => [
                    'chat_id' => '-1001629013610',
                    'parse_mode' => 'HTML',
                    'text' => $telegramMessage,
                ]
            ]);
        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }
        }
    }