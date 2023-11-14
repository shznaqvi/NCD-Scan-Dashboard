<?php
include_once 'dbconfig_mysql.php'; // Include your database connection script

// Query to get the total number of households
$query = "SELECT COUNT(*) AS totalHouseholds FROM ws_app.forms";
$result = mysqli_query($con, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $totalHouseholds = $row['totalHouseholds'];
} else {
    // Handle the error if the query fails
    $totalHouseholds = 0;
}

$response = array('totalHouseholds' => $totalHouseholds);
header('Content-Type: application/json');
echo json_encode($response);
?>