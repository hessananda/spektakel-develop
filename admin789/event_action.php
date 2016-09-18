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

	$hesa->delete_file('event_image','event',"../images/events/$sqlfetch[event_image]",'event_id',$id);

	$memberDelSelect = mysql_query("DELETE FROM event WHERE event_id = '$id'");
	
	echo mysql_error();
	header('location:event_view.php');
				
}

elseif ($action=='edit')
{
	$id=$_GET['id'];

	$event_start_time = $_POST['event_start_time_hour'].':'.$_POST['event_start_time_minute'].':'.'00' ;
	$event_finish_time = $_POST['event_finish_time_hour'].':'.$_POST['event_finish_time_minute'].':'.'00' ;

	$memberUpSelect = "UPDATE event SET event_title = '$_POST[event_title]',
					   event_start_date = '$_POST[event_start_date]', 
					   event_finish_date = '$_POST[event_finish_date]', 
					   event_start_time ='$event_start_time',
					   event_finish_time = '$event_finish_time',
					   event_city = '$_POST[event_city]',
					   event_category = '$_POST[event_category]',
					   event_link = '$_POST[event_link]',
					   event_province = '$_POST[event_province]',
					   event_location = '$_POST[event_location]',
					   event_detail_address = '$_POST[event_detail_address]',
					   event_gmap_link = '$_POST[event_gmap_link]',
					   event_description = '$_POST[event_description]',
					   event_description_english = '$_POST[event_description_english]',
					   event_more_info = '$_POST[event_more_info]',
					   event_type = '$_POST[event_type]',
					   event_status = '$_POST[event_status]',
					   event_edited_by = '$_SESSION[user_id]',
					   event_edited_time = '$now'
					   WHERE event_id = '$id'";

		$event_organizer = "UPDATE event_organizer SET eo_name = '$_POST[eo_name]',
					   eo_contact_name = '$_POST[eo_contact_name]', 
					   eo_contact_number ='$_POST[eo_contact_number]',
					   eo_email ='$_POST[eo_email]',
					   eo_address = '$_POST[eo_address]',
					   eo_website ='$_POST[eo_website]',
					   eo_facebook ='$_POST[eo_facebook]',
					   eo_twitter ='$_POST[eo_twitter]',
					   eo_instagram = '$_POST[eo_instagram]'
					   WHERE eo_id = '$_POST[event_organizer_id]' ";

	mysql_query($memberUpSelect);
	echo mysql_error();
	mysql_query($event_organizer);

	$nama_foto = $_FILES['event_image']['name'];

	if ($nama_foto <> '')
		{

			$hesa->delete_file('event_image','event',"../images/events/$sqlfetch[event_image]",'event_id',$id);

			$hesa->upload_file("../images/events",'event_image');

			mysql_query("UPDATE event SET event_image = '$nama_final' WHERE event_id = '$id' ");

		}
	
	header("location:event_edit.php?id=$id");

}

elseif ($action=='update')
{
mysql_query("UPDATE event SET event_status = '$_POST[event_status]',
	 		 event_edited_by = '$_SESSION[user_id]',
			 event_edited_time = '$now'
			 WHERE event_id = '$_GET[id]' ");

 echo mysql_error();
 header("location:event_view.php");

}

elseif ($action=='input')
{

$hesa->upload_file("../images/events",'event_image');

 mysql_query("INSERT INTO event_organizer VALUES (NULL,
 										'$_POST[eo_name]',
 										'$_POST[eo_contact_name]',
 										'$_POST[eo_contact_number]',
 										'$_POST[eo_email]',										

 										'$_POST[eo_website]',
 										'$_POST[eo_facebook]',
 										'$_POST[eo_twitter]',
 										'$_POST[eo_instagram]',
 										'$_POST[eo_address]'
 										) ");

 $eo = mysql_fetch_assoc(mysql_query("SELECT eo_id FROM event_organizer WHERE eo_name = '$_POST[eo_name]' 
 										 AND eo_contact_name = '$_POST[eo_contact_name]'
 										 AND eo_contact_number = '$_POST[eo_contact_number]'
 										 AND eo_email = '$_POST[eo_email]'
 										 AND eo_address = '$_POST[eo_address]' "));

$event_start_time = $_POST['event_start_time_hour'].':'.$_POST['event_start_time_minute'].':'.'00' ;
$event_finish_time = $_POST['event_finish_time_hour'].':'.$_POST['event_finish_time_minute'].':'.'00' ;

 mysql_query("INSERT INTO event VALUES ('',
 										'$_POST[event_title]',
 										'$_POST[event_start_date]',
 										'$_POST[event_finish_date]',
 										'$event_start_time',
 										'$event_finish_time',
 										'$_POST[event_city]',
 										'$_POST[event_province]',
 										'$_POST[event_category]',
 										'$_POST[event_link]',
 										'$_POST[event_location]',
 										'$_POST[event_detail_address]',
 										'$_POST[event_gmap_link]',
 										'$nama_final',
 										'$_POST[event_description]',
 										'$_POST[event_description_english]',
 										'$_POST[event_more_info]',
 										'BELUM DIREVIEW',
 										'$_POST[event_type]', 										
 										'$eo[eo_id]',
 										'$_SESSION[user_id]',
 										'$_SESSION[user_type]',
 										'$now',
 										'$_SESSION[user_id]',
 										'$_SESSION[user_type]',
 										'$now'

 										) ");
 
echo mysql_error();
?>
<!--meta http-equiv="refresh" content="0; url=event_view.php" /-->
<?php

}

else
{
	echo "disitu kadang saya merasa sedih";
}


?>