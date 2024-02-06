<?php include $_SERVER['DOCUMENT_ROOT']."/classes/DB.php"; ?>
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
        <h1>Welcome Back!</h1>
        <div class="row">
        <div class="col-md-4 mb-3">
            <a style="text-decoration: none !important;" href="/admin/accounts_spoofer"><div style="background-color: #A525FF; border-width: 0px !important;" class="card">
                    <div class="card-body">
                        <img width="45" src="/static/img/svg/smart_toy_white_24dp.svg" alt="">
                        <h3 class="mt-2 mb-3"><b>Spoofer</b></h3>
                        <p>Create and upload accounts to sale products on website.<br></p>
                    </div>
                </div></a>
            </div>
           
            <div class="col-md-4 mb-3">
            <a style="text-decoration: none !important;" href="/admin/accounts_cheat"><div style="background-color: #74A400; border-width: 0px !important;" class="card">
                    <div class="card-body">
                        <img width="45" src="/static/img/svg/smart_toy_white_24dp.svg" alt="">
                        <h3 class="mt-2 mb-3"><b>Tarkov</b></h3>
                        <p>Create and upload accounts to sale products on website.<br></p>
                    </div>
                </div></a>
            </div>
            <div class="col-md-4 mb-3">
            <a style="text-decoration: none !important;" href="/admin/accounts_arena"><div style="background-color: #74A400; border-width: 0px !important;" class="card">
                    <div class="card-body">
                        <img width="45" src="/static/img/svg/smart_toy_white_24dp.svg" alt="">
                        <h3 class="mt-2 mb-3"><b>Arena</b></h3>
                        <p>Create and upload accounts to sale products on website.<br></p>
                    </div>
                </div></a>
            </div>
            <div class="col-md-4 mb-3">
            <a style="text-decoration: none !important;" href="/admin/accounts_csgo"><div style="background-color: #74A400; border-width: 0px !important;" class="card">
                    <div class="card-body">
                        <img width="45" src="/static/img/svg/smart_toy_white_24dp.svg" alt="">
                        <h3 class="mt-2 mb-3"><b>CS2</b></h3>
                        <p>Create and upload accounts to sale products on website.<br></p>
                    </div>
                </div></a>
            </div>
            <div class="col-md-4 mb-3">
            <a style="text-decoration: none !important;" href="/admin/accounts_fivem"><div style="background-color: #74A400; border-width: 0px !important;" class="card">
                    <div class="card-body">
                        <img width="45" src="/static/img/svg/smart_toy_white_24dp.svg" alt="">
                        <h3 class="mt-2 mb-3"><b>FiveM</b></h3>
                        <p>Create and upload accounts to sale products on website.<br></p>
                    </div>
                </div></a>
            </div>
           
            <h2>Other</h2>
             <div class="col-md-4 mb-3">
                <a style="text-decoration: none !important;" href="/admin/reviews"><div style="background-color: #255DFF; border-width: 0px !important;" class="card">
                    <div class="card-body">
                        <img width="45" src="/static/img/svg/reviews_white_24dp.svg" alt="">
                        <h3 class="mt-2 mb-3"><b>Reviews</b></h3>
                        <p>Review and leave feedback from other people on website.</p>
                    </div>
                </div></a>
            </div>
            <div class="col-md-4 mb-3">
            <a style="text-decoration: none !important;" href="/admin/promocodes"><div style="background-color: #FF8C25; border-width: 0px !important;" class="card">
                    <div class="card-body">
                        <img width="45" src="/static/img/svg/confirmation_number_white_24dp.svg" alt="">
                        <h3 class="mt-2 mb-3"><b>Promocodes</b></h3>
                        <p>Create and edit discount promo codes for products.</p>
                    </div>
                </div></a>
            </div>
          
            <div class="col-md-4 mb-3">
            <a style="text-decoration: none !important;" href="/admin/instructions"><div style="background-color: #1B9280; border-width: 0px !important;" class="card">
                    <div class="card-body">
                        <img width="45" src="/static/img/svg/description_white_24dp.svg" alt="">
                        <h3 class="mt-2 mb-3"><b>Instructions</b></h3>
                        <p>Edit the textual instructions for the cheat products and spoofer.</p>
                    </div>
                </div></a>
            </div>
            <div class="col-md-4 mb-3">
            <a style="text-decoration: none !important;" href="/admin/instructions_ft"><div style="background-color: #1B9280; border-width: 0px !important;" class="card">
                    <div class="card-body">
                        <img width="45" src="/static/img/svg/description_white_24dp.svg" alt="">
                        <h3 class="mt-2 mb-3"><b>Instructions FT</b></h3>
                        <p>Edit the textual instructions for the cheat products and spoofer.</p>
                    </div>
                </div></a>
            </div>
            <div class="col-md-4 mb-3">
            <a style="text-decoration: none !important;" href="/admin/accounts_selled"><div style="background-color: #EBCD00; border-width: 0px !important;" class="card">
                    <div class="card-body">
                        <img width="45" src="/static/img/svg/smart_toy_white_24dp.svg" alt="">
                        <h3 class="mt-2 mb-3"><b>Selled Cheat Accounts</b></h3>
                        <p>Check fast selled accounts and users on your website.<br></p>
                    </div>
                </div></a>
            </div>
             <div class="col-md-4 mb-3">
            <a style="text-decoration: none !important;" href="/admin/users"><div style="background-color: #42921B; border-width: 0px !important;" class="card">
                    <div class="card-body">
                        <img width="45" src="/static/img/svg/person_white_24dp.svg" alt="">
                        <h3 class="mt-2 mb-3"><b>Users</b></h3>
                        <p>View, edit, data for all users, and create new user account.</p>
                    </div>
                </div></a>
            </div>
            <div class="col-md-4 mb-3">
            <a style="text-decoration: none !important;" href="/admin/notifications_user"><div style="background-color: #A79C1D; border-width: 0px !important;" class="card">
                    <div class="card-body">
                        <img width="45" src="/static/img/svg/person_white_24dp.svg" alt="">
                        <h3 class="mt-2 mb-3"><b>Notifications</b></h3>
                        <p>View, edit, data for all users, and create new user account.</p>
                    </div>
                </div></a>
            </div>
             <div class="col-md-4 mb-3">
            <a style="text-decoration: none !important;" href="/admin/status"><div style="background-color: #A79C1D; border-width: 0px !important;" class="card">
                    <div class="card-body">
                        <img width="45" src="/static/img/svg/person_white_24dp.svg" alt="">
                        <h3 class="mt-2 mb-3"><b>Status</b></h3>
                        <p>View, edit, data for all users, and create new user account.</p>
                    </div>
                </div></a>
            </div>
            <div class="col-md-4 mb-3">
            <a style="text-decoration: none !important;" href="/admin/ft"><div style="background-color: #A79C1D; border-width: 0px !important;" class="card">
                    <div class="card-body">
                        <img width="45" src="/static/img/svg/person_white_24dp.svg" alt="">
                        <h3 class="mt-2 mb-3"><b>FT KEYS</b></h3>
                        <p>View, edit, data for all users, and create new user account.</p>
                    </div>
                </div></a>
            </div>
            <div class="col-md-4 mb-3">
            <a style="text-decoration: none !important;" href="/admin/blog"><div style="background-color: #A79C1D; border-width: 0px !important;" class="card">
                    <div class="card-body">
                        <img width="45" src="/static/img/svg/person_white_24dp.svg" alt="">
                        <h3 class="mt-2 mb-3"><b>Blog</b></h3>
                        <p>Blog</p>
                    </div>
                </div></a>
            </div>
            <div class="col-md-4 mb-3">
            <a style="text-decoration: none !important;" href="/admin/emailsent"><div style="background-color: #A79C1D; border-width: 0px !important;" class="card">
                    <div class="card-body">
                        <img width="45" src="/static/img/svg/person_white_24dp.svg" alt="">
                        <h3 class="mt-2 mb-3"><b>Email Sent</b></h3>
                        <p>Email Sent</p>
                    </div>
                </div></a>
            </div>
 <div class="col-md-4 mb-3">
            <a style="text-decoration: none !important;" href="/admin/stats"><div style="background-color: #A79C1D; border-width: 0px !important;" class="card">
                    <div class="card-body">
                        <img width="45" src="/static/img/svg/person_white_24dp.svg" alt="">
                        <h3 class="mt-2 mb-3"><b>Stats</b></h3>
                        <p>Stats</p>
                    </div>
                </div></a>
            </div>
 <div class="col-md-4 mb-3">
            <a style="text-decoration: none !important;" href="/admin/file-uploader"><div style="background-color: #A79C1D; border-width: 0px !important;" class="card">
                    <div class="card-body">
                        <img width="45" src="/static/img/svg/person_white_24dp.svg" alt="">
                        <h3 class="mt-2 mb-3"><b>File Uploader</b></h3>
                        <p>File Uploader</p>
                    </div>
                </div></a>
            </div>



        </div>
        </div>
    </body>
</html>