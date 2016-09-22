<?php
include "config/koneksi.php";

$passwordmd5 = md5($_POST['user_password']) ;

$login=mysql_query("SELECT * FROM user WHERE user_name ='$_POST[user_name]' AND user_password = '$passwordmd5' ");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();

  $_SESSION['user_id']       = $r['user_id'];
  $_SESSION['user_name']     = $r['user_name'];
  $_SESSION['user_password'] = $r['user_password'];
  $_SESSION['user_type']     = $r['user_type'];

  header('location:event_view.php');  

}
else{
?>
	<script>
		alert('Username atau password tidak tepat');
		location.href = 'index.php';
	</script>

<?php
}

?>
