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
											<input name="search_bawah_slider" type="text" class="form-control input-search" placeholder="Cari acara, tempat, dan genre" />
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

<?php
	  // zebra pagination
      $records_per_page = 8;
      require 'config/Zebra_Pagination/Zebra_Pagination.php';
      $pagination = new Zebra_Pagination();

        $MySQL = "SELECT
                  SQL_CALC_FOUND_ROWS
                  *
                  FROM
                      event
                  WHERE 
                       event_status = 'DISETUJUI' /* AND event_finish_date >= now() */
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
        while ($event = mysqli_fetch_assoc($result)) {                   
        $date=strtotime($event['event_start_date']);
		if($event['event_input_by']=='promotor'){
    		$member = mysqli_fetch_assoc(mysqli_query($con,"SELECT full_name FROM member m WHERE m.id = '".$event['id_user_yang_input']."' ")) ;
    	}
          ?>  

						<div class="col-md-3 col-sm-6 padding-10">
							<div class="item-first" style="background-image:url('images/events/<?php echo $event['event_image'] ?>');">
								<div class="item-first-inner-2">
									<a href="detail.php?id=<?php echo $event['event_id'] ?>" class="item-overlay">&nbsp;</a>
									<div class="item-category"><a href="detail.php?id=<?php echo $event['event_id'] ?>"><?php echo $event['event_category'] ?></a></div>
									<div class="item-info">
										<div class="item-title"><h3><a href="detail.php?id=<?php echo $event['event_id'] ?>"><?php echo $event['event_title'] ?></a></h3></div>
										<span class="item-created"><?php echo hesa_date_singkat($event['event_start_date'],$event['event_finish_date']) ?></span>
										<div class="item-author">By <a rel="author" href="author.php"><?php echo $event['event_input_by']=='promotor'?$member['full_name']:'Spektakel' ?></a></div>
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
							// render the pagination links
							$pagination->render();
							?><!-- 
								<li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true" class="fa fa-angle-left"></span></a></li>
								<li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
								<li><a href="#" aria-label="Next"><span aria-hidden="true" class="fa fa-angle-right"></span></a></li> -->
							</ul>
						</nav>
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