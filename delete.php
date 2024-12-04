<?php

include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $delete_sql = "DELETE FROM help WHERE id = $id";

    if ($conn->query($delete_sql) === TRUE) {
        echo "Record deleted successfully";
        header("Location: display.php"); 
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "No ID provided for deletion.";
}

$conn->close();
?>