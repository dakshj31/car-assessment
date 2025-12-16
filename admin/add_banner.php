<?php
include '../db.php';

if(isset($_POST['submit'])){
    $title = $_POST['title'];

    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp, "../assets/images/".$image);

    mysqli_query($connection,
        "INSERT INTO banners (title, image) VALUES ('$title','$image')"
    );

    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Banner | Admin</title>

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
</style>
</head>
<body>

<div class="container mt-5">
<div class="row justify-content-center">
<div class="col-md-6">

<div class="card p-4">
<h3 class="text-center mb-4 fw-bold">🖼 Add Banner</h3>

<form method="POST" enctype="multipart/form-data">

<div class="mb-3">
    <label class="form-label">Banner Title</label>
    <input type="text" name="title" class="form-control" placeholder="e.g. Find Your Dream Car" required>
</div>

<div class="mb-4">
    <label class="form-label">Banner Image</label>
    <input type="file" name="image" class="form-control" required>
</div>

<button name="submit" class="btn btn-success w-100 fw-semibold">
    Save Banner
</button>

</form>
</div>

</div>
</div>
</div>

</body>
</html>
