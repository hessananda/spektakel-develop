<!-- Uses a transparent header that draws on top of the layout's background -->
<?php 
require_once('config/koneksi.php');
require_once('config/potong_kata.php'); 

?>
<html>
<head>
<title>Spektakel.id</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.deep_orange-red.min.css">
	    <link rel="stylesheet" href="styles.css">
<script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="config/Zebra_Pagination/public/css/zebra_pagination.css" type="text/css">
<script type="text/javascript" src="config/Zebra_Pagination/public/javascript/zebra_pagination.js"></script>

</head>

<body>
<div class="mdl-layout mdl-js-layout">
  <header class="grey-head mdl-layout__header mdl-layout__header--scroll">
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

        <div class="event mdl-grid" style="background:">
      
      <?php
// zebra pagination

      $records_per_page = 16;
      require 'config/Zebra_Pagination/Zebra_Pagination.php';
      $pagination = new Zebra_Pagination();

        $MySQL = "SELECT
                  SQL_CALC_FOUND_ROWS
                  *
                  FROM
                      event
                  WHERE 
                      event_status = 'DISETUJUI' AND event_start_date >= now()
                  ORDER BY event_start_date
                  LIMIT ". (($pagination->get_page() - 1) * $records_per_page) . ', ' . $records_per_page."";

            // if query could not be executed
            if (!($result = @mysqli_query($con,$MySQL))) {

            // stop execution and display error message
            die(mysqli_error());

            }

        // fetch the total number of records in the table
        $rows = mysqli_fBracketHighlighteretch_assoc(mysqli_query($con,'SELECT FOUND_ROWS() AS rows'));

        // pass the total number of records to the pagination class
        $pagination->records($rows['rows']);

        // records per page
        $pagination->records_per_page($records_per_page);

        // $query = mysqli_query($con,$sql);
        while ($event = mysqli_fetch_assoc($result)) {
                   
                $date=strtotime($event['event_start_date']);
          ?>                   
                  <div class="mdl-cell mdl-cell--3-col">
                        <div class="kartu mdl-shadow--2dp">
                        <div class="smallcard__media">
                        <img src="images/events/<?php echo $event['event_image'] ?>">
                        </div>
                        <div class="black mdl-card__supporting-text">
                        <span class="mdl-typography--font-light"><?php echo $event['event_category'] ?></span>
                        <span class="small_card mdl-card__title-text mdl-typography--font-bold"><a href="detail.php?id=<?php echo $event['event_id'] ?>">
                        <b><?php echo truncate($event['event_title'],20) ?></b></a>
                        </span>
                        <span class="mdl-typography--font-medium">
                        <?php echo $event['event_city'] ?> | <?php echo date("d.m.Y", $date) ?>
                        </span>
                        <br>
                        <span class="mdl-typography--font-medium">
                        <?php echo $event['event_type'] ?>
                        </span>
                        </div>
                        </div>
                  </div>
          <?php
        }
      ?>
        </div>

          <div class="center mdl-cell mdl-cell--12-col">
<br><br>
<span class="mdl-typography--font-black mdl-t`ypography--text-uppercase">
<?php
// render the pagination links
$pagination->render();
?>
</span>
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
<style type="text/css">
  
  
</style>

</body>
</html>