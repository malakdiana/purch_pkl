
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Master Data</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Approval</a></li>
                                <li><span>Data Approval</span></li>
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
                                <a class="btn btn-flat btn-primary mb-3" href="<?php echo site_url()?>/Approval/tambahApproval" role="button">Tambah Data</a>
                                <a class="btn btn-flat btn-success mb-3" href="<?php echo site_url()?>/Approval/importApproval" role="button">Import Data</a>
                                <a class="btn btn-flat btn-warning mb-3" href="<?php echo site_url()?>/Approval/export" role="button">Download Data</a></div>
                            <div class="card-body">
                        <?=$this->session->flashdata('editApproval')?>
                         <?=$this->session->flashdata('deleteApproval')?>
                         <?=$this->session->flashdata('tambahApproval')?>
                                <div>
                                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped" id="dataTablesss">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                                
                                                <th>NO</th>
                                                <th>NAMA</th>
                                                <th>KODE NAMA</th>
                                                <th>MIN</th>
                                                <th>MAX</th>
                                                
                                           
                                               
                                             <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php   foreach ($app as $key) {?>
                                            <tr>
                                           
                                                <td><?php echo $key->no;?></td>
                                                <td><?php echo $key->nama;?></td>
                                                <td><?php echo $key->kode_nama;?></td>
                                                <td><?php echo $key->min;?></td>
                                                <td><?php echo $key->max;?></td>
                                                
                                    
                                                <td>

                                                  <div class="btn-group mb-xl-3" role="group" aria-label="Basic example">
                                    
                                    <button type="button" class="btn btn-primary"> <a href="javascript:void(0);" onclick="modalDetail('<?php echo $key->no?>','<?php echo $key->nama?>','<?php echo $key->kode_nama ?>','<?php echo $key->min ?>','<?php echo $key->max ?>')"  data-toggle="modal" data-target="#myModalEdit"><font color="white">Edit</font></a></button>
                                    <button type="button" class="btn btn-danger"><a href="<?php echo site_url()?>/Approval/deleteApproval/<?php echo $key->no?> " onclick="return confirm('Apakah Yakin Untuk Menghapus?')"><font color="white">Hapus</font></a></button>
                                  
                                </div></td>
                                             
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
                    <h4 class="modal-title">Info Approval</h4>
                </div>
          <?php echo form_open_multipart('Approval/updateApproval'); ?>
                <?php echo validation_errors(); ?>
                     <div class="form-group">
                        <label for="">NO</label>
                        <input type="text" class="form-control" name="no" id="no" value="" readonly="" >
                    </div>
                    <div class="form-group">
                        <label for="">NAMA</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="" >
                    </div>
                    <div class="form-group">
                        <label for="">KODE NAMA</label>
                        <input type="text" class="form-control" name="kode_nama" id="kode_nama" value="" >
                    </div>
                    <div class="form-group">
                        <label for="">MIN</label>
                        <input type="text" class="form-control" name="min" id="min" value="" >
                    </div>
                    <div class="form-group">
                        <label for="">MAX</label>
                        <input type="text" class="form-control" name="max" id="max" value="" >
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
    function modalDetail(no,nama,kode_nama,min,max){
        document.getElementById('no').value = no;
        document.getElementById('nama').value = nama;
        document.getElementById('kode_nama').value = kode_nama;
        document.getElementById('min').value = min;
        document.getElementById('max').value = max;
      
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
