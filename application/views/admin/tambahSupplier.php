
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Master Data</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="#">Supplier</a></li>
                                <li><span>Tambah Supplier</span></li>
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
                                     <?php echo form_open('Supplier/tambahSupplier') ?>
                                     <h3 align="center">Form Tambah Supplier</h3><br>
                                       <div class="col-md-12">
                                            <div class="row">
                                               
                                                <div class="col-md-2">
                                                     <label class="control-label " for="namaSupplier">Nama Supplier :</label>
                                                 </div>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="nama_supplier" style="margin-bottom: 25px" required="">
                                            </div>
                                                <div class="col-md-2">
                                                     <label class="control-label " for="nama">Alamat :</label>
                                                 </div>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="alamat" style="margin-bottom: 25px" required="">
                                            </div>
                                        </div>
                                    
                                </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label class="control-label" for="alamat">Kota :</label>
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="kota" name="kota" style="margin-bottom: 25px" required="">
                                            </div>
                                            <div class="col-md-2">
                                             <label class="control-label" for="alamat">No Telepon :</label>
                                         </div>
                                         <div class="col-sm-4">
                                            <input type="text" max="20" class="form-control" id="no_telp" name="no_telp">
                                        </div>

                                        </div>
                                    </div> 
                                     <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label class="control-label" for="alamat">No Fax :</label>
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" max="50" class="form-control" id="no_fax" name="no_fax" style="margin-bottom: 25px">
                                            </div>
                                            <div class="col-md-2">
                                             <label class="control-label" for="attention">Attention :</label>
                                         </div>
                                         <div class="col-sm-4">
                                            <input type="text" class="form-control" id="attention" name="attention">
                                        </div>

                                        </div>
                                    </div> 
                                     <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label class="control-label" for="no_hp">No HP :</label>
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" max="50" class="form-control" id="no_hp" name="no_hp" style="margin-bottom: 25px">
                                            </div>
                                            <div class="col-md-2">
                                             <label class="control-label" for="tgl_input">Tanggal Input :</label>
                                         </div>
                                         <div class="col-sm-4">
                                            <input type="text" value="<?php echo date('Y-m-d')?>" readonly="" class="form-control" id="tgl_input" name="tgl_input">
                                        </div>

                                        </div>
                                        </div>

                                        <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label class="control-label" for="nomer_rek">No Rek:</label>
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="nomer_rek" name="nomer_rek" style="margin-bottom: 25px">
                                            </div>
                                            <div class="col-md-2">
                                             <label class="control-label" for="bank">Bank:</label>
                                         </div>
                                         <div class="col-sm-4">
                                           <input type="text" class="form-control" id="bank" name="bank" style="margin-bottom: 25px;">
                                        </div>

                                        <div class="col-md-2">
                                             <label class="control-label" for="atas_nama">Atas nama:</label>
                                         </div>
                                         <div class="col-sm-4">
                                           <input type="text" class="form-control" id="atas_nama" name="atas_nama" style="margin-bottom: 25px">
                                        </div>
                                        <div class="col-md-2">
                                             <label class="control-label" for="ppn">PPN:</label>
                                         </div>
                                         <div class="col-sm-4">
                                            <select class="form-control" name="ppn" required="" style="height:45px;">
                                                <option value="">PILIH:</option>
                                                <option value="10">10%</option>
                                                <option value="0">NO PPN</option>
                                            </select>
                                        </div>

                                        </div>

                                    </div> 
                                     <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label class="control-label" for="terms">Terms :</label>
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="terms" name="terms" style="margin-bottom: 25px">
                                            </div>
                                            <div class="col-md-2">
                                             <label class="control-label" for="start">Status :</label>
                                         </div>
                                         <div class="col-sm-4">
                                            <select class="form-control" name="status" style="height:45px;">
                                                <option value="AKTIF">AKTIF</option>
                                                <option value="NON AKTIF">NON AKTIF</option>
                                            </select>
                                        </div>

                                        </div>
                                    </div>
                                     <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label class="control-label" for="supply">Supply :</label>
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="supply" name="supply" style="margin-bottom: 25px">
                                            </div>
                                            <div class="col-md-2">
                                             <label class="control-label" for="remarks">Remarks :</label>
                                         </div>
                                         <div class="col-sm-4">
                                            <input type="text" class="form-control" id="remarks" name="remarks">
                                        </div>

                                        </div>
                                    </div>  
                                      <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label class="control-label" for="supply">Perjanjian :</label>
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="perjanjian" name="perjanjian" style="margin-bottom: 25px">
                                            </div>
                                            

                                        </div>
                                    </div>  
        
          
              <div align="right"> <button type="submit" class="btn btn-success" style="align-self: right"><i class="ti-save"></i> Simpan</button></div>
              <?php echo form_close() ?>
           

    </div>
</div>
</div>
</div>
</div>

<script type="text/javascript">
  var rupiah = document.getElementById("nomer_rek");
rupiah.addEventListener("keyup", function(e) {
  rupiah.value = formatRupiah(this.value,);
});

  var no_hp = document.getElementById("no_hp");
no_hp.addEventListener("keyup", function(e) {
  no_hp.value = formatRupiah(this.value,);
});
  var no_fax = document.getElementById("no_fax");
no_fax.addEventListener("keyup", function(e) {
  no_fax.value = formatRupiah(this.value,);
});
  var no_telp = document.getElementById("no_telp");
no_telp.addEventListener("keyup", function(e) {
  no_telp.value = formatRupiah(this.value,);
});
function formatRupiah(angka) {
  var number_string = angka.replace(/[^,\d]/g, "").toString();
  return number_string;
  }
</script>