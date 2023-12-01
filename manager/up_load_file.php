<?php
session_start();

require('../library/php-excel-reader/excel_reader2.php');
// $utf8 = new Spreadsheet_Excel_Reader("cenik.xls", false, 'UTF-8'); 
require('../library/SpreadsheetReader.php');
include '../assets/connect/connect.php';

$id = $_SESSION['manager_id'];
?>
<?php
if (!isset($_SESSION['manager_id'])) {
    header('location:../');
    exit();
}
?>
<?php
if (isset($_POST['submit'])) {
    if (isset($_FILES['myFile'])) {
        $uploadFilePath = $_FILES['myFile']['name'];
        $file_name_tmp = $_FILES['myFile']['tmp_name'];

        $extension = array("csv");
        $uploadFolder = "upload/";

        $ext = pathinfo($uploadFilePath, PATHINFO_EXTENSION);

        if (in_array($ext, $extension) === false) {
            echo "<script>alert('Tệp không đúng định dạng! Chỉ nhận file có đuôi .csv')</script>";
        } else {
            move_uploaded_file($file_name_tmp, $uploadFilePath);
            
            $Reader = new SpreadsheetReader($uploadFilePath);
            $totalSheet = count($Reader->sheets());

            
            /* For Loop for all sheets */
            for ($i = 0; $i < $totalSheet; $i++) {


                $Reader->ChangeSheet($i);


                foreach ($Reader as $rowNumber => $Row) {

                    if ($rowNumber === 0) {
                        continue;
                    }

                    $resource_name = isset($Row[0]) ? $Row[0] : '';
                    $quantity = isset($Row[1]) ? $Row[1] : '';



                    $query = "insert into `resource`(`resource_name`,`quantity`,`status`, `expiration_time`) values('" . $resource_name . "','" . $quantity . "','Vừa nhập', DATE_ADD(CURDATE(),INTERVAL 365 DAY))";


                    //   $mysqli->query($query);
                    mysqli_query($conn, $query);
                }
                echo "<script>alert('Nhập nguyên vật liệu thành công.')</script>";


            }


            $totalSheet = count($Reader->sheets());
            echo "<script>alert('Upload file thành công')
            location.href './inventory_list.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('Chưa nhập dữ liệu')
        </script>";
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
    <!-- <link rel="stylesheet" href="../assets/css/login.css"> -->
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/logo/logo96x96.png">
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
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0">Nguyên Vật Liệu</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Nhập Nguyên Vật Liệu</li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">Add Resource</li> -->
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <form class="form-horizontal" action="" method="post" name="frmExcelImport"
                                id="frmExcelImport" enctype="multipart/form-data">
                                <div class="error">
                                    <label>Chọn file nhập nguyên vật liệu</label>
                                    <input type="file" name="myFile" class="input-field" id="myFile" require
                                        value=""><br><br>
                                </div>
                                <div style="text-align: center;">
                                    <a href="./Mau_Nhap_Nguyen_Vat_lieu.csv" download="Mau">***Tải mẫu nhập nguyên vật
                                        liệu ở đây***</a>
                                </div>
                                <div class="button1">
                                    <input type="submit" id="upload" class="submit button1" name="submit"
                                        value="Chấp nhận">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">© 2023 Inventory Management by <a href="https://github.com/manhquan2808/inventory">inventory_management </a>
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