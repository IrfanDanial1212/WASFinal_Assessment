<?php
require 'config.php';

// Set error reporting to hide warnings
error_reporting(0);

if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" href="css/home.css">
    <script src="js/home.js"></script>
    <link rel="stylesheet" href="css/flickity.css">
    <script src="js/flickity.pkgd.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
	
		textarea{
		width: 100%;
		height: 250px;
		padding: 12px 20px;
		box-sizing: border-box;
		border: 2px solid #ccc;
		border-radius: 8px;
		background-color: #00E6FF;
		font-size: 30px;
		resize: none;
		pointer-events: none;
		font-family: 'Comic Sans MS';		
		}
		
		img{
		max-width: 100%;
		height: auto;
		}
		


		* {
		box-sizing: border-box;
		}

		.row2 {
		display: -ms-flexbox;
		display: flex;
		-ms-flex-wrap: wrap;
		flex-wrap: wrap;
		margin: 0 -16px;
		}

		.col-50 {
		-ms-flex: 50%;
		flex: 50%;
		}

		.col-75 {
		-ms-flex: 75%;
		flex: 75%;
		}
		
		.col-50,
		.col-75 {
		padding: 0 16px;
		}

		.container {
		background-color: #00E6FF;
		padding: 5px 20px 15px 20px;
		border: 1px solid lightgrey;
		border-radius: 3px;
		}

		button[type=submit] {
		width: 100%;
		margin-bottom: 20px;
		padding: 12px;
		border: 1px solid #ccc;
		border-radius: 3px;
		}
		
		button:hover {
		background-color: #45a049;
		}

		label {
		margin-bottom: 10px;
		display: block;
		}

		.icon-container {
		margin-bottom: 20px;
		padding: 7px 0;
		font-size: 24px;
		}

		.btn {
		background-color: #23C0D2;
		color: white;
		padding: 12px;
		margin: 10px 0;
		border: none;
		width: 100%;
		border-radius: 3px;
		cursor: pointer;
		font-size: 17px;
		}

		.btn:hover {
		background-color: #45a049;
		}

		a {
		color: #2196F3;
		}

		hr {
		border: 1px solid lightgrey;
		}

		span.price {
		float: right;
		color: grey;
		}

	</style>
		
	<script>
		function paid_form(){
		alert('Paid Successful!');
		return false;
		}
	</script>

</head>
<body>

	<div class="header">
        <img src="image/limaBL_Logo.png" alt="Home Page" width="400" height="152"/></a>
    </div>
        
        
    <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="menu.php">Menu</a></li>
        <li><a href="about.php">About</a></li>
        <li><a class="active" href="donate.php">Donate</a></li>
		<li><a href="comments.php">Comment</a></li>
        <li><a href="cart.php">Cart</a></li>
		<li2><a href="logout.php">Logout</a></li2>
    </ul>
	
	<br><br>
	
	<img src="image/d3.png" width="2000" >
	
	<br><br>
    <div class="row" style="background-color: #2f8a7e; padding: 12px 20px;">
		<textarea style="text-align: center;">DONATION

Hi, thank you for visiting this side of our website! We open the foundation for you to donate for our unfortunate brothers and sisters in Palestine. 100% of the donation we receive will be pass to organization in charge of helping Palestinians. We promised!</textarea>
	</div>
	
	<br><br>
    <div class="row">
	<div class="column left"></div>
    <div class="column middle" style="background-color: #2f8a7e;">
        <div class="row2">
			<div class="col-75">
				<div class="container">
					<form action="home.php" onsubmit="paid_form()">
						<div class="row2">
							<div class="col-50">
								<h3 style="text-align: center;">Donation Form</h3>
									<label for="cname">Donation Amount (RM)</label>
									<input type="text" id="donate" name="donate" placeholder="500.00" required>
									<label for="fname">Accepted Cards</label>
										<div class="icon-container">
											<i class="fa fa-cc-visa" style="color:navy;"></i>
											<i class="fa fa-cc-mastercard" style="color:red;"></i>
										</div>
									<label for="cname">Name on Card</label>
									<input type="text" id="cname" name="cardname" placeholder="Muhammad Ahmad" required>
									<label for="ccnum">Credit card number</label>
									<input type="text" id="ccnum" name="cardnumber" maxlength="19" placeholder="1111-2222-3333-4444" required>
									<label for="expmonth">Exp Month</label>
									<!-- <input type="text" id="expmonth" name="expmonth" placeholder="January" required> -->
									<select id="expmonth" name="expmonth" required>
										<option value="January">January (01)</option>
										<option value="February">February (02)</option>
										<option value="March">March (03)</option>
										<option value="April">April (04)</option>
										<option value="May">May (05)</option>
										<option value="June">June (06)</option>
										<option value="July">July (07)</option>
										<option value="August">August (08)</option>
										<option value="September">September (09)</option>
										<option value="October">October (10)</option>
										<option value="November">November (11)</option>
										<option value="December">December (12)</option>
									</select><br><br>
									<label for="expyear">Exp. Year</label>
									<input type="text" id="expyear" name="expyear" placeholder="2025" required>
									<label for="cvv">CVV</label>
									<input type="text" id="cvv" name="cvv" placeholder="321" required>
							</div>
          
						</div>
						<label> <input type="checkbox" checked="checked" name="sameadr">Set as anonymous donater?</label>
						<button type="submit">Pay</button>
					</form>
				</div>
			</div>
		</div>
    </div>
	</div>
	</div>	
    <br><br>


	<div class="footer">
        <a href="https://www.instagram.com/">
            <img src="image/f1.png" alt="" width="40" height="40"></a>
        <a href="https://twitter.com/">
            <img src="image/f2.png" alt="" width="40" height="40"></a>
        <a href="https://web.whatsapp.com/">
            <img src="image/f3.png" alt="" width="40" height="40"></a>
    </div>


</body>
</html>