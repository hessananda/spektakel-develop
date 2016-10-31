<?php

include "config/koneksi.php";
include "config/file_action.php";
$hesa = new action;
session_start();

$now = date("Y-m-d H:i:s");

$action = $_GET['action'];

if ($action=='hapus')
{
	$id=$_GET['id'];	

	$hesa->delete_file('user_image','user',"images/user",'user_id',$id);

	$memberDelSelect = mysql_query("DELETE FROM user WHERE user_id = '$id'");
	
	echo mysql_error();
	header('location:user_view.php');
				
}

elseif ($action=='edit')
{
	$id=$_GET['id'];

	$memberUpSelect = "UPDATE user SET user_fullname = '$_POST[user_fullname]',
									   user_name = '$_POST[user_name]',
									   user_type = '$_POST[user_type]',
									   user_email = '$_POST[user_email]',
									   user_banned = '$_POST[user_banned]'					   
									   
									   WHERE user_id = '$id'";									   

	mysql_query($memberUpSelect);
	echo mysql_error();

	if ($_POST['new_password']<>'') {
		mysql_query("UPDATE user SET user_password = '".md5($_POST['new_password'])."' WHERE user_id = '$id' ");		
	}

	$nama_foto = $_FILES['user_image']['name'];

	if ($nama_foto <> '')
		{
			$hesa->delete_file('user_image','user',"images/user",'user_id',$id);

			$hesa->upload_file("images/user",'user_image');

			mysql_query("UPDATE user SET user_image = '$nama_final' WHERE user_id = '$id' ");

		}

	header("location:user_edit.php?id=$id");

}

elseif ($action=='input')
{

$hesa->upload_file("images/user",'user_image');

 mysql_query("INSERT INTO user VALUES (NULL, 										
 										'$_POST[user_name]', 										
 										'$_POST[new_password]',
 										'$_POST[user_type]',
 										'$_POST[user_fullname]',
 										'$nama_final',
 										'$_POST[user_email]',
 										'$_POST[user_banned]'									
 										) ");
 
echo mysql_error();
?>
<meta http-equiv="refresh" content="0; url=user_view.php" />
<?php

}

else
{
	echo "disitu kadang saya merasa sedih";
}


?>