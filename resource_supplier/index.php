<?php
session_start();
include("../assets/connect/connect.php");

$id = $_SESSION['resource_supplier_id'];
?>
<?php
if (!isset($_SESSION['resource_supplier_id'])) {
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
<style>
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
          
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- <div class="row"> -->
                    <!-- column -->
                    <!-- <div class="col-sm-12"> -->
                        <div class="card">
                            <div class="card-body">
                                <!-- <h4 class="card-title">Basic Table</h4>
                                <h6 class="card-subtitle">Add class <code>.table</code></h6> -->
                                <!-- 
                                <table class="table user-table"> -->
                                <form method="POST">
                                    <!-- <h4 class="card-title">Basic Table</h4> -->
                                    <!-- <h6 class="card-subtitle">Add class <code>.table</code></h6> -->

                                    <?php
                                    if (isset($_REQUEST['update_resource_id'])) {
                                        $update = $_REQUEST['update_resource_id'];
                                        mysqli_query($conn, "UPDATE `resource` set `resource`.`status` = 'Accept' WHERE `resource`.`resource_id` = '$update'");
                                    } elseif (isset($_REQUEST['remove_resource_id'])) {
                                        $remove = $_REQUEST['remove_resource_id'];
                                        mysqli_query($conn, "UPDATE `resource` set `resource`.`status` = 'Reject' WHERE `resource`.`resource_id` = '$remove'");
                                    }
                                    $result = mysqli_query($conn, "SELECT * FROM `resource`
                                                                where `status` like 'Require'
                                                                ORDER BY `created_time` desc");
                                  
                                    

                                    ?>
                                    <table class="table user-table">
                                        <thead>
                                            <tr style="text-align: center;">
                                                <th>Num</th>
                                                <th class="border-top-0">Resource Name</th>
                                                <th class="border-top-0">Quantity</th>
                                                <th class="border-top-0">Status</th>
                                                <th class="border-top-0">Time</th>
                                                <th class="border-top-0" colspan="2">Update</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            while ($row = mysqli_fetch_array($result)) {
                                                if (isset($_POST['submit'])) {
                                                    // Xử lý submit ở đây
                                                    $check_box = [];
            
                                                    foreach ($_POST as $key => $value) {
                                                        if ($value !== 'Chấp nhận') {
                                                            array_push($check_box, $value);
                                                        }
                                                    }
            
                                                    foreach ($check_box as $value) {
                                                        mysqli_query($conn, "UPDATE `resource` set `status` = 'Accept' WHERE `resource_id` = $value");
                                                    }
            
                                                    // header("location:index.php");
                                                    // exit();
                                                }
            
                                                $result = mysqli_query($conn, "SELECT * FROM `resource` WHERE `status` LIKE 'Require' ORDER BY `created_time` DESC");
                                                $data = [];
                                                while ($row = mysqli_fetch_array($result)) {
                                                    $data[] = $row;
                                                  $count = 1; 
                                                ?>
                                                <tr class="action" style="text-align: center;">
                                                    <td><?php echo $count++; ?></td>
                                                    <!-- <td><input type="checkbox" name="<?php echo $row['resource_id'] ?>"
                                                            value="<?php echo $row['resource_id'] ?>">
                                                    </td> -->
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
                                                    
                                                    <td style="width: 5%; text-align: center;">
                                                        <a href="?update_resource_id=<?php echo $row['resource_id']; ?>"
                                                            onclick="return confirm('Accept?')">
                                                            Accept
                                                        </a>
                                                    </td>
                                                    <td style="width: 5%; text-align: center;">
                                                        <a href="?remove_resource_id=<?php echo $row['resource_id']; ?>"
                                                            onclick="return confirm('Reject?')">
                                                            Reject
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php }} ?>

                                        </tbody>
                                    </table>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <footer class="footer"> © 2021 Material Pro Admin by <a href="https://www.wrappixel.com/">wrappixel.com </a>
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