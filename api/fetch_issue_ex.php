<?php
// echo '123';
session_start();
include("../assets/connect/connect.php");

$request = mysqli_query($conn, "SELECT *,`resource`.`resource_id` , `resource`.`status`, `resource`.`update_time` as `time`
                                FROM `resource`
                                JOIN `resource_detail` on `resource_detail`.`resource_id` = `resource`.`resource_id`
                                JOIN `inventory` on  `resource_detail`.`inventory_id` = `inventory`.`inventory_id`
                                where `resource`.`status` like 'Xuất%'
                                GROUP by `resource`.`update_time` desc;");
$queryData = array();
$count = 1;
while ($row = mysqli_fetch_assoc($request)) {
    $queryData[] = array(
        '#' => $count++,
        'resource_name' => $row['inventory_name'],
        'status' => $row['status'],
        'time' => $row['time'],
    );
}

$responseData = array("data" => $queryData);


$jsonData = json_encode($responseData, JSON_PRETTY_PRINT);

echo $jsonData;
?>