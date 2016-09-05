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
	<title>Book a Movie || Silverado Cinema</title>
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
		<form action="seatreservation.php" method="POST">
			<p class="text"><b>List information about the movie:</b></p>
			<table class="tableInfo">
				<tr>
					<td><p class="moreText">Select Movie:</p></td>
					<td><p><select name="movie" id="filmname" onmouseleave="getDetails()" onclick="resetprices()">
							<option value="" disabled="disabled" selected="selected">Please select a Film</option>
							<option id="Action">Mission Impossible: Rogue Nation</option>
							<option id="romcom">Train Wreck</option>	
							<option id="Art">Girlhood</option>
							<option id="Childrens">Inside Out</option>
						</select></p>
					</td>
				</tr>
				<tr>
					<td><p class="moreText">Select Day:</p></td>
					<td>
						<p><select name="day" id="day" onmouseleave="gettimes()" onclick="resetprices()">
							<option value="" disabled="true" selected="selected">Please select a Day</option>
							<option id="mon" disabled="true">Monday</option>
							<option id="tues" disabled="true">Tuesday</option>
							<option id="wed" disabled="true">Wednesday</option>
							<option id="thur" disabled="true">Thursday</option>
							<option id="fri" disabled="true">Friday</option>
							<option id="sat" disabled="true">Saturday</option>
							<option id="sun" disabled="true">Sunday</option>
						</select></p>
					</td>
				</tr>
				<tr>
					<td><p class="moreText">Select Time:</p></td>
					<td>
						<p><select name="time" id="time">
							<option selected="selected">Select Film and Day for time</option>
						</select></p>
					</td>
				</tr>
			</table>
			<p> <br>
				<p class="text"><b>Table of tickets and display price:</b></p>
				<table class="table" style="width:100%">
					<tr>
						<td>Ticket Type</td>
						<td>Quantity</td>
						<td>Subtotal</td>
					</tr>
					<tr>
						<td>Adult</td>
						<td>
							<input type='button' value='-' onclick="minusquantityNorm('SA')" />
							<input type='text' value='0' id='SA' name="SA" />
							<input type='button' value='+' onclick="addquantityNorm('SA')"/>
						</td>
						<td>
							$ <input type='text' disabled value='0' id='SAp' />
						</td>
					</tr>
					<tr>
						<td>Concession</td>
						<td>
							<input type='button' value='-' onclick="minusquantityNorm('SP')" />
							<input type='text' value='0' id='SP' name="SP" />
							<input type='button' value='+' onclick="addquantityNorm('SP')"/>
						</td>
						<td>
							$ <input type='text' disabled value='0' id='SPp' />
						</td>
					</tr>
					<tr>
						<td>Child</td>
						<td>
							<input type='button' value='-' onclick="minusquantityNorm('SC')" />
							<input type='text' value='0' id='SC' name="SC" />
							<input type='button' value='+' onclick="addquantityNorm('SC')"/>
						</td>
						<td>
							$ <input type='text' disabled value='0' id='SCp' />
						</td>
					</tr>
					<tr>
						<td>First Class - Adult</td>
						<td>
							<input type='button' value='-' onclick="minusquantityFirst('FA')" />
							<input type='text' value='0' id='FA' name="FA" />
							<input type='button' value='+' onclick="addquantityFirst('FA')"/>
						</td>
						<td>
							$ <input type='text' disabled value='0' id='FAp' />
						</td>
					</tr>
					<tr>
						<td>First Class - Child</td>
						<td>
							<input type='button' value='-' onclick="minusquantityFirst('FC')" />
							<input type='text' value='0' id='FC' name="FC" />
							<input type='button' value='+' onclick="addquantityFirst('FC')"/>
						</td>
						<td>
							$ <input type='text' disabled value='0' id='FCp' />
						</td>
					</tr>
					<tr>
						<td>Beanbag - 1 Person</td>
						<td>
							<input type='button' value='-' onclick="minusquantityBean('B1')" />
							<input type='text' value='0' id='B1' name="B1" />
							<input type='button' value='+' onclick="addquantityBean('B1')"/>
						</td>
						<td>
							$ <input type='text' disabled value='0' id='B1p' />
						</td>
					</tr>
					<tr>
						<td>Beanbag - 2 People</td>
						<td>
							<input type='button' value='-' onclick="minusquantityBean('B2')" />
							<input type='text' value='0' id='B2' name="B2" />
							<input type='button' value='+' onclick="addquantityBean('B2')"/>
						</td>
						<td>
							$ <input type='text' disabled value='0' id='B2p' />
						</td>
					</tr>
					<tr>
						<td>Beanbag - 3 Children</td>
						<td>
							<input type='button' value='-' onclick="minusquantityBean('B3')" />
							<input type='text' value='0' id='B3' name="B3" />
							<input type='button' value='+' onclick="addquantityBean('B3')"/>
						</td>
						<td>
							$ <input type='text' disabled value='0' id='B3p' />
						</td>
					</tr>
					<tr><td></td><td></td><td>Total Price</td></tr>
					<tr><td></td><td></td><td>$ <input type='text' value='0' name="price" id='total' /></td></tr>
					<tr><td></td><td></td><td><input type="hidden" name="peak" id="peaktime" value="off"></input></td></tr>
					<tr><td><input type="submit" class="buttonAF" value="Submit"/></td></tr>
				</table>
			</p>
		</form>
		<script>
		var s1 = false;
		var s2 = false;
		var s3 = false;
		var q1 = 0;
		var q2 = 0;
		var q3 = 0;
			function getDetails() {
				reset();
				gettimes();
				if (document.getElementById("filmname").options[1].selected == true){
					var i = 3;
					while (i < 8){
						document.getElementById("day").options[i].disabled = false;	
						i++;
					}
				}
				if (document.getElementById("filmname").options[2].selected == true){
					var i = 1;
					while (i < 8){
						document.getElementById("day").options[i].disabled = false;	
						i++;
					}
				}
				if (document.getElementById("filmname").options[3].selected == true){
					var i = 1;
					for(i; i<9; i++){
						if (i < 3 || i > 5){
							document.getElementById("day").options[i].disabled = false;	
						}
					}
				}
				if (document.getElementById("filmname").options[4].selected == true){
					var i = 1;
					while (i < 8){
						document.getElementById("day").options[i].disabled = false;	
						i++;
					}
				}
			}
			function gettimes(){
				s1=false;
				s2=false;
				s3=false;
				for (var j=1; j<3; j++){
					s1 = document.getElementById("day").options[j].selected;
					if (s1 == true){
						j = 10;
					}
				}
				for (var k=3; k<6; k++){
					s2 = document.getElementById("day").options[k].selected;
					if (s2 == true){
						k = 10;
					}
				}
				for (var l=6; l<8; l++){
					s3 = document.getElementById("day").options[l].selected;
					if (s3 == true){
						l = 10;
					}
				}
				if (s1==true && document.getElementById("filmname").options[2].selected == true){
					document.getElementById("time").options[0].text = "9:00pm";
				}
				if (s2==true && document.getElementById("filmname").options[2].selected == true){
					document.getElementById("time").options[0].text = "1:00pm";
				}
				if (s3==true && document.getElementById("filmname").options[2].selected == true){
					document.getElementById("time").options[0].text = "6:00pm";
				}
				if (s2==true && document.getElementById("filmname").options[1].selected == true){
					document.getElementById("time").options[0].text = "9:00pm";
				}
				if (s3==true && document.getElementById("filmname").options[1].selected == true){
					document.getElementById("time").options[0].text = "9:00pm";
				}
				if (s1==true && document.getElementById("filmname").options[3].selected == true){
					document.getElementById("time").options[0].text = "6:00pm";
				}
				if (s3==true && document.getElementById("filmname").options[3].selected == true){
					document.getElementById("time").options[0].text = "3:00pm";
				}
				if (s1==true && document.getElementById("filmname").options[4].selected == true){
					document.getElementById("time").options[0].text = "1:00pm";
				}
				if (s2==true && document.getElementById("filmname").options[4].selected == true){
					document.getElementById("time").options[0].text = "6:00pm";
				}
				if (s3==true && document.getElementById("filmname").options[4].selected == true){
					document.getElementById("time").options[0].text = "12:00pm";
				}
			}
			function reset(){
				for(var i=1; i<8; i++){
					document.getElementById("day").options[i].disabled = true;
				}
				document.getElementById("time").options[0].text = "Select Film and Day for time";
			}
			function addquantityBean(x){
				if(document.getElementById("time").options[0].text != "Select Film and Day for time"){
					var q= document.getElementById(x).value;
					var price = pricefinder(x);
					if (q3 < 13){
						q++;
						q3++;
					}
					document.getElementById(x).value = q;
					var v = document.getElementById(x+'p').value;
					v = q*price;
					document.getElementById(x+'p').value = v.toFixed(2);
					findtotal();
				}
			}
			function addquantityNorm(x){
				if(document.getElementById("time").options[0].text != "Select Film and Day for time"){
					var q= document.getElementById(x).value;
					var price = pricefinder(x);
					if (q1 < 40){
						q++;
						q1++;
					}
					document.getElementById(x).value = q;
					var v = document.getElementById(x+'p').value;
					v = q*price;
					document.getElementById(x+'p').value = v.toFixed(2);
					findtotal();
				}
			}
			function addquantityFirst(x){
				if(document.getElementById("time").options[0].text != "Select Film and Day for time"){
					var q= document.getElementById(x).value;
					var price = pricefinder(x);
					if (q2 < 12){
						q++;
						q2++;
					}
					document.getElementById(x).value = q;
					var v = document.getElementById(x+'p').value;
					v = q*price;
					document.getElementById(x+'p').value = v.toFixed(2);
					findtotal();
				}
			}
			function minusquantityBean(x){
				if(document.getElementById("time").options[0].text != "Select Film and Day for time"){
					var q= document.getElementById(x).value;
					var price = pricefinder(x);
					if (q > 0){
						q--;
						q3--;
					}
					document.getElementById(x).value = q;
					var v = document.getElementById(x+'p').value;
					v = q*price;
					document.getElementById(x+'p').value = v.toFixed(2);
					findtotal();
				}
			}
			function minusquantityNorm(x){
				if(document.getElementById("time").options[0].text != "Select Film and Day for time"){
					var q= document.getElementById(x).value;
					var price = pricefinder(x);
					if (q > 0){
						q--;
						q1--;
					}
					document.getElementById(x).value = q;
					var v = document.getElementById(x+'p').value;
					v = q*price;
					document.getElementById(x+'p').value = v.toFixed(2);
					findtotal();
				}
			}
			function minusquantityFirst(x){
				if(document.getElementById("time").options[0].text != "Select Film and Day for time"){
					var q= document.getElementById(x).value;
					var price = pricefinder(x);
					if (q > 0){
						q--;
						q2--;
					}
					document.getElementById(x).value = q;
					var v = document.getElementById(x+'p').value;
					v = q*price;
					document.getElementById(x+'p').value = v.toFixed(2);
					findtotal();
				}
			}
			function pricefinder(id){
				var price = 0;
				if (document.getElementById("time").options[0].text == "1:00pm" || s1 == true){
					if(id == 'SA'){price = 12;}
					if(id == 'SP'){price = 10;}
					if(id == 'SC'){price = 8;}
					if(id == 'FA'){price = 25;}
					if(id == 'FC'){price = 20;}
					if(id == 'B1' || id == 'B2' || id == 'B3'){price = 20;}
					document.getElementById("peaktime").value = "off";
				}
				else{
					if(id == 'SA'){price = 18;}
					if(id == 'SP'){price = 15;}
					if(id == 'SC'){price = 12;}
					if(id == 'FA'){price = 30;}
					if(id == 'FC'){price = 25;}
					if(id == 'B1' || id == 'B2' || id == 'B3'){price = 30;}
					document.getElementById("peaktime").value = "on";
				}
				return price;
			}
			function resetprices(){
				document.getElementById('SA').value = 0;
				document.getElementById('SP').value = 0;
				document.getElementById('SC').value = 0;
				document.getElementById('FA').value = 0;
				document.getElementById('FC').value = 0;
				document.getElementById('B1').value = 0;
				document.getElementById('B2').value = 0;
				document.getElementById('B3').value = 0;
				document.getElementById('SAp').value = 0;
				document.getElementById('SPp').value = 0;
				document.getElementById('SCp').value = 0;
				document.getElementById('FAp').value = 0;
				document.getElementById('FCp').value = 0;
				document.getElementById('B1p').value = 0;
				document.getElementById('B2p').value = 0;
				document.getElementById('B3p').value = 0;
				document.getElementById('total').value = 0;
			}
			function findtotal(){
				var total=0;
				total = parseInt(document.getElementById('SAp').value)
				+parseInt(document.getElementById('SPp').value)
				+parseInt(document.getElementById('SCp').value)
				+parseInt(document.getElementById('FAp').value)
				+parseInt(document.getElementById('FCp').value)
				+parseInt(document.getElementById('B1p').value)
				+parseInt(document.getElementById('B2p').value)
				+parseInt(document.getElementById('B3p').value);
				document.getElementById('total').value = total.toFixed(2);
			}
			
		</script>
	</main>
	
	<footer id = "foot">
	  <?php require('modules/module_footer.php'); ?>
	</footer>
</body>
</html>