<style type="text/css">
    .password{
    position: relative;
}

.password input[type="password"]{
    padding-right: 30px;
}

.password .fa,#password2 .fa {
    display:none;
    right: 15px;
    position: absolute;
    top: 12px;
    cursor:pointer;
}


</style>

 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Others</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="#">Management User</a></li>
                                <li><span>Data User</span></li>
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
                                <a class="btn btn-flat btn-primary mb-3" href="<?php echo site_url()?>/Login/tambahLogin" role="button"><i class="fa fa-plus"></i> Tambah Data</a>
                                
                            <div class="card-body">
                        <?=$this->session->flashdata('editLogin')?>
                         <?=$this->session->flashdata('deleteLogin')?>
                         <?=$this->session->flashdata('tambahLogin')?>
                                <div>
                                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped" id="dataTablesss">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                           
                                               
                                                
                                                <th>USERNAME</th>
                                                
                                                <th>HAK AKSES</th>
                                           
                                               
                                                <th >Action</th>
                                          
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php   foreach ($login as $key) {?>
                                            <tr>
                                        
                                                
                                                
                                                <td><?php echo $key->username;?></td>
                                               
                                                <td><?php 
                                                if($key->hak_akses == 1){?>
                                                     ADMINISTRATOR
                                                     <?php }
                                                 else if($key->hak_akses == 2){?>
                                                     SECTION
                                                     <?php }
                                                 else if($key->hak_akses == 4){?>
                                                     USER PERSONAL
                                                     <?php }         
                                                     else { ?>  
                                                        INVOICE
                                                        <?php }?>

                                                </td>
                                    
                                                <td>
                                                     <div class="btn-group mb-xl-3" role="group" aria-label="Basic example">
                                  
                                    <a href="javascript:void(0);" onclick="modalDetail('<?php echo $key->id_user?>','<?php echo $key->username ?>','<?php echo $key->password ?>','<?php echo $key->hak_akses ?>')"  data-toggle="modal" data-target="#myModalEdit"><button type="button" class="btn btn-primary"><font color="white"><i class="fa fa-edit"></i> Edit</font></button></a>
                                    <a href="<?php echo site_url()?>/Login/deleteLogin/<?php echo $key->id_user?> " onclick="return confirm('Apakah Yakin Untuk Menghapus?')"><button type="button" class="btn btn-danger"><font color="white"><i class="fa fa-trash-o"></i> Hapus</font></button></a>
                                  
                                </div>
 
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
                    <h4 class="modal-title">Info Login</h4>
                </div>
          <?php echo form_open_multipart('Login/updateLogin'); ?>
                <?php echo validation_errors(); ?>
                     <div class="form-group">
                        
                        <input type="text" class="form-control" name="id_user" id="id_user" value="" readonly="" hidden="" >
                    </div>
                  
                    <div class="form-group">
                        <label for="">USERNAME</label>
                        <input type="text" class="form-control" name="username" id="username" value="" readonly="" >
                    </div>
                    <div class="form-group">
                        <label for="">PASSWORD</label>
                         <div class="password">
                        
                        <input type="password" class="form-control" name="password" id="myInput" value="" >
                        </div>

                        <input type="checkbox" onclick="myFunction()"> Show Password 
                    </div>

                    <div class="form-group">
                        <label for="">KONFRIMASI PASSWORD</label>
                        <div class="password">
                        <i class="fa fa-eye"></i>
                        <input type="password" class="form-control" name="konfirpassword" id="myInput2" value="" >
                        </div>
                        <input type="checkbox" onclick="myFunction2()"> Show Konfirmasi Password 
                    </div>

                    <div class="form-group">
                        <label for="">HAK AKSES</label>
                        <select class="form-control" name="hak_akses" id="hak_akses">
                        <option value="1">ADMINISTRATOR</option>
                        <option value="2">SECTION</option>
                        <option value="3">INVOICE</option>
                        </select>
                    </div>
                    

                
               
               
            <div align="right" style="margin-bottom: 20px; margin-right: 30px">
          <button class="btn btn-info" type="submit">Update</button>
            <a href=""><button class="btn btn-warning" data-dismiss="modal">Batal</button></a>
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
    function modalDetail(id_user,username,password,hak_akses){
      
         document.getElementById('id_user').value = id_user;
        document.getElementById('username').value = username;
      document.getElementById('myInput').value="";
      document.getElementById('myInput2').value="";
        document.getElementById('hak_akses').value = hak_akses;
       
      
    }
  </script>
 

     <script type="text/javascript">
  
      var oTable = $('#dataTablesss').dataTable({
        "aoColumnDefs": [{
          "bSortable": true,
          "aTargets": [0]
        }],
        "aaSorting": [
          [0, 'desc']
        ]
      });

  function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
} 

 function myFunction2() {
  var x = document.getElementById("myInput2");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
} 

    
  </script>
</body>

</html>
