<style>
    .sidebar-link.waves-effect.waves-dark.sidebar-link {
        border-radius: 50px;
    }

    .sidebar-item ul {
        display: none;
        padding-left: 20px;
    }

    .sidebar-item:hover ul {
        display: block;
    }
</style>

<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->


                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#"
                        aria-expanded="false"><i class="mdi me-2 mdi-material-ui"></i><span class="hide-menu">Nguyên Vật
                            Liệu</span></a>
                    <ul>
                        <li class="sidebar-item">
                            <a href="arrange_resource.php" class="sidebar-link waves-effect waves-dark sidebar-link"><i
                                    class="mdi me-2 mdi-rotate-3d"></i><span class="hide-menu">Điều phối</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a href="inventory_list.php" class="sidebar-link waves-effect waves-dark sidebar-link"><i
                                    class="mdi me-2 mdi-format-list-bulleted"></i><span class="hide-menu">Danh sách
                                    kho</span></a>
                        </li>

                    </ul>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="add_resource.php" aria-expanded="false"><i class="mdi me-2 mdi-check-circle"></i><span
                            class="hide-menu">Duyệt Xuất
                            NVL</span></a>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="inventory_check.php" aria-expanded="false"><i class="mdi me-2 mdi-table-edit"></i><span
                            class="hide-menu">Kiểm Kê</span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="static_resource.php" aria-expanded="false"><i class="mdi me-2 mdi-chart-bar"></i><span
                            class="hide-menu">Thống Kê</span></a>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#"
                        aria-expanded="false"><i class="mdi me-2 mdi-file-document-box"></i><span class="hide-menu">Quản
                            Lý Phiếu NVL</span></a>
                    <ul>
                        <li class="sidebar-item">
                            <a href="issue_resource.php" class="sidebar-link waves-effect waves-dark sidebar-link"><i
                                    class="mdi me-2 mdi-album"></i><span class="hide-menu">Nhập</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a href="issue_resource_ex.php" class="sidebar-link waves-effect waves-dark sidebar-link"><i
                                    class="mdi me-2 mdi-album"></i> <span class="hide-menu">Xuất</span></a>
                        </li>
                    </ul>
                </li>
                <!-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#"
                        aria-expanded="false">
                        <i class="mdi me-2 mdi-cookie"></i><span class="hide-menu">Thành Phẩm</span></a>
                    <ul>
                        <li class="sidebar-item">
                            <a href="arrange_product.php" class="sidebar-link waves-effect waves-dark sidebar-link"><i
                                    class="mdi me-2 mdi-rotate-3d"></i><span class="hide-menu">Điều phối</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a href="inventory_list.php" class="sidebar-link waves-effect waves-dark sidebar-link"><i
                                    class="mdi me-2 mdi-format-list-bulleted"></i><span class="hide-menu">Danh sách
                                    kho</span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="add_product.php" aria-expanded="false"><i
                                    class="mdi me-2 mdi-check-circle"></i><span class="hide-menu">Duyệt Xuất
                                    TP</span></a>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="inventory_check.php" aria-expanded="false"><i
                                    class="mdi me-2 mdi-table-edit"></i><span class="hide-menu">Kiểm Kê</span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="static_product.php" aria-expanded="false"><i
                                    class="mdi me-2 mdi-chart-bar"></i><span class="hide-menu">Thống Kê</span></a>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#"
                                aria-expanded="false"><i class="mdi me-2 mdi-file-document-box"></i><span
                                    class="hide-menu">Quản
                                    Lý Phiếu TP</span></a>
                            <ul>
                                <li class="sidebar-item">
                                    <a href="issue_product.php"
                                        class="sidebar-link waves-effect waves-dark sidebar-link"><i
                                            class="mdi me-2 mdi-album"></i><span class="hide-menu">Nhập</span></a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="issue_product_ex.php"
                                        class="sidebar-link waves-effect waves-dark sidebar-link"><i
                                            class="mdi me-2 mdi-album"></i> <span class="hide-menu">Xuất</span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li> -->
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#"
                        aria-expanded="false"><i class="mdi me-2 mdi-clipboard-account"></i><span class="hide-menu">Tài
                            Khoản</span></a>
                    <ul>
                        <li class="sidebar-item">
                            <a href="add_acc.php" class="sidebar-link waves-effect waves-dark sidebar-link"><i
                                    class="mdi me-2 mdi-album"></i><span class="hide-menu">Thêm Tài Khoản</span></a>
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
                        <i class="mdi me-2 mdi-account-check"></i><span class="hide-menu">Trang Cá Nhân</span></a>
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