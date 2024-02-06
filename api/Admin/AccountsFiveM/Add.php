<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$name = "AworexEFT"; // your application name
$ownerid = "3zKszN2j9s";    // Application OwnerID

include($_SERVER['DOCUMENT_ROOT'] . '/classes/DB.php');
include($_SERVER['DOCUMENT_ROOT'] . '/classes/KeyAuth.php');

$KeyAuthApp = new KeyAuth\api($name, $ownerid);
$KeyAuthApp->init();
function changeListener()
{
    $keyinput = $_POST["keystr"];
    $value = $_POST["value"];

    switch ($value) {
        case "4":
            return generate(2300);
            break;
        case "3":
            return generate(2288);
            break;
        case "2":
            return generate(2244);
            break;
        case "1":
            return generate(2222);
            break;
        case "ft":
            return generate(2240);
            break;
    }
}

function getRandomInt($max)
{
    return mt_rand(0, $max - 1);
}


function generate($reqsum)
{
    $letters = "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM0123456789";
    $char = 0;
    $sum = 0;
    $origsum = $reqsum;
    $keystr = [];

    while (true) {
        while ($reqsum > 122) {
            $char = $letters[getRandomInt(62)];
            $reqsum -= ord($char);
            array_push($keystr, $char);
        }
        array_push($keystr, chr($reqsum));

        if (!strpos($letters, $keystr[count($keystr) - 1])) {
            $reqsum = $origsum;
            $sum = 0;
            $keystr = [];
        } else {
            $keystr = implode("", $keystr);
            return $keystr;
        }
    }
}



$ft = 'False';
if ($_POST['select'] === '1') {
    $select = '1day';
    $length = '1d';
} else if ($_POST['select'] === '2') {
    $select = '7days';
    $length = '7d';
} else if ($_POST['select'] === '3') {
    $select = '30days';
    $length = '30d';
} else if ($_POST['select'] === '4') {
    $select = 'lifetime';
    $length = 'lifetime';
} else if ($_POST['select'] === 'ft') {
    $select = 'freetest';
    $ft = 'True';
    $length = '3h';
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {


        /*$curl = curl_init();

        $login = 'aworex';
        $password = 'aworexsoftware';
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://awo.erqt.ru/sefidhgmosdfgiusdf/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('keystr' => $_POST['password'], 'length' => $length, 'add' => 'add'),
            CURLOPT_HTTPHEADER => array(
                "Authorization: Basic " . base64_encode($login . ":" . $password)
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);*/
        DBA::query('INSERT INTO accounts_fivem VALUES (\'0\', :key_t, :ft, :t, :ab)', array(':ft' => $ft, ':key_t' => $_POST['password'], ':t' => $select, ':ab' => 0));
        echo json_encode(array(
            'error' => 0,
            'errorcode' => '0',
        ));
    
}
