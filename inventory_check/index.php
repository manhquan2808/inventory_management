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
    <!-- chartist CSS -->
    <link href="../assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="../assets/plugins/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
</head>
<style>
    .container-fluid {
        position: relative;


    }

    .img-bg {
        position: absolute;
        background-image: url("../assets/images/background/index_bg.jpg");
        /* -webkit-filter: blur(3px); */
        /* filter: blur(3px); */
        filter: brightness(50%);
        /* The image used */
        /* Used if the image is unavailable */
        height: 500px;
        /* You must set a specified height */
        background-position: center center;
        /* Center the image */
        background-repeat: no-repeat;
        /* Do not repeat the image */
        /* background-size: cover; */
        background-size: cover;
        /* top: 0;
        left: 0; */
        width: 100%;
        height: 150%;
        z-index: 0;
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
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->

        <?php
        include 'header.php';
        include 'sidebar_left.php';
        ?>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <!-- <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0">Dashboard</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                </ol>
                            </nav>
                        </div>
                    </div> -->
                </div>
            </div>

            <div class="container-fluid" style="display: flex;">
                <div class="img-bg"></div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <!-- <div class="row"> -->
                <!-- Column -->
                <?php
                $select_employee = mysqli_query($conn, "SELECT CONCAT(`first_name`, ' ', `last_name`) as `full_name`, `roles`.`role_name`, `employee`.`employee_id` 
                                                            from employee
                                                            join `roles` on `roles`.`role_id` = `employee`.`role_id`
                                                            where `employee`.`employee_id` = '$id'");
                // while(mysqli_num_rows($select_employee)){
                $row_employee = mysqli_fetch_assoc($select_employee);
                ?>

                <div class="mx-auto d-flex justify-content-center align-items-center text-white text-center"
                    style="position: relative; z-index: 100000;">
                    <h1>Chào mừng <b style="text-decoration: underline; color: red">
                            <?php echo $row_employee['full_name'] ?>
                        </b> đến với
                        trang của <b style="text-decoration: underline; color: red">
                            <?php echo $row_employee['role_name'] ?>
                        </b>
                    </h1>
                </div>
                <?php // } ?>

                <!-- </div> -->
            </div>

        </div>

    </div>



    <footer class="footer"> © 2023 Inventory Management by <a
            href="https://github.com/manhquan2808/inventory">inventory_management </a>
    </footer>
   
    <script src="../assets/plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- chartist chart -->
    <script src="../assets/plugins/chartist-js/dist/chartist.min.js"></script>
    <script src="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 JavaScript -->
    <script src="../assets/plugins/d3/d3.min.js"></script>
    <script src="../assets/plugins/c3-master/c3.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/pages/dashboards/dashboard1.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>