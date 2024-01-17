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
<?php

if (isset($_POST['date'])) {
    $date = $_POST['date'];
}


if (isset($_POST['submit_detail'])) {
    // if (isset($_POST['date'])) {

    $select_check = mysqli_query($conn, "SELECT DISTINCT DATE_FORMAT(`resource`.`expiration_time`, '%Y-%c-%d') as expiration_time, 
                                                 `resource`.`resource_name`, `resource`.`quantity`, `inventory_check`.`actual_quantity`, `inventory_check`.`status`, `resource`.`resource_id`
                                                FROM `inventory_check`
                                                JOIN `resource` on `inventory_check`.`resource_id` = `resource`.`resource_id`
                                                -- join `inventory_details` on `inventory_details`.`inventory_id` = `inventory_check`.`inventory_id`
                                                where `inventory_check`.`check_date` = '$date' and `inventory_check`.`status` = 'Yêu cầu kiểm kê'");
    if (mysqli_num_rows($select_check) > 0) {
        while ($row_check = mysqli_fetch_assoc($select_check)) {
            $resource_id = $row_check['resource_id'];
            $actual_quantity = $row_check['actual_quantity'];

            $update_actual_quantity = mysqli_query($conn, "UPDATE `resource` set `quantity` = $actual_quantity where `resource_id` = $resource_id");
            $update_status_check = mysqli_query($conn, "UPDATE `inventory_check` set `status` = 'Đã được duyệt' where `resource_id` = $resource_id ");
            // header('Location: ./index.php');
        }
        echo "<script>alert('Cập nhật số lượng thành công')</script>";
    } else {
        echo "<script>alert('Thất bại!!!')</script>";
    }
} elseif (isset($_POST['reject_detail'])) {


    $select_check = mysqli_query($conn, "SELECT DISTINCT DATE_FORMAT(`resource`.`expiration_time`, '%Y-%c-%d') as expiration_time, 
                                         `resource`.`resource_name`, `resource`.`quantity`, `inventory_check`.`actual_quantity`, `inventory_check`.`status`, `resource`.`resource_id`
                                        FROM `inventory_check`
                                        JOIN `resource` on `inventory_check`.`resource_id` = `resource`.`resource_id`
                                        -- join `inventory_details` on `inventory_details`.`inventory_id` = `inventory_check`.`inventory_id`
                                        where `inventory_check`.`check_date` = '$date' and `inventory_check`.`status` = 'Yêu cầu kiểm kê'");
    if (mysqli_num_rows($select_check)) {
        while ($row_check = mysqli_fetch_assoc($select_check)) {
            $resource_id = $row_check['resource_id'];
            $actual_quantity = $row_check['actual_quantity'];
            $update_status_check = mysqli_query($conn, "UPDATE `inventory_check` set `status` = 'Đã từ chối' where `resource_id` = $resource_id ");



        }
        echo "<script>alert('Từ chối đơn kiểm kê')</script>";

    } else {
        echo "<script>alert('Thất bại!!!')</script>";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">

</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
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
                        <h3 class="page-title mb-0 p-0">Kiểm Kê</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">Phiếu</li> -->
                                    <li class="breadcrumb-item active" aria-current="page">Danh sách kiểm kê</li>
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

                                <form action="" method="POST">
                                    <?php
                                    if (isset($_REQUEST['remove_resource_id'])) {
                                        $remove = $_REQUEST['remove_resource_id'];
                                        mysqli_query($conn, "DELETE FROM `resource` WHERE `resource`.`resource_id` = '$remove'");
                                    }
                                    $result = mysqli_query($conn, "SELECT `inventory`.`inventory_name`, `inventory_check`.`check_date`, `inventory_check`.`status`, CONCAT(`employee`.`first_name`, ' ', `employee`.`last_name`) as full_name
                                                                        FROM `inventory_check`
                                                                        JOIN `inventory` on  `inventory_check`.`inventory_id` = `inventory`.`inventory_id`
                                                                        join `resource` on `resource`.`resource_id` = `inventory_check`.`resource_id`
                                                                        Join `employee` on `employee`.`employee_id` = `inventory_check`.`employee_id`
                                                                        where `inventory_check`.`status` = 'Yêu cầu kiểm kê'
                                                                        GROUP by `inventory_check`.`check_date` desc;");
                                    ?>

                                    <table class="table user-table">
                                        <thead style="text-align: center;">
                                            <tr>
                                                <th class="border-top-0">#</th>
                                                <th class="border-top-0">Tên kho</th>
                                                <th class="border-top-0">Trạng thái</th>
                                                <th class="border-top-0">Nhân viên kiểm kê</th>
                                                <th class="border-top-0">Thời gian</th>
                                                <th class="border-top-0"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $count = 1;
                                            while ($row = mysqli_fetch_array($result)) {
                                                ?>

                                                <tr class="action" style="text-align: center;">
                                                    <td>
                                                        <!-- // <th colspan='2'>Update</th> -->
                                                        <?php echo $count++; ?>
                                                    </td>
                                                    <td style="text-align: center;">
                                                        <?php echo $row['inventory_name']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['status']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['full_name']; ?>

                                                    </td>
                                                    <td>
                                                        <?php echo $row['check_date']; ?>

                                                    </td>


                                                    <td>

                                                        <input type="hidden" class="date"
                                                            value="<?php echo $row['check_date']; ?>">

                                                        <button type="button" class="btn btn-info text-white nut"
                                                            data-toggle="modal" data-target=".myModal">
                                                            Xem
                                                        </button>

                                                    </td>
                                                </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                    <div class="modal myModal fade" tabindex="-1" role="dialog"
                                        aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Chi Tiết Phiếu</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>

                                                </div>
                                                <div class="modal-body">
                                                    <div class="container-fluid">

                                                    </div>

                                                    <div class="modal-footer">



                                                        <?php
                                                        // $date = $_POST['date'];
                                                        $result1 = mysqli_query($conn, "SELECT `inventory`.`inventory_name`, `inventory_check`.`check_date`, `inventory_check`.`status`, CONCAT(`employee`.`first_name`, ' ', `employee`.`last_name`) as full_name
                                                                        FROM `inventory_check`
                                                                        JOIN `inventory` on  `inventory_check`.`inventory_id` = `inventory`.`inventory_id`
                                                                        join `resource` on `resource`.`resource_id` = `inventory_check`.`resource_id`
                                                                        Join `employee` on `employee`.`employee_id` = `inventory_check`.`employee_id`
                                                                        where `inventory_check`.`status` = 'Yêu cầu kiểm kê' 
                                                                        GROUP by `inventory_check`.`check_date` desc;");
                                                        $row1 = mysqli_fetch_array($result1)
                                                            ?>
                                                        <input type="hidden" name="date"
                                                            value="<?php echo $row1['check_date']; ?>">


                                                        <div class="d-flex justify-content-around ml-auto p-2">
                                                            <input class="btn btn-outline-success nutSubmit"
                                                                type="submit" name="submit_detail"
                                                                value="Chấp nhận sửa">
                                                            <input class="btn btn-outline-danger" type="submit"
                                                                name="reject_detail" value="Từ chối sửa">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

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

    <script>

        // $('#myModal').on('shown.bs.modal', function () {
        //   $('#myInput').trigger('focus')
        // })
        $(".nut").on("click", function (e) {
            let btnDate = $(this).siblings(".date").val()
            console.log(btnDate)

            $.ajax({
                method: "POST",
                url: "check_details.php",
                data: { data: btnDate },
                success: function (response) {
                    // console.log(response)
                    $(".modal-body .container-fluid").empty()
                    $(".modal-body .container-fluid").append(response);

                },
                error: function (error) {
                    console.error("Error:", error);
                }
            })
        })


    </script>

    <script>

        // $('#myModal').on('shown.bs.modal', function () {
        //   $('#myInput').trigger('focus')
        // })
        // $(".nutSubmit").on("click", function (e) {
        //     let btnDate = $(this).siblings(".date").val()
        //     // console.log(btnDate.val())

        //     $.ajax({
        //         method: "POST",
        //         url: window.location.href,
        //         data: { data: btnDate },
        //         success: function (response) {
        //             // console.log(response)
        //             $(".modal-body .container-fluid").empty()
        //             $(".modal-body .container-fluid").append(response);

        //         },
        //         error: function (error) {
        //             console.error("Error:", error);
        //         }
        //     })
        // })


    </script>
</body>

</html>