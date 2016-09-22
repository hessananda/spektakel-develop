	<div class="sidebar-left sidebar-nicescroller">
				<ul class="sidebar-menu">
<?php
require_once("config/koneksi.php");
if ($_SESSION['user_type']=='super admin')
	{	?>
										
					<li><a href="event_layout_view.php"><i class="fa fa-th icon-sidebar"></i>Premium Content</a></li>
					<li><a href="event_view.php"><i class="fa fa-desktop icon-sidebar"></i>Kegiatan</a></li>
					<li><a href="slider_view.php"><i class="fa fa-picture-o icon-sidebar"></i>Slider</a></li>
					<li><a href="team_view.php"><i class="fa fa-group icon-sidebar"></i>Team</a></li>
					<li><a href="user_view.php"><i class="fa fa-user icon-sidebar"></i>User</a></li>
										
<?php
}
elseif ($_SESSION['user_type']=='admin konten') {
?>				
		
		<li><a href="slider_view.php"><i class="fa fa-picture-o icon-sidebar"></i>Slider</a></li>
		<li><a href="event_layout_view.php"><i class="fa fa-th icon-sidebar"></i>Premium Content</a></li>
		<li><a href="event_view.php"><i class="fa fa-desktop icon-sidebar"></i>Event</a></li>

<?php	
}
elseif ($_SESSION['user_type']=='editor') {
?>						

	<li><a href="event_view.php"><i class="fa fa-desktop icon-sidebar"></i>Event</a></li>

<?php	
}

elseif ($_SESSION['user_type']=='kontributor') {
?>						
					<li><a href="event_view.php"><i class="fa fa-desktop icon-sidebar"></i>Event</a></li>
<?php	
}
?>
													
				</ul>
			</div><!-- /.sidebar-left -->