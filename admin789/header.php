
<style type="text/css">
	@media (min-width: 768px ) {
  .row {
      position: relative;
  }

  .bottom-align-text {
    position: absolute;
    bottom: 0;
    right: 0;
  }
}

.navbar-default {
    background-color: white;
    border-color: white;
}

.header{
	padding-top:25px;
}
</style>

<div class="header">
				<div class="wrap">

				<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNvbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a href="index.php" charset="navbar-brand"><img src="images/logo/logokts.png" title="KTS" class="small_footer" /></a>
    </div>
    <div class="collapse navbar-collapse " id="myNvbar">
    <ul class="bottom-align-text nav navbar-nav navbar-right">
		<li><a href="index.php" >| Beranda</a></li>
		<li><a href="news-all.php">| Kabar & Agenda</a></li>
		<li><a href="artikel-all.php">| Artikel</a></li>
		<li><a href="modul-all.php">| Modul</a></li>
		<li><a href="kontak.php">| Kontak</a></li>
		<li>
		  <form class="navbar-form navbar-left" method="post" action="search_result.php">
		      <div class="input-group">
		      <input type="text" name="search" class="form-control" size="10" placeholder="Cari...">
		      <span class="input-group-btn">
		      	<button type="submit" class="btn btn-default" type="button"><i class="glyphicon glyphicon-search"></i></button>
		      </span>
		      </div>
      	  </form>
      </li>
    </ul>

    </div>
  </div>
</nav>
				<!-- start-logo-->
				<!-- <div class="logo"> -->
				<!-- <div class="row"> -->
				  <!-- <div class="col-sm-1"> -->
					<!-- <a href="index.php"><img src="images/logo/logokts.png" title="KTS" class="small_footer" /></a> -->
				<!-- </div> -->
				<!--- //End-logo---->
				<!--- start-top-nav---->
			 	  <!-- </div> -->
				  <!-- <div class="col-sm-11"> -->
					<!-- <div class="top-nav"> -->
						<!-- 	<ul class="flexy-menu thick orange">
								<li class="active"><a href="index.php" style="padding-bottom:0px">| Beranda</a></li>
								<li><a href="news-all.php" style="padding-bottom:0px">| Kabar & Agenda</a></li>
								<li><a href="artikel-all.php" style="padding-bottom:0px">| Artikel</a></li>
								<li><a href="modul-all.php" style="padding-bottom:0px">| Modul</a></li>
								<li><a href="kontak.php" style="padding-bottom:0px">| Kontak</a></li>							
							</ul> -->

	<!-- 						<div class="search-box">
								<div id="sb-search" class="sb-search">
									<form>
										<input class="sb-search-input" placeholder="Enter your search term..." type="search" name="search" id="search">
										<input class="sb-search-submit" type="submit" value="">
										<span class="sb-icon-search"> </span>
									</form>
								</div>
							</div> -->
							<!--search-scripts-->
							<script src="js/modernizr.custom.js"></script>
							<script src="js/classie.js"></script>
							<script src="js/uisearch.js"></script>
							<script>
								new UISearch( document.getElementById( 'sb-search' ) );
							</script>
							<!----//search-scripts---->
					  <!-- </div div top-nav> -->
				   <!-- </div> -->
				<!-- </div> -->
				<!--- //End-top-nav---->
				<div class="clear"> </div>
			</div>
			<!---//End-header---->
		</div>