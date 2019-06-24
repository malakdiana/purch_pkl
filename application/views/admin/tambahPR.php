
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Form Purchase Request</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="<?php echo site_url()?>/Purch_req">Purchase Request</a></li>
                                <li><span>Insert Purchase Request</span></li>
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
                                     <?php echo form_open('Purch_req/tambahPR') ?>
                                     <h3 align="center">Insert Purchase Request</h3><br>
                                       
                                               
                                                <div class="form-group">
                                                     <label class="control-label" for="tgl">Tanggal:</label>
                                           
                                               <input type="text" value="<?php echo date_default_timezone_set('Asia/Jakarta'); date('Y-m-d')?>" readonly="" class="form-control" id="tgl" name="tgl" style="margin-bottom: 25px">
                                            </div>

                                            <div class="form-group">
                                                     <label class="control-label " for="jam">Jam :</label>
                                           
                                               <input type="text" value="<?php echo date('H:i:s')?>" readonly="" class="form-control" id="jam" name="jam" style="margin-bottom: 25px">
                                            </div>

                                            <div class="form-group">
                                                     <label class="control-label " for="nik">NIK :</label>
                                           
                                                <input type="text" class="form-control" name="nik" style="margin-bottom: 25px">
                                            </div>

                                            <div class="form-group">
                                                     <label class="control-label " for="pic_request">PIC REQUEST :</label>
                                           
                                                <input type="text" class="form-control" name="pic_request" style="margin-bottom: 25px">
                                            </div>

                                             <div class="form-group">
                                                     <label class="control-label " for="section">SECTION</label>
                                           <select name="section" class="form-control">
                                            <?php foreach ($section as $key) {?>
                                           <option class="form-control" value="<?php echo $key->nama_section?>"><?php echo $key->nama_section?> </option> <?php }?>
                                           </select>
                                              
                                            </div>

                                            <div class="form-group">
                                                     <label class="control-label " for="pr_no">NOMER PR:</label>
                                           
                                                <input type="text" class="form-control" name="pr_no" style="margin-bottom: 25px">
                                            </div>
   
   
                                     
        
          
              <div align="right"> <button type="submit" class="btn btn-primary" style="align-self: right">Simpan</button></div>
              <?php echo form_close() ?>
           

    </div>
</div>
</div>
</div>
</div>