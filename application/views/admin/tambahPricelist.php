
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Master Data</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="<?php echo site_url()?>/Pricelist">Pricelist</a></li>
                                <li><span>Tambah Pricelist</span></li>
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
                                     <?php echo form_open('Pricelist/tambahPricelist') ?>
                                     <h3 align="center">Form Tambah Pricelist</h3><br>
                                       <div class="col-md-12">
                                            <div class="row">
                                               
                                                <div class="col-md-2">
                                                     <label class="control-label " for="group_name">Group Name :</label>
                                                 </div>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="group_name" style="margin-bottom: 25px">
                                            </div>
                                                <div class="col-md-2">
                                                     <label class="control-label " for="no_barang">No Barang :</label>
                                                 </div>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="no_barang" style="margin-bottom: 25px">
                                            </div>
                                        </div>
                                    
                                </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label class="control-label" for="alamat">Nama Barang :</label>
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="nama_barang" name="nama_barang" style="margin-bottom: 25px">
                                            </div>
                                            <div class="col-md-2">
                                             <label class="control-label" for="alamat">Spec Barang :</label>
                                         </div>
                                         <div class="col-sm-4">
                                            <input type="text" class="form-control" id="spec_barang" name="spec_barang">
                                        </div>

                                        </div>
                                    </div> 
                                     <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label class="control-label" for="alamat">Unit :</label>
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="unit" name="unit" style="margin-bottom: 25px">
                                            </div>
                                            <div class="col-md-2">
                                             <label class="control-label" for="attention">Mata Uang :</label>
                                         </div>
                                         <div class="col-sm-4">
                                            <input type="text" class="form-control" id="mata_uang" name="mata_uang">
                                        </div>

                                        </div>
                                    </div> 
                                     <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label class="control-label" for="no_hp">Price :</label>
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="price" name="price" style="margin-bottom: 25px">
                                            </div>
                                            <div class="col-md-2">
                                             <label class="control-label" for="tgl_input">Nama Supplier :</label>
                                         </div>
                                         <div class="col-sm-4">
                                            <input type="text" class="form-control" id="nama_supplier" name="nama_supplier">
                                        </div>

                                        </div>
                                    </div> 
                                     <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label class="control-label" for="terms">Quotation No :</label>
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="quotation_no" name="quotation_no" style="margin-bottom: 25px">
                                            </div>
                                            <div class="col-md-2">
                                             <label class="control-label" for="ppn">Tgl Input:</label>
                                         </div>
                                         <div class="col-sm-4">
                                            <input type="text" class="form-control" id="tgl_input" name="tgl_input">
                                        </div>

                                        </div>
                                    </div>
                                     <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label class="control-label" for="supply">LB date :</label>
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="lbdate" name="lbdate" style="margin-bottom: 25px">
                                            </div>
                                            <div class="col-md-2">
                                             <label class="control-label" for="start">Remarks :</label>
                                         </div>
                                         <div class="col-sm-4">
                                            <input type="text" class="form-control" id="remarks" name="remarks">
                                        </div>

                                        </div>
                                    </div>  
                                     
          
              <div align="right"> <button type="submit" class="btn btn-primary" style="align-self: right">Simpan</button></div>
              <?php echo form_close() ?>
           

    </div>
</div>
</div>
</div>
</div>