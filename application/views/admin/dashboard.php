
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

                                 <table cellpadding="0" cellspacing="0" border="0" class="table table-striped">
                                        <thead class="bg-light text-capitalize" align="center" >

                                         <tr>
                                       
                                                <th colspan="5"><h4>DATA</h4></th>
                                        </tr>
                                           
                                        </thead>
                                        <tbody>

                                        <tr align="center">
                                               
                                                <td>
                                                <a href="<?php echo site_url()?>/Po/"><button class="btn btn-flat btn-info mb-4" role="button" style="width:160px""><img style="width: 100px;height: 100px" src="<?php echo base_url()?>assets/images/icon/datapo.png"><br>DATA PO</button></a><br></td>

                                                <td>
                                                 <a href="<?php echo site_url()?>/Purch_req/"><button class="btn btn-flat btn-info mb-4" role="button" style="width:160px""><img style="width: 100px;height: 100px" src="<?php echo base_url()?>assets/images/icon/datapr.png"><br>DATA PR</button></a><br></td>

                                                <td>
                                                 <a href="<?php echo site_url()?>/Qr/"><button class="btn btn-flat btn-info mb-4" role="button" style="width:160px""><img style="width: 100px;height: 100px" src="<?php echo base_url()?>assets/images/icon/listallquo.png"><br>LIST ALL QUOTATION</button>
                                                 </a><br></td>

                                                <td>
                                                 <a href="<?php echo site_url()?>/belum/"><button class="btn btn-flat btn-secondary mb-4" role="button" style="width:160px""><img style="width: 100px;height: 100px" src="<?php echo base_url()?>assets/images/icon/eta.png"><br>ETA BESOK</button></a><br>
                                                 </td>

                                                 <td>
                                                 <a href="<?php echo site_url()?>/belum/"><button class="btn btn-flat btn-secondary mb-4" role="button" style="width:175px""><img style="width: 100px;height: 100px" src="<?php echo base_url()?>assets/images/icon/histori.png"><br>RIWAYAT KEDATANGAN</button></a><br>
                                                 </td>

                                               

                                                
                                            

                                         </tr>
                                       </tbody>
                                    </table>



                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped">
                                        <thead class="bg-light text-capitalize" align="center">

                                         <tr>
                                       
                                                <th colspan="5"><h4>INPUT DATA</h4></th>
                                        </tr>
                                           
                                        </thead>
                                        <tbody>

                                          <tr style="width: 300px">


                                            <td >
                                                 <a href="<?php echo site_url()?>//Po/tambahPO"><button class="btn btn-flat btn-success mb-4" role="button" style="width:480px""><img style="width: 100px;height: 100px" src="<?php echo base_url()?>assets/images/icon/inputpo.png"><br>INPUT PO</button></a><br></td>


                                            <td>
                                                 <a href="<?php echo site_url()?>/Purch_req/tambahPR"><button class="btn btn-flat btn-success mb-4" role="button" style="width:480px""><img style="width: 100px;height: 100px" src="<?php echo base_url()?>assets/images/icon/inputpr.png"><br>INPUT PR</button></a><br></td>


                                        
                                         </tr>
                                       </tbody>
                                    </table>



                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped" >
                                        <thead class="bg-light text-capitalize" align="center">

                                         <tr>
                                       
                                                <th colspan="5"><h4>MASTER DATA</h4></th>
                                        </tr>
                                           
                                        </thead>
                                        <tbody>

                                          <tr align="center">


                                           <td >
                                                 <a href="<?php echo site_url()?>/Supplier/"><button class="btn btn-flat btn-warning mb-4" role="button" style="width:160px""><img style="width: 100px;height: 100px" src="<?php echo base_url()?>assets/images/icon/supp.png"><br>SUPPLIER</button></a><br></td>


                                            <td >
                                                 <a href="<?php echo site_url()?>/Barang"><button class="btn btn-flat btn-warning mb-4" role="button" style="width:160px""><img style="width: 100px;height: 100px" src="<?php echo base_url()?>assets/images/icon/brg.png"><br>BARANG</button></a><br></td>


                                                <td >
                                                 <a href="<?php echo site_url()?>/Unit_barang"><button class="btn btn-flat btn-warning mb-4" role="button" style="width:160px""><img style="width: 100px;height: 100px" src="<?php echo base_url()?>assets/images/icon/unitbrg.png"><br>UNIT BARANG</button></a><br></td>

                                                <td >
                                                 <a href="<?php echo site_url()?>/Departemen"><button class="btn btn-flat btn-warning mb-4" role="button" style="width:160px""><img style="width: 100px;height: 100px" src="<?php echo base_url()?>assets/images/icon/dpt.png"><br>DEPARTEMEN</button></a><br></td>

                                                <td >
                                                 <a href="<?php echo site_url()?>/Section"><button class="btn btn-flat btn-warning mb-4" role="button" style="width:160px""><img style="width: 100px;height: 100px" src="<?php echo base_url()?>assets/images/icon/section.png"><br>SECTION</button></a><br></td>
                                             

                                                      <tr style="background:#e9e9e9">
                                                       <td colspan="3">
                                                       <a href="<?php echo site_url()?>/Approval"><button class="btn btn-flat btn-warning mb-4" role="button" style="width:450px""><img style="width: 100px;height: 100px" src="<?php echo base_url()?>assets/images/icon/approve.png"><br>APPROVAl</button></a><br></td>

                                                       <td colspan="2">
                                                      <a href="<?php echo site_url()?>/Login/ManajemenUser"><button class="btn btn-flat btn-warning mb-4" role="button" style="width:450px""><img style="width: 100px;height: 100px" src="<?php echo base_url()?>assets/images/icon/user.png"><br>KELOLA USER</button></a><br></td></tr>
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
