<div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Input Data</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="#">Purchase Order</a></li>
                                <li><span>Insert Purchase Order</span></li>
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
                                     <?php echo form_open('Po/tambahPO') ?>
                                  
                                     <div class="col-md-12">
                                        <div class="row">

                                            <div class="col-md-2">
                                                <label class="control-label" for="alamat">Tanggal :</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" value="<?php date_default_timezone_set('Asia/Jakarta');echo date('d/m/Y H:i:s')?>" readonly="" class="form-control" id="tgl_po" name="tgl_po" style="margin-bottom: 25px">
                                            </div>

                                            <div class="col-md-1">
                                             <label class="control-label" for="attention">Nomor PO :</label>
                                         </div>
                                         <div class="col-sm-6">
                                           <div class="row">
                                               <input type="text" class="form-control" value="PO" style="margin-bottom: 25px;width: 100px" readonly="" >
                                                <input type="text" class="form-control" required="" minlength="3" maxlength="3" name="no_po" style="margin-bottom: 25px;width: 100px" placeholder="000" autocomplete="off" id="no_po">
                                                  
                                                <select name="bulan" class="form-control" style="margin-bottom: 25px;width: 100px; height: 50px">
                                           
                                           <option class="form-control" value="I">Januari</option>
                                           <option class="form-control" value="II">Februari</option>
                                           <option class="form-control" value="III">Maret</option>
                                           <option class="form-control" value="IV">April</option>
                                           <option class="form-control" value="V">Mei</option>
                                           <option class="form-control" value="VI">Juni</option>
                                           <option class="form-control" value="VII">Juli</option>
                                           <option class="form-control" value="VIII">Agustus</option>
                                           <option class="form-control" value="IX">September</option>
                                           <option class="form-control" value="X">Oktober</option>
                                           <option class="form-control" value="XI">November</option>
                                           <option class="form-control" value="XII">Desember</option>
                                           </select>
                                                <select name="tahun" class="form-control" style="margin-bottom: 25px;width: 100px; height: 50px">
                                           <?php $tahun = date('D - M / Y');
                                           $tahun1 = substr($tahun,-2);
                                           $tahun2 = $tahun1+1;?>
                                           <option class="form-control" value="<?php echo $tahun1?>"><?php echo $tahun1;?></option>
                                           <option class="form-control" value="<?php echo $tahun2?>"><?php echo $tahun2;?></option>
                                          
                                           </select>
                                              </div>

                                        </div>
                                      </div>
                                    </div>
                                      <div class="col-md-12">
                                        <div class="row">

                                            <div class="col-md-2">
                                                <label class="control-label" for="alamat">Supplier :</label>
                                            </div>
                                            <div class="col-sm-3">
                                              <select class="supplier form-control" name="supplier" required=""></select>
                                             
                                            </div>

                                            <div class="col-md-1">
                                             <label class="control-label" for="attention">ETA :</label>
                                         </div>
                                         <div class="col-sm-4">
                                            <input type="date" class="form-control" id="eta" name="eta" value="" required="">
                                        </div>

                                        </div>
                                    </div> 
                                     <div class="col-md-12">
                                        <div class="row">

                                            <div class="col-md-2">
                                                <label class="control-label" for="alamat">Franco :</label>
                                            </div>
                                            <div class="col-sm-3">
                                              <select class="form-control" name="franco" required="" style="height:45px;">
                                                <option value="SAI-T">SAI-T</option>
                                                <option value="SAI-B">SAI-B</option>
                                              </select>
                                             
                                            </div>

                                           

                                        </div>
                                    </div> 

<br><br>


        <table class="table" >
          <thead >
          <th> Nomor PR </th>
          <th> Barang </th>
          <th> Qty Butuh </th>
          <th> Satuan</th>
          <th> Qty PO </th>
          <th> Harga Satuan (Rp)</th>
           <th> action</th>
        </thead>
        <tbody id="insert-form">
        <tr>
          <td> <select class="itemName form-control" style="width:200px" name="itemName[]" required=""></select></td>
          <td>  <select class="namaBarang form-control" style="width:300px" name="namaBarang[]" id="namaBarang" required=""><option></option></select></td>
          <td> <input type="text" class="form-control" style="width:100px"name="qtysisa[]" id="qtysisa" readonly=""></td>
          <td><input type="text" class="form-control" style="width:100px" name="unit[]" id="unit" readonly=""></td>
          <td><input type="text" class="form-control" style="width:100px" name="qty[]" id="qty1" required=""></td>
          <td><input type="text" class="form-control" name="harga[]" required="" id="rupiah"></td>
          <td> <button class="btn btn-delete btn-danger"> <i class="fa fa-trash"> </i></button></td>
        </tr>
   

      </tbody>
        </table>
        <div align="right">
        <button class="btn btn-success" type="submit"><i class="ti-save"></i>  Simpan</button>
        <button type="button" class="btn btn-info" id="btn-tambah-form"><i class="ti-plus"></i>  Tambah Data Form</button>
        <button type="button" id="btn-reset-form" class="btn btn-warning"><i class="ti-reload"></i>  Reset Form</button>
        <input type="hidden" id="jumlah-form" name="jumlah" value="1">

       </div>

<?php echo form_close() ?>   
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
           

              $("#insert-form").append("<tr id='"+x+"'><td> <select class='itemName"+x+" form-control' style='width:200px' name='itemName[] required=''></select></td><td> <select class='namaBarang"+x+" form-control'  style='width:300px' name='namaBarang[]' required='' id='namaBarang"+x+"'><option></option></select></td><td> <input type='text' class='form-control' style='width:100px' name='qtysisa[]'' id='qtysisa"+x+"' readonly=''></td>   <td><input type='text' class='form-control' style='width:100px' name='unit[]' id='unit"+x+"' readonly=''></td><td><input type='text' class='form-control' style='width:100px' name='qty[]' id='qty"+x+"' required=''></td><td><input type='text' class='form-control' name='harga[]' required='' id='rupiah"+x+"'></td> <td> <button class='btn btn-delete btn-danger'> <i class='fa fa-trash'> </i></button></td>   </tr>");


            $("#scriptt").append("<script type='text/javascript'>$('.itemName"+x+"').select2({placeholder: '--- Select Item ---',ajax: {url: '<?php echo site_url()?>/Po/getPr',dataType: 'json',delay: 250,processResults: function (data) {return {results: data };},cache: true}});$('.itemName"+x+"').change(function () {document.getElementById('namaBarang"+x+"').value ='';var val = $(this).val(); $('.namaBarang"+x+"').select2({placeholder: '--- Select Item ---',ajax: {url: '<?php echo site_url()?>/Po/getBarang/'+val,dataType: 'json',delay: 250,processResults: function (data) { return {results: data};},cache: true}}); }); $('.namaBarang"+x+"').change(function () { var val = $(this).val(); $.ajax({type : 'POST',url: '<?php echo site_url('Po/getQtyBarang')?>',data : {ids: val},dataType: 'json',}).done(function(data){document.getElementById('qtysisa"+x+"').value = data.qty;          document.getElementById('unit"+x+"').value = data.unit;})});  var rupiah"+x+" = document.getElementById('rupiah"+x+"');rupiah"+x+".addEventListener('keyup', function(e) { rupiah"+x+".value = formatRupiah(this.value, 'Rp. ');});");
            
            
            $("#jumlah-form").val(x); // Ubah value textbox jumlah-form dengan variabel nextform
        });   
        // Buat fungsi untuk mereset form ke semula
        $("#btn-reset-form").click(function(){
             $("#insert-form").html("");
            $("#jumlah-form").val("0"); // Ubah kembali value jumlah form menjadi 1
        });
    });
    </script>
    <div id="scriptt"></script></div>
    <script type="text/javascript">
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
      $('.itemName').select2({
        placeholder: '--- Select Item ---',
        ajax: {
          url: '<?php echo site_url()?>/Po/getPr',
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

       $(".itemName").change(function () {
         document.getElementById('namaBarang').value ="";
        var val = $(this).val(); //get the value
        
         $('.namaBarang').select2({
        placeholder: '--- Select Item ---',
        ajax: {
          url: '<?php echo site_url()?>/Po/getBarang/'+val,
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
 $(".namaBarang").change(function () {
        var val = $(this).val();  
      $.ajax({
          type : "POST",
          url: '<?php echo site_url('Po/getQtyBarang')?>',
          data : {ids: val},
          dataType: 'json',  
      }).done(function(data){
                    document.getElementById('qtysisa').value = data.qty;  
                     document.getElementById('unit').value = data.unit;  
                    
      })
      });
      
</script>
<script type="text/javascript">
  var rupiah = document.getElementById("rupiah");
rupiah.addEventListener("keyup", function(e) {
  rupiah.value = formatRupiah(this.value, "Rp. ");
});

  var po = document.getElementById("no_po");
po.addEventListener("keyup", function(e) {
  po.value = formatAngka(this.value);
});
function formatAngka(angka) {
  var number_string = angka.replace(/[^,\d]/g, "").toString();
  return number_string;
}


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

  $("body").on("click", ".btn-delete", function(){
        $(this).parents("tr").remove();
    });

</script>