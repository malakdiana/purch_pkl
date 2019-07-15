
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
                            <?php echo form_open('Invoice/addDocRec'); ?>
                                            <div class="row">
                                                 
                                                <div class="col-md-1">
                                                     <label class="control-label " for="group_name">VP Date :</label>
                                                 </div>
                                            <div class="col-sm-5">
                                           
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
                                                 
                                                <div class="col-md-1">
                                                     <label class="control-label " for="group_name">No Receipt :</label>
                                                 </div>
                                            <div class="col-sm-5">
                                                <div class="row">
                                            <input type="text" class="form-control" value="REC" name="rec" style="margin-bottom: 25px;width: 100px" readonly="" >
                                                <input type="text" class="form-control" required="" minlength="3" maxlength="3" name="no_rec" style="margin-bottom: 25px;width: 100px" placeholder="000">
                                                  
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
                                            <input type="text" class="form-control" name="tambahan" style="margin-bottom: 25px;width: 100px" placeholder="A-Z">
                                            </div>
                                        </div>
                                                <div class="col-md-2">
                                                     <label class="control-label " for="no_barang">Supplier :</label><br><br>
                                                   
                                                 </div>
                                            <div class="col-sm-4">
                                                 <select class="supplier form-control"  name="supplier"></select><br><Br>
                                                
                                            
                                            </div>

                                        </div>
                                </div>
                      <br>

<div class="card">
         <div class="card-body">
           <table class="table" >
          <thead >
          <th style="width: 250px"> Nomor PO </th>
          <th> Barang </th>
          <th> No Invoice  </th>
          <th> Invoice Date</th>
           <th> action</th>
        </thead>
  <tbody id="insert-form">
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
        <button type="button" id="btn-reset-form" class="btn btn-primary">Reset Form</button>
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
           

              $("#insert-form").append(" <tr id='"+x+"'><td><select class='noPo"+x+" form-control' name='no_po[]'></select></td><td><input type='text' class='form-control' name='barang[]' id='barang"+x+"' style='margin-bottom: 25px' readonly=''></td><td><input type='text' class='form-control' name='no_invoice[]' style='margin-bottom: 25px' required=''></td><td><input type='text' class='form-control' name='invoice_date[]' style='margin-bottom: 25px' required=''></td> <td><button class='btn btn-delete btn-danger'> <i class='fa fa-trash'> </i></button></td></tr>");


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
</script>