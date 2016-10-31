<?php
	require_once('config/koneksi.php');
	require_once('config/potong_kata.php');
	require_once('config/fungsi_tgl.php');	
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Spektakel.id</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Seni. Budaya. Nusantara." />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Stylesheet -->
	<meta property="og:image" content="https://2.bp.blogspot.com/-mDX-06WkzMw/WASL_FUZhUI/AAAAAAAAHhk/NPaS5uFj8acoXlOyNwLATocBo_I0g85ywCLcB/s1600/kudalumping.jpg">
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
	<link rel="image_src" href="https://2.bp.blogspot.com/-mDX-06WkzMw/WASL_FUZhUI/AAAAAAAAHhk/NPaS5uFj8acoXlOyNwLATocBo_I0g85ywCLcB/s1600/kudalumping.jpg"/>
	<link href="images/favicon.png" rel="shortcut icon" />
	
</head>
<body>
	<a href="#0" class="cd-bottom">Bottom</a>

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


<!-- START SLIDER -->
			<div id="slides">
			  	<ul class="slides-container">			  	
<?php 
      $slider_query = mysqli_query($con,"SELECT * from slider ORDER BY slider_id"); 
      while ($slider = mysqli_fetch_assoc($slider_query)) {
?>
        			<li>
				      	<img src="images/slider/<?php echo $slider['slider_image'] ?>" alt="">
				      	<div class="overlay"></div>
				      	<div class="container slider-content-wrap">
			      			<div class="row">
			      				<div class="col-md-12 text-center">

								<span class="slideribbon"><?php echo $slider['slider_content'] ?></span>

			        				<h1 class="wow slideInLeft" data-wow-duration="1.8s" data-wow-delay=".6s"><?php echo $slider['slider_title'] ?></h1>
			        				<h2 class="wow fadeInDown" data-wow-duration="1.8s" data-wow-delay=".6s"><?php echo $slider['slider_button'] ?></h2><br>
			        				<a data-wow-duration="1.8s" data-wow-delay=".9s" target="_blank" href="<?php echo $slider['slider_link'] ?>" class="wow fadeInUp btn btn-orange btn-lg btn-spek text-uppercase text-small">Lihat Selengkapnya</a>
			        				<!-- <h3 class="wow fadeInUp" data-wow-duration="1.8s" data-wow-delay=".9s"><a href="all.php" class="btn btn-orange btn-lg btn-spek text-uppercase text-small">Ini Button</a></h3> -->
			        			</div>	
			        		</div>		
			      		</div>
				    </li>
<?php
      }
?>
			  	</ul>
			</div>
<!-- END SLIDER -->

		</header>
		<div class="clearfix"></div>
		<div class="container content" id="content">
			<div class="row">
				<div class="col-md-12 main-title text-center">
					<h1>Temukan Acaramu</h1>
					<h2>Kegiatan Seni Budaya Nusantara</h2>
				</div>
				<div class="col-md-12 margin-20 text-center">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<form method="post" action="search.php">
								<div class="row">
									<div class="col-md-7 col-sm-6">
										<div class="form-group">
											<input name="search_bawah_slider" type="text" class="form-control input-search" placeholder="Cari acara, tempat, dan kategori" />
										</div>
									</div>
									<div class="col-md-4 col-sm-6">
										<div class="form-group">
											<div class="select-style">
												<select name="bulan">
													<option value="all">Semua Bulan</option>
													<option value="1">Januari</option>
													<option value="2">Februari</option>
													<option value="3">Maret</option>
													<option value="4">April</option>
													<option value="5">Mei</option>
													<option value="6">Juni</option>
													<option value="7">Juli</option>
													<option value="8">Agustus</option>
													<option value="9">September</option>
													<option value="10">Oktober</option>
													<option value="11">November</option>
													<option value="12">Desember</option>
												</select>
											</div>
										</div>
									</div>
									<div class="col-md-1 col-sm-12">
										<button class="btn btn-orange btn-search"><i class="fa fa-search"></i></button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-12 margin-20">
					<div class="row">

<!-- div untuk event looping -->
<?php 
			$event_data = mysqli_query($con,"SELECT * FROM event e 
									   INNER JOIN event_layout el ON e.event_id = el.event_layout_event_id 
									   INNER JOIN event_organizer eo ON eo.eo_id = e.event_organizer_id 
									   ORDER BY el.event_layout_urutan ") ;
			$no = 1;
            while ($event = mysqli_fetch_assoc($event_data)) {
            	if($event['event_input_by']=='promotor'){
            		$member = mysqli_fetch_assoc(mysqli_query($con,"SELECT full_name FROM member m WHERE m.id = '".$event['id_user_yang_input']."' ")) ;
            	}
?>
						<div class="col-md-4 col-sm-6 padding-10">
							<div class="item-first" style="background-image:url('images/events/<?php echo $event['event_image'] ?>');">
								<div class="item-first-inner">
									<a href="detail.php?id=<?php echo $event['event_id'] ?>" class="item-overlay">&nbsp;</a>
									<div class="item-category"><a href="detail.php?id=<?php echo $event['event_id'] ?>"><?php echo $event['event_category'] ?></a></div>
									<div class="item-info">
										<div class="item-title"><h3><a href="detail.php?id=<?php echo $event['event_id'] ?>"><?php echo $event['event_title'] ?></a></h3></div>
										<span class="item-created"><?php echo hesa_date_singkat($event['event_start_date'],$event['event_finish_date']) ?></span>
										<div class="item-author"><?php echo $event['event_city'] ?></div>
									</div>
								</div>
							</div>
						</div>
<?php
            $no++;
            } // ending looping event
?>    

					</div>
				</div>
				<div class="col-md-12 margin-20 text-center">
					<a href="all.php" class="btn btn-orange btn-lg btn-spek text-uppercase text-small">Lihat Semua Kegiatan</a>
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