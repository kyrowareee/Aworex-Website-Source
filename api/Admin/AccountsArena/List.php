<?php
include($_SERVER['DOCUMENT_ROOT'] . '/classes/DB.php');
        if (isset($_GET['sort'])) {
           $reviews = DBA::query("SELECT * FROM accounts_cheata WHERE t=:t AND account_buyed=0 ORDER BY id DESC", array(':t'=>$_GET['sort']));
       } else {
           $reviews = DBA::query("SELECT * FROM accounts_cheata WHERE account_buyed=0 ORDER BY id DESC");
       }
        foreach ($reviews as $r) {
            if ($r['account_buyed'] === '0') {
                $color = '#1BB84B';
            } else {
                $color = '#B1183C';
            }
            echo '<a style="color: #fff;"><div style="background-color: '.$color.';" class="card mb-3">
            <div class="card-body">
                Key: '.$r['key_t'].'<br>
                '.$r['t'].'<br>
                <a class="btn btn-danger" href="/api/Admin/AccountsArena/Delete?id='.$r['id'].'">Delete</a>
            </div>
            
        </div></a>';
        }
        ?>