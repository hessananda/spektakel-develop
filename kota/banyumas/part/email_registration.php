<?php

$to = $_POST['email'];

$subject = $_POST['fullname'].' Aktifkan Akun Spektakel.id Anda ';

$headers = "From: Spektakel.id " . strip_tags("kontak@spektakel.id") . "\r\n";
$headers .= "Reply-To: ". strip_tags("kontak@spektakel.id") . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$message = "

<html>
<head>
<title>Selamat bergabung bersama kami!</title>

<style>
@import 'https://fonts.googleapis.com/css?family=Roboto';
body {
  background: #000;
  margin: 0;
}

#container {
font-family: 'Roboto', sans-serif;
width: 780px;
background: #fff;
margin: 0 auto;
height: 100%;
padding: 20px 80px;
}

.head {
text-align: center;
}
.content {
margin-top: 150px;
}

.button {
    background-color: #ff3d00;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

</style>
</head>

<body>
  <div id='container'>
		<div class='head'>
		<a href='http://www.spektakel.id'><img src='http://spektakel.id/images/spektakel-logo.png' width='500'></a>
		</div>
		
		<div class='content'>
		<p>Terima kasih!</p>
		<p>Anda telah memilih ikut menyemarakkan keragaman seni budaya nusantara. 
		Entah sekadar penikmat, atau ikut andil merawat kegiatan seni budaya di sekitar anda.</p> 

		<p>Spektakel adalah ruang berbagi informasi untuk beragam kegiatan seni budaya Nusantara.</p>

		<p>Anda bisa memulainya dengan <a href='http://www.spektakel.id/welcome_member.php?code=".$registration_code."&action=home'>klik di sini</a></p>

		<p>Ingin lebih banyak berinteraksi dengan kami?
		Sila ikuti kami di <a href='http://instagram.com/spektakel.id'>Instagram</a> dan <a href='http://facebook.com/spektakel.id'>Facebook</a>.</p>

		<p>Jika anda ingin berbincang, kami membuka pintu di kontak@spektakel.id</p>

		<a href='http://www.spektakel.id/welcome_member.php?code=".$registration_code."&action=post_event' class='button'>Promosikan acara</a>
		<a href='http://www.spektakel.id/welcome_member.php?code=".$registration_code."&action=profil' class='button'>Perbarui Profil</a>

		<br><br><br>
		<p>Tim Spektakel</p>

		</div>
		
  </div>
  
</body>

</html>" ;		


$mail = mail($to, $subject, $message, $headers);

?>