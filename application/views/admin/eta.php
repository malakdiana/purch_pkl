
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Data</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">ETA</a></li>
                                <li><span>Data ETA</span></li>
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
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-9">
                                            
                                        </div>
                                        <div class="col-md-2">
                                            <?php 
                                                $tgl = mktime(0, 0, 0, date("m"), date("d")+1, date("Y"));        $tgl =  date("Y-m-d", $tgl);
                                             ?>
                                           <input type="date" name="search"  style="width: 200px" class="form-control" value="<?php echo $tgl ?>">
                                       </div>
                                       <div class="col-md-1">
                                <button class="btn btn-default"><i class="fa fa-search"></i></button>
                                    </div>
                                    
                                </div>
                             
                                <br>
                                <div>
                                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped" id="dataTablesss">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                            
                                                <th>NO</th>
                                                <th>NAMA SUPPLIER</th>
                                                 <th>TGL PO</th>
                                                <th>NO PO</th>
                                                <th >ETA</th>
                                                <th >FRANCO</th>
                                                <th >DEP</th>
                                                <th >PR NO</th>
                                                <th >ITEM</th>
                                                <th >UNIT</th>
                                                <th >QTY</th>
                                                <th>Konfirm</th>
                                                <th>invoice</th>
                                                <th>Remarks</th>
                                                <th>Action</th>



                                              
                                           
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1;  foreach ($eta as $key) {?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $key->supplier;?></td>
                                                <td><?php echo $key->tgl_po;?></td>
                                                <td><?php echo $key->no_po;?></td>
                                                <td><?php echo $key->eta;?></td>
                                                <td><?php echo $key->franco;?></td>
                                                <td><?php echo $key->section;?></td>
                                                <td><?php echo $key->pr_no;?></td>
                                                <td><?php echo $key->item;?></td>
                                                <td><?php echo $key->unit_name;?></td>
                                                <td><?php echo $key->qty;?></td>

                                                 <td><?php 
                                                if($key->konfirmasi == 1){?>
                                                     <img style="width: 40px;height: 50px" src="<?php echo base_url()?>assets/images/icon/checkblue.png">
                                                     <?php }
                                                     else { ?>  
                                                        <img style="width: 40px;height: 50px" src="<?php echo base_url()?>assets/images/icon/minusblue.png">
                                                        <?php }?>
                                                </td>

                                                <td><?php 
                                                if($key->invoice == 1){?>
                                                     <img style="width: 40px;height: 50px" src="<?php echo base_url()?>assets/images/icon/checkblue.png">
                                                     <?php }
                                                     else { ?>  
                                                        <img style="width: 40px;height: 50px" src="<?php echo base_url()?>assets/images/icon/minusblue.png">
                                                        <?php }?>
                                                </td>

                                                <td><?php echo $key->remarks;?></td>


                                                <td>
                                                <a href="<?php echo site_url()?>/Eta/konfirmasi/<?php echo $key->id ?>" class="btn btn-success" style="width:116px; height:40px;"><i class="fa fa-check"></i> Konfirm</a><br>
                                                <a href="<?php echo site_url()?>/Eta/invoice/<?php echo $key->id ?>" class="btn btn-info" style="width:116px; height:40px;"><i class="fa fa-check"></i> Invoice</a><br>
                                                <a class="btn btn-warning" style="width:116px; height:40px;" data-toggle="modal" data-target="#myModalEdit"><i class="fa fa-plus"></i> Add Remarks</a>
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
         <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModalEdit" class="modal fade-in" >
        <div class="modal-dialog">
            <div class="modal-content" style="width: 600px; margin-left: -80px;padding: 20px" >
                <div class="modal-header">

                    <h4 class="modal-title">Remarks</h4>
                 <button align="right" type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <?php echo form_open('eta/addRemarks/'); ?>
                  <div class="modal-body">
                     <div class="form-group">
                        <label for="">Note</label>
                       <textarea name="remarks" rows="5" cols="40" class="form-control"></textarea>

                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Delay</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal" value="" >

                    </div>
                      <p align="right"><button class="btn btn-info" type="submit">save</button></p>
<?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
        
   

        
    <!-- offset area end -->
    <!-- jquery latest version -->
    <?php $this->load->view('admin/footer'); ?>

    <!-- Start datatable js -->
     <script type="text/javascript" src="<?php echo base_url()?>assets/advanced-datatable/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTables/js/jquery.dataTables.js"></script>
 
    <!-- others plugins -->
