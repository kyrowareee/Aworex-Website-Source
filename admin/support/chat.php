<html>

<head>
    <?php
    require $_SERVER['DOCUMENT_ROOT']."/classes/DB.php";
    require $_SERVER['DOCUMENT_ROOT']."/classes/Auth.php";

    if (isset($_GET['token'])) {
        $fname = DB::query('SELECT fname FROM users WHERE id=:id', array(':id'=>isLoggedIn()))[0]['fname'];
        DB::query('INSERT INTO chat VALUES (\'0\', :uid, :text, 2, :token, :date)', array(':uid'=>isLoggedIn(), ':text'=>$fname.' now working on your question', ':token'=>$_GET['token'], ':date'=>time()));
    }
    ?>
    <title>Technical Support</title>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <style type="text/css">
        @import url('/static/fonts/sf/stylesheet.css');

        html {
            height: 100%;
        }

        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #16171c;
        }

        ::-webkit-scrollbar-thumb {
            background: #40424b;
            border-radius: 10px !important;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        body {
            margin: 0px;
            padding: 0px;
            height: 100%;
            font-family: SF UI Text !important;
            font-size: 14px;

            background-color: #0d0f13;
        }

        .msg-container {
            width: 100%;
            height: 100%;
        }

        .header {
            width: 100%;
            height: 30px;
            text-align: center;
            padding: 15px 0px 5px;
            font-size: 20px;
            font-weight: normal;
            background-color: #0d0f13;
            color: #fff;
        }

        .msg-area {
            height: calc(100% - 102px);
            width: 100%;
            background-color: #0d0f13;
            overflow-y: scroll;

        }

        .msginput {
            margin: 10px;
            font-size: 14px;
            width: calc(70% - 20px);
            outline: none;
            background-color: #0d0f13;
            padding: .375rem .75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out
        }

        .bottom {
            width: 100%;
            height: 50px;
            position: fixed;
            bottom: 0px;
            background-color: #0d0f13;
        }


        h1 {
            padding: 0px;
            margin: 20px 0px 0px 0px;
            text-align: center;
            font-weight: normal;
        }

        button {
            background-color: #43ACEC;
            border: none;
            color: #FFF;
            font-size: 16px;
            margin: 0px auto;
            width: 150px;
        }

        .buttonp {
            width: 150px;
            margin: 0px auto;
        }

        .msg {
            margin: 10px 10px;
            background-color: #16171c;
            max-width: calc(45% - 20px);
            color: #fff;
            padding: 10px;
            font-size: 17px;
            border-radius: 15px 15px 15px 0px;
        }

        .msgfrom {
            background-color: #da49ff;
            color: #FFF;
            margin: 10px 10px 10px 55%;
            border-radius: 15px 15px 0px 15px;
            font-size: 17px;
            padding: 10px;
            max-width: calc(45% - 20px);
        }

        .msgsentby {
            color: #8C8C8C;
            font-size: 12px;
            margin: 4px 0px 0px 10px;
        }

        .msgsentbyfrom {
            float: right;
            margin-right: 12px;
        }
        .myButton {
	-moz-box-shadow: 0px 1px 0px 0px #f0f7fa;
	-webkit-box-shadow: 0px 1px 0px 0px #f0f7fa;
	box-shadow: 0px 1px 0px 0px #f0f7fa;
	background-color:#ed34ed;
	-webkit-border-radius:7px;
	-moz-border-radius:7px;
	border-radius:7px;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	padding:10px 24px;
	text-decoration:none;
	text-shadow:0px -1px 0px #5b6178;
}
.myButton:hover {
	background-color:#b804a3;
}
.myButton:active {
	position:relative;
	top:1px;
}
    </style>
</head>

<body onload="updateScroll();">

    <div class="msg-container">
        <div class="header">Technical Support</div>
        <div style="background-color: #0d0f13;" class="msg-area" id="msg-area">
            <?php
            $messages = DB::query('SELECT * FROM chat WHERE token=:t', array(':t'=>$_GET['token']));

            foreach ($messages as $m) {
                if ($m['type'] === '1') {
                    if ($m['user_id'] != isLoggedIn()) {
                        echo '<div class="msgc" style="margin-bottom: 15px;">
                    <div class="msg">'.$m['text'].'</div>
                    <div class="msgarr"></div>
                </div>';
                    } else {
                
                        echo '<div class="msgc" style="margin-bottom: 15px;">
                    <div class="msg msgfrom">'.$m['text'].'</div>
                    <div class="msgarr msgarrfrom"></div>
                </div>';
                    }
                } else {
                    echo '<center><p style="color: #fff;">'.$m['text'].'</p></center>';
                }
                
            }
            ?>


        </div>
        <div style="background-color: #0d0f13;" class="bottom">
            <form id="registrationForm">
            <center><input type="text"  name="msginput" class="msginput" id="msginput" style="color: #fff;"  value="" placeholder="Enter your message here ...">
            <input type="text" id="countmsg" value="<?=DB::query('SELECT COUNT(*) FROM chat WHERE token=:t', array(':t'=>$_GET['token']))[0]['COUNT(*)']; ?>" style="display: none;">
            <button type="submit" class="myButton" id="button-addon2">Send</button></center>
            <input name="token" style="display: none;" type="text" value="<?=$_GET['token']?>">
            </form>
        </div>
    </div>
    <script type="text/javascript">
        var msginput = document.getElementById("msginput");
        var msgarea = document.getElementById("msg-area");
function updateScroll() {
    var element = document.getElementById("msg-area");
     element.scrollTop = element.scrollHeight;
}
function escapehtml(text) {
  return text
      .replace(/&/g, "&amp;")
      .replace(/</g, "&lt;")
      .replace(/>/g, "&gt;")
      .replace(/"/g, "&quot;")
      .replace(/'/g, "&#039;");
}

        function update() {
            var xmlhttp = new XMLHttpRequest();
            var xmlhttpRe = new XMLHttpRequest();
            var output = "";
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    msgarea.innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "/api/Support/ListMessages?token=" + '<?=$_GET['token']?>', true);
            xmlhttpRe.open("GET", "/api/Support/CountMessages?token=" + '<?=$_GET['token']?>', true);
            xmlhttpRe.send();
            if (xmlhttpRe.responseText > document.getElementById("countmsg").value) {
                document.getElementById("countmsg").value = xmlhttpRe.responseText;
                var audio = new Audio('/static/notify.m4a');
                audio.play();
                document.getElementById("msg-area").scrollTop = document.getElementById("msg-area").scrollHeight;
                }
                
            xmlhttp.send();
            
        }

                $('#registrationForm').submit(function(e) {
                e.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: '/api/Support/SendMessage',
                        data: $(this).serialize(),
                        success: function(data) {

                            
                            var message = document.getElementById("msginput").value;
                            document.getElementById("msg-area").innerHTML += "<div class=\"msgc\" style=\"margin-bottom: 30px;\"> <div class=\"msg msgfrom\">" + message + "</div> <div class=\"msgarr msgarrfrom\"></div>  </div>";
				
                document.getElementById("msg-area").scrollTop = document.getElementById("msg-area").scrollHeight;
                            var audio = new Audio('/static/notify.m4a');
                            audio.play();
                            document.getElementById("msginput").value = "";

                                    
                
                            
                        }
                            
                    });
                    document.getElementById('msginput').value = "";
                }
                
            ); 
            
             
        setInterval(function() {
            update()
        }, 1024);
    </script>
</body>

</html>