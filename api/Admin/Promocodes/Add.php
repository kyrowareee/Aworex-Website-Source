<?php 
require $_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php";
    $stripe = new \Stripe\StripeClient(
        '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'
      );
include $_SERVER['DOCUMENT_ROOT']."/classes/DB.php";


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $stripe->coupons->create(
        ['duration' => 'forever', 'id' => $_POST['text'], 'percent_off' => $_POST['value']]
    );
    DB::query('INSERT INTO promocodes VALUES (\'0\', :uses, 1, :text, :value, 0, :time, :f)', array(':text'=>$_POST['text'], ':uses'=>$_POST['uses'], ':value'=>$_POST['value'], ':f'=>$_POST['product'], ':time'=>'-1'));
    echo json_encode(array(
        'error' => 0,
        'errorcode' => '0',
    ));
}

?>