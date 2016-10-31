<?php

require_once("../config/koneksi.php");
require_once("../config/file_action.php");   

$now = date("Y-m-d H:i:s");

	if(session_id() == '') { //cek apakah session sudah dimulai, jika belum, maka mulai session
	    session_start();
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
 $event_start_time = isset($_POST['event_start_time'])?$_POST['event_start_time'].":00":"";
 $event_finish_time = isset($_POST['event_finish_time'])?$_POST['event_finish_time'].":00":"";
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
 $event_organizer_id = isset($_POST['event_organizer_id'])?$_POST['event_organizer_id']:"";;
 $id_user_yang_input = $_SESSION['userid'];
 $event_input_by = 'promotor';
 $event_input_time = $now;
 $id_user_yang_edit = $_SESSION['userid'];
 $event_edited_by = 'promotor';
 $event_edited_time = $now;
 $overlay = (isset($_POST['overlay']) || $_POST['overlay']=='' ? $_POST['overlay']:"normal";


$date_start = str_replace('/', '-', $event_start_date);;
$date_finish = str_replace('/', '-', $event_finish_date);;

$event_date_start = date("Y-m-d", strtotime($date_start));
$event_date_finish = date("Y-m-d", strtotime($date_finish));

$event_start_date = $event_date_start == ''?"0000-00-00":$event_start_date;
$event_date_finish = $event_date_finish == ''?"0000-00-00":$event_date_finish;
 

	$memberUpSelect = "UPDATE event_draft SET 
					   event_title = '$event_title',
					   event_start_date = '$event_start_date', 
					   event_finish_date = '$event_finish_date', 
					   event_start_time ='$event_start_time',
					   event_finish_time = '$event_finish_time',
					   event_city = '$event_city',
					   event_province = '$event_province',
					   event_category = '$event_category',
					   event_tag = '$event_tag',
					   event_link = '$event_link',
					   event_location = '$event_location',					   
					   event_detail_address = '$event_detail_address',
					   event_gmap_link = '$event_gmap_link',
					   event_image_credit = '$event_image_credit',
					   event_description = '$event_description',
					   event_description_english = '$event_description_english',
					   event_more_info = '$event_more_info',
					   event_type = '$event_type',
					   id_user_yang_edit = '$id_user_yang_edit',
					   event_edited_by = '$event_edited_by',
					   event_edited_time = '$event_edited_time',
					   overlay = '$overlay'
					   
					   WHERE event_id = '$id'";	

	$event_organizer = "UPDATE event_organizer_draft SET 
						eo_name = '$eo_name',					    
				   		eo_contact_number ='$eo_contact_number',
				   		eo_email ='$eo_email',
				   		eo_website ='$eo_website',
				   		eo_facebook ='$eo_facebook',
				   		eo_twitter ='$eo_twitter',
				   		eo_instagram ='$eo_instagram',
				   		eo_address ='$eo_address'

				   		WHERE eo_id = '$event_organizer_id' ";	

	mysqli_query($con,$memberUpSelect);

	mysqli_query($con,$event_organizer);

		if ($_FILES['image']['name']<>'') {
		 	upload_file('../images/events','image');
		 	delete_file('event_image','event_draft','../images/events','event_id',$id)	;	
		 	mysqli_query($con,"UPDATE event_draft SET event_image = '$nama_final' WHERE event_id = '$id' ");
		 	
		 	// echo mysqli_error($con);
		 }
		 else{
		 	if (isset($_POST['template_image'])) {
		 		
		 		$nama_image = $_POST['template_image'] ;
		 		$query = "UPDATE event_draft SET event_image = '$nama_image' WHERE event_id = '$id' " ;
		 		mysqli_query($con,$query);
		 		
		 		// echo mysqli_error($con);
		 	} 	
		 }
	
	?>