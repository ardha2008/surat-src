<div class="row">
        
        <div class="col-md-12">
          
        <a href="./?page=surat/tambah"><button class="btn btn-default"><i class="fa fa-plus"></i> Tambah</button></a>
        <div class="clearfix"></div><br />
        
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-info"></i> Surat Masuk</div>
                
                <div class="panel-body">
                    <table class="table table-stripped table-hover">
                        <thead>
                            <th>No</th>
                            <th>No Surat</th>
                            <th>Perihal</th>
                        </thead>
                        
                        <tbody>
                            <?php $surat=get_surat('all');$i=1;while($result=mysql_fetch_array($surat)){?>
                                <tr>
                                <td><?= $i ?></td>
                                <td><?= $result['idsurat'] ?></td>
                                <td><?= $result['perihal'] ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-info"></i> Surat Keluar</div>
                
                <div class="panel-body">
                    <table class="table table-stripped table-hover">
                        <thead>
                            <th>No</th>
                            <th>No Surat</th>
                            <th>Perihal</th>
                        </thead>
                        
                        <tbody>
                            <?php for($i=1;$i<=5;$i++){?>
                                <tr>
                                <td><?= $i ?></td>
                                <td>11/KERMA/001</td>
                                <td>Pinjam Duit</td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
    
</div>

<script>
$(document).ready( function () {
    $('.table').DataTable();
} );
</script>