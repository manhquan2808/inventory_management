<?php
session_start();
include '../assets/connect/connect.php';

$id = $_SESSION['director_id'];
?>
<?php
if (!isset($_SESSION['director_id'])) {
    header('location:../');
    exit();
}
?>
<?php
if (isset($_POST["submit"])) {
    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
    $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
    $number = mysqli_real_escape_string($conn, $_POST["number"]);
    $uname = mysqli_real_escape_string($conn, $_POST["uname"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $birthdate = mysqli_real_escape_string($conn, $_POST["birthdate"]);
    // $roles = mysqli_real_escape_string($conn, $_POST["roles"]);
    $hash_pass = password_hash($password, PASSWORD_ARGON2I);
    $role_id = $_POST['lvl1'];
    

    if (empty($fname) || empty($lname) || empty($number) || empty($uname) || empty($password) || empty($birthdate)) {
        echo '<script>
                alert("Nhập đầy đủ thông tin")
                </script>';

    } else {
        $select_nickname = mysqli_query($conn, "SELECT * FROM `roles` where `role_id` = $role_id");
        $row_nickname = mysqli_fetch_assoc($select_nickname);
        $id = $row_nickname['nickname'] . rand(10000, 99999);
        
        $query = mysqli_query($conn, "INSERT INTO `employee` (`employee_id`, `role_id`, `first_name`, `last_name`, `number`, `email`, 
                                        `password`, `birthdate`) VALUES ('$id', '$role_id', '$fname', '$lname', '$number', '$uname', '$hash_pass', '$birthdate')");
                                        $inventory_id = $_POST['lvl2'];
        
        
        mysqli_query($conn, "INSERT INTO `inventory_details`(`inventory_id`, `employee_id`) VALUES ($inventory_id,'$id')");
        if ($query) {
            echo '<script>
                    alert("Tạo tài khoản thành công");
                    window.location.href = "../director";
                    </script>';

        } else {
            echo '<script>
                    alert("Tạo tài khoản không thành công")
                    </script>';
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
    <link rel="canonical" href="https://www.wrappixel.com/templates/materialpro-lite/" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0">Tài Khoản</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Tài Khoản</li>
                                    <li class="breadcrumb-item active" aria-current="page">Tạo Tài Khoản</li>
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
                    <div class="col-12">
                        <div class="card">
                            <form class="form" method="POST"">
                                <p id="heading">Tạo Tài Khoản</p>
                                <label for="fname">Họ và Tên đệm</label>
                                <div class="field">
                                    <input autocomplete="off" placeholder="First Name" id="fname" name="fname" class="input-field"
                                        type="text" required>
                                </div>
                                <span id="fnameError" class="error"></span>
                                <label for="lname">Tên</label>
                                <div class="field">
                                    <input autocomplete="off" placeholder="Last Name" id="lname" name="lname" class="input-field"
                                        type="text" required>
                                </div>
                                <span id="lnameError" class="error"></span>
                                <label for="number">Số điện thoại</label>
                                <div class="field">
                                    <input autocomplete="off" placeholder="Number" id="number" name="number" class="input-field"
                                        type="number" required>
                                </div>
                                <span id="numberError" class="error"></span>
                                <label for="uname">Email</label>
                                <div class="field">
                                    <input autocomplete="off" placeholder="Username" id="uname" name="uname" class="input-field"
                                        type="email" required>
                                </div>
                                <span id="unameError" class="error"></span>
                                <label for="password">Mật khẩu</label>
                                <div class="field">
                                    <input autocomplete="off" placeholder="Password" id="password" name="password" class="input-field"
                                        type="password" required>
                                </div>
                                <span id="passwordError" class="error"></span>
                                <label for="birthdate">Ngày sinh</label>
                                <div class="field">
                                    <input autocomplete="off" placeholder="Date of Birth" id="birthdate" name="birthdate"
                                        class="input-field" type="date" required>
                                </div>

                                <?php 
                                // $select_inventory = mysqli_query($conn, "SELECT `employee`.`roles` FROM `inventory` 
                                //                                          join `inventory_details` on `inventory_details`.`inventory_id` = `inventory`.`inventory_id`
                                //                                          join `employee` on `employee`.`employee_id` = `inventory_details`.`employee_id`");
                                // $row_inventory = mysqli_fetch_assoc($select_inventory);

                                ?>
                                <span id="birthdateError" class="error"></span>
                                <label for="roles">Chức vụ</label>
                                <div class="field">
                                    <select name="lvl1" id="lvl1" required>
                                    <option value="select">Chọn chức vụ Quản Lý</option>
                                    <?php
                                        $select_roles = mysqli_query($conn, "SELECT * FROM `roles` where `nickname` like 'QL%'");
                                        while ($row_roles = mysqli_fetch_assoc($select_roles)) {
                                            ?>
                                            
                                            <option value="<?php echo $row_roles['role_id'] ?>"><?php echo $row_roles['role_name']; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                
                                
                                <label for="inventory">Chọn kho</label>
                                <div class="field">
                                    <select name="lvl2" id="lvl2" >
                                        <!-- <option value="" >Chọn kho</option> -->
                                        <!-- <option value="QL" selected>Quản Lý Nguyên Vật Liệu</option>
                                        <option value="QL_TP" selected>Quản Lý Thành Phẩm</option> -->

                                    </select>
                                </div>

                                <span id="rolesError" class="error"></span>
                                <div class="button1">
                                    <input value="Submit" class="submit button1" name="submit" type="submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <
            </div>
         
            <footer class="footer">© 2023 Inventory Management by <a
                    href="https://github.com/manhquan2808/inventory">inventory_management </a>
            </footer>

        </div>

        <!-- End Page wrapper  -->

    </div>
    
    <!-- End Wrapper -->
    
    
    <!-- All Jquery -->
    
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
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function () {

        });

        $(document).on("change", "#lvl1", function (e) {
            e.preventDefault();

            let lvl1_id = $("#lvl1").val();
            console.log(lvl1_id)

            $.ajax({
                url: "select_inventory.php",
                method: "post",
                dataType: "json",
                data: {
                    lvl1_id: lvl1_id
                },
                success: function (data) {
                    lvl2_body = "";
                    console.log(data)
                    for (let i = 0; i < data.length; i++) {
                        lvl2_body += `<option value="${data[i].inventory_id}">${data[i].inventory_name}</option>`;
                    }

                    $("#lvl2").html(lvl2_body);
                }
            });
        });
    </script>
</body>

</html>