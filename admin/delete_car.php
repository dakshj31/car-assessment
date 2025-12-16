<?php
include '../db.php';
$id = $_GET['id'];

mysqli_query($connection,"DELETE FROM cars WHERE id=$id");
header("Location: dashboard.php");
