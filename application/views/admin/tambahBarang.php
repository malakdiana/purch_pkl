
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Master Data</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="#">Barang</a></li>
                                <li><span>Tambah Barang</span></li>
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
                                     <?php echo form_open('Barang/tambahBarang') ?>
                                     <h3 align="center">Form Tambah Barang</h3><br>
                                       
                                               
                                          
                                         

                                            <div class="form-group">
                                                     <label class="control-label " for="nama_barang">Nama Barang :</label>
                                           
                                                <input type="text" class="form-control" name="nama_barang" style="margin-bottom: 25px" autocomplete="off">
                                            </div>
                                                <div class="form-group">
                                                     <label class="control-label " for="nama_barang">Harga :</label>
                                           
                                                <input type="text" class="form-control" name="harga" id="harga" style="margin-bottom: 25px" autocomplete="off">
                                            </div>

                                           
                                          
   
                                     
        
          
              <div align="right"> <button type="submit" class="btn btn-success" style="align-self: right"><i class="ti-save"></i> Simpan</button></div>
              <?php echo form_close() ?>
           

    </div>
</div>
</div>
</div>
</div>
 <?php $this->load->view('admin/footer'); ?>
<script type="text/javascript">
     var rupiah2 = document.getElementById("harga");
rupiah2.addEventListener("keyup", function(e) {
  rupiah2.value = formatRupiah(this.value, "Rp. ");
});

/* Fungsi formatRupiah */
function formatRupiah(angka, prefix) {
  var number_string = angka.replace(/[^,\d]/g, "").toString(),
    split = number_string.split(","),
    sisa = split[0].length % 3,
    rupiah = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

  // tambahkan titik jika yang di input sudah menjadi angka ribuan
  if (ribuan) {
    separator = sisa ? "." : "";
    rupiah += separator + ribuan.join(".");
  }

  rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
  return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
}
    
</script>