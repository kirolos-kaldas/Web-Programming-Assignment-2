<?php
	session_start();
	if(isset($_SESSION['cart']))
	{
		$name = isset($_SESSION['name']) ? $_SESSION['name'] : "";
		$phone = isset($_SESSION['phone']) ? $_SESSION['phone'] : "";
		$email = isset($_SESSION['email']) ? $_SESSION['email'] : "";
		$promo = isset($_SESSION['promo']) ? $_SESSION['promo'] : "";
	}
?>
<!doctype html>
<html>
	<head>
		<title>Ticket || Silverado Cinema</title>
		<?php require('modules/module_head.php'); ?>
	</head>
<body>
	<main class = "content" style="background-color: white;">
		<?php
			if(isset($_SESSION['cart']))
			{
				echo('<center>');
				echo("<table class='header' style='border: 2px dotted black;' id='page-wrap'");
				echo("<tr class='row'><td><div><center><img src='images/LOGO.PNG' height='190' width='190'></center></div></td></tr>");
				echo("<tr><td></td></tr>");
				echo("<tr class='row'><td><div id = 'qrCodeDiv'><center><img id='qrCode' width='90' src='images/qrcode.png' alt='' /></center></div></td></tr>");
				echo("<tr class='row'><td>----------------------------------------------</td></tr>");
				echo("<tr></tr>");
				echo("<tr></tr>");
				echo("<tr class='row'><td id='name'><center>" . $name . "</center></td></tr>");
				echo("<tr><td id='email' class='right'><center>" . $email . "</center></td></tr>");
				echo("<tr class='row'><td id='phone' class='right'><center>" . $phone . "</center></td></tr>");
				echo("<tr></tr>");
				echo("<tr></tr>");
				echo("<tr class='row'><td>----------------------------------------------</td></tr>");
				
				for($j = 0; $j < count($_SESSION['cart']['screenings']); $j++)
				{
					$costtotal = 0.0;
					echo("<tr></tr>");
					echo("<tr><td>");
					echo("<center>");
					echo($_SESSION['cart']['screenings'][$j]['film']);
					echo("</center>");
					echo("</td></tr>");
					
					echo('<br>');
					
					echo("<tr><td>");
					echo("<center>");
					echo($_SESSION['cart']['screenings'][$j]['day']);
					echo("</center>");
					echo("</td></tr>");
					
					echo('<br>');
					
					echo("<tr><td>");
					echo("<center>");
					echo($_SESSION['cart']['screenings'][$j]['time']);
					echo("</center>");
					echo("</td></tr>");
					
					echo('<br><br>');
					
					foreach ($_SESSION['cart']['screenings'][$j]['seats'] as $key => $details)
					{
						if($details['quantity'] != 0)
						{
							$qty = $details['quantity'];
							echo("<tr><td>");
							echo("<center>");
							echo($qty);
							if($key == 'SA'){echo(' x Standard Adult');}
							else if($key == 'SC'){echo(' x Standard Child');}
							else if($key == 'SP'){echo(' x Standard Concession');}
							else if($key == 'FA'){echo(' x First Class Adult');}
							else if($key == 'FC'){echo(' x First Class Child');}
							else if($key == 'B1'){echo(' x 1 Person Beanbag');}
							else if($key == 'B2'){echo(' x 2 People Beanbag');}
							else if($key == 'B3'){echo(' x 3 Children Beanbag');}
							echo("</center>");
							echo("</td></tr>");
							echo("<tr><td>");
							echo("<center>");
							echo('Seat(s): ');
							for($i = 0; $i < $qty; $i++)
							{
								echo($details['seats'][$i]);
								if($i + 1 < $qty){echo(", ");}
							}
							echo("</center>");
							echo("</td></tr>");
							echo('<br>');
						}
					}
					echo("<tr><td>");
					echo("<center>");
					echo("Sub-Total = $");
					echo($_SESSION['cart']['screenings'][$j]['sub-total']);
					echo("</center>");
					echo("</td></tr>");
					echo("<tr></tr>");
					echo("<tr></tr>");
					echo("<tr></tr>");
					echo("<tr></tr>");
					echo("<tr></tr>");
				}
				echo("<tr></tr>");
				echo("<tr></tr>");
				echo("<tr class='row'><td>----------------------------------------------</td></tr>");
				if ($promo != "")
				{
					echo("<tr></tr>");
					echo("<tr></tr>");
					echo("<tr><td>");
					echo("<center>");
					echo("Voucher Code: ");
					echo($promo);
					echo("</center>");
					echo("</td></tr>");
					echo("<tr><td>");
					echo("<center>");
					echo("Total = $");
					$grand_total = $_SESSION['cart']['total'] * ((100-20) / 100);
					$_SESSION['cart']['grand-total'] = $grand_total;
					echo($_SESSION['cart']['grand-total']);
					echo("</center>");
					echo("</td></tr>");
				}
				else
				{
					$_SESSION['cart']['grand-total'] = $_SESSION['cart']['total'];
					echo("<tr><td>");
					echo("<center>");
					echo("Voucher Code: None");
					echo("</center>");
					echo("</td></tr>");
					echo("<tr><td>");
					echo("<center>");
					echo("Total = $");
					echo($_SESSION['cart']['grand-total']);
					echo("</center>");
					echo("</td></tr>");
				}
				
				echo("<tr></tr>");
				echo("<tr></tr>");
				
				echo("</table><br />");
				echo('</center>');
			}
			else
			{
				echo("Cart is Empty.");
			}
		
			session_destroy();
		?>
	</main>
</body>
</html>