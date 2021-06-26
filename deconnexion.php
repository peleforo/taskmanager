<?php

$_SESSION = array();
$_POST = array();

session_destroy();
header("location: index.php");
?>