<div class="row">
        
        <div class="col-md-12">
          
       
        <?php if(isset($_SESSION['delete']) && $_SESSION['delete']=='true'){?><div class="alert alert-danger"><i class="fa fa-warning"></i> <strong>Data berhasil dihapus</strong></div><?php unset($_SESSION['delete']); } ?>
        
            <div class="panel panel-primary">
                <div class="panel-heading"><i class="fa fa-info"></i> Daftar Surat</div>
                
                <div class="panel-body">
                    <table class="table table-stripped table-hover table-responsive">
                        <thead>
                            <th>No</th>
                            <th>No Surat</th>
                            <th>Perihal</th>
                            
                            <th></th>
                        </thead>
                        
                        <tbody>
                            <?php $surat=get_surat('all');$i=1;while($result=mysql_fetch_array($surat)){?>
                                <tr>
                                <td><?= $i ?></td>
                                <td><?= $result['idsurat'] ?></td>
                                <td><a href="./?page=surat/detail&id=<?php echo $result['idsurat'] ?>"><?= $result['perihal'] ?></a></td>
                                <td></td>
                            </tr>
                            <?php $i++; } ?>
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