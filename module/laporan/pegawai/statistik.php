<?php lock('2') ;$data=pegawai_seluruh();?>

<?php 

$bulan=array(1=>'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des') ;
$tanggal=date('j');
$bulan_x=date('m');
$tahun=date('Y');
?>


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
                "caption": "Kinerja Karyawan Keseluruhan",
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
            "data": [
            <?php while($result=mysql_fetch_array($data)){?>
                {
                "label": "<?php echo $result['nama']  ?>",
                "value": "<?php echo $result['jumlah']  ?>"
                },
            <?php } ?>
            ]
        }
    });

    demographicsChart.render();
});

</script>



<div class="row">
    
    <div class="col-md-5">
        <div class="panel panel-default">
            <div class="panel-heading">Rasio Per Hari ini</div>
            
            <div class="panel-body">
                <div id="chartContainer"></div>
            </div>
        </div>
    </div>
    
    
</div>






