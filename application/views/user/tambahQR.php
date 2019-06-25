
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Form Quotation Request</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="<?php echo site_url()?>/Purch_req">Quotation Request</a></li>
                                <li><span>Insert Quotation Request</span></li>
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
                                     <?php echo form_open('Qr/tambahQR') ?>
                                     <h3 align="center">Insert Quotation Request</h3><br>
                                       
                                               
                                                <div class="form-group">
                                                     <label class="control-label" for="tgl">TANGGAL DAN WAKTU:</label>
                                           
                                               <input type="text" value="<?php  date_default_timezone_set('Asia/Jakarta'); echo date('d-m-Y H:i:s')?>" readonly="" class="form-control" id="tgl" name="tgl" style="margin-bottom: 25px">
                                            </div>


                                            <div class="form-group">
                                                     <label class="control-label " for="item">ITEM :</label>
                                           
                                                <input type="text" class="form-control" name="item" style="margin-bottom: 25px">
                                            </div>

                                            <div class="form-group">
                                                     <label class="control-label " for="tanggal_butuh">DUEDATE PENAWARAN :</label>
                                           
                                                <input type="date" class="form-control" name="tanggal_butuh" style="margin-bottom: 25px">
                                            </div>

                                             <div class="form-group">
                                                     <label class="control-label " for="section">SECTION</label>
                                           <select name="section" class="form-control">
                                            <?php foreach ($section as $key) {?>
                                           <option class="form-control" value="<?php echo $key->nama_section?>"><?php echo $key->nama_section?> </option> <?php }?>
                                           </select>
                                              
                                            </div>

                                            <div class="form-group">
                                                     <label class="control-label " for="pic">PIC:</label>
                                           
                                                <input type="text" class="form-control" name="pic" style="margin-bottom: 25px">
                                            </div>
                                            
                                             <div class="form-group">
                                                     <label class="control-label " for="bahan">MATERIAL/BAHAN:</label>
                                           
                                                <input type="text" class="form-control" name="bahan" style="margin-bottom: 25px">
                                            </div>

                                             <div class="form-group">
                                                     <label class="control-label " for="detail">DESKRIPSI:</label>
                                           
                                                <input type="text" class="form-control" name="detail" style="margin-bottom: 25px">
                                            </div>

                                            <div class="form-group">
                                                     <label class="control-label " for="gambar">ATTACHMENT:</label>
                                                     <i class="fa fa-paperclip"></i>
                                                <input type="file" name="fupload" class="form-control" name="gambar" style="margin-bottom: 25px">
                                            </div>

                                        
   
                                     
        
          
              <div align="right"> <button type="submit" class="btn btn-primary" style="align-self: right">Simpan</button></div>
              <?php echo form_close() ?>
           

    </div>
</div>
</div>
</div>
</div>