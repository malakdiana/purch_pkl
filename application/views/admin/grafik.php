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
                                            <div class="seofct-icon"><i class="ti-folder" style="width:20px;height:20px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;JUMLAH<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PR OPEN</div>
                                            
                                            <h2><font color="black"><?php   echo $pr[0]->jumlah; ?></h2></font>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mt-md-5 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg2">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-book" style="width:20px;height:20px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;JUMLAH<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; QR OPEN</div>
                                             
                                            <h2><font color="black"><?php   echo $qr[0]->jumlah; ?></h2></font>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          <div class="col-md-3 mt-5 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg1">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-calendar" style="width:20px;height:20px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;JUMLAH ETA<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <?php $tgl = mktime(0, 0, 0, date("m"), date("d")+1, date("Y")); $tgl =  date("Y-m-d", $tgl); echo $tgl ;?>
                                            </div>
                                             
                                            <h2><font color="black"><?php echo $eta[0]->jumlah; ?></h2></font>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="col-md-3 mt-md-5 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg2">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-time" style="width:20px;height:20px;" ></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;JUMLAH <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; DELAY</div>
                                            <h2><font color="black"><?php echo $delay[0]->jumlah; ?></h2></font>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- data table start -->
                    <div class="col-12 mt-5">
                        <div class="card">   
                            <div class="card-body">
                        
                               <h4>Grafik Ammount Supplier Per Bulan</h4><br>
                                <label>Filter : &nbsp;&nbsp;</label><input name="startDate" id="startDate" class="date-picker" autocomplete="off" />
                              
                                 <div id="chartdiv"><p id="alert"><center>Tidak Ada Data</center></p></div>
                             </div>
                         </div>
                     </div>
                      <div class="col-12 mt-5">
                        <div class="card">   
                            <div class="card-body">
                                 <h4>Grafik Ammount Section Per Bulan</h4><br>
                                <label>Filter : &nbsp;&nbsp;</label><input name="startDate2" id="startDate2" class="date-picker2" autocomplete="off" />
                              
                                 <div id="chartdivv"></div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
                
           <?php $this->load->view('admin/footer'); ?>

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

     $(document).ready(function(){ 
 am4core.useTheme(am4themes_animated);


var chart = am4core.create("chartdiv", am4charts.PieChart3D);
chart.legend = new am4charts.Legend();
var datax = [];
var datacategory = [];
var datavalue = [];
var visits = '';
 <?php $i=0 ?>


datacategory = <?php echo json_encode($kategori);?>;
datavalue = <?php echo json_encode($nilai);?>;

for( var i = 0; i < datacategory.length; i++){
    datax.push({"category": datacategory[i], "value1" : datavalue[i]});
}

chart.data= datax;

chart.padding(30, 30, 10, 30);

chart.innerRadius = am4core.percent(40);

var series = chart.series.push(new am4charts.PieSeries3D());
series.dataFields.value = "value1";
series.dataFields.category = "category";

var chartt = am4core.create("chartdivv", am4charts.XYChart);
var dataxx = [];
var datacategoryy = [];
var datavaluee = [];

datacategoryy = <?php echo json_encode($kategori2);?>;
datavaluee = <?php echo json_encode($nilai2);?>;

for( var i = 0; i < datacategoryy.length; i++){
    if(datavaluee[i] == null){
       dataxx.push({"category": datacategoryy[i], "value1" : 0});
    }
    else{
       dataxx.push({"category": datacategoryy[i], "value1" : datavaluee[i]});
    } 
}


chartt.data= dataxx;

var categoryAxis = chartt.yAxes.push(new am4charts.CategoryAxis());
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.dataFields.category = "category";
categoryAxis.renderer.minGridDistance = 20;

var valueAxis = chartt.xAxes.push(new am4charts.ValueAxis());
valueAxis.renderer.maxLabelPosition = 0.98;

var series = chartt.series.push(new am4charts.ColumnSeries());
series.dataFields.categoryY = "category";
series.dataFields.valueX = "value1";
series.tooltipText = "{valueX.value}";
series.sequencedInterpolation = true;
series.defaultState.transitionDuration = 1000;
series.sequencedInterpolationDelay = 100;
series.columns.template.strokeOpacity = 0;

chartt.cursor = new am4charts.XYCursor();
chartt.cursor.behavior = "panY";


// as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set
series.columns.template.adapter.add("fill", function (fill, target) {
    return chartt.colors.getIndex(target.dataItem.index);
   


     });

}); 
   </script>
   <!--    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/base/jquery-ui.css"> -->
          <script src="<?php echo base_url()?>assets/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-ui.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>assets/css/jquery-ui.css">
    
   <script type="text/javascript">
        $(function() {
            $('.date-picker').datepicker( {
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            dateFormat: 'mm/yy',
            onClose: function(dateText, inst) { 
                $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
                var tgl = $(this).val();
                console.log(tgl);
               $.ajax({
                type  : 'post',
                url   : '<?php echo site_url()?>/Grafik/getSupplier',
                data : {tgl: tgl},        
                dataType: 'json', 
                success: function(data) { 
                  
          am4core.useTheme(am4themes_animated);


var chart = am4core.create("chartdiv", am4charts.PieChart3D);
chart.legend = new am4charts.Legend();

var datax = [];


for( var i = 0; i < data.length; i++){
    datax.push({"category": data[i].supplier, "value1" : data[i].jumlah});
}

chart.data= datax;

chart.padding(30, 30, 10, 30);

chart.innerRadius = am4core.percent(40);

var series = chart.series.push(new am4charts.PieSeries3D());
series.dataFields.value = "value1";
series.dataFields.category = "category";


           }  
            });
              
            }
            });
        });
    </script>

   <script type="text/javascript">
        $(function() {
            $('.date-picker2').datepicker( {
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            dateFormat: 'mm/yy',
            onClose: function(dateText, inst) { 
                $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
                var tgl = $(this).val();
                console.log(tgl);
               $.ajax({
                type  : 'post',
                url   : '<?php echo site_url()?>/Grafik/getSection',
                data : {tgl: tgl},        
                dataType: 'json', 
                success: function(data) { 
var chartt = am4core.create("chartdivv", am4charts.XYChart);
var dataxx = [];

for( var i = 0; i < data.length; i++){
       
    if(data[i].jumlah == null){
        dataxx.push({"category": data[i].nama_section, "value1" : 0});
    }
    else{
      dataxx.push({"category": data[i].nama_section, "value1" : data[i].jumlah});
    } 
}


chartt.data= dataxx;

var categoryAxis = chartt.yAxes.push(new am4charts.CategoryAxis());
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.dataFields.category = "category";
categoryAxis.renderer.minGridDistance = 20;

var valueAxis = chartt.xAxes.push(new am4charts.ValueAxis());
valueAxis.renderer.maxLabelPosition = 0.98;

var series = chartt.series.push(new am4charts.ColumnSeries());
series.dataFields.categoryY = "category";
series.dataFields.valueX = "value1";
series.tooltipText = "{valueX.value}";
series.sequencedInterpolation = true;
series.defaultState.transitionDuration = 1000;
series.sequencedInterpolationDelay = 100;
series.columns.template.strokeOpacity = 0;

chartt.cursor = new am4charts.XYCursor();
chartt.cursor.behavior = "panY";


// as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set
series.columns.template.adapter.add("fill", function (fill, target) {
    return chartt.colors.getIndex(target.dataItem.index);
   });




          
              
            }
            });
             }
        });
             });
    </script>
    <style>
    .ui-datepicker-calendar {
        display: none;
    }
  </style>

