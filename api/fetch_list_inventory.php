<?php
session_start();
include("../assets/connect/connect.php");

$request = mysqli_query($conn, "SELECT `inventory`.`inventory_name`, `inventory`.`type_id`, `inventory`.`inventory_name`, SUM(`shelves`.`capacity`) as `quantity`, `inventory`.`address`
                                FROM `inventory`
                                JOIN `shelves` on `shelves`.`inventory_id` = `inventory`.`inventory_id`
                                where `inventory`.`type_id` = 1
                                GROUP By `inventory`.`inventory_name`
                                ");
$queryData = array();
$count = 1;
while ($row = mysqli_fetch_assoc($request)) {
    $queryData[] = array(
        '#' => $count++,
        'inventory_name' => $row['inventory_name'],
        'address' => $row['address'],
        'quantity' => $row['quantity']
    );
}

$responseData = array("data" => $queryData);

$jsonData = json_encode($responseData);

echo $jsonData;
?>