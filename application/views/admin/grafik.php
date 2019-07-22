    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/grafik.css" />
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding-top: 15px;padding-bottom: 15px">
                            <h4 class="page-title pull-left">Data</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="#">Grafik</a></li>
                                <li><span>Grafik</span></li>
                            </ul>

                    </div>
                
                </div>
            </div>
        </div>

            <!-- page title area end -->
            <div class="main-content-inner">
                    <div class="container">
                <div class="row">
                       <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-3 mt-5 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg1">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-thumb-up"></i> PR OPEN</div>
                                            <h2><?php   echo $pr[0]->jumlah; ?></h2>
                                        </div>
                                        <canvas id="seolinechart1" height="50"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mt-md-5 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg2">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-share"></i> QR OPEN</div>
                                            <h2><?php   echo $qr[0]->jumlah; ?></h2>
                                        </div>
                                        <canvas id="seolinechart3" height="50"></canvas>
                                    </div>
                                </div>
                            </div>
                          <div class="col-md-3 mt-5 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg1">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-thumb-up"></i> ETA BESOK</div>
                                            <h2><?php echo $eta[0]->jumlah; ?></h2>
                                        </div>
                                        <canvas id="seolinechart2" height="50" ></canvas>
                                    </div>
                                </div>
                            </div>
                             <div class="col-md-3 mt-md-5 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg2">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-share"></i> DELAY</div>
                                            <h2><?php echo $delay[0]->jumlah; ?></h2>
                                        </div>
                                        <canvas id="seolinechart4" height="50"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- data table start -->
                    <div class="col-6 mt-5">
                        <div class="card">   
                            <div class="card-body">
                                <input type="month" name="" class="form-control" style="width: 160px">
                                 <div id="chartdiv"></div>
                             </div>
                         </div>
                     </div>
                      <div class="col-6 mt-5">
                        <div class="card">   
                            <div class="card-body">
                                <input type="date" name="" class="form-control">
                                 <div id="chartdivv"></div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

    <script src="<?php echo base_url()?>assets/js/core.js"></script>
    <script src="<?php echo base_url()?>assets/js/charts.js"></script>
    <script src="<?php echo base_url()?>assets/js/animated.js"></script>
    <?php foreach ($grafik as $key) {
                                    $kategori[] = $key->supplier;
                                    $nilai[]=$key->jumlah;} 

        foreach ($section as $row) {
              $kategori2[] = $row->nama_section;
            $nilai2[]=$row->jumlah;
        }
                                    ?>
   <script type="text/javascript">
    am4core.useTheme(am4themes_animated);
       

var chart = am4core.create("chartdiv", am4charts.XYChart3D);
chart.data = [{
    "category": <?php echo json_encode($kategori[0])?>,
    "value1": <?php echo json_encode($nilai[0])?>,
 
},
{
    "category": <?php echo json_encode($kategori[1])?>,
    "value1": <?php echo json_encode($nilai[1])?>,
 
},{
    "category": <?php echo json_encode($kategori[2])?>,
    "value1": <?php echo json_encode($nilai[2])?>,
 
},]
chart.padding(30, 30, 10, 30);
chart.legend = new am4charts.Legend();

chart.colors.step = 1;

var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "category";
categoryAxis.renderer.minGridDistance = 60;
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.interactionsEnabled = false;

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.tooltip.disabled = true;
valueAxis.renderer.grid.template.strokeOpacity = 0.05;
valueAxis.renderer.minGridDistance = 20;
valueAxis.interactionsEnabled = false;
valueAxis.min = 0;
valueAxis.renderer.minWidth = 35;

var series1 = chart.series.push(new am4charts.ColumnSeries3D());
series1.columns.template.width = am4core.percent(80);
series1.columns.template.tooltipText = "{name}: {valueY.value}";
series1.name = "Supplier";
series1.dataFields.categoryX = "category";
series1.dataFields.valueY = "value1";
series1.stacked = true;


chart.scrollbarX = new am4core.Scrollbar();
var chartt = am4core.create("chartdivv", am4charts.XYChart3D);


chartt.data = [{
    "category": <?php echo json_encode($kategori2[0])?>,
    "value1": <?php echo json_encode($nilai2[0])?>,
 
},
{
    "category": <?php echo json_encode($kategori2[1])?>,
    "value1": <?php echo json_encode($nilai2[1])?>,
 
},{
    "category": <?php echo json_encode($kategori2[2])?>,
    "value1": <?php echo json_encode($nilai2[2])?>,
 
},]
chartt.padding(30, 30, 10, 30);
chartt.legend = new am4charts.Legend();

chartt.colors.step = 2;

var categoryAxiss = chartt.xAxes.push(new am4charts.CategoryAxis());
categoryAxiss.dataFields.category = "category";
categoryAxiss.renderer.minGridDistance = 60;
categoryAxiss.renderer.grid.template.location = 0;
categoryAxiss.interactionsEnabled = false;

var valueAxiss = chartt.yAxes.push(new am4charts.ValueAxis());
valueAxiss.tooltip.disabled = true;
valueAxiss.renderer.grid.template.strokeOpacity = 0.05;
valueAxiss.renderer.minGridDistance = 20;
valueAxiss.interactionsEnabled = false;
valueAxiss.min = 0;
valueAxiss.renderer.minWidth = 35;

var seriess = chartt.series.push(new am4charts.ColumnSeries3D());
seriess.columns.template.width = am4core.percent(80);
seriess.columns.template.tooltipText = "{name}: {valueY.value}";
seriess.name = "Section";
seriess.dataFields.categoryX = "category";
seriess.dataFields.valueY = "value1";
seriess.stacked = true;


chartt.scrollbarX = new am4core.Scrollbar();

   

   
   </script>

                
           <?php $this->load->view('admin/footer'); ?>