<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin Local Purch</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url()?>assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/metisMenu.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/typography.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/default-css.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/styles.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="<?php echo base_url()?>assets/js/vendor/modernizr-2.8.3.min.js"></script>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/dataTables/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/dataTables/css/dataTables.bootstrap.css">
    <style>
      /* script menghilangkan Horizontal Scroll */
      html, body {
      max-width: 100%;
      overflow-x: hidden;
      }

    
</style>
</head>

<body class="body-bg">
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- main wrapper start -->
    <div class="horizontal-main-wrapper">
        <!-- main header area start -->
        <div class="mainheader-area" style="background:#B0E0E6">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-2">
                        <div class="logo">
                            <a href="#"><img src="<?php echo base_url()?>assets/images/icon/yazaki.png" style="width:200px; height:40px;"></a>
                        </div>
                    </div>
                    <div class="col-md-7">
                    <div class="row align-items-left">
                    <div class="col-lg-12  d-none d-lg-block">
                        <div class="horizontal-menu" >
                            <nav>
                                <ul id="nav_menu">
                                    <li>
                                        <a href="<?php echo site_url()?>/Dashboard"><h6><i class="ti-dashboard"></i><span>Dashboard</h6></span></a>
                                        
                                    </li>
                                    <li>
                                         <a href="javascript:void(0)" aria-expanded="true"><h6><i class="ti-layout-sidebar-left"></i><span>Data</h6>
                                    </span></a>
                                <ul class="submenu">
                                    <li><a href="<?php echo site_url()?>/Po">Data Purchase Order</a></li>
                                    <li><a href="<?php echo site_url()?>/Purch_req">Data Purchase Request</a></li>
                                    <li><a href="<?php echo site_url()?>/Qr/">List All Quotation</a></li>
                                   
                                    <li><a href="index3-horizontalmenu.html">ETA</a></li>
                                    <li><a href="<?php echo site_url()?>/Riwayatdatang">Riwayat Kedatangan</a></li>
                                </ul>
                                    </li>
                                    <li>
                                       <a href="javascript:void(0)" aria-expanded="true"><h6><i class="ti-pie-chart"></i><span>Master Data</h6></span></a>
                                <ul class="submenu">
                                    <li><a href="<?php echo site_url()?>/Supplier">Supplier</a></li>
                                   
                                    <li><a href="<?php echo site_url()?>/Barang">Barang</a></li>
                                    <li><a href="<?php echo site_url()?>/Unit_barang">Unit Barang</a></li>
                                    <li><a href="<?php echo site_url()?>/Departemen">Departement</a></li>
                                    <li><a href="<?php echo site_url()?>/Section">Section</a></li>
                                    <li><a href="<?php echo site_url()?>/Approval">Approval</a></li>

                                </ul>
                                    </li>
                                    <li >
                                       <a href="javascript:void(0)" aria-expanded="true"><h6><i class="ti-slice"></i><span>Input Data</h6></span></a>
                                <ul class="submenu">
                                     <li><a href="<?php echo site_url()?>/Po/tambahPO">Purchase Order</a></li>
                                    <li><a href="<?php echo site_url()?>/Purch_req/tambahPR">Purchase Request</a></li>
                                   
                                 
                                </ul>
                                    </li>
                                    <li >
                                        <a href="javascript:void(0)" aria-expanded="true"><h6><i class="ti-folder"></i><span>Other</span></h6></span></a>
                                <ul class="submenu">
                                    <li><a href="<?php echo site_url()?>/Login/ManajemenUser">Management User</a></li>
                                </ul>
                                    </li>
                                    
                                </ul>
                            </nav>
                        </div>
                        </div>
                        </div>
                        
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-3 clearfix text-right" >
                        <div class="clearfix d-md-inline-block d-block" style="margin-right: -14px" >
                            <div class="user-profile m-0" style="background:#17a2b8">
                                 <img class="avatar user-thumb" src="<?php echo base_url()?>assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $this->session->userdata('logged_in')['username'] ?> <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                               
                                <a class="dropdown-item" href="<?php echo site_url()?>/Dashboard/Myprofil"><i class="fa fa-user"></i> My Profile</a>
                                <a href="<?php echo site_url()?>/Login/Logout"><i class="fa fa-sign-out"></i>Log Out</a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main header area end -->
        <!-- header area start -->
       
        <!-- header area end -->
       