
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Data</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Purchase Request</a></li>
                                <li><span>List Purchase Request</span></li>
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
                       
                         <?=$this->session->flashdata('deletePurch_req')?>
                         <?=$this->session->flashdata('tambahItem')?>
                             <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table text-center" id="dataTablesss">
                                   <thead class="text-uppercase">
                                            <tr>
                                       
                                                <th>NO</th>
                                                <th>TANGGAL</th>
                                                <th>JAM</th>
                                         
                                                <th>PIC REQUEST</th>
                                                <th>SECTION</th>
                                                <th>NO PR</th>
                                                <th>VERIFIED FA</th>
                                                <th>STATUS</th>
                                                <th>ACTION</th>
                                               
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php   foreach ($Purch_req as $key) {?>
                                            <tr>
                                       
                                                <td><?php echo $key->id;?></td>
                                                <td><?php echo $key->tgl;?></td>
                                                <td><?php echo $key->jam;?></td>
                                              
                                                <td><?php echo $key->pic_request;?></td>
                                                <td><?php echo $key->section;?></td>
                                                <td><?php echo $key->pr_no;?></td>

                                                <td><?php 
                                                if($key->status_fa == 1){?>
                                                     <img style="width: 40px;height: 50px" src="<?php echo base_url()?>assets/images/icon/success.png">
                                                     <?php }
                                                     else { ?>  
                                                        <img style="width: 40px;height: 50px" src="<?php echo base_url()?>assets/images/icon/not.png">
                                                        <?php }?>

                                                </td>
                                         

                                                <td><?php 
                                                if($key->status == "OPEN"){?>
                                                   <div class="form-control" align="center" value="OPEN" name="status" style="margin-bottom: 25px;width: 100px; background-color: #FFA500; color:#FFF" > OPEN </div>
                                                     <?php }
                                                     else if ($key->status == "CLOSED"){ ?>  
                                                        <div class="form-control" align="center" value="CLOSED" name="status" style="margin-bottom: 25px;width: 100px; background-color: #CD853F; color:#FFF" > CLOSED </div>
                                                        <?php }
                                                     else { ?>  
                                                           <div class="form-control" align="center" value="CANCEL" name="status" style="margin-bottom: 25px;width: 100px; background-color: #BC8F8F; color:#FFF" > CANCEL </div>
                                                        <?php }

                                                        ?>

                                                </td>



                                                <td>
                                                  <div class="btn-group mb-xl-3" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-info" style="width:80px; height:50px;"><a href="<?php echo site_url()?>/Purch_req/GetItem_barang/<?php echo $key->id?>"><font color="white"><i class="fa fa-th-list"></i> Detail</font></a></button>

                                   

                                    
                                                
                                                </td>
                                             
                                            </tr>
                                            <?php }?>
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
 


      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModalEdit" class="modal fade-in" >
        <div class="modal-dialog">
            <div class="modal-content" style="width: 800px; margin-left: -100px;padding: 20px" >
                <div class="modal-header">
                    <h4 class="modal-title">Info Purch_req</h4>
                </div>
          <?php echo form_open_multipart('Purch_req/tambahItem'); ?>
                <?php echo validation_errors(); ?>
                     <div class="form-group">
                        <label for="">ITEM BARANG </label>
                        <input type="text" class="form-control" name="id" id="id" value="" readonly="" >
                    </div>
                    <div class="form-group">
                        <label for="">QTY</label>
                        <input type="text" class="form-control" name="tgl" id="tgl" value="" >
                    </div>
                    

                
               
               
            <div align="right" style="margin-bottom: 20px; margin-right: 30px">
          <button class="btn-info" type="submit">Simpan</button>
            <a href=""><button class="btn-warning" data-dismiss="modal">Batal</button></a>
        </div>
    
        <?php echo form_close(); ?>
        </div>
    </div>
        
    <!-- offset area end -->
    <!-- jquery latest version -->
    <?php $this->load->view('admin/footer'); ?>

    <!-- Start datatable js -->
     <script type="text/javascript" src="<?php echo base_url()?>assets/advanced-datatable/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTables/js/jquery.dataTables.js"></script>
 
    <!-- others plugins -->
<script type="text/javascript">
    function modalDetail(id_user,id_section,username,password,hak_akses){
        document.getElementById('item_barang').value = item_barang;
        document.getElementById('qty').value = qty;
       
       
      
    }
  </script>
 

     <script type="text/javascript">
    /* Formating function for row details */
    

      /*
       * Initialse DataTables, with no sorting on the 'details' column
       */
        var oTable = $('#dataTablesss').dataTable({
        "aoColumnDefs": [{
          "bSortable": true,
          "aTargets": [0]
        }],
        "aaSorting": [
          [0, 'desc']
        ]
      });

      /* Add event listener for opening and closing details
       * Note that the indicator for showing which row is open is not controlled by DataTables,
       * rather it is done here
       */
    
  </script>
</body>

</html>
