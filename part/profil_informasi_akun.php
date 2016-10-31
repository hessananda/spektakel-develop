	<h2>Informasi Akun</h2>
						<!-- <h2 class="nobold">Email Akun</h2> -->
						<!-- <div class="email-profile"><?php// echo $member['email'] ?></div>
						<div class="change-email"><a href="#">Ubah Email</a></div> -->

					<form action="part/profil_action.php?action=profil" method="post" enctype="multipart/form-data">
						<h2 class="nobold">Foto Profil</h2>
						<div class="row">
							<div class="col-md-4 col-sm-6" id="upload-image">
								<div class="form-group">
									<div class="image-preview-profil" id="image-preview" style="background-size: 100% 100%; background-image:url('images/member/<?php echo $member['photo'] ?>');">
										<label for="image-upload" id="image-label">&nbsp;</label>
										<input type="file" name="image" id="image-upload" />
									</div>
									<div class="text-center picture-option">
										<!-- <span><a href="javascript:void(0);" id="btn-crop" data-img="0">Sesuaikan</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="javascript:void(0);" id="btn-upload" >Ubah</a></span> -->
										<br />
										<span>Ukuran Terbaik 800 x 800 pixel</span>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-6" id="crop-image" style="display:none;">
								<div class="form-group">
									<!-- Please read https://github.com/fengyuanchen/cropperjs/blob/master/README.md !-->
									<div class="image-user">
										<img id="imagecrop" src="images/avatar.png" />
									</div>
									<div class="text-center picture-option">
										<!-- <span><a onclick="cropper.getCroppedCanvas();" id="btn-save">Simpan</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="javascript:void(0);" id="btn-empty">Ubah</a></span> -->
									</div>
								</div>
							</div>
						</div>
						<h2 class="nobold">Informasi Kontak</h2>
						<div class="row">
							<div class="col-md-5">
								<div class="form-group">
									<label for="input1">Nama Lengkap</label>
									<input name="full_name" type="text" class="form-control input-post" id="input1" placeholder="" value="<?php echo $member['full_name'] ?>" />
								</div>
							</div>
							<div class="col-md-1">&nbsp;</div>
							<div class="col-md-5">
								<div class="form-group">
									<label for="input4">Telepon Seluler</label>
									<input name="phone" type="text" class="form-control input-post" id="input4" placeholder="" value="<?php echo $member['phone'] ?>" />
								</div>
							</div>
						</div>					
						<div class="row">
							<div class="col-md-5">
								<div class="form-group">
									<label for="input5">Perusahaan</label>
									<input name="company" type="text" class="form-control input-post" id="input5" placeholder="" value="<?php echo $member['company'] ?>" />
								</div>
							</div>
							<div class="col-md-1">&nbsp;</div>
							<div class="col-md-5">
								<div class="form-group">
									<label for="input6">Jabatan</label>
									<input name="position" type="text" class="form-control input-post" id="input6" placeholder="" value="<?php echo $member['position'] ?>" />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5">
								<div class="form-group">
									<label for="input7">Website</label>
									<input name="website" type="text" class="form-control input-post" id="input7" placeholder="URL" value="<?php echo $member['website'] ?>" />
								</div>
							</div>
							<div class="col-md-1">&nbsp;</div>
							<div class="col-md-5">
								<div class="form-group">
									<label for="input8">Facebook</label>
									<input name="facebook" type="text" class="form-control input-post" id="input8" placeholder="URL" value="<?php echo $member['facebook'] ?>" />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5">
								<div class="form-group">
									<label for="input91">Twitter</label>
									<input name="twitter" type="text" class="form-control input-post" id="input91" placeholder="URL" value="<?php echo $member['twitter'] ?>" />
								</div>
							</div>
							<div class="col-md-1">&nbsp;</div>
							<div class="col-md-5">
								<div class="form-group">
									<label for="input101">Instagram</label>
									<input type="text" name="instagram" class="form-control input-post" id="input101" placeholder="URL" value="<?php echo $member['instagram'] ?>" />
								</div>
							</div>
						</div>
						<h2 class="nobold">Alamat</h2>
						<div class="row">
							<div class="col-md-11">
								<div class="form-group">
									<label for="input11">Nama Jalan</label>
									<input name="street" type="text" class="form-control input-post" id="input11" placeholder="" value="<?php echo $member['street'] ?>" />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5">
								<div class="form-group">
									<label for="input12">Kecamatan</label>
									<input name="kecamatan" type="text" class="form-control input-post" id="input12" placeholder="" value="<?php echo $member['kecamatan'] ?>" />
								</div>
							</div>
							<div class="col-md-1">&nbsp;</div>
							<div class="col-md-5">
								<div class="form-group">
									<label for="input13">Kota / Kabupaten</label>
									<input name="city" type="text" class="form-control input-post" id="input13" placeholder="" value="<?php echo $member['city'] ?>" />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5">
								<div class="form-group">
									<label for="input14">Provinsi</label>
									<input name="province" type="text" class="form-control input-post" id="input14" placeholder="" value="<?php echo $member['province'] ?>" />
								</div>
							</div>
							<div class="col-md-1">&nbsp;</div>
							<div class="col-md-5">
								<div class="form-group">
									<label for="input15">Kodepos</label>
									<input name="kodepos" type="text" class="form-control input-post" id="input15" placeholder="" value="<?php echo $member['kodepos'] ?>" />
								</div>
							</div>
						</div>
						<h2 class="nobold">Deskripsi Profil</h2>
						<div class="row">
							<div class="col-md-11">
								<div class="form-group">
									<label for="input16">Deskripsi</label>
									<textarea name="description" class="form-control input-text-post" id="input16" placeholder=""><?php echo $member['description'] ?></textarea>
								</div>
							</div>
						</div>
						<h2 class="nobold">Informasi Lain</h2>
						<div class="row">
							<div class="col-md-5">
								<div class="form-group">
									<label for="input16">Gender</label>
									<select name="gender" class="form-control input-post">
										<option <?php echo $member['gender']=='Laki-Laki'?'selected':'' ?> value="Laki-Laki">Laki-Laki</option>
										<option <?php echo $member['gender']=='Perempuan'?'selected':'' ?> value="Perempuan">Perempuan</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">

						<div class="col-md-4">
								<div class="form-group">
									<label for="input_birthdate">Tanggal Lahir</label>									
									<!-- <input name="birthdate" type="text" class="input-post datepicker" id="input_birthdate" placeholder="00/00/0000" value="<?php// echo $member['birthdate'] ?>" /> -->
								</div>
							</div>
						</div>
<?php						
						$tanggal = substr($member['birthdate'],8,2);
						$bulan = substr($member['birthdate'],5,2);
						$tahun = substr($member['birthdate'],0,4);
?>

						<div class="row">
							<div class="col-md-2">
								<div class="form-group">
									<label for="input17">Tanggal</label>								
									<select name="tgl_lahir" id="input17" class="form-control input-post">
										<option value="00">--</option>
										<?php for($i=1 ; $i <= 31 ; $i++) { 
											$tanggal_loop = strlen($i) == 1? '0'.$i : $i ;
											?>
											<option value="<?php echo $tanggal_loop  ?>" <?php echo $tanggal_loop==$tanggal?'selected':'' ?> ><?php echo $i ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-1">&nbsp;</div>
							<div class="col-md-2">
								<div class="form-group">
									<label for="input18">Bulan</label>									
									<select name="bulan_lahir" class="form-control input-post"  id="input18">
										<option value="00">--</option>
										<option value="01" <?php echo $bulan=='01'?'selected':'' ?> >Januari</option>
										<option value="02" <?php echo $bulan=='02'?'selected':'' ?> >Februari</option>
										<option value="03" <?php echo $bulan=='03'?'selected':'' ?> >Maret</option>
										<option value="04" <?php echo $bulan=='04'?'selected':'' ?> >April</option>
										<option value="05" <?php echo $bulan=='05'?'selected':'' ?> >Mei</option>
										<option value="06" <?php echo $bulan=='06'?'selected':'' ?> >Juni</option>
										<option value="07" <?php echo $bulan=='07'?'selected':'' ?> >Juli</option>
										<option value="08" <?php echo $bulan=='08'?'selected':'' ?> >Agustus</option>
										<option value="09" <?php echo $bulan=='09'?'selected':'' ?> >September</option>
										<option value="10" <?php echo $bulan=='10'?'selected':'' ?> >Oktober</option>
										<option value="11" <?php echo $bulan=='11'?'selected':'' ?> >Novemmber</option>
										<option value="12" <?php echo $bulan=='12'?'selected':'' ?> >Desember</option>
									</select>
								</div>
							</div>
							<div class="col-md-1">&nbsp;</div>
							<div class="col-md-2">
								<div class="form-group">
									<label for="input19">Tahun</label>
									<?php $sekarang = date("Y") ;$lampau = $sekarang - 60 ; $lama = $sekarang-5 ; ?>
										<select name="tahun_lahir" id="input17" class="form-control input-post">
										<option value="0000">----</option>
										<?php for($i= $lampau ; $i <= $lama ; $i++) { ?>
											<option value="<?php echo $i ?>" <?php echo $tahun==$i?'selected':'' ?>><?php echo $i ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<p>&nbsp;</p>
						<button class="btn btn-orange btn-spek btn-square" type="submit">Simpan</button>
					</form>