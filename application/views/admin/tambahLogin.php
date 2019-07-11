
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Others</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="#">Management user</a></li>
                                <li><span>Tambah User</span></li>
                            </ul>

                    </div>
                
                </div>
            </div>
        </div>

            <!-- page title area end -->
            <div class="main-content-inner" >
                <div class="row " >
                    <!-- data table start -->
                    
                    <div class="col-12 mt-5">
                        <div class="card">
                                <div class="card-body" >
                                     <?php echo form_open('Login/tambahLogin') ?>
                                     <div class="col-4 mt-6">
                                    <h4> <i class="fa fa-user"></i> Form Tambah User</h4> <br><br>
                                    </div>
                                       
                                     <div class="form-group" >
                                                     <label class="control-label " for="username">Username:</label>
                                           
                                                <input type="text" class="form-control" name="username" style="margin-bottom: 25px; width:400px; " required="">
                                            </div>  
                                                

                                       

                                           

                                            <div class="form-group" >
                                                     <label class="control-label " for="password">Password :</label>
                                           
                                                <input type="text"  class="form-control" name="password" style="margin-bottom: 25px; width:400px;" required="">
                                            </div>

                                            <div class="form-group" >
                                                     <label class="control-label " for="konfirpassword"> Konfirmasi Password :</label>
                                           
                                                <input type="text"  class="form-control" name="konfirpassword" style="margin-bottom: 25px; width:400px;" required="">
                                            </div>

                                            <div class="form-group" >
                                                     <label class="control-label " for="hak_akses">Hak Akses :</label>
                                           
                                                <select class="form-control" name="hak_akses" style="margin-bottom: 25px; width:400px;" required="" id="hak_akses">

                                                    <option class="form-control" value="">Pilih: </option>
                                                     <option class="form-control" value="1">ADMINISTRATOR</option>
                                                     <option class="form-control" value="2">SECTION</option>
                                                     <option class="form-control" value="3">INVOICE</option>
                                                     <option class="form-control" value="4">INVOICExxx</option>

                                                </select>
                                            </div>
                                            <div class="form-group" id="insert-form" name="insert-form">
                                                
                                            </div>

                                           
                                          

   
   
                                     
        
          
              <div align="left"> <button type="submit" class="btn btn-primary" style="align-self: left">Simpan</button></div>
              <?php echo form_close() ?>
           

    </div>
</div>
</div>
</div>
</div>

<script>
    $(document).ready(function(){ // Ketika halaman sudah diload dan siap
        $("#hak_akses").click(function(){ // Ketika tombol Tambah Data Form di klik
             // Ambil jumlah data form pada textbox 
             var val = $(this).val();
             if (val == "4") {

              $("#insert-form").append("<select name='section' class='form-control' id='section'><option> PILIH : </option><?php foreach ($section as $key) {?> <option class='form-control' value='<?php echo $key->id_section?>'><?php echo $key->nama_section?> </option> <?php }?></select>");
          }

             // Ubah value textbox jumlah-form dengan variabel nextform
        });   
        // Buat fungsi untuk mereset form ke semula
        $("#btn-reset-form").click(function(){
             $("#insert-form").html("");
            $("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
        });
    });
    </script>