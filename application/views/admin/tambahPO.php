
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Form Purchase Order</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="<?php echo site_url()?>/Purch_req">Purchase Order</a></li>
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
                                     <h3 align="center">Insert Purchase Order</h3><br>
                                     <div class="col-md-12">
                                        <div class="row">

                                            <div class="col-md-2">
                                                <label class="control-label" for="alamat">Tanggal :</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" value="<?php date_default_timezone_set('Asia/Jakarta');echo date('d-m-Y H:i:s')?>" readonly="" class="form-control" id="tgl_po" name="tgl_po" style="margin-bottom: 25px">
                                            </div>

                                            <div class="col-md-1">
                                             <label class="control-label" for="attention">Nomor PO :</label>
                                         </div>
                                         <div class="col-sm-6">
                                           <div class="row">
                                               <input type="text" class="form-control" value="PO" name="no_po" style="margin-bottom: 25px;width: 100px" readonly="" >
                                                <input type="text" class="form-control" required="" minlength="3" maxlength="3" name="no_po" style="margin-bottom: 25px;width: 100px" placeholder="000">
                                                  
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
                                            <input type="date" class="form-control" id="eta" name="eta" value="">
                                        </div>

                                        </div>
                                    </div> 
                                              
 <button type="button" class="btn btn-success" id="btn-tambah-form">Tambah Data Form</button>
        <button type="button" id="btn-reset-form" class="btn btn-primary">Reset Form</button><br><br>
       <hr> <h6>Data Purchase Request 1 </h6><hr>
         <div class="form-group col-md-6">
                 <label class="control-label " for="nama">No Purchase Request :</label>
                  <select class="itemName form-control" style="width:500px" name="itemName[]"></select>
        </div>
         <div class="form-group col-md-6">
                 <label class="control-label " for="nama">Nama Barang :</label><br>
                <select class="namaBarang form-control" style="width:500px" name="namaBarang[]" id="namaBarang"><option></option></select>
        </div>
       <div class="row">
        <div class="col-md-6">
         <div class="form-group col-md-6">
                 <label class="control-label " for="nama">Qty :</label>
                <input type="text" class="form-control" name="qty[]" id="qty1" required="">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group col-md-6">
                 <label class="control-label " for="nama">Qty yang dibutuhkan :</label>
                <input type="text" class="form-control" name="qtysisa[]" id="qtysisa" readonly="">
        </div>
      </div>
    </div>
         <div class="form-group col-md-6">
                 <label class="control-label " for="nama">Harga :</label>
                <input type="text" class="form-control" name="harga[]" required="">
        </div>
        <div name="insert-form" id="insert-form">
        </div>
<input type="hidden" id="jumlah-form" name="jumlah" value="1">
        <button class="btn btn-success" type="submit">Simpan</button>

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
             $("#insert-form").append("<hr><h6>Data Purchase Request "+x+" </h6><hr><div class='form-group col-md-6'><label class='control-label' for='nama'>No Purchase Request :</label><select class='itemName"+x+" form-control' style='width:500px' name='itemName[]'></select></div><div class='form-group col-md-6'><label class='control-label' for='nama'>Nama Barang :</label><br><select class='namaBarang"+x+" form-control' style='width:500px' name='namaBarang[]' id='namaBarang"+x+"'><option></option></select></div><div class='row'><div class='col-md-6'><div class='form-group col-md-6'><label class='control-label'>Qty :</label><input type='text' class='form-control' name='qty[]' id='qty"+x+"' ></div></div><div class='col-md-6'><div class='form-group col-md-6'><label class='control-label'>Qty yang dibutuhkan :</label><input type='text' class='form-control' name='qtysisa[]' id='qtysisa"+x+"' readonly=''></div> </div>     </div><div class='form-group col-md-6'><label class='control-label' for='nama'>Harga :</label><input type='text' class='form-control' name='harga[]' ></div>");
            $("#scriptt").append("<script type='text/javascript'>$('.itemName"+x+"').select2({placeholder: '--- Select Item ---',ajax: {url: '<?php echo site_url()?>/Po/getPr',dataType: 'json',delay: 250,processResults: function (data) {return {results: data };},cache: true}});$('.itemName"+x+"').change(function () {document.getElementById('namaBarang"+x+"').value ='';var val = $(this).val(); $('.namaBarang"+x+"').select2({placeholder: '--- Select Item ---',ajax: {url: '<?php echo site_url()?>/Po/getBarang/'+val,dataType: 'json',delay: 250,processResults: function (data) { return {results: data};},cache: true}}); }); $('.namaBarang"+x+"').change(function () { var val = $(this).val(); $.ajax({type : 'POST',url: '<?php echo site_url('Po/getQtyBarang')?>',data : {ids: val},dataType: 'json',}).done(function(data){document.getElementById('qtysisa"+x+"').value = data.qty;})});");
            
            
            $("#jumlah-form").val(x); // Ubah value textbox jumlah-form dengan variabel nextform
        });   
        // Buat fungsi untuk mereset form ke semula
        $("#btn-reset-form").click(function(){
            $("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
            $("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
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
                    
      })
      });
      
</script>