
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Data</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="#">Invoice</a></li>
                                <li><span>Document Receipt</span></li>
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
                             <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table text-center" id="dataTablesss">
                                   <thead class="text-uppercase">
                                            <tr>
                                       
                                                <th>NO</th>
                                                <th>PO DATE</th>
                                                <th>PO NO</th>
                                                <th>SUPPLIER</th>
                                                <th>action</th>
                                               
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no = 1;   foreach ($doc as $key) {?>
                                            <tr>
                                       <td><?php echo $no?></td>
                                                <td><?php echo $key->tgl_po;?></td>
                                                <td><?php echo $key->no_po;?></td>
                                                <td><?php echo $key->nama_supplier;?></td>
                                                <td><a href="<?php echo site_url()?>/Invoice/detailPo/<?php echo $key->id_po?>" class="btn btn-primary"><i class="fa fa-print"></i> DETAIL DAN PRINT</a></td>

                                            
                                            </tr>
                                            <?php $no++;}?>
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
 


  
    <?php $this->load->view('admin/footer'); ?>

    <!-- Start datatable js -->
     <script type="text/javascript" src="<?php echo base_url()?>assets/advanced-datatable/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTables/js/jquery.dataTables.js"></script>
 

     <script type="text/javascript">
   
        var oTable = $('#dataTablesss').dataTable({
        "aoColumnDefs": [{
          "bSortable": true,
          "aTargets": [0]
        }],
            });
    
  </script>
</body>

</html>
