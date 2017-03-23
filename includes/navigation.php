<?php
$current_page = basename($_SERVER['PHP_SELF']);
$current_menu = "current-menu-item";

?>
<nav id="nav" class="nav">					
			<ul id="main_menu" class="navigation menu nav">
				<li  class="menu-item <?php if($current_page == "" || $current_page == "index.php"){echo $current_menu;}?> "><a href="index.php">Home</a></li>
				<li  class="menu-item <?php if($current_page == "html.php"){echo $current_menu;}?> "><a href="html.php">HTML</a></li>
				<li  class="menu-item <?php if($current_page == "css.php"){echo $current_menu;}?> "><a href="css.php">CSS</a></li>
				<li  class="menu-item <?php if($current_page == "php.php"){echo $current_menu;}?> "><a href="php.php">PHP</a></li>
				<li  class="menu-item <?php if($current_page == "mysql.php"){echo $current_menu;}?> "><a href="mysql.php">MySql</a></li>
			</ul>
		</nav>