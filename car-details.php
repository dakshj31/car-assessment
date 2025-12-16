<?php
include "db.php";

$id = $_GET['id'];

$query = mysqli_query($connection, "SELECT * FROM cars WHERE id='$id'");
$car = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $car['name']; ?> Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">
  <div class="row">
    
    <div class="col-md-6">
      <img src="assets/images/<?php echo $car['image']; ?>" class="img-fluid">
    </div>

    <div class="col-md-6">
      <h2><?php echo $car['name']; ?></h2>
      <h4 class="text-success"><?php echo $car['price']; ?></h4>
      <p><?php echo $car['description']; ?></p>
    </div>

  </div>

  <hr>

  <!-- VARIANTS -->
  <h3>Variants</h3>
  <ul>
    <li><?php echo $car['variants']; ?></li>
    <!-- <li>Diesel</li>
    <li>Automatic</li>
    <li>Manual</li> -->
  </ul>

  <hr>

  <!-- SPECIFICATIONS -->
  <h3>Specifications</h3>
  <table class="table table-bordered">
    <tr>
      <th>Engine</th>
      <td><?php echo $car['engine']; ?></td>
    </tr>
    <tr>
      <th>Mileage</th>
      <td><?php echo $car['mileage']; ?></td>
    </tr>
    <tr>
      <th>Transmission</th>
      <td><?php echo $car['transmission']; ?></td>
    </tr>
    <tr>
      <th>Fuel Type</th>
      <td><?php echo $car['fuel_type']; ?></td>
    </tr>
  </table>

</div>

</body>
</html>
