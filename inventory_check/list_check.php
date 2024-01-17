<?php
session_start();
include("../assets/connect/connect.php");

$id = $_SESSION['inventory_check_id'];
?>
<?php
if (!isset($_SESSION['inventory_check_id'])) {
    header('location:../');
    exit();
}
?>

<?php
$result = mysqli_query($conn, "SELECT `resource`.`resource_id`, `inventory_check`.`id`, `inventory_details`.`employee_id`, `inventory_check`.`status`
                                FROM `resource`
                                JOIN `inventory_check` on `inventory_check`.`resource_id` = `resource`.`resource_id`
                                join `inventory_details` on `inventory_details`.`inventory_id` = `inventory_check`.`inventory_id`
                                where `inventory_details`.`employee_id` = '$id' and `inventory_check`.`status` = 'Tiền kiểm tra'
                                ");
if (isset($_POST['submit'])) {
    // $check_box = [];
    // if (count($check_box)) {
    //     foreach ($check_box as $key => $value) {
    //         $update_inventory_check_status = mysqli_query($conn, "UPDATE `inventory_check` set `status` = 'Chờ duyệt'");
    //     }
    // }
    $check_box = [];
    while ($row_check = mysqli_fetch_assoc($result)) {
        if (isset($_POST[$row_check['resource_id']])) {
            array_push($check_box, $_POST[$row_check['resource_id']]);
        }
    }
    var_dump($check_box);

    if (count($check_box) > 0) {
        foreach ($check_box as $key => $value) {
            $update_status_ex = mysqli_query($conn, "UPDATE `inventory_check` set `status` = 'Yêu cầu kiểm kê', `check_date` = NOW() where `resource_id` = $value");
            // $update_status_ex = mysqli_query($conn, "UPDATE `resource` SET `status` = 'Yêu cầu xuất' where `resource_id` = $value");
            // $update_capacity = mysqli_query($conn, "");

        }
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
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">

</head>
<style>
    /* CSS cho form Create Account */
    .form {
        width: 1200px;
    }

    .page-wrapper .container-fluid .card {
        background-color: #fff;
        padding: 20px;
    }

    .page-wrapper .container-fluid .card form {
        min-width: 400px;
        margin: 0 auto;
    }

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

    .page-wrapper .container-fluid .card form .field {
        position: relative;
        margin-bottom: 20px;
    }

    .page-wrapper .container-fluid .card form select,
    .page-wrapper .container-fluid .card form .input-field,
    .input-number {
        width: 100%;
        padding: 12px;
        border: 2px solid #26c6da;
        border-radius: 25px;
        margin-top: 6px;
    }

    .page-wrapper .container-fluid .card form .error {
        color: red;
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

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php
        include './header.php';
        include './sidebar_left.php';
        ?>

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0">Kiểm Kê</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">Resource</li> -->
                                    <li class="breadcrumb-item active" aria-current="page">Danh sách kiểm kê</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- <h4 class="card-title">Basic Table</h4>
                                <h6 class="card-subtitle">Add class <code>.table</code></h6> -->

                                <!-- <table class="table user-table"> -->
                                <form method="POST">
                                    <!-- <h4 class="card-title">Basic Table</h4> -->
                                    <!-- <h6 class="card-subtitle">Add class <code>.table</code></h6> -->

                                    <?php
                                    if (isset($_REQUEST['remove_resource_id'])) {
                                        $remove = $_REQUEST['remove_resource_id'];
                                        mysqli_query($conn, "DELETE FROM `inventory_check` WHERE `inventory_check`.`id` = '$remove'");
                                    }
                                    $result = mysqli_query($conn, "SELECT `resource`.`resource_id`, `inventory_check`.`id`, `resource`.`quantity`, `inventory_check`.`actual_quantity`, `resource`.`resource_name`, `inventory_check`.`check_date`, `inventory_details`.`employee_id`, `inventory_check`.`status`
                                                                        FROM `resource`
                                                                        JOIN `inventory_check` on `inventory_check`.`resource_id` = `resource`.`resource_id`
                                                                        join `inventory_details` on `inventory_details`.`inventory_id` = `inventory_check`.`inventory_id`
                                                                        where `inventory_details`.`employee_id` = '$id' and `inventory_check`.`status` = 'Tiền kiểm tra'
                                                                        ORDER BY `inventory_check`.`check_date` desc");
                                    // $result = mysqli_query($conn, "SELECT resource_id, `resource_name`, `status`, SUM(quantity) as quantity  
                                    // FROM `resource` 
                                    // WHERE (`resource_name` = '213' OR `resource_name` = 'a') 
                                    // AND `status` = 'Require'
                                    // GROUP BY `resource_name`, `status`; "); ?>
                                    <table class="table user-table">
                                        <thead>
                                            <tr style="text-align: center;">
                                                <td class="border-top-0">#</td>
                                                <td class="border-top-0">Tên NVL</td>
                                                <td class="border-top-0">Số lượng hệ thống</td>
                                                <td class="border-top-0">Số lượng thực tế</td>
                                                <td class="border-top-0">Thời gian</td>
                                                <td class="border-top-0"></td>
                                                <!-- <th class="border-top-0">Update</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $count = 1;
                                            while ($row = mysqli_fetch_array($result)) {

                                                ?>
                                                <tr class="action" style="text-align: center;">
                                                    <td><input type="checkbox" name="<?php echo $row['resource_id'] ?>"
                                                            value="<?php echo $row['resource_id'] ?>">
                                                    </td>
                                                    <td>
                                                        <!-- // <th colspan='2'>Update</th> -->
                                                        <?php echo $row['resource_name']; ?>

                                                    </td>
                                                    <td>
                                                        <?php echo $row['quantity']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['actual_quantity']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['check_date']; ?>
                                                    </td>
                                                    <!-- <td style="width: 13%; text-align: center;">
                                                            <a
                                                                href="./edit_acc.php?resource_id=<?php // echo $row['resource_id'] ?>&director_id=<?php //echo $_SESSION['director_id'] ?>">
                                                                Cập Nhật
                                                            </a>
                                                        </td> -->
                                                    <td>
                                                        <a href="?remove_resource_id=<?php echo $row['id']; ?>"
                                                            onclick="return confirm('Are You Sure?')">
                                                            Xóa
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                    <div class="field text-center">
                                        <input type="submit" id="submit" name="submit" class="submit button1"
                                            value="Tạo Đơn Kiểm Kê">

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right sidebar -->
            <!-- ============================================================== -->
            <!-- .right-sidebar -->
            <!-- ============================================================== -->
            <!-- End Right sidebar -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">© 2023 Inventory Management by <a
                href="https://github.com/manhquan2808/inventory">inventory_management </a>
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
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