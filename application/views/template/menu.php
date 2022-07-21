        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="<?=base_url('')?>"
                                aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                                    class="hide-menu">Dashboard</span></a></li>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Data Master</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="<?=base_url('Pegawai')?>" aria-expanded="false"><i class="fas fa-user-circle"></i><span class="hide-menu">Pegawai</span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="<?=base_url('Kepegawaian')?>" aria-expanded="false"><i class="fas fa-users"></i><span class="hide-menu">Kepegawaian</span></a>
                        </li>
                       <!--  <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="<?=base_url('Penggajian')?>" aria-expanded="false"><i class="far fa-money-bill-alt"></i><span class="hide-menu">Penggajian</span></a>
                        </li> -->
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i class="far fa-money-bill-alt"></i><span
                                    class="hide-menu">Penggajian </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="<?=base_url('Penggajian')?>" class="sidebar-link">
                                    <span class="hide-menu"> Penggajian</span></a>
                                </li>
                                <li class="sidebar-item"><a href="<?=base_url('Penggajian/cetak')?>" class="sidebar-link"><span class="hide-menu"> Cetak</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                                    class="hide-menu">Presensi </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="<?=base_url('Presensi')?>" class="sidebar-link">
                                    <span class="hide-menu"> Presensi</span></a>
                                </li>
                                <li class="sidebar-item"><a href="<?=base_url('Presensi/cetak')?>" class="sidebar-link"><span class="hide-menu"> Cetak</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="<?=base_url('Admin')?>" aria-expanded="false"><i class="fas fa-user"></i><span class="hide-menu">Administrator</span></a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1"><?php if ($pusat=='Dashboard') {echo 'Good Morning';}else{echo $pusat;}?></h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <?php if ($pusat=='Dashboard') {}else{?><li class="breadcrumb-item"><a href="index.html"><?=$pusat?></a></li><?php ;}?>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">