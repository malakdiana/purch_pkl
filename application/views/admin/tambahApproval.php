
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Master Data</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="#">Approval</a></li>
                                <li><span>Tambah Approval</span></li>
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
                                     <?php echo form_open('Approval/tambahApproval') ?>
                                     <h3 align="center">Form Tambah Approval</h3><br>
                                       


                                            <div class="form-group">
                                                     <label class="control-label " for="nama">Nama :</label>
                                           
                                                <input type="text" class="form-control" name="nama" style="margin-bottom: 25px" required="">
                                            </div>

                                            <div class="form-group">
                                                     <label class="control-label " for="kode_nama">Kode Nama :</label>
                                           
                                                <input type="text" class="form-control" name="kode_nama" style="margin-bottom: 25px" required="">
                                            </div>

                                            <div class="form-group">
                                                     <label class="control-label " for="min">Min :</label>
                                           
                                                <input type="text" class="form-control" name="min" id="rupiah" style="margin-bottom: 25px" required="">
                                            </div>

                                            <div class="form-group">
                                                     <label class="control-label " for="max">Max :</label>
                                           
                                                <input type="text" class="form-control" name="max" id="rupiah2" style="margin-bottom: 25px" required="">
                                            </div>
   
   
                                     
        
          
              <div align="right"> <button type="submit" class="btn btn-success" style="align-self: right"><i class="ti-save"></i> Simpan</button></div>
              <?php echo form_close() ?>
           

    </div>
</div>
</div>
</div>
</div>
<?php   $this->load->view('Admin/footer'); ?>
<script type="text/javascript">
    var rupiah = document.getElementById("rupiah");
rupiah.addEventListener("keyup", function(e) {
  rupiah.value = formatRupiah(this.value, "Rp. ");
});
    var rupiah2 = document.getElementById("rupiah2");
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