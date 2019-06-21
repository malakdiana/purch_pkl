
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Master Data</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Supplier</a></li>
                                <li><span>Data Supplier</span></li>
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
                                <a class="btn btn-flat btn-primary mb-3" href="<?php echo site_url()?>/Admin/tambahSupplier" role="button">Tambah Data</a>
                                <a class="btn btn-flat btn-success mb-3" href="<?php echo site_url()?>/Admin/importSupplier" role="button">Import Data</a></div>
                            <div class="card-body">
                        <?=$this->session->flashdata('editSupplier')?>
                         <?=$this->session->flashdata('deleteSupplier')?>
                         <?=$this->session->flashdata('tamba')?>
                                <div>
                                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped" id="dataTablesss">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                                <th>NO</th>
                                                <th>NAMA SUPPLIER</th>
                                             <th>ALAMAT</th>
                                                <th>KOTA</th>
                                                <th style="">TELEPON</th>
                                              
                                           
                                                <th >Detail</th>
                                                <th >Edit</th>
                                                <th >Hapus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php   foreach ($supp as $key) {?>
                                            <tr>
                                                <td><?php echo $key->id_supplier;?></td>
                                                <td><?php echo $key->nama_supplier;?></td>
                                                <td><?php echo $key->alamat;?></td>
                                                <td><?php echo $key->kota;?></td>
                                                <td style="padding-right: 0px"><?php echo $key->no_telp;?></td>
                                                
                                           
                                                <td>
                                                    <a href="javascript:void(0);" onclick="modalDetail2('<?php echo $key->id_supplier?>','<?php echo $key->nama_supplier?>','<?php echo $key->alamat ?>','<?php echo $key->kota ?>', '<?php echo $key->no_telp ?>','<?php echo $key->no_fax ?>','<?php echo $key->attention ?>','<?php echo $key->no_hp ?>','<?php echo $key->tgl_input ?>','<?php echo $key->terms ?>','<?php echo $key->ppn ?>','<?php echo $key->supply?>','<?php echo $key->status ?>','<?php echo $key->perjanjian?>','<?php echo $key->remarks ?>')" data-toggle="modal" data-target="#myModalDetil">
                                                    <i class="fw-icons fa fa-clone" title="detail"></i>
                                                </a></td><td>
                                                    
                                                <a href="javascript:void(0);" onclick="modalDetail('<?php echo $key->id_supplier?>','<?php echo $key->nama_supplier?>','<?php echo $key->alamat ?>','<?php echo $key->kota ?>', '<?php echo $key->no_telp ?>','<?php echo $key->no_fax ?>','<?php echo $key->attention ?>','<?php echo $key->no_hp ?>','<?php echo $key->tgl_input ?>','<?php echo $key->terms ?>','<?php echo $key->ppn ?>','<?php echo $key->supply?>','<?php echo $key->status ?>','<?php echo $key->perjanjian?>','<?php echo $key->remarks ?>')"  data-toggle="modal" data-target="#myModalEdit">          <i class="fa fa-edit"></i></a></td><td>
                                                
                                                <a href="<?php echo site_url()?>/Admin/deleteSupplier/<?php echo $key->id_supplier?> " onclick="return confirm('Apakah Yakin Untuk Menghapus?')"><i class="fa fa-trash-o"></i></a></td>
                                             
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
                    <h4 class="modal-title">Info Supplier</h4>
                </div>
                <table width="600px">
                    <tr>
                        <td>NO</td>
                        <td><input type="text" class="form-control" name="id_supplier2" id="id_supplier2" readonly=""></td>
                    </tr>
                    <tr>
                        <td>NAMA SUPPLIER</td>
                      <td> <input type="text" class="form-control" name="nama_supplier2" readonly="" id="nama_supplier2" value="" ></td>
                    </tr>
                    <tr>
                        <td>ALAMAT</td>
                        <td><input type="text" class="form-control" name="alamat2" id="alamat2" readonly="" value="" ></td>
                    </tr>
                    <tr>
                        <td>KOTA</td>
                        <td>  <input type="text" class="form-control" name="kota2" id="kota2" value="" readonly="" ></td>
                    </tr>
                    <tr>
                        <td>NO TELEPON</td>
                        <td> <input type="text" class="form-control" name="no_telp2" id="no_telp2" readonly="" value="" ></td>
                    </tr>
                    <tr>
                        <td>NO FAX</td>
                        <td> <input type="text" class="form-control" name="no_fax2" id="no_fax2" value="" readonly=""></td>
                    </tr>
                    <tr>
                        <td>ATTENTION</td>
                        <td><input type="text" class="form-control" name="attention2" id="attention2" value="" readonly="" ></td>
                    </tr>
                    <tr>
                        <td>NO HP</td>
                        <td>   <input type="text" class="form-control" name="no_hp2" id="no_hp2" value="" readonly=""></td>
                    </tr>
                    <tr>
                        <td>TANGGAL INPUT</td>
                        <td><input type="text" class="form-control" name="tgl_input2" id="tgl_input2" value="" readonly=""></td>
                    </tr>
                    <tr>
                        <td>TERMS</td>
                        <td> <input type="text" class="form-control" name="terms2" id="terms2" value="" readonly=""></td>
                    </tr>
                    <tr>
                        <td>PPN</td>
                        <td>  <input type="text" class="form-control" name="ppn2" id="ppn2" value="" readonly=""></td>
                    </tr>
                    <tr>
                        <td>SUPPLY</td>
                        <td> <input type="text" class="form-control" name="supply2" id="supply2" value="" readonly=""></td>
                    </tr>
                    <tr>
                        <td>STATUS</td>
                       <td> <input type="text" class="form-control" name="status2" id="status2" readonly="" value="" readonly=""></td>
                    </tr>
                    <tr>
                        <td>PERJANJIAN</td>
                        <td> <input type="text" class="form-control" name="perjanjian2" id="perjanjian2" value="" readonly=""></td>
                    </tr>
                    <tr>
                        <td>REMARKS</td>
                        <td> <input type="text" class="form-control" name="remarks2" id="remarks2" value="" readonly=""></td>
                    </tr>

                </table>
               
               
            <a href=""><button class="btn-warning" data-dismiss="modal">Batal</button></a>
        </div>
    </div>
</div>


      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModalEdit" class="modal fade-in" >
        <div class="modal-dialog">
            <div class="modal-content" style="width: 800px; margin-left: -100px;padding: 20px" >
                <div class="modal-header">
                    <h4 class="modal-title">Info Supplier</h4>
                </div>
          <?php echo form_open_multipart('Admin/updateSupplier'); ?>
                <?php echo validation_errors(); ?>
                     <div class="form-group">
                        <label for="">NO</label>
                        <input type="text" class="form-control" name="id_supplier" id="id_supplier" value="" readonly="" >
                    </div>
                    <div class="form-group">
                        <label for="">NAMA SUPPLIER</label>
                        <input type="text" class="form-control" name="nama_supplier" id="nama_supplier" value="" >
                    </div>
                    <div class="form-group">
                        <label for="">ALAMAT</label>
                        <input type="text" class="form-control" name="alamat" id="alamat" value="" >
                    </div>
                    <div class="form-group">
                        <label for="">KOTA</label>
                        <input type="text" class="form-control" name="kota" id="kota" value="" >
                    </div>
                    <div class="form-group">
                        <label for="">NO TELEPON</label>
                        <input type="text" class="form-control" name="no_telp" id="no_telp" value="" >
                    </div>
                    <div class="form-group">
                        <label for="">NO FAX</label>
                        <input type="text" class="form-control" name="no_fax" id="no_fax" value="" >
                    </div>
                    <div class="form-group">
                        <label for="">ATTENTION</label>
                        <input type="text" class="form-control" name="attention" id="attention" value="" >
                    </div>
                    <div class="form-group">
                        <label for="">NO HP</label>
                        <input type="text" class="form-control" name="no_hp" id="no_hp" value="" >
                    </div>
                    <div class="form-group">
                        <label for="">TANGGAL INPUT</label>
                        <input type="text" class="form-control" name="tgl_input" id="tgl_input" value="" >
                    </div>
                    <div class="form-group">
                        <label for="">TERMS</label>
                        <input type="text" class="form-control" name="terms" id="terms" value="" >
                    </div>
                    <div class="form-group">
                        <label for="">PPN</label>
                        <input type="text" class="form-control" name="ppn" id="ppn" value="" >
                    </div>
                    <div class="form-group">
                        <label for="">SUPPLY</label>
                        <input type="text" class="form-control" name="supply" id="supply" value="" >
                    </div>
                    <div class="form-group">
                        <label for="">STATUS</label>
                       <select class="form-control" name="status" id="status">
                                    </select> 
                    </div>
                    <div class="form-group">
                        <label for="">PERJANJIAN</label>
                        <input type="text" class="form-control" name="perjanjian" id="perjanjian" value="" >
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
    function modalDetail(id_supplier,nama_supplier,alamat,kota,no_telp,no_fax,attention,no_hp,tgl_input,terms,ppn,supply,status,perjanjian,remarks){
        document.getElementById('id_supplier').value = id_supplier;
        document.getElementById('nama_supplier').value = nama_supplier;
        document.getElementById('alamat').value = alamat;
        document.getElementById('kota').value = kota;
        document.getElementById('no_telp').value = no_telp;
        document.getElementById('no_fax').value = no_fax;
        document.getElementById('attention').value = attention;
        document.getElementById('no_hp').value = no_hp;
        document.getElementById('tgl_input').value = tgl_input;
        document.getElementById('terms').value = terms;
        document.getElementById('ppn').value = ppn;
        document.getElementById('supply').value = supply;
        document.getElementById('status').value = status;
         document.getElementById('perjanjian').value = perjanjian;
        document.getElementById('remarks').value = remarks;
        if(status=="AKTIF"){
            $("#status").html('<option value="AKTIF" selected="">AKTIF</option><option value="NON AKTIF" >NON AKTIF</option>');
        }else{
              $("#status").html('<option value="AKTIF">AKTIF</option><option value="NON AKTIF" selected="">NON AKTIF</option>');
        }
    }
  </script>
  <script type="text/javascript">
    function modalDetail2(id_supplier,nama_supplier,alamat,kota,no_telp,no_fax,attention,no_hp,tgl_input,terms,ppn,supply,status,perjanjian,remarks){
        document.getElementById('id_supplier2').value = id_supplier;
        document.getElementById('nama_supplier2').value = nama_supplier;
        document.getElementById('alamat2').value = alamat;
        document.getElementById('kota2').value = kota;
        document.getElementById('no_telp2').value = no_telp;
        document.getElementById('no_fax2').value = no_fax;
        document.getElementById('attention2').value = attention;
        document.getElementById('no_hp2').value = no_hp;
        document.getElementById('tgl_input2').value = tgl_input;
        document.getElementById('terms2').value = terms;
        document.getElementById('ppn2').value = ppn;
        document.getElementById('supply2').value = supply;
        document.getElementById('status2').value = status;
         document.getElementById('perjanjian2').value = perjanjian;
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
          "bSortable": false,
          "aTargets": [0]
        }],
        "aaSorting": [
          [1, 'asc']
        ]
      });

      /* Add event listener for opening and closing details
       * Note that the indicator for showing which row is open is not controlled by DataTables,
       * rather it is done here
       */
    
  </script>
</body>

</html>
