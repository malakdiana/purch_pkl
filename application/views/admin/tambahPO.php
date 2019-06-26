
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Form Purchase Order</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="<?php echo site_url()?>/Purch_req">Purchase Order</a></li>
                                <li><span>Insert Purchase Order</span></li>
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
                                     <?php echo form_open('Purch_req/tambahPO') ?>
                                     <h3 align="center">Insert Purchase Order</h3><br>
                                       
                                               
                                                <div class="form-group">
                                                     <label class="control-label" for="tgl">Tanggal:</label>
                                           
                                               <input type="text" value="<?php date_default_timezone_set('Asia/Jakarta');echo date('d-m-Y H:i:s')?>" readonly="" class="form-control" id="tgl" name="tgl" style="margin-bottom: 25px">
                                            </div>

                                            

                                            <div class="form-group">
                                                     <label class="control-label " for="PO_no">NOMER PO:</label>
                                           <div class="row"style="margin-left: 4px">
                                               <input type="text" class="form-control" value="PO" name="PO_no" style="margin-bottom: 25px;width: 100px" readonly="">
                                                <input type="text" class="form-control" minlength="3" maxlength="3" name="PO_no" style="margin-bottom: 25px;width: 100px" placeholder="000">
                                                  
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
                                              </div>


                                            </div>
   
   
                                     
        
          
              <div align="right"> <button type="submit" class="btn btn-POimary" style="align-self: right">Simpan</button></div>
              <?php echo form_close() ?>
           

    </div>
</div>
</div>
</div>
</div>
  <?php $this->load->view('admin/footer'); ?>
<script type="text/javascript">
    $("#section").change(function () { var val = $(this).val();
       // var x = document.getElementById("section").value;
        document.getElementById("section_kode").value= val;
        });
</script>