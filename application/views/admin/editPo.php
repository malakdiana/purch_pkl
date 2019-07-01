
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Data</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="<?php echo site_url()?>/Po">Purchase Order</a></li>
                                <li><span>Edit PO</span></li>
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
                                   <?php echo form_open('Po/editPo/'.$list[0]->id_po) ?>
                                     <h3 align="center">Form Tambah Section</h3><br>

                                            <div class="form-group">
                                            <label class="control-label " for="tgl_po">Tanggal Po :</label>
                                            <input readonly="" type="text" class="form-control" name="tanggal" style="margin-bottom: 25px" value="<?php echo $list[0]->tgl_po?>">
                                            </div>

                                            <div class="form-group">
                                            <label class="control-label " for="no_po">Nomer Po :</label>
                                            <input readonly="" type="text" class="form-control" name="no_po" style="margin-bottom: 25px" value="<?php echo $list[0]->no_po?>">
                                            </div>

                                            <div class="form-group">
                                                     <label class="control-label " for="status">Status :</label>
                                           <select name="status" class="form-control">
                                           <option class="form-control" value="0">-</option>
                                           <option class="form-control" value="1">Cancel</option> 
                                           </select>
                                              
                                            </div>
   
   
   
                                     
        
          
              <div align="right"> <button type="submit" class="btn btn-primary" style="align-self: right">Simpan</button></div>
              <?php echo form_close() ?>
           
           

    </div>
</div>
</div>
</div>
</div>