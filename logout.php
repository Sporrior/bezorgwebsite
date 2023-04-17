<?php
include_once('connection.php');

session_unset();
session_destroy();
header('location: Login.php')

?>
