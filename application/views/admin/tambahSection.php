
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Master Data</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="#">Section</a></li>
                                <li><span>Tambah Section</span></li>
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
                                     <?php echo form_open('Section/tambahSection') ?>
                                     <h3 align="center">Form Tambah Section</h3><br>
                                       
                                               
                                            <div class="form-group">
                                                     <label class="control-label " for="nama_section">Nama Section :</label>
                                           
                                                <input type="text" class="form-control" name="nama_section" style="margin-bottom: 25px" required="">
                                            </div>

                                           <!--  <div class="form-group">
                                                     <label class="control-label " for="dept">Kode Dept :</label>
                                           <select name="dept" class="form-control">
                                            <?php foreach ($listDep as $key) {?>
                                           <option class="form-control" value="<?php echo $key->no?>"><?php echo $key->group_name?> </option> <?php }?>
                                           </select>
                                              
                                            </div> -->
   
   
                                     
        
          
              <div align="right"> <button type="submit" class="btn btn-success" style="align-self: right"><i class="ti-save"></i> Simpan</button></div>
              <?php echo form_close() ?>
           

    </div>
</div>
</div>
</div>
</div>