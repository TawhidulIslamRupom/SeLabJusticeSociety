<?php
// Include the database connection file
include_once 'dbconnection.php';

// Fetch lawyer data from the database
$query = "SELECT * FROM lawyers";
$result = $conn->query($query);

// Check if there are any lawyers in the database
if ($result->num_rows > 0) {
    // Start table and add table header
    echo "<div class='table-responsive'>";
    echo "<table class='table table-bordered table-striped'>";
    echo "<thead class='thead-dark'>";
    echo "<tr>";
    echo "<th>Name</th>";
    echo "<th>Category</th>";
    echo "<th>Phone Number</th>";
    echo "<th>Location</th>";
    echo "<th>Rate</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    // Loop through each row of the result set and display lawyer data in table rows
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['categoryid']}</td>";
        echo "<td>{$row['phonenumber']}</td>";
        echo "<td>{$row['location']}</td>";
        echo "<td>{$row['rate']}</td>";
        echo "</tr>";
    }

    // Close table body and table
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
} else {
    // Display message if no lawyers are found in the database
    echo "<p>No lawyers found in the database.</p>";
}

// Close the database connection
$conn->close();
?>
