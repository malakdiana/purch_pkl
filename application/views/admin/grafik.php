    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/grafik.css" />
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Data</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="#">Grafik</a></li>
                                <li><span>Grafik</span></li>
                            </ul>

                    </div>
                
                </div>
            </div>
        </div>

            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    <!-- data table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                          
                                
                            <div class="card-body">
                                 <div id="chartdiv"></div>
    <script src="<?php echo base_url()?>assets/js/core.js"></script>
    <script src="<?php echo base_url()?>assets/js/charts.js"></script>
    <script src="<?php echo base_url()?>assets/js/animated.js"></script>
    <script src="<?php echo base_url()?>assets/js/grafik.js"></script>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
           <?php $this->load->view('admin/footer'); ?>