<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>CarsDekho</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<!-- HEADER -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">CarsDekho</a>
    <ul class="navbar-nav ms-auto">
      <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
      <!-- <li class="nav-item"><a class="nav-link" href="#">Cars</a></li> -->
      <li class="nav-item"><a class="nav-link" href="enquiry.php">Enquiry</a></li>
      <li class="nav-item"><a class="nav-link" href="login.php">login</a></li>
    </ul>
  </div>
</nav>

<!-- BANNER -->
<div class="container-fluid p-0">
<?php
$banner = mysqli_fetch_assoc(
    mysqli_query($connection, "SELECT * FROM banners ORDER BY id DESC LIMIT 1")
);
?>

<?php if($banner){ ?>
<div class="container-fluid p-0">
    <img src="assets/images/<?php echo $banner['image']; ?>" class="img-fluid w-100">
</div>
<?php } ?>
</div>

<!-- MOST SEARCHED CARS -->
<div class="container my-5">
<h3 class="text-center mb-4">Most Searched Cars</h3>
<div class="row">
<?php
$cars = mysqli_query($connection, "SELECT * FROM cars WHERE category='most_searched'");
while($car = mysqli_fetch_assoc($cars)) {
?>
<div class="col-md-4">
  <div class="card mb-4">
    <a href="car-details.php?id=<?php echo $car['id']; ?>">
  <img src="assets/images/<?php echo $car['image']; ?>" class="card-img-top">
</a>
    <div class="card-body">
      <a href="car-details.php?id=<?php echo $car['id']; ?>">
  <h5><?php echo $car['name']; ?></h5>
</a>
      <p><?php echo $car['price']; ?></p>
    </div>
  </div>
</div>
<?php } ?>
</div>
</div>

<!-- LATEST CARS -->
<div class="container my-5">
<h3 class="text-center mb-4">Latest Cars</h3>
<div class="row">
<?php
$cars = mysqli_query($connection, "SELECT * FROM cars WHERE category='latest'");
while($car = mysqli_fetch_assoc($cars)) {
?>
<div class="col-md-4">
  <div class="card mb-4">
    <a href="car-details.php?id=<?php echo $car['id']; ?>">
  <img src="assets/images/<?php echo $car['image']; ?>" class="card-img-top">
</a>
    <div class="card-body">
        <a href="car-details.php?id=<?php echo $car['id']; ?>">
      <h5><?php echo $car['name']; ?></h5>
      </a>
      <p><?php echo $car['price']; ?></p>
    </div>
  </div>
</div>
<?php } ?>
</div>
</div>

<!-- FOOTER -->
<footer class="bg-dark text-white text-center p-3">
 CarsDekho
</footer>

</body>
</html>
