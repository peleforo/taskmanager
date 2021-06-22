<?php
session_start();
$_SESSION = array();
$_POST = array();

session_destroy();
header("location: index.php");
?>