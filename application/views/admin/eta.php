
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
                        <?=$this->session->flashdata('editSupplier')?>
                         <?=$this->session->flashdata('deleteSupplier')?>
                         <?=$this->session->flashdata('tambahSupplier')?>
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
                                                <button class="btn btn-success" style="width:115px; height:40px;"><i class="fa fa-check"></i> Konfirm</button><br>
                                                <button class="btn btn-info" style="width:115px; height:40px;"><i class="fa fa-check"></i> Invoice</button><br>
                                                <button class="btn btn-warning" style="width:115px; height:40px;"><i class="fa fa-plus"></i> Add Remarks</button>
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
   

        
    <!-- offset area end -->
    <!-- jquery latest version -->
    <?php $this->load->view('admin/footer'); ?>

    <!-- Start datatable js -->
     <script type="text/javascript" src="<?php echo base_url()?>assets/advanced-datatable/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTables/js/jquery.dataTables.js"></script>
 
    <!-- others plugins -->
