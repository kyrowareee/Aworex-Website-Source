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
$file = $_FILES['filebodyImage'];
$fileName = generateRandomString();
$filePath = pathinfo($file['name']);
            if ($_FILES['filebodyImage']['error'] != 4) {
                if ($filePath['extension'] === 'png' || $filePath['extension'] === 'jpg' || $filePath['extension'] === 'gif' || $filePath['extension'] === 'jpeg' || $filePath['extension'] === 'apng' || $filePath['extension'] === 'jif') {
                    $uploadDir = $_SERVER['DOCUMENT_ROOT']."/cdn/images";
                    move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/cdn/images/".$fileName.".".$filePath['extension']."");
                    $photourl = "/cdn/images/".$fileName.".".$filePath['extension']."";
                    echo json_encode(array(
                        'error' => 0,
                        'errorcode' => '0',
                        'imgurl' => $photourl
                    ));
                } else {
                    echo json_encode(array(
                        'error' => 0,
                        'errorcode' => '1',
                    ));
                }
            } else {
                echo json_encode(array(
                    'error' => 0,
                    'errorcode' => '1',
                ));
            }