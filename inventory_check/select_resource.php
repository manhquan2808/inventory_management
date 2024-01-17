<?php
$session_start;
include '../assets/connect/connect.php';
?>

<?php
$data = [];

if (isset($_POST['lvl1_id'])) {
    $lvl1_id = $_POST['lvl1_id'];

    $query = mysqli_query($conn, "SELECT `resource`.`resource_id`,`resource`.`resource_name`, date_format(`resource`.`expiration_time`, '%Y-%m-%d') as `expiration_time` from `resource` 
                                  where `resource`.`resource_name` = '$lvl1_id' and `resource`.`status` = 'Xuất NVL' 
                                  group by `expiration_time` 
                                  order by `expiration_time` asc
                                  ");
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
            
        }
        
    }
    else{
        $data = ["message" =>"lõi"];
    }
    
}
echo json_encode($data);
?>

