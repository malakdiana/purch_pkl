
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Input Data</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="<?php echo site_url()?>/Purch_req">Purchase Request</a></li>
                                <li><span>Insert Purchase Request</span></li>
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
                                     <?php echo form_open('Purch_req/tambahPR') ?>
                                      <div class="col-md-12">
                                        <div class="row">

                                            <div class="col-md-2">
                                                <label class="control-label" for="tgl">Tanggal:</label>
                                            </div>
                                            <div class="col-sm-3">
                                              <input type="text" value="<?php date_default_timezone_set('Asia/Jakarta');echo date('d-m-Y')?>" readonly="" class="form-control" id="tgl" name="tgl" style="margin-bottom: 25px">
                                             
                                            </div>

                                            <div class="col-md-1">
                                                <label class="control-label " for="jam">Jam :</label>
                                         </div>
                                         <div class="col-sm-4">
                                             <input type="text" value="<?php echo date('H:i:s')?>" readonly="" class="form-control" id="jam" name="jam" style="margin-bottom: 25px">
                                        </div>

                                        </div>
                                    </div> 

                                    <div class="col-md-12">
                                        <div class="row">

                                            <div class="col-md-2">
                                                 <label class="control-label " for="nik">NIK :</label>
                                            </div>
                                            <div class="col-sm-3">
                                                 <input type="text" class="form-control" name="nik" style="margin-bottom: 25px;}" autocomplete="off" required="">
                                             
                                            </div>

                                            <div class="col-md-1">
                                             <label class="control-label " for="pic_request">PIC REQUEST :</label>
                                         </div>
                                         <div class="col-sm-4">
                                            <input type="text" class="form-control" name="pic_request" style="margin-bottom: 25px" autocomplete="off" required="">
                                        </div>

                                        </div>
                                    </div> 

                                    <div class="col-md-12">
                                        <div class="row">

                                            <div class="col-md-2">
                                                 <label class="control-label " for="section">SECTION</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <select class="form-control" name="section" id="section" required="">
                                            <option value="">PILIH :</option>
                                            <?php foreach ($section as $key) {?>

                                           <option class="form-control" value="<?php echo $key->nama_section?>"><?php echo $key->nama_section?> </option> <?php }?>
                                           </select>
                                             
                                            </div>

                                            <div class="col-md-1">
                                             <label class="control-label " for="pr_no">NOMER PR:</label>
                                         </div>
                                         <div class="col-sm-4">
                                           <div class="row"style="margin-left: 4px">    
                                                <input type="text" class="form-control" minlength="3" maxlength="3" name="pr_no" style="margin-bottom: 25px;width: 100px" placeholder="000" autocomplete="off" required="" id="pr_no">
                                                  <input type="text" class="form-control"  name="section_kode" id="section_kode" style="margin-bottom: 25px;width: 100px" readonly="">
                                                <select name="bulan" class="form-control" style="margin-bottom: 25px;width: 100px; height: 50px" required="">
                                           
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
                                                <select name="tahun" class="form-control" style="margin-bottom: 25px;width: 100px; height: 50px" required="">
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
   
<br><br>


        <table class="table" style="width: 1200px">
          <thead >
          <th style="width: 300px"> Item </th>
          <th style="width: 200px"> Satuan </th>
          <th style="width: 100px"> Qty </th>
          <th style="width: 500px"> Detail</th>
           <th> action</th>
        </thead>
        <tbody id="insert-form">
        <tr> 
                                               
          <td>  <select class="itemName form-control" name="item[]"></select></td>
          <td>  <select name="unit[]" class="form-control" required="">
                <?php foreach ($unit as $key) {?>
                  <option value="<?php echo $key->unit_barang?>"><?php echo $key->unit_barang?></option>
                  <?php } ?></select></td>
          <td> <input type="text" class="form-control" name="qty[]" style="margin-bottom: 25px"></td>
                <td> <input type="text" class="form-control" name="detail[]" style="margin-bottom: 25px"></td>
          <td> <button class="btn btn-delete btn-danger"> <i class="fa fa-trash"> </i></button></td>
        </tr>
   

      </tbody>
        </table>
        <div align="right" style="margin-right:200px;">
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
<script type="text/javascript">
    $("#section").change(function () { var val = $(this).val();
       // var x = document.getElementById("section").value;
        document.getElementById("section_kode").value= val;
        });
</script>
<link href="<?php echo base_url()?>assets/css/select2.min.css" rel="stylesheet" />
  <script src="<?php echo base_url()?>assets/js/select2.min.js"></script>
 <script>
    $(document).ready(function(){ // Ketika halaman sudah diload dan siap
        $("#btn-tambah-form").click(function(){ // Ketika tombol Tambah Data Form di klik
            var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
            var x = jumlah + 1; // Tambah 1 untuk jumlah form nya       
            // Kita akan menambahkan form dengan menggunakan append
            // pada sebuah tag div yg kita beri id insert-form
           

              $("#insert-form").append(" <tr id='"+x+"'><td> <select class='itemName"+x+" form-control' name='item[]'></select></td><td><select name='unit[]' class='form-control' required=''><?php foreach ($unit as $key) {?><option value='<?php echo $key->unit_barang?>'><?php echo $key->unit_barang?></option><?php } ?></select></td><td> <input type='text' class='form-control' name='qty[]' style='margin-bottom: 25px'></td><td> <input type='text' class='form-control' name='detail[]'' style='margin-bottom: 25px'></td><td> <button class='btn btn-delete btn-danger'> <i class='fa fa-trash'> </i></button></td></tr>");


            $("#scriptt").append(" <script type='text/javascript'>$('.itemName"+x+"').select2({placeholder: '--- Select Item ---', ajax: { url: '<?php echo site_url()?>/Purch_req/getBarang', dataType: 'json',delay: 250, processResults: function (data) {return {results: data };}, cache: true}});");
            
            
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
      $('.itemName').select2({
        placeholder: '--- Select Item ---',
        ajax: {
          url: '<?php echo site_url()?>/Purch_req/getBarang',
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
 $("body").on("click", ".btn-delete", function(){
        $(this).parents("tr").remove();
    });


   var pr= document.getElementById("pr_no");
pr.addEventListener("keyup", function(e) {
  pr.value = formatAngka(this.value);
});
function formatAngka(angka) {
  var number_string = angka.replace(/[^,\d]/g, "").toString();
  return number_string;
}
    </script>