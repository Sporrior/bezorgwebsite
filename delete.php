<?php
include_once('connection.php');

$sql = "DELETE FROM menu WHERE id=?";
$stmt= $conn->prepare($sql);
$stmt->execute([$_GET['id']]);
header("Location: admin.php");