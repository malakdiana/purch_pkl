
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">READ ONLY</a></li>
                               <li><a href="index.html">DATA</a></li>
                            </ul>

                    </div>
                
                </div>
            </div>
        </div>

            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row" align="center">
                    <!-- data table start -->
                    <div class="col-12 mt-5">
                        

                              <table cellpadding="0" cellspacing="0" border="0" class="table table-striped" id="dataTablesss">
                                       
                                        <tbody>

                            <tr align="center">

                                            <td>
                                                <a href="<?php echo site_url()?>/Po/"><button class="btn btn-flat btn-info mb-4" role="button" style="width:240px""><img style="width: 200px;height: 200px" src="<?php echo base_url()?>assets/images/icon/datapo.png"><br>DATA PO</button></a><br></td>

                                                <td>
                                                 <a href="<?php echo site_url()?>/Purch_req/"><button class="btn btn-flat btn-info mb-4" role="button" style="width:240px""><img style="width: 200px;height: 200px" src="<?php echo base_url()?>assets/images/icon/datapr.png"><br>DATA PR</button></a><br></td>

                                                <td>
                                                 <a href="<?php echo site_url()?>/Qr/"><button class="btn btn-flat btn-info mb-4" role="button" style="width:240px""><img style="width: 200px;height: 200px" src="<?php echo base_url()?>assets/images/icon/listallquo.png"><br>LIST ALL QUOTATION</button>
                                                 </a><br></td>



                                                 </tr>
                                                 </tbody>
                                    </table>


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
