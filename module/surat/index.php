<div class="row">
        
        <div class="col-md-12">
          
        <?php if(get_login('idbagian')=='0' || get_login('idbagian')=='1'){?><a href="./?page=surat/tambah"><button class="btn btn-default"><i class="fa fa-plus"></i> Tambah</button></a><?php } ?>
        <a href="./export.php?as=excel" target="_blank"><button class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export as EXCEL</button></a>
        <a href="./export.php?as=pdf" target="_blank"><button class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> Export as PDF</button></a>
        
        
        <?php if(get_login('idbagian')==3){?>
        <a href="./export.php?as=sql" target="_blank"><button class="btn btn-warning"><i class="fa fa-file"></i> Export as SQL</button></a>
        <?php } ?>
        <a href="./?page=sampah/index" target="_blank"><button class="btn btn-default"><i class="fa fa-trash"></i> Sampah <span class="badge"><?php echo count_sampah() ?></span> </button></a>
        <div class="clearfix"></div><br />
        
        <?php if(isset($_SESSION['delete']) && $_SESSION['delete']=='true'){?><div class="alert alert-danger"><i class="fa fa-warning"></i> <strong>Data berhasil dihapus</strong></div><?php unset($_SESSION['delete']); } ?>
        
            
        <?php if(get_login('idbagian')=='1' || get_login('idbagian')=='2'|| get_login('idbagian')=='3'){?>
                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fa fa-info"></i> Surat Masuk</div>
                    
                    <div class="panel-body">
                        <table class="table table-stripped table-hover table-responsive">
                            <thead>
                                <th>No</th>
                                <th>Tanggal Surat</th>
                                <th>No Surat</th>
                                <th>Perihal</th>
                                <th>Asal</th>
                                <th>Tujuan</th>
                                <th></th>
                            </thead>
                            
                            <tbody>
                                <?php $surat=get_surat('masuk');$i=1;while($result=mysql_fetch_array($surat)){?>
                                    <tr>
                                    <td><?= $i ?></td>
                                    <td><?php $tgl=explode('-',$result['tanggal_surat']); echo $tgl[2].'-'.$tgl[1].'-'.$tgl[0]  ?></td>
                                    <td><?= $result['idsurat'] ?></td>
                                    <td><a href="./?page=surat/detail&id=<?php echo $result['idsurat'] ?>"><?= $result['perihal'] ?></a></td>
                                    <td><?php echo $result['asal_surat'] ?></td>
                                    <td><?php echo $result['tujuan'] ?></td>
                                    <td>
                                    <?php if(get_login('idbagian')==1 || get_login('idbagian')==3){?>
                                        <a href="./?page=surat/edit&id=<?php echo $result['idsurat'] ?>"><button title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></button></a>
                                        <!--<a href="./?page=surat/delete&id=<?php echo $result['idsurat'] ?>"><button title="Hapus" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>-->
                                        <a href="#myModal-<?php echo $i ?>" class="btn btn-danger" data-toggle="modal" ><i class="fa fa-trash"></i></a>
                                    <?php } ?>
                                    
                                    </td>
                                </tr>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="myModal-<?php echo $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <h3 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-remove"></i> Konfirmasi hapus </h3>
                                      </div>
                                      <div class="modal-body">
                                        Apakah anda yakin akan menghapus <?php echo $result['perihal'] ?> ?
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <a href="./?page=surat/delete&id=<?php echo $result['idsurat'] ?>"><button title="Hapus" class="btn btn-danger"><i class="fa fa-trash"></i> HAPUS</button></a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                
                                <?php $i++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

        <?php } ?>
            
        </div>
        
        <div class="col-md-12">
            <?php if(get_login('idbagian')==0|| get_login('idbagian')=='2' || get_login('idbagian')=='3'){?>
                <div class="panel panel-primary">
                <div class="panel-heading"><i class="fa fa-info"></i> Surat Keluar</div>
                
                <div class="panel-body">
                    <table class="table table-stripped table-hover">
                        <thead>
                            <th>No</th>
                            <th>Tanggal Surat</th>
                            <th>No Surat</th>
                            <th>Perihal</th>
                            <th>Tujuan</th>
                            <th></th>
                        </thead>
                        
                        <tbody>
                            <?php $surat=get_surat('keluar');$i=1;while($result=mysql_fetch_array($surat)){?>
                                <tr>
                                <td><?= $i ?></td>
                                <td><?php $tgl=explode('-',$result['tanggal_surat']); echo $tgl[2].'-'.$tgl[1].'-'.$tgl[0]  ?></td>
                                <td><?= $result['idsurat'] ?></td>
                                <td><a href="./?page=surat/detail&id=<?php echo $result['idsurat'] ?>"><?= $result['perihal'] ?></a></td>
                                <td><?php echo $result['asal_surat'] ?></td>
                                <td>
                                <?php if(get_login('idbagian')==1 || get_login('idbagian')==0 || get_login('idbagian')=='3'){?>
                                    <a href="./?page=surat/edit&id=<?php echo $result['idsurat'] ?>"><button title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></button></a>
                                    <a href="./?page=surat/delete&id=<?php echo $result['idsurat'] ?>"><button title="Hapus" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                                    
                                <?php } ?>
                                    
                                
                                </td>
                            </tr>
                            
                            <?php $i++; } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php } ?>
        </div>
    
    
</div>

<script>
$(document).ready( function () {
    $('.table').DataTable();
} );
</script>