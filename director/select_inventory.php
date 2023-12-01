<?php
$session_start;
include '../assets/connect/connect.php';
?>

<?php
$data = [];

if (isset($_POST['lvl1_id'])) {
    $lvl1_id = $_POST['lvl1_id'];

    $select_inventory = mysqli_query($conn, "SELECT * FROM `inventory` 
                                            join `inventory_details` on `inventory_details`.`inventory_id` = `inventory`.`inventory_id`
                                            join `employee` on `employee`.`employee_id` = `inventory_details`.`employee_id`
                                            join `roles` on `roles`.`role_id` = `employee`.`role_id`
                                            WHERE `roles`.`role_id`='$lvl1_id'");
                                    //  where `type_id` =-0 '1' and ");
    if (mysqli_num_rows($select_inventory) > 0) {
        while ($row = mysqli_fetch_assoc($select_inventory)) {
            array_push($data, $row); // Đẩy dữ liệu vào mảng (Lấy dòng cuối)
        }

    }else{
        $data = ["message" => "Lỗi"];
    }
}
echo json_encode($data); //OBJECT hoặc mảng hoặc values
?>