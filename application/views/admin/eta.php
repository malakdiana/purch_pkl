
   
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
                        <div  style="padding-top: 15px;padding-left: 5px">

                                  <a class="btn btn-flat btn-info mb-3" href="<?php echo site_url()?>/Eta/delay" role="button" style="width:180px"><font color="white"><i class="ti-file"></i> Data Delay</font></a>


                                  <a class="btn btn-flat btn-success mb-3" data-toggle="modal" data-target="#myModalDownload"><font color="white"><i class="ti-download"></i> Download Data By Date</font></a>

                                  <a class="btn btn-flat btn-primary mb-3" href="<?php echo site_url()?>/Eta/export" role="button"><font color="white"><i class="ti-download"></i> Download All Data</font></a>

                            </div>

                           
                            <div class="card-body">
                                      
                                <div class="col-md-12">
                                    <div class="row">
                                 
                                        <div class="col-md-7">

                                           <?php echo form_open('eta'); ?>   
                                        </div>
                                      <h5>Filter Tanggal</h5>
                                        <div class="col-md-2">
                                          
                                           <input type="date" name="search"  style="width: 200px" class="form-control" value="<?php echo $tgl ?>">
                                       </div>
                                       <div class="col-md-1">
                                <button class="btn btn-default"><i class="fa fa-search"></i> Cari Data</button>

                                    </div>
                                   <?php echo form_close(); ?>
                               </div>
                            
                
                                <br>
                            
                                <table cellpadding="0" cellspacing="0" border="0" class="table table-condensed" id="dataTablesss">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                            
                                                <th>NO</th>
                                                <th>NAMA SUPPLIER</th>
                                                 <th>TGL PO</th>
                                                <th>NO PO</th>
                                                <th >ETA</th>
                                                <th >FRANCO</th>
                                                <th >DEP</th>
                                                <th >PR NO</th>
                                                <th >ITEM</th>
                                                <th >UNIT</th>
                                                <th >QTY</th>
                                                <th>Konfirm</th>
                                                <th>invoice</th>
                                                <th>Remarks</th>
                                                <th>Action</th>



                                              
                                           
                                            </tr>
                                        </thead>
                                        <tbody id="show_data">
                                        <?php $no=1;$id_po=0;  foreach ($eta as $key) { $id_po = $key->id_po;?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $key->supplier;?></td>
                                                <td><?php echo $key->tgl_po;?></td>
                                                <td><?php echo $key->no_po;?></td>
                                                <td><?php echo $key->eta;?></td>
                                                <td><?php echo $key->franco;?></td>
                                                <td><?php echo $key->section;?></td>
                                                <td><?php echo $key->pr_no;?></td>
                                                <td><?php echo $key->item;?></td>
                                                <td><?php echo $key->unit_name;?></td>
                                                <td><?php echo $key->qty;?></td>

                                                 <td><?php 
                                                if($key->konfirmasi == "OK"){?>
                                                     <img style="width: 40px;height: 50px" src="<?php echo base_url()?>assets/images/icon/checkblue.png">
                                                     <?php }
                                                     else { ?>  
                                                        <img style="width: 40px;height: 50px" src="<?php echo base_url()?>assets/images/icon/minusblue.png">
                                                        <?php }?>
                                                </td>

                                                <td><?php 
                                                if($key->invoice == "OK"){?>
                                                     <img style="width: 40px;height: 50px" src="<?php echo base_url()?>assets/images/icon/checkblue.png">
                                                     <?php }
                                                     else { ?>  
                                                        <img style="width: 40px;height: 50px" src="<?php echo base_url()?>assets/images/icon/minusblue.png">
                                                        <?php }?>
                                                </td>

                                                <td><?php echo $key->remarks;?></td>


                                                <td>
                                                <a href="<?php echo site_url()?>/Eta/konfirmasi/<?php echo $key->id_bayangan?>/<?php echo $tgl?>" class="btn btn-success" style="width:80px; height:40px;padding-left: 2px"><i class="fa fa-check fa-xs"></i> Konfirm</a><br>
                                                <a href="<?php echo site_url()?>/Eta/invoice/<?php echo $key->id_bayangan ?>/<?php echo $tgl?>" class="btn btn-info" style="width:80px; height:40px;padding-left: 2px"><i class="fa fa-check fa-xs"></i> Invoice</a><br>
                                                <a class="btn btn-warning" onclick="modalRemarks('<?php echo $key->id_bayangan ?>')" style="width:80px; height:50px;padding-left: 2px" data-toggle="modal" data-target="#myModalEdit"><i class="fa fa-plus fa-xs"></i> Add <br>Remarks</a>
                                                </td>
  
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

         <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModalEdit" class="modal fade-in" >
        <div class="modal-dialog">
            <div class="modal-content" style="width: 600px; margin-left: -80px;padding: 20px" >
                <div class="modal-header">

                    <h4 class="modal-title">Remarks</h4>
                 <button align="right" type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <?php echo form_open('eta/addRemarks'); ?>
                  <div class="modal-body">
                     <div class="form-group">
                       <input type="" name="tgl" value="<?php echo $tgl?>" hidden="">
                        <input type="text" name="id_bayangan" id="id_bayangan" hidden="">
                        <label for="">Note</label>
                       <textarea name="remarks" rows="5" cols="40" class="form-control"></textarea>

                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Delay</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal" value="" >

                    </div>
                      <p align="right"><button class="btn btn-info" type="submit">save</button></p>
<?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>

         <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModalDownload" class="modal fade-in" >
        <div class="modal-dialog">
            <div class="modal-content" style="width: 600px; margin-left: -80px;padding: 20px" >
                <div class="modal-header">

                    <h4 class="modal-title">Download By Date</h4>
                 <button align="right" type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <?php echo form_open('eta/exportbydate'); ?>
                  <div class="modal-body">

                     <div class="form-group">
                      <label>START DATE</label>                   
                      <input type="date" name="search"  style="width: 400px" class="form-control" value="">
                      </div>

                     <div class="form-group">
                      <label>END DATE</label>                   
                     <input type="date" name="search2"  style="width: 400px" class="form-control" value="">
                     </div>
                     

                      <p align="right"><button class="btn btn-info" type="submit">Download</button></p>
<?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
        
   

        
    <!-- offset area end -->
    <!-- jquery latest version -->
    <?php $this->load->view('admin/footer'); ?>


    <!-- Start datatable js -->
     <script type="text/javascript" src="<?php echo base_url()?>assets/advanced-datatable/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dataTables/js/jquery.dataTables.js"></script>
  
    <script type="text/javascript">
    function modalRemarks(id_bayangan){
       
        document.getElementById('id_bayangan').value = id_bayangan;      
    }
  </script>
  <script>
function openCity(cityName) {
  var i;
  var x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  document.getElementById(cityName).style.display = "block";
   $('button').click(function(){
            $('button').removeClass("actives");
            $(this).addClass("actives"); 
           }); 
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

 
    <!-- others plugins -->
