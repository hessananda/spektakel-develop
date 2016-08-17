<?php 
require_once('config/koneksi.php'); 
require_once('config/potong_kata.php'); 
?>

<!DOCTYPE html>
<html>

<!-- Uses a transparent header that draws on top of the layout's background -->
<head>
    <title>Spektakel.id</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.deep_orange-red.min.css">
    	    <link rel="stylesheet" href="styles.css">
    <script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <div class="demo-layout-transparent mdl-layout mdl-js-layout">
      <header class="mdl-layout__header mdl-layout__header--scroll mdl-layout__header--transparent">
        <div class="mdl-layout__header-row">
          <!-- Title -->
          <span class="mdl-layout-title"><a href="index.php"><img src="images/logo-spektakel.png"></a></span>
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
              <a class="mdl-navigation__link" href="">MASUK</a>
    <button class="tombol mdl-button mdl-js-button mdl-button--raised mdl-button--accent">
      PROMOSI
    </button>

          </nav>
        </div>
      </header>
      <div class="mdl-layout__drawer">
        <span class="mdl-layout-title"><img src="images/logo-spektakel.png" width=180></span>
        <nav class="mdl-navigation">
          <a class="mdl-navigation__link" href="">Masuk</a>
          <a class="mdl-navigation__link" href="">Promosikan Acara</a>
        </nav>
      </div>
      <main class="premium mdl-layout__content">
      <h1 class="premium title">Djakarta Warehouse Project</h1>
      <h3 class="premium date">5 - 7 November 2016</h3>
      <p>#Jakarta #Musik #Party</p>
      <h3 class="premium eo">Dipromosikan oleh: <strong>Music Organizer</strong></h3>


            <div class="curated mdl-grid">
              <div class="cta mdl-cell mdl-cell--12-col">
              <h3 class="block-title">Temukan Acaramu!</h3>
              <h5 class="block-title">Kegiatan Seni Budaya di Seluruh Nusantara</h5>
              <form action="#">
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" id="cariacara">
              <label class="input mdl-textfield__label" for="cariacara">Cari acara, lokasi, genre...</label>
              </div>


      <div class="mdl-textfield mdl-js-textfield">
        <input class="mdl-textfield__input" type="text" id="sample1">
        <label class="input mdl-textfield__label" for="sample1">Semua Bulan</label>
    <ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu mdl-js-ripple-effect"
        for="sample1">
      <li class="mdl-menu__item">Some Action</li>
      <li class="mdl-menu__item mdl-menu__item--full-bleed-divider">Another Action</li>
      <li disabled class="mdl-menu__item">Disabled Action</li>
      <li class="mdl-menu__item">Yet Another Action</li>
    </ul>
      </div>


              </form>
              </div>

    <div class="event mdl-grid">
  <?php
    
    $sql = "SELECT * FROM event as e, event_layout as el, event_organizer as eo WHERE e.event_id = el.event_layout_event_id AND e.event_organizer_id = eo.eo_id ORDER BY el.event_layout_urutan";
    
    $sql_query = mysqli_query($con,$sql);

    while ($event = mysqli_fetch_assoc($sql_query)) 
    {
      include('main_layout/event_home.php'); 
    }

  ?>


              <div class="center mdl-cell mdl-cell--12-col">
    <br><br>
    <a href="all.php"><span class="mdl-typography--font-black mdl-typography--text-uppercase">Telusuri Semua Kegiatan</span></a>
    </div>
                 <div class="mdl-cell mdl-cell--12-col">
     
                 </div>

            </div>

    </div>

<!-- footer start -->
  <?php
  require_once('main_layout/footer.php');
  ?>        
<!-- footer end -->
      </main>
    </div>

</body>

</html>
