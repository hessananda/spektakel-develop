<?php

require_once("config/koneksi.php");
require_once("config/file_action.php");   

   if (!isset($upload)) {
   	$upload = new action; //instance class menjadi object
   }   

$now = date("Y-m-d H:i:s");

	if(session_id() == '') { //cek apakah session sudah dimulai, jika belum, maka mulai session
	    session_start();
	}

 $upload->upload_file('images/events','file');

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
 $event_location = isset($_POST['event_location'])?$_POST['event_location']:"";
 $event_detail_address = isset($_POST['event_detail_address'])?$_POST['event_detail_address']:"";
 $event_gmap_link = isset($_POST['event_gmap_link'])?$_POST['event_gmap_link']:"";

 $event_province = isset($_POST['event_province'])?$_POST['event_province']:"";
 $event_category = isset($_POST['event_city'])?$_POST['event_city']:"";
 $event_link = isset($_POST['event_link'])?$_POST['event_link']:"";
 $event_description = isset($_POST['event_description'])?$_POST['event_description']:"";
 $event_description_english = isset($_POST['event_description_english'])?$_POST['event_description_english']:"";
 $event_more_info = isset($_POST['event_description_english'])?$_POST['event_description_english']:"";
 $event_more_info = isset($_POST['event_more_info'])?$_POST['event_more_info']:""; 
 $event_type = isset($_POST['event_type'])?$_POST['event_type']:"";


 $event_status = 'BELUM DIREVIEW';
 $event_organizer_id = '';
 $id_user_yang_input = '$_SESSION[userid]';
 $event_input_by = 'promotor';
 $event_input_time = $now;
 $event_edit_by = '';
 $event_edit_time = '';



 mysqli_query($con,"INSERT INTO event_organizer VALUES ('',
 										'$eo_name',
 										'$eo_contact_name',
 										'$eo_contact_number',
 										'$eo_email',
 										'$eo_website',
 										'$eo_facebook',
 										'$eo_twitter',
 										'$eo_instagram',
 										'$eo_address'
 										) ");


 $eo = mysqli_fetch_assoc(mysqli_query($con,"SELECT eo_id FROM event_organizer WHERE eo_name = '$eo_name' 
 										 AND eo_contact_number = '$eo_contact_number'
 										 AND eo_email = '$eo_email' "));

$event_start_time = $event_start_time_hour.':'.$event_start_time_minute.':'.'00' ;
$event_finish_time = $event_finish_time_hour.':'.$event_finish_time_minute.':'.'00' ;

 mysqli_query($con,"INSERT INTO event VALUES ('',
 										'$event_title',
 										'$event_start_date',
 										'$event_finish_date',
 										'$event_start_time',
 										'$event_finish_time',
 										'$event_city',
 										'$event_province',
 										'$event_category',
 										'$event_link',
 										'$event_location',
 										'$event_detail_address',
 										'$event_gmap_link',
 										'$nama_final',
 										'$event_description',
 										'$event_description_english',
 										'$event_more_info',
 										'BELUM DIREVIEW',
 										'$event_type', 					
 										'$eo[eo_id]',
 										'$id_user_yang_input',
 										'$event_input_by',
 										'$now',
 										'',
 										'',
 										''
 										) ");
 echo mysqli_error($con);

?>