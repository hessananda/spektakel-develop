<?php

require_once("../config/koneksi.php");
require_once("../config/file_action.php");   

$now = date("Y-m-d H:i:s");

	if(session_id() == '') { //cek apakah session sudah dimulai, jika belum, maka mulai session
	    session_start();
	}

  $nama_final = '';
 if ($_FILES['image']['name']<>'') {
 	upload_file('../images/events','image');
 }
 else{
 	if (isset($_POST['template_image'])) {
 		$nama_final = $_POST['template_image'] ;
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
 

 $event_title = isset($_POST['event_title'])?$_POST['event_title']:"";
 $event_start_date = isset($_POST['event_start_date'])?$_POST['event_start_date']:"";
 $event_finish_date = isset($_POST['event_finish_date'])?$_POST['event_finish_date']:"";
 $event_start_time = isset($_POST['event_start_time'])?$_POST['event_start_time']:"";
 $event_finish_time = isset($_POST['event_finish_time'])?$_POST['event_finish_time']:"";
 $event_city = isset($_POST['event_city'])?$_POST['event_city']:"";
 $event_province = isset($_POST['event_province'])?$_POST['event_province']:"";
 $event_category = isset($_POST['event_category'])?$_POST['event_category']:"";
 $event_tag = isset($_POST['event_tag'])?$_POST['event_tag']:"";
 $event_link = isset($_POST['event_link'])?$_POST['event_link']:"";
 $event_location = isset($_POST['event_location'])?$_POST['event_location']:"";
 $event_detail_address = isset($_POST['event_detail_address'])?$_POST['event_detail_address']:"";
 $event_gmap_link = isset($_POST['event_gmap_link'])?$_POST['event_gmap_link']:"";

 $event_image_credit = isset($_POST['event_image_credit'])?$_POST['event_image_credit']:"";
 $event_description = isset($_POST['event_description'])?$_POST['event_description']:"";
 $event_description_english = isset($_POST['event_description_english'])?$_POST['event_description_english']:"";
 $event_more_info = isset($_POST['event_more_info'])?$_POST['event_more_info']:""; 
 $event_status = 'BELUM DIREVIEW';
 $event_type = isset($_POST['event_type'])?$_POST['event_type']:"";
 $event_organizer_id = '';
 $id_user_yang_input = $_SESSION['userid'];
 $event_input_by = 'promotor';
 $event_input_time = $now;
 $id_user_yang_edit = '';
 $event_edit_by = '';
 $event_edit_time = '';


$date_start = str_replace('/', '-', $event_start_date);;
$date_finish = str_replace('/', '-', $event_finish_date);;

$event_date_start = date("Y-m-d", strtotime($date_start));
$event_date_finish = date("Y-m-d", strtotime($date_finish));

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


 $eo = mysqli_fetch_assoc(mysqli_query($con,"SELECT MAX(eo_id) eo_id FROM event_organizer "));

 mysqli_query($con,"INSERT INTO event VALUES ('',
 										'$event_title',
 										'$event_date_start',
 										'$event_date_finish',
 										'$event_start_time',
 										'$event_finish_time',
 										'$event_city',
 										'$event_province',
 										'$event_category',
 										'$event_tag',
 										'$eo_website',
 										'$event_location',
 										'$event_detail_address',
 										'$event_gmap_link',
 										'$nama_final',
 										'$event_image_credit',
 										'$event_description',
 										'$event_description_english',
 										'$event_more_info',
 										'$event_status',
 										'$event_type', 					
 										'$eo[eo_id]',
 										'$id_user_yang_input',
 										'$event_input_by',
 										'$now',
 										'$id_user_yang_edit',
 										'$event_edit_by',
 										'$event_edit_time'
 										) ");
 echo mysqli_error($con);

?>