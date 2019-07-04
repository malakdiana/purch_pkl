
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Dashboard</h4>
                           

                    </div>
                
                </div>
            </div>
        </div>

            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row" align="center">
                    <!-- data table start -->
                    <div class="col-12 mt-5">
                        
                        <?=$this->session->flashdata('editDepartemen')?>
                         <?=$this->session->flashdata('deleteDepartemen')?>
                         <?=$this->session->flashdata('tambahDepartemen')?>
                                <div>

                                 <table cellpadding="0" cellspacing="0" border="0" class="table table-striped" id="dataTablesss">
                                        <thead class="bg-light text-capitalize" align="center">
                                            <tr>
                                                
                                                <th colspan="3"><h4>DATA</h4></th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <tr align="center">

                                                 <td>
                                                 <a href="<?php echo site_url()?>/Purch_req/"><button class="btn btn-flat btn-info mb-4" role="button" style="width:250px""><img style="width: 100px;height: 100px" src="<?php echo base_url()?>assets/images/icon/trackpo.png"><br>TRACKING MY ORDER</button>
                                                 </a><br></td>
                                           
                                                <td>
                                                 <a href="<?php echo site_url()?>/Qr/tracking"><button class="btn btn-flat btn-info mb-4" role="button" style="width:250px""><img style="width: 100px;height: 100px" src="<?php echo base_url()?>assets/images/icon/trackingQuo.png"><br>TRACKING MY QUOTATION</button>
                                                 </a><br></td>



                                                <td>
                                                 <a href="<?php echo site_url()?>/Qr/"><button class="btn btn-flat btn-info mb-4" role="button" style="width:250px""><img style="width: 100px;height: 100px" src="<?php echo base_url()?>assets/images/icon/listallquo.png"><br>LIST ALL QUOTATION</button>
                                                 </a><br></td>

                                                </td>
                                            

                                         </tr>
                                       </tbody>
                                    </table>


                                     <table cellpadding="0" cellspacing="0" border="0" class="table table-striped" id="dataTablesss">
                                        <thead class="bg-light text-capitalize" align="center">
                                            <tr>
                                               
                                                <th colspan="2"><h4>INPUT DATA</h4></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <tr align="center">
                                               

                                                 <td>
                                                 <a href="<?php echo site_url()?>/Purch_req/tambahPR"><button class="btn btn-flat btn-success mb-4" role="button" style="width:480px""><img style="width: 100px;height: 100px" src="<?php echo base_url()?>assets/images/icon/inputpr.png"><br>INPUT PR</button></a><br></td>

                                                  <td>
                                                 <a href="<?php echo site_url()?>/Qr/tambahQR"><button class="btn btn-flat btn-success mb-4" role="button" style="width:480px""><img style="width: 100px;height: 100px" src="<?php echo base_url()?>assets/images/icon/inputqr.png"><br>INPUT QR</button></a><br></td>


                                         </tr>
                                       </tbody>
                                    </table>
                               
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
          <!-- main content area end -->
        <!-- footer area start-->
 


    <!-- offset area end -->
    <!-- jquery latest version -->
    <?php $this->load->view('admin/footer'); ?>

    <!-- Start datatable js -->
     <script type="text/javascript" src="<?php echo base_url()?>assets/advanced-datatable/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTables/js/jquery.dataTables.js"></script>
 
    <!-- others plugins -->


</body>

</html>
