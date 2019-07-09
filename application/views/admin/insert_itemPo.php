
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
                         <div class="col-md-12">
                                            <div class="row">
                                                 
                                                <div class="col-md-2">
                                                     <label class="control-label " for="group_name">Nomor PO :</label>
                                                 </div>
                                            <div class="col-sm-4">
                                              <input type="text" name="id_po" id="id_po" hidden="" value="<?php echo $list[0]->id_po?>">
                                                <input type="text" class="form-control" name="no_po" style="margin-bottom: 25px" value="<?php echo $list[0]->no_po?>" disabled="true">
                                            </div>
                                                <div class="col-md-2">
                                                     <label class="control-label " for="no_barang">Tanggal :</label>
                                                 </div>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="tgl_po" name="tgl_po" value="<?php echo $list[0]->tgl_po?>" style="margin-bottom: 25px" disabled="true">
                                            </div>
                                        </div>
                                </div>
                                <div class="col-md-12">
                                        <div class="row">

                                            <div class="col-md-2">
                                                <label class="control-label" for="alamat">Supplier :</label>
                                            </div>
                                            <div class="col-sm-4 siap" >
                                              <select name="supplier" id="supplier" class="form-control" style="height: 45px" disabled="true">
                                                <?php foreach ($supplier as $key) {
                                                  
                                                ?>
                                                <option value="<?php echo $key->nama_supplier?>" class="form-control"> <?php echo $key->nama_supplier?></option>
                                            
                                               <?php } ?>
                                                 </select>
                                             
                                            </div>

                                            <div class="col-md-2">
                                             <label class="control-label" for="attention">ETA :</label>
                                         </div>
                                         <div class="col-sm-4">
                                             <input type="date" class="form-control" id="eta" name="eta" value="<?php echo $list[0]->eta?>" style="margin-bottom: 25px" disabled="true">
                                        </div>

                                        </div>
                                    </div> 
                                     <div class="col-md-12">
                                        <div class="row">

                                            <div class="col-md-2 ">
                                                <label class="control-label" for="alamat">Franco :</label>
                                            </div>
                                            <div class="col-sm-4 fran">
                                             <select name="franco" id="franco" class="form-control" style="height: 45px" disabled="true">
                                              <option class="form-control" value="SAI-T">SAI-T</option>
                                              <option class="form-control" value="SAI-B">SAI-B</option>

                                              </select>
                                            
                                             
                                            </div>
                                              <div class="col-sm-5" >
                                              </div>
                                            <div id="tombol"></div>

                                   
                                            
                                              <div id="edit">
                                     
                                             <button id="btn-edit" class="btn btn-info" onclick="edit()" style="align-items: right" > Edit</button>
                                           </div>

                                           

                                        </div>
                                    </div> 


    </div>
</div>
<br>
  <?php echo form_open('Po/insertPr/'.$list[0]->id_po)?>
<div class="card">
         <div class="card-body">
           <table class="table" >
          <thead >
          <th> Nomor PR </th>
          <th> Barang </th>
          <th> Qty Butuh </th>
          <th> Satuan</th>
          <th> Qty PO </th>
          <th> Harga (Rp)</th>
           <th> action</th>
        </thead>
        <tbody id="insert-form">

      <?php $no=1;foreach ($detail as $key) {
        if(!empty($key->no_pr)){
        ?>
         <tr>
          <td> <?php echo $key->no_pr; ?></td>
           <td><?php echo $key->item;?></td>
          <td> </td>
          <td><?php echo $key->unit; ?></td>
          <td><?php echo $key->qty;?></td>
       
          <td><?php echo "Rp " . number_format($key->harga,2,',','.');?> </td>
          <td id="<?php echo $no ?>"> <a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" onclick="modalDelete('<?php echo $key->id_bayangan?>','<?php echo $no?>')"  data-toggle="modal" data-target="#Modal_Delete"><i class="fa fa-trash"> </i></a></td>
        </tr>

      <?php }else{ ?>

           <tr>
          <td> <select class="itemName form-control" style="width:200px" name="itemName[]"></select></td>
          <td>  <select class="namaBarang form-control" style="width:300px" name="namaBarang[]" id="namaBarang"><option></option></select></td>
          <td> <input type="text" class="form-control" style="width:100px"name="qtysisa[]" id="qtysisa" readonly=""></td>
          <td><input type="text" class="form-control" style="width:100px" name="unit[]" id="unit" readonly=""></td>
          <td><input type="text" class="form-control" style="width:100px" name="qty[]" id="qty1" required=""></td>
          <td><input type="text" class="form-control" name="harga[]" required="" id="rupiah"></td>
          <td> <button class="btn btn-delete btn-danger"> <i class="fa fa-trash"> </i></button></td>
        </tr>
      <?php } $no++;} ?>
        <tr>
          <td> <select class="itemName form-control" style="width:200px" name="itemName[]"></select></td>
          <td>  <select class="namaBarang form-control" style="width:300px" name="namaBarang[]" id="namaBarang"><option></option></select></td>
          <td> <input type="text" class="form-control" style="width:100px"name="qtysisa[]" id="qtysisa" readonly=""></td>
          <td><input type="text" class="form-control" style="width:100px" name="unit[]" id="unit" readonly=""></td>
          <td><input type="text" class="form-control" style="width:100px" name="qty[]" id="qty1" required=""></td>
          <td><input type="text" class="form-control" name="harga[]" required="" id="rupiah"></td>
          <td> <button class="btn btn-delete btn-danger"> <i class="fa fa-trash"> </i></button></td>
        </tr>
   

      </tbody>
        </table>
        <div align="right">
        <button class="btn btn-success" type="submit">Simpan</button>
        <button type="button" class="btn btn-info" id="btn-tambah-form">Tambah Data Form</button>
        <button type="button" id="btn-reset-form" class="btn btn-warning">Reset Form</button>
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
                    <input hidden="" name="id_bayangan_delete" id="id_bayangan_delete" class="form-control">
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

      var val2 = <?php echo json_encode($list[0]->supplier);?> ;
      var val3 = <?php echo json_encode($list[0]->franco);?> ;
      $("div.siap select").val(val2);
      $("div.fran select").val(val3);

        $("#btn-tambah-form").click(function(){ // Ketika tombol Tambah Data Form di klik
            var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
            var x = jumlah + 1; // Tambah 1 untuk jumlah form nya       
            // Kita akan menambahkan form dengan menggunakan append
            // pada sebuah tag div yg kita beri id insert-form
           

              $("#insert-form").append("<tr id='"+x+"'><td> <select class='itemName"+x+" form-control' style='width:200px' name='itemName[]'></select></td><td> <select class='namaBarang"+x+" form-control'  style='width:300px' name='namaBarang[]' id='namaBarang"+x+"'><option></option></select></td><td> <input type='text' class='form-control' style='width:100px' name='qtysisa[]'' id='qtysisa"+x+"' readonly=''></td>   <td><input type='text' class='form-control' style='width:100px' name='unit[]' id='unit"+x+"' readonly=''></td><td><input type='text' class='form-control' style='width:100px' name='qty[]' id='qty"+x+"' required=''></td><td><input type='text' class='form-control' name='harga[]' required='' id='rupiah"+x+"'></td> <td> <button class='btn btn-delete btn-danger'> <i class='fa fa-trash'> </i></button></td>   </tr>");


            $("#scriptt").append("<script type='text/javascript'>$('.itemName"+x+"').select2({placeholder: '--- Select Item ---',ajax: {url: '<?php echo site_url()?>/Po/getPr',dataType: 'json',delay: 250,processResults: function (data) {return {results: data };},cache: true}});$('.itemName"+x+"').change(function () {document.getElementById('namaBarang"+x+"').value ='';var val = $(this).val(); $('.namaBarang"+x+"').select2({placeholder: '--- Select Item ---',ajax: {url: '<?php echo site_url()?>/Po/getBarang/'+val,dataType: 'json',delay: 250,processResults: function (data) { return {results: data};},cache: true}}); }); $('.namaBarang"+x+"').change(function () { var val = $(this).val(); $.ajax({type : 'POST',url: '<?php echo site_url('Po/getQtyBarang')?>',data : {ids: val},dataType: 'json',}).done(function(data){document.getElementById('qtysisa"+x+"').value = data.qty;          document.getElementById('unit"+x+"').value = data.unit;})});  var rupiah"+x+" = document.getElementById('rupiah"+x+"');rupiah"+x+".addEventListener('keyup', function(e) { rupiah"+x+".value = formatRupiah(this.value, 'Rp. ');});");
            
            
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


    function modalDelete(id,no){
        document.getElementById('id_bayangan_delete').value = id;
        document.getElementById('id').value=no;
      
    }
 
        //delete record to database
         $('#btn_delete').on('click',function(){
            var id_bayangan = $('#id_bayangan_delete').val();
               var id = $('#id').val();
          $('#'+id).parents("tr").remove();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('Po/deleteBayangan')?>",
                dataType : "JSON",
                data : {id_bayangan:id_bayangan},
                success: function(data){
                    $('[name="id_bayangan_delete"]').val("");
                    $('#Modal_Delete').modal('hide');
                    
                   
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