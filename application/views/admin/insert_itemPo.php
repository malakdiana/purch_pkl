
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Master Data</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="<?php echo site_url()?>/Barang">Barang</a></li>
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
                                           
                                     <?php echo form_open('Po/tambah/'.$list[0]->id_po) ?>
                                     <h3 align="center">Form Barang PO</h3><br>
                                              
                                                <div class="form-group">
                                                     <label class="control-label " for="item_barang">Nomor PO:</label>
                                            <input type="text" class="form-control" name="no_po" value="<?php $list[0]->no_po?>" style="margin-bottom: 25px">
                                               
                                                  
                                            </div>

                                            <div class="form-group">
                                                     <label class="control-label " for="qty">Tanggal</label>
                                           
                                                <input type="text" class="form-control" name="tanggal" value="<?php $list[0]->tgl_po?>" style="margin-bottom: 25px">
                                            </div>
    <div id="insert-form"></div>
                                           
   
   
                                     
        
          
              <div align="right"> <button type="submit" class="btn btn-primary" style="align-self: right">Simpan</button></div>
              <?php echo form_close() ?>
                <input type="hidden" id="jumlah-form" value="1">
           

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
            $("#insert-form").append("<div style='margin-bottom: 10px'><hr>Data Barang " + nextform + "</div>" +
                " <input type='hidden' class='form-control' name='id[]' id='id' value='<?php echo $id; ?>' >" +
                "<div class='form-group'> <label class='control-label' for='item'>ITEM BARANG:</label> <input type='text' class='form-control' name='item[]'' style='margin-bottom: 25px'></div><div class='form-group'> <label class='control-label' for='qty'>QTY :</label><input type='text' class='form-control' name='qty[]' style='margin-bottom: 25px'></div>");
            
            $("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
        });
        
        // Buat fungsi untuk mereset form ke semula
        $("#btn-reset-form").click(function(){
            $("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
            $("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
        });
    });
    </script>