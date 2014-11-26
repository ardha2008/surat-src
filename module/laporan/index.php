<script type="text/javascript">
FusionCharts.ready(function () {
    var demographicsChart = new FusionCharts({
        "type": "pie3d",
        "renderAt": "chartContainer",
//        "width": "500",
//        "height": "300",
        "dataFormat": "json",
        "dataSource": {
            "chart": {
                "caption": "Perbandingan Surat Keluar dan Surat Masuk",
                "subCaption": "2014",
                "startingAngle": "120",
                "showLabels": "0",
                "showLegend": "1",
                "enableMultiSlicing": "0",
                "slicingDistance": "15",
                
                "exportEnabled": "1",

                //To show the values in percentage
                "showPercentValues": "1",
                "showPercentInTooltip": "0",
                "plotTooltext": "Jenis : $label<br>Total : $datavalue",
                "theme": "fint"
            },
            "data": [{
                "label": "Surat Keluar",
                "value": "<?php echo rasio('keluar') ?>"
            }, {
                "label": "Surat Masuk",
                "value": "<?php echo rasio('masuk') ?>"
            }]
        }
    });

    demographicsChart.render();
});

</script>


<?php $bulan=array(1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember') ?>
<script type="text/javascript">

FusionCharts.ready(function () {
    var revenueChart = new FusionCharts({
        "type": "mscolumn3d",
        "renderAt": "report1",
        "width": "100%",
//        "height": "300",
        "dataFormat": "json",
        "dataSource":  {
            "chart": {
                "caption": "Laporan Surat Bulanan ",
                "subCaption": "Tahun 2014",
                "xAxisName": "Bulan",
                "yAxisName": "Jumlah",
                "numberPrefix": "",
                "exportEnabled": "1",
                "theme": "fint"
            },

            "categories": [{
                "category": [
                <?php for($i=1;$i<=12;$i++){?>
                    {"label": "<?php echo $bulan[$i] ?>"}, 
                <?php } ?>                    
                ]
            }],
            "dataset": [{
                "seriesname": "Surat Masuk",
                "data": [{
                    "value": "<?php echo laporan('01','masuk') ?>"
                }, {
                    "value": "<?php echo laporan('02','masuk') ?>"
                }, {
                    "value": "<?php echo laporan('03','masuk') ?>"
                }, {
                    "value": "<?php echo laporan('04','masuk') ?>"
                }, {
                    "value": "<?php echo laporan('05','masuk') ?>"
                }, {
                    "value": "<?php echo laporan('06','masuk') ?>"
                }, {
                    "value": "<?php echo laporan('07','masuk') ?>"
                }, {
                    "value": "<?php echo laporan('08','masuk') ?>"
                }, {
                    "value": "<?php echo laporan('09','masuk') ?>"
                }, {
                    "value": "<?php echo laporan('10','masuk') ?>"
                }, {
                    "value": "<?php echo laporan('11','masuk') ?>"
                }, {
                    "value": "<?php echo laporan('12','masuk') ?>"
                }
                
                ]
            }, {
                "seriesname": "Surat Keluar",
                "data": [{
                    "value": "<?php echo laporan('01','keluar') ?>"
                }, {
                    "value": "<?php echo laporan('02','keluar') ?>"
                }, {
                    "value": "<?php echo laporan('03','keluar') ?>"
                }, {
                    "value": "<?php echo laporan('04','keluar') ?>"
                }, {
                    "value": "<?php echo laporan('05','keluar') ?>"
                }, {
                    "value": "<?php echo laporan('06','keluar') ?>"
                }, {
                    "value": "<?php echo laporan('07','keluar') ?>"
                }, {
                    "value": "<?php echo laporan('08','keluar') ?>"
                }, {
                    "value": "<?php echo laporan('09','keluar') ?>"
                }, {
                    "value": "<?php echo laporan('10','keluar') ?>"
                }, {
                    "value": "<?php echo laporan('11','keluar') ?>"
                }, {
                    "value": "<?php echo laporan('12','keluar') ?>"
                }]
            }]
        }
    });

    revenueChart.render();

});

</script>

<?php 

$bulan=array(1=>'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des') ;
$tanggal=date('j');
$bulan_x=date('m');
$tahun=date('Y');
?>

<div class="row">
    <div class="col-md-7">
        <div class="panel panel-default">
            <div class="panel-heading">Laporan Bulan Ini</div>
            
            <div class="panel-body">
                <div id="report1"></div>
            </div>
        </div>
    </div>
    
    <div class="col-md-5">
        <div class="panel panel-default">
            <div class="panel-heading">Rasio Per Hari ini</div>
            
            <div class="panel-body">
                <div id="chartContainer"></div>
            </div>
        </div>
    </div>
  
    <div class="col-md-4">
        <div class="panel panel-primary">
        
        <div class="panel-heading"><i class="fa fa-book"></i> CETAK LAPORAN</div>
        
        <div class="panel-body">
            <label>Dari</label>
            <form class="form-inline" method="post" role="form">
                  <div class="form-group">
                    <div class="input-group">
                      <label class="sr-only"></label>
                        <select class="form-control" name="tanggal_awal">
                            <?php for($i=1;$i<=31;$i++){?>
                                <option value="<?php echo $i ?>" <?php if($i==$tanggal) echo 'selected' ?>><?php echo $i ?></option>
                            <?php } ?>
                        </select>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="input-group">
                      <label class="sr-only"></label>
                        <select class="form-control" name="bulan_awal">
                            <?php for($i=1;$i<=12;$i++){?>
                                <option value="<?php echo $i ?>" <?php if($i==$bulan_x) echo 'selected' ?>><?php echo $bulan[$i] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="input-group">
                      <label class="sr-only"></label>
                        <select class="form-control" name="tahun_awal">
                            <?php for($i=2013;$i<=2014;$i++){?>
                                <option value="<?php echo $i ?>" <?php if($i==$tahun) echo 'selected' ?>><?php echo $i ?></option>
                            <?php } ?>
                        </select>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="form-group">
                    <div class="input-group">
                      <label>Hingga</label>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="form-group">
                    <div class="input-group">
                      <label class="sr-only"></label>
                        <select class="form-control" name="tanggal_akhir">
                            <?php for($i=1;$i<=31;$i++){?>
                                <option value="<?php echo $i ?>" <?php if($i==$tanggal) echo 'selected' ?>><?php echo $i ?></option>
                            <?php } ?>
                        </select>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="input-group">
                      <label class="sr-only"></label>
                        <select class="form-control" name="bulan_akhir">
                            <?php for($i=1;$i<=12;$i++){?>
                                <option value="<?php echo $i ?>" <?php if($i==$bulan_x) echo 'selected' ?>><?php echo $bulan[$i] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="input-group">
                      <label class="sr-only"></label>
                        <select class="form-control" name="tahun_akhir">
                            <?php for($i=2013;$i<=2014;$i++){?>
                                <option value="<?php echo $i ?>" <?php if($i==$tahun) echo 'selected' ?>><?php echo $i ?></option>
                            <?php } ?>
                        </select>
                    </div>
                  </div>
                  
                  <div class="clearfix"></div><br />
                  <button class="btn btn-primary" name="cetak_laporan"><i class="fa fa-search"></i> Cari</button>
                    
                </form>
        </div>
        
        <?php if(isset($dari) && isset($sampai)){?>
            <div class="panel-footer">
                <a href="./export.php?as=pdf&dari=<?php echo $dari ?>&sampai=<?php echo $sampai?>" target="_blank"><button class="btn btn-danger btn-block"><i class="fa fa-book"></i> Klik disini untuk versi cetak</button></a>
            </div>
        <?php } ?>
        
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-info"></i> Jumlah
            </div>
            
                <ul class="list-group">
                  
                    <?php $data=get_surat_count();while($value=mysql_fetch_array($data)){?>
                    <li class="list-group-item"><i class="fa fa-envelope"></i> <?php echo $value['kategori'] ?> <span class="badge"><?php echo $value['jumlah'] ?></span></li>
                    <?php } ?>
               
                </ul>
                
            
            
        </div>
    </div>
    
    
    <div class="col-md-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-info"></i> Jumlah posting
            </div>
            
                <ul class="list-group">
                  
                    <?php $data=get_count_posting();while($value=mysql_fetch_array($data)){?>
                    <li class="list-group-item"><i class="fa fa-envelope"></i> <?php echo $value['nama'] ?> <span class="badge"><?php echo $value['jumlah'] ?></span></li>
                    <?php } ?>
               
                </ul>
                
            
            
        </div>
    </div>  
</div>






