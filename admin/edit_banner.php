<?php
include '../db.php';

$id = $_GET['id'];
$banner = mysqli_fetch_assoc(mysqli_query($connection,"SELECT * FROM banners WHERE id='$id'"));

if(isset($_POST['update'])){
    $title = $_POST['title'];

    if(!empty($_FILES['image']['name'])){
        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "../assets/images/".$image);

        mysqli_query($connection,"UPDATE banners SET title='$title', image='$image' WHERE id='$id'");
    } else {
        mysqli_query($connection,"UPDATE banners SET title='$title' WHERE id='$id'");
    }

    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Banner</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
<div class="row justify-content-center">
<div class="col-md-6">

<div class="card p-4">
<h4 class="mb-3">Edit Banner</h4>

<form method="POST" enctype="multipart/form-data">

<label class="form-label">Banner Title</label>
<input type="text" name="title" class="form-control mb-3"
value="<?php echo $banner['title']; ?>" required>

<label class="form-label">Current Image</label><br>
<img src="../assets/images/<?php echo $banner['image']; ?>" width="100" class="mb-3"><br>

<label class="form-label">Change Image</label>
<input type="file" name="image" class="form-control mb-3">

<button name="update" class="btn btn-success w-100">
Update Banner
</button>

</form>
</div>

</div>
</div>
</div>

</body>
</html>
