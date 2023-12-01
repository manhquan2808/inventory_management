<?php
session_start();
include '../assets/connect/connect.php';

if (!isset($_SESSION['employee_id'])) {
    header('location:../');
    exit();
}
$id = $_SESSION['employee_id'];
?>
<?php
$data = [];
$query = mysqli_query($conn, "select * from `inventory`");
if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
        array_push($data, $row);
    }
}
?>

<?php
$result = mysqli_query($conn, "SELECT `resource`.`resource_id`, `inventory_details`.`employee_id`, `resource`.`created_time`,`resource`.`resource_name`, `resource`.`status`, `resource`.`quantity`
                        FROM `resource` 
                        join `resource_detail` on `resource_detail`.`resource_id` = `resource`.`resource_id` 
                        join `inventory` on `inventory`.`inventory_id` = `resource_detail`.`inventory_id`
                        join `inventory_details` on `inventory_details`.`inventory_id` = `inventory`.`inventory_id`
                        join `employee` on `inventory_details`.`employee_id` = `employee`.`employee_id`
                        where  `resource`.`status` like 'Chờ nhập kho'
                        and `inventory_details`.`employee_id` = '$id'
                        ORDER BY `resource`.`created_time` DESC");
if (isset($_POST['submit'])) {
    $check_box = [];
    while ($row_check = mysqli_fetch_assoc($result)) {
        if (isset($_POST[$row_check['resource_id']])) {
            array_push($check_box, $_POST[$row_check['resource_id']]);
        }
    }
    if (count($check_box) > 0) {

        foreach ($check_box as $key => $value) {
            $update_resource = mysqli_query($conn, "UPDATE `resource` SET `status`='Đã kiểm tra', `created_time` = NOW() 
                                                        WHERE `resource_id`=$value");
            $update_resource_detail = mysqli_query($conn, "UPDATE `resource_detail` set `status` = 'Nhập kho', `time` = NOW() WHERE `resource_id`=$value");

        }
        // $query_insert_issue = mysqli_query($conn, "INSERT INTO `issue`(`issue_type`, `status`, `inventory_id`) VALUES ('Nguyên vật liệu', 'Nhập', '$inventory_id')");
        header("location: ./check_resource.php");
        // echo "<script>alert('Update Successfully!')</script>";
    } else {
        echo "<script>alert('Vui lòng chọn ít nhất một nguyên vật liệu để nhập!')</script>";
    }
}

if (isset($_POST['submit2'])) {
    $check_box = [];
    while ($row_check = mysqli_fetch_assoc($result)) {
        if (isset($_POST[$row_check['resource_id']])) {
            array_push($check_box, $_POST[$row_check['resource_id']]);
        }
    }
    if (count($check_box) > 0) {

        foreach ($check_box as $key => $value) {
            $update_resource = mysqli_query($conn, "UPDATE `resource` SET `status`='Hàng lỗi', `created_time` = NOW() 
                                                        WHERE `resource_id`=$value");
            $update_resource_detail = mysqli_query($conn, "UPDATE `resource_detail` set `status` = 'Hàng lỗi, trả hàng', `time` = NOW() WHERE `resource_id`=$value");

            // $insert_resource_detail = mysqli_query($conn, "INSERT INTO `resource_detail`(`resource_id`, `inventory_id`) values ('$value', '$inventory_id')");

        }
        // $query_insert_issue = mysqli_query($conn, "INSERT INTO `issue`(`issue_type`, `status`, `inventory_id`) VALUES ('Nguyên vật liệu', 'Nhập', '$inventory_id')");
        header("location: ./check_resource.php");
    } else {
        echo "<script>alert('Vui lòng chọn ít nhất một nguyên vật liệu để nhập!')</script>";
    }
}
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, materialpro admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, materialpro admin lite design, materialpro admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Material Pro Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Material Pro Lite Template by WrapPixel</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/materialpro-lite/" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="../assets/css/login.css"> -->
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/logo/logo96x96.png">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">

</head>
<style>
    .page-wrapper .container-fluid .card form p {
        color: #26c6da;
        font-size: 24px;
        text-align: center;
    }

    .page-wrapper .container-fluid .card form label {
        color: #26c6da;
        display: block;
        margin-bottom: 6px;
    }

    .page-wrapper .container-fluid .card form .button1 {
        text-align: center;
        margin-top: 20px;
    }

    .page-wrapper .container-fluid .card form .submit {
        background-color: #26c6da;
        color: #fff;
        padding: 12px 24px;
        border: none;
        border-radius: 25px;
        cursor: pointer;
        font-size: 16px;
    }

    .page-wrapper .container-fluid .card form .submit:hover {
        background-color: #0a7c8a;
    }

    .field {
        position: relative;
        margin-bottom: 20px;
        display: flex;
        justify-content: center;
    }

    .card form select,
    .select-field {
        text-align: center;
        width: 159px;
        border: 2px solid #26c6da;
        border-radius: 25px;
        margin-top: 6px;
    }
</style>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <?php
        include './header.php';
        include './sidebar_left.php';
        ?>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0">Kiểm tra hàng nhập</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Nguyên Vật Liệu</li>
                                    <li class="breadcrumb-item active" aria-current="page">Điều Phối</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <!-- column -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form method="POST">
                                      

                                     
                                        <table class="table user-table">
                                            <thead>
                                                <tr style="text-align: center;">
                                                    <th class="border-top-0">#</th>
                                                    <th class="border-top-0">Tên nguyên vật liệu</th>
                                                    <th class="border-top-0">Số lượng (kg)</th>
                                                    <th class="border-top-0">Trạng thái</th>
                                                    <th class="border-top-0">Thời gian</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php

                                                
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    ?>


                                                    <tr class="action" style="text-align: center;">
                                                        <td><input type="checkbox" name="<?php echo $row['resource_id'] ?>"
                                                                value="<?php echo $row['resource_id'] ?>">
                                                        </td>
                                                        <td>
                                                            <?php echo $row['resource_name']; ?>
                                                        </td>
                                                        <td>
                                                            <input type="hidden" name="quantity"
                                                                value="<?php echo $row['quantity']; ?>">
                                                            <?php echo $row['quantity']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['status']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['created_time']; ?>
                                                        </td>
                                                    </tr>
                                                <?php } ?>

                                            </tbody>
                                        </table>

                                        <div class="button1" style="text-align: center;">
                                            <input style="margin-right:15px;" type="submit" id="submit"
                                                class="submit button1" name="submit" value="Xác nhận đạt chuẩn">
                                            <input style="margin-left:15px;" type="submit" id="submit2"
                                                class="submit button1" name="submit2" value="Không đạt chuẩn">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer"> © 2023 Inventory Management by <a
                    href="https://github.com/manhquan2808/inventory">inventory_management </a>
            </footer>

        </div>

    </div>
    <script src="../assets/plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>

        $("#submit").on("click", function (e) {

            if (!($("input[type=checkbox]").is(":checked"))) {
                e.preventDefault();
                alert("Vui lòng chọn nguyên vật liệu!");
            }
        });
    </script>
</body>

</html>