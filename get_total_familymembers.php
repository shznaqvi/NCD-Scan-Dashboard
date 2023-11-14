<?php
include_once 'dbconfig_mysql.php'; // Include your database connection script

// Query to get the total number of family members interviewed
$query = "SELECT COUNT(*) AS totalFamilyMembers FROM familymember";
$result = mysqli_query($con, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $totalFamilyMembers = $row['totalFamilyMembers'];

    $response = array('totalFamilyMembers' => $totalFamilyMembers);
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // Handle the case where the query fails
    $error = mysqli_error($con);
    echo json_encode(array('error' => $error));
}

// Close the database connection
mysqli_close($con);
?>