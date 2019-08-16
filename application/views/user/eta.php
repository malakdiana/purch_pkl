
   
 <style>
      /* script menghilangkan Horizontal Scroll */
      td {
        font-size: 12px;
      }
         a {
        font-size: 12px;
      }
        /*margin-right{
          right: 5px;
        }*/
         margin-left{
          left: -50px;
        }

    
</style>
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Data</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">ETA</a></li>
                                <li><span>Data ETA</span></li>
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
        

                                   

                        <div class="card">
                  

                           
                            <div class="card-body">
                                      
                               
                            
                
                                <br>
                                <div class="form-group">
                            <label style="width:100px">No PR</label>
                               <select class="form-contro no_pr" name="no_pr" id="no_pr" style="width:200px">
                                 
                               </select>
                               </div>
                                <div class="form-group">
                            <label style="width:100px">Barang </label>
                               <select class="form-contro barang" name="barang" id="barang" style="width:200px">
                                 
                               </select>
                               </div>
                                 <button class="btn btn-success btn-cari" onclick='simpan()' style="width:70px">Cari</button>   
                                </div>

                                <div id="tabel"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        
   

        
    <!-- offset area end -->
    <!-- jquery latest version -->
    <?php $this->load->view('admin/footer'); ?>
<link href="<?php echo base_url()?>assets/css/select2.min.css" rel="stylesheet" />
  <script src="<?php echo base_url()?>assets/js/select2.min.js"></script>

    <!-- Start datatable js -->
  
 
 <script type="text/javascript">
    
      /* Add event listener for opening and closing details
       * Note that the indicator for showing which row is open is not controlled by DataTables,
       * rather it is done here
       */
$('.no_pr').select2({
        placeholder: '--- Select Item ---',
        ajax: {
          url: '<?php echo site_url()?>/Eta/getPrUser',
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
   $(".no_pr").change(function () {
         document.getElementById('barang').value ="";
        var val = $(this).val(); //get the value
        
         $('.barang').select2({
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

  
         function simpan(){
        var barang = $('#barang').val();
         $.ajax({
          type : "POST",
          url: '<?php echo site_url('Eta/getEtaUser')?>',
          data : {id_item: barang},
          dataType: 'json',  
     success: function(data){
      if(data.supplier=="gatot"){
         $("#tabel").html("");
      $("#tabel").append("<table cellpadding='0' cellspacing='0' border='0' class='table table-condensed' id='dataTablesss'><thead class='bg-light text-capitalize'><tr><th>NO</th><th>NAMA SUPPLIER</th><th>TGL PO</th><th>NO PO</th><th >ETA</th><th >FRANCO</th><th >DEP</th><th >PR NO</th><th >ITEM</th><th >UNIT</th><th >QTY</th><th>Remarks</th></tr></thead><tbody ><tr><td colspand='11'><center>Belum Mempunyai PO</center></td></tr></tbody></table>");
      }
      else{
      $("#tabel").html("");
      $("#tabel").append("<table cellpadding='0' cellspacing='0' border='0' class='table table-condensed' id='dataTablesss'><thead class='bg-light text-capitalize'><tr><th>NO</th><th>NAMA SUPPLIER</th><th>TGL PO</th><th>NO PO</th><th >ETA</th><th >FRANCO</th><th >DEP</th><th >PR NO</th><th >ITEM</th><th >UNIT</th><th >QTY</th><th>Remarks</th></tr></thead><tbody ><tr><td>1</td><td>"+data.supplier+"</td><td>"+data.tgl_po+"</td><td>"+data.no_po+"</td><td>"+data.eta+"</td><td>"+data.franco+"</td><td>"+data.dep+"</td><td>"+data.pr_no+"</td><td>"+data.item+"</td><td>"+data.unit+"</td><td>"+data.qty+"</td><td>"+data.remarks+"</td></tr></tbody></table>");
    }
    },
   

            });
    }

  </script>
  </body>
  </html>

 
    <!-- others plugins -->
