
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Data</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="#">Qr</a></li>
                                <li><span>Data Quotation Request</span></li>
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
                       
                         <?=$this->session->flashdata('deleteQr')?>
                         <?=$this->session->flashdata('tambahItem')?>
                             
                               <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table text-center" id="dataTablesss">
                                   <thead class="text-uppercase">
                                            <tr>
                                         
                                                <th>NO</th>
                                                <th>TANGGAL</th>
                                                <th>ITEM</th>
                                                <th>QUOTATION NO</th>
                                                <th>QUOTATION DUEDATE</th>
                                                <th>SECTION</th>
                                                <th>PIC</th>
                                               
                                                <th>STATUS</th>
                                                <th>DETAIL</th>
                                  
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php   foreach ($Qr as $key) {?>
                                            <tr>
                                    
                                                <td><?php echo $key->id_penawaran;?></td>
                                                <td><?php echo $key->tanggal;?></td>
                                                <td><?php echo $key->item;?></td>
                                                <td><?php echo $key->kode_qr;?></td>
                                                <td><?php echo $key->tanggal_butuh;?></td>
                                                <td><?php echo $key->section;?></td>
                                                <td><?php echo $key->pic;?></td>
                                                
                                                <td><?php 
                                                if($key->status == 0){?>
                                                    <div class="form-control" align="center" value="OPEN" name="status" style="margin-bottom: 25px;width: 100px; background-color: #FFA500; color:#FFF" > OPEN </div>
                                                     <?php }
                                                     else if ($key->status == 1){ ?>  
                                                        <div class="form-control" align="center" value="CLOSED" name="status" style="margin-bottom: 25px;width: 100px; background-color: #CD853F; color:#FFF" > CLOSED </div>
                                                        <?php }
                                                        else if ($key->status == 3){ ?>  
                                                        <div class="form-control" align="center" value="WAITING" name="status" style="margin-bottom: 25px;width: 100px; background-color: #FF4500; color:#FFF" > WAITING </div>
                                                        <?php }
                                                     else { ?>  
                                                           <div class="form-control" align="center" value="CANCEL" name="status" style="margin-bottom: 25px;width: 100px; background-color: #BC8F8F; color:#FFF" > CANCEL </div>
                                                        <?php }

                                                        ?>

                                                </td>

                                                <td>

                                                

                                                <div class="btn-group mb-xl-3" role="group" aria-label="Basic example">

                                                        <a href="<?php echo site_url()?>/Qr/detailQuotationUser/<?php echo $key->id_penawaran?>" 
                                                    ><button type="button" class="btn btn-info" style="width:80px; height:45px;"><font color="white"><i class="fa fa-th-list"></i> Detail</font></button></a>
                                                    
                                                    <a href="<?php echo site_url()?>/Qr/listvendor/<?php echo $key->id_penawaran?>"><button type="button" class="btn btn-primary" style="width:85px; height:45px;"> <font color="white"><i class="fa fa-book"></i> Vendor </font></button></a>
                                    
                                  
                                                </div>
                                               </td>

                                               
                                            </tr>
                                            <?php }?>
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
 

id_penawaran,tanggal, item, kode_qr,tanggal_butuh,section,pic,bahan,detail,status,gamba
       <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModalDetail" class="modal fade-in" >
        <div class="modal-dialog">
            <div class="modal-content" style="width: 800px; margin-left: -100px;padding: 20px" >
                <div class="modal-header">
                   
                    <h4 class="modal-title">Info Supplier</h4>
                     <button align="right" type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <table width="600px">
                    <tr>
                        <td>ID Penawaran</td>
                        <td><input type="text" class="form-control" name="id_penawaran" id="id_penawaran" readonly=""></td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                      <td> <input type="text" class="form-control" name="tanggal" readonly="" id="tanggal" value="" ></td>
                    </tr>
                    <tr>
                        <td>Item</td>
                        <td><input type="text" class="form-control" name="item" id="item" readonly="" value="" ></td>
                    </tr>
                    <tr>
                        <td>Kode Quotation</td>
                        <td>  <input type="text" class="form-control" name="kode_qr" id="kode_qr" value="" readonly="" ></td>
                    </tr>
                    <tr>
                        <td>Tanggal Butuh</td>
                        <td> <input type="text" class="form-control" name="tanggal_butuh" id="tanggal_butuh" readonly="" value="" ></td>
                    </tr>
                    <tr>
                        <td>Section</td>
                        <td> <input type="text" class="form-control" name="section" id="section" value="" readonly=""></td>
                    </tr>
                    <tr>
                        <td>PIC</td>
                        <td><input type="text" class="form-control" name="pic" id="pic" value="" readonly="" ></td>
                    </tr>
                    <tr>
                        <td>Bahan</td>
                        <td>   <input type="text" class="form-control" name="bahan" id="bahan" value="" readonly=""></td>
                    </tr>
                    <tr>
                        <td>Detail</td>
                        <td><textarea readonly="" class="form-control" rows="4" id="detail" name="detail">
                            
                        </textarea>
                         </td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td> <input type="text" class="form-control" name="status" id="status" value="" readonly=""></td>
                    </tr>
                    <tr>
                        <td>Gambar</td>
                        <td>  <input type="text" class="form-control" name="gambar" id="gambar" value="" readonly=""></td>
                    </tr>
                   
                     

                </table>
            </div>
               
               
            <a href=""><button class="btn-warning" data-dismiss="modal">Batal</button></a>
        </div>
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
   
    function modalDetail(id_penawaran,tanggal, item, kode_qr,tanggal_butuh,section,pic,bahan,detail,status,gambar ){
        document.getElementById('id_penawaran').value = id_penawaran;
        document.getElementById('tanggal').value = tanggal;
          document.getElementById('item').value = item;
          document.getElementById('kode_qr').value = kode_qr;
          document.getElementById('tanggal_butuh').value = tanggal_butuh;
          document.getElementById('section').value = section;
          document.getElementById('pic').value = pic;
          document.getElementById('bahan').value = bahan;
          document.getElementById('detail').value = detail;
        document.getElementById('status').value = status;
          document.getElementById('gambar').value = gambar;
       
       
      
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
        "aaSorting": [
           [7,'desc'],
          [0, 'desc']
       
        ]
      });

      /* Add event listener for opening and closing details
       * Note that the indicator for showing which row is open is not controlled by DataTables,
       * rather it is done here
       */
    
  </script>
</body>

</html>
