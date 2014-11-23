<div class="row">
        
        <div class="col-md-12">
          
        <a href="./?page=surat/tambah"><button class="btn btn-default"><i class="fa fa-plus"></i> Tambah</button></a>
        <a href="./export.php?as=excel" target="_blank"><button class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export as EXCEL</button></a>
        <a href="./export.php?as=pdf" target="_blank"><button class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> Export as PDF</button></a>
        
        <?php if(get_login('idbagian')==3){?><a href="./export.php?as=sql" target="_blank"><button class="btn btn-warning"><i class="fa fa-file"></i> Export as SQL</button></a><?php } ?>
        <div class="clearfix"></div><br />
        
        <?php if(isset($_SESSION['delete']) && $_SESSION['delete']=='true'){?><div class="alert alert-danger"><i class="fa fa-warning"></i> <strong>Data berhasil dihapus</strong></div><?php unset($_SESSION['delete']); } ?>
        
            <div class="panel panel-primary">
                <div class="panel-heading"><i class="fa fa-info"></i> Surat Masuk</div>
                
                <div class="panel-body">
                    <table class="table table-stripped table-hover table-responsive">
                        <thead>
                            <th>No</th>
                            <th>No Surat</th>
                            <th>Perihal</th>
                            
                            <th></th>
                        </thead>
                        
                        <tbody>
                            <?php $surat=get_surat('masuk');$i=1;while($result=mysql_fetch_array($surat)){?>
                                <tr>
                                <td><?= $i ?></td>
                                <td><?= $result['idsurat'] ?></td>
                                <td><a href="./?page=surat/detail&id=<?php echo $result['idsurat'] ?>"><?= $result['perihal'] ?></a></td>
                                
                                <td>
                                <?php if(get_login('idbagian')==1){?>
                                    <a href="./?page=surat/edit&id=<?php echo $result['idsurat'] ?>"><button title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></button></a>
                                    <a href="./?page=surat/delete&id=<?php echo $result['idsurat'] ?>"><button title="Hapus" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                                    
                                <?php } ?>
                                    
                                <?php if(get_login('idbagian')==2){?>
                                     <div class="dropdown">
                                      <button class="btn <?php if($result['public']==1){echo 'btn-success';}else{echo 'btn-danger';} ?> dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                                        <?php if($result['public']==1){
                                            echo 'Publikasi';
                                        }else{
                                            echo 'Privasi';
                                        } ?>
                                        <span class="caret"></span>
                                      </button>
                                      <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                          <?php if($result['public']==1){?>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="./?page=surat/index&publikasi=0&id=<?php echo $result['idsurat'] ?>">Private</a></li>
                                        <?php }else{?>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="./?page=surat/index&publikasi=1&id=<?php echo $result['idsurat'] ?>">Publikasi</a></li>
                                        <?php } ?>
                                      </ul>
                                    </div>                                       
                                <?php }?>
                                </td>
                            </tr>
                            <?php $i++; } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="col-md-12">
            <div class="panel panel-primary">
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
                                <td><a href="./?page=surat/detail&id=<?php echo $result['idsurat'] ?>"><?= $result['perihal'] ?></a></td>
                                <td>
                                <?php if(get_login('idbagian')==1){?>
                                    <a href="./?page=surat/edit&id=<?php echo $result['idsurat'] ?>"><button title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></button></a>
                                    <a href="./?page=surat/delete&id=<?php echo $result['idsurat'] ?>"><button title="Hapus" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                                    
                                <?php } ?>
                                    
                                <?php if(get_login('idbagian')==2){?>
                                     <div class="dropdown">
                                      <button class="btn <?php if($result['public']==1){echo 'btn-success';}else{echo 'btn-danger';} ?> dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                                        <?php if($result['public']==1){
                                            echo 'Publikasi';
                                        }else{
                                            echo 'Privasi';
                                        } ?>
                                        <span class="caret"></span>
                                      </button>
                                      <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                          <?php if($result['public']==1){?>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="./?page=surat/index&publikasi=0&id=<?php echo $result['idsurat'] ?>">Private</a></li>
                                        <?php }else{?>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="./?page=surat/index&publikasi=1&id=<?php echo $result['idsurat'] ?>">Publikasi</a></li>
                                        <?php } ?>
                                      </ul>
                                    </div>                                       
                                <?php }?>
                                </td>
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