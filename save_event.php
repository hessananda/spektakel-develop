<?php
include("config/koneksi.php");
   $log = new database; //instance class menjadi object
   $log->connectMySQL(); // panggil fungsi connectMySQL yang ada di class database

include "config/file_action.php";
   $upload = new action; //instance class menjadi object

$now = date("Y-m-d H:i:s");

session_start();

$action = $_GET['action'];
$id=$_GET['id'];

if ($action=='input')
{
	$upload->upload_file('content/upload/2015/12','file');

 mysql_query("INSERT INTO event_organizer VALUES ('',
 										'$_POST[eo_name]',
 										'',
 										'$_POST[eo_contact_number]',
 										'$_POST[eo_email]',
 										''
 										) ");

 $eo = mysql_fetch_assoc(mysql_query("SELECT eo_id FROM event_organizer WHERE eo_name = '$_POST[eo_name]' 
 										 AND eo_contact_number = '$_POST[eo_contact_number]'
 										 AND eo_email = '$_POST[eo_email]' "));

$event_start_time = $_POST['event_start_time_hour'].':'.$_POST['event_start_time_minute'].':'.'00' ;
$event_finish_time = $_POST['event_finish_time_hour'].':'.$_POST['event_finish_time_minute'].':'.'00' ;

 mysql_query("INSERT INTO event VALUES ('',
 										'$_POST[event_title]',
 										'$_POST[event_start_date]',
 										'$_POST[event_finish_date]',
 										'$event_start_time',
 										'$event_finish_time',
 										'$_POST[event_city]',
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
 										'$_SESSION[userid]',
 										'promotor',
 										'$now',
 										'',
 										''
 										) ");
 echo mysql_error();


?>
<meta http-equiv="refresh" content="0; url=account-promotor.php" />
<?php

}

elseif ($action=='edit') {

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
					   event_location = '$_POST[event_location]',
					   event_detail_address = '$_POST[event_detail_address]',
					   event_gmap_link = '$_POST[event_gmap_link]',
					   event_description = '$_POST[event_description]',
					   event_description_english = '$_POST[event_description_english]',
					   event_more_info = '$_POST[event_more_info]',
					   event_type = '$_POST[event_type]'
					   
					   WHERE event_id = '$id'";

		$event_organizer = "UPDATE event_organizer SET eo_name = '$_POST[eo_name]',					    
					   eo_contact_number ='$_POST[eo_contact_number]',
					   eo_email ='$_POST[eo_email]'
					   WHERE eo_id = '$_POST[event_organizer_id]' ";

	mysql_query($memberUpSelect);

	mysql_query($event_organizer);

	if ($_FILES['event_image']['name'] <> '')
		{
			$upload->upload_file('content/upload/2015/12','event_image');
			$upload->delete_file('event_image','event','content/upload/2015/12','event_id',$id)	;	
			mysql_query("UPDATE event SET event_image = '$nama_final' WHERE event_id = '$id' ");
			
		}
			

	echo mysql_error();
	
	header("location:account-promotor.php");

}

elseif ($action=='hapus') {

		$upload->delete_file('event_image','event','content/upload/2015/12','event_id',$id)	;	
		mysql_query("DELETE FROM event  WHERE event_id = '$id' ");
		echo mysql_error();

		header("location:account-promotor.php");
}

else
{
	echo "disitu kadang saya merasa sedih";
}


?>