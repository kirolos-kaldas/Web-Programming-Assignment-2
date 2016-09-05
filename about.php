<?php session_start(); ?>
<!doctype html>
<html>
<head>
	<title>About Us || Silverado Cinema</title>
	<?php require('modules/module_head.php'); ?>
</head>
<style>
	body {
		background-image: url("images/background.jpg");
		background-color: black;
		width: 75%;
		margin: auto;
	}
</style>
<body>
	<header>
		<?php require('modules/module_header.php'); ?>
	</header>
	
	<nav>
		<?php require('modules/module_nav.php'); ?>
	</nav>
	
	<main class = "content">
		<h1>
			Did You Know?
		</h1>
		<p class="moreText">A small cinema business called "Silverado" is located in a medium 
		sized country town and has asked you to develop their website to promote 
		its business, to take online bookings. The Silverado Cinema knows that 
		cannot compete with the major chains (Village, Hoyts) which are located 
		some distance away in larger towns and has relied too long on the loyalty 
		and laziness of locals for business. A few months ago, the client decided 
		to close for renovations, upgrade their cinema seating, install new 3D 
		projection facilities, new Dolby lighting and sound. Silverado Cinema 
		is to be expected to have a grand reopening in a few months time and 
		this website will be ready to launch he new cinema.</p><br><br>
		
		<h2>
			New Cinema Floor Plans
		</h2><br>
		<img class="imageCinema" src="images/cinema.PNG" width=80% /><br/>
		<p class="moreText">
			40 Normal seats (Full, Concession and Child under 12 pricing
			options)<br>
			12 First Class seats (Full and
			Child pricing options)<br>
			13 Bean Bag seats that can
			accommodate 2 adults, 1 adult + 1
			child OR 3 children (under 12)<br>
		</p>
	</main>
	
	<footer>
		<?php require('modules/module_footer.php'); ?>
	</footer>
</body>
</html>