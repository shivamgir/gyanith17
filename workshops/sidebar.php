
			<div class="menu-wrap"><!-- style="z-index: 7000;display: block;">-->
				<nav class="menu">
					<div class="icon-list"><!-- style="color:white">-->
						<div class="home-logo">
							<a href="/index.php"><img  src="/images/logo.svg"/></a>
						</div>
						<?php
							 
							 if(isset($_SESSION['g_id'])){ 				
						 ?>
						<a href="/dashboard.php"><!-- style="color:white">--><i class="fa fa-tachometer" aria-hidden="true"></i><span>Dashboard</span></a>
						<?php 
							}
							else
							{
								?>
							<a href="/log.php"><!-- style="color:white">--><i class="fa fa-tachometer" aria-hidden="true"></i><span>Dashboard</span></a>

								<?php
							}

						?>
						<a href="/events.php"><!-- style="color:white">--><i class="fa fa-cubes" aria-hidden="true"></i><span>Events</span></a>
						<a href="#"><!-- style="color:white">--><i class="fa fa-cogs" aria-hidden="true"></i><span>Workshops</span></a>
						<a href="#"><!-- style="color:white">--><i class="fa fa-podcast" aria-hidden="true"></i><span>Guest Lectures</span></a>
						<a href="#"><!-- style="color:white">--><i class="fa fa-gamepad" aria-hidden="true"></i><span>Non Technical</span></a>
						<a href="#"><!-- style="color:white">--><i class="fa fa-bed" aria-hidden="true"></i><span>Hospitality</span></a>
						<a href="#"><!-- style="color:white">--><i class="fa fa-users" aria-hidden="true"></i><span>Teams</span></a>
						<a href="#"><!-- style="color:white">--><i class="fa fa-info-circle" aria-hidden="true"></i><span>About Us</span></a>
					</div>
				</nav>
				<button class="close-button" id="close-button">Close Menu</button>
			</div>
			<button class="menu-button" id="open-button">Open Menu</button>