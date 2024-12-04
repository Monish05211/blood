
<?php
include 'db.php';
include 'nav.php';
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Donor List</h2>';

$sql = "SELECT * FROM help";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    echo '<div class="table-responsive">';
    echo '<table class="table table-striped table-bordered">';
    echo '<thead class="table-dark">
            <tr>
                <th>S.No</th>
                <th>Name</th>
                <th>Date Of Birth</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Blood Group</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
          </thead>';
    echo '<tbody>';
    $i = 1;
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $i . '</td>';
        echo '<td>' . htmlspecialchars($row["first_name"]) . '</td>';
        echo '<td>' . htmlspecialchars($row["dob"]) . '</td>';
        echo '<td>' . htmlspecialchars($row["gender"]) . '</td>';
        echo '<td>' . htmlspecialchars($row["age"]) . '</td>';
        echo '<td>' . htmlspecialchars($row["blood_group"]) . '</td>';
        echo '<td>' . htmlspecialchars($row["phone"]) . '</td>';
        echo '<td>' . htmlspecialchars($row["email"]) . '</td>';
        echo '<td>' . htmlspecialchars($row["address"]) . '</td>';
        echo '<td>
                <a href="edit.php?id=' . $row["Id"] . '" class="btn btn-warning btn-sm">Edit</a>
                <button class="btn btn-danger btn-sm" onclick="confirmDelete(' . $row["Id"] . ')">Delete</button>
              </td>';
        echo '</tr>';
        $i++;
    }
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
} else {
    echo '<div class="alert alert-info text-center" role="alert">No donors found.</div>';
}

$conn->close();

echo '</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmDelete(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "You will not be able to recover this donor!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!"
    }).then((result) => {
        if (result.isConfirmed) {
            // Redirect to delete.php with the donor ID
            window.location.href = "delete.php?id=" + id;
        }
    });
}
</script>
</body>
</html>';
?>