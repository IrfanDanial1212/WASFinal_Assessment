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
    <meta name="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\cart.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" 
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
    integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

        
</head>

<body>

    
    <div class="header">
        <img src="image\limaBL_Logo.png" alt="Home Page" width="400" height="152"/></a>
    </div>
        
        
    <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="menu.php">Menu</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="donate.php">Donate</a></li>
        <li><a href="comments.php">Comment</a></li>
        <li><a class="active" href="cart.php">Cart</a></li>
        <li2><a href="logout.php">Logout</a></li2>
    </ul>

    <section id="cart-container" class="container my-5">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <table width="100%">
            <thead>
                <tr>
                    <td>Remove</td>
                    <td>Image</td>
                    <td>Product</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Total</td>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td><a href="#"><i class="fas fa-trash-alt"></i></a></td>
                    <td><img src="image\Beef Burger Sets.jpeg" alt=""></td>
                    <td>
                        <h5>Beef Burger Set</h5>
                    </td>
                    <td>
                        <h5>RM 11.99</h5>
                    </td>
                    <td><input class ="w-25 pl-1" value="1" type="number"></td>
                    <td>
                        <h5>RM 11.99</h5>
                    </td>
                </tr>
                <tr>
                    <td><a href="#"><i class="fas fa-trash-alt"></i></a></td>
                    <td><img src="image\Cendol.jpeg" alt=""></td>
                    <td>
                        <h5>Cendol</h5>
                    </td>
                    <td>
                        <h5>RM 3.50</h5>
                    </td>
                    <td><input class ="w-25 pl-1" value="2" type="number"></td>
                    <td>
                        <h5>RM 7.00</h5>
                    </td>
                </tr>
                <tr>
                    <td><a href="#"><i class="fas fa-trash-alt"></i></a></td>
                    <td><img src="image\Double Beef Burger.jpg" alt=""></td>
                    <td>
                        <h5>Ala Carte Double Beef Burger</h5>
                    </td>
                    <td>
                        <h5>RM 9.99</h5>
                    </td>
                    <td><input class ="w-25 pl-1" value="1" type="number"></td>
                    <td>
                        <h5>RM 9.99</h5>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>

    <section id="cart-bottom" class="container">
        <div class="row">
            <div class="coupon col-lg-6 col-md-6 col-12 mb-4">
                <div>
                    <h5>COUPON</h5>
                    <p>Enter your coupon code if you have one.</p>
                    <input type="text" placeholder="Coupon Code">
                    <button>APPLY COUPON</button>
                </div>
            </div>
            <div class="total col-lg-6 col-md-6 col-12">
                <div>
                    <h5>CART TOTAL</h5>
                    <div class="d-flex justify-content-between">
                        <h6>Subtotal</h6>
                        <p>RM 28.98</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6>Shipping</h6>
                        <p>RM 4.50</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6>Total</h6>
                        <p>RM 33.48</p>
                    </div>
                    <hr class="second-hr">
                    <button id="myButton" class="ml-auto">PROCEED TO CHECKOUT</button>
                    <script type="text/javascript">
                        document.getElementById("myButton").onclick = function () {
                            location.href = "pay.php";
                        }
                    </script>
                </div>
            </div>
        </div>
    </section>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
    integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
    integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    
    </body>
</html>

