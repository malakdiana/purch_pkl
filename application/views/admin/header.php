<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PT SAI - Local Purchase</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url()?>assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/metisMenu.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/slicknav.min.css">
    <!-- amchart css -->
    
    <!-- others css -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/typography.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/default-css.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/styles.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="<?php echo base_url()?>assets/js/vendor/modernizr-2.8.3.min.js"></script>
    
  
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/dataTables/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/dataTables/css/dataTables.bootstrap.css">

</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                   <h3><font color="white">Local Purchase</font></h3>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                                <ul class="collapse">
                                    <li><a href="index.html">dashboard</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Data
                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="index.html">Data PR SAI</a></li>
                                    <li><a href="index3-horizontalmenu.html">Data PO SAI</a></li>
                                    <li><a href="index3-horizontalmenu.html">Tracking Quotation</a></li>
                                    <li><a href="index3-horizontalmenu.html">PO Record</a></li>
                                    <li><a href="index3-horizontalmenu.html">ETA</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-pie-chart"></i><span>Master Data</span></a>
                                <ul class="collapse">
                                    <li><a href="barchart.html">Supplier</a></li>
                                    <li><a href="linechart.html">Price List</a></li>
                                    <li><a href="piechart.html">Barang</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-palette"></i><span>Input Data</span></a>
                                <ul class="collapse">
                                    <li><a href="accordion.html">Purchase Request</a></li>
                                    <li><a href="alert.html">Purchase Order</a></li>
                                    <li><a href="badge.html">Quotation Request</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-slice"></i><span>Other</span></a>
                                <ul class="collapse">
                                    <li><a href="fontawesome.html">Management User</a></li>
                                </ul>
                            </li>
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
          <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-right">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix" >
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                               <div class="col-md-6 col-sm-4 clearfix" > 
                       <div class="user-profile pull-right" align="rights" style="margin-top: -10px;margin-bottom: -10px">

                            <img class="avatar user-thumb" src="<?php echo base_url()?>assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $this->session->userdata('logged_in')['username'] ?> <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Message</a>
                                <a class="dropdown-item" href="#">Settings</a>
                                <a class="dropdown-item" href="#">Log Out</a>
                            </div>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                   
                </div>
            </div>

            <!-- header area end -->
            <!-- page title area start -->
           