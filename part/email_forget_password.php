<?php

$query = mysqli_query($con,"SELECT id FROM member WHERE email = '$email' ");
$member = mysqli_fetch_assoc($query);

$to = $_POST['email'];

$subject = 'Lupa Password Akun Spektakel.id Anda ';

$headers = "From: Spektakel.id " . strip_tags("kontak@spektakel.id") . "\r\n";
$headers .= "Reply-To: ". strip_tags("kontak@spektakel.id") . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$message = "

<html>
<head>
<title>Lupa Password Akun Spektakel.id</title>

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
		<a href='http://www.spektakel.id'><img src='http://www.spektakel.id/images/spektakel-logo.png' width='500'></a>
		</div>
		
		<div class='content'>		

		<p align='center'>klik tombol berikut untuk reset password Anda <br><br>
		<a href='http://www.spektakel.id/forget_password.php?tujuan=home&id=".md5($member['id'])."'' class='button'>Lupa Password</a>				
		</p>
		</div>
		
  </div>
  
</body>

</html>" ;		

mail($to, $subject, $message, $headers);

?>