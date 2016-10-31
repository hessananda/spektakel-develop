<?php

require_once("../config/koneksi.php");
require_once("../config/file_action.php");   

$query = "SELECT * FROM event_draft ed
		  INNER JOIN event_organizer_draft eod ON ed.event_organizer_id = eod.eo_id 
		  WHERE ed.event_id = '$id' ";

$draft = mysqli_fetch_assoc(mysqli_query($con,$query));

$now = date("Y-m-d H:i:s");

	if(session_id() == '') { //cek apakah session sudah dimulai, jika belum, maka mulai session
	    session_start();
	}

 $nama_final = '';

 $eo_name =  $draft['eo_name'];
 $eo_contact_name =  $draft['eo_contact_name'];
 $eo_contact_number = $draft['eo_contact_number'];
 $eo_email = $draft['eo_email'];
 $eo_website = $draft['eo_website'];
 $eo_facebook = $draft['eo_facebook'];
 $eo_twitter = $draft['eo_twitter'];
 $eo_instagram = $draft['eo_instagram'];
 $eo_address = $draft['eo_address'];
 

 $event_title = $draft['event_title'];
 $event_start_date = $draft['event_start_date'];
 $event_finish_date = $draft['event_finish_date'];
 $event_start_time = $draft['event_start_time'];
 $event_finish_time = $draft['event_finish_time'];
 $event_city = $draft['event_city'];
 $event_province = $draft['event_province'];
 $event_category = $draft['event_category'];
 $event_tag = $draft['event_tag'];
 $event_link = $draft['event_link'];
 $event_location = $draft['event_location'];
 $event_detail_address = $draft['event_detail_address'];
 $event_gmap_link = $draft['event_gmap_link'];
 $event_image = $draft['event_image'];
 $event_image_credit = $draft['event_image_credit'];
 $event_description = $draft['event_description'];
 $event_description_english = $draft['event_description_english'];
 $event_more_info = $draft['event_more_info'];
 $event_status = $draft['event_status'];
 $event_type = $draft['event_type'];
 $event_organizer_id = $draft['event_organizer_id'];
 $id_user_yang_input = $draft['id_user_yang_input'];
 $event_input_by = $draft['event_input_by'];
 $event_input_time = $now;
 $id_user_yang_edit = '';
 $event_edit_by = '';
 $event_edit_time = '';
 $overlay = $draft['overlay'] ;

 
 $eo_query = "INSERT INTO event_organizer VALUES ('',
 										'$eo_name',
 										'$eo_contact_name',
 										'$eo_contact_number',
 										'$eo_email',
 										'$eo_website',
 										'$eo_facebook',
 										'$eo_twitter',
 										'$eo_instagram',
 										'$eo_address'
 										) " ;

 mysqli_query($con,$eo_query);

 $eo = mysqli_fetch_assoc(mysqli_query($con,"SELECT MAX(eo_id) eo_id FROM event_organizer "));

 $event_query = "INSERT INTO event VALUES ('',
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
 										'$event_image',
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
 										'$event_edit_time',
 										'$overlay'
 										) " ;

 echo mysqli_error($con);

if (mysqli_query($con,$event_query)) {
	$eo_hapus = "DELETE FROM event_organizer_draft WHERE event_id = '".$draft['event_organizer_id']."' ";
 	$event_hapus = "DELETE FROM event_draft WHERE event_id = '".$id."' ";
 	
 	mysqli_query($con,$eo_hapus);
 	mysqli_query($con,$event_hapus);
}

?>