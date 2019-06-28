
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
                                                
                                                <th>DATA</th>
                                                <th>INPUT DATA</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <tr align="center">
                                               
                                                <td><a class="btn btn-flat btn-primary mb-4" href="<?php echo site_url()?>/Purch_req/" role="button" style="width:200px">Data Purchase Request</a><br>
                                                <a class="btn btn-flat btn-primary mb-4" href="<?php echo site_url()?>/Qr/" role="button" style="width:200px">List All Quotation</a><br>
                                                <a class="btn btn-flat btn-secondary mb-4" href="<?php echo site_url()?>/belum/" role="button" style="width:200px">Tracking Order</a><br>
                                                <a class="btn btn-flat btn-secondary mb-4" href="<?php echo site_url()?>/Qr/tracking" role="button" style="width:200px">Tracking Quotation</a><br>
                                                
                                                </td>


                                                <td> <a class="btn btn-flat btn-success mb-4" href="<?php echo site_url()?>/Purch_req/tambahPR" role="button" style="width:200px">Input Purchase Request </a><br>
                                                    <a class="btn btn-flat btn-success mb-4" href="<?php echo site_url()?>/Qr/tambahQR" role="button" style="width:200px">Input Quotation Request</a>
                                                </td>

                                                
                                            

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
