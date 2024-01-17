<?php
session_start();
include("../assets/connect/connect.php");

$id = $_SESSION['manager_id'];
?>
<?php
if (!isset($_SESSION['manager_id'])) {
    header('location:../');
    exit();
}
?>

<?php
$result = mysqli_query($conn, "SELECT `resource`.`resource_name`, `resource`.`quantity`,`resource`.`resource_id`,`employee`.`employee_id`, date_format(`resource`.`expiration_time`, '%Y-%c-%e') as `expiration_time`,date_format(`resource`.`created_time`, '%Y-%c-%e') as `created_time`, `resource`.`status`
                                FROM `resource`
                                join `resource_detail` on `resource`.`resource_id` = `resource_detail`.`resource_id`
                                join `inventory` on `inventory`.`inventory_id` = `resource_detail`.`inventory_id`
                                join `inventory_details` on `inventory`.`inventory_id` = `inventory_details`.`inventory_id`
                                join `employee` on `employee`.`employee_id` = `inventory_details`.`employee_id`
                                where `employee`.`employee_id` = '$id' and `resource`.`status` = 'Đã lưu kho'
                                Order by `resource`.`expiration_time` asc");

if (isset($_POST['require'])) {
    $resource_id = $_POST['require'];
    $update_resource = mysqli_query($conn, "UPDATE `resource` set `status` = 'Yêu cầu xuất NVL' where `resource_id` = $resource_id");
    if ($update_resource === true) {
        // echo "<script>alert('Yêu cầu thành công')</script>";
        header("location: ./export_resource.php");
    } else {
        echo "<script>alert('Yêu cầu thất bại')</script>";
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
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/logo/logo96x96.png">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>q
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<style>
    .slc-ivn {
        text-align: center;
    }

    .page-wrapper .container-fluid .card form select {
        text-align: center;
        width: 30%;
        padding: 12px;
        border: 2px solid #26c6da;
        border-radius: 25px;
        margin-top: 6px;
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

    .page-wrapper .container-fluid .card form .button1 {
        text-align: center;
        margin-top: 20px;
    }
</style>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!-- <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div> -->
    <!-- </div> -->
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
                        <h3 class="page-title mb-0 p-0">Xuất nguyên vật liệu</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Trang Chủ</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">Kho nguyên vật liệu</li> -->
                                    <li class="breadcrumb-item active" aria-current="page">Yêu cầu xuất nguyên vật liệu
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title" style="text-align: center;">Kho Nguyên Vật Liệu</h2>
                                <!-- <h6 class="card-subtitle">Inventory <code>.table</code></h6> -->

                                <form method="POST">

                                    <table class="table user-table">
                                        <thead>
                                            <tr style="text-align: center;">
                                                <th>#</th>
                                                <!-- <th class="border-top-0">ID</th> -->
                                                <th class="border-top-0">Tên NVL</th>
                                                <th class="border-top-0">Số lượng</th>
                                                <th class="border-top-0">Trạng thái</th>
                                                <th class="border-top-0">Ngày sản xuất</th>
                                                <th class="border-top-0">Hạn sử dụng</th>
                                                <th class="border-top-0"></th>
                                            </tr>
                                            <!-- <th class="border-top-0" colspan="2">Update</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            ?>
                                            <?php
                                            $count = 1;
                                            while ($row = mysqli_fetch_array($result)) {

                                                ?>
                                                <tr class="action" style="text-align: center;">
                                                    <!-- <td><input type="checkbox" name="<?php echo $row['resource_id'] ?>"
                                                            value="<?php //echo $row['inventory_id'] ?>">
                                                    </td> -->
                                                    <td>
                                                        <?php echo $count++; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['resource_name']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['quantity']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['status']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['created_time']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['expiration_time']; ?>
                                                    </td>
                                                    </td>
                                                    <td style="width: 13%; text-align: center;">
                                                        <!-- <a
                                                            href="./inventory_details.php?shelves_id=<?php echo $row['shelves_id'] ?>&manager_id=<?php echo $_SESSION['manager_id'] ?>">
                                                            Xem
                                                        </a> -->
                                                        <button type="submit" name="require" class="btn btn-info text-white"
                                                            data-toggle="modal"
                                                            value="<?php echo $row['resource_id'] ?>">Yêu cầu</button>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </form>
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
</body>

</html>