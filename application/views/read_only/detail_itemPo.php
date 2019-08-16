
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Data</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="#">Purchase Order</a></li>
                                <li><span>list purchase order /</span></li>
                                <li><span>Detail PO</span></li>
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
                            <div class="card-body">
                     
                                <div>
                                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped" id="dataTablesss">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                              
                                                <th>NO</th>
                                                <th>NO PR</th>
                                             <th>ITEM BARANG</th>
                                                <th>QTY TO PO</th>  
                                                                            
                                               
                                             
                                          
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; $hasil_rupiah="Rp 0" ;$jumlah=0; foreach ($brg as $key) {
                                          ?>
                                            <tr>
                                        
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $key->no_pr;?></td>
                                                <td><?php echo $key->item;?></td>
                                                <td><?php echo $key->qty;?></td>
                                            
                                              
                                             
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
 


    <!-- offset area end -->
    <!-- jquery latest version -->
    <?php $this->load->view('admin/footer'); ?>

    <!-- Start datatable js -->
     <script type="text/javascript" src="<?php echo base_url()?>assets/advanced-datatable/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTables/js/jquery.dataTables.js"></script>
 
    <!-- others plugins -->
<script type="text/javascript">
    function modalDetail(no,no_barang,group_name,nama_barang,unit,remarks){
        document.getElementById('no').value = no;
        document.getElementById('no_barang').value = no_barang;
        document.getElementById('group_name').value = group_name;
        document.getElementById('nama_barang').value = nama_barang;
        document.getElementById('unit').value = unit;
        document.getElementById('remarks').value = remarks;
      
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
          [0, 'asc']
        ]
      });

      /* Add event listener for opening and closing details
       * Note that the indicator for showing which row is open is not controlled by DataTables,
       * rather it is done here
       */
    
  </script>
</body>

</html>
