<!-- Uses a transparent header that draws on top of the layout's background -->
<!DOCTYPE html>
<html>

<head>
<title>Spektakel.id</title>

    <script src="mdl-selectfield.min.js"></script>

<script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
	    <link rel="stylesheet" href="assets/styles.css">

<link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.deep_orange-red.min.css">

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	    <link rel="stylesheet" href="assets/modal.css">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<div class="no-bg demo-layout-transparent mdl-layout mdl-js-layout">
  <header class="head-sub mdl-layout__header mdl-layout__header--scroll">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title"><img src="images/logo-spektakel.png"></span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation -->
<form action="#">
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
    <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
      <i class="material-icons">search</i>
    </label>
    <div class="mdl-textfield__expandable-holder">
      <input class="mdl-textfield__input" type="text" id="search">
    </div>
  </div>
</form>
      <nav class="mdl-navigation">

           <label class="menuhead-sub" for="modal-1">MASUK</label>
<label class="tombol mdl-button mdl-js-button mdl-button--raised mdl-button--accent" for="modal-2">
  PROMOSI
</label>

      </nav>
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title"><img src="images/logo-spektakel.png" width=180></span>
    <nav class="mdl-navigation">
           <label class="mdl-navigation__link" for="modal-1">Masuk</label>
      <a class="mdl-navigation__link" href="">Promosikan Acara</a>
    </nav>
  </div>
  <main class="mdl-layout__content">



        <div class="submisi mdl-grid">
        <div class="blok-head mdl-cell--12-col">
          <div class="mdl-cell mdl-cell--8-col">
            <h3 class="mdl-typography--font-bold">Posting Kegiatan</h3>

          </div>
          <div class="mdl-cell mdl-cell--4-col">

<a class="mdl-button mdl-js-button mdl-button--accent" onclick="document.getElementById('simpan').click()">
  Simpan
</a>
<a class="mdl-button mdl-js-button mdl-button--accent" onclick="document.getElementById('pratinjau').click()">
  Pratinjau
</a>
<a class="mdl-button mdl-js-button mdl-button--accent" onclick="document.getElementById('submit').click()">
  Submit
</a>

          </div>
          </div>


          <div class="mdl-cell mdl-cell--12-col">
            <h4 class="mdl-typography--font-bold">Rincian Acara</h3>
          </div>

      <form action="test.php" class="mdl-cell mdl-cell--12-col" method="post" enctype="multipart/form-data">

      <div style="float:left;" class="mdl-cell mdl-cell--5-col">
      <label for="event_category">Jenis acara</label><br>
          <input type="text" id="event_category" name="event_category" placeholder="seni tradisi, tradisi, musik...">
      </div>
      <div style="float:left;" class="mdl-cell mdl-cell--5-col">
          <label for="lname">Tipe acara</label><br>
              <select name="event_type" id="event_type"  >                   
                            <!--FREE EVENT-->
                            <option value="gratis/free" id="inetfree">Gratis/Free</option>
              </br>
              <!--PAID EVENT-->
              <option value="berbayar/paid" id="inetpaid">Berbayar/Paid</option>
                            <!--BOTH EVENT-->
                            <option value="keduanya/both" id="inetboth">Keduanya/Both</option>   
                        </select>
      </div>

      <div style="float:left;" class="mdl-cell mdl-cell--12-col">
          <label for="event_title">Judul acara</label><br>
          <input type="text" id="event_title" name="event_title">
      </div>

      <div style="float:left;" class="mdl-cell mdl-cell--5-col">
      <label for="event_location">Lokasi</label><br>
          <input type="text" id="event_location" name="event_location" placeholder="Contoh: Gedung JCC">
      </div>
      <div style="float:left;" class="mdl-cell mdl-cell--7-col">
          <label for="event_detail_address">Alamat</label><br>
          <input type="text" id="event_detail_address" name="event_detail_address">
      </div>

      <div style="float:left;" class="mdl-cell mdl-cell--5-col">
      <label for="event_city">Kota / Kabupaten</label><br>
          <input type="text" id="event_city" name="event_city">
      </div>
      <div style="float:left;" class="mdl-cell mdl-cell--5-col">
          <label for="event_province">Provinsi</label><br>
          <input type="text" id="event_province" name="event_province">
      </div>

      <div style="float:left;" class="mdl-cell mdl-cell--10-col">
      <label for="event_gmap_link">Tautan peta</label><br>
          <input type="text" id="event_gmap_link" name="event_gmap_link" placeholder="https://goo.gl/maps/VnYnUy5z3r92">
      </div>

      <div style="float:left;" class="mdl-cell mdl-cell--5-col">
          <label for="lname">Tanggal mulai</label><br>
          <input type="text" id="lname" name="lastname" placeholder="dd/mm/yyyy">
      </div>

      <div style="float:left;" class="mdl-cell mdl-cell--5-col">
          <label for="lname">Tanggal selesai</label><br>
          <input type="text" id="lname" name="lastname" placeholder="dd/mm/yyyy">
      </div>

      <div style="float:left;" class="mdl-cell mdl-cell--5-col">
          <label for="lname">Jam mulai</label><br>
          <input type="text" id="lname" name="lastname" placeholder="hh:mm">
      </div>

      <div style="float:left;" class="mdl-cell mdl-cell--5-col">
          <label for="lname">Jam selesai</label><br>
          <input type="text" id="lname" name="lastname" placeholder="hh:mm">
      </div>

      <div style="float:left;" class="border mdl-cell mdl-cell--10-col">

      <div class="fileUpload">
      <span class="custom-span">+</span>
      <p class="custom-para">Add Images</p>
      <input id="uploadBtn" name="file" type="file" class="upload" />
      </div>
      <input id="uploadFile" placeholder="no file selected" disabled="disabled" />
      <p>Ukuran minimal: 1200 x 800 pixel</p>

      <script type="text/javascript">
      document.getElementById("uploadBtn").onchange = function () {
      document.getElementById("uploadFile").value = document.getElementById("uploadBtn").value;
      };
      </script>

      </div>
      <div style="float:left;" class="mdl-cell mdl-cell--10-col">
          <label for="event_description">Deskripsi acara (Bahasa Indonesia)</label><br>
      <textarea name="event_description" cols="40" rows="5"></textarea>
      </div>

      <div style="float:left;display:none;" class="mdl-cell mdl-cell--10-col">
          <label for="event_description_english">Deskripsi acara (Bahasa Inggris)</label><br>
      <textarea name="event_description_english" cols="40" rows="5"></textarea>
      </div>

      <div style="float:left;" class="mdl-cell mdl-cell--10-col">
          <label for="event_more_info">Informasi Tambahan</label><br>
      <textarea name="event_more_info" cols="40" rows="5"></textarea>
      </div>

      <div style="float:left;" class="mdl-cell mdl-cell--5-col">
      <label for="eo_name">Penyelenggara</label><br>
          <input type="text" id="eo_name" name="eo_name">
      </div>
      <div style="float:left;" class="mdl-cell mdl-cell--5-col">
          <label for="event_link">Website</label><br>
          <input type="text" id="event_link" name="event_link">
      </div>

      <div style="float:left;" class="mdl-cell mdl-cell--5-col">
      <label for="eo_contact_number">Telepon</label><br>
          <input type="text" id="eo_contact_number" name="eo_contact_number">
      </div>
      <div style="float:left;" class="mdl-cell mdl-cell--5-col">
          <label for="eo_email">Email</label><br>
          <input type="text" id="eo_email" name="eo_email">
      </div>


      <div style="float:left;" class="mdl-cell mdl-cell--5-col">
          <label for="eo_facebook">Facebook</label><br>
          <input type="text" id="eo_facebook" name="eo_facebook">
      </div>

      <div style="float:left;" class="mdl-cell mdl-cell--5-col">
      <label for="eo_twitter">Twitter</label><br>
          <input type="text" id="eo_twitter" name="eo_twitter">
      </div>
      <div style="float:left;" class="mdl-cell mdl-cell--5-col">
          <label for="eo_instagram">Instagram</label><br>
          <input type="text" id="eo_instagram" name="eo_instagram">
      </div>

      <div style="margin-top: 70px;clear:left;" class="mdl-cell mdl-cell--5-col">
      <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-2">
        <input type="checkbox" id="checkbox-2" class="mdl-checkbox__input">
        <span class="mdl-checkbox__label">Saya menyetujui Syarat & Ketentuan yang berlaku</span>
      </label>
      </div>

      <div style="margin-top: 70px;clear:left;" class="mdl-cell mdl-cell--5-col">

         <button id="simpan" value="simpan" name="simpan" type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
        Simpan
      </button>
      <button id="pratinjau" value="pratinjau" name="pratinjau" type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
        Pratinjau
      </button>
      <button id="submit" value="submit" name="submit" type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
        Submit
      </button>
      </form>
</div>
   
          </div> <!-- end submisi div -->


  <!-- footer start -->
  <?php
  require_once('main_layout/footer.php');
  ?>        
<!-- footer end -->
  </main>


</div>

<input class="modal-state" id="modal-1" type="checkbox" />
<div class="modal">
  <label class="modal__bg" for="modal-1"></label>
  <div class="modal__inner">
    <label class="modal__close" for="modal-1"></label>
    <h2>Mendaftar</h2>
    <p>Sudah punya akun? <a href="">Masuk</a></p>
<!-- Textfield with Floating Label -->

<form action="#">
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" pattern="[A-Z,a-z,0-9]*" id="username" />
    <label class="mdl-textfield__label" for="username">Username</label>
    <span class="mdl-textfield__error">Only alphabet and no spaces, please!</span>
  </div>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="password" id="password" />
    <label class="mdl-textfield__label" for="password">Password</label>
  </div>
<!-- Accent-colored raised button with ripple -->
<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
  SIGN UP
</button>
<br><br>
<p>Dengan mendaftar, saya menyetujui <a href="">terms of services</a>, <a href="">privacy policy</a> dan <a href="">cookie policy</a>.</p>

</form>

  </div>
</div>

<input class="modal-state" id="modal-2" type="checkbox" />
<div class="modal">
  <label class="modal__bg" for="modal-2"></label>
  <div class="modal__inner">
    <label class="modal__close" for="modal-2"></label>
    <h2>Masuk</h2>
    <p>Belum punya akun? <a href="">Daftar</a></p>
<!-- Textfield with Floating Label -->

<form action="#">
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" pattern="[A-Z,a-z,0-9]*" id="username" />
    <label class="mdl-textfield__label" for="username">Username</label>
    <span class="mdl-textfield__error">Only alphabet and no spaces, please!</span>
  </div>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="password" id="password" />
    <label class="mdl-textfield__label" for="password">Password</label>
  </div>
<!-- Accent-colored raised button with ripple -->
<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
  Log in
</button>
<br><br>
<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-2">
  <input type="checkbox" id="switch-2" class="mdl-switch__input">
  <span class="mdl-switch__label">Remember me</span>
</label>
</form>

  </div>
</div>

</body>
</html>
