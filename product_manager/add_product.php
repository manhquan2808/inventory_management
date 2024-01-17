<?php
session_start();
include '../assets/connect/connect.php';

$id = $_SESSION['product_manager_id'];
?>
<?php
if (!isset($_SESSION['product_manager_id'])) {
    header('location:../');
    exit();
}
?>
<?php

switch (isset($_POST['submit'])) {
    case 'Submit': {

            // $status =  $_POST['txtsta'];
            $name = $_REQUEST['txtname'];
            $des = $_REQUEST['txtdes'];
            $price = $_REQUEST['txtprice'];
            // $quantity= $_REQUEST['txtquan'];
            $currentDateTime = date('Y-m-d H:i:s');
            if (empty($name) || empty($des) || empty($price)) {
                echo
                    "<script>
                            alert ('Nhập đầy đủ thông tin');
                        </script>";
            } else {
                if (
                    mysqli_query($conn, "INSERT INTO products(`product_id` ,`product_name`, `description`, `quantity`, `price`, `status`, `created_date`, `expiration_date`)
        values 
        (NULL,'$name','$des',0,'$price','Thành phẩm mới',DATE_ADD(CURDATE(),INTERVAL 365 DAY),'$currentDateTime')")
                ) {
                    echo '<script>
							alert("Thêm thành công");
							</script>';


                } else {
                    echo 'Thêm thất bại' . $conn->error;
                }
            }
            break;
        }

}
if (isset($_POST['submit1'])) {
    header("location:list_product.php");
}
unset($_REQUEST);
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
    <!-- <link rel="stylesheet" href="../assets/css/login.css"> -->
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<style>
    /* CSS cho form Create Account */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .form {
        width: 1200px;
    }

    .page-wrapper .container-fluid .card {
        background-color: #fff;
        padding: 20px;
    }

    .page-wrapper .container-fluid .card form {
        max-width: 400px;
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
    .page-wrapper .container-fluid .card form .input-field {
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
                        <h3 class="page-title mb-0 p-0">Thành Phẩm</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Thành Phẩm</li>
                                    <li class="breadcrumb-item active" aria-current="page">Thêm Thành Phẩm</li>
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
                    <div class="col-12">
                        <div class="card">
                            <form method="POST">
                                <!-- <div>
            <label>Resource Name</label>
            <input type="text" name="resource_name" id="resource_name"><br><br>
        </div> -->
                                <div class="error">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" name="txtname" class="input-field" id="txtname"><br><br>
                                </div>

                                </select>
                                <div class="error">
                                    <label>Mô tả</label>
                                    <textarea name="txtdes" id="txtdes" cols="67" rows="5"
                                        class="input-field"></textarea><br><br>
                                </div>
                                <!-- <div class="error">
                                    <label>Quantity</label>
                                    <input type="number" name="txtquan" class="input-field" id="txtquan"><br><br>
                                </div> -->

                                <div class="error">
                                    <label>Giá</label>
                                    <input type="number" name="txtprice" class="input-field" id="txtprice"><br><br>
                                </div>

                                <!-- <div class="error">
                                <label>Status</label>
                                
                                <select name="txtsta" id="txtsta">
                                    <option value="" hidden>Choose Resource</option>
                                    <?php
                                    // $status = array();
                                    
                                    // $query = "SELECT product_id, status FROM `products`";
                                    // $result = mysqli_query($conn, $query);
                                    
                                    // while ($row = mysqli_fetch_assoc($result)) {
                                    //     array_push($status, $row["status"]);
                                    //     //
                                    //     $result_rc = array_unique($status);
                                    
                                    // }
                                    // foreach ($result_rc as $key => $value) {
                                    //     echo '<option value="' . $value . '" >' . $value . '</option>';
                                    // }
                                    ?>
                                </select>
                                </div> -->
                                <!-- <div>
            <label>Inventory Name</label>
            <select name="Inventory_name" id="Inventory_name">
                <option value="" hidden>Choose Inventory</option>
                <?php
                // $Inventory_name = array();
                
                // $query = "SELECT Inventory_id, Inventory_name FROM `Inventory`";
                // $result = mysqli_query($conn, $query);
                
                // while ($row = mysqli_fetch_assoc($result)) {
                //     // array_push($Inventory_name, $row["Inventory_name"]);
                //     //
                //     // $result_iv = array_unique($Inventory_name);
                //     echo '<option value="' . $row['Inventory_id'] . '" >' . $row["Inventory_name"] . '</option>';
                
                // }
                
                ?>
            </select>
        </div>
        <div>
            <label>Shelves</label>
            <select name="shelves_name" id="shelves_name">
                <option value="" hidden>Choose shelves</option>
                <?php
                // $shelves_name = array();
                
                // $query = "SELECT shelves_id, shelves_name FROM `shelves`";
                // $result = mysqli_query($conn, $query);
                
                // while ($row = mysqli_fetch_assoc($result)) {
                //     echo '<option value="' . $row['shelves_id'] . '" >' . $row["shelves_name"] . '</option>';
                
                // }
                ?>
            </select>
        </div> -->
                                <div class="button1">
                                    <input type="submit" id="submit" class="submit button1" name="submit"
                                        value="Thêm Thành Phẩm">
                                </div>
                                <div class="button1">
                                    <input type="submit" id="submit1" name="submit1" class="submit button1"
                                        value="Xem Danh Sách">
                                </div>

                            </form>
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
            <footer class="footer"> © 2021 Material Pro Admin by <a href="https://www.wrappixel.com/">wrappixel.com </a>
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
    <script src="../manager/js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="../manager/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../manager/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../manager/js/custom.js"></script>
</body>

</html>