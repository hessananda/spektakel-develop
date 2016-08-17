<?php 
require_once('config/koneksi.php');
require_once('config/fungsi_tgl.php');
require_once('config/fungsi_nama_hari.php'); 
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

    <div class="detil-layout-transparent mdl-layout mdl-js-layout">
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

<?php
    $id = $_GET['id'];

    $sql = "SELECT e.*, mem.full_name, eo.* FROM event e
    INNER JOIN event_organizer eo ON e.event_organizer_id = eo.eo_id
    INNER JOIN member mem ON e.id_user_yang_input = mem.id
    WHERE
    e.event_id = '$id'";
    
    $sql_query = mysqli_query($con,$sql);
    $event = mysqli_fetch_assoc($sql_query);
    $time=strtotime($event['event_start_time']);
?>    			
    			
    		<main class="premium isi mdl-layout__content">
    					<div class="curated mdl-grid">
    							<div class="detil-isi mdl-cell mdl-cell--9-col mdl-typography--text-left">

    							    <h6 class="mdl-typography--font-black"><?php echo $event['event_category'] ?></h6>
    							    <h3 class="mdl-typography--font-black mdl-typography--text-uppercase"><?php echo $event['event_title'] ?></h3>
                      <p class="mdl-typography--font-light mdl-typography--text-none"><?php echo $event['event_description'] ?></p>
    <br><br>
                      <p class="mdl-typography--font-light"><em><?php echo $event['event_description_english'] ?></em></p>
                      <p class="mdl-typography--font-light"><?php echo $event['event_category'] ?></p>
    								
    							</div>
                      <div class="detil-kanan mdl-cell mdl-cell--3-col  mdl-typography--text-left">
    							    <p class="mdl-typography--font-black"><?php echo getday($event['event_start_date'],'-')." , ". 
                      tgl_indo($event['event_start_date']) ?> | <?php echo date("H:i", $time) ?></p>
    							    <p class="mdl-typography--font-black"><?php echo $event['event_location'] ?>, <?php echo $event['event_detail_address'] ?></p>
    							    <p class="mdl-typography--font-black"><?php echo $event['event_city'] ?>, <?php echo $event['event_province'] ?></p>
    							    <p class="mdl-typography--font-medium"><a href="<?php echo $event['event_gmap_link'] ?>" target="_blank">Lihat Peta</a></p><br>
    							    <p class="mdl-typography--font-medium">Acara ini <?php echo $event['event_type'] ?></p>
    							    
                      <?php
                        if ($event['eo_twitter']<>'') {
                          echo '<p class="mdl-typography--font-medium"><i class="fa fa-twitter" aria-hidden="true"></i>'.$event['eo_twitter'].'
                      </p>';
                        }

                        if ($event['eo_facebook']<>'') {
                          echo '<p class="mdl-typography--font-medium"><i class="fa fa-facebook" aria-hidden="true"></i>'.$event['event_title'].'</p>';
                        }
                      ?>                          

    <br><br>
    <span class="mdl-typography--font-medium mdl-typography--text-lowercase"><i class="fa fa-share" aria-hidden="true"></i> Sebarkan</span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="mdl-typography--font-medium mdl-typography--text-lowercase"><i class="fa fa-floppy-o" aria-hidden="true"></i> Simpan</span>
    <br><br>
    <span class="mdl-typography--font-medium mdl-typography--text-capitalize">Dipublikasikan oleh: <a href=""><?php echo $event['full_name'] ?></a></span>

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
