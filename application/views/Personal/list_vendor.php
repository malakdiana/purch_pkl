
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Master Data</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="#">List My Quotation</a></li>
                                <li><span>Vendor</span></li>
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
                       
                                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped" id="dataTablesss">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                                
                                             <th>NO</th>
                                                <th>Tanggal</th>
                                                <th>Nama Supplier</th>
                                                <th>Harga</th>
                                                <th>Attacment</th>
                  
                                             
                                            </tr>
                                        </thead>
                                       <tbody>
                                            <?php   $no=1; foreach ($vendor as $key) {?>
                                            <tr>
                                            
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $key->tanggal;?></td>
                                                <td><?php echo $key->nama_vendor;?></td>
                                                <td><?php echo "Rp " . number_format($key->harga,2,',','.');?></td>
                                                <td><a href="<?php echo base_url()?>assets/file_qr/<?php echo $key->detail;?>" target="_blank"><?php echo $key->detail;?></a></td>
                                               </tr>
                                                <?php $no++;} ?>
                                       
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
 


     
        
    <!-- offset area end -->
    <!-- jquery latest version -->
    <?php $this->load->view('admin/footer'); ?>

    <!-- Start datatable js -->
     <script type="text/javascript" src="<?php echo base_url()?>assets/advanced-datatable/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTables/js/jquery.dataTables.js"></script>
 
    <!-- others plugins -->
<script type="text/javascript">
    function modalDetail(id_section,nama_section,dept){
        document.getElementById('id_section').value = id_section;
        document.getElementById('nama_section').value = nama_section;
         document.getElementById("dept").value = dept;
    }
  </script>


 

     <script type="text/javascript">
    /* Formating function for row details */
    

      /*
       * Initialse DataTables, with id_section sorting on the 'details' column
       */
       var oTable = $('#dataTablesss').dataTable({
        "aoColumnDefs": [{
          "bSortable": true,
          "aTargets": [0]
        }],
        "aaSorting": [
          [0, 'desc']
        ]
      });

      /* Add event listener for opening and closing details
       * id_sectionte that the indicator for showing which row is open is id_sectiont controlled by DataTables,
       * rather it is done here
       */
    
  </script>
</body>

</html>
