<?php
include($_SERVER['DOCUMENT_ROOT'] . '/classes/DB.php');
        $reviews = DB::query('SELECT * FROM reviews ORDER BY id DESC');
        foreach ($reviews as $r) {
            if ($r['type'] === '1' || $r['type'] === '1_a') {
                $color = '#1BB84B';
            } else {
                $color = '#B1183C';
            }
            if ($r['type'] === '1' || $r['type'] === '2') {
                $created = 'User';
            } else {
                $created = 'Admin';
            }
            echo '<a style="color: #fff;" href="/admin/reviews/edit?id='.$r['id'].'"><div style="background-color: '.$color.';" class="card mb-3">
            <div class="card-body">
                Username: '.$r['title'].'<br>
                Date: '.$r['date'].'<br>
                Text: '.$r['text'].'<br>
                Created by: '.$created.'
            </div>
        </div></a>';
        }
        ?>