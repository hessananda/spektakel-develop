<?php
	require_once('config/koneksi.php');
	require_once('config/potong_kata.php');
	require_once('config/fungsi_tgl.php');	
	session_start();
	$id=1;
	if (isset($_GET['id'])) {
		$id=$_GET['id'];
	}

					if (isset($_SESSION['userid']) AND isset($_SESSION['username']) AND isset($_SESSION['full_name']) AND isset($_SESSION['password']) ) {

						$userid = $_SESSION['userid'] ;
						$username = $_SESSION['username'] ;
						$full_name =  $_SESSION['full_name'] ;
						$password = $_SESSION['password'] ;
					}
					else{
						$userid = '';
						$username = '';
						$full_name = '';
						$password = '';
					}

					$sql = "SELECT * FROM member WHERE id = '".$userid."'
							AND email = '".$username."' 
							AND full_name = '".$full_name."'
							AND password =  '".$password."'
							AND status = '1'
							";
					$query = mysqli_query($con,$sql);
					$count = mysqli_num_rows($query);

					if (!isset($_SESSION['userid']) AND !isset($_SESSION['username']) AND !isset($_SESSION['full_name']) AND !isset($_SESSION['password']) AND $count > 1 ) {

						$link = '<a href="javascript:void(0)" id="btn-login-modal" data-toggle="modal" data-target="#login-modal" style="color:#43A7F4">mendaftar lebih dulu</a>';						
									
					}
					else{
						$link = 'mendaftar lebih dulu';
						
					}
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
					<h1>Kebijakan Spektakel</h1>
				</div>
				<div class="clearfix">&nbsp;</div>
				<div class="col-md-3 col-sm-3">
					<div class="pages-side">
						
						<ul class="list-unstyled">
							<li><a href="#siapakami">Siapa Kami</a></li>
							<li><a href="#kebijakankami">Kebijakan Kami</a></li>
							<li><a href="#dataanda">Data Anda</a></li>
							<li><a href="#cookies">Cookies</a></li>
							<li><a href="#ipaddress">Internet Protocol Address</a></li>		
							<li><a href="#lokasi">Lokasi</a></li>		
							<li><a href="#bantuan">Bantuan</a></li>									
						</ul>
					</div>
				</div>
				<div class="col-md-9 col-sm-9 content-detail">
					
					<h2 class="text-uppercase" id="siapakami">SIAPA KAMI</h2>
					<p>Spektakel adalah platform direktor acara seni budaya nusantara. Kami mengkurasi beragam acara yang dihimpun dari para pelaku seni budaya dari kota besar hingga pelosok desa. Informasi seni budaya kami sajikan dalam kemasan yang ringkas, efektif, dan lengkap.</p>
					<p>Spektakel bertujuan mewabahkan acara seni budaya nusantara agar semarak dan berkelanjutan. Kami terbuka bekerja sama dalam semua lini kerja.</p>
					<h2 class="text-uppercase" id="kebijakankami" style="margin-top:60px;">KEBIJAKAN KAMI</h2>
					<p>Kami menghargai privasi Anda. Bacalah kebijakan ini dengan teliti dan tuntas. Dengan memakai layanan Spektakel Anda dianggap menyetujui kebijakan privasi ini. Jika Anda tak berkenan, Anda bisa meninggalkan Spektakel.</p>
					<p>Kami mengumpulkan data Anda, Namun bukan untuk kami jual tetapi digunakan untuk meningkatkan layanan Spektakel agar makin sesuai dengan kebutuhan Anda.</p>
					<h2 class="text-uppercase" id="dataanda" style="margin-top:60px;">DATA ANDA</h2>
					<p>Data yang anda isi dalam formulir pendaftaran kami simpan. kami gunakan untuk mengoptimalkan layanan Spektakel</p>		
					<h2 class="text-uppercase" id="cookies" style="margin-top:60px;">COOKIES</h2>
					<p>Pada umumnya browser manaruh cookies di dalam perangkat pengguna. Tujuannya, untuk mencatat atau melacak informasi tentang pengguna. Kami mengunakan cookies untuk meningkatkan pengalaman pengguna.</p>
					<p>Anda bisa mengaktifkan atau menanggalkan cookies. Namun, jika anda tanggalkan, sebagian dari situs ini tidak bisa berfungsi dengan baik.</p>
					<h2 class="text-uppercase" id="ipaddress" style="margin-top:60px;">INTERNET PROTOCOL ADDRESS</h2>
					<p>Kami penyimpan internet protocol address untuk mengetahui lokasi Anda. Juga layanan internet yang Anda gunakan.</p>
					<h2 class="text-uppercase" id="lokasi" style="margin-top:60px;">LOKASI</h2>
					<p>Jika Anda mengaktifkan lokasi, kami mendeteksi lokasi Anda, Bukan untuk memantau keberadaan Anda, tapi untuk memberikan informasi seni budaya di sekitar Anda.</p>
					<h2 class="text-uppercase" id="bantuan" style="margin-top:60px;">BANTUAN</h2>
					<p><b>Apa itu Spektakel ?</b></p>
					<p>Spektakel adalah platform informasi seni-budaya nusantara. Tempat di mana Anda bisa memperoleh informasi kegiatan seni-budaya.</p>
					<p><b>Bagaimana caranya untuk ikut mengisi info kegiatan seni-budaya?</b></p>
					<p>Anda harus <?php echo $link ?>.</p>
					<p><b>Saya hanya ingin membaca informasi di Spektakel.id haruskah saya mendaftar ?</b></p>
					<p>Tenang, Anda bebas menikmati informasi di Spektakel tanpa harus mendaftar. Silahkan telusuri <a href="all.php" style="color:#43A7F4">info seni-budaya</a> kegemaran Anda.</p>
					<p><b>Foto saya dipakai oleh seseorang tanpa izin dan diunggah di Spektakel. Bagaimana saya meminta pertanggungjawaban Spektakel ?</b></p>
					<p>Segala materi yang menyangkut hak cipta, adalah tangung jawab pengunggah. Spektakel tak bertangung jawab atas materi yang mengandung sengketa hak cipta.</p>
					<p><b>Kegiatan saya dimasukkan ke dalam Spektakel tapi informasinya salah. Ke mana saya harus menghubungi ?</b></p>
					<p>Sila hubungi kami di <a style="color:#43A7F4" href="mailto:kegiatan@spektakel.id" class="blue">kegiatan@spektakel.id</a></p>
					<p><b>Saya adalah penyelenggara kegiatan seni budaya, ingin berinterkasi lebih dalam dengan Spektakel. Ke mana saya harus menghubungi ?</b></p>
					<p>Sila hubungi kami di <a style="color:#43A7F4" href="mailto:kegiatan@spektakel.id" class="blue">kegiatan@spektakel.id</a></p>				
					<br>
					<p>Jika masih ada yang kurang jelas, hubungi kami di <a style="color:#43A7F4" href="mailto:kontak@spektakel.id">kontak@spektakel.id</a></p>				
					
					<br><br>

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