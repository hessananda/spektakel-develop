<?php 
	require_once('config/koneksi.php');
	require_once('config/fungsi_tgl.php');
	require_once('config/potong_kata.php');	
	require_once('config/fungsi_nama_hari.php');
	session_start(); 
?>

<?php
    $id = $_GET['id'];

    $sql = "SELECT e.*, eo.*, p.name province_name FROM event e
    INNER JOIN event_organizer eo ON e.event_organizer_id = eo.eo_id
    INNER JOIN provinces p ON e.event_province = p.id
    WHERE e.event_id = '$id'";
    
    $sql_query = mysqli_query($con,$sql);
    $event = mysqli_fetch_assoc($sql_query);
    $time=strtotime($event['event_start_time']);
    $time_finish=strtotime($event['event_finish_time']);

    if($event['event_input_by']=='promotor'){
		$member = mysqli_fetch_assoc(mysqli_query($con,"SELECT id,full_name FROM member m WHERE m.id = '".$event['id_user_yang_input']."' ")) ;
	}

	$event_type = "";

	if ($event['event_type']=='gratis/free') {
		$event_type = 'gratis';
	}
	elseif ($event['event_type']=='berbayar/paid') {
		$event_type = 'berbayar';
	}
	elseif ($event['event_type']=='keduanya/both') {
		$event_type = 'berbayar & gratis';
	}
	else{
		$event_type = '';
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>

	<style type="text/css">
		.cover {
			  object-fit: cover;
			  width: 145px;
			  height: 90px;
			}

	</style>

	<title><?php echo $event['event_title'] ?></title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?php echo $event['event_title'] ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Stylesheet -->
    <link href="http://addtocalendar.com/atc/1.5/atc-style-blue.css" rel="stylesheet" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,100,200,500,900,800,700,600' rel='stylesheet' type='text/css'>
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="css/animate.css" rel="stylesheet" type="text/css" />
	<link href="css/owl.carousel.css" rel="stylesheet" type="text/css" />
	<link href="css/owl.theme.css" rel="stylesheet" type="text/css" />
	<link href="css/owl.transitions.css" rel="stylesheet" type="text/css" />
	<link href="css/superslides.css" rel="stylesheet" type="text/css">
	<link href="css/jquery.sidr.light.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css">
	<link href="css/cropper.css" rel="stylesheet" type="text/css">
	<link href="css/style.css" rel="stylesheet" type="text/css">

	<link href="images/favicon.png" rel="shortcut icon" />

	<meta property="og:image" content="/images/events/<?php echo $event['event_image'] ?>">
	<meta property="fb:app_id" content="1731865247074658">
	<meta property="og:type" content="website">
	<meta property="og:title" content="<?php echo $event['event_title']; ?>">
	<link rel="image_src" href="/images/events/<?php echo $event['event_image'] ?>"/>
	<meta property="og:url" content="http://spektakel.id/detail.php?id=<?php echo $id ?>">
	<!-- <meta property="og:type" content="article"> -->
	<meta property="og:description" content="<?php $content = strip_tags($event['event_description']); echo $content ;?>">
	<meta name="description" content="<?php echo $content ?>">
	<meta property="og:site_name" content="Spektakel.id" />
	<style type="text/css">
	.fa-facebook {
	    font-size: 20px;
	}
	.fa-twitter {
	    font-size: 20px;
	}
	.fa-instagram {
	    font-size: 20px;
	}
	.fa-external-link {
	    font-size: 20px;	    
	}
	</style>


</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.8&appId=214324738601113";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

	<a href="#0" class="cd-bottom cd-bottom-2">Bottom</a>
	<div class="wrapper">
		<header>
			<div class="header">
				<div class="container">
					<div class="header-inner">
						<div class="col-md-4 col-sm-4 col-xs-2 header-left">
							<div id="nav-icon"><span></span><span></span><span></span></div>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-6 col-xs-offset-3 header-middle">
							<div class="header-middle-top">
								<div id="logo">
									<a href="index.php"><img src="images/logo.png" title="Spektakel.id" alt="Spektakel.id" class="img-responsive"></a>
								</div>
							</div>
						</div>
						<!-- START LEFT MENU -->
						<?php
							require_once('part/modal_left_menu.php');
						?>
						<!-- END LEFT MENU -->
					</div>
				</div>
			</div>
			<img src="images/events/<?php echo $event['event_image'] ?>" alt="<?php echo $event['event_image'] ?>" style="display: none;">
			<div id="post-slides" style="background-image:url('images/events/<?php echo $event['event_image'] ?>');">&nbsp;</div>
		</header>
		<div class="clearfix"></div>
		<div class="container content" id="content">
			<div class="row">
				<div class="col-md-7 col-sm-7">
					<div class="post-title">
						<h4 class="text-uppercase text-orange"><?php echo $event['event_category'] ?></h4>
						<h1 class="text-uppercase"><?php echo $event['event_title'] ?></h1>
					</div>
					<div class="post-detail">
						<div class="row">
							<div class="col-md-10">
								<p class="border-orange text-uppercase"><?php echo hesa_date($event['event_start_date'],$event['event_finish_date']) ?> | <?php echo date("H:i", $time) ?> - <?php echo $event['event_finish_time']=='24:00:00'?'Selesai':date("H:i",$time_finish) ?></p>
								<p class="border-orange text-uppercase"><?php echo $event_type ?></p>
								<p class="border-orange text-uppercase">								
								<?php echo $event['event_city']<>''?$event['event_city']:'' ; ?><?php echo $event['province_name']<>''?', '.$event['province_name']:'' ; ?>
								</p>
								<p class="border-orange text-uppercase">
								<?php echo $event['event_location'] ?><?php echo $event['event_detail_address']<>''?', '.$event['event_detail_address']:'' ; ?><?php echo $event['event_gmap_link']<>''?'. <a href="'.$event['event_gmap_link'].'" target="_blank"><i>Peta</i></a>':'' ?></p>
								<?php echo $event['eo_name']<>''?'<p class="border-orange">Dikelola Oleh : '.$event['eo_name'].'</p>':'' ?>
								
								
								
								<?php if ($event['eo_contact_name']=='' AND $event['eo_name']=='' AND $event['eo_email']=='' AND $event['eo_contact_number'] =='' ) {
									
								}
								else{
?>
<?php if($event['eo_contact_name']<>'' OR $event['eo_name']<>''){$strip = '&nbsp;&#8209;&nbsp;' ;}else{$strip ='' ;}  ?>

								<p class="border-orange">Hubungi :&nbsp;
								<?php echo $event['eo_contact_name']<>''?"<b>".$event['eo_contact_name']."</b>":"<b>".$event['eo_name']."</b>" ?><?php echo $event['eo_email']<>''?$strip.$event['eo_email']:'' ; ?><?php echo $event['eo_contact_number']<>''?' | '.$event['eo_contact_number']:'' ; ?>
								</p>
<?php									
									} ?>
								
								<p class="border-orange socmed">
								Tautan :&nbsp;&nbsp;&nbsp;
<?php					
								if ($event['eo_facebook']<>'') {
?>
<a title="facebook" href="<?php echo $event['eo_facebook'] ?>" target="_blank"><i class="fa fa-facebook"></i></a>&nbsp;&nbsp;&nbsp;
<?php		                          		                      
		                        }
?>		                        

<?php					
								if ($event['eo_instagram']<>'') {
?>
<a title="instagram" href="<?php echo $event['eo_instagram'] ?>" target="_blank"><i class="fa fa-instagram"></i></a>&nbsp;&nbsp;&nbsp;
<?php		                          		                      
		                        }
?>

<?php					
								if ($event['eo_twitter']<>'') {
?>
<a title="twitter" href="<?php echo $event['eo_twitter'] ?>" target="_blank"><i class="fa fa-twitter"></i></a>&nbsp;&nbsp;&nbsp;
<?php		                          		                      
		                        }
?>

<?php					
								if ($event['eo_website']<>'') {
?>
<a title="website" href="<?php echo $event['eo_website'] ?>" target="_blank"><i class="fa fa-external-link"></i></a>&nbsp;&nbsp;&nbsp;
<?php		                          		                      
		                        }
?>																											
								</p>
							</div>
						</div>
						<p><?php echo $event['event_description'] ?></p>						
						<p><i><?php echo $event['event_more_info'] ?></i></p>						
														
			<span class="addtocalendar atc-style-icon atc-style-menu-wb" id="atc_icon_calbw1" data-on-button-click="	atcButtonClick" data-calendars="Google Calendar, iCalendar, Outlook" data-on-calendar-click="atcCalendarClick">
                    <a class="atcb-link">
                        Simpan Acara Ini
                    </a>
                    <var class="atc_event">
                        <var class="atc_date_start"><?php echo date('Y-m-d',strtotime($event['event_start_date'])) ?> <?php echo $event['event_start_time'] ?></var>
                        <var class="atc_date_end"><?php echo date('Y-m-d',strtotime($event['event_finish_date'])) ?> <?php echo $event['event_finish_time'] ?></var>
                        <var class="atc_timezone">Asia/Jakarta</var>
                        <var class="atc_title"><?php echo $event['event_title'] ?></var>
                        <var class="atc_description"><?php echo $event['event_description'] ?>
                        <?php echo "\n\n" ?><?php echo $event['event_description_english'] ?></var>
                        <var class="atc_location"><?php echo $event['event_location'] ?> <?php echo $event['event_detail_address'] ?></var>
                        <var class="atc_organizer"><?php echo $event['eo_name'] ?></var>
                        <var class="atc_organizer_email"><?php echo $event['eo_email'] ?></var>
                    </var>
            </span>
							<br />
							<br />
							<span class="text-orange">Acara ini diposting oleh:</span> 
							<?php echo $event['event_input_by']=='promotor'?'<a href="author.php?id='.$member['id'].'">'.$member['full_name'].'</a>':'Spektakel' ?>	
							
						</p>
					</div>
					
<!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_inline_share_toolbox"></div>

<br><br>
					

					<div class="post-tag">Tags : 
<?php
					 $replace = str_replace(' ', '',$event['event_tag']);
	 				 $tag =  explode('#', $replace);
			 		 foreach ($tag as $word) {
?>
					<a href="search.php?search_bawah_slider=<?php echo $word ?>"><span class="label label-default"><?php echo $word ?></span></a>
<?php
			 		 }

?>					 
					</div>
					<div class="content-ruler-2">&nbsp;</div>
				</div>
				<div class="col-md-1 col-sm-1">&nbsp;</div>
				<div class="col-md-4 col-sm-4">
					<div class="td-block-title-wrap"><h4 class="block-title text-uppercase"><span>Posting Terkait</span></h4>
					</div>
					<?php
if ($event['event_tag']<>'') {

	 $replace = str_replace(' ', '',$event['event_tag']);
	 $tag =  explode('#', $replace);

	 $i = 0;
     $len = count($tag);
     $len."---" ;

     $blabla_satu = '';
     $blabla_dua = '';

     if ($len>1) {
     	$blabla_satu = ' AND ( ';
     	$blabla_dua = ' ) ';
     }
     
     $sql = "SELECT * FROM event WHERE event_status = 'DISETUJUI' $blabla_satu ";

	 foreach ($tag as $word) {
	 			

	 			if ($i == 0) {
	 				$sql .= '';
	 			}
	 			else if ($i == $len - 1) {
			        $sql .= " event_tag LIKE '%".$word."%' ";
			    }
			    else{
			    	
			    	$sql .= " event_tag LIKE '%".$word."%' OR ";
			    }
			    
			    $i++;		
				
			}
	 

	 $sql .= " OR event_category = '".$event['event_category']."' $blabla_dua AND event_id <> '$id' AND event_start_date >= now() 
	 		   ORDER BY event_start_date LIMIT 0,5 ";		
				
				$query = mysqli_query($con,$sql);
				if (mysqli_num_rows($query)>0) 
				{
?>
				
<?php				
					while($event_terkait = mysqli_fetch_assoc($query))
					{		
?>
					<div class="media">
						<div class="media-left hidden-sm">
							<a href="detail.php?id=<?php echo $event_terkait['event_id'] ?>"><img class="cover media-object" src="images/events/<?php echo $event_terkait['event_image'] ?>" /></a>
						</div>
						<div class="media-body">
							<a href="detail.php?id=<?php echo $event_terkait['event_id'] ?>"><h4 class="media-heading"><?php echo truncate($event_terkait['event_title'],35) ?></h4></a>
							<span class="media-date"><?php echo hesa_date_singkat($event_terkait['event_start_date'],$event_terkait['event_finish_date']) ?></span>
							<br>
							<span class="media-date"><?php echo $event_terkait['event_city'] ?></span>
						</div>
					</div>
<?php
					}					
				}	
	}							
?>	

				</div>
			</div>
			<p>&nbsp;</p><p>&nbsp;</p>
		</div>
		<div class="clearfix"></div>
		<!-- START FOOTER  -->
<?php
		require_once('part/footer.php');
?>
		<!-- END FOOTER -->
	</div>
	<!-- START MODAL LOGIN  -->
<?php
		require_once('part/modal_login.php');
?>
		<!-- END MODAL LOGIN -->

	<a href="#0" class="cd-top">Top</a>

	<!-- Javascript -->
	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/jquery.easing.1.3.min.js" type="text/javascript"></script>
	<script src="js/moment.js" type="text/javascript"></script>
	<script src="js/owl.carousel.min.js" type="text/javascript"></script>
	<script src="js/jquery.superslides.min.js" type="text/javascript"></script>
	<script src="js/wow.min.js" type="text/javascript"></script>
	<script src="js/jquery.sidr.min.js" type="text/javascript"></script>
	<script src="js/jquery.uploadPreview.min.js" type="text/javascript"></script>
	<script src="js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
	<script src="js/cropper.min.js" type="text/javascript"></script>
	<script src="js/main.js" type="text/javascript"></script>
    <script type="text/javascript">(function () {
            if (window.addtocalendar)if(typeof window.addtocalendar.start == "function")return;
            if (window.ifaddtocalendar == undefined) { window.ifaddtocalendar = 1;
                var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
                s.type = 'text/javascript';s.charset = 'UTF-8';s.async = true;
                s.src = ('https:' == window.location.protocol ? 'https' : 'http')+'://addtocalendar.com/atc/1.5/atc.min.js';
                var h = d[g]('body')[0];h.appendChild(s); }})();
    </script>

<!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58145f3bf05cdad4"></script> 

</body>
</html>