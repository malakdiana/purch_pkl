
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Data</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Purchase Order</a></li>
                                <li><span>List Purchase Order</span></li>
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
                                                <th>ACTION</th>
                                               
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php   foreach ($Po as $key) {?>
                                            <tr>
                                       
                                                <td><?php echo $key->id_po;?></td>
                                                <td><?php echo $key->tgl_po;?></td>
                                                <td><?php echo $key->no_po;?></td>
  


                                                <td>
                                                  <div class="btn-group mb-xl-3" role="group" aria-label="Basic example">

                                   
                                    <button type="button" class="btn btn-info" style="width:80px; height:50px;"><a href="<?php echo site_url()?>/Po/detail_itemPo/<?php echo $key->id_po?>"><font color="white"><i class="fa fa-th-list"></i> Detail</font></a></button>

                                     <button type="button" class="btn btn-success" style="width:95px; height:50px;"> <a href="<?php echo site_url()?>/Po/tambahItem/<?php echo $key->id_po?>"><font color="white"><i class="fa fa-plus"></i> Insert PR</font></a></button>


                                     <button type="button" class="btn btn-primary" style="width:80px; height:50px;"> <a href="<?php echo site_url()?>/Po/EditPo/<?php echo $key->id_po?>"><font color="white"><i class="fa fa-pencil-square-o"></i> Edit</font></a></button>

                                   
                                    <button type="button" class="btn btn-danger" style="width:80px; height:50px;"><a href="<?php echo site_url()?>/Po/deletePo/<?php echo $key->id_po?> " onclick="return confirm('Apakah Yakin Untuk Menghapus?')"><font color="white"><i class="fa fa-trash-o"></i> Hapus</font></a></button>
                                </div>
                                                
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
          <?php echo form_open_multipart('Po/tambahItem'); ?>
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
