<?php include $_SERVER['DOCUMENT_ROOT']."/classes/DB.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$data = DB::query('SELECT * FROM root WHERE id=1')[0];
$api_key = '9f6c49ce2edae2fe902b2d7670cf728d-78f6ccbe-9e953fc9';
$domain_name = 'sandbox8aebc416e956415ab373263e2323c4c9.mailgun.org';


if (isset($_POST['createpost'])) {
    $users = DB::query('SELECT * FROM users');
   foreach ($users as $u) {
       $ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v3/' . $domain_name . '/messages');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERPWD, 'api:' . $api_key);

$data = [
    'from' => $_POST['title'].' <aworex-noreply@' . $domain_name . '>',
    'to' => $u['email'],
    'subject' => $_POST['subject'],
    'text' => nl2br($_POST['message']),
    'html' => nl2br($_POST['message']),
];

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

$response = curl_exec($ch);
curl_close($ch);
   }
}

?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
<link rel="stylesheet" href="/static/css/root.admin.css">

        <title>Admin</title>
        <?php include $_SERVER['DOCUMENT_ROOT']."/classes/NavbarAdminNew.php"; ?>
        </head>
    <body>
    

        <div class="container" style="margin-top: 75px;">
        <h1>Email Sent</h1>
        <form action="index" method="post">
            <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Title</label>
  <input type="text" name="title" class="form-control" id="exampleFormControlInput1">
</div>
            <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Subject</label>
  <input type="text" name="subject" class="form-control" id="exampleFormControlInput1">
</div>
    <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Message</label>
  <textarea type="text" name="message" class="form-control" id="exampleFormControlInput1"></textarea>
</div>

<div class="mb-3">
    <button class="btn btn-primary" name="createpost">Sent</button>
</div>
        </form>
        </div>
    </body>
</html>