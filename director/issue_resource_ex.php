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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

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
                        <h3 class="page-title mb-0 p-0">Phiếu</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">Phiếu</li> -->
                                    <li class="breadcrumb-item active" aria-current="page">Danh sách phiếu xuất</li>
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

                                <form method="POST">


                                    <?php
                                    // if (isset($_REQUEST['remove_resource_id'])) {
                                    //     $remove = $_REQUEST['remove_resource_id'];
                                    //     mysqli_query($conn, "DELETE FROM `resource` WHERE `resource`.`resource_id` = '$remove'");
                                    // }
                                    // $result = mysqli_query($conn, "SELECT *,`resource`.`resource_id` , `resource`.`status`, `resource`.`update_time` 
                                    //                                     FROM `resource`
                                    //                                     JOIN `resource_detail` on `resource_detail`.`resource_id` = `resource`.`resource_id`
                                    //                                     JOIN `inventory` on  `resource_detail`.`inventory_id` = `inventory`.`inventory_id`
                                    //                                     where `resource`.`status` like 'Xuất%'
                                    //                                     GROUP by `resource`.`update_time` desc;");
                                    ?>
                                    <table class="table user-table" id="export" style="width: 100%;">
                                        <thead style="text-align: center;">
                                            <tr>
                                                <th class="border-top-0">#</th>
                                                <th class="border-top-0">Tên kho</th>
                                                <th class="border-top-0">Loại phiếu</th>
                                                <th class="border-top-0">Thời gian</th>
                                                <th class="border-top-0"></th>
                                            </tr>
                                        </thead>
                                    </table>
                                </form>


                                <div class="modal myModal fade" id="myModal" tabindex="-1" role="dialog"
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
                                            </div>
                                            <div class="modal-footer">

                                            </div>
                                        </div>
                                    </div>
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
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    <script>
        const table = $('#export').DataTable({
            dom: 'T<"clear">frtip',
            buttons: [
                'copy', 'print',
                {
                    extend: 'collection',
                    text: 'Save',
                    buttons: ['csv', 'xls', 'pdf']
                },
                {
                    text: 'Custom Button',
                    action: function (e, dt, node, config) {
                        alert('Custom button clicked!');
                    }
                }
            ],
            ajax: '../api/fetch_issue_ex.php',
            columns: [
                { data: '#' },
                { data: 'resource_name' },
                { data: 'status' },
                { data: 'time' },
                {
                    data: null, // Placeholder for the buttons
                    render: function (data, type, row) {

                        if (type === 'display') {
                            // Create a button with a data attribute for the time value
                            return '<button type="button" class="btn btn-info text-white view-button nut" data-target="#myModal" data-toggle="modal" data-time="' + row.time + '">Xem</button>';
                        }

                        // For other types (sorting, filtering, etc.), return the original data
                        return data;
                    }
                }

            ],
           
            language: {
                // Customize text strings as needed
                "sEmptyTable": "Không có phiếu nhập",
                "sInfo": "Hiển thị từ _START_ đến _END_ của _TOTAL_ dòng",
                "sInfoEmpty": "Hiển thị từ 0 đến 0 của 0 dòng",
                "sInfoFiltered": "(Tìm kiếm từ _MAX_ dòng)",
                "sInfoPostFix": "",
                "sInfoThousands": ",",
                "sLengthMenu": "Hiển thị _MENU_ dòng",
                "sLoadingRecords": "Đang tải...",
                // "sProcessing": "Đang thực hiện...",
                "sSearch": "Tìm kiếm:",
                "sZeroRecords": "Không có kết quả phù hợp",
                "oPaginate": {
                    "sFirst": "Đầu",
                    "sLast": "Cuối",
                    "sNext": "Tiếp",
                    "sPrevious": "Trước"
                },
                "oAria": {
                    "sSortAscending": ": activate to sort column ascending",
                    "sSortDescending": ": activate to sort column descending"
                }
            }
            // columnDefs: [
            //     { targets: [0,1,3],searchable: false  },
            // ]
        });
    </script>

    <script>

        $("#export").on("click", ".nut", function (e) {
            let btnDate = $(this).data("time")
            console.log(btnDate)

            $.ajax({
                method: "POST",
                url: "issue_details_ex.php",
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
</body>

</html>