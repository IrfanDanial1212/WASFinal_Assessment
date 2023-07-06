<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("Location: login.php");
}
?>
<html>
    <head>
        <link rel="stylesheet" href="css/menu.css">
    </head>

    <body>
        <div class="header">
            <img src="image/limaBL_Logo.png" alt="5BLlogo" width="400" height="152"></a>
        </div>
        <ul>
            <li><a href="home.php">Home</a></li>
			<li><a class="active" href="menu.php">Menu</a></li>
			<li><a href="about.php">About</a></li>
			<li><a href="donate.php">Donate</a></li>
			<li><a href="cart.php">Cart</a></li>
            <li2><a href="logout.php">Logout</a></li2>
        </ul>

        <table>
            <tr>
                <td>
                    <a href="menu pages/sets.php"><img src="image/SETS.jpg" alt="Sets" ></a>
                </td>
                <td>
                    <a href="menu pages/ala carte.php"><img src="image/ALA CARTE.png" alt="Ala Carte" ></a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="menu pages/beverages.php"><img src="image/BEVERAGES.png" alt="Beverages" ></a>
                </td>
                <td>
                    <a href="menu pages/desserts.php"><img src="image/DESSERTS.png" alt="Desserts" ></a>
                </td>
            </tr>
        </table>
		
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