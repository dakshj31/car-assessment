<?php
include '../db.php';
include 'header.php';

/* 1️⃣ Get car id */
if (!isset($_GET['id'])) {
    header("Location: dashboard.php");
    exit;
}

$id = $_GET['id'];

/* 2️⃣ Fetch existing car data */
$result = mysqli_query($connection, "SELECT * FROM cars WHERE id='$id'");
$car = mysqli_fetch_assoc($result);

if (!$car) {
    echo "Car not found";
    exit;
}

/* 3️⃣ Update logic */
if (isset($_POST['update'])) {

    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $variants = $_POST['variants'];
    $engine = $_POST['engine'];
    $mileage = $_POST['mileage'];
    $transmission = $_POST['transmission'];
    $fuel = $_POST['fuel_type'];

    /* Image update (optional) */
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "../assets/images/" . $image);
    } else {
        $image = $car['image']; // keep old image
    }

    $updateQuery = "
        UPDATE cars SET
            name='$name',
            price='$price',
            category='$category',
            description='$description',
            variants='$variants',
            engine='$engine',
            mileage='$mileage',
            transmission='$transmission',
            fuel_type='$fuel',
            image='$image'
        WHERE id='$id'
    ";

    mysqli_query($connection, $updateQuery);

    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Car</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body{ background:#f5f6f8; }
.card{
    border:none;
    border-radius:12px;
    box-shadow:0 6px 20px rgba(0,0,0,0.08);
}
</style>
</head>
<body>

<div class="container mt-5 mb-5">
<div class="row justify-content-center">
<div class="col-md-8">

<div class="card p-4">
<h3 class="text-center mb-4">✏️ Edit Car</h3>

<form method="POST" enctype="multipart/form-data">

<div class="row">
    <div class="col-md-6 mb-3">
        <label>Car Name</label>
        <input type="text" name="name" class="form-control" value="<?= $car['name']; ?>" required>
    </div>

    <div class="col-md-6 mb-3">
        <label>Price</label>
        <input type="text" name="price" class="form-control" value="<?= $car['price']; ?>" required>
    </div>
</div>

<div class="mb-3">
    <label>Description</label>
    <textarea name="description" class="form-control" rows="3"><?= $car['description']; ?></textarea>
</div>

<div class="mb-3">
    <label>Variants</label>
    <textarea name="variants" class="form-control"><?= $car['variants']; ?></textarea>
</div>

<h5 class="mt-3">Specifications</h5>

<div class="row">
    <div class="col-md-6 mb-3">
        <label>Engine</label>
        <input type="text" name="engine" class="form-control" value="<?= $car['engine']; ?>">
    </div>

    <div class="col-md-6 mb-3">
        <label>Mileage</label>
        <input type="text" name="mileage" class="form-control" value="<?= $car['mileage']; ?>">
    </div>

    <div class="col-md-6 mb-3">
        <label>Transmission</label>
        <input type="text" name="transmission" class="form-control" value="<?= $car['transmission']; ?>">
    </div>

    <div class="col-md-6 mb-3">
        <label>Fuel Type</label>
        <input type="text" name="fuel_type" class="form-control" value="<?= $car['fuel_type']; ?>">
    </div>
</div>

<div class="mb-3">
    <label>Category</label>
    <select name="category" class="form-select">
        <option value="most_searched" <?= ($car['category']=='most_searched')?'selected':''; ?>>Most Searched</option>
        <option value="latest" <?= ($car['category']=='latest')?'selected':''; ?>>Latest</option>
    </select>
</div>

<div class="mb-3">
    <label>Current Image</label><br>
    <img src="../assets/images/<?= $car['image']; ?>" width="120" class="mb-2">
    <input type="file" name="image" class="form-control">
    <small class="text-muted">Leave blank to keep existing image</small>
</div>

<button name="update" class="btn btn-primary w-100">Update Car</button>

</form>
</div>

</div>
</div>
</div>

</body>
</html>
