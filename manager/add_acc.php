<?php
session_start();
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
$result = mysqli_query($conn, "SELECT * FROM `inventory_details` 
                                where `employee_id` = '$id'");
$row = mysqli_fetch_assoc($result);
$inventory_id = $row['inventory_id'];
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


    if (empty($fname) || empty($lname) || empty($number) || empty($uname) || empty($password) || empty($birthdate) || empty($role_id)) {
        echo '<script>
                alert("Nhập đầy đủ thông tin")
                </script>';

    } else {
        $select_nickname = mysqli_query($conn, "SELECT * FROM `roles` where `role_id` = $role_id");
        $row_nickname = mysqli_fetch_assoc($select_nickname);
        $employee_id = $row_nickname['nickname'] . rand(10000, 99999);
        if (
            $query = mysqli_query($conn, "INSERT INTO `employee` (`employee_id`, `role_id`, `first_name`, `last_name`, `number`, `email`, 
        `password`, `birthdate`) VALUES ('$employee_id', '$role_id', '$fname', '$lname', '$number', '$uname', '$hash_pass', '$birthdate')")
        ) {
            $insert_employee = mysqli_query($conn, "INSERT INTO `inventory_details`(`inventory_id`, `employee_id`) VALUES($inventory_id, '$employee_id')");
        }
        if ($insert_employee) {
            echo '<script>
                    alert("Tạo tài khoản thành công");
                    window.location.href = "../manager";
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
                        <h3 class="page-title mb-0 p-0">Tài Khoản</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                            <form class="form" method="POST" onsubmit="return check_validate()">
                                <p id="heading">Tạo Tài Khoản</p>
                                <label for="fname">Họ và Tên đệm</label>
                                <div class="field">
                                    <input autocomplete="off" placeholder="First Name" id="fname" name="fname"
                                        class="input-field" type="text" required>
                                </div>
                                <span id="fnameError" class="error"></span>
                                <label for="lname">Tên</label>
                                <div class="field">
                                    <input autocomplete="off" placeholder="Last Name" id="lname" name="lname"
                                        class="input-field" type="text" required>
                                </div>
                                <span id="lnameError" class="error"></span>
                                <label for="number">Số điện thoại</label>
                                <div class="field">
                                    <input autocomplete="off" placeholder="Number" id="number" name="number"
                                        class="input-field" type="number" required>
                                </div>
                                <span id="numberError" class="error"></span>
                                <label for="uname">Email</label>
                                <div class="field">
                                    <input autocomplete="off" placeholder="Username" id="uname" name="uname"
                                        class="input-field" type="email" required>
                                </div>
                                <span id="unameError" class="error"></span>
                                <label for="password">Mật khẩu</label>
                                <div class="field">
                                    <input autocomplete="off" placeholder="Password" id="password" name="password"
                                        class="input-field" type="password" required>
                                </div>
                                <span id="passwordError" class="error"></span>
                                <label for="birthdate">Ngày sinh</label>
                                <div class="field">
                                    <input autocomplete="off" placeholder="Date of Birth" id="birthdate"
                                        name="birthdate" class="input-field" type="date" required>
                                </div>

                                <span id="birthdateError" class="error"></span>
                                <label for="roles">Chức vụ</label>
                                <div class="field">
                                    <select name="lvl1" id="lvl1" required>
                                        <option value="select">Chọn chức vụ</option>
                                        <?php
                                        $select_roles = mysqli_query($conn, "SELECT * FROM `roles` where `nickname` like 'NV%'");
                                        while ($row_roles = mysqli_fetch_assoc($select_roles)) {
                                            ?>

                                            <option value="<?php echo $row_roles['role_id'] ?>">
                                                <?php echo $row_roles['role_name']; ?>
                                            </option>
                                        <?php } ?>
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

            </div>

            <footer class="footer"> © 2023 Inventory Management by <a
                    href="https://github.com/manhquan2808/inventory">Inventory Management </a>
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