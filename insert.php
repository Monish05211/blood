<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "useme";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $blood_group = $_POST['blood_group'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $sql = "INSERT INTO help(first_name, dob, gender, age, blood_group, phone, email, address)
    VALUES ('$first_name', '$dob', '$gender', '$age', '$blood_group', '$phone', '$email', '$address')";
if ($conn->query($sql) === TRUE) {
  
    header("Location: home.php");
    exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>