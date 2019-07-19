<style type="text/css">
    .password{
    position: relative;
}

.password input[type="password"]{
    padding-right: 30px;
}

.password .fa,#password2 .fa {
    display:none;
    left: 350px;
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
                                           
                                                <input type="text" class="form-control" name="username" style="margin-bottom: 25px; width:400px; " autocomplete="off" required="">
                                            </div>  

                                            <div class="form-group" >
                                                     <label class="control-label " for="password">Password :</label>

                                                     <div class="password">
                                                    
                                                    <i class="fa fa-eye"></i>
                                                    <input type="password" id="passwordfield" class="form-control" style="margin-bottom: 25px; width:400px;" name="password" autocomplete="off" required="">
                                                    </div>
                                           
                                               
                                            </div>

                                            <div class="form-group" >
                                                     <label class="control-label " for="konfirpassword"> Konfirmasi Password :</label>

                                                      <div class="password">

                                                     <i class="fa fa-eye"></i>
                                                    <input type="password" id="konfirpasswordfield" class="form-control"  style="margin-bottom: 25px; width:400px;" name="konfirpassword" autocomplete="off" required="">
    
                                            </div>
                                           
                                                
                                            </div>

                                            <div class="form-group" >
                                                     <label class="control-label " for="hak_akses">Hak Akses :</label>
                                           
                                                <select class="form-control" name="hak_akses" style="margin-bottom: 25px; width:400px;" required="" id="hak_akses">

                                                    <option class="form-control" value="">Pilih: </option>
                                                     <option class="form-control" value="1">ADMINISTRATOR</option>
                                                     <option class="form-control" value="2">SECTION</option>
                                                     <option class="form-control" value="3">INVOICE</option>
                                                     <option class="form-control" value="4">USER PERSONAL</option>

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
 <?php $this->load->view('admin/footer'); ?>

<script>
    $(document).ready(function(){ // Ketika halaman sudah diload dan siap
        $("#hak_akses").click(function(){ // Ketika tombol Tambah Data Form di klik
             // Ambil jumlah data form pada textbox 
             var val = $(this).val();
             if (val == "4") {

              $("#insert-form").append(" <div class='form-group' ><label class='control-label ' for='hak_akses'>Section :</label><select name='section' class='form-control' id='section' required style='margin-bottom: 25px; width:400px;'><option value=''> PILIH : </option><?php foreach ($section as $key) {?> <option class='form-control' value='<?php echo $key->id_section?>'><?php echo $key->nama_section?> </option> <?php }?></select></div>");

          }else{
             $("#insert-form").html("");
          }

             // Ubah value textbox jumlah-form dengan variabel nextform
        });   
        // Buat fungsi untuk mereset form ke semula
       
    });


$("#passwordfield").on("keyup",function(){
    if($(this).val())
        $(".fa-eye").show();
    else
        $(".fa-eye").hide();
    });
$(".fa-eye").mousedown(function(){
                $("#passwordfield").attr('type','text');
            }).mouseup(function(){
                $("#passwordfield").attr('type','password');
            }).mouseout(function(){
                $("#passwordfield").attr('type','password');
            });



$("#konfirpasswordfield").on("keyup",function(){
    if($(this).val())
        $(".fa-eye").show();
    else
        $(".fa-eye").hide();
    });
$(".fa-eye").mousedown(function(){
                $("#konfirpasswordfield").attr('type','text');
            }).mouseup(function(){
                $("#konfirpasswordfield").attr('type','password');
            }).mouseout(function(){
                $("#konfirpasswordfield").attr('type','password');
            });
    </script>