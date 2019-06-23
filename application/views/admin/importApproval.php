
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Master Data</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Approval</a></li>
                                <li><span>Import Approval</span></li>
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
                                <h4>Upload file .csv</h4><br>
                                  <p>download format data <a href="<?php echo site_url()?>/Approval/downloadSup" class="btn btn-success" style="padding-top: 2px;padding-bottom: 2px;padding-right: 7px;padding-left: 7px"><i class="fa fa-download"></i></a></p><br>
                                <form action="<?php echo site_url()?>/Approval/prosesImportSup" method="post" name="upload_excel" enctype="multipart/form-data">
                                  
                                    <input type="file" class="form-control" name="file" id="dataApproval" accept="text/csv" value="" placeholder="upload data Approval" ><br>
                                    <button class="btn btn-primary" name="import" id="submit" type="submit">Import</button>
                                    </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>