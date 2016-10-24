
	<div class="sidebar-left sidebar-nicescroller">
				<ul class="sidebar-menu">
<?php
require_once("config/koneksi.php");
if ($_SESSION['user_type']=='super admin')
	{	?>														
					
					<li><a id="kegiatan" href="event_view.php?menu=kegiatan"><i class="fa fa-desktop icon-sidebar"></i>Kegiatan</a></li>
					<li>
					<a id="premium_konten" href="event_layout_view.php?menu=premium_konten" ><i class="fa fa-th icon-sidebar"></i>Premium Content</a>
					</li>
					<li><a id="slide" href="slider_view.php?menu=slide"><i class="fa fa-picture-o icon-sidebar"></i>Slide</a></li>
					<li><a id="team" href="team_view.php?menu=team"><i class="fa fa-group icon-sidebar"></i>Team</a></li>
					<li><a id="user" href="user_view.php?menu=user"><i class="fa fa-user icon-sidebar"></i>User</a></li>
										
<?php
}
elseif ($_SESSION['user_type']=='admin konten') {
?>				
		<li><a id="kegiatan" href="event_view.php?menu=kegiatan"><i class="fa fa-desktop icon-sidebar"></i>Kegiatan</a></li>
		<li><a id="slide" href="slider_view.php?menu=slide"><i class="fa fa-picture-o icon-sidebar"></i>Slide</a></li>
		<li><a id="premium_konten" href="event_layout_view.php?menu=premium_konten"><i class="fa fa-th icon-sidebar"></i>Premium Content</a></li>
		
<?php	
}
elseif ($_SESSION['user_type']=='editor') {
?>						

	<li><a id="kegiatan" href="event_view.php?menu=kegiatan"><i class="fa fa-desktop icon-sidebar"></i>Kegiatan</a></li>

<?php	
}

elseif ($_SESSION['user_type']=='kontributor') {
?>						
					<li><a id="kegiatan" href="event_view.php?menu=kegiatan"><i class="fa fa-desktop icon-sidebar"></i>Kegiatan</a></li>
<?php	
}
?>

<?php

$menu = isset($_GET['menu'])?$_GET['menu']:"kegiatan" ;


?>													
				</ul>
			</div><!-- /.sidebar-left -->

			<script type="text/javascript">
				menu = <?php echo $menu ; ?>;
				document.getElementById("<?php echo $menu ; ?>").style.backgroundColor = "#4d88ff";
				document.getElementById("<?php echo $menu ; ?>").style.color = "#ffffff";

			</script>