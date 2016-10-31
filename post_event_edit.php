<?php
	require_once('config/koneksi.php');
	require_once('config/potong_kata.php');
	require_once('config/fungsi_tgl.php');	
	session_start();

    $id = $_GET['id'];

    $sql = "SELECT e.*, mem.full_name, eo.* FROM event e
    INNER JOIN event_organizer eo ON e.event_organizer_id = eo.eo_id
    INNER JOIN member mem ON e.id_user_yang_input = mem.id
    WHERE
    e.event_id = '$id'";
    
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
			<form action="part/post_event_action.php?menu=edit&id=<?php echo $event['event_id'] ?>" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-8 col-sm-6 title">
						<h1>Posting Kegiatan <!-- <div class="label label-draft">Draft</div> --></h1>
					</div>
					<div class="col-md-4 col-sm-6">						
						<a href="javascript:void(0)" onclick="preview()" class="btn btn-orange btn-spek btn-square" data-toggle="modal" data-target="#pratinjau">Pratinjau</a>
						<button  name="submit"  value="submit" id="submit1" class="btn btn-orange btn-spek btn-square" type="submit">Simpan</button>
						<br /><!-- <span>Terakhir di simpan pada 07/16/2016</span> -->
					</div>
					<div class="col-md-12"><div class="form-ruler">&nbsp;</div></div>
				</div>
				<div class="row">
					<div class="col-md-8 col-md-offset-2 form-content">
						<h2>Rincian Kegiatan</h2>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="input1">Jenis Kegiatan</label>
									<select name="event_category" id="input1" class="form-control input-post">
										<option <?php echo $event['event_category']=='' OR $event['event_category']=='0' ?'selected':'' ; ?> value="Budaya">Kategori Kegiatan</option>
										<option <?php echo $event['event_category']=='Budaya'?'selected':'' ; ?> value="Budaya">Budaya</option>
										<option <?php echo $event['event_category']=='Festival'?'selected':'' ; ?> value="Festival">Festival</option>
										<option <?php echo $event['event_category']=='Film'?'selected':'' ; ?> value="Film">Film</option>
										<option <?php echo $event['event_category']=='Musik'?'selected':'' ; ?> value="Musik">Musik</option>
										<option <?php echo $event['event_category']=='Permainan'?'selected':'' ; ?> value="Permainan">Permainan</option>
										<option <?php echo $event['event_category']=='Pertunjukan'?'selected':'' ; ?> value="Pertunjukan">Pertunjukan</option>
										<option <?php echo $event['event_category']=='Tradisi'?'selected':'' ; ?> value="Tradisi">Tradisi</option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="input2">Jenis Kegiatan</label>
									<select name="event_type" id="input2" class="form-control input-post">
									<option <?php echo $event['event_type']=='' OR $event['event_type']== 0  ?'selected':'' ; ?> value="gratis/free">Jenis Kegiatan</option>
										<option <?php echo $event['event_type']=='gratis/free' ?'selected':'' ; ?> value="gratis/free">Gratis</option>
										<option <?php echo $event['event_type']=='berbayar/paid' ?'selected':'' ; ?> value="berbayar/paid">Berbayar</option>
										<option <option <?php echo $event['event_type']=='keduanya/both' ?'selected':'' ; ?> value="keduanya/both">Gratis & Berbayar</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="input3">Judul</label>
							<input type="text" class="form-control input-post" id="input3" placeholder="" name="event_title" value="<?php echo $event['event_title'] ?>" />
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="input4">Lokasi</label>
									<input  name="event_location" type="text" class="form-control input-post" id="input4" placeholder="Contoh: Gedung Graha Bakti" value="<?php echo $event['event_location'] ?>" />
								</div>
							</div>
							<div class="col-md-8">
								<div class="form-group">
									<label for="input5">Alamat Detail</label>
									<input type="text" name="event_detail_address" class="form-control input-post" id="input5" placeholder=""  value="<?php echo $event['event_detail_address'] ?>" />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="input6">Kota</label>
									<input type="text" name="event_city" class="form-control input-post" id="input6" placeholder="" value="<?php echo $event['event_city'] ?>" />
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="input7">Provinsi</label>
									<input name="event_province" type="text" class="form-control input-post" id="input7" placeholder="" value="<?php echo $event['event_province'] ?>" />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<label for="input8">Tautan Google Maps</label>
									<input type="text" name="event_gmap_link" class="form-control input-post" id="input8" placeholder="https://goo.gl/maps/d3GFujwMHF42" value="<?php echo $event['event_gmap_link'] ?>" />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<label for="input8a">Tag Kegiatan</label>
									<input type="text" name="event_tag" class="form-control input-post" id="input8a" placeholder="#tari #topeng #kintamani"  value="<?php echo $event['event_tag'] ?>"/>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="input9">Tanggal Mulai</label>
									<input name="event_start_date" type="text" class="form-control input-post datepicker" id="input9" placeholder="00/00/0000" value="<?php echo $event['event_start_date'] ?>" />
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="input11">Jam Mulai</label>
									<input name="event_start_time" type="text" class="form-control input-post timepicker" id="input11" placeholder="00:00:00" value="<?php echo $event['event_start_time'] ?>" />
								</div>
							</div>							
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="input10">Tanggal Selesai</label>
									<input name="event_finish_date" type="text" class="form-control input-post datepicker" id="input10" placeholder="00/00/0000" value="<?php echo $event['event_finish_date'] ?>" />
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="input12">Jam Selesai</label>
									<input name="event_finish_time" type="text" class="form-control input-post timepicker" id="input12" placeholder="00:00:00" value="<?php echo $event['event_finish_time'] ?>" />
								</div>
							</div>
						</div>
						<div class="row" id="box-browse">
							<div class="col-md-4 col-sm-6" id="upload-image">
								<div class="form-group">
									<label for="input11">Gambar</label>
									<div id="image-preview" style="background-image: url('images/events/<?php echo $event['event_image'] ?>') ; ">
										<label for="image-upload" id="image-label">&nbsp;</label>
										<input type="file" name="image" value="<?php echo $event['event_image'] ?>" id="image-upload" />
									</div>
									<div class="text-center picture-option">
										<!-- <span><a href="javascript:void(0);" id="btn-crop" data-img="0">Sesuaikan</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="javascript:void(0);" id="btn-upload">Ubah</a></span> -->
										<br />
										<span>Ukuran Minimum 500 x 800 pixel</span>
									</div>
								</div>
							<div class="form-group">
							 		<label for="input3">Kredit Gambar</label>
							<input type="text" class="form-control input-post" id="input3" placeholder="" name="event_image_credit" value="<?php echo $event['event_image_credit'] ?>" />
						</div>
							</div>
							<div class="col-md-4 col-sm-6" id="crop-image" style="display:none;">
								<div class="form-group">
									<label for="input11">&nbsp;</label>
									<!-- Please read https://github.com/fengyuanchen/cropperjs/blob/master/README.md !-->
									<div class="image-user">
										<img id="imagecrop" src="" />
									</div>
									<div class="text-center picture-option">
										<!-- <span><a href="javascript:void(0);" id="btn-empty">Buang</a></span> -->
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-6 text-center btn-template" id="template-image">
								<a href="javascript:void(0)" class="btn btn-orange btn-spek btn-square" id="btn-template">Ambil dari Template</a>
							</div>
						</div>
						<div class="row" id="box-template" style="display:none;">
							<div class="col-md-12">
								<div class="form-group">
									<label for="input11b">Gambar</label>
								</div>
								<div class="row">
									<div class="box-img-template col-md-15 col-sm-6">
										<img src="images/events/template_budaya.png" class="img-responsive img-radio">
										<span>Budaya</span>
										<input value="template_budaya.png" name="template_image" type="checkbox" id="temp-1" class="hidden" <?php echo $event['event_image']=='template_budaya.png' ?'selected':'' ; ?> />
									</div>
									<div class="box-img-template col-md-15 col-sm-6">
										<img src="images/events/template_festival.png" class="img-responsive img-radio">
										<span>Festival</span>
										<input value="template_festival.png" name="template_image" type="checkbox" id="temp-2" class="hidden" <?php echo $event['event_image']=='template_festival.png' ?'selected':'' ; ?> />
									</div>
									<div class="box-img-template col-md-15 col-sm-6">
										<img src="images/events/template_film.png" class="img-responsive img-radio">
										<span>Film</span>
										<input value="template_film.png" name="template_image" type="checkbox" id="temp-3" class="hidden" <?php echo $event['event_image']=='template_film.png' ?'selected':'' ; ?> />
									</div>
									<div class="box-img-template col-md-15 col-sm-6">
										<img src="images/events/template_musik.png" class="img-responsive img-radio">
										<span>Musik</span>
										<input value="template_musik.png" name="template_image" type="checkbox" id="temp-4" class="hidden" <?php echo $event['event_image']=='template_musik.png' ?'selected':'' ; ?> />
									</div>
									<div class="box-img-template col-md-15 col-sm-6">
										<img src="images/events/template_permainan.png" class="img-responsive img-radio">
										<span>Permainan</span>
										<input value="template_permainan.png" name="template_image" type="checkbox" id="temp-5" class="hidden" <?php echo $event['event_image']=='template_permainan.png' ?'selected':'' ; ?> />
									</div>									
								</div>
								<div class="row">
									<div class="box-img-template col-md-15 col-sm-6">
										<img src="images/events/template_pertunjukan.png" class="img-responsive img-radio">
										<span>Pertunjukan</span>
										<input type="checkbox" value="template_pertunjukan.png" name="template_image" id="temp-6" class="hidden" />
									</div>
									<div class="box-img-template col-md-15 col-sm-6">
										<img src="images/events/template_tradisi.png" class="img-responsive img-radio">
										<span>Tradisi</span>
										<input type="checkbox" value="template_tradisi.png" name="template_image" id="temp-7" class="hidden" />
									</div>
								</div>
								<div class="text-center">
									<a href="javascript:void(0)" class="btn btn-orange btn-spek btn-square btn-small" id="btn-back-browse">Upload dari Komputer</a>
								</div>
							</div>
						</div>						


						<div class="col-md-12 form-ruler">&nbsp;</div>
						<div class="form-group">
							<label for="input14">Deskripsi Kegiatan (Bahasa Indonesia)</label>
							<textarea name="event_description" class="form-control input-text-post" id="input14" placeholder=""><?php echo $event['event_description'] ?></textarea>
						</div>						
						<div class="form-group">
							<label for="input14">Informasi Tambahan</label>
							<textarea name="event_more_info" class="form-control input-text-post" id="input15" placeholder=""><?php echo $event['event_more_info'] ?></textarea>
						</div>
						<div class="col-md-12 form-ruler">&nbsp;</div>
							
						<input type="hidden" name="event_organizer_id" value="<?php echo $event['event_organizer_id'] ?>">

						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="input15">Penyelenggara</label>
									<input type="text" name="eo_name" class="form-control input-post" id="input15" placeholder=""  value="<?php echo $event['eo_name'] ?>" />
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="input16">Website</label>
									<input name="eo_website" type="text" class="form-control input-post" id="input16" placeholder="" value="<?php echo $event['eo_website'] ?>" />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="input17">Telepon</label>
									<input name="eo_contact_number" type="text" class="form-control input-post" id="input17" placeholder="" value="<?php echo $event['eo_contact_number'] ?>" />
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="input18">Email</label>
									<input name="eo_email" type="text" class="form-control input-post" id="input18" placeholder="" value="<?php echo $event['eo_email'] ?>" />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="input19">Facebook</label>
									<input name="eo_facebook" type="text" class="form-control input-post" id="input19" placeholder="" value="<?php echo $event['eo_facebook'] ?>" />
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="input20">Twitter</label>
									<input name="eo_twitter" type="text" class="form-control input-post" id="input20" placeholder="" value="<?php echo $event['eo_twitter'] ?>" />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="input21">Instagram</label>
									<input name="eo_instagram" type="text" class="form-control input-post" id="input21" placeholder=""  value="<?php echo $event['eo_instagram'] ?>" />
								</div>
							</div>
						</div>
						<p>&nbsp;</p>
						<div class="checkbox">
							<label><input id="setuju" type="checkbox"> Saya menyetujui <a target="_blank" href="term.php">syarat dan ketentuan</a> yang berlaku.</label>
						</div>
						<p>&nbsp;</p>									

						<a href="javascript:void(0)" onclick="preview()" class="btn btn-orange btn-spek btn-square" data-toggle="modal" data-target="#pratinjau">Pratinjau</a>					

						<button id="submit" name="submit" value="submit" class="btn btn-orange btn-spek btn-square" type="submit">Simpan</button>
					</div>
				</div>
			</form>
			<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
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


<div class="modal fade" id="pratinjau" tabindex="-1" role="dialog" aria-labelledby="myModalLabelAvatar" aria-hidden="true" style="display: none;">
    	<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" align="center">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span class="fa fa-times-circle-o" aria-hidden="true"></span>
					</button>
				</div>
				<div class="modal-detail">				
					
			<div class="row">
				<div class="col-md-12 col-sm-12">

					<img class="cover" id="imej" src="images/events/<?php echo $event['event_image'] ?>">
					<div class="post-title">
						<h4 id="kategori" class="text-uppercase text-orange"></h4>
						<h1 id="title" class="text-uppercase"></h1>
					</div>
					<div class="post-detail">
						<div class="row">
							<div class="col-md-12">
								<p class="border-orange text-uppercase"><span id="tanggal_mulai"> 5 Agustus 2016 </span> |  <span id="jam_mulai">20:00</span> - <span id="jam_selesai">Selesai</span></p>
								<p id="type" class="border-orange text-uppercase">Gratis</p>
								<p class="border-orange text-uppercase"><span id="lokasi"></span>, <span id="alamat_detail" ></span> , <span id="kota"></span>, <span id="provinsi"></span>. <a href="https://goo.gl/maps/M8snsR47LDz" id="google_maps" target="_blank"><i>Peta</i></a></p>
								<p class="border-orange socmed">
									<a href="#" target="_blank"><i class="fa fa-facebook"></i> <span id="facebook">Dieng Culture Festival</span></a>&nbsp;&nbsp;&nbsp;
									<a href="#" target="_blank"><i class="fa fa-twitter"></i> <span id="twitter">@FestivalDieng</span></a>&nbsp;&nbsp;&nbsp;
									<a href="#" target="_blank"><i class="fa fa-dribbble"></i> <span id="website">www.dieng.id</span></a>
								</p>
							</div>
						</div>
						<p id="deskripsi">Jazzatazawan Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>						
						<p>						
						<p><i id="info_tambahan"></i></p>							
							<span class="text-orange">Acara ini diposting oleh:</span> <?php echo $_SESSION['full_name'] ; ?>
						</p>
					</div>
					
					<div class="post-tag">Tags :
					<span id="tags">
					
					</span>
					</div>
					<div class="content-ruler-2">&nbsp;</div>
				</div>
				<div class="col-md-1 col-sm-1">&nbsp;</div>
				
			</div>
			<p>&nbsp;</p><p>&nbsp;</p>
		
				</div>
			</div>
		</div>
	</div>

<script type="text/javascript">

      function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imej').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image-upload").change(function(){
            readURL(this);
        });
        
		$('#setuju').change(function () {
            $('#submit').prop("disabled", !this.checked);
            $('#submit1').prop("disabled", !this.checked);
        }).change()

        function hesananda(item, index) {
	    document.getElementById('tags').innerHTML = document.getElementById('tags').innerHTML + "<span class='label label-default'>"+ item + "</span>&nbsp;";
	    }
	

		function preview() {


		var d = document.getElementById("input1");
		var kategori = d.options[d.selectedIndex].text;

		var title = document.getElementById('input3').value ;
		var tanggal_mulai = document.getElementById('input9').value ;
		var tanggal_selesai = document.getElementById('input10').value ;
		var jam_mulai = document.getElementById('input11').value ;
		var jam_selesai = document.getElementById('input12').value ;
		
		var e = document.getElementById("input2");
		var type = e.options[e.selectedIndex].text;		
		
		var lokasi = document.getElementById('input4').value ;
		var alamat_detail = document.getElementById('input5').value ;	
		var kota = document.getElementById('input6').value ;
		var provinsi = document.getElementById('input7').value ;
		var facebook = document.getElementById('input19').value ;
		var twitter = document.getElementById('input20').value ;
		var website = document.getElementById('input16').value ;
		var deskripsi = document.getElementById('input14').value ;
		var info_tambahan = document.getElementById('input15').value ;

		var tag = document.getElementById('input8a').value ;

		var template_image = $('input[name="template_image"]:checked').val();
		var boxtemplate = document.getElementById('box-template').style ; 

		var bulan = ['bulan','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober',
				 	'November','Desember'];
		var _bulan = parseInt(tanggal_mulai.substr(5, 2),10);
		var _tanggal = parseInt(tanggal_mulai.substr(8, 2),10);
		var _tahun = parseInt(tanggal_mulai.substr(0, 4),10);	

		var bulan_indo = bulan[_bulan] ;

		var event_start = _tanggal + " " + bulan_indo + " " + _tahun;
		
		var tag_ = tag.replace(" ","");
		_tag = tag_.split("#");

		document.getElementById('kategori').innerText = kategori ;
		document.getElementById('title').innerText = title ;

		document.getElementById('tanggal_mulai').innerText = event_start ;
		document.getElementById('jam_mulai').innerText = jam_mulai ;
		document.getElementById('jam_selesai').innerText = jam_selesai ;

		document.getElementById('lokasi').innerText = lokasi ;
		document.getElementById('alamat_detail').innerText = alamat_detail ;
		document.getElementById('kota').innerText = kota ;
		document.getElementById('provinsi').innerText = provinsi ;
		
		document.getElementById('type').innerText = type ;
		document.getElementById('deskripsi').innerText = deskripsi ;
		document.getElementById('facebook').innerText = facebook ;
		document.getElementById('twitter').innerText = twitter ;
		document.getElementById('website').innerText = website ;
		document.getElementById('info_tambahan').innerText = info_tambahan ;

		if (typeof template_image != 'undefined') {
			document.getElementById('imej').src = "images/events/" + template_image ;			
		}	
		else{						
			
			if ( document.getElementById('image-upload').value == '' ) {
				document.getElementById('imej').src = "images/events/<?php echo $event['event_image'] ?>" ;	
			}
			else{
				readURL(document.getElementById('image-upload'));	
			}
			
		}
		
		document.getElementById('tags').innerHTML = '';		
		_tag.forEach(hesananda)
		

		// document.getElementById('tag').innerText = _tag.length ;

		}

</script>

</body>
</html>