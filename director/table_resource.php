<?php

include '../assets/connect/connect.php';
$lvl1_id = $_REQUEST['lvl1_id'];
?>



<style>
  table {
    width: 100%;
    border-collapse: collapse;
  }

  table,
  td,
  th {
    border: 1px solid black;
    padding: 5px;
  }

  th {
    text-align: left;
  }
</style>



<?php
$q = $_REQUEST['q'];

// mysqli_select_db($conn,"test.php");
$sql = "SELECT DISTINCT `resource_detail`.`inventory_id`, `resource`.`resource_name`, `resource_detail`.`resource_id`, `resource`.`quantity`,  `resource`.`status` ,DATE_FORMAT(`expiration_time`, '%d %M %Y') as date_expiration FROM `resource` 
        JOIN `resource_detail` on `resource_detail`.`resource_id` = `resource`.`resource_id`
        where `resource`.`status` = 'Yêu cầu xuất NVL' 
        and `resource_detail`.`inventory_id` = $lvl1_id 
        order by date_expiration asc";
$result = mysqli_query($conn, $sql);
// echo var_dump($result);

echo " <div class='row'>
<table>
<tr>
<th>#</th>
<th>Tên Nguyên Vật Liệu</th>
<th>Số lượng</th>
<th>Hạn sử dụng</th>


</tr>";
$count = 1;

while ($row = mysqli_fetch_array($result)) {

  echo "<tr>";
  // echo "<td>" . $count++ . "</td>";
  // echo "<td>" . $row['resource_id'] . "</td>";
  echo '<td><input type="checkbox" name="' . $row['resource_id'] . '" value="' . $row['resource_id'] . '"></td>';

  echo "<td>" . $row['resource_name'] . "</td>";
  echo "<td>" . $row['quantity'] . "</td>";
  echo "<td>" . $row['date_expiration'] . "</td>";

  echo "</tr>";
}
echo "</table>";
mysqli_close($conn);
?>
<div class="button1">
                                        <input type="submit" id="submit" class="submit button1" name="submit"
                                            value="Submit">
                                    </div>
