<?php session_start(); 
	
	if(isset($_GET['delete']))
	{
		unset($_SESSION['cart']);
		session_destroy();
	}
	
	if(isset($_SESSION['cart']))
	{
		for($i = 0; $i < count($_SESSION['cart']['screenings']); $i++)
		{
			foreach ($_SESSION['cart']['screenings'][$i]['seats'] as $key => &$details)
			{
				if($key == 'SA')
				{
					$qty = $details['quantity'];
					while ($qty > 0)
					{
						$SA = 'SAi' . $qty;
						
						$SAi = isset($_POST[$SA]) ? $_POST[$SA] : "";
						if (!empty($SAi))
						{
							$details['seats'][] = $SAi;
						}
						
						$qty--;
					}
				}
				
				if($key == 'SC')
				{
					$qty = $details['quantity'];
					while ($qty > 0)
					{
						$SC = 'SCi' . $qty;
						
						$SCi = isset($_POST[$SC]) ? $_POST[$SC] : "";
						if (!empty($SCi))
						{
							$details['seats'][] = $SCi;
						}
						
						$qty--;
					}
				}
				
				if($key == 'SP')
				{
					$qty = $details['quantity'];
					while ($qty > 0)
					{
						$SP = 'SPi' . $qty;
						
						$SPi = isset($_POST[$SP]) ? $_POST[$SP] : "";
						if (!empty($SPi))
						{
							$details['seats'][] = $SPi;
						}
						
						$qty--;
					}
				}
				
				if($key == 'FA')
				{
					$qty = $details['quantity'];
					while ($qty > 0)
					{
						$FA = 'FAi' . $qty;
						
						$FAi = isset($_POST[$FA]) ? $_POST[$FA] : "";
						if (!empty($FAi))
						{
							$details['seats'][] = $FAi;
						}
						
						$qty--;
					}
				}
				
				if($key == 'FC')
				{
					$qty = $details['quantity'];
					while ($qty > 0)
					{
						$FC = 'FCi' . $qty;
						
						$FCi = isset($_POST[$FC]) ? $_POST[$FC] : "";
						if (!empty($FCi))
						{
							$details['seats'][] = $FCi;
						}
						
						$qty--;
					}
				}
				
				if($key == 'B1')
				{
					$qty = $details['quantity'];
					while ($qty > 0)
					{
						$B1 = 'B1i' . $qty;
						
						$B1i = isset($_POST[$B1]) ? $_POST[$B1] : "";
						if (!empty($B1i))
						{
							$details['seats'][] = $B1i;
						}
						
						$qty--;
					}
				}
				
				if($key == 'B2')
				{
					$qty = $details['quantity'];
					while ($qty > 0)
					{
						$B2 = 'B2i' . $qty;
						
						$B2i = isset($_POST[$B2]) ? $_POST[$B2] : "";
						if (!empty($B2i))
						{
							$details['seats'][] = $B2i;
						}
						
						$qty--;
					}
				}
				
				if($key == 'B3')
				{
					$qty = $details['quantity'];
					while ($qty > 0)
					{
						$B3 = 'B3i' . $qty;
						
						$B3i = isset($_POST[$B3]) ? $_POST[$B3] : "";
						if (!empty($B3i))
						{
							$details['seats'][] = $B3i;
						}
						
						$qty--;
					}
				}
			}
		}
	}
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
	<title>Finalise Your Booking || Silverado Cinema</title>
	<?php require('modules/module_head.php'); ?>
	<script>
		function returnValue()
		{
			var x = document.getElementById('code').value;
			console.log(x);
			if (check_promo(x) == false)
			{
				document.getElementById('error').innerHTML = "Incorrect code entered!";
				document.getElementById('error').style.fontSize = '20px';
				document.getElementById('error').style.color = 'red';
				document.getElementById('code').focus();
				document.getElementById('code').select();
				
				return false;
			}
		}
		
		function check_promo(promocode)
		{
			var code = promocode;
			console.log(promocode);

			var letterArray = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
			var checkOne = ((parseInt(code[0]) * parseInt(code[1]) + parseInt(code[2])) * parseInt(code[3]) + parseInt(code[4]))%26;
			console.log(checkOne);
			var checkTwo = ((parseInt(code[6]) * parseInt(code[7]) + parseInt(code[8])) * parseInt(code[9]) + parseInt(code[10]))%26;
			console.log(checkTwo);
			if(code[12] == letterArray[checkOne] && code[13] == letterArray[checkTwo])
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	</script>
</head>
<body>
	<header>
		<?php require('modules/module_header.php'); ?>
	</header>
	
	<nav>
		<?php require('modules/module_nav.php'); ?>
	</nav>
	
	<main class = "content">
	<div class="moreText">
		<h1>
			Reservation System
		</h1>
		<center><span>You can continue to browse the rest of the site, your booking details will be saved!</span></center><br><br><br>
		<form name="myForm" action="final_booking.php" onsubmit="return returnValue()" method="POST">
			<table id="contactTable">
			<?php 
				$total_cost = 0.00;
				$numberMovies = 0;
				if(isset($_SESSION['cart']))
				{
					if(count($_SESSION['cart']['screenings']) != 0)
					{
						for($j = 0; $j < count($_SESSION['cart']['screenings']); $j++)
						{
							$sub_total = 0.0;
							echo("Film: ");
							echo($_SESSION['cart']['screenings'][$j]['film']);
							echo('<br>');
							echo("Day: ");
							echo($_SESSION['cart']['screenings'][$j]['day']);
							echo('<br>');
							echo("Time: ");
							echo($_SESSION['cart']['screenings'][$j]['time']);
							echo('<br><br>');
							foreach ($_SESSION['cart']['screenings'][$j]['seats'] as $key => $details)
							{
								if($details['quantity'] != 0)
								{
									$qty = $details['quantity'];
									if($key == 'SA'){echo("Standard Adult Seat(s): ");}
									else if($key == 'SC'){echo("Standard Child Seat(s): ");}
									else if($key == 'SP'){echo("Standard Concession Seat(s): ");}
									else if($key == 'FA'){echo("First Class Adult Seat(s): ");}
									else if($key == 'FC'){echo("First Class Child Seat(s): ");}
									else if($key == 'B1'){echo("1 Person Beanbag(s): ");}
									else if($key == 'B2'){echo("Beanbag(s) for 2 People: ");}
									else if($key == 'B3'){echo("Beanbag(s) for 3 Children: ");}
									echo($qty . "<br>");
									$sub_total += $qty * $details['price'];
									echo('Seat Number(s): ');
									for($i = 0; $i < $qty; $i++)
									{
										echo($details['seats'][$i]);
										if($i + 1 < $qty){echo(", ");}
									}
									echo('<br>');
									echo('<br>');
								}
							}
							echo "Total = $" . $sub_total;
							$_SESSION['cart']['screenings'][$j]['sub-total'] = $sub_total;
							$total_cost += $sub_total;
							echo("<div style='text-align:right'><a href='?delete=yes'><i>Delete Cart</i></a></div>");
							echo('<br>');
						}						
					}
					
					$_SESSION['cart']['total'] = $total_cost;
				}
				else
				{
					echo("<center>");
					echo("<p>Cart is empty.</p>");
					echo("</center>");
				}
			?>
				<tr id="name">
					<td>
						<div class="moreText" class="contactTitle" style="font-size:20px;">Name:</div>
					</td>
					<td id="emailInput" class="contactInput">
						<input type="name" name="name" pattern="[a-zA-Z\s]+" required placeholder="Name" style="width:200px;"/>
					</td>
				</tr>
				<tr id="phone">
					<td>
						<div class="moreText" class="contactTitle" style="font-size:20px;">Mobile Number:</div>
					</td>
					<td id="emailInput" class="contactInput">
						<input type="phone" name="phone" pattern="^(\(04\)|04|\+614)[ ]?\d{4}[ ]?\d{4}$" placeholder="04 1234 1234" required style="width:200px;"/>
					</td>
				</tr>
				<tr id="email">
					<td>
						<div class="moreText" class="contactTitle" style="font-size:20px;">Email Address:</div>
					</td>
					<td id="emailInput" class="contactInput">
						<input type="email" name="email" placeholder="example@email.com" required style="width:200px;"/>
					</td>
				</tr>
				<br><br>
				<tr id="promo">
					<td>
						<div class="moreText" class="contactTitle" style="font-size:20px;">Promotion Code:</div>
					</td>
					<td id="emailInput" class="contactInput">
						<input type="text" id="code" name="promo" pattern="(^\d{5})[-](\d{5})[-]([A-Z]{2})" placeholder="Optional" style="width:200px;"/>
					</td>
				</tr>
				<tr>
					<td>
						<span id="error"></span>
						<br>
						<span style="font-size:20px;">Total Price of all Bookings = $<span id="total"><?php echo ($total_cost); ?></span></span>
					</td>
					<td>
						<input type="submit" class="buttonAF" name="submit" value="Reserve"/>
					</td>
				</tr>
			</table>
		</form>
	</div>
	</main>
	
	<footer id = "foot">
	  <?php require('modules/module_footer.php'); ?>
	</footer>
</body>
</html>