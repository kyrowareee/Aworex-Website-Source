<?php
include($_SERVER['DOCUMENT_ROOT'] . '/classes/DB.php');

$reviews = DB::query('SELECT * FROM reviews');

foreach ($reviews as $r) {
    $datenew = strtotime($r['date']);
    $dateplus = $datenew+432005;
    $date = gmdate("Y-m-d", $dateplus);
    DB::query('UPDATE reviews SET date=:date WHERE id=:id', array(':date'=>$date, ':id'=>$r['id']));
}
header('Location: /admin/reviews');