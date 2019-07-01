
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">MY PROFILE</h4>
                            

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
                                     <?php echo form_open('Dashboard/edit_profile') ?>
                                     <h3 align="center">Edit My Profile</h3><br>

                                            <div class="form-group">
                                                     <label class="control-label " for="username" >ID USER:</label>

                                                    <input type="text" class="form-control" style="margin-bottom: 25px" name="username" value="<?php echo $this->session->userdata('logged_in')['id_user']?>">
                                            </div>
                                       
                                               
                                                <div class="form-group">
                                                     <label class="control-label " for="username">USERNAME:</label>

                                                
                                                    <input type="text" class="form-control" style="margin-bottom: 25px" name="username" readonly=""> value="<?php echo $this->session->userdata('logged_in')['username']?>">
    
                                            </div>

                                            
                                                <div class="form-group">
                                                     <label class="control-label " for="username">PASSWORD:</label>

                                                    <input type="text" class="form-control" style="margin-bottom: 25px" name="username" value="<?php echo $this->session->userdata('logged_in')['password']?>">
    
                                            </div>

                                            

                                            
                                     
        
          
              <div align="right"> <button type="submit" class="btn btn-primary" style="align-self: right">Update</button></div>
              <?php echo form_close();
              $this->load->view('admin/footer') ?>
           

    </div>
</div>
</div>
</div>
</div>