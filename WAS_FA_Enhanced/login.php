<?php
require 'config.php';

// Set error reporting to hide warnings
error_reporting(0);

/* ini_set('display_errors', 1);
error_reporting(E_ALL); */

if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  


  //SQL Injection Prevention (Prepared Statement)
  $usernameemail = mysqli_real_escape_string($conn, $usernameemail);
  $password = mysqli_real_escape_string($conn, $password);

  if(mysqli_num_rows($result) == "1"){
    if($password == $row['password']){
      session_start();
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location: home.php");
    }
    else{

      echo"<script> alert('Wrong Password'); </script>";
    }
    
  }
  else{
    echo "<script> alert('User Not Registered'); </script>";
  }
  
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #f8f8f8;
      }
      h2 {
        color: #444;
        font-size: 36px;
        text-align: center;
        margin-top: 50px;
      }
      form {
        max-width: 500px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border: 2px solid #ccc;
        border-radius: 5px;
      }
      label {
        display: block;
        margin-bottom: 10px;
        font-size: 18px;
        color: #555;
      }
      input[type="text"],
      input[type="password"] {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border-radius: 5px;
        border: 2px solid #ccc;
        box-sizing: border-box;
        margin-bottom: 20px;
      }
      button[type="submit"] {
        background-color: #0077cc;
        color: #fff;
        border: none;
        padding: 10px 20px;
        font-size: 18px;
        border-radius: 5px;
        cursor: pointer;
      }
      button[type="submit"]:hover {
        background-color: #005daa;
      }
      a {
        display: block;
        margin-top: 20px;
        text-align: center;
        color: #0077cc;
        font-size: 18px;
        text-decoration: none;
      }
    </style>
  </head>
  <body>
    <h2>Login</h2>
    <form class="" action="login.php" method="post" autocomplete="off">
      <label for="usernameemail">Username or Email : </label>
    <!-- Pattern to eliminate single quote (') in a string -->
      <input type="text" name="usernameemail" pattern="^[^'].*$" id = "usernameemail" required value=""> <br>
      <label for="password">Password : </label>
    <!-- Pattern to eliminate single quote (') in a string -->
      <input type="password" name="password" pattern="^[^'].*$" id = "password" required value=""> <br>
      <button type="submit" name="submit">Login</button>
    </form>
    <br>
    <a href="registration.php">Registration</a>
  </body>
</html>