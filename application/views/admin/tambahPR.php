
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Form Purchase Request</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="<?php echo site_url()?>/Purch_req">Purchase Request</a></li>
                                <li><span>Insert Purchase Request</span></li>
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
                                     <?php echo form_open('Purch_req/tambahPR') ?>
                                     <h3 align="center">Insert Purchase Request</h3><br>
                                       
                                               
                                                <div class="form-group">
                                                     <label class="control-label" for="tgl">Tanggal:</label>
                                           
                                               <input type="text" value="<?php date_default_timezone_set('Asia/Jakarta');echo date('Y-m-d')?>" readonly="" class="form-control" id="tgl" name="tgl" style="margin-bottom: 25px">
                                            </div>

                                            <div class="form-group">
                                                     <label class="control-label " for="jam">Jam :</label>
                                           
                                               <input type="text" value="<?php echo date('H:i:s')?>" readonly="" class="form-control" id="jam" name="jam" style="margin-bottom: 25px">
                                            </div>

                                            <div class="form-group">
                                                     <label class="control-label " for="nik">NIK :</label>
                                           
                                                <input type="text" class="form-control" name="nik" style="margin-bottom: 25px;}">
                                            </div>

                                            <div class="form-group">
                                                     <label class="control-label " for="pic_request">PIC REQUEST :</label>
                                           
                                                <input type="text" class="form-control" name="pic_request" style="margin-bottom: 25px">
                                            </div>

                                             <div class="form-group">
                                                     <label class="control-label " for="section">SECTION</label>
                                           <select name="section" class="form-control" id="section">
                                            <option></option>
                                            <?php foreach ($section as $key) {?>

                                           <option class="form-control" value="<?php echo $key->nama_section?>"><?php echo $key->nama_section?> </option> <?php }?>
                                           </select>
                                              
                                            </div>

                                            <div class="form-group">
                                                     <label class="control-label " for="pr_no">NOMER PR:</label>
                                           <div class="row"style="margin-left: 4px">    
                                                <input type="text" class="form-control" minlength="3" maxlength="3" name="pr_no" style="margin-bottom: 25px;width: 100px" placeholder="000">
                                                  <input type="text" class="form-control"  name="section_kode" id="section_kode" style="margin-bottom: 25px;width: 100px" readonly="">
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
   
   
                                     
        
          
              <div align="right"> <button type="submit" class="btn btn-primary" style="align-self: right">Simpan</button></div>
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