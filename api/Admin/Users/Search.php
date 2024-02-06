 <?php include $_SERVER['DOCUMENT_ROOT']."/classes/DB.php"; ?>
 <?php
  $json = file_get_contents('php://input');
$data = json_decode($json, true);
$value = '%'.$data['value'].'%';
        $reviews = DB::query('SELECT * FROM users WHERE (LOWER(username) LIKE :gname) OR (LOWER(email) LIKE :gname) ORDER BY id DESC', array(':gname'=>$value));
        foreach ($reviews as $r) {

            echo '<a style="color: #fff;" href="edit?id='.$r['id'].'"><div style="background-color: #292929;" class="card mb-3">
            <div class="card-body">
                Username: '.$r['username'].'<br>
                Email: '.$r['email'].'<br>
            </div>
        </div></a>';
        }
        ?>