<?php
$session_start;
include '../assets/connect/connect.php';
?>
<?php
$data = [];

if (isset($_POST['lvl1_id'])) {
    $$lvl1_id = $_POST['lvl1_id'];

    $query = mysqli_query($conn, "SELECT * from `resource` 
                                  JOIN `resource_detail` on `resource_detail`.`resource_id` = `resource`.`resource_id`
                                  where `resource`.`inventory_id` = '$lvl1_id'");
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