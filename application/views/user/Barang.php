
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Master Data</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="#">Barang</a></li>
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
                           
                        <?=$this->session->flashdata('editBarang')?>
                         <?=$this->session->flashdata('deleteBarang')?>
                         <?=$this->session->flashdata('tambahBarang')?>
                                <div>
                                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped" id="dataTablesss">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                              
                                              
                                                <th>NOMER</th>
                                            
                                                <th>NAMA BARANG</th>
           
                                          
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1;  foreach ($brg as $key) {?>
                                            <tr>
                                        
                                           
                                                <td><?php echo $no;?></td>
                                         
                                                <td><?php echo $key->nama_barang;?></td>
                                            
                                    
                                               
                                             
                                            </tr>
                                            <?php $no++; }?>
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
                    <h4 class="modal-title">Info Barang</h4>
                </div>
          <?php echo form_open_multipart('Barang/updateBarang'); ?>
                <?php echo validation_errors(); ?>
                 
                    <div class="form-group">
                        <label for="">NO BARANG</label>
                        <input type="text" class="form-control" name="no_barang" id="no_barang" value="" readonly="" >
                    </div>
                  
                    <div class="form-group">
                        <label for="">NAMA BARANG</label>
                        <input type="text" class="form-control" name="nama_barang" id="nama_barang" value="" >
                    </div>


                   

                
               
               
            <div align="right" style="margin-bottom: 20px; margin-right: 30px">
          <button class="btn-info" type="submit">Update</button>
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
    function modalDetail(no_barang,nama_barang){
    
        document.getElementById('no_barang').value = no_barang;
   
        document.getElementById('nama_barang').value = nama_barang;
  
      
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
        // "aaSorting": [
        //   [0, 'desc']
        // ]
      });

      /* Add event listener for opening and closing details
       * Note that the indicator for showing which row is open is not controlled by DataTables,
       * rather it is done here
       */
    
  </script>
</body>

</html>
