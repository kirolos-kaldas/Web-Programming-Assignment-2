<?php session_start();

	if(!isset($_SESSION['cart']))
	{
		$_SESSION['cart'] = array();
	}
	
	$film = isset($_POST['movie']) ? $_POST['movie'] : "";
	$day = isset($_POST['day']) ? $_POST['day'] : "";
	$time = isset($_POST['time']) ? $_POST['time'] : "";
	$SA = isset($_POST['SA']) ? $_POST['SA'] : "";
	$SC = isset($_POST['SC']) ? $_POST['SC'] : "";
	$SP = isset($_POST['SP']) ? $_POST['SP'] : "";
	$FA = isset($_POST['FA']) ? $_POST['FA'] : "";
	$FC = isset($_POST['FC']) ? $_POST['FC'] : "";
	$B1 = isset($_POST['B1']) ? $_POST['B1'] : "";
	$B2 = isset($_POST['B2']) ? $_POST['B2'] : "";
	$B3 = isset($_POST['B3']) ? $_POST['B3'] : "";
	
	$screenings['film'] = $film;
	$screenings['day'] = $day;
	$screenings['time'] = $time;
	
	$seats['SA']['quantity'] = $SA;
	$seats['SC']['quantity'] = $SC;
	$seats['SP']['quantity'] = $SP;
	$seats['FA']['quantity'] = $FA;
	$seats['FC']['quantity'] = $FC;
	$seats['B1']['quantity'] = $B1;
	$seats['B2']['quantity'] = $B2;
	$seats['B3']['quantity'] = $B3;
	
	foreach($seats as $type => $qty)
	{
		if ($seats[$type]['quantity'] != 0)
		{
			$screenings['seats'][$type] = $seats[$type];
			
			if ($time == "1:00pm" || $day == "Monday" || $day == "Tuesday")
			{
				if($type == 'SA'){$screenings['seats'][$type]['price'] = 12;}
				if($type == 'SP'){$screenings['seats'][$type]['price'] = 10;}
				if($type == 'SC'){$screenings['seats'][$type]['price'] = 8;}
				if($type == 'FA'){$screenings['seats'][$type]['price'] = 25;}
				if($type == 'FC'){$screenings['seats'][$type]['price'] = 20;}
				if($type == 'B1' || $type == 'B2' || $type == 'B3'){
					$screenings['seats'][$type]['price'] = 20;}
			}
			else
			{
				if($type == 'SA'){$screenings['seats'][$type]['price'] = 18;}
				if($type == 'SP'){$screenings['seats'][$type]['price'] = 15;}
				if($type == 'SC'){$screenings['seats'][$type]['price'] = 12;}
				if($type == 'FA'){$screenings['seats'][$type]['price'] = 30;}
				if($type == 'FC'){$screenings['seats'][$type]['price'] = 25;}
				if($type == 'B1' || $type == 'B2' || $type == 'B3'){
					$screenings['seats'][$type]['price'] = 30;}
			}
		}
	}
	
	$_SESSION['cart']['screenings'][] = $screenings;
		
	/*else 
	{
		$SA = isset($_SESSION['cart']['screenings'][count($_SESSION['cart']['screenings'])]['seats']['SA']) ? $_SESSION['cart']['screenings'][count($_SESSION['cart']['screenings'])]['seats']['SA'] : "";
		$SC = isset($_SESSION['cart']['screenings'][count($_SESSION['cart']['screenings'])]['seats']['SC']) ? $_SESSION['cart']['screenings'][count($_SESSION['cart']['screenings'])]['seats']['SC'] : "";
		$SP = isset($_SESSION['cart']['screenings'][count($_SESSION['cart']['screenings'])]['seats']['SP']) ? $_SESSION['cart']['screenings'][count($_SESSION['cart']['screenings'])]['seats']['SP'] : "";
		$FA = isset($_SESSION['cart']['screenings'][count($_SESSION['cart']['screenings'])]['seats']['FA']) ? $_SESSION['cart']['screenings'][count($_SESSION['cart']['screenings'])]['seats']['FA'] : "";
		$FC = isset($_SESSION['cart']['screenings'][count($_SESSION['cart']['screenings'])]['seats']['FC']) ? $_SESSION['cart']['screenings'][count($_SESSION['cart']['screenings'])]['seats']['FC'] : "";
		$B1 = isset($_SESSION['cart']['screenings'][count($_SESSION['cart']['screenings'])]['seats']['B1']) ? $_SESSION['cart']['screenings'][count($_SESSION['cart']['screenings'])]['seats']['B1'] : "";
		$B2 = isset($_SESSION['cart']['screenings'][count($_SESSION['cart']['screenings'])]['seats']['B2']) ? $_SESSION['cart']['screenings'][count($_SESSION['cart']['screenings'])]['seats']['B2'] : "";
		$B3 = isset($_SESSION['cart']['screenings'][count($_SESSION['cart']['screenings'])]['seats']['B3']) ? $_SESSION['cart']['screenings'][count($_SESSION['cart']['screenings'])]['seats']['B3'] : "";
	}*/
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
	<title>Reserve Your Seats || Silverado Cinema</title>
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
		<div class="moreText" style="font-size: 20px;">
		<form action="cart.php" method="POST"><div id="left">Reserve Your Seats:<br>
			
			<table>
			<tr>
			<td>
			<?php 
			echo "Film: ";
			echo($_SESSION['cart']['screenings'][count($_SESSION['cart']['screenings']) - 1]['film']);
			echo "<br>";
			
			echo "Day: ";
			echo($_SESSION['cart']['screenings'][count($_SESSION['cart']['screenings']) - 1]['day']);
			echo "<br>";
			
			echo "Time: "; 
			echo($_SESSION['cart']['screenings'][count($_SESSION['cart']['screenings']) - 1]['time']);
			echo "<br>";
			?>
			</td>
			<br>
			<br>
			<?php 
				if($SA != 0 || $SC != 0 || $SP != 0){
				echo('Select Standard Seats:<br> ');
				if($SA != 0){
					echo('Adult '); echo($SA.": ");
					$SAp=$SA;
					while($SAp>0){
						echo('<select name="SAi');
						echo($SAp);
						echo('"><option>E1</option><option>E2</option><option>E3</option><option>E4</option><option>E5</option><option>E6</option><option>E7</option><option>E8</option><option>E9</option><option>E10</option><option>E11</option><option>E12</option><option>E13</option><option>E14</option><option>F1</option><option>F2</option><option>F3</option><option>F4</option><option>F5</option><option>F6</option><option>F7</option><option>F8</option><option>F9</option><option>F10</option><option>F11</option><option>F12</option><option>F13</option><option>F14</option><option>G1</option><option>G2</option><option>G3</option><option>G4</option><option>G5</option><option>G6</option><option>G7</option><option>G8</option><option>G9</option><option>G10</option><option>G11</option><option>G12</option><option>G13</option><option>G14</option></select>');
						$SAp--;
					}
					echo('<br>');
				}
				if($SC != 0){
					echo('Child '); echo($SC.": ");
					$SCp=$SC;
					while($SCp>0){
						echo('<select name="SCi');
						echo($SCp);
						echo('"><option>E1</option><option>E2</option><option>E3</option><option>E4</option><option>E5</option><option>E6</option><option>E7</option><option>E8</option><option>E9</option><option>E10</option><option>E11</option><option>E12</option><option>E13</option><option>E14</option><option>F1</option><option>F2</option><option>F3</option><option>F4</option><option>F5</option><option>F6</option><option>F7</option><option>F8</option><option>F9</option><option>F10</option><option>F11</option><option>F12</option><option>F13</option><option>F14</option><option>G1</option><option>G2</option><option>G3</option><option>G4</option><option>G5</option><option>G6</option><option>G7</option><option>G8</option><option>G9</option><option>G10</option><option>G11</option><option>G12</option><option>G13</option><option>G14</option></select>');
						$SCp--;
					}
					echo('<br>');
				}
				if($SP != 0){
					echo('Concession '); echo($SP.": ");
					$SPp=$SP;
					while($SPp>0){
						echo('<select name="SPi');
						echo($SPp);
						echo('"><option>E1</option><option>E2</option><option>E3</option><option>E4</option><option>E5</option><option>E6</option><option>E7</option><option>E8</option><option>E9</option><option>E10</option><option>E11</option><option>E12</option><option>E13</option><option>E14</option><option>F1</option><option>F2</option><option>F3</option><option>F4</option><option>F5</option><option>F6</option><option>F7</option><option>F8</option><option>F9</option><option>F10</option><option>F11</option><option>F12</option><option>F13</option><option>F14</option><option>G1</option><option>G2</option><option>G3</option><option>G4</option><option>G5</option><option>G6</option><option>G7</option><option>G8</option><option>G9</option><option>G10</option><option>G11</option><option>G12</option><option>G13</option><option>G14</option></select>');						
						$SPp--;
					}
					echo('<br><br>');
				}
			}
			if($FA != 0 || $FC != 0){
				echo('Select First Class Seats:<br> ');
				if($FA != 0){
					echo('Adult '); echo($FA.": ");
					$FAp=$FA;
					while($FAp>0){
						echo('<select name="FAi');
						echo($FAp);
						echo('"><option>E1</option><option>E2</option><option>E3</option><option>E4</option><option>E5</option><option>E6</option><option>E7</option><option>E8</option><option>E9</option><option>E10</option><option>E11</option><option>E12</option><option>E13</option><option>E14</option><option>F1</option><option>F2</option><option>F3</option><option>F4</option><option>F5</option><option>F6</option><option>F7</option><option>F8</option><option>F9</option><option>F10</option><option>F11</option><option>F12</option><option>F13</option><option>F14</option><option>G1</option><option>G2</option><option>G3</option><option>G4</option><option>G5</option><option>G6</option><option>G7</option><option>G8</option><option>G9</option><option>G10</option><option>G11</option><option>G12</option><option>G13</option><option>G14</option></select>');						
						$FAp--;
					}
					echo('<br>');
				}
				if($FC != 0){
					echo('Child '); echo($FC.": ");
					$FCp=$FC;
					while($FCp > 0)
					{
						echo('<select name="FCi');
						echo($FCp);
						echo('"><option>E1</option><option>E2</option><option>E3</option><option>E4</option><option>E5</option><option>E6</option><option>E7</option><option>E8</option><option>E9</option><option>E10</option><option>E11</option><option>E12</option><option>E13</option><option>E14</option><option>F1</option><option>F2</option><option>F3</option><option>F4</option><option>F5</option><option>F6</option><option>F7</option><option>F8</option><option>F9</option><option>F10</option><option>F11</option><option>F12</option><option>F13</option><option>F14</option><option>G1</option><option>G2</option><option>G3</option><option>G4</option><option>G5</option><option>G6</option><option>G7</option><option>G8</option><option>G9</option><option>G10</option><option>G11</option><option>G12</option><option>G13</option><option>G14</option></select>');						
						$FCp--;
					}
					echo('<br><br>');
				}
			}
			if($B1 != 0 || $B2 != 0 || $B3 != 0)
			{
				echo('Select Bean Bags:<br> ');
				if($B1 != 0)
				{
					echo('1 Person '); echo($B1.": ");
					$B1p=$B1;
					while($B1p > 0)
					{
						echo('<select name="B1i');
						echo($B1p);
						echo('"><option>E1</option><option>E2</option><option>E3</option><option>E4</option><option>E5</option><option>E6</option><option>E7</option><option>E8</option><option>E9</option><option>E10</option><option>E11</option><option>E12</option><option>E13</option><option>E14</option><option>F1</option><option>F2</option><option>F3</option><option>F4</option><option>F5</option><option>F6</option><option>F7</option><option>F8</option><option>F9</option><option>F10</option><option>F11</option><option>F12</option><option>F13</option><option>F14</option><option>G1</option><option>G2</option><option>G3</option><option>G4</option><option>G5</option><option>G6</option><option>G7</option><option>G8</option><option>G9</option><option>G10</option><option>G11</option><option>G12</option><option>G13</option><option>G14</option></select>');						
						$B1p--;
					}
					echo('<br>');
				}
				if($B2 != 0)
				{
					echo('2 People '); echo($B2.": ");
					$B2p=$B2;
					while($B2p > 0)
					{
						echo('<select name="B2i');
						echo($B2p);
						echo('"><option>E1</option><option>E2</option><option>E3</option><option>E4</option><option>E5</option><option>E6</option><option>E7</option><option>E8</option><option>E9</option><option>E10</option><option>E11</option><option>E12</option><option>E13</option><option>E14</option><option>F1</option><option>F2</option><option>F3</option><option>F4</option><option>F5</option><option>F6</option><option>F7</option><option>F8</option><option>F9</option><option>F10</option><option>F11</option><option>F12</option><option>F13</option><option>F14</option><option>G1</option><option>G2</option><option>G3</option><option>G4</option><option>G5</option><option>G6</option><option>G7</option><option>G8</option><option>G9</option><option>G10</option><option>G11</option><option>G12</option><option>G13</option><option>G14</option></select>');						
						$B2p--;
					}
					echo('<br>');
				}
				if($B3 != 0)
				{
					echo('3 Children '); echo($B3.": ");
					$B3p=$B3;
					while($B3p > 0)
					{
						echo('<select name="B3i');
						echo($B3p);
						echo('"><option>E1</option><option>E2</option><option>E3</option><option>E4</option><option>E5</option><option>E6</option><option>E7</option><option>E8</option><option>E9</option><option>E10</option><option>E11</option><option>E12</option><option>E13</option><option>E14</option><option>F1</option><option>F2</option><option>F3</option><option>F4</option><option>F5</option><option>F6</option><option>F7</option><option>F8</option><option>F9</option><option>F10</option><option>F11</option><option>F12</option><option>F13</option><option>F14</option><option>G1</option><option>G2</option><option>G3</option><option>G4</option><option>G5</option><option>G6</option><option>G7</option><option>G8</option><option>G9</option><option>G10</option><option>G11</option><option>G12</option><option>G13</option><option>G14</option></select>');						
						$B3p--;
					}
					echo('<br><br>');
				}
			} ?>
			
			<td>
				<div id="right"><img src="images/cinemaseat.jpg" width=500px style="margin-left: 200px;" /></div>
			</td>
			</tr>
			</table>
			<br><br>
			<input type="submit" class="buttonAF" value="Submit"></input>
			</div></form></div>
			<br><br>
	</main>
	
	<footer id = "foot">
	  <?php require('modules/module_footer.php'); ?>
	</footer>
</body>
</html>