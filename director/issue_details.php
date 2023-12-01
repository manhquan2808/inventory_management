<?php
include("../assets/connect/connect.php");

if (isset($_POST['data'])) {
    $date = $_REQUEST['data'];


    $select_issue = mysqli_query($conn, "SELECT DATE_FORMAT(`resource`.`expiration_time`, '%d %M %Y') as expiration_time, `resource`.`resource_name`, `resource`.`quantity`, `resource_detail`.`time` 
                                         FROM `resource_detail` 
                                         JOIN `resource` on `resource`.`resource_id` = `resource_detail`.`resource_id`                                                                     
                                         WHERE `resource_detail`.`time` = '$date' ");

    if (mysqli_num_rows($select_issue) > 0) {
    
        echo '<table class="table user-table">';
        echo '<thead style="text-align: center;">
                <tr>
                    <th class="border-top-0">#</th>
                    <th class="border-top-0">Tên nguyên vật liệu</th>
                    <th class="border-top-0">Số lượng</th>
                    <th class="border-top-0">Hạn sử dụng</th>
                    
                </tr>
            </thead>';
        echo '<tbody>';

        $count = 1;
        while ($row = mysqli_fetch_assoc($select_issue)) {
            echo '<tr class="action" style="text-align: center;">';                       
            echo '<td>' . $count++ . '</td>';
            echo '<td>' . $row['resource_name'] . '</td>';
            echo '<td>' . $row['quantity'] . '</td>';
            echo '<td>' . $row['expiration_time'] . '</td>';
          
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    } else {
        echo 'lỗi';
    }
} else {
    echo 'sai';
}
?>
