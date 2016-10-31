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
?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<style type="text/css">
		.cover {
			  object-fit: cover;
			  width: 145px;
			  height: 100px;
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
				<div class="col-md-12"><div class="content-ruler">&nbsp;</div></div>
				<div class="col-md-7 col-sm-7">
					<div class="td-block-title-wrap"><h4 class="block-title text-uppercase"><span>Posting Terbaru</span></h4></div>
					<div class="row">
						<div class="col-md-12">
							<div class="row">

<?php
				  // zebra pagination
			      $records_per_page = 6;
			      require 'config/Zebra_Pagination/Zebra_Pagination.php';
			      $pagination = new Zebra_Pagination();

			        $MySQL = "SELECT
			                  SQL_CALC_FOUND_ROWS
			                  *
			                  FROM
			                      event
			                  WHERE 
			                       event_status = 'DISETUJUI' AND event_start_date >= now()
			                       AND event_input_by = 'promotor' AND id_user_yang_input = '".$_SESSION['userid']."'
			                  ORDER BY event_start_date
			                  LIMIT ". (($pagination->get_page() - 1) * $records_per_page) . ', ' . $records_per_page."";

			            // if query could not be executed
			            if (!($result = @mysqli_query($con,$MySQL))) {
			            	// stop execution and display error message
			            	die(mysqli_error());
			            }
			        // fetch the total number of records in the table
			        $rows = mysqli_fetch_assoc(mysqli_query($con,'SELECT FOUND_ROWS() AS rows'));
			        // pass the total number of records to the pagination class
			        $pagination->records($rows['rows']);
			        // records per page
			        $pagination->records_per_page($records_per_page);
			        // $query = mysqli_query($con,$sql);
			        $count = mysqli_num_rows($result);
			        if ($count<1) {
			        	echo 'tidak ada posting terbaru';
			        }

			        while ($event = mysqli_fetch_assoc($result)) {                   
			        $date=strtotime($event['event_start_date']);
					if($event['event_input_by']=='promotor'){
			    		$member = mysqli_fetch_assoc(mysqli_query($con,"SELECT full_name FROM member m WHERE m.id = '".$event['id_user_yang_input']."' ")) ;
			    	}
?> 

								<div class="col-md-4 col-sm-6 padding-10">
									<div class="item-first" style="background-image:url('images/events/<?php echo $event['event_image'] ?>');">
										<div class="item-first-inner-3">
											<a href="detail.php?id=<?php echo $event['event_id'] ?>" class="item-overlay">&nbsp;</a>
											<div class="item-category"><a href="detail.php?id=<?php echo $event['event_id'] ?>"><?php echo $event['event_category'] ?></a></div>
											<div class="item-info">
												<div class="item-title item-title-listpost"><h3><a href="detail.php?id=<?php echo $event['event_id'] ?>"><?php echo $event['event_title'] ?></a></h3></div>
												<span class="item-created hidden-sm hidden-xs"><?php echo hesa_date_singkat($event['event_start_date'],$event['event_finish_date']) ?></span>
												<div class="item-author">By <!--a rel="author" href="author.php?id="--><?php echo $event['event_input_by']=='promotor'?$member['full_name']:'Spektakel' ?><!--/a--></div>
											</div>
										</div>
									</div>
								</div>
<?php
					}
?>								
					
							</div>
						</div>
						<div class="col-md-12 margin-20 text-center">
							<div class="text-center">
								<nav aria-label="pagination">
									<ul class="pagination">
<?php										
										$pagination->render();
?>										
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-1 col-sm-1">&nbsp;</div>
				<div class="col-md-4 col-sm-4">
					<div class="td-block-title-wrap"><h4 class="block-title text-uppercase"><span>Posting Lampau</span></h4></div>
<?php
 					$sql = "SELECT			                  
			                  *
			                  FROM
			                      event
			                  WHERE 
			                       event_status = 'DISETUJUI' AND event_start_date <= now()
			                       AND event_input_by = 'promotor' AND id_user_yang_input = '".$_SESSION['userid']."'
			                  ORDER BY event_start_date
			                  LIMIT 0,5";
			        $query = mysqli_query($con,$sql);

			        $count = mysqli_num_rows($query);
			        if ($count<1) {
			        	echo 'tidak ada posting lampau';
			        }
			        while ($event_terkait = mysqli_fetch_assoc($query)) {
?>
						<div class="media">
						<div class="media-left hidden-sm">
							<a href="detail.php?id=<?php echo $event_terkait['event_id'] ?>"><img class="cover" class="media-object" src="images/events/<?php echo $event_terkait['event_image'] ?>" /></a>
						</div>
						<div class="media-body">
							<a href="detail.php?id=<?php echo $event_terkait['event_id'] ?>"><h4 class="media-heading"><?php echo $event_terkait['event_title'] ?></h4></a>
							<span class="media-date"><?php echo hesa_date_singkat($event['event_start_date'],$event['event_finish_date']) ?></span>
						</div>
					</div>
<?php			        	
			        }

?>					

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