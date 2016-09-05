<?php session_start(); ?>
<!doctype html>
<html>
<head>
	<title>Contact Us || Silverado Cinema</title>
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
	
	<main class="content">
		<h1>
			Contact us
		</h1><br><br><br>
		<form action="http://titan.csit.rmit.edu.au/~e54061/wp/testcontact.php" method="post" name="contactForm">
			<table id="contactTable">
				<tr id="email">
					<td><div class="moreText" class="contactTitle" style="font-size:20px;">Email:</div></td>
					<td id="emailInput" class="contactInput"><input type="email" name="email" required style="width:200px;"/></td>
				</tr>
				<tr id="subject">
					<td><div class="moreText" class="contactTitle" style="font-size:20px;">Subject:</div></td>
					<td id="subjectInput" class="contactInput">
						<select name="subject" style="width:200px;" required>
							<option value="">Choose here:</option>
							<option value="Function Enquiry">Function Enquiry</option>
							<option value="Feedback">Feedback</option>
							<option value="Other">Other</option>
						</select>
					</td>
				</tr>
				<tr id="message">
					<td><div class="moreText" class="contactTitle" style="font-size:20px;">Message:</div></td>
					<td id="messageInput" class="contactInput"><textarea name="message" style="width:200px; height:50px;" required></textarea></td>
				</tr>
				<tr id="submit">
					<td id="submitTitle" class="moreText"></td>
					<td id="submitInput" class="contactInput"><input id="submitButton" type="submit" class="buttonAF" value="Submit" /></td>
				</tr>
			</table>
		</form><br><br><br><br><br><br><br><br><br>
	</main>
	
	<footer id = "foot">
	  <?php require('modules/module_footer.php'); ?>
	</footer>
</body>
</html>