<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Purch section</title>
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
    <style>
      /* script menghilangkan Horizontal Scroll */
      html, body {
      max-width: 100%;
      overflow-x: hidden;
      }
      </style>

<body class="body-bg">
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
                        <div class="horizontal-menu">
                            <nav>
                                <ul id="nav_menu">
                                    <li>
                                       <a href="<?php echo site_url()?>/Dashboard"><h6><i class="ti-home"></i><span>Home</h6></span></a>
                                        
                                    </li>
                                    <li>
                                         <a href="javascript:void(0)" aria-expanded="true"><h6><i class="ti-book"></i><span>Data</h6>
                                    </span></a>
                                <ul class="submenu">
                                      <li><a href="<?php echo site_url()?>/Purch_req/">Tracking My Order</a></li>
                                    <li><a href="<?php echo site_url()?>/Qr/tracking">Tracking My Quotation</a></li>
                                    <li><a href="<?php echo site_url()?>/Qr/">List All Quotation</a></li>
                                    <li><a href="<?php echo site_url()?>/Barang/">Master Barang</a></li>
                                      <li><a href="<?php echo site_url()?>/Eta/getUser/<?php echo $this->session->userdata('logged_in')['username'] ?>" >Cek ETA</a></li>
                                   
                                  
                                </ul>
                                    </li>
                                   
                                    <li >
                                       <a href="javascript:void(0)" aria-expanded="true"><h6><i class="ti-pencil"></i><span>Input Data</h6></span></a>
                                <ul class="submenu">
                                     <li><a href="<?php echo site_url()?>/Purch_req/tambahPR">Purchase Request</a></li>
                                    <li><a href="<?php echo site_url()?>/Qr/tambahQR">Quotation Request</a></li>
                                 
                                </ul>
                                    </li>
                                   
                            </nav>
                        </div>
                        </div>
                        </div>
                        
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-3 clearfix text-right">
                            <div class="d-md-inline-block d-block mr-md-4">
                            <ul class="notification-area">
                              
                                <li class="dropdown">
                                    <i style="color: blue" class="ti-comment dropdown-toggle" data-toggle="dropdown">
                                        <span> <?php  $ttl=0;
                                            foreach ($notif as $key ){$ttl++;}
                                         echo $ttl?> </span>
                                    </i>
                                    <div class="dropdown-menu bell-notify-box notify-box">
                                        <span class="notify-title">You have <?php   echo $ttl; ?> new notifications </span>
                                        <div class="nofity-list">

                                            <?php
                                                if($ttl == 0){

                                                }else{
                                               $no=1; 
                                               foreach ($notif as $key ) {
                                            
                                             if($no % 2 == 0){ ?>
                                            <a href="<?php echo site_url()?>/Qr/baca/<?php echo $key->id_penawaran?>" class="notify-item">
                                                <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                                <div class="notify-text">
                                                    <p>You have New Massage</p>
                                                    <span><?php echo $key->kode_qr ?></span>
                                                </div>
                                            </a>
                                        <?php   }else{ ?>
                                            <a href="<?php echo site_url()?>/Qr/baca/<?php echo $key->id_penawaran?>" class="notify-item">
                                                <div class="notify-thumb"><i class="ti-comments-smiley btn-info"></i></div>
                                                <div class="notify-text">
                                                      <p>You have New Massage</p>
                                                    <span><?php echo $key->kode_qr ?></span>
                                                </div>
                                            </a>   
                                        <?php   }
                                     $no++;}
                                       }?>
                                         </div>
                                     
                                    </div>
                                </li>
                               
                       </ul>
                   </div>
                        <div class="clearfix d-md-inline-block d-block" style="margin-right: -14px">
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
       