<!-- <style>
.select2-dropdown {top: 22px !important; left: 8px !important;}
</style> -->
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Master Data</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Barang</a></li>
                                <li><span>Data Barang</span></li>
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
                                 <?=$this->session->flashdata('editItem')?>
                                   <?=$this->session->flashdata('hapusItem')?>
         
                                <div>
                                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped" id="dataTablesss">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                                <th>
                                                <th>NO</th>
                                                <th>ITEM BARANG</th>
                                                <th>QTY</th>
                                                <th>NO PO</th>
                                                <th>QTY TO PO</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php   
                                        $no =1; foreach ($Read_only as $key) {?>
                                            <tr>
                                                <td>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $key->item_barang;?></td>
                                                <td><?php echo $key->qty?></td>
                                           
                                                <td><?php echo $key->no_po;?></td>
                                                <td><?php echo $key->qtybay;?></td>
                                    
                                                
                                             
                                            </tr>
                                            <?php $no++;}?>
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
    /* Formating function for row details */
    

      /*
       * Initialse DataTables, with no sorting on the 'details' column
       */
      var oTable = $('#dataTablesss').dataTable({
        "aoColumnDefs": [{
          "bSortable": false,
          "aTargets": [0]
        }],
        "aaSorting": [
          [1, 'asc']
        ]
      });

      /* Add event listener for opening and closing details
       * Note that the indicator for showing which row is open is not controlled by DataTables,
       * rather it is done here
       */
    
  </script>
  <script src="<?php echo base_url()?>assets/select2.min.js"></script>
<!-- <script>
$("#item_barang").select2( {
    placeholder: "Select Item",
    allowClear: true
    } );
</script> -->


</body>

</html>
