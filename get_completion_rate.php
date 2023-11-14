<?php
include_once 'dbconfig_mysql.php'; // Include your database connection script

// Fetch the total number of surveys
$queryTotal = "SELECT COUNT(*) as totalSurveys FROM forms";
$resultTotal = mysqli_query($con, $queryTotal);
$rowTotal = mysqli_fetch_assoc($resultTotal);
$totalSurveys = $rowTotal['totalSurveys'];

// Fetch the number of completed surveys (where iStatus = '1')
$queryCompleted = "SELECT COUNT(*) as completedSurveys FROM forms WHERE iStatus = '1'";
$resultCompleted = mysqli_query($con, $queryCompleted);
$rowCompleted = mysqli_fetch_assoc($resultCompleted);
$completedSurveys = $rowCompleted['completedSurveys'];

// Calculate the completion rate
$completionRate = ($totalSurveys > 0) ? round(($completedSurveys / $totalSurveys) * 100) : 0;

$response = array('completionRate' => $completionRate);
header('Content-Type: application/json');
echo json_encode($response);
?>