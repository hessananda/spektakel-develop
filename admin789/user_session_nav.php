						<?php 
						@	$user = mysql_fetch_assoc(mysql_query("SELECT * from user WHERE user_id = '$_SESSION[user_id]' "));
						?>						

						<!-- Begin user session nav -->
						<ul class="nav-user">							
							<li class="dropdown">
							  <a href="#fakelink" class="dropdown-toggle" data-toggle="dropdown">
								<img src="images/user/<?php echo $user['user_image'] ?>" class="avatar img-circle" alt="Avatar">
								Hi, <strong><?php echo $user['user_fullname'] ?></strong>
							  </a>
							  <ul class="dropdown-menu square primary margin-list-rounded with-triangle">
								<li><a><b>You Login As <?php echo $_SESSION['user_type'] ?></b></a></li>
								<li class="divider"></li>
								<li><a href="user_account_edit.php">Account setting</a></li>
								<li><a href="user_change_password.php">Change Username & Password</a></li>
								<li class="divider"></li>
								<li><a href="logout.php">Log out</a></li>
							  </ul>
							</li>
						</ul>
						<!-- End user session nav -->