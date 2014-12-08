<div class="row">

    <div class="alert alert-info"> <strong> <i class="fa fa-info"></i> Berfungsi sebagai tempat data di hapus</strong></div>
    <?php if(isset($_SESSION['message']) && $_SESSION['message']==true){?><div class="alert alert-success"> <strong> <i class="fa fa-info"></i> File berhasil dikembalikan</strong></div><?php unset($_SESSION['message']); } ?>
    <div class="col-md-8">
        <div class="panel panel-primary">
        <div class="panel-heading"><i class="fa fa-trash"></i> Tempat Sampah</div>
        <div class="panel-body">
        
            <table class="table table-responsive table-stripped">
                <thead>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>No Surat</th>
                    <th>perihal</th>
                    <th></th>
                </thead>
                
                <tbody>
                    <?php $i=1;$data=get_sampah();while($result=mysql_fetch_array($data)){?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $result['tanggal_surat'] ?></td>
                            <td><?php echo $result['idsurat'] ?></td>
                            <td><?php echo $result['perihal'] ?></td>
                            <td><a href="./?page=sampah/restore&id=<?php echo $result['idsurat']; ?>"><button class="btn btn-primary"><i class="fa fa-reply"></i> Restore</button></a></td>
                        </tr>
                    <?php $i++; } ?>
                </tbody>
            </table>
        </div>    
    </div>
    </div>
    
    <div class="col-md-4">
        <div class="panel panel-primary">
            <div class="panel-heading"><i class="glyphicon glyphicon-list-alt"></i> Statistik</div>
            
            <!--<div class="panel-body">-->
                <ul class="list-group">
                  <li class="list-group-item"><span class="badge"><?php echo count_sampah('all') ?></span>Total</li>  
                  <li class="list-group-item"><span class="badge"><?php echo count_sampah('masuk') ?></span>Surat Masuk</li>
                  <li class="list-group-item"><span class="badge"><?php echo count_sampah('keluar') ?></span>Surat Keluar</li>
                </ul>
            <!--</div>-->
        </div>
    
    </div>
</div>