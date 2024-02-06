<?php require $_SERVER['DOCUMENT_ROOT']."/classes/Date.php"; ?>

<div class="row">
<?php
$blog = DB::query('SELECT * FROM blog ORDER BY id DESC');
foreach ($blog as $b) {
  

    echo '<div class="col-md-12 mb-3">
    <div class="card" style="background: #040E24; border-radius: 15px;">';
    if ($b['photourl'] != 'NONE') {
      echo '<img src="'.$b['photourl'].'" class="card-img-top" alt="...">';
    } 
    echo '
  
  <div class="card-body">
    <h2 class="card-title"><b>'.$b['title'].'</b></h2>
    <br><p style="color: #9d9d9d;">'.zmdate($b['date']).'</p>
    <p class="card-text mt-1">'.nl2br($b['text']).'</p>
  </div>
</div>
</div>
    ';
}
?>
    </div>