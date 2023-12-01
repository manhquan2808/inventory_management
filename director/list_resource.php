<?php
session_start();
include("../assets/connect/connect.php");

$id = $_SESSION['director_id'];
?>
<?php
if (!isset($_SESSION['director_id'])) {
    header('location:../');
    exit();
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
                        <h3 class="page-title mb-0 p-0">Resource</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Resource</li>
                                    <li class="breadcrumb-item active" aria-current="page">List Resource</li>
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
                                            mysqli_query($conn, "DELETE FROM `resource` WHERE `resource`.`resource_id` = '$remove'");
                                        }
                                        $result = mysqli_query($conn, "SELECT * FROM `resource`
                                                                ORDER BY `status` like 'Require' desc"); 
                                        // $result = mysqli_query($conn, "SELECT resource_id, `resource_name`, `status`, SUM(quantity) as quantity  
                                        // FROM `resource` 
                                        // WHERE (`resource_name` = '213' OR `resource_name` = 'a') 
                                        // AND `status` = 'Require'
                                        // GROUP BY `resource_name`, `status`; "); ?>
                                        <table class="table user-table">
                                            <thead>
                                                <tr>
                                                    <th class="border-top-0">Resource Name</th>
                                                    <th class="border-top-0">Quantity</th>
                                                    <th class="border-top-0">Status</th>
                                                    <th class="border-top-0">Time</th>
                                                    <th class="border-top-0">Update</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <tr class="action">
                                                        <td style="text-align: center;">
                                                            <!-- // <th colspan='2'>Update</th> -->
                                                            <?php echo $row['resource_name']; ?>

                                                        </td>
                                                        <td style="text-align: center;">
                                                            <?php echo $row['quantity']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['status']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['created_time']; ?>
                                                        </td>
                                                        <!-- <td style="width: 13%; text-align: center;">
                                                            <a
                                                                href="./edit_acc.php?resource_id=<?php // echo $row['resource_id'] ?>&director_id=<?php //echo $_SESSION['director_id'] ?>">
                                                                Cập Nhật
                                                            </a>
                                                        </td> -->
                                                        <td style="width: 5%; text-align: center;">
                                                            <a href="?remove_resource_id=<?php echo $row['resource_id']; ?>"
                                                                onclick="return confirm('Are You Sure?')">
                                                                Xóa
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>

                                            </tbody>
                                        </table>
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
</body>

</html>