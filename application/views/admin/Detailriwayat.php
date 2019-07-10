
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Data</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="#">Riwayat Kedatangan</a></li>
                                <li><span>Detail riwayat</span></li>
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
                                                <th>TANGGAL DATANG</th>
                                                <th>QTY DATANG</th>
                                                <th>ACTION</th>
                                               
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php   foreach ($Detail as $key) {?>
                                            <tr>
                                       
                                                <td><?php echo $key->id_po;?></td>
                                                <td><?php echo $key->tgl_po;?></td>
                                                <td><?php echo $key->no_po;?></td>
                                                <td><?php echo $key->eta;?></td>
                                                <td><?php echo $key->no_pr;?></td>
                                                <td><?php echo $key->item;?></td>
                                                <td><?php echo $key->qty;?></td>
                                                <td><?php echo $key->tgl_dtg;?></td>
                                                <td><?php echo $key->qty_dtg;?></td>

                                                <?php if($key->status_datang == 1||$key->status_datang ==2){?>
                                                <td>
                                                 <button type="button" class="btn btn-danger" style="width:80px; height:50px;"><a href="<?php echo site_url()?>/Riwayatdatang/deleteriwayat/<?php echo $key->id?>/<?php echo $key->id_bayangan?> " onclick="return confirm('Apakah Yakin Untuk Menghapus?')"><font color="white"><i class="fa fa-trash-o"></i> Hapus</font></a></button></td>
                                                 <?php } else{?>

                                                  <td></td><?php } ?>
                                                
                                                 
                                             
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
 


        
        
    <!-- offset area end -->
    <!-- jquery latest version -->
    <?php $this->load->view('admin/footer'); ?>

    <!-- Start datatable js -->
     <script type="text/javascript" src="<?php echo base_url()?>assets/advanced-datatable/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTables/js/jquery.dataTables.js"></script>
 
    <!-- others plugins -->

 

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
