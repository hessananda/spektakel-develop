<?php

if (!isset($_GET['id']) ) {
?>
			<meta http-equiv="refresh" content="0; url=index.php" />
<?php		
			}
?>

<?php
	require_once('config/koneksi.php');
	require_once('config/potong_kata.php');
	require_once('config/fungsi_tgl.php');		
	
	session_start();
			
			$id = '';	
			@$id = $_GET['id'];


	$sql = "SELECT * FROM member WHERE id = '".$id."'
			AND status = 1 ";
	$query = mysqli_query($con,$sql);
	
	$count = mysqli_num_rows($query) ;
	if ($count < 1) {
?>		
	<meta http-equiv="refresh" content="0; url=index.php" />
<?php		
	}

	$member = mysqli_fetch_assoc($query);

	$draft_active = '';	
	$ditinjau_active = '';
	$disetujui_active = '';
	$ditolak_active = '';


	if (isset($_REQUEST['tab'])) {
		$tab = $_REQUEST['tab'] ;		
		
		if ($tab=='draft') {
			$draft_active = 'active';			
		}		
		elseif ($tab=='ditinjau') {
			$ditinjau_active = 'active';			
		}
		elseif ($tab=='disetujui') {
			$disetujui_active = 'active';			
		}
		elseif ($tab=='ditolak') {
			$ditolak_active = 'active';			
		}		
	}
	else{
		$draft_active = 'active';		
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<style type="text/css">
		.cover {
			  object-fit: cover;
			  width: 100%;
			  height: 100%;
			}
	</style>

	<title>Spektakel.id</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="e-commerce site well design with responsive view." />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Stylesheet -->
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
</head>
<body>
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
			<div id="blank-slides">&nbsp;</div>
		</header>
		<div class="clearfix"></div>
		<div class="container content">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="title"><h1><?php echo $member['full_name'] ?></h1></div>
					<div class="author_details clearfix">
						<div class="f_left">
							<div>
<?php 
							if ($member['photo']=='') {
?>
							<img src="images/member.png" class="img-responsive" width="165" height="165" />
<?php								
							}
							else{
?>
							<img src="images/member/<?php echo $member['photo'] ?>" class="img-responsive" width="165" height="165" />
<?php
							}
?>
							</div>
						</div>
						<div>
							<p><?php echo $member['description']; ?></p>
							<div class="widget_social_icons type_2 type_border clearfix">
								<ul>
								<?php					
								if ($member['website']<>'') {
								?>
								<li class="website"><span class="tooltip">Website</span><a href="<?php echo 'http://'. str_replace('https://', '', str_replace('http://','',$member['website'])) ?>" target="_blank" ><i class="fa fa-home"></i></a></li>
								<?php		                          		                      
										                        }
								?>		 

								<?php					
								if ($member['facebook']<>'') {
								?>
								<li class="facebook"><span class="tooltip">Facebook</span><a href="http://www.facebook.com/<?php echo $member['facebook'] ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
								<?php		                          		                      
										                        }
								?>		
								
								<?php					
								if ($member['twitter']<>'') {
								?>
								<li class="twitter"><span class="tooltip">Twitter</span><a href="http://www.twitter.com/<?php echo str_replace('@','',$member['twitter']) ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
								<?php		                          		                      
										                        }
								?>

								<?php					
								if ($member['instagram']<>'') {
								?>
								<li class="instagram"><span class="tooltip">Instagram</span><a href="http://www.instagram.com/<?php echo str_replace('@','',$member['instagram']) ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
								<?php		                          		                      
										                        }
								?>		

								<?php					
								if ($member['email']<>'') {
								?>
								<li class="envelope"><span class="tooltip">Email</span><a href="mailto:<?php echo $member['email'] ?>?Subject=Hai%20<?php echo $member['full_name'] ?>" target="_top" ><i class="fa fa-envelope-o"></i></a></li>
								<?php		                          		                      
										                        }
								?>		
									
								</ul>
							</div>
						</div>
					</div>
				</div>

		<div class="col-md-12" style="margin-top: 90px;">
				<h3>Posting Saya</h3>
				
			<div class="tabbable-panel" style="margin-bottom: 90px;">
				<div class="tabbable-line">
					<ul class="nav nav-tabs ">
						<li class="<?php echo $draft_active ?>">
							<a href="#tab_default_0" data-toggle="tab">
							Draft </a>
						</li>						
						<li class="<?php echo $ditinjau_active ?>">
							<a href="#tab_default_2" data-toggle="tab">
							Ditinjau </a>
						</li>
						<li class="<?php echo $disetujui_active ?>">
							<a href="#tab_default_3" data-toggle="tab">
							Disetujui </a>
						</li>
						<li class="<?php echo $ditolak_active ?>">
							<a href="#tab_default_4" data-toggle="tab">
							Ditolak </a>
						</li>						
					</ul>
				</div>
				<div class="tab-content">
					
					<div class="tab-pane <?php echo $draft_active ?>" id="tab_default_0">
						    <div class="row">
<?php
						    $events_draft = "SELECT e.*, eo.*, p.name province_name FROM event_draft e
							INNER JOIN event_organizer_draft eo ON e.event_organizer_id = eo.eo_id
							INNER JOIN provinces p ON e.event_province = p.id
							WHERE e.event_input_by = 'promotor' AND e.id_user_yang_input = '".$_SESSION['userid']."' 
							ORDER BY e.event_id DESC ";
							$draft_no = 1;
							$query = mysqli_query($con,$events_draft);
							while ($event = mysqli_fetch_assoc($query)) {							
?>
						    <!-- START LOOPING -->
							<div class="col-md-4 col-sm-6 padding-10">
							<div class="item-first" style="background-image:url('images/events/<?php echo $event["event_image"] ?>');">
								<div class="item-first-inner">
									<a href="javascript:void(0)" data-toggle="modal" data-target="#draft<?php echo $draft_no ?>" class="item-overlay">&nbsp;</a>
									<div class="item-category"><a href="javascript:void(0)" data-toggle="modal" data-target="#draft<?php echo $draft_no ?>" ><?php echo $event['event_category'] ; ?> </a></div>
									<div class="item-info">
										<div class="item-title"><h3><a href="javascript:void(0)" data-toggle="modal" data-target="#draft<?php echo $draft_no ?>" ><?php echo $event['event_title'] ; ?></a></h3></div>
										<span class="item-created"><?php echo hesa_date_singkat($event['event_start_date'],$event['event_finish_date']) ?></span>
										<div class="item-author">By <?php echo $_SESSION['full_name'] ?></div>
									</div>
								</div>
							</div>
							</div>
							<!-- END LOOPING -->
<?php

							$tanda ='draft'.$draft_no;
							include('config/modal_event.php');	

							$draft_no++;
							}
?>
	                        </div>
						</div>
														
						<div class="tab-pane <?php echo $ditinjau_active ?>" id="tab_default_2">
						    <div class="row">
<?php
						    $events_ditinjau = "SELECT e.*, eo.*, p.name province_name FROM event e
							INNER JOIN event_organizer eo ON e.event_organizer_id = eo.eo_id
							INNER JOIN provinces p ON e.event_province = p.id
							WHERE (e.event_status = 'DITINJAU' OR e.event_status = 'BELUM DIREVIEW') AND e.event_input_by = 'promotor' AND e.id_user_yang_input = '".$_SESSION['userid']."' 
							ORDER BY e.event_id DESC ";

							$query = mysqli_query($con,$events_ditinjau);
							$ditinjau_no = 1;							
							while ($event = mysqli_fetch_assoc($query)) {							
?>
						    <!-- START LOOPING -->
							<div class="col-md-4 col-sm-6 padding-10">
							<div class="item-first" style="background-image:url('images/events/<?php echo $event["event_image"] ?>');" >
								<div class="item-first-inner">
									<a href="javascript:void(0)" data-toggle="modal" data-target="#ditinjau<?php echo $ditinjau_no ?>" class="item-overlay">&nbsp;</a>
									<div class="item-category"><a href="javascript:void(0)" data-toggle="modal" data-target="#ditinjau<?php echo $ditinjau_no ?>"><?php echo $event['event_category'] ; ?></a>
									</div>
									<div class="item-info">
										<div class="item-title"><h3><a href="javascript:void(0)" data-toggle="modal" data-target="#ditinjau<?php echo $ditinjau_no ?>"><?php echo $event['event_title'] ; ?></a></h3>
										</div>
										<span class="item-created"><?php echo hesa_date_singkat($event['event_start_date'],$event['event_finish_date']) ?></span>
										<div class="item-author">By <?php echo $_SESSION['full_name'] ?></div>
									</div>
								</div>
							</div>
							</div>
							<!-- END LOOPING -->
<?php
							$tanda ='ditinjau'.$ditinjau_no;
							include('config/modal_event.php');	

							$ditinjau_no++;
							}
?>

                        </div>	
						</div>

						<div class="tab-pane <?php echo $disetujui_active ?>" id="tab_default_3">
						<div class="row">
<?php
						    $events_disetujui = "SELECT e.*, eo.*, p.name province_name FROM event e
							INNER JOIN event_organizer eo ON e.event_organizer_id = eo.eo_id
							INNER JOIN provinces p ON e.event_province = p.id
							WHERE e.event_status = 'DISETUJUI' AND e.event_input_by = 'promotor' AND e.id_user_yang_input = '".$_SESSION['userid']."' 
							ORDER BY e.event_id DESC ";
							$disetujui_no = 1;
							$query = mysqli_query($con,$events_disetujui);
							while ($event = mysqli_fetch_assoc($query)) {							
?>
						    <!-- START LOOPING -->
							<div class="col-md-4 col-sm-6 padding-10">
							<div class="item-first" style="background-image:url('images/events/<?php echo $event["event_image"] ?>');">
								<div class="item-first-inner">
									<a href="javascript:void(0)" data-toggle="modal" data-target="#disetujui<?php echo $disetujui_no ?>" class="item-overlay">&nbsp;</a>
									<div class="item-category"><a href="javascript:void(0)" data-toggle="modal" data-target="#disetujui<?php echo $disetujui_no ?>" ><?php echo $event['event_category'] ; ?></a></div>
									<div class="item-info">
										<div class="item-title"><h3><a href="javascript:void(0)" data-toggle="modal" data-target="#disetujui<?php echo $disetujui_no ?>" ><?php echo $event['event_title'] ; ?></a></h3></div>
										<span class="item-created"><?php echo hesa_date_singkat($event['event_start_date'],$event['event_finish_date']) ?></span>
										<div class="item-author">By <?php echo $_SESSION['full_name'] ?></div>
									</div>
								</div>
							</div>
							</div>
							<!-- END LOOPING -->
<?php							
							$tanda ='disetujui'.$disetujui_no;
							include('config/modal_event.php');	

							$disetujui_no++;
							}
?>
                        </div>
						</div>
						
						<div class="tab-pane <?php echo $ditolak_active ?>" id="tab_default_4">
						    <div class="row">
					<?php
						    $events_ditolak = "SELECT e.*, eo.*, p.name province_name FROM event e
							INNER JOIN event_organizer eo ON e.event_organizer_id = eo.eo_id
							INNER JOIN provinces p ON e.event_province = p.id
							WHERE e.event_status = 'DITOLAK' AND e.event_input_by = 'promotor' AND e.id_user_yang_input = '".$_SESSION['userid']."' 
							ORDER BY e.event_id DESC ";
							$ditolak_no = 1;
							$query = mysqli_query($con,$events_ditolak);
							while ($event = mysqli_fetch_assoc($query)) {							
?>
						    <!-- START LOOPING -->
							<div class="col-md-4 col-sm-6 padding-10">
							<div class="item-first" style="background-image:url('images/events/<?php echo $event["event_image"] ?>');">
								<div class="item-first-inner">
									<a href="javascript:void(0)" data-toggle="modal" data-target="#ditolak<?php echo $ditolak_no ?>" class="item-overlay">&nbsp;</a>
									<div class="item-category"><a href="javascript:void(0)" data-toggle="modal" data-target="#ditolak<?php echo $ditolak_no ?>" ><?php echo $event['event_category'] ; ?></a></div>
									<div class="item-info">
										<div class="item-title"><h3><a href="javascript:void(0)" data-toggle="modal" data-target="#ditolak<?php echo $ditolak_no ?>"><?php echo $event['event_title'] ; ?></a></h3></div>
										<span class="item-created"><?php echo hesa_date_singkat($event['event_start_date'],$event['event_finish_date']) ?></span>
										<div class="item-author">By <?php echo $_SESSION['full_name'] ?></div>
									</div>
								</div>
							</div>
							</div>
							<!-- END LOOPING -->
<?php
							$tanda ='ditolak'.$ditolak_no;
							include('config/modal_event.php');	

							$ditolak_no++;
							}
?>
					
                            </div>
						</div>
					</div>
				</div>
			</div>
	</div>


			</div>
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
</body>
</html>