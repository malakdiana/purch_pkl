
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
                             <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table text-center" id="dataTablesss">
                                   <thead class="text-uppercase">
                                            <tr>
                                       
                                                <th>NO</th>
                                                <th>VP DATE</th>
                                                <th>TF DATE</th>
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
                                                <td><?php echo $key->tf_date;?></td>
                                                <td><?php echo $key->no_receipt;?></td>
                                              
                                                <td><?php echo $key->nama_supplier;?></td>
                                                <td><?php echo $key->no_po;?></td>
                                                <td><?php echo $key->barang;?></td>
                                                <td><?php echo $key->no_invoice;?></td>
                                                <td><?php echo $key->tgl_invoice;?></td>
                                                <td><a href="" class="btn btn-warning">EDIT</a></td>

                                            
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
          [7, 'desc'],
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
