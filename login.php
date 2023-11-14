<?php
session_save_path('F:/htdocs');
session_start();
include_once 'dbconfig_mysql.php'; // Database connection configuration

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate the user's credentials
    $query = "SELECT * FROM appuser WHERE username = ? AND passwordEnc = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, 'ss', $username, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['user_id'] = $row['id']; // Store user ID in session
        $response = array('success' => true);
    } else {
        $response = array('success' => false, 'message' => 'Invalid credentials');
    }

    mysqli_stmt_close($stmt);
} else {
    $response = array('success' => false, 'message' => 'Invalid request method');
}

header('Content-Type: application/json');
echo json_encode($response);
?>
