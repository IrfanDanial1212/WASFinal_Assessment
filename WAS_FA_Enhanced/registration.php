<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: home.php");
}
if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];

  //Regex patterns for validation
  $namePattern = "/^[a-zA-Z\s]*$/";
  $usernamePattern = "/^[a-zA-Z0-9_]*$/";
  $emailPattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
  $passwordPattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/"; //At least 8 characters long, 1 uppercase letter, 1 lowercase letter and 1 number

  $duplicate = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' OR email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  else{
    if($password == $confirmpassword){
      // $hashed_password = password_hash($password, PASSWORD_DEFAULT); //hash the password
      // $hashed_email = md5($email); // Hash the email address using the md5 hashing function
      $query = "INSERT INTO user VALUE ('','$name','$username','$email','$password')";
      mysqli_query($conn, $query);
      echo
      "<script> alert('Registration Successful'); </script>";
    }
    else{
      echo
      "<script> alert('Password Does Not Match'); </script>";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
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
      input[type="email"],
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
    <h2>Registration</h2>
    <form class="" action="" method="post" autocomplete="off">
      <label for="name">Name : </label>
      <input type="text" name="name" id = "name" pattern="[A-Za-z ]+" title="Please enter only letters and spaces" required value=""> <br>
      <label for="username">Username : </label>
      <input type="text" name="username" id = "username" pattern="[A-Za-z ]+" title="Please enter only letters and spaces" required value=""> <br>
      <label for="email">Email : </label>
      <input type="email" name="email" id = "email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter a valid email address"
      required value=""> <br>
      <label for="password">Password : </label>
      <input type="password" name="password" id = "password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^\w\d\s:])([^\s]){8,}$" 
      title="Password requirements: at least 8 characters long, one uppercase letter, one lowercase letter, one number, and one special character." required value=""> <br>
      <label for="confirmpassword">Confirm Password : </label>
      <input type="password" name="confirmpassword" id = "confirmpassword" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^\w\d\s:])([^\s]){8,}$" 
      title="Password requirements: at least 8 characters long, one uppercase letter, one lowercase letter, one number, and one special character." required value=""> <br>
      <button type="submit" name="submit">Register</button>
    </form>
    <br>
    <a href="login.php">Login</a>
  </body>
</html>