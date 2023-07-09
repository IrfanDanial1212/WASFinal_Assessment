<?php
require 'config.php';

// Set error reporting to hide warnings
error_reporting(0);

$_SESSION = [];
session_unset();
session_destroy();
header("Location: home.php");