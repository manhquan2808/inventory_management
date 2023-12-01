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
$result = mysqli_query($conn, "SELECT * FROM `resource`");
if (isset($_POST['submit'])) {
    $check_box = [];
    while ($row_check = mysqli_fetch_assoc($result)) {
        if (isset($_POST[$row_check['resource_id']])) {
            array_push($check_box, $_POST[$row_check['resource_id']]);
        }
    }


    if (count($check_box) > 0) {
        foreach ($check_box as $key => $value) {
            $update_status_ex = mysqli_query($conn, "UPDATE `resource` set `status` = 'Chấp nhận xuất NVL' where `resource_id` = $value");
            // $update_status_ex = mysqli_query($conn, "UPDATE `resource` SET `status` = 'Yêu cầu xuất' where `resource_id` = $value");
        }
    }
} else {
    // echo "<script>alert('Thất bại')</script>";
}

// if (isset($_POST['submit'])) {


//     $resource_name = mysqli_escape_string($conn, $_POST['resource_name']);
//     $quantity = mysqli_escape_string($conn, $_POST['quantity']);
//     // $Inventory_name = mysqli_escape_string($conn, $_POST['Inventory_name']);
//     if (empty($resource_name) || empty($quantity)) {
//         echo
//             "<script>
//                 alert ('Nhập đầy đủ thông tin');
//             </script>";
//     } else {
//         if (
//             mysqli_query($conn, "INSERT INTO `resource`(`resource_name`, `quantity`, `status`,`expiration_time`) 
//             VALUES ('$resource_name',$quantity, 'Require' ,DATE_ADD(CURDATE(),INTERVAL 365 DAY))")
//         ) {
//             echo "<script>
//                         alert('Thêm thành công');
//                     </script>";
//             // header("location:?action=done");
//         } else {
//             // Handle the error if the first INSERT query fails.
//             echo 'Có lỗi xảy ra';
//         }
//     }
// }
// if (isset($_POST['submit1'])) {
//     header("location:list_resource.php");
// }
// unset($_REQUEST);
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                        <h3 class="page-title mb-0 p-0">Duyệt Xuất NVL</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">Resource</li> -->
                                    <li class="breadcrumb-item active" aria-current="page">Duyệt Xuất NVL</li>
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
                        <div class="card" id="contact_form">
                            <form method="POST" action="" name="">
                                <!-- <div>
            <label>Resource Name</label>
            <input type="text" name="resource_name" id="resource_name"><br><br>
        </div> -->
                                <?php
                                $data = [];
                                $result_inventory = mysqli_query($conn, "SELECT * FROM `inventory` 
                                                                        join `inventory_type` on `inventory`.`type_id` = `inventory_type`.`id`
                                                                        where `inventory_type`.`id` = 1");
                                if (mysqli_num_rows($result_inventory)) {
                                    while ($row_inventory = mysqli_fetch_assoc($result_inventory)) {
                                        array_push($data, $row_inventory);
                                    }
                                }
                                ?>
                                <div class="field">
                                    <label>Chọn Kho</label>
                                    <select name="lvl1" id="lvl1">
                                        <option value="">Chọn Kho</option>
                                        <?php
                                        foreach ($data as $key => $value) {
                                            ?>
                                            <option value="<?php echo $value['inventory_id'] ?>">
                                                <?php echo $value['inventory_name'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <!-- <div class="field">
                                    <label>Chọn Nguyên Vật Liệu</label>
                                    <select name="lvl2" id="lvl2" class="resource_name">
                                        <option value="" hidden>Choose Resource</option>
                                        <?php
                                        // $resource_name = array();

                                        // $query = "SELECT resource_id, resource_name FROM `resource` ";
                                        // $result = mysqli_query($conn, $query);

                                        // while ($row = mysqli_fetch_assoc($result)) {
                                        //     array_push($resource_name, $row["resource_name"]);
                                        //     //
                                        //     $result_rc = array_unique($resource_name);

                                        // }
                                        // foreach ($result_rc as $key => $value) {
                                        //     echo '<option value="' . $value . '" >' . $value . '</option>';
                                        // }
                                        ?>
                                    </select>
                                </div> -->

                                <!-- <div class="field">
                                <label>Chọn Nguyên Vật Liệu</label>
                                    <select name="lvl2" id="lvl2" class="form-control">
                                        <option value="select">Chọn Nguyên Vật Liệu</option>
                                    </select>
                                </div> -->


                                <div id="txtHint"><b>Vui Lòng Chọn Kho Để Hiển Thị Danh Sách</b></div>


                                <!-- <div class="button1">
                                    <input type="button" id="submit" class="submit button1" name="submit"
                                        value="Submit">
                                </div> -->
                                <!-- <div class="button1">
                                    <input type="button" id="submit1" name="submit1" class="submit button1"
                                        value="View List"> -->
                        </div>

                        </form>

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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</body>
<script>



    $(document).ready(function () {

    });
    
    // console.log(lvl1_id)
    $(document).on("change", "#lvl1", function (e) {
        e.preventDefault();

     


        $.ajax({
            url: "select_resource.php",
            method: "post",
            dataType: "json",
            data: {
                q: "",
                lvl1_id: $("#lvl1").val()
            },
            success: function (data) {
                lvl2_body = "";
                console.log(data)
                for (let i = 0; i < data.length; i++) {
                    lvl2_body += `<option value="${data[i].resource_id}">${data[i].resource_name}</option>`;
                }

                $("#lvl2").html(lvl2_body);
            }
        });
    });

    $("#submit").on("click", function (e) {

        if (!($("input[type=checkbox]").is(":checked"))) {
            e.preventDefault();
            alert("Vui lòng chọn nguyên vật liệu!");
        }
    });
    // $(function () {
    //     const getForm = async (name, quantity) => {
    //         // let dataString = form.serialize();

    //         const res = await $.ajax({
    //             method: "POST",
    //             url: "process.php",
    //             dataType: "JSON",
    //             data: {
    //                 resource_name: name,
    //                 quantity: quantity

    //             }
    //         })
    //         return res

    //     }

    //     // $('form').validate();

    //     $('#submit').on('click', function (e) {
    //         // console.log(123)
    //         let kho = $("#resource_name").val()
    //         let quantity = $("#quantity").val()
    //         e.preventDefault();

    //         getForm(kho, quantity).then(function (data) {
    //             console.log(data)
    //             // $('#contact_form').html('<div id="message"></div>');

    //             // $('#message')
    //             //     .html('<h2>Contact Form Submitted</h2>')
    //             //     .append('<p>We will be in touch</p>')
    //             //     .hide()
    //             //     .fadeIn(1500)
    //         }).catch((e) => console.log(e))

    //         // let dataString = $(this).serialize();

    //         // $.ajax({
    //         //     type: 'POST',
    //         //     url: 'process.php',
    //         //     data: dataString,
    //         //     success: function () {


    //         //     }
    //         // });
    //     });
    // });

</script>
<script>
    let selects = document.querySelector("#lvl1")
    let text = document.querySelector("#txtHint")
    selects.addEventListener("change", function () {
        let str = selects.value
        if (selects.value == "") {
            document.getElementById("txtHint").innerHTML = "";
            return;
        }
        var xmlhttp = new XMLHttpRequest();
        // xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.onreadystatechange = function () {
            if (this.status == 200) {
                text.innerHTML = this.responseText;
            }
            // console.log(this.responseText)
        }
        xmlhttp.open("GET", `table_resource.php?q=${str}&lvl1_id=${$("#lvl1").val()}`, true);

        xmlhttp.send();
    })
    // console.log(this)
</script>

</html>