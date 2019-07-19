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
                <div class="row">
                    <!-- data table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                          
                                
                            <div class="card-body">
                                 <div id="chartdiv"></div>
    <script src="<?php echo base_url()?>assets/js/core.js"></script>
    <script src="<?php echo base_url()?>assets/js/charts.js"></script>
    <script src="<?php echo base_url()?>assets/js/animated.js"></script>
    <?php foreach ($grafik as $key) {
                                    $kategori[] = $key->supplier;
                                    $nilai[]=$key->jumlah;} ?>
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

chart.colors.step = 2;

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
series1.name = "Series 1";
series1.dataFields.categoryX = "category";
series1.dataFields.valueY = "value1";
series1.stacked = true;


chart.scrollbarX = new am4core.Scrollbar();
   </script>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
           <?php $this->load->view('admin/footer'); ?>