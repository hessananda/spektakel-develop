<?php

include "config/koneksi.php";
include "../config/file_action.php";
$hesa = new action;
session_start();

$now = date("Y-m-d H:i:s");

$action = $_GET['action'];

if ($action=='hapus')
{
	$id=$_GET['id'];	

	$hesa->delete_file('team_image','team',"../images/team",'team_id',$id);

	$memberDelSelect = mysql_query("DELETE FROM team WHERE team_id = '$id'");
	
	echo mysql_error();
	header('location:team_view.php');
				
}

elseif ($action=='edit')
{
	$id=$_GET['id'];

	$memberUpSelect = "UPDATE team SET team_name = '$_POST[team_name]',
					   team_content = '$_POST[team_content]',
					   team_position = '$_POST[team_position]'					   
					   
					   WHERE team_id = '$id'";

	mysql_query($memberUpSelect);
	echo mysql_error();

	$nama_foto = $_FILES['team_image']['name'];

	if ($nama_foto <> '')
		{
			$hesa->delete_file('team_image','team',"../images/team",'team_id',$id);

			$hesa->upload_file("../images/team",'team_image');

			mysql_query("UPDATE team SET team_image = '$nama_final' WHERE team_id = '$id' ");

		}


	header("location:team_edit.php?id=$id");


}

elseif ($action=='input')
{

$hesa->upload_file("../images/team",'team_image');


 mysql_query("INSERT INTO team VALUES (NULL, 										
 										'$_POST[team_name]',
 										'$_POST[team_position]',
 										'$_POST[team_content]',
 										'$nama_final'									
 										) ");
 
echo mysql_error();
?>
<meta http-equiv="refresh" content="0; url=team_view.php" />
<?php

}

else
{
	echo "disitu kadang saya merasa sedih";
}


?>