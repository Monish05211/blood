<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donor Management System</title>
    </head>
    <style>
        input{
            width: 100% !important;
        }
    </style>
<body>
    <header>
       
    <?php include 'nav.php'; ?>
    </header>
    </body>
</html>
<?php

include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Donors</title>
    <link rel="stylesheet" href="table.css">
    <style>
        .in{
            width: 150% !important;
            margin-left: 25% !important;
        }
    </style>
</head>
<body>
    <h1>Search Donors</h1>

    <form action="search.php" method="GET">
        <input class="in" type="text" name="search_term" placeholder="Enter Name or Blood Group" required>
        <input type="submit" value="Search">
    </form>

    <?php

    if (isset($_GET['search_term'])) {
        $search_term = $_GET['search_term'];

        $sql = "SELECT * FROM help WHERE first_name LIKE '%$search_term%' OR blood_group LIKE '%$search_term%'";
        $result = $conn->query($sql);

        echo "<h2>Search Results</h2>";

        if ($result && $result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>dob</th>
                        <th>gender</th>
                        <th>age</th>
                        <th>bloodgroup</th>
                        <th>Phone</th>
                        <th>email</th>
                        <th>address</th>
                    </tr>";
            $i = 1;
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $i . "</td>
                        <td>" . htmlspecialchars($row["first_name"]) . "</td>
                        <td>" . htmlspecialchars($row["dob"]) . "</td>
                        <td>" . htmlspecialchars($row["gender"]) . "</td>
                        <td>" . htmlspecialchars($row["age"]) . "</td>
                        <td>" . htmlspecialchars($row["blood_group"]) . "</td>
                        <td>" . htmlspecialchars($row["phone"]) . "</td>
                        <td>" . htmlspecialchars($row["email"]) . "</td>
                        <td>" . htmlspecialchars($row["address"]) . "</td>
                      </tr>";
                      $i++;
            }
            echo "</table>";
        } else {
            echo "<p>No results found.</p>";
        }
    }
    ?>

</body>
</html> 