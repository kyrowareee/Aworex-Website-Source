 <?php
 include($_SERVER['DOCUMENT_ROOT'] . '/classes/DB.php');
           if (isset($_GET['sort'])) {
        $count = DBA::query("SELECT COUNT(*) FROM accounts_".$_GET['sort']." WHERE t=:t AND account_buyed=0 ORDER BY id DESC", array(':t'=>'freetest'))[0]['COUNT(*)'];
        $n = $_GET['sort'];
} else {
    $count = DBA::query("SELECT COUNT(*) FROM accounts_cheat WHERE t=:t AND account_buyed=0 ORDER BY id DESC", array(':t'=>'freetest'))[0]['COUNT(*)'];
    $n = 'EFT';
}

if (isset($_GET['sort'])) {
        $reviews = DBA::query("SELECT * FROM accounts_".$_GET['sort']." WHERE t=:t AND account_buyed=0 ORDER BY id DESC", array(':t'=>'freetest'));
} else {
    $reviews = DBA::query("SELECT * FROM accounts_cheat WHERE t=:t AND account_buyed=0 ORDER BY id DESC", array(':t'=>'freetest'));
}
        
        foreach ($reviews as $r) {
            $color = '#1BB84B';
            echo '<a style="color: #fff;"><div style="background-color: '.$color.';" class="card mb-3">
            <div class="card-body">
                Key: '.$r['key_t'].'<br>
                '.$r['t'].'<br>
                <a class="btn btn-danger" href="/api/Admin/AccountsCheat/Delete?id='.$r['id'].'">Delete</a>
            </div>
            
        </div></a>';
        }
        ?>