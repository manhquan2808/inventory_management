<?php
session_start();
include '../assets/connect/connect.php';

if (!isset($_SESSION['manager_id'])) {
    header('location:../');
    exit();
}
$id = $_SESSION['manager_id'];
?>
<?php
$data = [];
$query = mysqli_query($conn, "select * from `inventory`");
if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
        array_push($data, $row);
    }
}
?>

<?php
$result = mysqli_query($conn, "SELECT `resource`.`resource_id`, `inventory_details`.`employee_id`, `resource`.`created_time`,`resource`.`resource_name`, `resource`.`status`, `resource`.`quantity`
                                FROM `resource` 
                                join `resource_detail` on `resource_detail`.`resource_id` = `resource`.`resource_id` 
                                join `inventory` on `inventory`.`inventory_id` = `resource_detail`.`inventory_id`
                                -- join `employee` on `employee`.`employee_id` = `inventory`.`employee_id`
                                -- join `shelves` on `shelves`.`inventory_id` = `inventory`.`inventory_id`
                                join `inventory_details` on `inventory_details`.`inventory_id` = `inventory`.`inventory_id`
                                join `employee` on `inventory_details`.`employee_id` = `employee`.`employee_id`
                                where  `resource`.`status` like 'Đã kiểm tra'
                                and `inventory_details`.`employee_id` = '$id'
                                ORDER BY `resource`.`created_time` DESC");
if (isset($_POST['submit'])) {
    $shelves_id = $_POST['lvl1'];
    if (!isset($_POST['lvl1']) || $shelves_id == 'select') {
        echo "<script>alert('Vui lòng chọn kệ!')</script>";
    } else {
        $check_box = [];
        while ($row_check = mysqli_fetch_assoc($result)) {
            if (isset($_POST[$row_check['resource_id']])) {
                array_push($check_box, $_POST[$row_check['resource_id']]);
            }
        }
        if (count($check_box) > 0) {

            foreach ($check_box as $key => $value) {
                $update_resource = mysqli_query($conn, "UPDATE `resource` SET `status`='Đã lưu kho' WHERE `resource_id`=$value");
                // $shelves_id = $_POST['lvl1'];
                $select_inventory = mysqli_query($conn, "SELECT * FROM `inventory` 
                                    join `resource_detail` on `inventory`.`inventory_id` = `resource_detail`.`inventory_id`
                                    join `resource` on `resource`.`resource_id` = `resource_detail`.`resource_id`
                                    WHERE `resource_detail`.`resource_id`= $value");
                $get_inventory = mysqli_fetch_assoc($select_inventory);
                $inventory_id_resource_detail = $get_inventory['inventory_id'];
                $resource_detail_id = $get_inventory['id'];
                // $newquantity = intval($quantity);
                // echo var_dump($newquantity);
                // update inventory
                

                $query_insert_issue_rc = mysqli_query($conn, "INSERT into `issue_resources`(`resource_detail_id`, `shelves_id`,`status`) VALUES ($resource_detail_id, '$shelves_id', 'Nhập nguyên vật liệu')");

                // $issue_id = mysqli_insert_id($conn);


                // ****************** UPDATE INVENTORY SỐ LƯỢNG CÒN LẠI CHỨA ĐƯỢC CỦA KHO ***********************************
                $select_resource = mysqli_query($conn, "SELECT `resource`.`quantity` FROM `resource`
                                                        join `resource_detail` on `resource_detail`.`resource_id` = `resource`.`resource_id`
                                                        join `shelves` on `shelves`.`inventory_id` = `resource_detail`.`inventory_id`
                                                        where `resource`.`resource_id` = $value");
                $row_resouce = mysqli_fetch_assoc($select_resource);
                $resource_id[] = $row_resouce['quantity'];

            }
            // $insert_resource_detail = mysqli_query($conn, "INSERT INTO `resource_detail`(`resource_id`, `inventory_id`) values ($value, $inventory_id_resource_detail)");
            

            // $quantity = $_POST['quantity'];
            foreach ($resource_id as $key => $value) {
                // echo $value;
                $capacity_sum = 0;
                $select_shelves = mysqli_query($conn, "SELECT * FROM `shelves` WHERE `shelves_id` = $shelves_id");
                $row_shelves = mysqli_fetch_assoc($select_shelves);
                $capacity_sum = $row_shelves['capacity'] - $value; 
                // echo $capacity_sum;
                $update_shelves = mysqli_query($conn, "UPDATE `shelves` SET `capacity` = $capacity_sum where `shelves_id` = $shelves_id");
            }
           
            // $query_insert_issue = mysqli_query($conn, "INSERT INTO `issue`(`issue_type`, `status`, `inventory_id`) VALUES ('Nguyên vật liệu', 'Nhập', '$inventory_id')");
            header("location: ./arrange_shelves.php");
            // echo "<script>alert('Update Successfully!')</script>";
        } else {
            echo "<script>alert('Vui lòng chọn ít nhất một nguyên vật liệu để nhập!')</script>";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="../assets/css/login.css"> -->
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/logo/logo96x96.png">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">

</head>
<style>
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

    .field {
        position: relative;
        margin-bottom: 20px;
        display: flex;
        justify-content: center;
    }

    .card form select,
    .select-field {
        text-align: center;
        width: 159px;
        border: 2px solid #26c6da;
        border-radius: 25px;
        margin-top: 6px;
    }
</style>

<body>
    <!-- <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div> -->
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
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
                                    <li class="breadcrumb-item active" aria-current="page">Nguyên Vật Liệu</li>
                                    <li class="breadcrumb-item active" aria-current="page">Điều Phối</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <!-- column -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form method="POST">
                                        <!-- <h4 class="card-title">Basic Table</h4> -->
                                        <!-- <h6 class="card-subtitle">Add class <code>.table</code></h6> -->

                                        <?php
                                        // if (isset($_REQUEST['remove_resource_id'])) {
                                        //     $remove = $_REQUEST['remove_resource_id'];
                                        //     mysqli_query($conn, "DELETE FROM `resource` WHERE `resource`.`resource_id` = '$remove'");
                                        // }
                                        
                                        ?>
                                        <table class="table user-table">
                                            <thead>
                                                <tr style="text-align: center;">
                                                    <th class="border-top-0">#</th>
                                                    <th class="border-top-0">Tên nguyên vật liệu</th>
                                                    <th class="border-top-0">Số lượng (kg)</th>
                                                    <th class="border-top-0">Trạng thái</th>
                                                    <th class="border-top-0">Thời gian</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php

                                                // $result = mysqli_query($conn, "SELECT * FROM `resource` WHERE `status` LIKE 'Accept' ORDER BY `created_time` DESC");
                                                // echo var_dump($result);
                                                
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    ?>


                                                    <tr class="action" style="text-align: center;">
                                                        <td><input type="checkbox" name="<?php echo $row['resource_id'] ?>"
                                                                value="<?php echo $row['resource_id'] ?>">
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
                                                    </tr>
                                                <?php } ?>

                                            </tbody>
                                        </table>
                                        <div class="field">
                                            <select name="lvl1" id="lvl1" class="form-control">
                                                <option value="select" selected>Chọn Kệ</option>
                                                <?php
                                                $result2 = mysqli_query($conn, "SELECT `shelves`.`shelves_id`, `shelves`.`shelves_name`,`inventory_details`.`employee_id` FROM `shelves` 
                                                                                join `inventory` on `inventory`.`inventory_id` = `shelves`.`inventory_id`
                                                                                join `inventory_details` on `inventory_details`.`inventory_id` = `inventory`.`inventory_id`
                                                                                where `inventory_details`.`employee_id` = '$id'");
                                                while ($row_result2 = mysqli_fetch_assoc($result2)) {
                                                    ?>
                                                    <option value="<?php echo $row_result2['shelves_id']; ?>">
                                                        <?php echo $row_result2['shelves_name']; ?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>

                                            </select>
                                        </div>
                                        <!-- <div class="field">
                                            <select name="lvl2" id="lvl2" class="form-control">
                                                <option value="select">Chọn Kệ</option>
                                            </select>
                                        </div> -->
                                        <div class="button1">
                                            <input type="submit" id="submit" class="submit button1" name="submit"
                                                value="Chấp nhận">
                                        </div>
                                    </form>
                                </div>
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

    <!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        // In your Javascript (external .js resource or <script> tag)
        // $(document).ready(function () {

        // });

        // $(document).on("change", "#lvl1", function (e) {
        //     e.preventDefault();

        //     let lvl1_id = $(this).val();
        //     // console.log(lvl1_id)

        //     $.ajax({
        //         url: "select_shelves.php",
        //         method: "post",
        //         dataType: "json",
        //         data: {
        //             lvl1_id: lvl1_id
        //         },
        //         success: function (data) {
        //             lvl2_body = "";
        //             console.log(data)
        //             for (let i = 0; i < data.length; i++) {
        //                 lvl2_body += `<option value="${data[i].shelves_id}">${data[i].shelves_name}</option>`;
        //             }

        //             $("#lvl2").html(lvl2_body);
        //         }
        //     });
        // });
        $("#submit").on("click", function (e) {

            if (!($("input[type=checkbox]").is(":checked"))) {
                e.preventDefault();
                alert("Vui lòng chọn nguyên vật liệu!");
            }
        });
    </script>
</body>

</html>