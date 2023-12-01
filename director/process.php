<?php
session_start();
include '../assets/connect/connect.php';
?>

<?php
// process.php
$data = [];
// Kiểm tra xem có dữ liệu POST được gửi từ biểu mẫu không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Nhận dữ liệu từ biểu mẫu
    $resource_name = $_POST["resource_name"];
    $quantity = $_POST["quantity"];

    //is_numeric: Returns true if value is a number or a numeric string, false otherwise
    if (is_numeric($quantity) && $quantity > 0) {
        if ($result = mysqli_query($conn, "select *,sum(`quantity`) as quantity_resource from `resource` where `resource_name` = '$resource_name' and `status` like 'Đã lưu kho' group by `resource_name`;")) {
            // if(mysqli_num_rows($result) > 0)
            $row = mysqli_fetch_assoc($result);

            // if ($result2 = mysqli_query($conn, "select *,sum(`quantity`) as quantity_resource from `resource` where `resource_name` = '$resource_name' and `status` like 'Chờ duyệt' group by `resource_name`;")) {
            //     $row2 = mysqli_fetch_assoc($result2);

            $quantity_in_db = $row['quantity_resource'];
            // $quantity_after = $quantity_in_db - $row2['quantity_resource'];
            // $newQuantity = $quantity + $quantity_in_db;
            if ($quantity <= $quantity_in_db) {
                $sql = mysqli_query($conn, "INSERT INTO `resource`(`resource_name`, `quantity`, `status`) values('$resource_name', '$quantity', 'Chờ duyệt')");
                // echo "<script>alert('Yêu cầu thành công')</script>";
                $data = ["success" => "Số lượng nhập đúng"];
                echo `<script>
                    alert(" Done ! ");
                </script>`;
            } else {
                // echo "<script>alert('Số lượng nhập lớn hơn số lượng tồn kho')</script>";
                // echo 'Số lượng nhập sai';
                $data = ["message" => "Số lượng nhập sai"];
                echo `<script>error: function (xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                } </script>`;

            }
        }
    } else {
        echo 'Số lượng nhập không hợp lệ';
    }
    // }
    // echo "<script>alert('Số lượng nhập không hợp lệ')</script>";

} else {
    // Trường hợp không có dữ liệu POST, có thể xử lý tùy ý
    echo "Không có dữ liệu được gửi.";
}
echo json_encode($data, true);
?>