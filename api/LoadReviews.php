<?php
require $_SERVER['DOCUMENT_ROOT'] . "/classes/DB.php";
$start = $_GET["start"];
                    $reviews = DB::query("SELECT * FROM reviews WHERE rewed=1 ORDER BY id DESC LIMIT 8 OFFSET {$start}");
            $style = '';
  foreach ($reviews as $r) {
               $start++;
                if ($r['type'] === '1_a' || $r['type'] === '2_a') {
                    $date = $r['date'];
                } else {
                    
                    $date = gmdate("Y-m-d", $r['date']);
                }
                if ($r['type'] === '1' || $r['type'] === '1_a') {
                    $img = 'good';
                    $color = '#1456ff;';
                } else {
                    $img = 'bad';
                    $color = '#ff002e;';
                }
            if ((int)$r['fromdiscord'] === 0) {
                echo '
                <div style="text-align: start; background-color: #060b14; border-radius: 15px;" class="card mb-3">
            <div class="card-body">
            
                <img src="/static/img/'.$img.'.png" style="object-fit: cover; width: 45px; height: 45px; border-radius: 150px; margin-top: -33px;" class="fill-current mp-5 imgav' . $p['id'] . '" onerror="imgError(this);">
                <h5 style="margin-bottom: -0px; margin-left: 4px; color: '.$color.';" href="testings" class="col-md-10 ml-3  d-inline-block font-weight-bold">'.$r['title'].'
                
                    <br><p href="testings" style="font-size: 15px; font-weight: 500; margin-top: -45px;" class="col-md-10 d-inline-block font-weight-bold">'.$date.'</p></h5>
             
                <p href="testings" style="color: #9b9da1; font-size: 20px;" class="col-10 d-inline-block font-weight-bold">'.$r['text'].'</p>
               

                </div></div>';
            } else if (time() <= $date + 47580 || (int)$r['rewed'] === 1) {
                 echo '
                <div style="text-align: start; background-color: #060b14; border-radius: 15px;" class="card mb-3">
            <div class="card-body">
            <div class="col" style="display: inline-block;     float: right;">
        

        <a onclick="createModal(`https://discord.com/channels/964252124076716092/1076842734083641434/'.$r['dsid'].'`, `'.$r['dsid'].'`); return false;" id="dropdownMenuLink" href="https://discord.com/channels/964252124076716092/1076842734083641434/'.$r['dsid'].'" style="float: left; color: #8F8F8F;" class="dropdown-item gap-2 d-flex align-items-center nav__link">Original Message<i style="color: #8F8F8F; font-size: 22px; margin-left: 4.5px;" class="bx bx-link-external nav__icon"></i><span class="nav__namec ml-3"></span></a>

            
        </div>
        <div class="col-md-10">
                <img src="/static/img/'.$img.'.png" style="object-fit: cover; width: 45px; height: 45px; border-radius: 150px; margin-top: -33px;" class="fill-current mp-5 imgav' . $p['id'] . '" onerror="imgError(this);">
                <h5 style="margin-bottom: -0px; margin-left: 4px; color: '.$color.';" href="testings" class="col-md-10 ml-3  d-inline-block font-weight-bold">'.$r['title'].'
                
                    <br><p href="testings" style="font-size: 15px; font-weight: 500; margin-top: -45px;" class="col-md-10 d-inline-block font-weight-bold">'.$date.'</p></h5>
             </div>
                <p href="testings" style="color: #9b9da1; font-size: 20px;" class="col-12 d-inline-block font-weight-bold">'.$r['text'].'</p>
               

                </div></div>';
            } }  ?>
                       
