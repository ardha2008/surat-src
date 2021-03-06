<?php 
$bulan=date('m');
    
    function bulan($i){
        $data=array(1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
        return $data[$i];
    }
?>

<div class="row">
    <div class="col-md-12">
        <fieldset>
            <legend>Laporan bulanan per <?php echo bulan(date('n')).' '.date('Y') ?></legend>
            
            <div class="col-md-6">
            <a href="./?page=laporan/index"><button class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Kembali</button></a>
                <div class="clearfix"></div><br /> 
                <div class="panel panel-primary">
                    <div class="panel-heading">Jumlah</div>
                    
                    <ul class="list-group">
                      <li class="list-group-item"><span class="badge"><?php echo count_sampah('all') ?></span>Total</li>  
                      <?php $data=count_bulan($bulan);while($result=mysql_fetch_array($data)){?>
                        <li class="list-group-item"><span class="badge"><?php echo $result['jumlah'] ?></span><?php echo $result['jenis_surat'] ?></li>
                      <?php } ?>                      
                    </ul>
                </div>
            </div>
            
            <div class="col-md-12">
                <div class="panel panel-primary">
                        <div class="panel-heading"><i class="fa fa-book"></i> Laporan</div>
                        
                        <div class="panel-body">
                           <table class="table table-striped">
                                <thead>
                                    <th>#</th>
                                    <th>Tanggal </th>
                                    <th>No </th>
                                    <th>Perihal</th>
                                </thead>
                                
                                <tbody>
                                <?php $i=1;$data=laporan_bulan($bulan);while($result=mysql_fetch_array($data)){?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $result['tanggal_surat'] ?></td>
                                        <td><?php echo $result['idsurat'] ?></td>
                                        <td><?php echo $result['perihal'] ?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                           </table> 
                        </div>
                    </div>
            
            </div>
        </fieldset>
    </div>
</div>