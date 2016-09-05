<?php session_start(); ?>
<!doctype html>
<html>
<head>
	<title>Welcome To Silverado Cinema</title>
	<?php require('modules/module_head.php'); ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script>
		$(document).ready(function () {
		  $('#status').html('Loading movies ...');
			$.post("https://titan.csit.rmit.edu.au/~e54061/wp/moviesJSON.php", 
			  function (data, status) {
				
				$('#status').html('');
				array = $.parseJSON(data);
				
				$.each(array, function(i, item)
				{
					if (i == 'AC')
					{
						$('#titleAC').html(item.title);
						$('#summaryAC').html(item.summary);
						$('#imageAC').html("<img src = " + item.poster + " alt = poster />");
						$('#ratingAC').html("<img src = " + item.rating + " alt = rating />");
						$('#trailerAC').html("<video src = " + item.trailer + " controls/>");
						$.each(array, function(i, desc)
						{
							$('#descAC').html(item.description);
						});
						$.each(item.screenings, function(i, sc)
						{
							$('#screeningAC').append("Day: " + i + " Time: " + sc + "<br>");
						});
					}
					else if (i == 'AF')
					{
						$('#titleAF').html(item.title);
						$('#summaryAF').html(item.summary);
						$('#imageAF').html("<img src = " + item.poster + " alt = poster />");
						$('#ratingAF').html("<img src = " + item.rating + " alt = rating />");
						$('#trailerAF').html("<video src = " + item.trailer + " controls/>");
						$.each(array, function(i, desc)
						{
							$('#descAF').html(item.description);
						});
						$.each(item.screenings, function(i, sc)
						{
							$('#screeningAF').append("Day: " + i + " Time: " + sc + "<br>");
						});
					}
					else if (i == 'RC')
					{
						$('#titleRC').html(item.title);
						$('#summaryRC').html(item.summary);
						$('#imageRC').html("<img src = " + item.poster + " alt = poster />");
						$('#ratingRC').html("<img src = " + item.rating + " alt = rating />");
						$('#trailerRC').html("<video src = " + item.trailer + " controls/>");
						$.each(array, function(i, desc)
						{
							$('#descRC').html(item.description);
						});
						$.each(item.screenings, function(i, sc)
						{
							$('#screeningRC').append("Day: " + i + " Time: " + sc + "<br>");
						});
					}
					else if (i == 'CH')
					{
						$('#titleCH').html(item.title);
						$('#summaryCH').html(item.summary);
						$('#imageCH').html("<img src = " + item.poster + " alt = poster />");
						$('#ratingCH').html("<img src = " + item.rating + " alt = rating />");
						$('#trailerCH').html("<video src = " + item.trailer + " controls/>");
						$.each(array, function(i, desc)
						{
							$('#descCH').html(item.description);
						});
						$.each(item.screenings, function(i, sc)
						{
							$('#screeningCH').append("Day: " + i + " Time: " + sc + "<br>");
						});
					}
				});
			  });
		});
	
	$(document).ready(function(){
		$(".buttonAC").click(function(){
			$(".trailerAC").toggle(1000);
		});
	});
	
	$(document).ready(function(){
		$(".buttonAF").click(function(){
			$(".trailerAF").toggle(1000);
		});
	});
	
	$(document).ready(function(){
		$(".buttonRC").click(function(){
			$(".trailerRC").toggle(1000);
		});
	});
	
	$(document).ready(function(){
		$(".buttonCH").click(function(){
			$(".trailerCH").toggle(1000);
		});
	});
		
	</script>
	<style>
		body {
			background-image: url("images/background.jpg");
			background-color: black;
			width: 75%;
			margin: auto;
			color:white;
			font-family: Arial, Helvetica, sans-serif;
		}
	</style>
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
			Now Showing
			<br><br>
		</h1>
		
		<p id='status'></p>
		
		<table>
		<div id="AC">
			<tr>
				<th colspan="2"><h2 id="titleAC"></h2></th>
			</tr>
			
			<tr>
			<td width="160px">
				<div id="imageAC"></div>
				<div id="ratingAC"></div>	
			</td>
			
			<td>
				<div >Summary:</div>
				<div id="summaryAC"></div>
				<br>
				<div >Description:</div>
				<div id="descAC"></div>
			</td>
			</tr>
			
			<tr>
			<td colspan="2">
				<button class="buttonAC">Read More</button>
				<center>
					<div id="trailerAC" class="trailerAC" style="display:none"></div>
				</center>
					<div id="screeningAC" class="trailerAC" style="display:none;"></div>
			</td>
			</tr>

		</div>
		
		
		<div id="AF">
			<tr>
				<th colspan="2"><h2 id="titleAF"></h2></th>
			</tr>
			
			<tr>
			<td width="160px">
				<div id="imageAF"></div>
				<div id="ratingAF"></div>
			</td>
			
			<td>
				<div >Summary:</div>
				<div id="summaryAF"></div>
				<br>
				<div >Description:</div>
				<div id="descAF"></div>
			</td>
			</tr>
			
			<tr>
			<td colspan="2">
				<button class="buttonAF">Read More</button>
				<center>
					<div id="trailerAF" class="trailerAF" style="display:none"></div>
				</center>
				<div id="screeningAF" class="trailerAF" style="display:none;"></div>
			</td>
			</tr>	
		</div>
		
		
		
		<div id="RC">
			<tr> 
				<th colspan="2"><h2 id="titleRC"></h2></th>
			</tr>

			<tr>
			<td width="160px">
				<div id="imageRC"></div>
				<div id="ratingRC"></div>
			</td>
			
			<td>
				<div >Summary:</div>
				<div id="summaryRC"></div>
				<br>
				<div >Description:</div>
				<div id="descRC"></div>
			</td>
			</tr>
			
			<tr>
			<td colspan="2">
				<button class="buttonRC">Read More</button>
				<center>
					<div id="trailerRC" class="trailerRC" style="display:none"></div>
				</center>
				<div id="screeningRC" class="trailerRC" style="display:none;"></div>
			</td>
			</tr>	
		</div>


		<div id="CH">
			<tr>
				<th colspan="2"><h2 id="titleCH" ></h2></th>
			</tr>
			
			<tr>
			<td width="160px">
				<div id="imageCH"></div>
				<div id="ratingCH"></div>
			</td>
			
			<td>
				<div >Summary:</div>				
				<div id="summaryCH"></div>
				<br>
				<div >Description:</div>
				<div id="descCH"></div>
			</td>
			</tr>
			
			<tr>
			<td colspan="2">
				<button class="buttonCH">Read More</button>	
				<center>
					<div id="trailerCH" class="trailerCH" style="display:none"></div>
				</center>
				<div id="screeningCH" class="trailerCH" style="display:none;"></div>
			</td>
			</tr>
		</div>
		</table>
		
	</main>
	<footer id = "foot">
	  <?php require('modules/module_footer.php'); ?>
	</footer>
	
	
</body>
</html>