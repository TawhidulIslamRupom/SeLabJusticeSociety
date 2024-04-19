<?php
// Include the database connection file
include_once 'dbconnection.php';

// Initialize an empty array to store legal practice areas
$legalPracticeAreas = [];

// Query to fetch legal practice areas from the database
$query = "SELECT * FROM lawyercategories";
$result = $conn->query($query);

// Check if there are any legal practice areas
if ($result->num_rows > 0) {
    // Loop through each row and add the legal practice area to the array
    while ($row = $result->fetch_assoc()) {
        $legalPracticeAreas[] = [
            'id' => $row['id'],
            'category' => $row['category'],
            'description' => $row['description'],
            'image' => $row['image']
        ];
    }
}

// Close the database connection
$conn->close();

// Return the legal practice areas as JSON
header('Content-Type: application/json');
echo json_encode($legalPracticeAreas);
?>
