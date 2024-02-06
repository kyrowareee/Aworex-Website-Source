<?php 
require $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";
require $_SERVER['DOCUMENT_ROOT'] . "/classes/DB.php";
include($_SERVER['DOCUMENT_ROOT'] . '/classes/Auth.php');

if (isset($_POST['createpost'])) {
    if (isset($_COOKIE['SNID_'])) {

        DB::query('INSERT INTO reviews VALUES (\'0\', :title, :date, :text, :type, :r)', array(':title'=>$_POST['title'], ':date'=>time(), ':text'=>$_POST['text'], ':type'=>$_POST['type'], ':r'=>1));
        $alert = 1;
    } else {
        DB::query('INSERT INTO reviews VALUES (\'0\', :title, :date, :text, :type, :r)', array(':title'=>$_POST['title'], ':date'=>time(), ':text'=>$_POST['text'], ':type'=>$_POST['type'], ':r'=>0));
        $alert = 2;
    }
}



session_start();
require $_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php";
use GuzzleHttp\Client;

use GuzzleHttp\RequestOptions;


if (isset($_POST['send'])) { 
  $post_data = "secret=6Lft_vEcAAAAAEU1FG2KnTsP6O7HIbF65YE388wH&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR'];

    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded; charset=utf-8', 'Content-Length: ' . strlen($post_data)));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    $googresp = curl_exec($ch);      
    $decgoogresp = json_decode($googresp);
    curl_close($ch);

if ($decgoogresp->success == true) {
        
    
        
    $client = new Client();
            
            $telegramMessage =  "<strong>Free Test</strong>\n<strong>Имя: ".$_POST['name']."</strong>\n<strong>Дискорд ".$_POST['discord']."</strong>\n<strong>Почта: ".$_POST['email']."</strong>\n<strong>Комментарий: ".$_POST['comment']."</strong>";

        try {
            $client->post('https://api.telegram.org/bot5156034384:AAHZ0tQJfvUeZMEimOxCdg6KvSEJWVUnjYM/sendMessage', [
                RequestOptions::JSON => [
                    'chat_id' => '-1001526084073',
                    'parse_mode' => 'HTML',
                    'text' => $telegramMessage,
                ]
            ]);
            header('Location: ?linked');
        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }
    } else {
    }
} 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-228578099-1">
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-228578099-1');
</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Your feedback on Aworex. Share your experience - tell us about your favorite cheat, convenient support and convenient payment on the site">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link href="/static/fonts/tt/stylesheet.css" rel="stylesheet">
  <link href="/static/fonts/sfpro/stylesheet.css" rel="stylesheet">
  <link href="/root.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
    integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
    crossorigin="anonymous"></script>
    <script
  src="https://code.jquery.com/jquery-3.6.4.min.js"
  integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
  crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
  <link rel="icon" type="image/x-icon" href="/static/img/logo.png">
  <script async="" src="https://mc.yandex.ru/metrika/tag.js"></script><script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script>
        $(function () {
  $(document).scroll(function () {
    var $nav = $(".header");
    $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
  });

});
function one() {
    $('.s1').html('<img width="550" src="/static/img/gallery/g/1/1.png" alt="">');
    $('.s2').html('<img width="550" src="/static/img/gallery/g/1/2.png" alt="">');
}

function two() {
    $('.s1').html('<img width="550" src="/static/img/gallery/g/2/1.png" alt="">');
    $('.s2').html('<img width="550" src="/static/img/gallery/g/2/2.png" alt="">');
}
function three() {
    $('.s1').html('<img width="550" src="/static/img/gallery/g/3/1.png" alt="">');
    $('.s2').html('<img width="550" src="/static/img/gallery/g/3/2.png" alt="">');
}
function four() {
    $('.s1').html('<img width="550" src="/static/img/gallery/g/4/1.png" alt="">');
    $('.s2').html('<img width="550" src="/static/img/gallery/g/4/2.png" alt="">');
    }
    </script>
        <link rel="icon" type="image/x-icon" href="/static/img/logo.png">
    <title>Aworex</title>
</head>
<style>
            .myButton {
            transition: 0.3s;
            animation-delay: 0.3s;
    background-color:#167bff;
	border-radius:6px;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:18px;
	font-weight:bold;
	padding:9px 28px;
	text-decoration:none;
}
.myButton:hover {
    transition: 0.3s;
    animation-delay: 0.3s;
	background-color:#0b3d7f;
    color: #fff;
}
.myButton:active {
	position:relative;
	top:1px;
}
        .modall {
  position: fixed !important;
  top: 50% !important;
  left: 50% !important;
  transform: translate(-50%, -50%) scale(0) !important;
  transition: 200ms ease-in-out !important;
  border: 1px solid black !important;
  border-radius: 10px !important;
  z-index: 99999 !important;
  background-color: white !important;
  width: 500px !important;
  max-width: 80% !important;
  
}

.modall.active {
  transform: translate(-50%, -50%) scale(1) !important;
}

.modal-headerr {
  padding: 10px 15px !important;
  display: flex !important;
  justify-content: space-between !important;
  align-items: center !important;
  border-bottom: 1px solid black !important;
}

.modal-headerr .title {
  font-size: 1.25rem !important;
  font-weight: bold !important;
}

.modal-headerr .close-button {
  cursor: pointer;
  border: none;
  outline: none;
  background: none;
  font-size: 1.25rem;
  font-weight: bold;
}

.modal-bodyy {
  padding: 10px 15px !important;
}

.overlay {
  z-index: 99998;
  position: fixed;
  opacity: 0;
  transition: 200ms ease-in-out;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0, 0, 0, .5);
  pointer-events: none;
}

.overlay.active {
  opacity: 1;
  pointer-events: all;
}
    </style>
<body style="background-color: #0D0D0D; background-image: url(/static/img/bckm.png); background-repeat: no-repeat;">
    <?php
    if (isset($_GET['linked'])) {
        echo '<div class="modall active" id="privacymodal">
    <div class="modal-headerr">
      <div style="color: #000;" class="title">Thank you!</div>
    </div>
    <div style="color: #000;" class="modal-body">
    We have received your application. We also recommend joining our Discord group<br><br>
    <a href="https://discord.gg/Ab69c3HJEk" class="myButton">Join</a>
    </div>
  </div><div class="overlay active"></div>';
    } ?>
    <script>
        var player = new Playerjs({ id: "player", file: "/static/video.mp4" });
    </script>
    <?php require $_SERVER['DOCUMENT_ROOT']."/classes/Navbar.php"; ?>
    <script src="/static/js/header.js"></script>


        

       
        
                
    


        <div class=" container col-xxl-8 px-4 py-5">
<h2>Privacy Policy</h2>


    <p>
<h2>Cancellation</h2><br>
<h2>1. An overview of data protection</h2><br>
1.1 General information<br>
The following information will provide you with an easy to navigate overview of what will happen with your personal data when you visit our website. The term “personal data” comprises all data that can be used to personally identify you. For detailed information about the subject matter of data protection, please consult our Data Protection Declaration, which we have included beneath this copy.<br><br>
1.2 Data recording on our website<br>
Who is the responsible party for the recording of data on this website (i.e. the “controller”)?<br><br>
The data on this website is processed by the operator of the website, whose contact information is available under section “General information and mandatory information” on this website.<br><br>
How do we record your data?<br><br>
We collect your data as a result of you sharing of your data with us. This may, for instance be information you enter into our contact form. Our IT systems automatically record other data when you visit our website. This data comprises primarily technical information (e.g. web browser, operating system or time the site was accessed). This information is recorded automatically when you access our website.<br><br>
What are the purposes we use your data for?<br><br>
A portion of the information is generated to guarantee the error free provision of the website. Other data may be used to analyse user patterns or to detect double accounts.<br><br>
What rights do you have as far as your information is concerned?<br><br>
You have the right to receive information about the source, recipients and purposes of your archived personal data at any time without having to pay a fee for such disclosures. You also have the right to demand that your data are rectified, blocked or eradicated. Please do not hesitate to contact us at any time under the address disclosed in section “General information and mandatory information” on this website if you have questions about this or any other data protection related issues. You also have the right to log a complaint with the competent supervising agency. Moreover, under certain circumstances, you have the right to demand the restriction of the processing of your personal data. For details, please consult the Data Protection Declaration under section “Right to demand processing restrictions”.<br><br>
<h2>2. General information and mandatory information</h2><br>
2.1 Data protection<br>
The operators of this website and its pages take the protection of your personal data very seriously. Hence, we handle your personal data as confidential information and in compliance with the statutory data protection regulations and this Data Protection Declaration.<br><br>
Whenever you use this website, a variety of personal information will be collected. Personal data comprises data that can be used to personally identify you. This Data Protection Declaration explains which data we collect as well as the purposes we use this data for. It also explains how, and for which purpose the information is collected.<br><br>
We herewith advise you that the transmission of data via the Internet (i.e. through e-mail communications) may be prone to security gaps. It is not possible to completely protect data against third party access.<br><br>
2.2 Information about the responsible party (referred to as the “controller” in the GDPR)<br>
The data processing controller on this website is:<br><br>
Aworex Software
E-Mail: admin (at) aworex.com<br><br>
The controller is the natural person or legal entity that single-handedly or jointly with others makes decisions as to the purposes of and resources for the processing of personal data (e.g. names, e-mail addresses, etc.).<br><br>
2.3 Storage duration<br>
Unless a more specific storage period has been specified in this privacy policy, your personal data will remain with us until the purpose for which it was collected no longer applies. If you assert a justified request for deletion or revoke your consent to data processing, your data will be deleted, unless we have other legally permissible reasons for storing your personal data (e.g., tax or commercial law retention periods); in the latter case, the deletion will take place after these reasons cease to apply.
2.4 General information on the legal basis for the data processing on this website<br>
If you have consented to data processing, we process your personal data on the basis of Art. 6(1)(a) GDPR or Art. 9 (2)(a) GDPR, if special categories of data are processed according to Art. 9 (1) DSGVO. In the case of explicit consent to the transfer of personal data to third countries, the data processing is also based on Art. 49 (1)(a) GDPR. If you have consented to the storage of cookies or to the access to information in your end device (e.g., via device fingerprinting), the data processing is additionally based on § 25 (1) TTDSG. The consent can be revoked at any time. If your data is required for the fulfillment of a contract or for the implementation of pre-contractual measures, we process your data on the basis of Art. 6(1)(b) GDPR. Furthermore, if your data is required for the fulfillment of a legal obligation, we process it on the basis of Art. 6(1)(c) GDPR. Furthermore, the data processing may be carried out on the basis of our legitimate interest according to Art. 6(1)(f) GDPR. Information on the relevant legal basis in each individual case is provided in the following paragraphs of this privacy policy.<br><br>
2.5 Information on data transfer to the USA and other non-EU countries<br>
Among other things, we use tools of companies domiciled in the United States or other from a data protection perspective non-secure non-EU countries. If these tools are active, your personal data may potentially be transferred to these non-EU countries and may be processed there. We must point out that in these countries, a data protection level that is comparable to that in the EU cannot be guaranteed. For instance, U.S. enterprises are under a mandate to release personal data to the security agencies and you as the data subject do not have any litigation options to defend yourself in court. Hence, it cannot be ruled out that U.S. agencies (e.g., the Secret Service) may process, analyze, and permanently archive your personal data for surveillance purposes. We have no control over these processing activities.<br><br>
2.6 Revocation of your consent to the processing of data<br>
A wide range of data processing transactions are possible only subject to your express consent. You can also revoke at any time any consent you have already given us. To do so, all you are required to do is sent us an informal notification via e-mail. This shall be without prejudice to the lawfulness of any data collection that occurred prior to your revocation.<br><br>
2.7 Right to object to the collection of data in special cases; right to object to direct advertising (Art. 21 GDPR)<br>
In the event that data are processed on the basis of Art. 6 Sect. 1 lit. e or f GDPR, you have the right to at any time object to the processing of your personal data based on grounds arising from your unique situation. This also applies to any profiling based on these provisions. To determine the legal basis, on which any processing of data is based, please consult this Data Protection Declaration. If you log an objection, we will no longer process your affected personal data, unless we are in a position to present compelling protection worthy grounds for the processing of your data, that outweigh your interests, rights and freedoms or if the purpose of the processing is the claiming, exercising or defence of legal entitlements (objection pursuant to Art. 21 Sect. 1 GDPR).<br><br>
If your personal data is being processed in order to engage in direct advertising, you have the right to at any time object to the processing of your affected personal data for the purposes of such advertising. This also applies to profiling to the extent that it is affiliated with such direct advertising. If you object, your personal data will subsequently no longer be used for direct advertising purposes (objection pursuant to Art. 21 Sect. 2 GDPR).<br><br>
2.8 Right to log a complaint with the competent supervisory agency<br>
In the event of violations of the GDPR, data subjects are entitled to log a complaint with a supervisory agency, in particular in the member state where they usually maintain their domicile, place of work or at the place where the alleged violation occurred. The right to log a complaint is in effect regardless of any other administrative or court proceedings available as legal recourses.<br><br>
2.9 Right to data portability<br>
You have the right to demand that we hand over any data we automatically process on the basis of your consent or in order to fulfil a contract be handed over to you or a third party in a commonly used, machine readable format. If you should demand the direct transfer of the data to another controller, this will be done only if it is technically feasible.<br><br>
2.10 Information about, blockage, rectification and eradication of data<br>
Within the scope of the applicable statutory provisions, you have the right to at any time demand information about your archived personal data, their source and recipients as well as the purpose of the processing of your data. You may also have a right to have your data rectified, blocked or eradicated. In the event of account suspension (see: "Registration on this website"), the right to have your personal data deleted may be limited in accordance with the applicable data protection regulations. In these cases, the storage of your data is based on our legitimate interest in preserving and defending our contractual rights. If you have questions about this subject matter or any other questions about personal data, please do not hesitate to contact us at any time at the address provided in section “General information and mandatory information”.<br><br>
2.11 Right to demand processing restrictions<br>
You have the right to demand the imposition of restrictions as far as the processing of your personal data is concerned. To do so, you may contact us at any time at the address provided in section “General information and mandatory information”. The right to demand restriction of processing applies in the following cases:<br><br>
In the event that you should dispute the correctness of your data archived by us, we will usually need some time to verify this claim. During the time that this investigation is ongoing, you have the right to demand that we restrict the processing of your personal data.<br><br>
If the processing of your personal data was/is conducted in an unlawful manner, you have the option to demand the restriction of the processing of your data in lieu of demanding the eradication of this data.<br><br>
If we do not need your personal data any longer and you need it to exercise, defend or claim legal entitlements, you have the right to demand the restriction of the processing of your personal data instead of its eradication.<br><br>
If you have raised an objection pursuant to Art. 21 Sect. 1 GDPR, your rights and our rights will have to be weighed against each other. As long as it has not been determined whose interests prevail, you have the right to demand a restriction of the processing of your personal data.<br><br>
If you have restricted the processing of your personal data, these data – with the exception of their archiving – may be processed only subject to your consent or to claim, exercise or defend legal entitlements or to protect the rights of other natural persons or legal entities or for important public interest reasons cited by the European Union or a member state of the EU.<br><br>
2.12 Objection to Advertising E-Mails<br>
Pursuant to Art. 21 Sect. 2 GDPR, the use of contact data published within the scope of the legal notice obligation for the transmission of unsolicited advertising and information material, as well as for the purpose of profiling, is contradicted. We expressly reserve the right to take legal action in the event that unsolicited advertising information is sent, such as spam-mails.<br><br>
<h2>3. Recording of data on our website</h2>
3.1 Cookies<br>
In some instances, our website and its pages use so-called cookies. Cookies do not cause any damage to your computer and do not contain viruses. The purpose of cookies is to make our website more user friendly, effective and more secure. Cookies are small text files that are placed on your computer and stored by your browser.<br><br>
Most of the cookies we use are so-called “session cookies.” They are automatically deleted after your leave our site. Other cookies will remain archived on your device until you delete them. These cookies enable us to recognise your browser the next time you visit our website.<br><br>
You can adjust the settings of your browser to make sure that you are notified every time cookies are placed and to enable you to accept cookies only in specific cases or to exclude the acceptance of cookies for specific situations or in general and to activate the automatic deletion of cookies when you close your browser. If you deactivate cookies, the functions of this website may be limited.<br><br>
Cookies that are required for the performance of the electronic communications transaction or to provide certain functions you want to use (e.g. the shopping cart function), are stored on the basis of Art. 6 Sect. 1 lit. f GDPR. The website operator has a legitimate interest in storing cookies to ensure the technically error free and optimised provision of the operator’s services. If other cookies (e.g. cookies for the analysis of your browsing patterns) should be stored, they are addressed separately in this Data Protection Declaration.<br><br>
3.2 Server log files<br>
The provider of this website and its pages automatically collects and stores information in so-called server log files, which your browser communicates to us automatically. The information comprises:<br><br>
The type and version of browser used<br><br>
The used operating system<br><br>
Referrer URL<br><br>
The hostname of the accessing computer<br><br>
The time of the server inquiry<br><br>
The IP address<br><br>
This data is not merged with other data sources.<br><br>
This data is recorded on the basis of Art. 6 Sect. 1 lit. f GDPR. The operator of the website has a legitimate interest in the technically error free depiction and the optimization of the operator’s website. In order to achieve this, server log files must be recorded.<br><br>
3.3. Ownership transfer of copyrighted material<br>
The copyright for your topics and contributions, insofar as they can be protected by copyright, remains with you as the user. However, when you post a topic or post, you grant us the right to keep the topic or post permanently on our website. In addition, we reserve the right to delete, edit, move or close your topics and posts. The aforementioned rights of use remain in effect even if the forum account is terminated.<br><br>
3.4 Registration on this website<br>
You have the option to register on our website to be able to use additional website functions. We shall use the data you enter only for the purpose of using the respective offer or service you have registered for. The required information we request at the time of registration must be entered in full. Otherwise we shall reject the registration.<br><br>
To notify you of any important changes to the scope of our portfolio or in the event of technical modifications, we shall use the e-mail address provided during the registration process.<br><br>
The basis for the processing of data is Art. 6 Sect. 1 lit. b GDPR, which permits the processing of data for the fulfilment of a contract or for pre-contractual actions.
The data recorded during the registration process shall be stored by us as long as you are registered on our website. Subsequently, such data shall be deleted. This shall be without prejudice to mandatory statutory retention obligations.<br><br>
3.5 Processing of data (customer and contract data)<br>
We collect, process and use personal data only to the extent necessary for the establishment, content organization or change of the legal relationship (data inventory). These actions are taken on the basis of Art. 6 Sect. 1 lit. b GDPR, which permits the processing of data for the fulfilment of a contract or pre-contractual actions. We collect, process and use personal data concerning the use of our website (usage data) only to the extent that this is necessary to make it possible for users to utilize the services and to bill for them.<br><br>
We would like to point out that for the purpose of a simpler shopping process and for subsequent contract processing, the web shop operator saves the connection owner's IP data as well as the buyer's name, address, telephone number and email address.<br><br>
In addition, the IP data of the connection holder and transaction data of the payment service providers are stored on our server for the purpose of contract processing. The data you provide is required to fulfill the contract or to carry out pre-contractual measures. Without this data, we cannot conclude a contract with you. A data transfer to third parties does not take place, with the exception of the transfer of the buyer data to the processing bank / payment service provider for the purpose of debiting the purchase price and to our tax advisor to fulfill our tax obligations.<br><br>
In the event of a contract being concluded, all data from the contractual relationship will be stored until the tax retention period (7 years) expires. The data name, address, telephone number, e-mail address, purchased goods and purchase date are also stored until the end of product liability (10 years). Data processing takes place on the basis of the legal provisions of Section 96 (3) TKG and Art 6 (1) lit a (consent) and / or lit b (necessary to fulfill the contract) of the GDPR.<br><br>
3.6 Data transfer upon closing of contracts for services and digital content<br>
We share personal data with third parties only if this is necessary in conjunction with the handling of the contract; for instance, with the financial institution tasked with the processing of payments.<br><br>
Any further transfer of data shall not occur or shall only occur if you have expressly consented to the transfer. Any sharing of your data with third parties in the absence of your express consent, for instance for advertising purposes, shall not occur.<br><br>
The basis for the processing of data is Art. 6 Sect. 1 lit. b GDPR, which permits the processing of data for the fulfilment of a contract or for pre-contractual actions.<br><br>
<h2>4. Plug-ins and Tools</h2>
4.1 YouTube<br>
Our website uses plug-ins of the YouTube platform, which is operated by Google. The website operator is Google Ireland Limited, Gordon House, Barrow Street, Dublin 4, Ireland.<br><br>
If you visit a page on our website into which a YouTube plug-in has been integrated, a connection with YouTube’s servers will be established. As a result, the YouTube server will be notified, which of our pages you have visited. Furthermore, YouTube will be able to place various cookies on your device. With the assistance of these cookies, YouTube will be able to obtain information about our website visitor. Among other things, this information will be used to generate video statistics with the aim of improving the user friendliness of the site and to prevent attempts to commit fraud. These cookies will stay on your device until you delete them. If you are logged into your YouTube account while you visit our site, you enable YouTube to directly allocate your browsing patterns to your personal profile. You have the option to prevent this by logging out of your YouTube account.<br><br>
The use of YouTube is based on our interest in presenting our online content in an appealing manner. Pursuant to Art. 6 Sect. 1 lit. f GDPR, this is a legitimate interest. For more information on how YouTube handles user data, please consult the YouTube Data Privacy Policy under: https://policies.google.com/privacy?hl=en.
4.2 Vimeo<br>
Our website uses plug-ins of the video portal Vimeo. The provider is Vimeo Inc., 555 West 18th Street, New York, New York 10011, USA.<br><br>
If you visit one of the pages on our website into which a Vimeo plug-in has been integrated, a connection to Vimeo’s servers will be established. As a consequence, the Vimeo server will receive information as to which of our pages you have visited. Moreover, Vimeo will receive your IP address. This will also happen if you are not logged into Vimeo or do not have an account with Vimeo. The information recorded by Vimeo will be transmitted to Vimeo’s server in the United States. If you are logged into your Vimeo account, you enable Vimeo to directly allocate your browsing patterns to your personal profile. You can prevent this by logging out of your Vimeo account.<br><br>
The use of Vimeo is based on our interest in presenting our online content in an appealing manner. Pursuant to Art. 6 Sect. 1 lit. f GDPR, this is a legitimate interest. For more information on how Vimeo handles user data, please consult the Vimeo Data Privacy Policy under: https://vimeo.com/privacy.<br><br>
4.3 Google Web Fonts<br>
To ensure that fonts used on this website are uniform, this website uses so-called Web Fonts provided by Google. When you access a page on our website, your browser will load the required web fonts into your browser cache to correctly display text and fonts. To do this, the browser you use will have to establish a connection with Google’s servers. As a result, Google will learn that your IP address was used to access our website. The use of Google Web Fonts is based on our interest in presenting our online content in a uniform and appealing way. According to Art. 6 Sect. 1 lit. f GDPR, this is a legitimate interest.<br><br>
If your browser should not support Web Fonts, a standard font installed on your computer will be used. For more information on Google Web Fonts, please follow this link: https://developers.google.com/fonts/faq and consult Google’s Data Privacy Declaration under: https://policies.google.com/privacy?hl=en.<br><br>
4.4 Google reCAPTCHA<br>
We use “Google reCAPTCHA” (hereinafter referred to as “reCAPTCHA”) on our websites. The provider is Google Ireland Limited, Gordon House, Barrow Street, Dublin 4, Ireland.
The purpose of reCAPTCHA is to determine whether data entered on our websites (e.g. information entered into a contact form) is being provided by a human user or by an automated program. To determine this, reCAPTCHA analyses the behaviour of the website visitors based on a variety of parameters. This analysis is triggered automatically as soon as the website visitor enters the site. For this analysis, reCAPTCHA evaluates a variety of data (e.g. IP address, time the website visitor spent on the site or cursor movements initiated by the user). The data tracked during such analyses are forwarded to Google. reCAPTCHA analyses run entirely in the background. Website visitors are not alerted that an analysis is underway.<br><br>
The data is processed on the basis of Art. 6 Sect. 1 lit. f GDPR. It is in the website operators legitimate interest, to protect the operator’s web content against misuse by automated industrial espionage systems and against SPAM. For more information about Google reCAPTCHA and to review the Data Privacy Declaration of Google, please follow these links: https://policies.google.com/privacy?hl=en and https://www.google.com/recaptcha/intro/android.html.<br><br><br><br>
4.5 SoundCloud<br>
We may have integrated plug-ins of the social network SoundCloud (SoundCloud Limited, Berners House, 47-48 Berners Street, London W1T 3NF, Great Britain) into our websites. You will be able to recognise such SoundCloud plug-ins by checking for the SoundCloud logo on the respective pages.<br><br>
Whenever you visit one of our websites, a direct connection between your browser and the SoundCloud server will be established immediately after the plug-in has been activated. As a result, SoundCloud will be notified that you have used your IP address to visit our site. If you click the “Like” button or the “Share” button while you are logged into your Sound Cloud user account, you can link the content of our websites to your SoundCloud profile and/or share the content. Consequently, SoundCloud will be able to allocate the visit to our website to your user account. We emphasize that we as the provider of the websites do not have any knowledge of the data transferred and the use of this data by SoundCloud.<br><br>
We use SoundCloud on the basis of Art. 6 Sect. 1 lit. f GDPR. The website operator has a legitimate interest in attaining the highest level of visibility on social media. For more information about this, please consult SoundCloud’s Data Privacy Declaration at: https://soundcloud.com/pages/privacy.<br><br>
If you prefer not to have your visit to our websites allocated to your SoundCloud user account by SoundCloud, please log out of your SoundCloud user account before you activate content of the SoundCloud plug-in.
4.6 Veoh<br>
Our website uses plug-ins of the video portal Veoh. The provider is FC2, 4730 South Fort Apache Road, Suite 300, Las Vegas, NV 89147, USA.
If you visit one of the pages on our website into which a Veoh plug-in has been integrated, a connection to Veoh’s servers will be established. As a consequence, the Veoh server will receive information as to which of our pages you have visited. Moreover, Veoh will receive your IP address. This will also happen if you are not logged into Veoh or do not have an account with Veoh. The information recorded by Veoh will be transmitted to Veoh’s server in the United States. If you are logged into your Veoh account, you enable Veoh to directly allocate your browsing patterns to your personal profile. You can prevent this by logging out of your Veoh account.<br><br>
The use of Veoh is based on our interest in presenting our online content in an appealing manner. Pursuant to Art. 6 Sect. 1 lit. f GDPR, this is a legitimate interest. For more information on how Veoh handles user data, please consult the Veoh Data Privacy Policy under: https://www.veoh.com/corporate/privacypolicy.<br><br>
4.7 Dailymotion<br>
Our website uses plug-ins of the video portal Dailymotion. The provider is Dailymotion, 140 boulevard Malesherbes, 75017 Paris, France.
If you visit one of the pages on our website into which a Dailymotion plug-in has been integrated, a connection to Dailymotion’s servers will be established. As a consequence, the Dailymotion server will receive information as to which of our pages you have visited. Moreover, Dailymotion will receive your IP address. This will also happen if you are not logged into Dailymotion or do not have an account with Dailymotion. If you are logged into your Dailymotion account, you enable Dailymotion to directly allocate your browsing patterns to your personal profile. You can prevent this by logging out of your Dailymotion account.<br><br>
The use of Dailymotion is based on our interest in presenting our online content in an appealing manner. Pursuant to Art. 6 Sect. 1 lit. f GDPR, this is a legitimate interest. For more information on how Dailymotion handles user data, please consult the Dailymotion Data Privacy Policy under: https://www.dailymotion.com/legal/privacy.<br><br>
4.8 GitHub<br>
Our website uses plug-ins of the portal GitHub. The provider is GitHub, Inc, 88 Colin P Kelly Jr St, San Francisco, CA 94107, USA.
If you visit one of the pages on our website into which a GitHub plug-in has been integrated, a connection to GitHub’s servers will be established. As a consequence, the GitHub server will receive information as to which of our pages you have visited. Moreover, GitHub will receive your IP address. This will also happen if you are not logged into GitHub or do not have an account with GitHub. The information recorded by GitHub will be transmitted to GitHub’s server in the United States. If you are logged into your GitHub account, you enable GitHub to directly allocate your browsing patterns to your personal profile. You can prevent this by logging out of your GitHub account.<br><br>
The use of GitHub is based on our interest in presenting our online content in an appealing manner. Pursuant to Art. 6 Sect. 1 lit. f GDPR, this is a legitimate interest. For more information on how GitHub handles user data, please consult the GitHub Data Privacy Policy under: https://help.github.com/articles/github-privacy-statement/.<br><br>
4.9 Spotify<br>
Our website uses plug-ins provided by Spotify. The provider is Spotify AB, Birger Jarlsgatan 61, 113 56 Stockholm, Sweden.
If you visit one of our pages featuring a Spotify plugin, a connection to the Spotify servers is established. Here the Spotify server is informed about which of our pages you have visited. In addition, Spotify will receive your IP address. This also applies if you are not logged in to Spotify when you visit our website or do not have a Spotify account. If you are logged in to your Spotify account, Spotify allows you to associate your browsing behavior directly with your personal profile. You can prevent this by logging out of your Spotify account.<br><br>
The use of Spotify is based on our interest in presenting our online content in an appealing manner. Pursuant to Art. 6 Sect. 1 lit. f GDPR, this is a legitimate interest. For more information on how to handle user data, please refer to the Spotify Privacy Policy at https://www.spotify.com/de/legal/privacy-policy/.<br><br>
4.10 Instagram<br>
Our website uses plug-ins provided by Instagram. The provider is Instagram Inc., 1601 Willow Road, Menlo Park, CA 94025, USA.
If you visit one of our pages featuring a Instagram plugin, a connection to the Instagram servers is established. Here the Instagram server is informed about which of our pages you have visited. In addition, Instagram will receive your IP address. This also applies if you are not logged in to Instagram when you visit our website or do not have a Instagram account. The information is transmitted to a Instagram server in the US, where it is stored. If you are logged in to your Instagram account, Instagram allows you to associate your browsing behavior directly with your personal profile. You can prevent this by logging out of your Instagram account.<br><br>
The use of Instagram is based on our interest in presenting our online content in an appealing manner. Pursuant to Art. 6 Sect. 1 lit. f GDPR, this is a legitimate interest. For more information on how to handle user data, please refer to the Instagram Privacy Policy at https://instagram.com/about/legal/privacy/.<br><br>
4.11 Imgur<br>
Our website uses plug-ins provided by Imgur. The provider is Imgur, Inc., 415 Jackson Street, 2nd Floor, Suite 200, San Francisco, CA 94111, USA.
If you visit one of our pages featuring a Imgur plugin, a connection to the Imgur servers is established. Here the Imgur server is informed about which of our pages you have visited. In addition, Imgur will receive your IP address. This also applies if you are not logged in to Imgur when you visit our website or do not have a Imgur account. The information is transmitted to a Imgur server in the US, where it is stored. If you are logged in to your Imgur account, Imgur allows you to associate your browsing behavior directly with your personal profile. You can prevent this by logging out of your Imgur account.<br><br>
The use of Imgur is based on our interest in presenting our online content in an appealing manner. Pursuant to Art. 6 Sect. 1 lit. f GDPR, this is a legitimate interest. For more information on how to handle user data, please refer to the Imgur Privacy Policy at https://imgur.com/privacy.<br><br>
4.12 Twitch<br>
Our website uses plug-ins provided by Twitch. The provider is Twitch Interactive, Inc., 225 Bush Street, 6th Floor, San Francisco, CA 94104, USA.
If you visit one of our pages featuring a Twitch plugin, a connection to the Twitch servers is established. Here the Twitch server is informed about which of our pages you have visited. In addition, Twitch will receive your IP address. This also applies if you are not logged in to Twitch when you visit our website or do not have a Twitch account. The information is transmitted to a Twitch server in the US, where it is stored. If you are logged in to your Twitch account, Twitch allows you to associate your browsing behavior directly with your personal profile. You can prevent this by logging out of your Twitch account.<br><br>
The use of Twitch is based on our interest in presenting our online content in an appealing manner. Pursuant to Art. 6 Sect. 1 lit. f GDPR, this is a legitimate interest. For more information on how to handle user data, please refer to the Twitch Privacy Policy at https://www.twitch.tv/p/legal/privacy-policy/.<br><br>
4.13 Twitter<br>
Our website uses plug-ins provided by Twitter. The provider is Twitter Inc., 1355 Market Street, Suite 900, San Francisco, CA 94103, USA.
If you visit one of our pages featuring a Twitter plugin, a connection to the Twitter servers is established. Here the Twitter server is informed about which of our pages you have visited. In addition, Twitter will receive your IP address. This also applies if you are not logged in to Twitter when you visit our website or do not have a Twitter account. The information is transmitted to a Twitter server in the US, where it is stored. If you are logged in to your Twitter account, Twitter allows you to associate your browsing behavior directly with your personal profile. You can prevent this by logging out of your Twitter account.<br><br>
The use of Twitter is based on our interest in presenting our online content in an appealing manner. Pursuant to Art. 6 Sect. 1 lit. f GDPR, this is a legitimate interest. For more information on how to handle user data, please refer to the Twitter Privacy Policy at https://twitter.com/en/privacy.<br><br>
4.14 Google Analytics<br>
We use “Google Analytics” on our websites. The provider is Google Ireland Limited, Gordon House, Barrow Street, Dublin 4, Ireland.
Google Analytics uses "cookies", which are text files placed on your computer, to help the website analyze how users interact with the site. The information generated by the cookie about your use of this website is usually transferred to a Google server in the USA and stored there.<br><br>
You can prevent Google from collecting the data generated by the cookie and relating to your use of the website (including your IP address) and from processing this data by Google by making the appropriate settings in your browser. There is no guarantee that you will be able to access all functions of this website without restrictions if your browser does not allow cookies.<br><br>
For more information about Google Analytics and to review the Data Privacy Declaration of Google, please follow these links: https://support.google.com/analytics/answer/6004245?hl=en and https://policies.google.com/privacy?hl=en<br><br>
<h2>5. Payment service providers</h2>
For the fulfillment of contracts, we use external payment service providers on the basis of Art. 6 para. 1 lit. b DSGVO in order to offer effective and secure payment options. We only transfer personal data to third parties if this is necessary in the course of the contract, for example to the bank responsible for the processing of payments.<br><br>
5.1 Stripe<br>
On our website, we offer to use Stripe as a payment service. The provider of this payment processing service is Stripe Payments Europe Ltd, Block 4, Harcourt Centre, Harcourt Road, Dublin 2, Ireland (hereinafter referred to as “Stripe”). If you choose to pay with Stripe, we will share the payment information you have entered with Stripe.<br><br>
For more information, see the privacy policy of Stripe under: https://stripe.com/privacy<br><br>



</p>

       
        

                        
                   


            </div>
       


   </body>

</html>