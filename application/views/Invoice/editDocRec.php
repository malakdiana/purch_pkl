
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
                                                              
                  <?php $kode = explode('/',$docrec[0]->no_receipt);
                                     $nomor = explode('-', $kode[0]);
                                     $tahun = explode('-', $kode[3]);
                                     if(empty($tahun[1])){
                                      $tahun[1]="";
                                     }

                                      ?>     

                                                                     
                         <div class="col-md-12">
                                            <div class="row">
                                                 
                                                <div class="col-md-1">
                                                     <label class="control-label " for="group_name">No Receipt :</label>
                                                 </div>
                                            <div class="nomor col-sm-5">
                                             <input type="text" name="id" id="id_receipt" hidden="" value="<?php echo $docrec[0]->id_receipt ?>">
                                            <input type="text" class="form-control" value="<?php echo $docrec[0]->no_receipt ?>" name="rec" style="margin-bottom: 25px;" readonly="" >

                             
                                        </div>
                                                <div class="col-md-1">
                                                     <label class="control-label " for="no_barang">Supplier :</label><br><br>
                                                   
                                                 </div>
                                            <div class="col-sm-4">
                                              <input type="text" name="id_sup" id="id_sup" value="<?php echo $docrec[0]->id_supplier ?>" hidden="">
                                               
                                                  <input type="text" class="form-control" value="<?php echo $docrec[0]->nama_supplier ?>" name="rec" style="margin-bottom: 25px;" readonly="" >
                                            
                                            </div>

                                        </div>
                                </div>
                                    <div class="col-md-12">
                          
                                            <div class="row">
                                                 
                                                <div class="col-md-1">
                                                     <label class="control-label " for="group_name">Date :</label>
                                                 </div>
                                            <div class="col-sm-5">
                                           
                                                <input type="date" class="form-control" name="vp_date" id="vp_date" style="margin-bottom: 25px" value="<?php echo $docrec[0]->vp_date ?>" disabled="true" >
                                            </div>
                                              <div class="col-sm-4" >
                                              </div>
                                            <div id="tombol"></div>

                                   
                                            
                                              <div id="edit">
                                   
                                             <button id="btn-edit" class="btn btn-info" onclick="edit()" style="align-items: right" > Edit</button>
                                           <a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" onclick="modalDeleteDocRec('<?php echo $docrec[0]->id_receipt ?>')"  data-toggle="modal" data-target="#Modal_Delete_Docrec">Hapus</a>
                                           </div>
                                       
                                          </div>
                                     
                                </div>
                      <br>

<div class="card">
         <div class="card-body">
             <?php echo form_open('Invoice/tambahDocRec/'.$docrec[0]->id_receipt); ?>        
           <table class="table" >
          <thead >
          <th style="width: 250px"> Nomor PO </th>
          <th> Barang </th>
          <th> No Invoice  </th>
          <th> Invoice Date</th>
           <th> action</th>
        </thead>
  <tbody id="insert-form">
    <?php $no=1; foreach ($list as $key ) { ?>
        <tr> 
                                               
          <td><?php echo $key->no_po; ?></td>
          <td><?php echo $key->barang; ?></td>
          <td><?php echo $key->no_invoice; ?></td>
          <td><?php echo $key->tgl_invoice; ?></td>
          <td id="<?php echo $no ?>"> <a href="" data-toggle="modal" onclick="modalEdit('<?php echo $key->id_detail ?>','<?php echo $key->no_po; ?>','<?php echo $key->barang; ?>','<?php echo $key->no_invoice; ?>','<?php echo $key->tgl_invoice; ?>')" data-target="#myModalEdit" class="btn btn-info"> <i class="fa fa-edit"> </i></a> <a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" onclick="modalDelete('<?php echo $key->id_detail?>','<?php echo $no?>')"  data-toggle="modal" data-target="#Modal_Delete"><i class="fa fa-trash"> </i></a></td>
        </tr>
   <?php $no++;} ?>
     <tr> 
                                               
          <td><select class="noPo form-control" name="no_po[]"></select></td>
          <td><input type="text" class="form-control" name="barang[]" id="barang" style="margin-bottom: 25px" readonly=""></td>
          <td><input type="text" class="form-control" name="no_invoice[]" style="margin-bottom: 25px" required=""></td>
          <td><input type="date" class="form-control" name="invoice_date[]" style="margin-bottom: 25px" required=""></td>
          <td><button class="btn btn-delete btn-danger"> <i class="fa fa-trash"> </i></button></td>
        </tr>

      </tbody>
        </table>
        <div align="left">
        <button class="btn btn-warning" type="submit">Simpan</button>
        <button type="button" class="btn btn-success" id="btn-tambah-form">Tambah Data Form</button>

        <input type="hidden" id="jumlah-form" name="jumlah" value="1">
<?php echo form_close(); ?>
       </div>



</div>
</div>
</div>
</div>
</div>
</div>
</div>
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModalEdit" class="modal fade-in" >
        <div class="modal-dialog">
            <div class="modal-content" style="width: 800px; margin-left: -100px;padding: 20px" >
                <div class="modal-header">
                    <h4 class="modal-title">Edit</h4>
                     <button align="right" type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                  <?php echo form_open('Invoice/editDetail'); ?>
                  <div class=" form-group">
                     <input type="text" name="id" id="id" hidden="" value="<?php echo $docrec[0]->id_receipt ?>">
                    <input type="text" name="id_detail" id="id_detail" hidden="">
                    <label>No PO</label>
                    <input class="form-control" type="text" name="no_po" id="no_po" readonly="">
                  </div>

                  <div class=" form-group">
                    <label>Barang</label>
                    <input class="form-control" type="text" name="barang" id="barangg" readonly="">
                  </div>

                  <div class=" form-group">
                    <label>No Invoice</label>
                    <input class="form-control" type="text" name="no_invoice" id="no_invoice">
                  </div>

                  <div class=" form-group">
                    <label>Tanggal Invoice</label>
                    <input class="form-control" type="date" name="tgl_invoice" id="tgl_invoice">
                  </div>
                  <div>
                    <button class="btn btn-info" type="submit">Update</button>
                  </div>
                  <?php echo form_close(); ?>
                </div>
                </div>
              </div>
            </div>

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

      
            <div class="modal fade" id="Modal_Delete_Docrec" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                  <?php echo form_open('Invoice/hapusDocRec'); ?>
                  <div class="modal-footer">
                    <input hidden="" name="id_receipt_delete" id="id_receipt_delete" class="form-control">
                    <button  type="submit" id="btn_delete_receipt" class="btn btn-primary">Yes</button>
                    <?php echo form_close(); ?>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
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
           

              $("#insert-form").append(" <tr id='"+x+"'><td><select class='noPo"+x+" form-control' name='no_po[]'></select></td><td><input type='text' class='form-control' name='barang[]' id='barang"+x+"' style='margin-bottom: 25px' readonly=''></td><td><input type='text' class='form-control' name='no_invoice[]' style='margin-bottom: 25px' required=''></td><td><input type='date' class='form-control' name='invoice_date[]' style='margin-bottom: 25px' required=''></td> <td><button class='btn btn-delete btn-danger'> <i class='fa fa-trash'> </i></button></td></tr>");


            $("#scriptt").append("<script type='text/javascript'>  $('.noPo"+x+"').select2({ placeholder: '--- Select Item ---', ajax: {url: '<?php echo site_url()?>/Po/getPObySup/'+sup, dataType: 'json', delay: 250,processResults: function (data) { return {results: data };},     cache: true }}); $('.noPo"+x+"').change(function () { var val = $(this).val(); var ckbox = $('#ppn"+x+"');   $.ajax({ type : 'POST', url: '<?php echo site_url('Po/getTotalPO')?>', data : {ids: val},dataType: 'json',    }).done(function(data){  document.getElementById('barang"+x+"').value = data.barang;})});");
            
            
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

    var sup = $('#id_sup').val();
     

         $('.noPo').select2({
        placeholder: '--- Select Item ---',
        ajax: {
          url: '<?php echo site_url()?>/Po/getPObySup/'+sup,
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

 $(".noPo").change(function () {
        var val = $(this).val(); 
       
      $.ajax({
          type : "POST",
          url: '<?php echo site_url('Po/getTotalPO')?>',
          data : {ids: val},
          dataType: 'json',  
      }).done(function(data){
       
                    document.getElementById('barang').value = data.barang;
              
      })
      });

  $("body").on("click", ".btn-delete", function(){
        $(this).parents("tr").remove();
    });


    function modalEdit(id_detail,no_po,barang,no_invoice,tgl_invoice){
       document.getElementById('id_detail').value = id_detail;
      document.getElementById('no_po').value = no_po;
      document.getElementById('barangg').value = barang;
      document.getElementById('no_invoice').value = no_invoice;
      document.getElementById('tgl_invoice').value = tgl_invoice;
    }



      function modalDelete(id,no){
        document.getElementById('id_item_delete').value = id;
        document.getElementById('id').value=no;
      
    }
    function modalDeleteDocRec(id){
  document.getElementById('id_receipt_delete').value = id;
    }
 
        //delete record to database
         $('#btn_delete').on('click',function(){
            var id_detail = $('#id_item_delete').val();
               var id = $('#id').val();
          $('#'+id).parents("tr").remove();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('Invoice/deleteDetail')?>",
                dataType : "JSON",
                data : {id_detail:id_detail},
                success: function(data){
                    $('[name="id_item_delete"]').val("");
                    $('#Modal_Delete').modal('hide');
                    
                   
                }
            });
            return false;
        });

          function edit(){
           
              document.getElementById('vp_date').disabled = false;
        $("#edit").html("");
               $("#tombol").append("  <button id='btn-simpan'  onclick='simpan()' class='btn btn-success'> Simpan</button>  <a href='<?php echo site_url()?>/Invoice/editDOcRec/<?php echo $docrec[0]->id_receipt?>' id='btn-batal' class='btn btn-info'>Batal</a>");
         }




         function simpan(){
               document.getElementById("vp_date").disabled = true;
                  var vp_date = $('#vp_date').val();
                  var id_receipt = $('#id_receipt').val();
             $.ajax({
                type : "POST",
                url  : "<?php echo site_url('Invoice/updateDocRec')?>",
                dataType : "JSON",
                data : {id_receipt:id_receipt, vp_date:vp_date},
                success: function(data){
                   $("#tombol").html("");
               $("#edit").append(" <button id='btn-edit' class='btn btn-info' onclick='edit()' style='align-items: right' > Edit</button>            <button id='delete' class='btn btn-danger'>Hapus</button>");
                    
                   
                }
            });
           }




                     

                
</script>