
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
                                     
                                     

                                            <div class="form-group">
                                                     

                                                    <input type="text" class="form-control" style="margin-bottom: 25px" name="id_user" readonly="" value="<?php echo $this->session->userdata('logged_in')['id_user']?>" hidden="">
                                            </div>
                                       
                                               
                                                <div class="form-group">
                                                     <label class="control-label " for="username">USERNAME:</label>

                                                
                                                    <input type="text" class="form-control" style="margin-bottom: 25px" name="username" value="<?php echo $this->session->userdata('logged_in')['username']?>" readonly="">
    
                                            </div>

                                            
                                                <div class="form-group">
                                                     <label class="control-label " for="konfirpassword">PASSWORD:</label>

                                                    <input type="text" class="form-control" style="margin-bottom: 25px" name="konfirpassword" value="">
    
                                            </div>

                                            <div class="form-group">
                                                     <label class="control-label " for="password">KONFIRMASI PASSWORD:</label>

                                                    <input type="text" class="form-control" style="margin-bottom: 25px" name="password" value="">
    
                                            </div>
                                            

                                            
                                     
        
          
              <div align="left"> <button type="submit" class="btn btn-primary" style="align-self: left; width:100px;">Update</button></div>
              <?php echo form_close();
              $this->load->view('admin/footer') ?>
           

    </div>
</div>
</div>
</div>
</div>