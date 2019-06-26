
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Master Data</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="<?php echo site_url()?>/Pricelist">Pricelist</a></li>
                                <li><span>Data Pricelist</span></li>
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
                                <a class="btn btn-flat btn-primary mb-3" href="<?php echo site_url()?>/Pricelist/tambahPricelist" role="button">Tambah Data</a>
                                <a class="btn btn-flat btn-success mb-3" href="<?php echo site_url()?>/Pricelist/importPricelist" role="button">Import Data</a>
                                <a class="btn btn-flat btn-warning mb-3" href="<?php echo site_url()?>/Pricelist/export" role="button">Download Data</a></div>
                            <div class="card-body">
                        <?=$this->session->flashdata('editPricelist')?>
                         <?=$this->session->flashdata('deletePricelist')?>
                         <?=$this->session->flashdata('tamba')?>
                                <div>
                                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped" id="dataTablesss">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                         
                                                <th>NO</th>
                                                <th>GROUP NAME</th>
                                             <th>NAMA BARANG</th>
                                                <th>NAMA SUPPLIER</th>
                                                <th>QUOTATION NO</th>
                                              
                                           
                                                <th >Action</th>
                                           
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php   foreach ($price as $key) {?>
                                            <tr>
                                                
                                                <td><?php echo $key->no_pricelist;?></td>
                                                <td><?php echo $key->group_name;?></td>
                                                <td><?php echo $key->nama_barang;?></td>
                                                <td><?php echo $key->nama_supplier;?></td>
                                                <td ><?php echo $key->quotation_no;?></td>
                                                
                                           
                                                <td>

                                                      <div class="btn-group mb-xl-3" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-info">    <a href="javascript:void(0);" onclick="modalDetail('<?php echo $key->no_pricelist?>','<?php echo $key->group_name?>','<?php echo $key->no_barang ?>','<?php echo $key->nama_barang ?>', '<?php echo $key->spec_barang ?>','<?php echo $key->unit ?>','<?php echo $key->mata_uang ?>','<?php echo $key->price ?>','<?php echo $key->nama_supplier ?>','<?php echo $key->quotation_no?>','<?php echo $key->tgl_input ?>','<?php echo $key->lbdate?>','<?php echo $key->remarks ?>')" data-toggle="modal" data-target="#myModalDetil"><font color="white">Detil</font></a></button>
                                    <button type="button" class="btn btn-primary">    <a href="javascript:void(0);" onclick="modalEdit('<?php echo $key->no_pricelist?>','<?php echo $key->group_name?>','<?php echo $key->no_barang ?>','<?php echo $key->nama_barang ?>', '<?php echo $key->spec_barang ?>','<?php echo $key->unit ?>','<?php echo $key->mata_uang ?>','<?php echo $key->price ?>','<?php echo $key->nama_supplier ?>','<?php echo $key->quotation_no?>','<?php echo $key->tgl_input ?>','<?php echo $key->lbdate?>','<?php echo $key->remarks ?>' )"  data-toggle="modal" data-target="#myModalEdit"><font color="white">Edit</font></a></button>
                                    <button type="button" class="btn btn-danger">       <a href="<?php echo site_url()?>/Pricelist/deletePricelist/<?php echo $key->no_pricelist?> " onclick="return confirm('Apakah Yakin Untuk Menghapus?')"><font color="white">Hapus</font></a></button>
                                  
                                </div>
                                                  
                                                  </td>
                                             
                                            </tr>
                                            <?php }?>
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
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModalDetil" class="modal fade-in" >
        <div class="modal-dialog">
            <div class="modal-content" style="width: 800px; margin-left: -100px;padding: 20px" >
                <div class="modal-header">
                    <h4 class="modal-title">Info Pricelist</h4>
                        <button align="right" type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">   
                <table width="600px">
                    <tr>
                        <td>NO</td>
                        <td><input type="text" class="form-control" name="no_pricelist2" id="no_pricelist2" readonly=""></td>
                    </tr>
                    <tr>
                        <td>GROUP NAME</td>
                      <td> <input type="text" class="form-control" name="group_name2" readonly="" id="group_name2" value="" ></td>
                    </tr>
                    <tr>
                        <td>NO BARANG</td>
                        <td><input type="text" class="form-control" name="no_barang2" id="no_barang2" readonly="" value="" ></td>
                    </tr>
                    <tr>
                        <td>NAMA BARANG</td>
                        <td>  <input type="text" class="form-control" name="nama_barang2" id="nama_barang2" value="" readonly="" ></td>
                    </tr>
                    <tr>
                        <td>SPEC BARANG</td>
                        <td> <input type="text" class="form-control" name="spec_barang2" id="spec_barang2" readonly="" value="" ></td>
                    </tr>
                    <tr>
                        <td>UNIT</td>
                        <td> <input type="text" class="form-control" name="unit2" id="unit2" value="" readonly=""></td>
                    </tr>
                    <tr>
                        <td>MATA UANG</td>
                        <td><input type="text" class="form-control" name="mata_uang2" id="mata_uang2" value="" readonly="" ></td>
                    </tr>
                    <tr>
                        <td>PRICE</td>
                        <td>   <input type="text" class="form-control" name="price2" id="price2" value="" readonly=""></td>
                    </tr>
                    <tr>
                        <td>NAMA SUPPLIER</td>
                        <td><input type="text" class="form-control" name="nama_supplier2" id="nama_supplier2" value="" readonly=""></td>
                    </tr>
                    <tr>
                        <td>QUOTATION NO</td>
                        <td> <input type="text" class="form-control" name="quotation_no2" id="quotation_no2" value="" readonly=""></td>
                    </tr>
                    <tr>
                        <td>TANGGALINPUT</td>
                        <td>  <input type="text" class="form-control" name="tgl_input2" id="tgl_input2" value="" readonly=""></td>
                    </tr>
                    <tr>
                        <td>LB DATE</td>
                        <td> <input type="text" class="form-control" name="lbdate2" id="lbdate2" value="" readonly=""></td>
                    </tr>
                    <tr>
                        <td>REMARKS</td>
                        <td> <input type="text" class="form-control" name="remarks2" id="remarks2" value="" readonly=""></td>
                    </tr>

                </table></div>
               
               
            <a href=""><button class="btn-warning" data-dismiss="modal">Batal</button></a>
        </div>
    </div>
</div>


      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModalEdit" class="modal fade-in" >
        <div class="modal-dialog">
            <div class="modal-content" style="width: 800px; margin-left: -100px;padding: 20px" >
                <div class="modal-header">
                    <h4 class="modal-title">Edit Pricelist</h4>
                </div>
          <?php echo form_open_multipart('Pricelist/updatePricelist'); ?>
                <?php echo validation_errors(); ?>
                     <div class="form-group">
                        <label for="">NO</label>
                        <input type="text" class="form-control" name="no_pricelist" id="no_pricelist" value="" readonly="" >
                    </div>
                    <div class="form-group">
                        <label for="">GROUP NAME</label>
                        <input type="text" class="form-control" name="group_name" id="group_name" value="" >
                    </div>
                    <div class="form-group">
                        <label for="">NO BARANG</label>
                        <input type="text" class="form-control" name="no_barang" id="no_barang" value="" >
                    </div>
                    <div class="form-group">
                        <label for="">NAMA BARANG</label>
                        <input type="text" class="form-control" name="nama_barang" id="nama_barang" value="" >
                    </div>
                    <div class="form-group">
                        <label for="">SPEC BARANG</label>
                        <input type="text" class="form-control" name="spec_barang" id="spec_barang" value="" >
                    </div>
                    <div class="form-group">
                        <label for="">UNIT</label>
                        <input type="text" class="form-control" name="unit" id="unit" value="" >
                    </div>
                    <div class="form-group">
                        <label for="">MATA UANG</label>
                        <input type="text" class="form-control" name="mata_uang" id="mata_uang" value="" >
                    </div>
                    <div class="form-group">
                        <label for="">PRICE</label>
                        <input type="text" class="form-control" name="price" id="price" value="" >
                    </div>
                    <div class="form-group">
                        <label for="">NAMA SUPPLIER</label>
                        <input type="text" class="form-control" name="nama_supplier" id="nama_supplier" value="" >
                    </div>
                    <div class="form-group">
                        <label for="">QUOTATION NO</label>
                        <input type="text" class="form-control" name="quotation_no" id="quotation_no" value="" >
                    </div>
                    <div class="form-group">
                        <label for="">TANGGAL INPUT</label>
                        <input type="text" class="form-control" name="tgl_input" id="tgl_input" value="" >
                    </div>
                    <div class="form-group">
                        <label for="">LB DATE</label>
                        <input type="text" class="form-control" name="lbdate" id="lbdate" value="" >
                    </div>
                    <div class="form-group">
                        <label for="">REMARKS</label>
                        <input type="text" class="form-control" name="remarks" id="remarks" value="" >
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
    function modalEdit(no_pricelist,group_name,no_barang,nama_barang,spec_barang,unit,mata_uang,price,nama_supplier,quotation_no,tgl_input,lbdate,remarks){
        document.getElementById('no_pricelist').value = no_pricelist;
        document.getElementById('group_name').value = group_name;
        document.getElementById('no_barang').value = no_barang;
        document.getElementById('nama_barang').value = nama_barang;
        document.getElementById('spec_barang').value = spec_barang;
        document.getElementById('unit').value = unit;
        document.getElementById('mata_uang').value = mata_uang;
        document.getElementById('price').value = price;
        document.getElementById('nama_supplier').value = nama_supplier;
        document.getElementById('quotation_no').value = quotation_no;
        document.getElementById('tgl_input').value = tgl_input;
        document.getElementById('lbdate').value = lbdate;
        document.getElementById('remarks').value = remarks;
    }
  </script>
  <script type="text/javascript">
    function modalDetail(no_pricelist,group_name,no_barang,nama_barang,spec_barang,unit,mata_uang,price,nama_supplier,quotation_no,tgl_input,lbdate,remarks){
        document.getElementById('no_pricelist2').value = no_pricelist;
        document.getElementById('group_name2').value = group_name;
        document.getElementById('no_barang2').value = no_barang;
        document.getElementById('nama_barang2').value = nama_barang;
        document.getElementById('spec_barang2').value = spec_barang;
        document.getElementById('unit2').value = unit;
        document.getElementById('mata_uang2').value = mata_uang;
        document.getElementById('price2').value = price;
        document.getElementById('nama_supplier2').value = nama_supplier;
        document.getElementById('quotation_no2').value = quotation_no;
        document.getElementById('tgl_input2').value = tgl_input;
        document.getElementById('lbdate2').value = lbdate;
        document.getElementById('remarks2').value = remarks;
      
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
          [0, 'desc']
        ]
      });

      /* Add event listener for opening and closing details
       * Note that the indicator for showing which row is open is not controlled by DataTables,
       * rather it is done here
       */
    
  </script>
</body>

</html>
