<?php session_start(); ?>
<!doctype html>
<html>
<head>
	<title>Times & Price || Silverado Cinema</title>
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
		<h2>
			Cinema Pricing
		</h2><br>
		<table class="pricesTable">
			<thead>
				<tr class="tableHeadings">
					<th class="heading">Price List</th>
					<th class="heading">Monday - Tuesday(All Day) <br> Monday - Friday(1pm only)</th>
					<th class="heading">Wednesday - Friday(not 1pm) <br> Saturday - Sunday(All Day)</th>
				</tr>
			</thead>
			<tr style="background-color:#cccccc;">
				<td>Full</td>
				<td>$12</td>
				<td>$18</td>
				
			</tr>
			<tr style="background-color:#cccccc;">
				<td>Concession</td>
				<td>$10</td>
				<td>$15</td>
			</tr>
			<tr style="background-color:#cccccc;">
				<td>Child</td>
				<td>$8</td>
				<td>$12</td>
			</tr>
			<tr style="background-color:#cccccc;">
				<td>First Class - Adult</td>
				<td>$25</td>
				<td>$30</td>
			</tr>
			<tr style="background-color:#cccccc;">
				<td>First Class - Child</td>
				<td>$20</td>
				<td>$25</td>
			</tr>
			<tr style="background-color:#cccccc;">
				<td>Beanbag*</td>
				<td>$20</td>
				<td>$30</td>
			</tr>
		</table><br><br><br>
			
		<h2>
			Weekly Schedule
		</h2><br>
		<table class="pricesTable">
			<thead>
				<tr class="tableHeadings">
					<th class="heading">Monday - Tuesday</th>
					<th class="heading">Wednesday - Friday</th>
					<th class="heading">Saturday - Sunday</th>
				</tr>
			</thead>
			<tr style="background-color:#cccccc;">
				<td>1pm - Inside Out</td>
				<td>1pm - Vacation</td>
				<td>12pm - Inside Out</td>
			</tr>
			<tr style="background-color:#cccccc;">
				<td>6pm - The Age of Adaline</td>
				<td>6pm - Inside Out</td>
				<td>3pm - The Age of Adaline</td>
			</tr>
			<tr style="background-color:#cccccc;">
				<td>9pm - Vacation</td>
				<td>9pm - Hitman: Agent 47</td>
				<td>6pm - Vacation</td>
			</tr>
			<tr style="background-color:#cccccc;">
				<td></td>
				<td></td>
				<td>9pm - Hitman: Agent 47</td>
			</tr>
		</table>
	</main>
	
	<footer id = "foot">
	  <?php require('modules/module_footer.php'); ?>
	</footer>
</body>
</html>