<header class="topbar" data-navbarbg="skin6">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin6">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand ms-4" href="../director">
                <!-- Logo icon -->
                <b class="logo-icon">
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <img width="100%" src="../assets/images/logo/logo.png" alt="homepage" class="dark-logo" />

                </b>
                <!--End Logo icon -->
                <!-- Logo text -->
                <span class="logo-text">
                    <!-- dark Logo text -->
                    <img width="100%" src="../assets/images/logo/logo2.1.png" alt="homepage" class="dark-logo" />

                </span>
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <a class="nav-toggler waves-effect waves-light text-white d-block d-md-none" href="javascript:void(0)"><i
                    class="ti-menu ti-close"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <ul class="navbar-nav d-lg-none d-md-block ">
                <li class="nav-item">
                    <a class="nav-toggler nav-link waves-effect waves-light text-white " href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                </li>
            </ul>
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav me-auto mt-md-0 ">
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->

                
            </ul>


            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav">
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown"  style="display: flex; height: 30%;"> 
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" id="navbarDropdown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <!-- <img src="../assets/images/users/avtthinh.png" alt=""> -->
                        <!-- <i class="mdi me-2 mdi-account-circle" style="font-size: xx-large;"></i> -->
                        <img class="rounded-circle" style="width: 40px; background: white;" src="../assets/images/users/avtthinh.png" alt="">

                        <?php
                        $sqlll = mysqli_query($conn, "SELECT `employee_id`, CONCAT(`first_name`, ' ', `last_name`) as `full_name` FROM `employee` Where `employee_id` = '$id'");
                        if (mysqli_num_rows($sqlll) > 0) {
                            $row = mysqli_fetch_assoc($sqlll);
                            echo  $row['full_name'];
                            echo " ";
                            echo $row['employee_id'];
                        }
                        ?>

                    </a>


                </li>
            </ul>
        </div>
    </nav>
</header>