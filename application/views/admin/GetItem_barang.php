<!-- <style>
.select2-dropdown {top: 22px !important; left: 8px !important;}
</style> -->
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Data</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="#">Purchase Request</a></li>
                                <li><span>List purchase request /</span></li>
                                <li><span>Detail Item Barang</span></li>
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

                        <?php
                         if($status_fa == 0){?>
                         <div  style="padding-top: 15px;padding-left: 15px">
                         <button type="button" class="btn btn-success"><a href="<?php echo site_url()?>/Purch_req/Verifyitem/<?php echo $id?>"><font color="white"><i class="fa fa-check"></i> Verify</font></button></a>

                          <?php }
                            
                            

                          ?>

                            <div class="card-body">
                                 <?=$this->session->flashdata('editItem')?>
                                   <?=$this->session->flashdata('hapusItem')?>
         
                                <div>
                                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped" id="dataTablesss">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                        
                                                <th>NO</th>
                                                <th>ITEM BARANG</th>
                                                <th>QTY</th>
                                                <th>NO PO</th>
                                                <th>QTY TO PO</th>
                                                <th>HARGA</th>
                                                <th >ACTION</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $cc=0;
                                        $no =1; foreach ($Purch_req as $key) {  ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $key->item_barang;?></td>
                                                <td><?php echo $key->qty?></td>
                                                <td><?php echo $key->no_po;?></td>
                                                <td><?php echo $key->qtybay;?></td>
                                                <td><?php echo $key->harga;?></td>                                            
                                                

      

                                               <?php 
                                                 if(empty($detail)){ ?>
                                                   <td>
                                                  <div class="btn-group mb-xl-3" role="group" >
                                                       <button type="button" class="btn btn-primary" style="width:80px; height:50px;"><a href="javascript:void(0);" onclick="modalDetail('<?php echo $key->id_item?>', '<?php echo $key->item_barang?>', '<?php echo $key->qty?>')"  data-toggle="modal" data-target="#myModalEdit"><font color="white"><i class="fa fa-pencil"></i> Edit</font></a></button>
                                                
                                                <button type="button" class="btn btn-danger" style="width:80px; height:50px;"><a href="<?php echo site_url()?>/Purch_req/hapusItem/<?php echo $id?>/<?php echo $key->id_item?>/<?php echo $status_fa?> " onclick="return confirm('Apakah Yakin Untuk Menghapus?')"><font color="white"><i class="fa fa-trash-o"></i> Hapus</font></a></button>

                                                  <button type="button" class="btn btn-success" style="width:115px; height:50px;"><a href="<?php echo site_url()?>/Purch_req/InsertPo/<?php echo $key->id_item ?>"><font color="white"><i class="fa fa-arrow-right"></i> Insert to Po</font></a></button></div></td></tr>
                                                   
                                                  <?php } else{
                                                    foreach($detail as $data){
                                                          if($key->id_item == $data->id_item){
                                                             if($key->qty != $data->jumlah){?>
                                                               <td>
                                                  <div class="btn-group mb-xl-3" role="group" >
                                                       <button type="button" class="btn btn-primary" style="width:80px; height:50px;"><a href="javascript:void(0);" onclick="modalDetail('<?php echo $key->id_item?>', '<?php echo $key->item_barang?>', '<?php echo $key->qty?>')"  data-toggle="modal" data-target="#myModalEdit"><font color="white"><i class="fa fa-pencil"></i> Edit</font></a></button>
                                                
                                                <button type="button" class="btn btn-danger" style="width:80px; height:50px;"><a href="<?php echo site_url()?>/Purch_req/hapusItem/<?php echo $id?>/<?php echo $key->id_item?>/<?php echo $status_fa?> " onclick="return confirm('Apakah Yakin Untuk Menghapus?')"><font color="white"><i class="fa fa-trash-o"></i> Hapus</font></a></button>

                                                  <button type="button" class="btn btn-success" style="width:115px; height:50px;"><a href="<?php echo site_url()?>/Purch_req/InsertPo/<?php echo $key->id_item ?>"><font color="white"><i class="fa fa-arrow-right"></i> Insert to Po</font></a></button></div></td></tr>

                                                   <?php break;}else{?>
                                                     <td><button type="button" class="btn btn-success"><a href=""><font color="white"><i class="fa fa-check"></i> Done</font></a></button></td></tr><?php


                                             break;}}else{
                                              $cc=1;


                                        }    }}

if($cc==1){?><td>
                                                  <div class="btn-group mb-xl-3" role="group" >
                                                       <button type="button" class="btn btn-primary" style="width:80px; height:50px;"><a href="javascript:void(0);" onclick="modalDetail('<?php echo $key->id_item?>', '<?php echo $key->item_barang?>', '<?php echo $key->qty?>')"  data-toggle="modal" data-target="#myModalEdit"><font color="white"><i class="fa fa-pencil"></i> Edit</font></a></button>
                                                
                                                <button type="button" class="btn btn-danger" style="width:80px; height:50px;"><a href="<?php echo site_url()?>/Purch_req/hapusItem/<?php echo $id?>/<?php echo $key->id_item?>/<?php echo $status_fa?> " onclick="return confirm('Apakah Yakin Untuk Menghapus?')"><font color="white"><i class="fa fa-trash-o"></i> Hapus</font></a></button>

                                                  <button type="button" class="btn btn-success" style="width:115px; height:50px;"><a href="<?php echo site_url()?>/Purch_req/InsertPo/<?php echo $key->id_item ?>"><font color="white"><i class="fa fa-arrow-right"></i> Insert to Po</font></a></button></div></td></tr>
                                       <?php } $no++;} 
                                        ?>




                                             
                                         
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
 


      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModalEdit" class="modal fade-in" >
        <div class="modal-dialog">
            <div class="modal-content" style="width: 800px; margin-left: -100px;padding: 20px" >
                <div class="modal-header">
                    <h4 class="modal-title">Info Barang</h4>
                </div>
          <?php echo form_open_multipart('Purch_req/updateItem'); ?>
                <?php echo validation_errors(); ?>
                     <div class="form-group">
                        <input type="text" name="id_item"  id="id_item" hidden="">
                        <input type="text" name="id" id="id" value="<?php echo $id?>" hidden="">
                        <label for="">Item Barang</label>
                        <select name="item_barang" id="item_barang" class="form-control choosen">
                            <?php foreach ($barang as $key) {?>
                                <option value="<?php echo $key->nama_barang?>"><?php echo $key->nama_barang?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">QTY</label>
                        <input type="text" class="form-control" name="qty" id="qty" value="" >
                    </div>
               
               
            <div align="right" style="margin-bottom: 20px; margin-right: 30px">
          <button class="btn-info" type="submit">Update</button>
            <a href=""><button class="btn-warning" data-dismiss="modal">Batal</button></a>
        </div>
    
        <?php echo form_close(); ?>
        </div>
    </div>
        
    <!-- offset area end -->
    <!-- jquery latest version -->
    <?php $this->load->view('admin/footer'); ?>

    <!-- Start datatable js -->
     <script type="text/javascript" src="<?php echo base_url()?>assets/advanced-datatable/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTables/js/jquery.dataTables.js"></script>
 
    <!-- others plugins -->
<script type="text/javascript">
    function modalDetail(id_item,item_barang,qty){
        document.getElementById('id_item').value = id_item;
        document.getElementById('item_barang').value = item_barang;
        document.getElementById('qty').value = qty;

      
    }
  </script>
 

     <script type="text/javascript">
    /* Formating function for row details */
    

      /*
       * Initialse DataTables, with no sorting on the 'details' column
       */
       var oTable = $('#dataTablesss').dataTable({
        "aoColumnDefs": [{
          "bSortable": true,
          "aTargets": [0]
        }],
        "aaSorting": [
          [0, 'asc']
        ]
      });

      /* Add event listener for opening and closing details
       * Note that the indicator for showing which row is open is not controlled by DataTables,
       * rather it is done here
       */
    
  </script>
  <script src="<?php echo base_url()?>assets/select2.min.js"></script>
<!-- <script>
$("#item_barang").select2( {
    placeholder: "Select Item",
    allowClear: true
    } );
</script> -->


</body>

</html>
