<?php
include($_SERVER['DOCUMENT_ROOT'] . '/classes/DB.php');
        $reviews = DB::query('SELECT * FROM promocodes ORDER BY id DESC');
        foreach ($reviews as $r) {

            echo '<a style="color: #fff;" href="edit?id='.$r['id'].'"><div style="background-color: #1BB84B;" class="card mb-3">
            <div class="card-body">
                '.$r['text'].'<br>
                Uses: '.$r['uses'].'<br>
                Discount: '.$r['value'].'<br>
                Date create: '.$r['timecreate'].'<br>
                <a class="btn btn-danger" href="/api/Admin/Promocodes/Delete?id='.$r['id'].'">Delete</a>
            </div>
        </div></a>';
        }
        ?>