
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Input Data</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="#">Quotation Request</a></li>
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
                                     <?php echo form_open_multipart('Qr/addQr') ?>
                                     <h3 align="center">Insert Quotation Request</h3><br>
                                       
                                               
                                                                                     
                                               <div class="col-md-12">
                                            <div class="row">
                                               
                                                <div class="col-md-2">
                                                     <label class="control-label" for="tgl">TANGGAL DAN WAKTU:</label>
                                                 </div>
                                                 <div class="col-md-4">
                                           
                                               <input type="text" value="<?php  date_default_timezone_set('Asia/Jakarta'); echo date('d-m-Y H:i:s')?>" readonly="" class="form-control" id="tgl" name="tgl" style="margin-bottom: 25px">
                                            </div>


                                             <div class="col-md-2">
                                                     <label class="control-label " for="item">ITEM :</label>
                                                 </div>
                                                   <div class="col-md-4">
                                           
                                                <input type="text" class="form-control" name="item" style="margin-bottom: 25px" required="" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>

                                           <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-2">
                                                     <label class="control-label " for="tanggal_butuh">DUEDATE PENAWARAN :</label>
                                                 </div>
                                                 <div class="col-md-4">
                                           
                                                <input type="date" class="form-control" name="tanggal_butuh" style="margin-bottom: 25px" required="" autocomplete="off">
                                            </div>


                                               <div class="col-md-2">
                                                     <label class="control-label " for="section">SECTION</label></div>
                                                         <div class="col-md-4">
                                           <input type="text" class="form-control" readonly="" name="section" value="<?php echo $this->session->userdata('logged_in')['username'] ?>"> 
                                              
                                            </div>
                                        </div>
                                    </div>

                                        <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-2">
                                                     <label class="control-label " for="pic">PIC:</label></div>
                                                     <div class="col-md-4"> 
                                           
                                                <input type="text" class="form-control" name="pic" style="margin-bottom: 25px" autocomplete="off">
                                            </div>
                                            
                                             <div class="col-md-2">
                                                     <label class="control-label " for="bahan">MATERIAL/BAHAN:</label></div>
                                             <div class="col-md-4">
                                                <input type="text" class="form-control" name="bahan" style="margin-bottom: 25px" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>

                                          <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-2">
                                                     <label class="control-label " for="detail">DESKRIPSI:</label>
                                           </div>
                                            <div class="col-md-4">
                                                <textarea name="detail" class="form-control" placeholder="DESCRIPTION ITEM" rows="10">
                                                    
                                                </textarea>
                                            </div>

                                           <div class="col-md-2">
                                                     <label class="control-label " for="gambar">ATTACHMENT:</label></div>
                                                      <div class="col-md-4">
                                                    
                                                <input type="file" name="fupload" class="form-control">
                                                <p>format upload file : PNG/JPG/JPEG/PDF/DOC/DOCX/XLSX</p>
                                            </div>
                                        </div>
                                    </div>

                                     
        
          
              <div align="right"> <button type="submit" class="btn btn-success" style="align-self: right"><i class="ti-save"></i>  Simpan</button></div>
              <?php echo form_close() ?>
           

    </div>
</div>
</div>
</div>
</div>