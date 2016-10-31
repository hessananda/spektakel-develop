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

	@$hesa->delete_file('slider_image','slider',"../images/slider",'slider_id',$id);

	$memberDelSelect = mysql_query("DELETE FROM slider WHERE slider_id = '$id'");
	
	echo mysql_error();
	header('location:slider_view.php');
				
}

elseif ($action=='edit')
{
	$id=$_GET['id'];

	$memberUpSelect = "UPDATE slider SET slider_title = '$_POST[slide_title]',
					   slider_content = '$_POST[slide_content]',
					   slider_link = '$_POST[slide_link]',
					   slider_button = '$_POST[slide_button]'
					   
					   WHERE slider_id = '$id'";

	mysql_query($memberUpSelect);
	echo mysql_error();

	$nama_foto = $_FILES['slider_image']['name'];

	if ($nama_foto <> '')
		{
			@$hesa->delete_file('slider_image','slider',"../images/slider",'slider_id',$id);

			$hesa->upload_file("../images/slider",'slider_image');

			mysql_query("UPDATE slider SET slider_image = '$nama_final' WHERE slider_id = '$id' ");

		}


	header("location:slider_edit.php?id=$id");


}

elseif ($action=='input')
{

$hesa->upload_file("../images/slider",'slider_image');


 mysql_query("INSERT INTO slider VALUES (NULL,
 										'$nama_final',
 										'$_POST[slide_title]',
 										'$_POST[slide_content]',
 										'$_POST[slide_link]',
 										'$_POST[slide_button]' 										
 										) ");
 
echo mysql_error();
?>
<meta http-equiv="refresh" content="0; url=slider_view.php" />
<?php

}

else
{
	echo "disitu kadang saya merasa sedih";
}


?>