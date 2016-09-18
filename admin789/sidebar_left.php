	<div class="sidebar-left sidebar-nicescroller">
				<ul class="sidebar-menu">
<?php
require_once("config/koneksi.php");
if ($_SESSION['user_type']=='super admin')
	{	?>
										
					<li><a href="event_layout_view.php"><i class="fa fa-th icon-sidebar"></i>Event Layout</a></li>
					<li>
						<a href="#fakelink">
							<i class="fa fa-desktop icon-sidebar"></i>
							<i class="fa fa-angle-right chevron-icon-sidebar"></i>
							Event
							<span class="badge badge-warning span-sidebar">3</span>
							</a>
						<ul class="submenu">
							<li><a href="event_input.php">Input Event<span class="label label-success span-sidebar"></span></a></li>
							<li><a href="event_view_list.php">Event List </a></li>
							<li><a href="event_view.php">Event Grid </a></li>
						</ul>
					</li>

						<li>
						<a href="#fakelink">
							<i class="fa fa-picture-o icon-sidebar"></i>
							<i class="fa fa-angle-right chevron-icon-sidebar"></i>
							Slider
							<span class="badge badge-warning span-sidebar">2</span>
							</a>
						<ul class="submenu">
							<li><a href="slider_input.php">Input Slider<span class="label label-success span-sidebar"></span></a></li>
							<li><a href="slider_view.php">Slider List </a></li>							
						</ul>
					</li>
					
					<li>
						<a href="#fakelink">
							<i class="fa fa-group icon-sidebar"></i>
							<i class="fa fa-angle-right chevron-icon-sidebar"></i>
							Team
							<span class="badge badge-warning span-sidebar">2</span>
							</a>
						<ul class="submenu">
							<li><a href="team_input.php">Input Team<span class="label label-success span-sidebar"></span></a></li>
							<li><a href="team_view.php">Team List </a></li>							
						</ul>
					</li>

					<li>
						<a href="#fakelink">
							<i class="fa fa-user icon-sidebar"></i>
							<i class="fa fa-angle-right chevron-icon-sidebar"></i>
							User
							<span class="badge badge-warning span-sidebar">2</span>
							</a>
						<ul class="submenu">
							<li><a href="user_input.php">Input User<span class="label label-success span-sidebar"></span></a></li>
							<li><a href="user_view.php">User List</a></li>							
						</ul>
					</li>
<?php
}
elseif ($_SESSION['user_type']=='admin konten') {
?>				
		
			<li>
						<a href="#fakelink">
							<i class="fa fa-picture-o icon-sidebar"></i>
							<i class="fa fa-angle-right chevron-icon-sidebar"></i>
							Slider
							<span class="badge badge-warning span-sidebar">2</span>
							</a>
						<ul class="submenu">
							<li><a href="slider_input.php">Input Slider<span class="label label-success span-sidebar"></span></a></li>
							<li><a href="slider_view.php">Slider List </a></li>							
						</ul>
					</li>

					<li><a href="event_layout_view.php"><i class="fa fa-th icon-sidebar"></i>Event Layout</a></li>

					<li>
						<a href="#fakelink">
							<i class="fa fa-desktop icon-sidebar"></i>
							<i class="fa fa-angle-right chevron-icon-sidebar"></i>
							Event
							<span class="badge badge-warning span-sidebar">3</span>
							</a>
						<ul class="submenu">
							<li><a href="event_input.php">Input Event<span class="label label-success span-sidebar"></span></a></li>
							<li><a href="event_view_list.php">Event List </a></li>
							<li><a href="event_view.php">Event Grid </a></li>
						</ul>
					</li>
<?php	
}
elseif ($_SESSION['user_type']=='editor') {
?>						

					<li>
						<a href="#fakelink">
							<i class="fa fa-desktop icon-sidebar"></i>
							<i class="fa fa-angle-right chevron-icon-sidebar"></i>
							Event
							<span class="badge badge-warning span-sidebar">3</span>
							</a>
						<ul class="submenu">
							<li><a href="event_input.php">Input Event<span class="label label-success span-sidebar"></span></a></li>
							<li><a href="event_view_list.php">Event List </a></li>
							<li><a href="event_view.php">Event Grid </a></li>
						</ul>
					</li>
<?php	
}

elseif ($_SESSION['user_type']=='kontributor') {
?>						
					<li>
						<a href="#fakelink">
							<i class="fa fa-desktop icon-sidebar"></i>
							<i class="fa fa-angle-right chevron-icon-sidebar"></i>
							Event
							<span class="badge badge-warning span-sidebar">3</span>
							</a>
						<ul class="submenu">
							<li><a href="event_input.php">Input Event<span class="label label-success span-sidebar"></span></a></li>
							<li><a href="event_view_list.php">Event List </a></li>
							<li><a href="event_view.php">Event Grid </a></li>
						</ul>
					</li>
<?php	
}
?>

					<!--li>
						<a href="#fakelink">
							<i class="fa fa-user icon-sidebar"></i>
							<i class="fa fa-angle-right chevron-icon-sidebar"></i>
							User
							<span class="badge badge-warning span-sidebar">2</span>
							</a>
						<ul class="submenu">
							<li><a href="user_input.php">Input User<span class="label label-success span-sidebar">CURRENT</span></a></li>
							<li><a href="user_view.php">User List </a></li>
						</ul>
					</li-->
													
				</ul>
			</div><!-- /.sidebar-left -->