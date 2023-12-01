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
// $target_dir = "uploads/";
// $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
// $uploadOk = 1;
// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// // Check if image file is a actual image or fake image
// if(isset($_POST["submit"])) {
//   $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//   if($check !== false) {
//     echo "File is an image - " . $check["mime"] . ".";
//     $uploadOk = 1;
//   } else {
//     echo "File is not an image.";
//     $uploadOk = 0;
//   }
// }
if(isset($_POST['submit'])){

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
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!-- <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div> -->
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
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0">Trang Cá Nhân</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Trang Chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Trang Cá Nhân</li>
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
                <!-- Row -->
                <div class="row">
                
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <form method="POST">
                            <?php
                            
                            $result = mysqli_query($conn, "SELECT *,CONCAT(`first_name` , ' ' , `last_name`) as `full_name` 
                                                            FROM `employee` 
                                                            JOIN `roles` on `roles`.`role_id` = `employee`.`role_id`
                                                            where `employee`.`employee_id` = '$id'");
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <div class="card">
                                    <div class="card-body profile-card">
                                        <center class="mt-4"> <img src="<?php echo $row['avt']; ?>" class="rounded-circle"
                                                width="150" />
                                            <h4 class="card-title mt-2"><?php echo $row ['full_name']; ?></h4>
                                            <h6 class="card-subtitle"><?php echo $row ['role_name']; ?></h6>
                                            <form method="POST" enctype="multipart/form-data">
                                                <input type="submit" class="btn btn-success mx-auto mx-md-0 text-white" name="img" id="img" value="Update Profile Picture">
                                            </form>
                                            <!-- <div class="row text-center justify-content-center">
                                        <div class="col-4">
                                            <a href="javascript:void(0)" class="link">
                                                <i class="icon-people" aria-hidden="true"></i>
                                                <span class="value-digit">254</span>
                                            </a></div>
                                        <div class="col-4">
                                            <a href="javascript:void(0)" class="link">
                                                <i class="icon-picture" aria-hidden="true"></i>
                                                <span class="value-digit">54</span>
                                            </a></div> -->
                                            <!-- </div> -->
                                        </center>
                                    </div>
                                </div>
                            <?php } ?>
                        </form>
                    </div>
                    <!-- Column -->
                    <!-- Column -->

                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material mx-2">
                                    <?php
                                    $result = mysqli_query($conn, "SELECT *,CONCAT(`first_name` , ' ' , `last_name`) as `full_name` FROM `employee` where `employee_id` = '$id'");
                                    while ($row = mysqli_fetch_assoc($result)) { ?>
                                        <div class="form-group">
                                            <label class="col-md-12 mb-0">Họ Và Tên</label>

                                            <div class="col-md-12">

                                                <input type="text" placeholder="<?php echo $row['full_name']; ?>"
                                                    class="form-control ps-0 form-control-line" disabled>

                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label for="example-email" class="col-md-12">Email</label>

                                            <div class="col-md-12">
                                                <input type="email" placeholder="<?php echo $row['email']; ?>"
                                                    class="form-control ps-0 form-control-line" name="example-email"
                                                    id="example-email" disabled>
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12 mb-0">Số Điện Thoại</label>

                                            <div class="col-md-12">
                                                <input type="text" placeholder="<?php echo $row['number'] ?>"
                                                    class="form-control ps-0 form-control-line" disabled>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12 mb-0">Ngày Sinh</label>

                                            <div class="col-md-12">
                                                <input type="text" placeholder="<?php echo $row['birthdate'] ?>"
                                                    class="form-control ps-0 form-control-line" disabled>
                                            </div>

                                        </div>


                                        <div class="form-group">
                                            <div class="col-sm-12 d-flex">
                                                <button type="submit" class="btn btn-success mx-auto mx-md-0 text-white"><a
                                                        href="./re_pass.php" style="color: white;">Đổi Mật Khẩu</a></button>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Column -->
                </div>
                <!-- Row -->
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
            <footer class="footer"> © 2023 Inventory Management by <a
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