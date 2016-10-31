	<div class="col-md-4 col-sm-4 hidden-xs header-right" id="navigation">
		<nav class="nav">
			<ul class="list-inline nav-right">
				<li><a href="search.php"><i class="fa fa-search"></i></a></li>
<?php
				require_once('config/koneksi.php');
				
				if (isset($_SESSION['full_name']) AND isset($_SESSION['username']) AND isset($_SESSION['userid'])) {
?>
				<li><a href="profil.php">Profilku</a></li>
				<li><a href="post_event.php">Promosi</a></li>
<?php
				}
				else {
?>
				<li><a href="javascript:void(0)" id="btn-login-modal" data-toggle="modal" data-target="#login-modal">Masuk</a></li>
				<li><a href="javascript:void(0)"  id="btn-login-modal2" data-toggle="modal" data-target="#login-modal">Promosi</a></li>
<?php					
				}
?>				
				
<?php
				if (isset($_SESSION['full_name']) AND isset($_SESSION['username']) AND isset($_SESSION['userid'])) {
?>
				<li><a href="part/logout.php">Logout</a></li>
<?php
				}
?>

			</ul>
		</nav>
	</div>