 <?php
 
include($_SERVER['DOCUMENT_ROOT'] . '/classes/DB.php');
        $reviews = DB::query("SELECT * FROM notifications ORDER BY id DESC");
        
        foreach ($reviews as $r) {
            $color = '#1BB84B';
            echo '<a style="color: #fff;"><div style="background-color: #060b14;" class="card mb-3">
            <div class="card-body">
                Title: '.$r['title'].'<br>
                Text: '.$r['text'].'<br>
                <a class="btn btn-danger" href="/api/Notifications/Delete?id='.$r['id'].'">Delete</a>
            </div>
            
        </div></a>';
        }
        ?>