<?php
// Include database connection file
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the donor's current details
    $sql = "SELECT * FROM help WHERE id = $id";
    $result = $conn->query($sql);
    $donor = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Update donor details
    $first_name = $_POST['first_name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $blood_group = $_POST['blood_group'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $update_sql = "UPDATE help SET first_name='$first_name', dob='$dob', gender='$gender', age='$age', blood_group='$blood_group', phone='$phone', email='$email', address='$address' WHERE id=$id";

    if ($conn->query($update_sql) === TRUE) {
        echo "Record updated successfully";
        header("Location: display.php"); // Redirect to the donor list
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Donor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    
    <h2 class="text-center mb-4">Edit Donor</h2>
    <form method="post" action="" class="p-4 border rounded bg-light shadow-sm">
        <div class="mb-3">
            <label for="first_name" class="form-label">Name:</label>
            <input type="text" name="first_name" class="form-control" value="<?php echo $donor['first_name']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="dob" class="form-label">Date Of Birth:</label>
            <input type="date" name="dob" class="form-control" value="<?php echo $donor['dob']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label">Gender:</label>
            <select name="gender" class="form-select" required>
                <option value="Male" <?php if($donor['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                <option value="Female" <?php if($donor['gender'] == 'Female') echo 'selected'; ?>>Female</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="age" class="form-label">Age:</label>
            <input type="number" name="age" class="form-control" value="<?php echo $donor['age']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="blood_group" class="form-label">Blood Group:</label>
            <input type="text" name="blood_group" class="form-control" value="<?php echo $donor['blood_group']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone:</label>
            <input type="text" name="phone" class="form-control" value="<?php echo $donor['phone']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" class="form-control" value="<?php echo $donor['email']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address:</label>
            <textarea name="address" class="form-control" rows="4" required><?php echo $donor['address']; ?></textarea>
        </div>

        <div class="text-center">
            <input type="submit" value="Update Donor" class="btn btn-primary w-100">
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
