<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name    = mysqli_real_escape_string($connection, $_POST['name']);
    $phone   = mysqli_real_escape_string($connection, $_POST['phone']);
    $email   = mysqli_real_escape_string($connection, $_POST['email']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);

    $car_type = isset($_POST['car']) 
        ? implode(", ", $_POST['car']) 
        : '';

    $query = "INSERT INTO enquiries (name, phone, email, address, car_type)
              VALUES ('$name','$phone','$email','$address','$car_type')";

    mysqli_query($connection, $query);

    
    header("Location: enquiry.php?success=1");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Car Enquiry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">Car Enquiry Form</h2>

    <form method="POST">
        <div class="mb-3">
            <input type="text" name="name" class="form-control" placeholder="Your Name" required>
        </div>

        <div class="mb-3">
            <input type="text" name="phone" class="form-control" placeholder="Phone Number" required>
        </div>

        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email ID" required>
        </div>

        <div class="mb-3">
            <textarea name="address" class="form-control" placeholder="Address" required></textarea>
        </div>

        <h5>Select Car Type</h5>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="car[]" value="Hatchback">
            <label class="form-check-label">Hatchback</label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="car[]" value="Sedan">
            <label class="form-check-label">Sedan</label>
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="car[]" value="SUV">
            <label class="form-check-label">SUV</label>
        </div>

        <button type="submit" name="submit" class="btn btn-primary w-100">Submit Enquiry</button>
    </form>
</div>

</body>
</html>
