 <link rel="stylesheet" href="<?php echo base_url()?>assets/css/nav.css">
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Data</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="<?php echo site_url()?>/Barang">Quotation Request</a></li>
                                <li><span>Tambah Vendor</span></li>
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
                      
                                    <div class="container"> 
        

                                    <div class="w3-bar w3-indigo">
  <button class="w3-bar-item w3-button" onclick="openCity('London')">Tambah Vendor</button>
  <button class="w3-bar-item w3-button" onclick="openCity('Paris')">List Vendor</button>
</div>
  <div class="card">
                                <div class="card-body">
<div id="London" class="w3-container w3-display-container city">
 <button type="button" class="btn btn-success" id="btn-tambah-form">Tambah Data Form</button> <button type="button" id="btn-reset-form" class="btn btn-primary">Reset Form</button><br><br>
                   <?php echo form_open_multipart('Qr/tambahVen/'.$id) ?>
                        <h3 align="center">Form Tambah Vendor</h3><br>
                                        <div style="margin-bottom: 10px"> 
                                                   <hr>Data Vendor 1
                                               </div>
                                               <input type="hidden" class="form-control" name="id[]" id="id" value="<?php echo $id; ?>" >
                                                <div class="form-group">
                                                     <label class="control-label " for="vendor">Vendor :</label>
                                           
                                               
                                                  <input type="text" class="form-control" name="vendor[]" style="margin-bottom: 25px">
                                            </div>

                                            <div class="form-group">
                                                     <label class="control-label " for="vendor">Harga :</label>
                                           
                                                <input type="text" class="form-control" name="harga[]" style="margin-bottom: 25px">
                                            </div>
                                            <div class="form-group">
                                                      <label class="control-label " for="file">Attechment :</label>
                                           
                                                <input type="file" class="form-control" name="userfiles[]" style="margin-bottom: 25px">
                                            </div>
                                            <div id="insert-form"></div>          
              <div align="right"> <button type="submit" class="btn btn-primary" style="align-self: right">Simpan</button></div>
              <?php echo form_close() ?>
                <input type="hidden" id="jumlah-form" value="1">    
</div>

<div id="Paris" class="w3-container w3-display-container city" style="display:none">
 
  <table cellpadding="0" cellspacing="0" border="0" class="table table-striped" id="dataTablesss">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                                <th>NO</th>
                                                <th>Tanggal</th>
                                                <th>Nama Supplier</th>
                                                <th>Harga</th>
                                                <th>Attacment</th>
                                                <th >ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php   $no=1; foreach ($vendor as $key) {?>
                                            <tr>
                                            
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $key->tanggal;?></td>
                                                <td><?php echo $key->nama_vendor;?></td>
                                                <td><?php echo $key->harga;?></td>
                                                <td><?php echo $key->detail;?></td>
                                                <td><button>edit</button></td></tr>
                                                <?php $no++;} ?>
                                       
                                        </tbody>
                                    </table>
                                                
</div>


</div>
</div>
</div>
</div>
</div>
</div>


 <?php $this->load->view('admin/footer'); ?>
 <script>
    $(document).ready(function(){ // Ketika halaman sudah diload dan siap
        $("#btn-tambah-form").click(function(){ // Ketika tombol Tambah Data Form di klik
            var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
            var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya
            
            // Kita akan menambahkan form dengan menggunakan append
            // pada sebuah tag div yg kita beri id insert-form
            $("#insert-form").append("<div style='margin-bottom: 10px'><hr>Data Vendor " + nextform + "</div>" +
                " <input type='hidden' class='form-control' name='id[]' id='id' value='<?php echo $id; ?>' >" +
                "  <div class='form-group'><label class='control-label' for='vendor'>Vendor :</label><input type='text' class='form-control' name='vendor[]' style='margin-bottom: 25px'></div><div class='form-group'><label class='control-label' for='vendor'>Harga :</label><input type='text' class='form-control' name='harga[]' style='margin-bottom: 25px'></div><div class='form-group'><label class='control-label' for='file'>Attechment :</label><input type='file' class='form-control' name='userfiles[]' style='margin-bottom: 25px'></div>");
            
            $("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
        });
        
        // Buat fungsi untuk mereset form ke semula
        $("#btn-reset-form").click(function(){
            $("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
            $("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
        });
    });
    </script>
   <script>
function openCity(cityName) {
  var i;
  var x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  document.getElementById(cityName).style.display = "block";  
}
</script>