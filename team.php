<?php
	require_once('config/koneksi.php');
	require_once('config/potong_kata.php');
	require_once('config/fungsi_tgl.php');	
?>
<!DOCTYPE html>
<html lang="en">
<head>
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


	<style type="text/css">
		.cover {
			  object-fit: cover;
			  width: 300px;
			  height: 300px;
			}
	</style>

</head>
<body>
	<div class="wrapper bg-grey">
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
				<div class="col-md-12 title">
					<h1>Tim <span class="blue">Spektakel</span></h1>
				</div>
				<div class="clearfix">&nbsp;</div>
				<div class="col-md-3 col-sm-3">
					<div class="pages-side">
						<ul class="list-unstyled">
							<li><a href="about.php?id=1">Bagaimana kerjanya</a></li>
							<li><a href="about.php?id=1#kontribusi">Kontribusi Kegiatan</a></li>
							<li><a href="about.php?id=3">Layanan Kami</a></li>
							<li><a href="team.php">Tim</a></li>							
						</ul>
					</div>
				</div>
				<div class="col-md-9 col-sm-9 content-detail team">
					<div class="row">
<?php
					$no = 1;
					$sql = "SELECT * FROM team";
					$query = mysqli_query($con,$sql);
					while ($team = mysqli_fetch_assoc($query)) {
?>
					<div class="col-md-4 col-sm-6 padding-bottom-10">
						<div class="team-box">
							<a href="javascript:void(0)" data-toggle="modal" data-target="#avatar-modal<?php echo $no ?>">
								<div class="team-image"><img src="images/team/<?php echo $team['team_image'] ?>" class="img-responsive cover" /></div>
								<div class="team-caption">
									<h2><?php echo $team['team_name'] ?></h2>
									<h3><?php echo $team['team_position'] ?></h3>
								</div>
							</a>
						</div>
					</div>
<?php				
					$no++;		
					}
?>

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

<?php
					$no = 1;
					$sql = "SELECT * FROM team";
					$query = mysqli_query($con,$sql);
					while ($team = mysqli_fetch_assoc($query)) {
?>					
	<div class="modal fade" id="avatar-modal<?php echo $no ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabelAvatar" aria-hidden="true" style="display: none;">
    	<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" align="center">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span class="fa fa-times-circle-o" aria-hidden="true"></span>
					</button>
				</div>
				<div class="modal-detail">
					<div class="images text-center"><img src="images/team/<?php echo $team['team_image'] ?>" class="img-responsive" /></div>
					<div class="title"><?php echo $team['team_name'] ?></div>
					<p><?php echo $team['team_position'] ?></p>
					<p><i><?php echo $team['team_email'] ?></i></p>
					<p><?php echo $team['team_content'] ?></p>
				</div>
			</div>
		</div>
	</div>

<?php				
					$no++;		
					}
?>
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