
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Data</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="#">Riwayat Kedatangan</a></li>
                                <li><span>Data riwayat</span></li>
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
                        <div  style="padding-top: 15px;padding-left: 15px">
                                
                                 <a class="btn btn-flat btn-warning mb-3" href="<?php echo site_url()?>/Riwayatdatang/export" role="button"><i class="ti-download"></i> Download Data</a>
                            </div>
                                
                            <div class="card-body">
                       
                         <?=$this->session->flashdata('deletePo')?>
                         <?=$this->session->flashdata('tambahItem')?>
                             <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table text-center" id="dataTablesss">
                                   <thead class="text-uppercase">
                                            <tr>
                                       
                                                <th>NO</th>
                                                <th>TANGGAL PO</th>
                                                <th>NOMER PO</th>
                                                <th>ETA</th>
                                                <th>NOMER PR</th>
                                                <th>NAMA ITEM</th>
                                                <th>QTY PO</th>
                                                <th>STATUS DATANG</th>
                                                <th>ACTION</th>
                                               
                                               
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php   foreach ($Po as $key) {?>
                                            <tr>
                                       
                                                <td><?php echo $key->id_po;?></td>
                                                <td><?php echo $key->tgl_po;?></td>
                                                <td><?php echo $key->no_po;?></td>
                                                <td><?php echo $key->eta;?></td>
                                                <td><?php echo $key->no_pr;?></td>
                                                <td><?php echo $key->item;?></td>
                                                <td><?php echo $key->qty;?></td>
                                               
                                                <td><?php 
                                                if($key->status_datang == 1){?>
                                                     <font color ="red">COMPLETE</font>
                                                     <?php }
                                                   else if ($key->status_datang == 2){ ?>  
                                                        <font color ="purple">ON PROGRESS</font>
                                                        <?php }
                                                     else { ?>  
                                                        <font color ="blue">WAITING</font>
                                                        <?php }?>

                                                </td>
                                                
                                                 <td>
                                                  <div class="btn-group mb-xl-3" role="group" aria-label="Basic example">

                                   <?php if($key->status_datang == 0|| $key->status_datang == 2){?>
                                    <a href="<?php echo site_url()?>/Riwayatdatang/detaildatang/<?php echo $key->id_bayangan ?>"><button type="button" class="btn btn-info" style="width:80px; height:60px;"><font color="white"><i class="fa fa-th-list"></i> Detail</font></button></a>


                                     <a href="javascript:void(0);" onclick="modalDetail('<?php echo $key->id_bayangan ?>','<?php echo $key->item ?>')"  data-toggle="modal" data-target="#myModalEdit"><button type="button" class="btn btn-success" style="width:140px; height:60px;"><font color="white"><center><i class="ti-calendar"></i> Insert<br> Data Kedatangan</center></font></button></a>

                                     <?php } else{?>
                                      <a href="<?php echo site_url()?>/Riwayatdatang/detaildatang/<?php echo $key->id_bayangan ?>"><button type="button" class="btn btn-info" style="width:80px; height:60px;"><font color="white"><i class="fa fa-th-list"></i> Detail</font></button></a>

  
                                </div>
                                                
                                                </td><?php } ?>
                                             
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
                    <h4 class="modal-title" style="margin-left:250px">DATA KEDATANGAN</h4>
                </div>
          <?php echo form_open_multipart('Riwayatdatang/inserttanggal'); ?>
                <?php echo validation_errors(); ?>

                <div class="form-group">
                        
                        <input type="text" class="form-control"  name="id_bayangan" id="id_bayangan" value="" readonly="" hidden="">
                    </div>
                    
                    <div class="form-group">
                        <label for="">NAMA ITEM</label>
                        <input type="text" class="form-control" name="item" id="item" value="" readonly="">
                    </div>

                   <div class="form-group">
                        <label class="control-label " for="tgl_dtg">TANGGAL DATANG :</label>
                             <input type="date" class="form-control" name="tgl_dtg" id="tgl_dtg" value="" required="" >
                                              
                    </div>
                    <div class="form-group">
                        <label for="">QTY DATANG</label>
                        <input type="text" class="form-control" name="qty_dtg" id="qty_dtg" value="" required="">
                    </div>


                
               
               
            <div align="right" style="margin-bottom: 20px; margin-right: 30px">
          <button class="btn btn-info" type="submit">Simpan</button>
            <a href=""><button class="btn btn-warning" data-dismiss="modal">Batal</button></a>
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
    function modalDetail(id_bayangan,item){

        document.getElementById('id_bayangan').value = id_bayangan;
        document.getElementById('item').value = item;
        
      
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
