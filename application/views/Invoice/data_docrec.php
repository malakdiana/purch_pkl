
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Data</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="#">Invoice</a></li>
                                <li><span>Document Receipt</span></li>
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
                             <?=$this->session->flashdata('editDocRec')?>
                             <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table text-center" id="dataTablesss">
                                   <thead class="text-uppercase">
                                            <tr>
                                       
                                                <th>NO</th>
                                                <th>VP DATE</th>
                                 
                                                <th>NO RECEIPT</th>
                                                <th>SUPPLIER</th>
                                                <th>NO PO</th>
                                                <th>BARANG</th>
                                                <th>NO INVOICE</th>
                                                <th>INVOICE DATE</th>
                                                <th>action</th>
                                               
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no = 1;   foreach ($doc as $key) {?>
                                            <tr>
                                       <td><?php echo $no?></td>
                                                <td><?php echo $key->vp_date;?></td>
                                      
                                                <td><?php echo $key->no_receipt;?></td>
                                              
                                                <td><?php echo $key->nama_supplier;?></td>
                                                <td><?php echo $key->no_po;?></td>
                                                <td><?php echo $key->barang;?></td>
                                                <td><?php echo $key->no_invoice;?></td>
                                                <td><?php echo $key->tgl_invoice;?></td>
                                                <td><a href="<?php echo site_url()?>/Invoice/editDocRec/<?php echo $key->id_receipt?>" class="btn btn-info"><i class="fa fa-pencil"> EDIT</a></td>

                                            
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
    
      });

      /* Add event listener for opening and closing details
       * Note that the indicator for showing which row is open is not controlled by DataTables,
       * rather it is done here
       */
    
  </script>
</body>

</html>
