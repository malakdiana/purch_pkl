
 <link rel="stylesheet" href="<?php echo base_url()?>assets/css/chat.css">
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Data</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="#">Quotation Request</a></li>
                                 <li><span>List Quotation /</span></li>
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
                        
                          <div  style="padding-top: 15px;padding-left: 15px">
                                
                                 <a class="btn btn-flat btn-primary mb-3" href="<?php echo site_url()?>/Qr" role="button"><i class="fa fa-arrow-left"></i> Back</a>
                            </div>
                           
                                    <div class="row">   
                                    
                                       <div class="col-md-6">
                                          <div class="card">
                                                 <div class="card-body">
                                                <h3 align="left">Detail Quotation</h3><hr><br>
                                               <div class="row">    
                                                <div class="col-md-3">
                                                     <label class="control-label " for="no_barang" >Tanggal :</label>
                                                 </div>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="tanggal" style="margin-bottom: 25px" readonly="" value="<?php echo $list[0]->tanggal ?>">
                                            </div>
                                        </div>
                                         <div class="row">   
                                      
                                            <div class="col-md-3">
                                                <label class="control-label" for="alamat">Kode Quotation :</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="kode_qr" name="nama_barang" style="margin-bottom: 25px" readonly="" value="<?php echo $list[0]->kode_qr?>">
                                            </div>
                                        </div>
                                         <div class="row">   
                                            <div class="col-md-3">
                                             <label class="control-label" for="alamat">Item :</label>
                                         </div>
                                         <div class="col-sm-8">
                                            <input type="text" value="<?php echo $list[0]->item?>" class="form-control" id="item" name="item" readonly="" style="margin-bottom: 25px">
                                        </div>
                                    </div>
                                     <div class="row">   
                                            <div class="col-md-3">
                                                <label class="control-label" for="alamat">Tanggal Butuh :</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <?php $tanggal = $list[0]->tanggal_butuh;
                                                  $pecah = explode("-", $tanggal);
                                                 ?>
                                              <input type="date" class="form-control" id="tanggal_butuh" 
                                              value="<?php echo ($pecah[2]."-".$pecah[1]."-".$pecah[0]) ?>" name="tanggal_butuh" style="margin-bottom: 25px" readonly="">
                                            </div>
                                        </div>
                                         <div class="row">   

                                            <div class="col-md-3">
                                             <label class="control-label" for="attention">Section :</label>
                                         </div>
                                         <div class="col-sm-8">
                                            <input type="text" class="form-control" id="section" name="section" value="<?php echo $list[0]->section?>" readonly="" style="margin-bottom: 25px">
                                        </div>
                                    </div>
                                     <div class="row">   

                                     
                                            <div class="col-md-3">
                                                <label class="control-label" for="no_hp">PIC :</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="pic" name="pic" style="margin-bottom: 25px" value="<?php echo $list[0]->pic?>" readonly="">
                                            </div>
                                        </div>
                                         <div class="row">   
                                            <div class="col-md-3">
                                             <label class="control-label" for="tgl_input">Bahan :</label>
                                         </div>
                                         <div class="col-sm-8">
                                            <input type="text" class="form-control" id="bahan" name="bahan" value="<?php echo $list[0]->bahan?>" readonly="" style="margin-bottom: 25px">
                                        </div>
                                    </div>

                                    <div class="row">   
                                            <div class="col-md-3">
                                             <label class="control-label" for="ppn">Attachment :</label>
                                         </div>
                                         <div class="col-sm-8">
                                          
                                            <?php if(empty($list[0]->gambar)){ ?>
                                                <p><i class="fa fa-paperclip"></i> Tidak ada file </p><?php }else{?> 
                                            <p><i class="fa fa-paperclip"></i><a href="<?php echo base_url()?>assets/file_qr/<?php echo $list[0]->gambar;?>" target="_blank"><?php echo $list[0]->gambar;?></a></p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                     <div class="row">   
                                            <div class="col-md-3">
                                                <label class="control-label" for="terms" style="margin-top: 25px">Detail :</label>
                                            </div>
                                            <div class="col-sm-8" style="margin-top: 25px">
                                                <textarea name="detail" class="form-control" placeholder="DESCRIPTION ITEM"  readonly="" rows="10"><?php echo $list[0]->detail?> 
                                                    
                                                </textarea>
                                        </div>
                                    </div>
                                     
                                    </div>
                                  

                                 
                                     
          
            
           

    </div>
</div>
<div class="col-md-6">
                                          <div class="card">
                                                 <div class="card-body">
                                                <h3 align="left">Direct Chat</h3><hr><br>
                                               <div class="row"> 
                                                <div class="col-md-12">
                                                 <div class="panel panel-primary">
                <div class="panel-heading" id="accordion">
                    <span class="fa fa-comments"></span> Chat
                    <div class="btn-group pull-right">
                        <a type="button" class="btn btn-default btn-xs" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            <span class="fa fa-toggle-down"></span>
                        </a>
                    </div>
                </div>
            <div class="panel-collapse" id="collapseOne">
                <div class="panel-body">
                    <ul class="chat">
                        <?php foreach ($komen as $key ) { 
                            if($key->user != $this->session->userdata('logged_in')['username']){
                            ?>
                        <li class="left clearfix"><span class="chat-img pull-left">
                            <img src="http://placehold.it/50/55C1E7/fff&text=A" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font"><?php echo $key->user; ?></strong> <small class="pull-right text-muted">
                                        <span class="fa fa-history"></span><?php echo $key->tanggal; ?></small>
                                </div>
                                <p>
                                   <?php echo $key->komentar; ?>
                                </p>
                            </div>
                        </li>
                    <?php }else{ ?>
                        <li class="right clearfix"><span class="chat-img pull-right">
                            <img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <small class=" text-muted"><span class="fa fa-history"></span></span><?php echo $key->tanggal; ?></small>
                                    <strong class="pull-right primary-font"><?php echo $key->user; ?></strong>
                                </div>
                                <p>
                                   <?php echo $key->komentar; ?>
                                </p>
                            </div>
                        </li>
                      <?php }} ?>
                    </ul>
                </div>
                <div class="panel-footer">
                     <?php echo form_open('Qr/komen/'.$this->uri->segment('3')); ?>
                    <div class="input-group">
                       
                        <input id="btn-input" name="komentar" type="text" class="form-control input-sm" placeholder="Type your message here..." autocomplete="off" />
                        <span class="input-group-btn">
                            <button class="btn btn-warning btn-sm" id="btn-chat">
                                Send</button>
                        
                        <?php echo form_close();?>
                         <a href="<?php echo site_url()?>/Qr/endChat/<?php echo $this->uri->segment('3'); ?>" class="btn btn-danger btn-sm" id="btn-chatt">
                                End Chat</a>
                           </span>
                    </div>
                </div>
            </div>
            </div>   
                                               </div>
                                           </div>
                                       </div>
                                   </div>


</div>
</div>
</div>
</div>