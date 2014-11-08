<div class="row clearfix">
	
	<div class="col-md-12">
        <form method="post" enctype="multipart/form-data" role="form">
        <a href="./?page=pegawai/index" class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Kembali</a>
        <button type="submit" name="tambah_pegawai" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
        <div class="clearfix"></div><br />
        
            <fieldset>
                <legend>Tambah Pegawai</legend>
                
                <?php if(isset($success) && $success == 1){ ?><div class="alert alert-success">Berhasil menambahkan data baru</div><?php };?>
                <?php if(isset($failed) && $failed == 1){ ?><div class="alert alert-danger">Foto tidak dapat digunakan</div><?php };?>
                
                <div class="col-md-8">
                    <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-info"></i> Informasi Wajib</div>
            
                    <div class="panel-body">
                        <div class="form-horizontal">
                              <div class="form-group">
                                <label class="col-sm-3 control-label">NIP*</label>
                                <div class="col-sm-5">
                                  <input type="text" autofocus="" class="form-control" name="nip" required="" placeholder="No Pegawai / Identitas Lainnya"/>
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <label class="col-sm-3 control-label">Nama*</label>
                                <div class="col-sm-5">
                                  <input type="text" name="nama" class="form-control" required="" placeholder="Nama Lengkap"/>
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <label class="col-sm-3 control-label">Bagian*</label>
                                <div class="col-sm-5">
                                  <select class="form-control" name="bagian">
                                        <option value="null">pilih</option>
                                    <?php $data=get_bagian();while($result=mysql_fetch_array($data)){?>
                                        <option value="<?= $result['idbagian'] ?>"><?= $result['keterangan'] ?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <label class="col-sm-3 control-label">Tanggal Lahir*</label>
                                <div class="col-sm-5">
                                  <input type="text" id="tl" name="tl" class="form-control" required="" />
                                    <small>**) Format : tanggal/bulan/tahun</small>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
                
            </div>
            
            <div class="col-md-4">
                    <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-th"></i> 5 Data terakhir</div>
            
                    <div class="panel-body">
                        <ol>
                            <?php $data=get_last_pegawai('created_at',5);while($result=mysql_fetch_array($data)){?>
                                <li><?= $result['nama'] ?></li>
                            <?php } ?>
                        </ol>
                    </div>
                </div>
            </div>
            
              
        </fieldset>
        
        <div class="col-lg-12">
            <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-user"></i> Informasi Lainnya</div>
        
            <div class="panel-body">
                <div class="col-sm-6">
                    
                    <div class="form-group">                    
                        <div class="col-xs-8">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control"></textarea>
                        </div>                        
                    </div>
                    
                    <div class="clearfix"></div><br />
                    <div class="form-group">                    
                        <div class="col-xs-8">
                        <label>Kota</label>
                        <input type="text" name="kota" class="form-control" />
                        </div>                        
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="form-group">                    
                        <div class="col-xs-12">
                        <label>No Telepon</label>
                        <input type="text" name="telepon" class="form-control" />
                        </div>                        
                    </div>
                    
                    <div class="form-group">                    
                        <div class="col-xs-12">
                        <label>No Ponsel</label>
                        <input type="text" name="ponsel" class="form-control" />
                        </div>                        
                    </div>
                    
                    <div class="form-group">                    
                        <div class="col-xs-12">
                        <label>Foto</label>
                        <input type="file" name="foto"/>
                        </div>
                                                
                    </div>
                    
                </div>
                
                <div class="clearfix"></div><hr />
                <button type="submit" name="tambah_pegawai" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
            </div>
        </div>
        </div>
    
	   </form>
    </div>
</div>