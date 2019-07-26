
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
                    <div  style="padding-left: 15px">
                                
                                 <a class="btn btn-flat btn-primary mb-3" href="<?php echo site_url()?>/Purch_req" role="button"><i class="fa fa-arrow-left"></i> Back</a>
                            </div>
                        <div class="card">

      
                                <div class="card-body">                                           
                         <div class="col-md-12">
                                            <div class="row">
                                                 
                                                <div class="col-md-2">
                                                     <label class="control-label " for="group_name">Nomor PR :</label>
                                                 </div>
                                            <div class="col-sm-4">
                                              <input type="text" name="id_pr" id="id_pr" hidden="" value="<?php echo $list[0]->id?>">
                                                <input type="text" class="form-control" name="no_po" style="margin-bottom: 25px" value="<?php echo $list[0]->pr_no?>" disabled="true">
                                            </div>
                                                <div class="col-md-2">
                                                     <label class="control-label " for="no_barang">Tanggal :</label>
                                                 </div>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="tgl" name="tgl" value="<?php echo $list[0]->tgl?>" style="margin-bottom: 25px" disabled="true">
                                            </div>
                                        </div>
                                </div>
                                <div class="col-md-12">
                                        <div class="row">

                                            <div class="col-md-2">
                                                <label class="control-label" for="alamat">PIC :</label>
                                            </div>
                                            <div class="col-sm-4" >
                                                <input type="text" class="form-control" id="pic" name="pic" value="<?php echo $list[0]->pic_request?>" style="margin-bottom: 25px" disabled="true">
                                             
                                            </div>

                                            <div class="col-md-2">
                                             <label class="control-label" for="attention">SECTION :</label>
                                         </div>
                                         <div class="col-sm-4">
                                             <input type="text" class="form-control" id="eta" name="eta" value="<?php echo $list[0]->section?>" style="margin-bottom: 25px" disabled="true">
                                        </div>

                                        </div>
                                    </div> 
    </div>
</div>
<br>
  <?php echo form_open('Purch_req/tambah/'.$id)?>
<div class="card">
         <div class="card-body">
           <table class="table" style="width: 950px">
          <thead >
          <th> Barang </th>
          <th> Qty</th>
          <th> Satuan</th>
           <th> action</th>
        </thead>
        <tbody id="insert-form">

      <?php $no=1;foreach ($detail as $key) {
        if(!empty($key->id_purch)){
        ?>
         <tr>
           <td><?php echo $key->item_barang;?></td>
                <td><?php echo $key->qty;?></td>
          <td><?php echo $key->unit_name; ?></td>
          <td id="<?php echo $no ?>"> <a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" onclick="modalDelete('<?php echo $key->id_item?>','<?php echo $no?>')"  data-toggle="modal" data-target="#Modal_Delete"><i class="fa fa-trash"> </i></a></td>
        </tr>

      <?php }else{ ?>

           <tr>
              <input type="hidden" class="form-control" name="id[]" value="<?php echo $id; ?>" >
          <td>  <select class="namaBarang form-control" style="width:300px" name="item[]" required=""><option></option></select></td>
          <td><input type="number" class="form-control" style="width:100px" name="qty[]" id="qty1" required=""></td>
          <td><select name="unit[]" class="form-control" required="">
                                            <?php foreach ($unit as $key) {?>
                                                
                                            <option value="<?php echo $key->unit_barang?>"><?php echo $key->unit_barang?></option>
                                        <?php } ?></select></td>
          <td> <button class="btn btn-delete btn-danger"> <i class="fa fa-trash"> </i></button></td>
        </tr>
      <?php } $no++;} ?>
        <tr>
            <input type="hidden" class="form-control" name="id[]" value="<?php echo $id; ?>" >
          <td>  <select class="namaBarang form-control" style="width:300px" name="item[]" id="item" required=""><option></option></select></td>
          <td><input type="number" class="form-control" style="width:100px" name="qty[]" id="qty1" required=""></td>
          <td><select name="unit[]" class="form-control" required="">
                                            <?php foreach ($unit as $key) {?>
                                                
                                            <option value="<?php echo $key->unit_barang?>"><?php echo $key->unit_barang?></option>
                                        <?php } ?></select>
                                      </td>
          <td> <button class="btn btn-delete btn-danger"> <i class="fa fa-trash"> </i></button></td>
        </tr>
   

      </tbody>
        </table>
        <div align="right">
        <button class="btn btn-success" type="submit"><i class="ti-save"></i>  Simpan</button>
        <button type="button" class="btn btn-info" id="btn-tambah-form"><i class="ti-plus"></i>  Tambah Data Form</button>
        
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
  <form>
            <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                       <strong>Are you sure to delete this record?</strong>
                  </div>
                  <div class="modal-footer">
                    <input hidden="" name="id_item_delete" id="id_item_delete" class="form-control">
                       <input hidden="" name="id" id="id" class="form-control">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
 <script>
    $(document).ready(function(){ 

   

        $("#btn-tambah-form").click(function(){ // Ketika tombol Tambah Data Form di klik
            var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
            var x = jumlah + 1; // Tambah 1 untuk jumlah form nya       
            // Kita akan menambahkan form dengan menggunakan append
            // pada sebuah tag div yg kita beri id insert-form
           

              $("#insert-form").append("<tr><td><select class='namaBarang"+x+" form-control' style='width:300px' name='item[]'><option></option></select></td><td><input type='number' class='form-control' style='width:100px' name='qty[]' required=''></td><td><select name='unit[]' class='form-control' required=''><?php foreach ($unit as $key) {?> <option value='<?php echo $key->unit_barang?>'><?php echo $key->unit_barang?></option><?php } ?></select></td><td> <button class='btn btn-delete btn-danger'> <i class='fa fa-trash'> </i></button></td></tr>");


            $("#scriptt").append("<script type='text/javascript'>$('.namaBarang"+x+"').select2({ placeholder: '--- Select Item ---',        ajax: { url: '<?php echo site_url()?>/Purch_req/getBarang/',  dataType: 'json', delay: 250, processResults: function (data) {  return { results: data };},cache: true}});");
            
            
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
   
         $('.namaBarang').select2({
        placeholder: '--- Select Item ---',
        ajax: {
          url: '<?php echo site_url()?>/Purch_req/getBarang/',
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

  $("body").on("click", ".btn-delete", function(){
        $(this).parents("tr").remove();
    });


    function modalDelete(id,no){
        document.getElementById('id_item_delete').value = id;
        document.getElementById('id').value=no;
      
    }
 
        //delete record to database
         $('#btn_delete').on('click',function(){
            var id_item = $('#id_item_delete').val();
               var id = $('#id').val();
         
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('Purch_req/deleteItem')?>",
                dataType : "JSON",
                data : {id_item:id_item},
                success: function(data){
                  if(data== null){
                     alert('Item tidak bisa dihapus karena memiliki nomor PO');
                   $('[name="id_item_delete"]').val("");
                    $('#Modal_Delete').modal('hide');}else{
                  console.log(data);
                   $('#'+id).parents("tr").remove();
                    $('[name="id_item_delete"]').val("");
                    $('#Modal_Delete').modal('hide');
                  }
                }
            });
            return false;
        });

         function edit(){
           document.getElementById("supplier").disabled = false;
           document.getElementById("eta").disabled = false;
           document.getElementById("franco").disabled = false;
        $("#edit").html("");
               $("#tombol").append("  <button id='btn-simpan'  onclick='simpan()' class='btn btn-success'> Simpan</button>");
         }

         function simpan(){
           document.getElementById("supplier").disabled = true;
           document.getElementById("eta").disabled = true;
           document.getElementById("franco").disabled = true;
                  var id_po = $('#id_po').val();
                  var eta = $('#eta').val();
                  var franco = $('#franco').val();
                                       var supplier = $('#supplier').val();
             $.ajax({
                type : "POST",
                url  : "<?php echo site_url('Po/update')?>",
                dataType : "JSON",
                data : {id_po:id_po, eta:eta, franco:franco, supplier: supplier },
                success: function(data){
                   $("#tombol").html("");
               $("#edit").append(" <button id='btn-edit' class='btn btn-info' onclick='edit()' style='align-items: right' > Edit</button>");
                    
                   
                }
            });
         }

</script>