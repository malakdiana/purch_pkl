
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Data</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="#">Purchase Order</a></li>
                                <li><span>list purchase order /</span></li>
                                <li><span>Kelola PR</span></li>
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
                                                     <label class="control-label " for="group_name">VP Date :</label>
                                                 </div>
                                            <div class="col-sm-4">
                                           
                                                <input type="date" class="form-control" name="vp_date" style="margin-bottom: 25px" value="" >
                                            </div>
                                                <div class="col-md-2">
                                                     <label class="control-label " for="no_barang">TF Date :</label>
                                                 </div>
                                            <div class="col-sm-4">
                                                <input type="date" class="form-control" id="tf_date" name="tf_date" value="" >
                                            </div>
                                        </div>
                                </div>

                                                                     
                         <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-2">
                                                     <label class="control-label " for="no_barang">Supplier :</label><br><br>
                                                   
                                                 </div>
                                            <div class="col-sm-4">
                                                 <input type="text" name="supplier" readonly="" class="form-control">
                                                
                                            
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
          <h3>Detail</h3><br>
          <?php echo form_open('Invoice/detailPrint'); ?>
          <input type="text" name="id_po" value="<?php echo $this->uri->segment('3'); ?>" hidden="">
          <div class="row">
            <div class="col-md-1">Material
            </div>
            <div class="col-sm-4"> <div class="row"><input type="text" name="material" id="rupiahmat" class="form-control" style="width: 250px"><p> &nbsp;&nbsp;x&nbsp;&nbsp; </p><input type="text" name="qtymat" class="form-control" style="width: 60px" placeholder="qty" value="1">
              </div>
            </div>
          </div>
           <div class="row">
            <div class="col-md-1"><br>Jasa
            </div>
            <div class="col-sm-4"> <br><div class="row"><br><br><input type="text" name="jasa" id="rupiahjas" class="rupiah form-control" style="width: 250px"><p> &nbsp;&nbsp;x&nbsp;&nbsp; </p><input type="text" name="qtyjas" class="form-control" style="width: 60px" placeholder="qty" value="1">
              </div>
              
            </div>
          </div>
           <div class="row">
            <div class="col-md-1"><br>PPH
            </div>
            <div class="col-sm-4"> <br><div class="row"><input type="number" name="pph" class="form-control" style="width: 60px;"> &nbsp;&nbsp;<font size="5px">%</font></div>
              
            </div>
          </div>
           <div class="row">
            <div class="col-md-1"><br>PPN
            </div>
            <div class="col-sm-4"> <br><select class="form-control" style="width: 110px;height: 50px; margin-left: -16px">
            <option value="0">tanpa ppn</option><option value="10">10 %</option> </select>
            </div>
          </div>
          <div class="col-md-5">
           <p align="right"> <button  class="btn btn-info">Print</button></p>
          </div>
          <?php echo form_close(); ?>

        
          
</div>
</div>
</div>
</div>
</div>
<?php $this->load->view('admin/footer'); ?>
 <link href="<?php echo base_url()?>assets/css/select2.min.css" rel="stylesheet" />
  <script src="<?php echo base_url()?>assets/js/select2.min.js"></script>
 <script>
    $(document).ready(function(){ // Ketika halaman sudah diload dan siap
        $("#btn-tambah-form").click(function(){ // Ketika tombol Tambah Data Form di klik
            var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
            var x = jumlah + 1; // Tambah 1 untuk jumlah form nya       
            // Kita akan menambahkan form dengan menggunakan append
            // pada sebuah tag div yg kita beri id insert-form
           

              $("#insert-form").append(" <tr id='"+x+"'><td><select class='noPo"+x+" form-control' name='no_po[]'></select></td><td><input type='text' class='form-control' name='barang[]' id='barang"+x+"' style='margin-bottom: 25px' readonly=''></td><td><input type='text' class='form-control' name='no_invoice[]' style='margin-bottom: 25px' required=''></td><td><input type='text' class='form-control' name='invoice_date[]' style='margin-bottom: 25px' required=''></td> <td><input type='checkbox' name='ppn"+x+"' id='ppn"+x+"'></td><td><input type='text' class='form-control' name='total[]' id='total"+x+"' style='margin-bottom: 25px' readonly=''></td><td><button class='btn btn-delete btn-danger'> <i class='fa fa-trash'> </i></button></td></tr>");


            $("#scriptt").append("<script type='text/javascript'>var total"+x+" = $('#total"+x+"').val();var totalasli"+x+" = 0;  $('.noPo"+x+"').select2({ placeholder: '--- Select Item ---', ajax: {url: '<?php echo site_url()?>/Po/getPObySup/'+sup, dataType: 'json', delay: 250,processResults: function (data) { return {results: data };},     cache: true }}); $('.noPo"+x+"').change(function () { var val = $(this).val(); var ckbox = $('#ppn"+x+"');   $.ajax({ type : 'POST', url: '<?php echo site_url('Po/getTotalPO')?>', data : {ids: val},dataType: 'json',    }).done(function(data){ totalasli"+x+" = data.jumlah*1; if (ckbox.is(':checked')) { var ppn = totalasli"+x+" * 0.1; total = totalasli"+x+"+ppn; document.getElementById('barang').value = data.barang;                   document.getElementById('total').value = total;}else{ document.getElementById('barang"+x+"').value = data.barang;  document.getElementById('total"+x+"').value = totalasli"+x+";}})}); $('#ppn"+x+"').change(function () { if ($(this).is(':checked')) {var bil = totalasli"+x+"*1; var ppn =  totalasli"+x+" * 0.1;total= bil+ppn;    document.getElementById('total"+x+"').value = total;}else{document.getElementById('total"+x+"').value = totalasli"+x+";}});");
            
            
            $("#jumlah-form").val(x); // Ubah value textbox jumlah-form dengan variabel nextform
        });   
        // Buat fungsi untuk mereset form ke semula
        $("#btn-reset-form").click(function(){
             $("#insert-form").html("");
            $("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
        });
    });
    </script>
    <div id="scriptt"></script></div>
    <script type="text/javascript">
   var total = $("#total").val();
   var totalasli = 0; 
   var sup = 0;
    $('.supplier').select2({
        placeholder: '--- Select Item ---',
        ajax: {
          url: '<?php echo site_url()?>/Po/getSup',
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
    

       $(".supplier").change(function () {
       
        var val = $(this).val(); //get the value
        sup=$(this).val();;
        
         $('.noPo').select2({
        placeholder: '--- Select Item ---',
        ajax: {
          url: '<?php echo site_url()?>/Po/getPObySup/'+val,
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
         });
 $(".noPo").change(function () {
        var val = $(this).val(); 
         var ckbox = $('#ppn'); 
      $.ajax({
          type : "POST",
          url: '<?php echo site_url('Po/getTotalPO')?>',
          data : {ids: val},
          dataType: 'json',  
      }).done(function(data){
        totalasli = data.jumlah*1;
             if (ckbox.is(':checked')) {          
                var ppn = totalasli * 0.1;
                 total = totalasli+ppn;
                    document.getElementById('barang').value = data.barang;
                    document.getElementById('total').value = total;
                }else{
                    document.getElementById('barang').value = data.barang;
                    document.getElementById('total').value = totalasli;
                }              
      })
      });

 $("#ppn").change(function () {

 if ($(this).is(':checked')) {
    var bil = totalasli*1;
            var ppn =  totalasli * 0.1;
                total= bil+ppn;
                document.getElementById('total').value = total;
                }else{
                    document.getElementById('total').value = totalasli;  
                }
 });  

  $("body").on("click", ".btn-delete", function(){
        $(this).parents("tr").remove();
    });            
</script>
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