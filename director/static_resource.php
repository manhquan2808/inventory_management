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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">

</head>
<style>
    .parent {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        grid-template-rows: repeat(6, 1fr);
        grid-column-gap: 0px;
        grid-row-gap: 0px;
    }

    .div1 {
        grid-area: 1 / 1 / 4 / 4;
    }

    .div2 {
        grid-area: 1 / 4 / 4 / 7;
    }

    .div3 {
        grid-area: 4 / 4 / 7 / 7;
    }

    .div4 {
        grid-area: 4 / 1 / 7 / 4;
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
        <?php
        include './header.php';
        include './sidebar_left.php';
        ?>

        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0">Thống kê</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">Phiếu</li> -->
                                    <li class="breadcrumb-item active" aria-current="page">Thống kê</li>
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

                                <div class="parent">
                                    <div class="div3">
                                        <?php
                                        $pie_chart = mysqli_query($conn, "SELECT *,  SUM(quantity) as sum_of_quantity  
                                                                        FROM `resource` 
                                                                        WHERE `status` = 'Xuất NVL' 
                                                                        GROUP BY `resource_name`;");
                                        foreach ($pie_chart as $data) {
                                            $name[] = $data['resource_name'];
                                            $sum_of_quantity[] = $data['sum_of_quantity'];
                                        }
                                        ?>
                                        <div style="width: 300px; height: 300px; margin-left: 100px;">
                                            <canvas style="text-align: center; display: flex;" id="myChartPie"></canvas>
                                        </div>
                                    </div>
                                    <div class="div2">
                                        <?php
                                        $chart = mysqli_query($conn, "SELECT * FROM `resource` JOIN `resource_detail` on `resource_detail`.`resource_id` = `resource`.`resource_id` where `resource_detail`.`status` = 'Hàng lỗi, trả hàng' group by `resource`.`resource_name`;");


                                        foreach ($chart as $data) {
                                            $resource_name[] = $data['resource_name'];
                                            $quantity[] = $data['quantity'];
                                        }
                                        ?>
                                        <div style="width:500px; height: 300px;">
                                            <canvas id="myChart"></canvas>
                                        </div>
                                    </div>

                                    <div class="div1">
                                        <?php
                                        $bar_chart = mysqli_query($conn, "SELECT *, date_format(`update_time`, '%Y-%m-%d') as update_time_format, sum(quantity) as quantity_sum,
                                                                        FROM_DAYS(TO_DAYS(update_time) -MOD(TO_DAYS(update_time) -1, 7)) as week_of_year 
                                                                        FROM `resource` 
                                                                        WHERE `status` = 'Xuất NVL'
                                                                        -- and `update_time` BETWEEN DATE_SUB(NOW(), INTERVAL 1 WEEK) AND NOW() 
                                                                        group by `status`, week_of_year;");
                                        foreach ($bar_chart as $data) {
                                            $name_of_time[] = $data['resource_name'];
                                            $time[] = $data['week_of_year'];
                                            $quantity_sum[] = $data['quantity_sum'];
                                        }
                                        $bar_chart2 = mysqli_query($conn, "SELECT *, date_format(`update_time`, '%Y-%m-%d') as update_time_format, sum(quantity) as quantity_sum,
                                                                            FROM_DAYS(TO_DAYS(update_time) -MOD(TO_DAYS(update_time) -1, 7)) as week_of_year
                                                                            FROM `resource` 
                                                                            JOIN `resource_detail` on `resource`.`resource_id` = `resource_detail`.`resource_id`
                                                                            WHERE `resource_detail`.`status` = 'Nhập kho'
                                                                            -- and `update_time` BETWEEN DATE_SUB(NOW(), INTERVAL 1 WEEK) AND NOW()
                                                                            group by `resource_detail`.`status`, week_of_year");
                                        foreach ($bar_chart2 as $data) {
                                            $name_of_time[] = $data['resource_name'];
                                            $time2[] = $data['week_of_year'];
                                            $quantity_sum2[] = $data['quantity_sum'];
                                        }
                                        ?>
                                        <div style="width: 500px; height: 300px; margin-left: 0;">
                                            <canvas style="text-align: center; display: flex;" id="myBarChart"></canvas>
                                        </div>
                                    </div>

                                    <div class="div4">
                                        <?php
                                        $line_chart = mysqli_query($conn, "SELECT TIME(`time`) as `time`, `resource`.`quantity`
                                                                           FROM `resource_detail` 
                                                                           join `resource` on `resource`.`resource_id` = `resource_detail`.`resource_id`
                                                                           where `resource`.`status` = 'Xuất NVL'
                                                                           order by `time`
                                                                           ");
                                        foreach ($line_chart as $data) {
                                            $time_of_line[] = $data['time'];
                                            $quantity_line[] = $data['quantity'];
                                        }
                                        ?>
                                        <div style="width: 500px;">
                                            <canvas id="myLineChart"></canvas>
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


</body>
<script>

    const ctx = document.getElementById('myChart').getContext("2d");

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($name) ?>,
            datasets: [{
                label: "mat",
                data: <?php echo json_encode($sum_of_quantity, JSON_UNESCAPED_UNICODE) ?>,
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(255, 159, 64)',
                    'rgb(153, 102, 255)',
                    'rgb(255, 99, 132)',
                    'rgb(255, 69, 0)',
                    'rgb(0, 128, 0)',
                    'rgb(128, 0, 128)',
                    'rgb(0, 128, 128)',
                    // Add more colors as needed
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(255, 159, 64)',
                    'rgb(153, 102, 255)',
                    'rgb(255, 99, 132)',
                    'rgb(255, 69, 0)',
                    'rgb(0, 128, 0)',
                    'rgb(128, 0, 128)',
                    'rgb(0, 128, 128)',
                    // Add more colors as needed
                ],

                borderWidth: 1
            }
            ],

        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            title: {
                display: false,
            },
            plugins: {
                title: {
                    display: true,
                    text: 'Nguyên Vật Liệu Xuất'
                },
                xlabel: {
                    display: true,
                    text: 'Tên nguyên vật liệu'
                },
                ylabel: {
                    display: true,
                    text: 'Số lượng'
                },
                legend: {
                    display: false,
                }

            }

        }
    });


</script>

<script>
    const data = {
        labels: <?php echo json_encode($resource_name) ?>,
        datasets: [{
            data: <?php echo json_encode($quantity) ?>,

            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(255, 159, 64)',
                'rgb(153, 102, 255)',
                'rgb(255, 99, 132)',
                'rgb(255, 69, 0)',
                'rgb(0, 128, 0)',
                'rgb(128, 0, 128)',
                'rgb(0, 128, 128)',
            ],


            hoverOffset: 4
        }],

    };
    const piers = document.getElementById('myChartPie').getContext("2d");

    const config = new Chart(piers, {
        type: 'pie',
        data: data,
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Nguyên Vật Liệu Lỗi'
                }
            },

        }
    });
</script>


<script>
    const bar = document.getElementById('myBarChart').getContext("2d");
    const dataBar = {
        labels: <?php echo json_encode($time); ?>,
        datasets: [{
            axis: 'y',
            label: 'Xuất',
            data: <?php echo json_encode($quantity_sum); ?>,
            fill: false,
            backgroundColor: [
                'rgb(255, 99, 132)'
            ],
            borderWidth: 1
        },
        {
            axis: 'y',
            label: 'Nhập ',
            backgroundColor: [
                'rgb(54, 162, 235)'
            ],
            data: <?php echo json_encode($quantity_sum2); ?>,
            fill: false,

        }],

    };

    const configBar = new Chart(bar, {
        type: 'bar',
        data: dataBar,
        options: {
            indexAxis: 'y',
            hover: {
                mode: <?php echo json_encode($name_of_time) ?>, // 'single', 'label', 'dataset' are also available
            },
            plugins: {
                title: {
                    display: true,
                    text: 'Tỷ Lệ Nhập Xuất NVL'
                },
                xlabel: {
                    display: true,
                    text: 'Tên nguyên vật liệu'
                },
                ylabel: {
                    display: true,
                    text: 'Số lượng'
                },
                legend: {
                    display: true,
                }

            }
        }
    });
</script>

<script>
    const line = document.getElementById('myLineChart').getContext("2d");

    const labels = <?php echo json_encode($time_of_line) ?>;
    const dataLine = {
        labels: labels,
        datasets: [{
            label: 'Số lượng nhập',
            data: <?php echo json_encode($quantity_line) ?>,
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }]
    };

    const configLine = new Chart(line, {
        type: 'line',
        data: dataLine,
        options:{
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Tổng Số Lượng Nhập Trong Ngày Theo Giờ'
                }
            }, 
        }
        });

    // const line = document.getElementById('myLineChart').getContext("2d");
    // const DATA_COUNT = count(<?php //echo json_encode($quantity_line) ?>);
    // const NUMBER_CFG = { count: DATA_COUNT, min: -100, max: 100 };

    // const labels = <?php //echo json_encode($time_of_line) ?>;
    // const dataLine = {
    //     labels: labels,
    //     datasets: [
    //         {
    //             label: 'Dataset 1',
    //             data: <?php //echo json_encode($quantity_line) ?>,
    //             borderColor: 'red',
    //             backgroundColor: 'red',
    //             yAxisID: 'y',
    //         },
    //         {
    //             label: 'Dataset 2',
    //             data: <?php //echo json_encode($quantity_line) ?>,
    //             borderColor: 'blue',
    //             backgroundColor: 'blue',
    //             yAxisID: 'y1',
    //         }
    //     ]
    // };


    // const configLine = new Chart(line, {
    //     type: 'line',
    //     data: dataLine,
    //     options: {
    //         responsive: true,
    //         interaction: {
    //             mode: 'index',
    //             intersect: false,
    //         },
    //         stacked: false,
    //         plugins: {
    //             title: {
    //                 display: true,
    //                 text: 'Chart.js Line Chart - Multi Axis'
    //             }
    //         },
    //         scales: {
    //             y: {
    //                 type: 'linear',
    //                 display: true,
    //                 position: 'left',
    //             },
    //             y1: {
    //                 type: 'linear',
    //                 display: true,
    //                 position: 'right',
    //                 grid: {
    //                     drawOnChartArea: false,
    //                 },
    //             },
    //         }
    //     },
    // });
</script>

</html>