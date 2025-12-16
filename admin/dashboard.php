<?php
include '../db.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-4">

<h2 class="mb-4 text-center">Admin Dashboard</h2>

<!-- STATS -->
<div class="row text-center mb-4">
<?php
$total = mysqli_fetch_assoc(mysqli_query($connection,"SELECT COUNT(*) total FROM cars"))['total'];
$most = mysqli_fetch_assoc(mysqli_query($connection,"SELECT COUNT(*) total FROM cars WHERE category='most_searched'"))['total'];
$latest = mysqli_fetch_assoc(mysqli_query($connection,"SELECT COUNT(*) total FROM cars WHERE category='latest'"))['total'];
?>
<div class="col-md-4">
  <div class="card p-3">Total Cars<br><b><?php echo $total; ?></b></div>
</div>
<div class="col-md-4">
  <div class="card p-3">Most Searched Cars<br><b><?php echo $most; ?></b></div>
</div>
<div class="col-md-4">
  <div class="card p-3">Latest Cars<br><b><?php echo $latest; ?></b></div>
</div>
</div>

<?php
$banner = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM banners LIMIT 1"));
?>

<div class="card mb-4">
  <div class="card-body">
    <h5 class="mb-3">Homepage Banner</h5>

    <?php if($banner){ ?>
      <img src="../assets/images/<?php echo $banner['image']; ?>" class="img-fluid mb-3" style="max-height:200px;">
      <p><b>Title:</b> <?php echo $banner['title']; ?></p>

      <a href="edit_banner.php?id=<?php echo $banner['id']; ?>" class="btn btn-warning btn-sm">
        Edit Banner
      </a>
    <?php } else { ?>
      <a href="add_banner.php" class="btn btn-primary btn-sm">
        Add Banner
      </a>
    <?php } ?>
  </div>
</div>


<a href="add_car.php" class="btn btn-primary mb-3">+ Add Car</a>

<!-- CAR TABLE -->
<table class="table table-bordered table-responsive">
<tr>
<th>Image</th>
<th>Name</th>
<th>Price</th>
<th>Category</th>
<th>Action</th>
</tr>

<?php
$cars = mysqli_query($connection,"SELECT * FROM cars");
while($car = mysqli_fetch_assoc($cars)){
?>
<tr>
<td><img src="../assets/images/<?php echo $car['image']; ?>" width="80"></td>
<td><?php echo $car['name']; ?></td>
<td><?php echo $car['price']; ?></td>
<td><?php echo ucfirst(str_replace('_',' ',$car['category'])); ?></td>
<td>
<a href="edit_car.php?id=<?php echo $car['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
<a href="delete_car.php?id=<?php echo $car['id']; ?>" class="btn btn-sm btn-danger"
onclick="return confirm('Delete this car?')">Delete</a>
</td>
</tr>
<?php } ?>
</table>

</div>
</body>
</html>
