<?php



function generateRandomString($length = 128) {
    $characters = 'QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$postbody = $_POST['bodypost'];
$file = $_FILES['filebodyVideo'];
$fileName = generateRandomString();
$filePath = pathinfo($file['name']);
            if ($_FILES['filebodyVideo']['error'] != 4) {
                if ($filePath['extension'] === 'mp4' || $filePath['extension'] === 'avi' || $filePath['extension'] === 'mkv' || $filePath['extension'] === 'webm') {
                    $uploadDir = $_SERVER['DOCUMENT_ROOT']."/cdn/video";
                    move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/cdn/video/".$fileName.".".$filePath['extension']."");
                        $photourl = "/cdn/video/".$fileName.".".$filePath['extension']."";
                    echo json_encode(array(
                        'error' => 0,
                        'errorcode' => '0',
                        'vidurl' => $photourl
                    ));
                } else {
                    echo json_encode(array(
                        'error' => 1,
                        'errorcode' => '1',
                        'code' => 'INCORRECT_FORMAT'
                    ));
                }
            } else {
                echo json_encode(array(
                    'error' => 1,
                    'errorcode' => '1',
                ));
            }