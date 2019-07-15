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
                            <h4 class="page-title pull-left"><i class="fa fa-user"></i> MY PROFILE</h4>
                            

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
                                <?=$this->session->flashdata('edit_profile')?>
                                     <?php echo form_open('Dashboard/edit_profile') ?>
                                      <div class="col-4 mt-6">

                                            <div class="form-group">
                                                     

                                                    <input type="text" class="form-control" style="margin-bottom: 25px; width:200px; name="id_user" readonly="" value="<?php echo $this->session->userdata('logged_in')['id_user']?>" hidden="">
                                            </div>
                                       
                                               
                                                <div class="form-group">
                                                     <label class="control-label " for="username">USERNAME:</label>

                                                
                                                    <input type="text" class="form-control" style="margin-bottom: 25px" name="username" value="<?php echo $this->session->userdata('logged_in')['username']?>" readonly="">
    
                                            </div>


                                            <div class="form-group">
                                             <label class="control-label " for="password">PASSWORD:</label>
                                                <div class="password">
                                                    
                                                    <i class="fa fa-eye"></i>
                                                    <input type="password" id="passwordfield" class="form-control" style="margin-bottom: 25px" name="password"  autocomplete="">
                                                    </div>
                                                    
    
                                            </div>

                                            <div class="form-group">
                                            <label class="control-label " for="konfirpassword">KONFIRMASI PASSWORD:</label>

                                                     <div class="password">

                                                     <i class="fa fa-eye"></i>
                                                    <input type="password" id="konfirpasswordfield" class="form-control" style="margin-bottom: 25px" name="konfirpassword"  autocomplete="">
    
                                            </div>
                                            </div>
                                            

                                            
                                     
        
          
              <div align="left"> <button type="submit" class="btn btn-primary" style="align-self: left; width:100px;">Update</button></div>
              <?php echo form_close();
              $this->load->view('admin/footer') ?>
           

    </div>
</div>
</div>
</div>
</div>

<script type="text/javascript">

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