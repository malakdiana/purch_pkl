<style type="text/css">
    .td {
        width: 160px;
    }
</style>
 <!-- <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Dashboard</h4>
                           

                    </div>
                
                </div>
            </div>
        </div> -->

            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row" align="center">
                    <!-- data table start -->
                    <div class="col-12 mt-5">
                        
                        <?=$this->session->flashdata('editDepartemen')?>
                         <?=$this->session->flashdata('deleteDepartemen')?>
                         <?=$this->session->flashdata('tambahDepartemen')?>
                                <div>
                                

                                 <table cellpadding="0" cellspacing="0" border="0" class="table">
                                        <thead class="bg-light text-capitalize" align="center" >

                                         <tr>
                                       
                                                <th align="left"><h4 style="align:left">DATA</h4></th>
                                        </tr>
                                           
                                        </thead>
                                        <tbody>

                                        <tr align="center">
                                               
                                                <td style="width:130px">
                                                <a href="<?php echo site_url()?>/Purch_req/"><button class="btn btn-flat btn-info mb-4" role="button" style="width:230px"><img style="width: 100px;height: 100px" src="<?php echo base_url()?>assets/images/icon/trackpo.png"><br>TRACKING MY ORDER</button></a><br></td>

                                                <td style="width:130px">
                                                 <a href="<?php echo site_url()?>/Qr/tracking/"><button class="btn btn-flat btn-info mb-4" role="button" style="width:230px"><img style="width: 100px;height: 100px" src="<?php echo base_url()?>assets/images/icon/trackingQuo.png"><br>TRACKING MY QUOTATION</button></a><br></td>

                                                <td style="width:130px">
                                                 <a href="<?php echo site_url()?>/Qr/"><button class="btn btn-flat btn-info mb-4" role="button" style="width:230px""><img style="width: 100px;height: 100px" src="<?php echo base_url()?>assets/images/icon/listallquo.png"><br>LIST ALL QUOTATION</button>
                                                 </a><br></td>

                                                 <td style="width:130px">
                                               
                                                 <a href="<?php echo site_url()?>/Barang"><button class="btn btn-flat btn-info mb-4" role="button" style="width:230px;"><img style="width: 100px;height: 100px" src="<?php echo base_url()?>assets/images/icon/brg.png"><br>MASTER BARANG</button></a><br></td>

                                                  <td style="width:130px">
                                                
                                                <a href="<?php echo site_url()?>/Eta/getUser/<?php echo $this->session->userdata('logged_in')['username'] ?>" ><button class="btn btn-flat btn-info mb-4" role="button" style="width:230px;"><img style="width: 100px;height: 100px" src="<?php echo base_url()?>assets/images/icon/eta.png"><br>CEK ETA</button></a><br></td>
                                               

                                               

                                                
                                            

                                         </tr>
                                       </tbody>
                                    </table>



                                    <table cellpadding="0" cellspacing="0" border="0" class="table">
                                        <thead class="bg-light text-capitalize" align="center">

                                         <tr>
                                       
                                                <th><h4>INPUT DATA</h4></th>
                                        </tr>
                                           
                                        </thead>
                                        <tbody>

                                          <tr style="width: 250px">


                                            <td style="width:150px">
                                            &nbsp;&nbsp;&nbsp;
                                                 <a href="<?php echo site_url()?>/Purch_req/tambahPR"><button class="btn btn-flat btn-info mb-4" role="button" style="width:360px; margin-left:35px"><img style="width: 100px;height: 100px" src="<?php echo base_url()?>assets/images/icon/inputpr.png"><br>INPUT PR</button></a><br></td>


                                            <td >
                                                 <a href="<?php echo site_url()?>/Qr/tambahQR"><button class="btn btn-flat btn-info mb-4" role="button" style="width:360px; margin-left:60px; margin-top:24px"><img style="width: 100px;height: 100px" src="<?php echo base_url()?>assets/images/icon/inputqr.png"> <br>INPUT QR</button></a><br></td>


                                        
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
