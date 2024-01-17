<?php
// echo '123';
session_start();
include("./assets/connect/connect.php");

$request = mysqli_query($conn, "SELECT `resource_detail`.`id` , `resource_detail`.`status`, `resource_detail`.`time`,`inventory`.`inventory_name`
                                FROM `resource_detail`
                                JOIN `inventory` on  `resource_detail`.`inventory_id` = `inventory`.`inventory_id`
                                GROUP by `time` desc;");
$queryData = array();
$count = 1;
while ($row = mysqli_fetch_assoc($request)) {
    $queryData[] = array(
        '#' => $count++,
        'resource_name' => $row['inventory_name'],
        'quantity' => $row['status'],
        'status' => $row['time'],
    );
}

$responseData = array("data" => $queryData);


$jsonData = json_encode($responseData, JSON_PRETTY_PRINT);

echo $jsonData;
?>