<div class="row">
        
        <div class="col-md-12">
          
        <a href="./?page=surat/tambah"><button class="btn btn-default"><i class="fa fa-plus"></i> Tambah</button></a>
        <a href="./export.php?as=excel" target="_blank"><button class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export as EXCEL</button></a>
        <a href="#"><button class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> Export as PDF</button></a>
        <div class="clearfix"></div><br />
        
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-info"></i> Surat Masuk</div>
                
                <div class="panel-body">
                    <table class="table table-stripped table-hover table-responsive">
                        <thead>
                            <th>No</th>
                            <th>No Surat</th>
                            <th>Perihal</th>
                            <!--<th>Tanggal Surat</th>-->
                            <th></th>
                        </thead>
                        
                        <tbody>
                            <?php $surat=get_surat('masuk');$i=1;while($result=mysql_fetch_array($surat)){?>
                                <tr>
                                <td><?= $i ?></td>
                                <td><?= $result['idsurat'] ?></td>
                                <td><a href="./?page=surat/detail&id=<?php echo $result['idsurat'] ?>"><?= $result['perihal'] ?></a></td>
                                <!-- <td><?= $result['tanggal_surat'] ?></td>-->
                                <td>
                                    <a href="./?page=surat/edit&id=<?php echo $result['idsurat'] ?>"><button class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</button></a>
                                    <a href="./?page=surat/delete&id=<?php echo $result['idsurat'] ?>"><button class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button></a>
                                </td>
                            </tr>
                            <?php $i++; } ?>
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
                            <th></th>
                        </thead>
                        
                        <tbody>
                            <?php $surat=get_surat('keluar');$i=1;while($result=mysql_fetch_array($surat)){?>
                                <tr>
                                <td><?= $i ?></td>
                                <td><?= $result['idsurat'] ?></td>
                                <td><?= $result['perihal'] ?></td>
                                <td>
                                    <a href="./?page=surat/edit&id=<?php echo $result['idsurat'] ?>"><button class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</button></a>
                                    <a href="./?page=surat/delete&id=<?php echo $result['idsurat'] ?>"><button class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button></a>
                                </td>
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