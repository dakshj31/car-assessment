<?php
include '../db.php';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $details = $_POST['description'];
    $variants = $_POST['variants'];
    $engine = $_POST['engine'];
    $mileage = $_POST['mileage'];
    $transmission = $_POST['transmission'];
    $fuel = $_POST['fuel_type'];

    $image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "../assets/images/".$image);

    $query = "INSERT INTO cars 
    (name, price, image, category, description, variants, engine, mileage, transmission, fuel_type)
    VALUES 
    ('$name','$price','$image','$category','$details','$variants','$engine','$mileage','$transmission','$fuel')";

    mysqli_query($connection, $query);

    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Car | Admin</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body{
        background:#f5f6f8;
    }
    .card{
        border:none;
        border-radius:12px;
        box-shadow:0 6px 20px rgba(0,0,0,0.08);
    }
    .form-control, .form-select{
        border-radius:8px;
    }
    textarea{
        resize:none;
    }
</style>
</head>
<body>


<form method="POST" enctype="multipart/form-data" class="container mt-5 mb-5">
<div class="row justify-content-center">
<div class="col-md-8">

<div class="card p-4">
<h3 class="text-center mb-4 fw-bold">➕ Add New Car</h3>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Car Name</label>
        <input type="text" name="name" class="form-control" placeholder="e.g. Hyundai Creta" required>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Price</label>
        <input type="text" name="price" class="form-control" placeholder="₹8.5 Lakh" required>
    </div>
</div>

<div class="mb-3">
    <label class="form-label">Car Details</label>
    <textarea name="description" class="form-control" rows="3" placeholder="Short description about the car" required></textarea>
</div>

<div class="mb-3">
    <label class="form-label">Variants</label>
    <textarea name="variants" class="form-control" rows="2" placeholder="E, S, SX, SX(O)"></textarea>
</div>

<hr>

<h5 class="fw-semibold mt-3">Specifications</h5>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Engine Type</label>
        <input type="text" name="engine" class="form-control" placeholder="1.5L Petrol">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Mileage</label>
        <input type="text" name="mileage" class="form-control" placeholder="18 km/l">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Transmission</label>
        <input type="text" name="transmission" class="form-control" placeholder="Manual / Automatic">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Fuel Type</label>
        <input type="text" name="fuel_type" class="form-control" placeholder="Petrol / Diesel / EV">
    </div>
</div>

<div class="mb-3">
    <label class="form-label">Category</label>
    <select name="category" class="form-select">
        <option value="most_searched">Most Searched</option>
        <option value="latest">Latest</option>
    </select>
</div>

<div class="mb-4">
    <label class="form-label">Car Image</label>
    <input type="file" name="image" class="form-control" required>
</div>

<button name="submit" class="btn btn-success w-100 py-2 fw-semibold">
    Save Car
</button>

</div>
</div>
</div>
</form>
</body>
</html>
