
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Master Data</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="<?php echo site_url()?>/Login">Login</a></li>
                                <li><span>Tambah Login</span></li>
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
                                     <?php echo form_open('Login/tambahLogin') ?>
                                     <h3 align="center">Form Tambah Login</h3><br>
                                       
                                               
                                                

                                            <div class="form-group">
                                                     <label class="control-label " for="id_section">ID SECTION :</label>
                                           
                                                <input type="text" class="form-control" name="id_section" style="margin-bottom: 25px">
                                            </div>

                                            <div class="form-group">
                                                     <label class="control-label " for="username">Username:</label>
                                           
                                                <input type="text" class="form-control" name="username" style="margin-bottom: 25px">
                                            </div>

                                            <div class="form-group">
                                                     <label class="control-label " for="password">Password :</label>
                                           
                                                <input type="text" class="form-control" name="password" style="margin-bottom: 25px">
                                            </div>

                                            <div class="form-group">
                                                     <label class="control-label " for="hak_akses">Hak Akses :</label>
                                           
                                                <input type="text" class="form-control" name="hak_akses" style="margin-bottom: 25px">
                                            </div>
   
   
                                     
        
          
              <div align="right"> <button type="submit" class="btn btn-primary" style="align-self: right">Simpan</button></div>
              <?php echo form_close() ?>
           

    </div>
</div>
</div>
</div>
</div>