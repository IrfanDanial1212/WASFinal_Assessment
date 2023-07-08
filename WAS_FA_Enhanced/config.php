<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "webappsecfinal");

if(mysqli_connect_errno()){

    die("Failed to connect to databse: ".mysqli_connect.error());

}