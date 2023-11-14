<?php
include_once 'dbconfig_mysql.php'; // Include your database connection script

// Query to get the total number of active LHWS
$queryActiveLHWS = "SELECT COUNT(DISTINCT distcode, lhwCode) AS totalActiveLHWS FROM forms";
$resultActiveLHWS = mysqli_query($con, $queryActiveLHWS);

$response = array();

if ($resultActiveLHWS) {
    $rowActiveLHWS = mysqli_fetch_assoc($resultActiveLHWS);
    $totalActiveLHWS = $rowActiveLHWS['totalActiveLHWS'];
    $response['totalActiveLHWS'] = $totalActiveLHWS;
} else {
    // Handle the case where the query for active LHWS fails
    $response['errorActiveLHWS'] = mysqli_error($con);
}

header('Content-Type: application/json');
echo json_encode($response);

// Close the database connection
mysqli_close($con);
?>