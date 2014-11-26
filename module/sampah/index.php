<div class="row">

    <div class="alert alert-info"> <strong> <i class="fa fa-info"></i> Berfungsi sebagai tempat data di hapus</strong></div>
    <div class="col-md-8">
        <div class="panel panel-primary">
        <div class="panel-heading"><i class="fa fa-trash"></i> Tempat Sampah</div>
        <div class="panel-body">
        
            <table class="table table-stripped table-hover">
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
                            <td><button class="btn btn-danger"><i class="fa fa-reply"></i> Restore</button></td>
                        </tr>
                    <?php $i++; } ?>
                </tbody>
            </table>
        </div>    
    </div>
    </div>
</div>