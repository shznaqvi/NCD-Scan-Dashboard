<?php
// Include your database connection script
include_once 'dbconfig_mysql.php';

// Query to get age count within health-specific groups
$query = "SELECT 
    CASE 
        WHEN `a104` BETWEEN 0 AND 18 THEN '0-18 Children'
        WHEN `a104` BETWEEN 19 AND 35 THEN '19-35 Young Adults'
        WHEN `a104` BETWEEN 36 AND 50 THEN '36-50 Middle-aged Adults'
        WHEN `a104` BETWEEN 51 AND 65 THEN '51-65 Older Adults'
        ELSE '65+ Seniors'
    END AS `age_group`,
    SUM(CASE WHEN `a105` = 1 THEN 1 ELSE 0 END) AS `Female`,
    SUM(CASE WHEN `a105` = 2 THEN 1 ELSE 0 END) AS `Male`,
    SUM(CASE WHEN `a105` NOT IN (1, 2) THEN 1 ELSE 0 END) AS `Other`
FROM `familymember`
GROUP BY `age_group`
ORDER BY `age_group`;";

$result = mysqli_query($con, $query);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

header('Content-Type: application/json');
echo json_encode($data);
?>
