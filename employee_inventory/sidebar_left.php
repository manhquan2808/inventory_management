<style>
    .sidebar-item ul {
        display: none;
        padding-left: 20px;
    }

    .sidebar-item:hover ul {
        display: block;
    }


    .sidebar-link.waves-effect.waves-dark.sidebar-link {
        border-radius: 50px;
    }
</style>


<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="check_resource.php" aria-expanded="false"><i
                            class="mdi me-2 mdi-calendar-multiple-check"></i><span class="hide-menu">Kiểm tra hàng
                            nhập</span></a>
                </li>


                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="pages-profile.php" aria-expanded="false">
                        <i class="mdi me-2 mdi-account-check"></i><span class="hide-menu">Trang cá nhân</span></a>
                </li>


            </ul>

        </nav>
        <!-- End Sidebar navigation -->

    </div>
    <!-- End Sidebar scroll-->
    <div class="sidebar-footer">
        <div class="row">
            <div class="col-4 link-wrap">
                <!-- item-->
                <a href="" class="link" data-toggle="tooltip" title="" data-original-title="Settings"><i
                        class="ti-settings"></i></a>
            </div>
            <div class="col-4 link-wrap">
                <!-- item-->
                <a href="" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i
                        class="mdi mdi-gmail"></i></a>
            </div>
            <div class="col-4 link-wrap">
                <!-- item-->
                <a href="../logout.php?id=<?php echo $id; ?>" class="link" data-toggle="tooltip" title=""
                    data-original-title="Logout"><i class="mdi mdi-power"></i></a>

            </div>
        </div>
    </div>
</aside>