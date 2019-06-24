
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Master Data</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Purch_req</a></li>
                                <li><span>Data Purch_req</span></li>
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
                             
                                <table cellpadding="0" cellspacing="0" border="0" class="table table-responsive table-striped" id="dataTablesss">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                            <th></th>
                                                <th>NO</th>
                                                <th>TANGGAL</th>
                                                <th>JAM</th>
                                                <th>NIK</th>
                                                <th>PIC REQUEST</th>
                                                <th>SECTION</th>
                                                <th>NO PR</th>
                                                <th>VERIFIED FA</th>
                                                <th>STATUS</th>
                                                <th>Detail</th>
                                                <th >TAMBAH</th>
                                                <th >HAPUS</th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php   foreach ($Purch_req as $key) {?>
                                            <tr>
                                            <td></td>
                                                <td><?php echo $key->id;?></td>
                                                <td><?php echo $key->tgl;?></td>
                                                <td><?php echo $key->jam;?></td>
                                                <td><?php echo $key->nik;?></td>
                                                <td><?php echo $key->pic_request;?></td>
                                                <td><?php echo $key->section;?></td>
                                                <td><?php echo $key->pr_no;?></td>
                                                <td><?php echo $key->status_pr;?></td>
                                                <td><?php echo $key->status;?></td>
                                                <td> <a href="<?php echo site_url()?>/Purch_req/tambahItem/"><i class="fw-icons fa fa-clone"></i></a></td>


                                                <td>
                                                <a href="<?php echo site_url()?>/Purch_req/tambahItem/"><i class="fa fa-edit"></i></a></td>
                                                <td>                                          
                                                <a href="<?php echo site_url()?>/Purch_req/deletePurch_req/<?php echo $key->id?> " onclick="return confirm('Apakah Yakin Untuk Menghapus?')"><i class="fa fa-trash-o"></i></a></td>
                                             
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
</body>

</html>
