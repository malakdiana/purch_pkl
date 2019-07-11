
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Data</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="#">Quotation Request</a></li>
                                <li><span>List Quotation Request /</span></li>
                                <li><span>Detail Quotation</span></li>
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
                                    
                                     <h3 align="center">Detail Quotation</h3><br>
                                       <div class="col-md-12">
                                            <div class="row">
                                               
                                                <div class="col-md-2">
                                                     <label class="control-label " for="group_name">Id Penawaran :</label>
                                                 </div>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" value="<?php echo $list[0]->id_penawaran?>" name="id_penawaran" readonly="" style="margin-bottom: 25px">
                                            </div>
                                                <div class="col-md-2">
                                                     <label class="control-label " for="no_barang" >Tanggal :</label>
                                                 </div>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="tanggal" style="margin-bottom: 25px" value="<?php echo $list[0]->tanggal ?>">
                                            </div>
                                        </div>
                                    
                                </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label class="control-label" for="alamat">Kode Quotation :</label>
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="kode_qr" name="nama_barang" style="margin-bottom: 25px" value="<?php echo $list[0]->kode_qr?>">
                                            </div>
                                            <div class="col-md-2">
                                             <label class="control-label" for="alamat">Item :</label>
                                         </div>
                                         <div class="col-sm-4">
                                            <input type="text" value="<?php echo $list[0]->item?>" class="form-control" id="item" name="item">
                                        </div>

                                        </div>
                                    </div> 
                                     <div class="col-md-12">
                                        <div class="row">

                                            <div class="col-md-2">
                                                <label class="control-label" for="alamat">Tanggal Butuh :</label>
                                            </div>
                                            <div class="col-sm-4">
                                                <?php $tanggal = $list[0]->tanggal_butuh;
                                                  $pecah = explode("-", $tanggal);
                                                 ?>
                                              <input type="date" class="form-control" id="tanggal_butuh" 
                                              value="<?php echo ($pecah[2]."-".$pecah[1]."-".$pecah[0]) ?>" name="tanggal_butuh" style="margin-bottom: 25px">
                                            </div>

                                            <div class="col-md-2">
                                             <label class="control-label" for="attention">Section :</label>
                                         </div>
                                         <div class="col-sm-4">
                                            <input type="text" class="form-control" id="section" name="section" value="<?php echo $list[0]->section?>">
                                        </div>

                                        </div>
                                    </div> 
                                     <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label class="control-label" for="no_hp">PIC :</label>
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="pic" name="pic" style="margin-bottom: 25px" value="<?php echo $list[0]->pic?>">
                                            </div>
                                            <div class="col-md-2">
                                             <label class="control-label" for="tgl_input">Bahan :</label>
                                         </div>
                                         <div class="col-sm-4">
                                            <input type="text" class="form-control" id="bahan" name="bahan" value="<?php echo $list[0]->bahan?>">
                                        </div>

                                        </div>
                                    </div> 
                                     <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-2">
                                             <label class="control-label" for="ppn">Attachment :</label>
                                         </div>
                                         <div class="col-sm-4">
                                          
                                            <?php if(empty($list[0]->gambar)){ ?>
                                                <p><i class="fa fa-paperclip"></i> Tidak ada file </p><?php }else{?> 
                                            <p><i class="fa fa-paperclip"></i><a href="<?php echo base_url()?>assets/file_qr/<?php echo $list[0]->gambar;?>" target="_blank"><?php echo $list[0]->gambar;?></a></p>
                                            <?php } ?>
                                        </div>
                                            <div class="col-md-2">
                                                <label class="control-label" for="terms">Detail :</label>
                                            </div>
                                            <div class="col-sm-4">
                                                <textarea name="detail" class="form-control" placeholder="DESCRIPTION ITEM" rows="10"><?php echo $list[0]->detail?>
                                                    
                                                </textarea>
                                              
                                            </div>
                                            

                                        </div>
                                     
                                    </div>
                                  

                                 
                                     
          
            
           

    </div>
</div>
</div>
</div>
</div>