
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Data</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="#">Invoice</a></li>
                                <li><span>PO</span></li>
                           
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
                                                <div class="col-md-2">
                                                     <label class="control-label " for="no_barang">Supplier :</label><br><br>
                                                   
                                                 </div>
                                            <div class="col-sm-4">
                                                 <input type="text" name="supplier" readonly="" class="form-control" value="<?php  echo $doc[0]->supplier ?>">
                                                
                                            
                                            </div>

                                        </div>
                                </div>
                      <br>

<div class="card">
         <div class="card-body">
          <h3>Detail PO</h3>
           <table class="table" >
          <thead >
          <th> No</th>
          <th>No PR</th>
          <th> Item </th>
          <th> Qty </th>
          <th> Unit </th>
          <th> Harga</th>
        </thead>
  <?php $no=1; $jumlah =0;foreach ($doc as $key) { ?>
        <tr> 
          <td><?php echo $no; ?></td>
          <td><?php echo $key->no_pr; ?></td>
          <td><?php echo $key->item; ?></td>
          <td><?php echo $key->qty; ?></td>
          <td><?php echo $key->unit; ?></td>
         <td><?php echo "Rp " . number_format($key->harga,2,',','.');?> </td>
                                                <?php $jumlah+= ($key->qty * $key->harga); 
                                                  $hasil_rupiah = "Rp " . number_format($jumlah,2,',','.');?>
                                              
                                             
        </tr>
        <?php $no++;}?>
        <tr>
         <td colspan="4" align="right">Jumlah Total</td>
          <td colspan="2"><?php echo $hasil_rupiah; ?></td>
        </tr>
      </table>

      <br>
      <h3>Detail Invoice</h3>
      <table class="table">
        <thead>
           <th> No</th>
          <th>No Invoice</th>
          <th> Tanggal Invoice</th>
        </thead>
        <tbody>
          <?php $no=1; foreach ($inv as $key) { ?>
        <tr> 
          <td><?php echo $no; ?></td>
          <td><?php echo $key->no_invoice; ?></td>
          <td><?php echo $key->tgl_invoice; ?></td>
                                             
                                             
        </tr>
        <?php $no++;}?>
        </tbody>
      </table>
</div>
</div>
<br><br>
<div class="card">
         <div class="card-body">
          <h3>Detail Print</h3><br>
          <?php echo form_open('Invoice/detailPrint'); ?>
            <div class="row">
            <div class="col-md-1">VP Date :
            </div>
            <div class="col-sm-4" style="margin-left: -12px">    <input type="date" class="form-control" name="vp_date" style="margin-bottom: 25px" value="<?php echo $docrec[0]->vp_date ?>">
            </div>
          </div>
            <div class="row">
            <div class="col-md-1">TF Date :
            </div>
            <div class="col-sm-4" style="margin-left: -12px">     <input type="date" class="form-control" id="tf_date" style="margin-bottom: 25px" name="tf_date" value="" required="">
            </div>
          </div>                               
                                      
          <input type="text" name="id_po" value="<?php echo $this->uri->segment('3'); ?>" hidden="">
          <div class="row">
            <div class="col-md-1">Material
            </div>
            <div class="col-sm-4"> <div class="row"><input autocomplete="off" type="text" name="material" id="rupiahmat" class="form-control" style="width: 250px"><p> &nbsp;&nbsp;x&nbsp;&nbsp; </p><input autocomplete="off" type="number" name="qtymat" class="form-control" style="width: 60px" placeholder="qty" value="1">
              </div>
            </div>
          </div>
           <div class="row">
            <div class="col-md-1"><br>Jasa
            </div>
            <div class="col-sm-4"> <br><div class="row"><br><br><input autocomplete="off" type="text" name="jasa" id="rupiahjas" class="rupiah form-control" style="width: 250px"><p> &nbsp;&nbsp;x&nbsp;&nbsp; </p><input autocomplete="off" type="number" name="qtyjas" class="form-control" style="width: 60px" placeholder="qty" value="1">
              </div>
              
            </div>
          </div>
           <div class="row">
            <div class="col-md-1"><br>PPH
            </div>
            <div class="col-sm-4"> <br><div class="row"><input autocomplete="off" type="number" name="pph" class="form-control" style="width: 60px;"> &nbsp;&nbsp;<font size="5px">%</font></div>
              
            </div>
          </div>
           <div class="row">
            <div class="col-md-1"><br>PPN
            </div>
            <div class="col-sm-4"> <br><select name="ppn" class="form-control" style="width: 110px;height: 50px; margin-left: -16px">
            <option value="0">tanpa ppn</option><option value="10">10 %</option> </select>
            </div>
          </div>
              <div class="row">
            <div class="col-md-1"><br>Paid Thru
            </div>
            <div class="col-sm-4"> <br><select name="paid" class="form-control" style="width: 110px;height: 50px; margin-left: -16px">
            <option value="Transfer">Transfer</option><option value="Cash">Cash</option> </select>
            </div>
          </div>
           <div class="row">
            <div class="col-md-1"><br>Prepared
            </div>
            <div class="col-sm-4"> <br><input type="text" name="prepared" id="prepared" class="form-control" style="width: 250px;margin-left: -16px" value="<?php echo $pre[0]->kode_nama ?>" readonly=""><a href="#" data-toggle="modal" data-target="#myModalEdit">ubah kode prepared</a>
            </div>
          </div>
          <input type="text" name="barang" hidden="" value="<?php echo  $doc[0]->item ?>">
             <input type="text" name="jumlah" hidden="" value="<?php echo  $jumlah ?>">
          <div class="col-md-5">
           <p align="right"> <button  class="btn btn-info">Print</button></p>
          </div>
          <?php echo form_close(); ?>

        
          
</div>
</div>
</div>
</div>
</div>
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModalEdit" class="modal fade-in" >
        <div class="modal-dialog">
            <div class="modal-content" style="width: 800px; margin-left: -100px;padding: 20px" >
                <div class="modal-header">
                    <h4 class="modal-title">Edit Prepared</h4>
                    <button align="right" type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <label>Kode Prepared</label>
                  <input type="text" name="kode" id="kode" class="form-control" style="width: 350px"><br>
                  <button class="btn btn-success" onclick="edit()">Save</button>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php $this->load->view('admin/footer'); ?>
 <link href="<?php echo base_url()?>assets/css/select2.min.css" rel="stylesheet" />
  <script src="<?php echo base_url()?>assets/js/select2.min.js"></script>

<script type="text/javascript">
  var rupiahmat = document.getElementById("rupiahmat");
  var rupiahjas = document.getElementById("rupiahjas");
rupiahmat.addEventListener("keyup", function(e) {
  rupiahmat.value = formatRupiah(this.value, "Rp. ");
});
rupiahjas.addEventListener("keyup", function(e) {
  rupiahjas.value = formatRupiah(this.value, "Rp. ");
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
<script type="text/javascript">
  function edit(){
     var kode_nama = $('#kode').val();
      $.ajax({
                type : "POST",
                url  : "<?php echo site_url('Invoice/editPrepared')?>",
                dataType : "JSON",
                data : {kode_nama:kode_nama},
                success: function(data){
                 $('#myModalEdit').modal('hide');
                 document.getElementById('prepared').value = kode_nama;  
                }
            });
  }
</script>