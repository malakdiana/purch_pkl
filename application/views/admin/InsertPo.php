
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Data</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="<?php echo site_url()?>/Po">Purchase Request</a></li>
                                <li><span>INSERT PO</span></li>
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
                                   <?php echo form_open('Purch_req/insertPrtoPo/') ?>
                
                                       <input readonly="" type="text" class="form-control" name="id_item" style="margin-bottom: 25px" value="<?php echo $list[0]->id_item?>" hidden="">

                                        <input readonly="" type="text" class="form-control" name="id_pr" style="margin-bottom: 25px" value="<?php echo $list[0]->id_purch?>" hidden="">

   <div class="col-md-12">
                                            <div class="row">
                                               
                                                <div class="col-md-1">
                                                      <label class="control-label " for="pr_no">Nomer Pr :</label>
                                                 </div>
                                            <div class="col-sm-2">
                                                <input readonly="" type="text" class="form-control" name="pr_no" style="margin-bottom: 25px" value="<?php echo $list[0]->pr_no?>">
                                            </div>
                                                <div class="col-md-1">
                                                   <label class="control-label " for="no_po">Barang :</label>
                                                 </div>
                                            <div class="col-sm-4">
                                                  <input readonly="" type="text" class="form-control" name="item_barang" style="margin-bottom: 25px" value="<?php echo $list[0]->item_barang?>">
                                            </div>
                                             <div class="col-md-1">
                                                   <label class="control-label " for="no_po">Qty :</label>
                                                 </div>
                                            <div class="col-sm-2">
                                               
                                            <input type="text" class="form-control" name="qty" style="margin-bottom: 25px" value="<?php echo $qtysisa?>" readonly="">
                                            </div>
                                        </div>
                                </div>
                                <br>

 <div class="col-md-12">
                                            <div class="row">
                                      
                                                <div class="col-md-2">
                                                  <label class="control-label " for="no_po" align="right">Nomer Purchase Order :</label>
                                                 </div>
                                            <div class="col-sm-4">
                                                  <select name="no_po" id="no_po" class="no_po form-control choosen">
                                               
                                            </select> 
                                            </div>
                                            
                                        </div>
                                </div><br>
                                 <div class="col-md-12">
                                            <div class="row">
                                   
                                                <div class="col-md-2">
                                               <label class="control-label " for="no_po">Harga :</label>
                                                 </div>
                                            <div class="col-sm-4">
                                                      <input type="text" class="form-control" name="harga" style="margin-bottom: 25px" id="rupiah">
                                                    </div>
                                                  </div>
                                                </div>
                                               
                                        <br>   
                                   <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-2">
                                                        <label class="control-label " for="no_po">Qty To Po :</label>
                                         
                                                 </div>
                                            <div class="col-sm-4">
                                               
                                            <input type="number" class="form-control" name="qty_po" style="margin-bottom: 25px" >
                                            </div>
                                  
                                </div>
                              </div>

                                           


                                             
                                
                                     
        
          
              <div align="right"> <button type="submit" class="btn btn-primary" style="align-self: right">Simpan</button></div>
              <?php echo form_close() ?>
           
           

    </div>
</div>
</div>
</div>
</div>
 <?php $this->load->view('admin/footer'); ?>
 <link href="<?php echo base_url()?>assets/css/select2.min.css" rel="stylesheet" />
  <script src="<?php echo base_url()?>assets/js/select2.min.js"></script>
<script type="text/javascript">
      $('.no_po').select2({
        placeholder: '--- Select Item ---',
        ajax: {
          url: '<?php echo site_url()?>/Purch_req/getPo',
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
            return {
              results: data
            };
          },
          cache: true
        }
      });
</script>
<script type="text/javascript">
  var rupiah = document.getElementById("rupiah");
rupiah.addEventListener("keyup", function(e) {
  rupiah.value = formatRupiah(this.value, "Rp. ");
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