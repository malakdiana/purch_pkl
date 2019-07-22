
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Data</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="#">Purchase Request</a></li>
                                <li><span>List purchase request /</span></li>
                                <li><span>Tambah Item Barang</span></li>
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
                                            <button type="button" class="btn btn-success" id="btn-tambah-form">Tambah Data Form</button>
        <button type="button" id="btn-reset-form" class="btn btn-primary">Reset Form</button><br><br>
                                     <?php echo form_open('Purch_req/tambah/'.$id) ?>
                                    
                                       
                                               <div style="margin-bottom: 10px"> 
                                                   <hr>Data Barang 1
                                               </div>
                                               <input type="hidden" class="form-control" name="id[]" id="id" value="<?php echo $id; ?>" >
                                                <div class="form-group">
                                                     <label class="control-label " for="item_barang">ITEM BARANG:</label><br>
                                            <select class="itemName form-control" style="width:500px" name="item[]"></select>
                                               
                                                  
                                            </div>

                                            <div class="form-group">
                                                     <label class="control-label " for="qty">QTY :</label>
                                           
                                                <input type="text" class="form-control" name="qty[]" style="margin-bottom: 25px">
                                            </div>

                                            <div class="form-group">
                                                     <label class="control-label " for="unit">SATUAN :</label>
                                           <select name="unit[]" class="form-control" required="">
                                            <?php foreach ($unit as $key) {?>
                                                
                                            <option value="<?php echo $key->unit_barang?>"><?php echo $key->unit_barang?></option>
                                        <?php } ?>
                                               
                                           </select>
                                               
                                            </div>
    <div id="insert-form"></div>
                                           
   
   
              <input type="hidden" id="jumlah-form" value="1" name="jumlah">                        
        
          
              <div align="right"> <button type="submit" class="btn btn-success" style="align-self: right"><i class="ti-save"></i>  Simpan</button></div>
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
            $("#insert-form").append("<div style='margin-bottom: 10px'><hr>Data Barang " + x + "</div>" +
                " <input type='hidden' class='form-control' name='id[]' id='id' value='<?php echo $id; ?>' >" +
                "<div class='form-group'> <label class='control-label' for='item'>ITEM BARANG:</label> <br><select class='itemName"+x+" form-control' style='width:500px' name='item[]'></select></div><div class='form-group'> <label class='control-label' for='qty'>QTY :</label><input type='text' class='form-control' name='qty[]' style='margin-bottom: 25px'></div> <div class='form-group'><label class='control-label' for='unit'>SATUAN :</label><select name='unit[]' class='form-control' required=''><?php foreach ($unit as $key) {?><option value='<?php echo $key->unit_barang?>''><?php echo $key->unit_barang?></option><?php } ?> </select></div>");
             $("#scriptt").append("<script type='text/javascript'>$('.itemName"+x+"').select2({placeholder: '--- Select Item ---',ajax: {url: '<?php echo site_url()?>/Purch_req/getBarang',dataType: 'json',delay: 250,processResults: function (data) {return {results: data };},cache: true}});");
            
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
      });</script>