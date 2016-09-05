<?php session_start();
	$name = isset($_POST['name']) ? $_POST['name'] : "";
	$phone = isset($_POST['phone']) ? $_POST['phone'] : "";
	$email = isset($_POST['email']) ? $_POST['email'] : "";
	$promo = isset($_POST['promo']) ? $_POST['promo'] : "";
	
	$_SESSION['name'] = $name;
	$_SESSION['phone'] = $phone;
	$_SESSION['email'] = $email;
	$_SESSION['promo'] = $promo;
?>
<!doctype html>
<html>
<style>
	body {
		background-image: url("images/background.jpg");
		background-color: black;
		width: 75%;
		margin: auto;
	}
</style>
<head>
	<title>Confirmation || Silverado Cinema</title>
	<?php require('modules/module_head.php'); ?>
</head>
<body>
	<header>
		<?php require('modules/module_header.php'); ?>
	</header>
	
	<nav>
		<?php require('modules/module_nav.php'); ?>
	</nav>
	
	<main class = "content">
		<h1>
			Booking Successful
		</h1><br><br><br>
		<div class="moreText">
		<center>
		<?php echo($name); ?>, your booking has been confirmed!<br />
		</center>
            
		<form id="printTicket" action="print_ticket.php" method="post">
			<input type="hidden" value="<?php echo($name); ?>" name="name" />
			<input type="hidden" value="<?php echo($phone); ?>" name="phone" />
			<input type="hidden" value="<?php echo($email); ?>" name="email" />
			<input type="hidden" value="<?php echo($promo); ?>" name="promo" />
			<br>
			<center>
			<input type="submit" class="buttonAF" value="Print" />
			</center>
		</form>
		</div>
	</main>
	
	<footer id = "foot">
	  <?php require('modules/module_footer.php'); ?>
	</footer>
</body>
</html>