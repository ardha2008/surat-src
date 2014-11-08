<div class="row clearfix">

	<div class="col-md-12">
    <a href="./?page=pegawai/tambah"><button class="btn btn-default"><i class="fa fa-plus"></i> Tambah</button></a>
    <div class="clearfix"></div><br />
        <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-th"></i> <strong>Daftar Pegawai</strong></div>
            <div class="panel-body">
            
            <div class="clearfix"></div>
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No Pegawai</th>
                            <th>Nama Pegawai</th>
                           <!-- <th>Bagian</th>-->
                            <th></th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php $data=get_pegawai('nama');?>
                        <?php $i=1;while($result=mysql_fetch_array($data)){?>
                            <tr>
                            <td><?= $i ?></td>
                            <td><?= $result['idpegawai'] ?></td>
                            <td><?= $result['nama'] ?></td>
                            <!--<td>Kepala Biro</td>-->
                            <td>
                                <a id="<?= $result['idpegawai'] ?>" href="#<?= $result['idpegawai'] ?>" role="button" class="btn" data-toggle="modal"><i class="fa fa-eye"></i></a>
                                <i class="fa fa-pencil"></i>
                                <i class="fa fa-trash"></i>
                            </td>
                            </tr>
                            
                            
                            <div class="modal fade" id="<?= $result['idpegawai'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                				<div class="modal-dialog modal-lg">
                					<div class="modal-content">
                						<div class="modal-header">
                							 <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></button>
                							<h4 class="modal-title">
                								Lihat detail - <?= $result['nama']; ?>
                							</h4>
                						</div>
                						<div class="modal-body">
                							<div class="col-sm-3">
                                                <div class="thumbnail">
                                                    <img src="./img/foto/<?= $result['foto'] ?>" />
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-9">
                                                <fieldset>
                                                    <legend>Informasi Utama</legend>
                                                    
                                                        <div class="form-group">
                                                        <label class="col-sm-3 control-label">NIP</label>
                                                        <div class="col-sm-9">
                                                          <p><?= $result['idpegawai'] ?></p>
                                                        </div>
                                                    </div>  
                                                    
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Nama</label>
                                                        <div class="col-sm-9">
                                                          <p><?= $result['nama'] ?></p>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Bagian</label>
                                                        <div class="col-sm-9">
                                                          <p><?= 'staff' ?></p>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                
                                                <fieldset>
                                                    <legend>Informasi Lainnya</legend>
                                                    
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Tanggal Lahir</label>
                                                        <div class="col-sm-9">
                                                          <p><?= $result['tanggal_lahir'] ?></p>
                                                        </div>
                                                    </div>  
                                                    
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Alamat</label>
                                                        <div class="col-sm-9">
                                                          <p><?= $result['alamat'] ?>, <?= $result['kota'] ?></p>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">No Telp</label>
                                                        <div class="col-sm-9">
                                                          <p><?= $result['telepon'] ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Ponsel</label>
                                                        <div class="col-sm-9">
                                                          <p><?= $result['ponsel'] ?></p>
                                                        </div>
                                                    </div>
                                                    
                                                </fieldset>
                                                
                                                
                                            </div>
                                            
                                            
                						</div>
                                        <div class="clearfix"></div>
                						<div class="modal-footer">
                							 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
                						</div>
                					</div>
                					
                				</div>
                				
                			</div>
                        <?php $i++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
	</div>
</div>