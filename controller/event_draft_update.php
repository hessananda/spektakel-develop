<?php

require_once("config/koneksi.php");
require_once("config/file_action.php");   

   if(!isset($log)){
	   $log = new database; //instance class menjadi object
	   $log->connectMySQL(); // panggil fungsi connectMySQL yang ada di class database
	}

   if (!isset($upload)) {
   	$upload = new action; //instance class menjadi object upload image
   }   

$now = date("Y-m-d H:i:s");

	if(session_id() == '') { //cek apakah session sudah dimulai, jika belum, maka mulai session
	    session_start();
	}


 if (isset($id)) {
 	if (isset($_GET['id'])) {
 		$id = $_GET['id'];
 	}
 }
 
 $eo_name =  isset($_POST['eo_name'])?$_POST['eo_name']:"";
 $eo_contact_name =  isset($_POST['eo_contact_name'])?$_POST['eo_contact_name']:"";
 $eo_contact_number = isset($_POST['eo_contact_number'])?$_POST['eo_contact_number']:"";
 $eo_email = isset($_POST['eo_email'])?$_POST['eo_email']:"";
 $eo_website = isset($_POST['eo_website'])?$_POST['eo_website']:"";
 $eo_facebook = isset($_POST['eo_facebook'])?$_POST['eo_facebook']:"";
 $eo_twitter = isset($_POST['eo_twitter'])?$_POST['eo_twitter']:"";
 $eo_instagram = isset($_POST['eo_instagram'])?$_POST['eo_instagram']:"";
 $eo_address = isset($_POST['eo_address'])?$_POST['eo_address']:"";

 $event_start_time_hour = isset($_POST['event_start_time_hour'])?$_POST['event_start_time_hour']:"";
 $event_start_time_minute = isset($_POST['event_start_time_minute'])?$_POST['event_start_time_minute']:"" ;
 $event_finish_time_hour = isset($_POST['event_finish_time_hour'])?$_POST['event_start_time_hour']:"";
 $event_finish_time_minute = isset($_POST['event_finish_time_minute'])?$_POST['event_finish_time_minute']:"";

 $event_title = isset($_POST['event_title'])?$_POST['event_title']:"";
 $event_start_date = isset($_POST['event_start_date'])?$_POST['event_start_date']:"";
 $event_finish_date = isset($_POST['event_finish_date'])?$_POST['event_finish_date']:"";
 $event_city = isset($_POST['event_city'])?$_POST['event_city']:"";
 $event_province = isset($_POST['event_province'])?$_POST['event_province']:"";
 $event_category = isset($_POST['event_city'])?$_POST['event_city']:"";
 $event_link = isset($_POST['event_link'])?$_POST['event_link']:"";
 $event_description = isset($_POST['event_description'])?$_POST['event_description']:"";
 $event_description_english = isset($_POST['event_description_english'])?$_POST['event_description_english']:"";
 $event_more_info = isset($_POST['event_description_english'])?$_POST['event_description_english']:"";
 $event_more_info = isset($_POST['event_more_info'])?$_POST['event_more_info']:""; 
 $event_type = isset($_POST['event_type'])?$_POST['event_type']:"";

 $id_user_yang_edit = '$_SESSION[userid]';
 $event_edit_by = 'promotor';
 $event_edit_time = $now;

	$memberUpSelect = "UPDATE event_draft SET event_title = '$event_title',
					   event_start_date = 'event_start_date', 
					   event_finish_date = '$event_finish_date', 
					   event_start_time ='$event_start_time',
					   event_finish_time = '$event_finish_time',
					   event_city = '$event_city',
					   event_province = '$event_province',
					   event_category = '$event_category',
					   event_link = '$event_link',
					   event_location = '$event_location',
					   event_detail_address = '$event_detail_address',
					   event_gmap_link = '$event_gmap_link',
					   event_description = '$event_description',
					   event_description_english = '$event_description_english',
					   event_more_info = '$event_more_info',
					   event_type = '$event_type'
					   
					   WHERE event_id = '$id'";

	$event_organizer = "UPDATE event_organizer_draft SET eo_name = '$eo_name',					    
				   eo_contact_number ='$eo_contact_number',
				   eo_email ='$eo_email'
				   WHERE eo_id = '$event_organizer_id' ";

	mysql_query($memberUpSelect);

	mysql_query($event_organizer);

	if ($_FILES['event_image']['name'] <> '')
		{
			$upload->upload_file('../images/events','event_image');
			$upload->delete_file('event_image','event','../images/events','event_id',$id)	;	
			mysql_query("UPDATE event SET event_image = '$nama_final' WHERE event_id = '$id' ");
			
		}
			
	echo mysql_error();

	?>