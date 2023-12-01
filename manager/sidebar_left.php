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


                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#"
                        aria-expanded="false"><i class="mdi me-2 mdi-store"></i><span class="hide-menu">Kho nguyên vật
                            liệu</span></a>
                    <ul>
                        <li class="sidebar-item">
                            <a href="arrange_shelves.php" class="sidebar-link waves-effect waves-dark sidebar-link"><i
                                    class="mdi me-2 mdi-album"></i><span class="hide-menu">Sắp xếp kho</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a href="inventory_list.php" class="sidebar-link waves-effect waves-dark sidebar-link"><i
                                    class="mdi me-2 mdi-album"></i> <span class="hide-menu">Danh sách kho</span></a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="up_load_file.php" aria-expanded="false"><i class="mdi me-2 mdi-import"></i><span
                            class="hide-menu">Nhập nguyên vật liệu</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="export_resource.php" aria-expanded="false"><i class="mdi me-2 mdi-export"></i><span
                            class="hide-menu">Xuất nguyên vật liệu</span></a></li>


                <!-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#.php"
                        aria-expanded="false"><i class="mdi me-2 mdi-chart-areaspline"></i><span class="hide-menu">Thống
                            Kê</span></a>
                </li> -->
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#"
                        aria-expanded="false"><i class="mdi me-2 mdi-clipboard-account"></i><span class="hide-menu">Tài
                            Khoản</span></a>
                    <ul>
                        <li class="sidebar-item">
                            <a href="add_acc.php" class="sidebar-link waves-effect waves-dark sidebar-link"><i
                                    class="mdi me-2 mdi-album"></i><span class="hide-menu">Tạo Tài Khoản</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a href="list_acc.php" class="sidebar-link waves-effect waves-dark sidebar-link"><i
                                    class="mdi me-2 mdi-album"></i> <span class="hide-menu">Danh Sách Tài
                                    Khoản</span></a>
                        </li>
                    </ul>
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