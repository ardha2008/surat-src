<div class="row">
        
        <div class="col-md-12">
          
        <a href="./?page=surat/tambah"><button class="btn btn-default"><i class="fa fa-plus"></i> Tambah</button></a>
        <a href="./export.php?as=excel" target="_blank"><button class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export as EXCEL</button></a>
        <a href="./export.php?as=pdf" target="_blank"><button class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> Export as PDF</button></a>
        
        <?php if(get_login('idbagian')==3){?><a href="./export.php?as=sql" target="_blank"><button class="btn btn-warning"><i class="fa fa-file"></i> Export as SQL</button></a><?php } ?>
        <div class="clearfix"></div><br />
        
        <?php if(isset($_SESSION['delete']) && $_SESSION['delete']=='true'){?><div class="alert alert-danger"><i class="fa fa-warning"></i> <strong>Data berhasil dihapus</strong></div><?php unset($_SESSION['delete']); } ?>
        
            <div class="panel panel-primary">
                <div class="panel-heading"><i class="fa fa-info"></i> Riwayat Saya</div>
                
                <div class="panel-body">
                    <table class="table table-stripped table-hover table-responsive">
                        <thead>
                            <th>No</th>
                            <th>No Surat</th>
                            <th>Perihal</th>
                            
                            <th></th>
                        </thead>
                        
                        <tbody>
                            <?php $surat=riwayat(get_login('idusers'));$i=1;while($result=mysql_fetch_array($surat)){?>
                                <tr>
                                <td><?= $i ?></td>
                                <td><?= $result['idsurat'] ?></td>
                                <td><a href="./?page=surat/detail&id=<?php echo $result['idsurat'] ?>"><?= $result['perihal'] ?></a></td>
                                <td>
                                    <a href="./?page=surat/edit&id=<?php echo $result['idsurat'] ?>"><button title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></button></a>
                                    <a href="./?page=surat/delete&id=<?php echo $result['idsurat'] ?>"><button title="Hapus" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                                </td>
                            </tr>
                            <?php $i++; } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>