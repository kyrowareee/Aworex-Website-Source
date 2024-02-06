<?php
include($_SERVER['DOCUMENT_ROOT'] . '/classes/DB.php');
        $reviews = DBA::query('SELECT * FROM accounts_spoofer ORDER BY id DESC');
        foreach ($reviews as $r) {
            if ($r['account_buyed'] === '0') {
                $color = '#1BB84B';
            } else {
                $color = '#B1183C';
            }
           echo '<a style="color: #fff;" href="edit?id='.$r['id'].'"><div style="background-color: '.$color.';" class="card mb-3">
            <div class="card-body">
               BODY: '.$r['email'].'
            </div>
        </div></a>';
        }
        ?>