<!-- <!DOCTYPE html>
<html>
<head>
<title>Admin Panel</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="dashboard.php">CarsDekho Admin</a>
    <a href="../index.php" class="btn btn-outline-light btn-sm">View Website</a>
    
  </div>
</nav>

<div class="container my-4">

<h2 class="mb-4 text-center">Admin Dashboard</h2> -->

<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: ../login.php");
    exit;
}
?>


<!DOCTYPE html>
<html>
<head>
<title>Admin Panel</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="dashboard.php">CarsDekho Admin</a>

    <div class="d-flex gap-2">
      <a href="../index.php" class="btn btn-outline-light btn-sm">
        View Website
      </a>

      <a href="logout.php" class="btn btn-danger btn-sm">
        Logout
      </a>
    </div>
  </div>
</nav>

<div class="container my-4">
<h2 class="mb-4 text-center">Admin Dashboard</h2>
