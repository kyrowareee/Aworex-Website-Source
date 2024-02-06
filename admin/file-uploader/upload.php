<?php
require_once $_SERVER['DOCUMENT_ROOT']."/classes/DB.php";

define("BASEFILEPATH", "/mnt/md0/aworex-rescue/");
function generateRandomString($length = 128) {
    $characters = 'QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
if (isset($_POST['createpost'])) {
    var_dump($_FILES['filebodymain']);
    $file = $_FILES['filebodymain'];
    $fileName = $_POST['title'];
    $filePath = pathinfo($file['name']);
    $t = move_uploaded_file($file['tmp_name'], '/var/www/u2408665/data/www/aworex.com/cdn/'.$fileName.".".$filePath['extension']."");
    DB::query('INSERT INTO files VALUES (\'0\', :url, :product)', array(':url'=>'/cdn/'.$fileName.".".$filePath['extension'], ':product'=>$_POST['product']));
    header('Location: index.php');
        
}
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/static/css/root.admin.css">
        <link rel="stylesheet" href="/static/css/notie.css">
        <script src="/static/js/notie.js"></script>
        <script src="/static/js/notify.js"></script>

        <title><?=$project['title']?></title>
    </head>
    <div class="modal fade" id="createDialogModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Создание нового поста</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Вы действительно хотите создать новый пост?
      </div>
      <div class="modal-footer">
        <div id="buttonUploadModal"><button data-bs-dismiss="modal" onclick="submitUpload()"type="submit" class="btn btn-primary">Да, я уверен</button></div>
        <div><button type="button" class="btn-r btn-secondary" data-bs-dismiss="modal">Нет</button></div>
       
            
      </div>
    </div>
  </div>
</div>
    <div class="modal fade" id="pickImageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Pick Image</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form enctype="multipart/form-data" id="pickImageForm">
      <div class="modal-body">
      <div class="mb-3">
                <input id="filebody" type="file" name="filebodyImage" class="form-control" type="file">
            </div>
      </div>
      <div class="modal-footer">
        <div><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button></div>
        <div id="r"><button id="t" type="submit" class="btn btn-primary" data-bs-dismiss="modal">Pick</button></div>
            
      </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="pickMusicModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Pick Music</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="mb-3">
                <input id="filebody" type="file" name="filebody" class="form-control" type="file">
            </div>
      </div>
      <div class="modal-footer">
        <div><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button></div>
        <div id="r"><button id="t" type="submit" class="btn btn-primary">Pick</button></div>
            
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="pickVideoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Pick Video</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form enctype="multipart/form-data" id="pickVideoForm">
      <div class="modal-body">
      <div class="mb-3">
                <input id="filebody" type="file" name="filebodyVideo" class="form-control" type="file">
            </div>
      </div>
      <div class="modal-footer">
        <div><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button></div>
        <div id="r"><button id="t" type="submit" class="btn btn-primary" data-bs-dismiss="modal">Pick</button></div>
            
      </div>
</form>
    </div>
  </div>
</div>
    <style>
        .btn-primarynew {
    color: #fff;
    background-color: #354bdb !important;
    border-color: #354bdb !important;
  }
  .btn-primarynew:hover {
    color: #fff;
    background-color: #2034b3 !important;;
    border-color: #2034b3 !important;;
  }
  .btn-check:focus + .btn-primarynew,
  .btn-primarynew:focus {
    color: #fff;
    background-color: #2034b3 !important;;
    border-color: #2034b3 !important;;
    box-shadow: 0 0 0 0.25rem rgba(49, 132, 253, 0.5) !important;;
  }
  .btn-check:active + .btn-primarynew,
  .btn-check:checked + .btn-primarynew,
  .btn-primarynew.active,
  .btn-primarynew:active,
  .show > .btn-primary.dropdown-toggle {
    color: #fff;
    background-color: #2034b3 !important;;
    border-color: #2034b3 !important;;
  }
  .btn-check:active + .btn-primarynew:focus,
  .btn-check:checked + .btn-primarynew:focus,
  .btn-primarynew.active:focus,
  .btn-primarynew:active:focus,
  .show > .btn-primarynew.dropdown-toggle:focus {
    box-shadow: 0 0 0 0.25rem rgba(49, 132, 253, 0.5) !important;;
  }
  .btn-primarynew.disabled,
  .btn-primarynew:disabled {
    color: #fff;
    background-color: #354bdb !important;;
    border-color: #354bdb !important;;
  }
    </style>
    <body>
    <?php require_once $_SERVER['DOCUMENT_ROOT']."/classes/NavbarAdminNew.php"; ?>

    <div class="container" style="margin-top: 75px;">

    <script>
    function submitPreview() {
        $('#buttonUpload').html('<button style="border-radius: 10px 0px 0px 10px !important;" type="submit" id="createpost" class="btn btn-primary mb-3 mt-3" disabled>Create</button>');
        $('#buttonPreView').html('<button style="border-radius: 0px 10px 10px 0px !important;" type="submit" id="createpost" class="btn btn-primarynew mb-3 mt-3" disabled><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...</button>');
        $.ajax({
            
                type: "POST",
                url: '/exapi/dialogs/createPreview',
                data: JSON.stringify( { "bodypost":$("#bodypost").val(), "title": $("#title").val() } ),
                dataType: "json",
                success: function(response) {
                    var jsonData = JSON.parse(JSON.stringify(response));

                    console.log(response);
                    console.log(jsonData);
                    if (jsonData.errorcode == "1") {
                        $('#buttonUpload').html('<button name="createpost" style="border-radius: 10px 0px 0px 10px !important;" type="submit" id="createpost" class="btn btn-primary mb-3 mt-3">Create</button>');
                        $('#buttonPreView').html('<button onclick="submitPreview()" style="border-radius: 0px 10px 10px 0px !important;" type="submit" id="createpost" class="btn btn-primarynew mb-3 mt-3">Preview</button>');
                        $("#result").html("<div class='alert alert-dangernew container' role='alert'>Может, что-нибудь напишите в свой пост?</div>");
                    } else {
                        $('#buttonUpload').html('<button name="createpost" style="border-radius: 10px 0px 0px 10px !important;" type="submit" id="createpost" class="btn btn-primary mb-3 mt-3">Create</button>');
                        $('#buttonPreView').html('<button onclick="submitPreview()" style="border-radius: 0px 10px 10px 0px !important;" type="submit" id="createpost" class="btn btn-primarynew mb-3 mt-3">Preview</button>');
                        window.open('/admin/blog/preview?id='+jsonData.preid, '_blank');
                    }
                }
            });
    }
    $(document).ready(function () {
    $('#pickImageForm').submit(function (e) {
        var myModal = new bootstrap.Modal(document.getElementById('pickImageModal'))
        myModal.hide();
        $('#buttonUpload').html('<button style="border-radius: 10px 0px 0px 10px !important;" type="submit" id="createpost" class="btn btn-primary mb-3 mt-3" disabled><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...</button>');
        $('#buttonPreView').html('<button style="border-radius: 0px 10px 10px 0px !important;" type="submit" id="createpost" class="btn btn-primarynew mb-3 mt-3" disabled>Preview</button>');


        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: '/exapi/dialogs/pickImage',
            data: formData,
            success: function (response) {
                var jsonData = JSON.parse(response);


                if (jsonData.errorcode == "1") {
                    Notify.noty('danger', 'Unknown error! API returned:\n' + JSON.stringify(response) + '');
                    $('#buttonUpload').html('<button name="createpost" style="border-radius: 10px 0px 0px 10px !important;" type="submit" id="createpost" class="btn btn-primary mb-3 mt-3">Create</button>');
                    $('#buttonPreView').html('<button onclick="submitPreview()" style="border-radius: 0px 10px 10px 0px !important;" type="submit" id="createpost" class="btn btn-primarynew mb-3 mt-3">Preview</button>');
                } else {
                    $('#buttonUpload').html('<button name="createpost" style="border-radius: 10px 0px 0px 10px !important;" type="submit" id="createpost" class="btn btn-primary mb-3 mt-3">Create</button>');
                    $('#buttonPreView').html('<button onclick="submitPreview()" style="border-radius: 0px 10px 10px 0px !important;" type="submit" id="createpost" class="btn btn-primarynew mb-3 mt-3">Preview</button>');
                    document.getElementById('bodypost').value += '[image]' + jsonData.imgurl + '[/image]';
                    Notify.noty('success', 'Success Picked!');
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });



    $('#pickVideoForm').submit(function (e) {
        var myModal = new bootstrap.Modal(document.getElementById('pickVideoModal'))
        myModal.hide();
        $('#buttonUpload').html('<button style="border-radius: 10px 0px 0px 10px !important;" type="submit" id="createpost" class="btn btn-primary mb-3 mt-3" disabled><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...</button>');
        $('#buttonPreView').html('<button style="border-radius: 0px 10px 10px 0px !important;" type="submit" id="createpost" class="btn btn-primarynew mb-3 mt-3" disabled>Preview</button>');


        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: '/exapi/dialogs/pickVideo',
            data: formData,
            success: function (response) {
                var jsonData = JSON.parse(response);


                if (jsonData.errorcode == "1") {
                    Notify.noty('danger', 'Unknown error! API returned:\n' + JSON.stringify(response) + '');
                    $('#buttonUpload').html('<button name="createpost" style="border-radius: 10px 0px 0px 10px !important;" type="submit" id="createpost" class="btn btn-primary mb-3 mt-3">Create</button>');
                    $('#buttonPreView').html('<button onclick="submitPreview()" style="border-radius: 0px 10px 10px 0px !important;" type="submit" id="createpost" class="btn btn-primarynew mb-3 mt-3">Preview</button>');
                } else {
                    $('#buttonUpload').html('<button name="createpost" style="border-radius: 10px 0px 0px 10px !important;" type="submit" id="createpost" class="btn btn-primary mb-3 mt-3">Create</button>');
                    $('#buttonPreView').html('<button onclick="submitPreview()" style="border-radius: 0px 10px 10px 0px !important;" type="submit" id="createpost" class="btn btn-primarynew mb-3 mt-3">Preview</button>');
                    document.getElementById('bodypost').value += '[video]' + jsonData.vidurl + '[/video]';
                    Notify.noty('success', 'Success Picked!');
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });

    $('#pickMusicForm').submit(function (e) {
        var myModal = new bootstrap.Modal(document.getElementById('pickMusicModal'))
        myModal.hide();
        $('#buttonUpload').html('<button style="border-radius: 10px 0px 0px 10px !important;" type="submit" id="createpost" class="btn btn-primary mb-3 mt-3" disabled><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...</button>');
        $('#buttonPreView').html('<button style="border-radius: 0px 10px 10px 0px !important;" type="submit" id="createpost" class="btn btn-primarynew mb-3 mt-3" disabled>Preview</button>');


        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: '/exapi/dialogs/pickMusic',
            data: formData,
            success: function (response) {
                var jsonData = JSON.parse(response);


                if (jsonData.errorcode == "1") {
                    Notify.noty('danger', 'Unknown error! API returned:\n' + JSON.stringify(response) + '');
                    $('#buttonUpload').html('<button name="createpost" style="border-radius: 10px 0px 0px 10px !important;" type="submit" id="createpost" class="btn btn-primary mb-3 mt-3">Create</button>');
                    $('#buttonPreView').html('<button onclick="submitPreview()" style="border-radius: 0px 10px 10px 0px !important;" type="submit" id="createpost" class="btn btn-primarynew mb-3 mt-3">Preview</button>');
                } else {
                    $('#buttonUpload').html('<button name="createpost" style="border-radius: 10px 0px 0px 10px !important;" type="submit" id="createpost" class="btn btn-primary mb-3 mt-3">Create</button>');
                    $('#buttonPreView').html('<button onclick="submitPreview()" style="border-radius: 0px 10px 10px 0px !important;" type="submit" id="createpost" class="btn btn-primarynew mb-3 mt-3">Preview</button>');
                    document.getElementById('bodypost').value += '[music]' + jsonData.musurl + '[/music]';
                    Notify.noty('success', 'Success Picked!');
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
});



</script>
        <h2>Upload</h2>      
        <div id="result" class="result"></div>
        <form action="upload" method="POST" id="postForm" enctype="multipart/form-data">
        <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">File name</label>
  <input name="title" id="title" type="text" class="form-control" id="exampleFormControlInput1">
</div>
<div class="mb-3">
  <label for="formFile" class="form-label">File</label>
  <input name="filebodymain" class="form-control" type="file" id="formFile">
</div>

<p>Product</p>
<select name="product">
  <option value="cheat">EFT</option>
  
  <option value="cheata">EFT: Arena</option>
  <option value="spoofer">Spoofer</option>
  <option value="csgo">CS2</option>
  <option value="fivem">FiveM</option>
  </select>
       
        <div class="btn-group" role="group" aria-label="Basic example">
            
        <div id="buttonUpload">
        <button name="createpost" style="border-radius: 10px 0px 0px 10px !important;" type="submit" id="createpost" class="btn btn-primary mb-3 mt-3">Create</button>
        </div>
        
</div>
        
        </form>

    </div>
    </body>
</html>