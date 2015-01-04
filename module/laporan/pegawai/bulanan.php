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
                    <div class="panel-heading">Jumlah Post</div>
                    
                    <ul class="list-group">
                        
                      <?php $data=pegawai_bulanan($bulan);while($result=mysql_fetch_array($data)){?>
                        <li class="list-group-item"><span class="badge"><?php echo $result['jumlah'] ?></span><?php echo $result['nama'] ?></li>
                      <?php } ?>                      
                    </ul>
                </div>
            </div>
            
            <div class="col-md-12">
                <div class="panel panel-primary">
                        <div class="panel-heading"><i class="fa fa-book"></i> Rekam Aktifitas</div>
                        
                        <div class="panel-body">
                           <table class="table table-striped">
                                <thead>
                                    <th>#</th>
                                    <th>Waktu </th>
                                    <th>Nama </th>
                                    <th>Aktifitas</th>
                                </thead>
                                
                                <tbody>
                                <?php $i=1;$data=pegawai_logs_bulanan($bulan);while($result=mysql_fetch_array($data)){?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $result['waktu'] ?></td>
                                        <td><?php echo $result['nama'] ?></td>
                                        <td><?php echo strtoupper($result['aksi']) ?></td>
                                    </tr>
                                <?php $i++; } ?>
                                </tbody>
                           </table> 
                        </div>
                    </div>
            
            </div>
        </fieldset>
    </div>
</div>