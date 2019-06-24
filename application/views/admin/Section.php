
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Master Data</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Section</a></li>
                                <li><span>Data Section</span></li>
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
                                <a class="btn btn-flat btn-primary mb-3" href="<?php echo site_url()?>/Section/tambahSection" role="button">Tambah Data</a>
                                <a class="btn btn-flat btn-success mb-3" href="<?php echo site_url()?>/Section/importSection" role="button">Import Data</a>
                                <a class="btn btn-flat btn-warning mb-3" href="<?php echo site_url()?>/Section/export" role="button">Download Data</a></div>
                            <div class="card-body">
                        <?=$this->session->flashdata('editSection')?>
                         <?=$this->session->flashdata('deleteSection')?>
                         <?=$this->session->flashdata('tambahSection')?>
                                <div>
                                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped" id="dataTablesss">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                                <th>
                                                <th>ID SECTION</th>
                                                <th>NAMA SECTION</th>
                                                <th>KODE DEPT</th>
                                           
                                               
                                                <th >Edit</th>
                                                <th >Hapus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php   foreach ($dpt as $key) {?>
                                            <tr>
                                                <td>
                                                <td><?php echo $key->id_section;?></td>
                                                <td><?php echo $key->nama_section;?></td>
                                                <td><?php echo $key->dept;?></td>
                                    
                                                <td>
                                                <a href="javascript:void(0);" onclick="modalDetail('<?php echo $key->id_section?>','<?php echo $key->nama_section ?>','<?php echo $key->dept ?>')"  data-toggle="modal" data-target="#myModalEdit"><i class="fa fa-edit"></i></a></td><td>
                                                
                                                <a href="<?php echo site_url()?>/Section/deleteSection/<?php echo $key->id_section?> " onclick="return confirm('Apakah Yakin Untuk Menghapus?')"><i class="fa fa-trash-o"></i></a></td>
                                             
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
                    <h4 class="modal-title">Info Section</h4>
                </div>
          <?php echo form_open_multipart('Section/updateSection'); ?>
                <?php echo validation_errors(); ?>
                     <div class="form-group">
                        <label for="">ID SECTION</label>
                        <input type="text" class="form-control" name="id_section" id="id_section" value="" readonly="" >
                    </div>
                    <div class="form-group">
                        <label for="">NAMA SECTION</label>
                        <input type="text" class="form-control" name="nama_section" id="nama_section" value="" >
                    </div>

                   <div class="form-group">
                        <label class="control-label " for="dept">Kode Dept :</label>
                            <select name="dept" class="form-control">
                            
                            <?php foreach ($listDep as $key) {?>
                            <option class="form-control" value="<?php echo $key->no?>"><?php echo $key->group_name?> </option> <?php }?>
                            </select>
                                              
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
    function modalDetail(id_section,nama_section,dept){
        document.getElementById('id_section').value = id_section;
        document.getElementById('nama_section').value = nama_section;
        document.getElementById('dept').value = dept;
      
    }
  </script>
 

     <script type="text/javascript">
    /* Formating function for row details */
    

      /*
       * Initialse DataTables, with id_section sorting on the 'details' column
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
       * id_sectionte that the indicator for showing which row is open is id_sectiont controlled by DataTables,
       * rather it is done here
       */
    
  </script>
</body>

</html>
