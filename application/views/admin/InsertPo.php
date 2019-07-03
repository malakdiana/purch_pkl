
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Data</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="<?php echo site_url()?>/Po">Purchase Request</a></li>
                                <li><span>INSERT PO</span></li>
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
                                   <?php echo form_open('Po/editPo/') ?>
                                     <h3 align="center">Form Tambah Section</h3><br>


                                            <div class="form-group">
                                            <label class="control-label " for="pr_no">Nomer Pr :</label>
                                            <input readonly="" type="text" class="form-control" name="pr_no" style="margin-bottom: 25px" value="<?php echo $list[0]->pr_no?>">
                                            </div>

                                            
                                        
                                            <div class="form-group">
                                            <label class="control-label " for="no_po">Item Barang :</label>
                                            <input readonly="" type="text" class="form-control" name="item_barang" style="margin-bottom: 25px" value="<?php echo $list[0]->item_barang?>">
                                            </div>


                                            <div class="form-group">
                                            <label class="control-label " for="no_po">Qty :</label>
                                            <input readonly="" type="text" class="form-control" name="qty" style="margin-bottom: 25px" value="<?php echo $list[0]->qty?>">
                                            </div>


                                            <div class="form-group">
                                            <label class="control-label " for="no_po">To Nomer Purchase Order :</label>

                                             <select name="" id="" class="form-control choosen">
                                              
                                                    <option value="--"></option>
                                               
                                            </select>
                                             
                                        

                                            <div class="form-group">
                                            <label class="control-label " for="no_po">Qty To Po :</label>
                                            <input type="text" class="form-control" name="no_po" style="margin-bottom: 25px" >
                                            </div>
   
                                     
        
          
              <div align="right"> <button type="submit" class="btn btn-primary" style="align-self: right">Simpan</button></div>
              <?php echo form_close() ?>
           
           

    </div>
</div>
</div>
</div>
</div>