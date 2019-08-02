
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Master Data</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="#">Approval</a></li>
                                <li><span>Data Approval</span></li>
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
                            <div  style="padding-top: 15px;padding-left: 15px">
                                <a class="btn btn-flat btn-primary mb-3" href="<?php echo site_url()?>/Approval/tambahApproval" role="button"><i class="fa fa-plus"></i> Tambah Data</a>
                                <a class="btn btn-flat btn-success mb-3" href="<?php echo site_url()?>/Approval/importApproval" role="button"><i class="ti-import"></i> Import Data</a>
                                <a class="btn btn-flat btn-warning mb-3" href="<?php echo site_url()?>/Approval/export" role="button"><i class="ti-download"></i> Download Data</a>
                                  <a class="btn btn-flat btn-danger mb-3"  onclick="return confirm('Apakah Yakin Untuk Menghapus Semua Data?')" href="<?php echo site_url()?>/Approval/kosongkan" role="button"><i class="ti-trash"></i> Hapus Semua Data</a>
                              </div>
                            <div class="card-body">
                        <?=$this->session->flashdata('editApproval')?>
                         <?=$this->session->flashdata('deleteApproval')?>
                         <?=$this->session->flashdata('tambahApproval')?>
                                <div>
                                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped" id="dataTablesss">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                                
                                                <th>NO</th>
                                                <th>NAMA</th>
                                                <th>KODE NAMA</th>
                                                <th>MIN</th>
                                                <th>MAX</th>
                                                
                                           
                                               
                                             <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1;  foreach ($app as $key) {?>
                                            <tr>
                                           
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $key->nama;?></td>
                                                <td><?php echo $key->kode_nama;?></td>
                                                <td><?php echo "Rp " . number_format($key->min,2,',','.');?></td>
                                                <td><?php echo "Rp " . number_format($key->max,2,',','.');?></td>
                                                
                                    
                                                <td>

                                                  <div class="btn-group mb-xl-3" role="group" aria-label="Basic example">
                                    
                                     <a href="javascript:void(0);" onclick="modalDetail('<?php echo $key->no?>','<?php echo $key->nama?>','<?php echo $key->kode_nama ?>','<?php echo $key->min ?>','<?php echo $key->max ?>')"  data-toggle="modal" data-target="#myModalEdit"><button type="button" class="btn btn-primary" style="width:80px; height:50px;"><font color="white"><i class="fa fa-pencil"></i> Edit</font></button></a>
                                    <a href="<?php echo site_url()?>/Approval/deleteApproval/<?php echo $key->no?> " onclick="return confirm('Apakah Yakin Untuk Menghapus?')"><button type="button" class="btn btn-danger" style="width:80px; height:50px;"><font color="white"><i class="fa fa-trash-o"></i> Hapus</font></button></a>
                                  
                                </div></td>
                                             
                                            </tr>
                                            <?php $no++; }?>
                                       </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
          <!-- main content area end -->
        <!-- footer area start-->
 


      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModalEdit" class="modal fade-in" >
        <div class="modal-dialog">
            <div class="modal-content" style="width: 800px; margin-left: -100px;padding: 20px" >
                <div class="modal-header">
                    <h4 class="modal-title">Edit Approval</h4>
                </div>
          <?php echo form_open_multipart('Approval/updateApproval'); ?>
                <?php echo validation_errors(); ?>
                     <div class="form-group">
                        <!-- <label for="">NO</label> -->
                        <input type="text" class="form-control" name="no" id="no" value="" readonly="" hidden="">
                    </div>
                    <div class="form-group">
                        <label for="">NAMA</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="" >
                    </div>
                    <div class="form-group">
                        <label for="">KODE NAMA</label>
                        <input type="text" class="form-control" name="kode_nama" id="kode_nama" value="" >
                    </div>
                    <div class="form-group">
                        <label for="">MIN</label>
                        <input type="text" class="form-control" name="min" id="min" value="" >
                        <label>Inputkan format angka</label>

                    </div>
                    <div class="form-group">
                        <label for="">MAX</label>
                        <input type="text" class="form-control" name="max" id="max" value="" >
                        <label>Inputkan format angka</label>
                        
                    </div>
                   

                
               
               
            <div align="right" style="margin-bottom: 20px; margin-right: 30px">
          <button class="btn btn-info" type="submit">Update</button>
            <a href=""><button class="btn btn-warning" data-dismiss="modal">Batal</button></a>
        </div>
    
        <?php echo form_close(); ?>
        </div>
    </div>
        
    <!-- offset area end -->
    <!-- jquery latest version -->
    <?php $this->load->view('admin/footer'); ?>

    <!-- Start datatable js -->
     <script type="text/javascript" src="<?php echo base_url()?>assets/advanced-datatable/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTables/js/jquery.dataTables.js"></script>
 
    <!-- others plugins -->
<script type="text/javascript">
    function modalDetail(no,nama,kode_nama,min,max){
        document.getElementById('no').value = no;
        document.getElementById('nama').value = nama;
        document.getElementById('kode_nama').value = kode_nama;
        document.getElementById('min').value = min;
        document.getElementById('max').value = max;
      
    }
     var rupiah = document.getElementById("min");
rupiah.addEventListener("keyup", function(e) {
  rupiah.value = formatRupiah(this.value, "Rp. ");
});
    var rupiah2 = document.getElementById("max");
rupiah2.addEventListener("keyup", function(e) {
  rupiah2.value = formatRupiah(this.value, "Rp. ");
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
  </script>
 

     <script type="text/javascript">
    /* Formating function for row details */
    

      /*
       * Initialse DataTables, with no sorting on the 'details' column
       */
       var oTable = $('#dataTablesss').dataTable({
        "aoColumnDefs": [{
          "bSortable": true,
          "aTargets": [0]
        }],
     
      });

      /* Add event listener for opening and closing details
       * Note that the indicator for showing which row is open is not controlled by DataTables,
       * rather it is done here
       */
    
  </script>

</body>

</html>
