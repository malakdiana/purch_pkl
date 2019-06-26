
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
                                                <th>MASTER DATA</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                        <tr align="center">
                                               
                                                <td><a class="btn btn-flat btn-primary mb-4" href="<?php echo site_url()?>/Purch_req/" role="button" style="width:200px">Data Purchase Request</a><br>
                                                <a class="btn btn-flat btn-secondary mb-4" href="<?php echo site_url()?>/Po/" role="button" style="width:200px">Data Purchase Order</a><br>
                                                <a class="btn btn-flat btn-primary mb-4" href="<?php echo site_url()?>/Qr/" role="button" style="width:200px">List All Quotation</a><br>
                                                <a class="btn btn-flat btn-secondary mb-4" href="<?php echo site_url()?>/belum/" role="button" style="width:200px">Tracking Order</a><br>
                                                <a class="btn btn-flat btn-secondary mb-4" href="<?php echo site_url()?>/belum/" role="button" style="width:200px">PO Record</a><br>
                                                <a class="btn btn-flat btn-secondary mb-4" href="<?php echo site_url()?>/belum/" role="button" style="width:200px">ETA</a><br>
                                                </td>


                                                <td> <a class="btn btn-flat btn-success mb-4" href="<?php echo site_url()?>/Purch_req/tambahPR" role="button" style="width:200px">Input Purchase Request </a><br>
                                                    <a class="btn btn-flat btn-secondary mb-4" href="<?php echo site_url()?>/Po/tambahPO" role="button" style="width:200px">Input Purchase Order </a>
                                                </td>

                                                 <td> <a class="btn btn-flat btn-info mb-4" href="<?php echo site_url()?>/Supplier" role="button" style="width:150px" >Supplier </a><br>
                                                    <a class="btn btn-flat btn-info mb-4" href="<?php echo site_url()?>/Pricelist/" role="button" style="width:150px">Price List</a><br>
                                                    <a class="btn btn-flat btn-info mb-4" href="<?php echo site_url()?>/Barang/" role="button" style="width:150px">Barang</a><br>
                                                    <a class="btn btn-flat btn-info mb-4" href="<?php echo site_url()?>/Unit_barang/" role="button" style="width:150px">Unit Barang</a><br>
                                                     <a class="btn btn-flat btn-info mb-4" href="<?php echo site_url()?>/Departemen/" role="button" style="width:150px">Departement</a><br>
                                                      <a class="btn btn-flat btn-info mb-4" href="<?php echo site_url()?>/Section/" role="button" style="width:150px">Section</a><br>
                                                       <a class="btn btn-flat btn-info mb-4" href="<?php echo site_url()?>/Approval/" role="button" style="width:150px">Approval</a><br>
                                                       <a class="btn btn-flat btn-warning mb-4" href="<?php echo site_url()?>/Login/ManajemenUser" role="button" style="width:150px">Manajemen User</a><br>
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
