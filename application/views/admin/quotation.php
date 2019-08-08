
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Data</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="#">Quotation Request</a></li>
                                <li><span>List Quotation Request</span></li>
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
                                    <div  style="padding-top: 15px;padding-left: 15px">                                
                                <a class="btn btn-flat btn-warning mb-3" href="<?php echo site_url()?>/Qr/export" role="button"><i class="ti-download"></i> Download Data</a>
                                  <a class="btn btn-flat btn-danger mb-3"  onclick="return confirm('Apakah Yakin Untuk Menghapus Semua Data?')" href="<?php echo site_url()?>/Qr/kosongkan" role="button"><i class="ti-trash"></i> Hapus Semua Data</a>
                          
                              </div>
                            <div class="card-body">
                       
                         <?=$this->session->flashdata('deleteQr')?>
                         <?=$this->session->flashdata('tambahItem')?>
                          <?=$this->session->flashdata('editQr')?>
                             <?=$this->session->flashdata('gagalQr')?>
                         <?=$this->session->flashdata('berhasilQr')?>
                             
                               <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table text-center" id="dataTablesss">
                                   <thead class="text-uppercase">
                                            <tr>
                                         
                                                <th>NO</th>
                                                <th>TANGGAL</th>
                                                <th>ITEM</th>
                                                <th>QUOTATION NO</th>
                                                <th>QUOTATION DUEDATE</th>
                                                <th>SECTION</th>
                                                <th>PIC</th>
                                               
                                                <th>STATUS</th>
                                                <th>DETAIL</th>
                                  
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1;  foreach ($Qr as $key) {?>
                                            <tr>
                                    
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $key->tanggal;?></td>
                                                <td><?php echo $key->item;?></td>
                                                <td><?php echo $key->kode_qr;?></td>
                                                <td><?php echo $key->tanggal_butuh;?></td>
                                                <td><?php echo $key->section;?></td>
                                                <td><?php echo $key->pic;?></td>
                                               
                                               <td><?php 
                                                if($key->status == 0){
                                                    if(empty($key->note)){
                                                  ?>

                                                    <div class="form-control" align="center" value="OPEN" name="status" style="margin-bottom: 25px;width: 100px; background-color: #FFA500; color:#FFF" > OPEN </div>
                                                     <?php
                                                      }else{?>
                                                          <div class="form-control" align="center" value="OPEN" name="status" style="margin-bottom: 25px;width: 100px; background-color: #FFA500; color:#FFF" > OPEN<br> <font size="1"> on Progresss</font> </div>
                                                         <?php }}
                                                     else if ($key->status == 1){ ?>  
                                                        <div class="form-control" align="center" value="CLOSED" name="status" style="margin-bottom: 25px;width: 100px; background-color: #CD853F; color:#FFF" > CLOSED </div>
                                                        <?php }
                                                        else if ($key->status == 3){ ?>  
                                                        <div class="form-control" align="center" value="WAITING" name="status" style="margin-bottom: 25px;width: 100px; background-color: #FF4500; color:#FFF" > WAITING </div>
                                                        <?php }
                                                     else { ?>  
                                                           <div class="form-control" align="center" value="CANCEL" name="status" style="margin-bottom: 25px;width: 100px; background-color: #BC8F8F; color:#FFF" > CANCEL </div>
                                                        <?php }

                                                        ?>


                                                </td>

                                                
   <td>
<?php 
                                                  $status_chat=0;
                                                  foreach ($icon as $data) {
                                                    if($data->id_penawaran == $key->id_penawaran){
                                                      $status_chat = 1;
                                                    }
                                                  }

                                                  ?>
<?php if($key->status ==  0 || $key->status == 3){?>
                                             
                                                <div class="btn-group mb-xl-3" role="group" aria-label="Basic example">
                                                      <a href="" onclick="modalDetail('<?php echo $key->id_penawaran?>','<?php  echo $key->note;?>' )"  data-toggle="modal" data-target="#myModalDetail"><button type="button" class="btn btn-secondary" style="width:85px; height:45px;"><font color="white"><i class="fa fa-book"></i> Note </font></button></a>
                                     
                                      <a href="<?php echo site_url()?>/Qr/detailQuotation/<?php echo $key->id_penawaran?>" 
                                        > 
                                         <?php if ($status_chat==0){ ?>
                                                    <button type="button" class="btn btn-info" style="width:80px; height:45px;"><font color="white"><i class="fa fa-th-list"></i> Detail</font></button></a>
                                                  <?php   }else{ ?>
                                                      <button type="button" class="btn btn-info" style="width:80px; height:45px;"><font color="#f5f542"><i class="fa fa-commenting-o fa-lg"></i></font><font color="white"> Detail</font></button></a>
                                                    <?php   } ?>

                                     <a href="<?php echo site_url()?>/Qr/tambahVendor/<?php echo $key->id_penawaran?>"><button type="button" class="btn btn-primary" style="width:85px; height:45px;"><font color="white"><i class="fa fa-book"></i> Vendor </font></button></a>
                                    
                                    <a href="<?php echo site_url()?>/Qr/editQr/<?php echo $key->id_penawaran?>"> <button type="button" class="btn btn-success" style="width:90px; height:45px;">
                                      <font color="white"><i class="fa fa-pencil"></i> Edit QR </font></button></a>
                                  
                                </div>
                                <?php } else{?>
                                  <div class="btn-group mb-xl-3" role="group" aria-label="Basic example">
                                      
                                      <a href="<?php echo site_url()?>/Qr/detailQuotation/<?php echo $key->id_penawaran?>" 
                                        >
                                       <?php if ($status_chat==0){ ?>
                                                    <button type="button" class="btn btn-info" style="width:80px; height:45px;"><font color="white"><i class="fa fa-th-list"></i> Detail</font></button></a>
                                                  <?php   }else{ ?>
                                                      <button type="button" class="btn btn-info" style="width:80px; height:45px;"><font color="#f5f542"><i class="fa fa-commenting-o fa-lg"></i></font><font color="white"> Detail</font></button></a>
                                                    <?php   } ?>

                                    <a href="<?php echo site_url()?>/Qr/tambahVendor/<?php echo $key->id_penawaran?>"> <button type="button" class="btn btn-primary" style="width:85px; height:45px;"><font color="white"><i class="fa fa-book"></i> Vendor </font></button></a><?php } ?>

                                               </td>

                                               
                                            </tr>
                                            <?php $no++;}?>
                                       </tbody>
                                    </table> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

          <!-- main content area end -->
        <!-- footer area start-->
 


       <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModalDetail" class="modal fade-in" >
        <div class="modal-dialog">
            <div class="modal-content" style="width: 800px; margin-left: -100px;padding: 20px" >
                <div class="modal-header">
                   
                    <h4 class="modal-title">Tambah Catatan</h4>
                     <button align="right" type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <?php  echo form_open('Qr/tambahCatatan'); ?>
                <div class="modal-body">
                  <input type="" name="id" id="id" hidden="">
                <textarea class="form-control" cols="40" rows="12" name="note" id="note">  
                </textarea>
            </div>
            <p align="right"> <button class="btn btn-warning" >Simpan</button></p>
            <?php   echo form_close(); ?>
        </div>
    </div>
</div>
        
    <!-- offset area end -->
    <!-- jquery latest version -->
    <?php $this->load->view('admin/footer'); ?>

    <!-- Start datatable js -->
     <script type="text/javascript" src="<?php echo base_url()?>assets/advanced-datatable/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTables/js/jquery.dataTables.js"></script>
 

     <script type="text/javascript">
 
       var oTable = $('#dataTablesss').dataTable({
   
        // "aaSorting": [
        //   [7,'desc'],
        //   [0, 'desc']
        // ]
      });
         function modalDetail(id,text){
        document.getElementById('id').value = id;
        document.getElementById('note').value = text;
       
      
    }

    
  </script>
</body>

</html>
