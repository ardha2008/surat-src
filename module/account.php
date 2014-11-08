<div class="row clearfix">
    <div class="col-md-4">
       <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-info"></i> Informasi</div>
                
                <div class="panel-body">
                    <p>Berguna untuk memanajemen profil pribadi dan juga mengubah password lama dengan password yang baru</p>
                </div>
            
            </div>
       </div>
       
       <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-info"></i> Informasi</div>
                
                <div class="panel-body">
                    <p>Berguna untuk memanajemen profil pribadi dan juga mengubah password lama dengan password yang baru</p>
                </div>
            
            </div>
       </div> 
    </div>
    
    <div class="col-md-8">
        <div class="col-md-12">
            <?php if(isset($success) && $success==1){?><div class="alert alert-success"><i class="fa fa-check"></i> Berhasil memperbarui data</div><?php } ?>
            
            <?php if(isset($failed) && $failed==1){?><div class="alert alert-danger"><i class="fa fa-warning"></i> Password lama tidak cocok</div><?php } ?>
            <?php if(isset($failed) && $failed==2){?><div class="alert alert-danger"><i class="fa fa-warning"></i> Password baru dengan verifikasi harus cocok</div><?php } ?>
            
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-user"></i> Informasi Umum</div>
                
                <div class="panel-body">
                    <form role="form" method="post">
                        
                        <div class="col-sm-6">
                            <div class="form-group">
            					<div class="thumbnail">
                                    <img class="img-responsive" src="./img/foto/<?= get_login('foto') ?>" />
                                </div>
            				</div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
            					 <label>Foto</label><input type="file" name="foto" />
            					<p class="help-block">
            						File maks : 2 MB
            					</p>
            				</div>
                        </div>
                        <div class="clearfix"></div>
   				        <button type="submit" name="update_personal" class="btn btn-default"><i class="fa fa-upload"></i> Upload</button>
        			</form>
                </div>
            </div>
            
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-user"></i> Informasi Umum</div>
                
                <div class="panel-body">
                    <form role="form" method="post">
                    
        				<div class="form-group">
                            <label>NIP</label><input type="text" class="form-control" name="nip" value="<?= get_login('idpegawai') ?>" />
                        </div>
                        
                        
                        <div class="form-group">
      					   <label>Nama</label><input type="text" class="form-control" name="nama" value="<?= get_login('nama') ?>" />
        				</div>
                        
                        <hr />
                        
                        <div class="form-group">
      					   <label>Alamat</label><textarea class="form-control" name="alamat"><?= get_login('alamat') ?></textarea>
        				</div>
                        
                        <div class="form-group">
      					   <label>Kota</label><input type="text" class="form-control" value="<?= get_login('kota') ?>" name="kota" />
        				</div>
                        
                        <hr />
                        
                        <div class="form-group">
      					   <label>Telepon</label><input type="text" class="form-control" name="telepon" value="<?= get_login('telepon') ?>" />
        				</div>
                        
                        <div class="form-group">
      					   <label>Ponsel</label><input type="text" class="form-control" name="ponsel" value="<?= get_login('ponsel') ?>" />
        				</div>
                        
				        <div class="col-sm-6">
                            <div class="form-group">
            					 <label for="exampleInputFile">Foto</label><input type="file" name="foto" />
            					<p class="help-block">
            						File maks : 2 MB
            					</p>
            				</div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
            					<div class="thumbnail">
                                    <img class="img-responsive" src="./img/foto/<?= get_login('foto') ?>" />
                                </div>
            				</div>
                        </div>
                        
   				        <button type="submit" name="update_personal" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
        			</form>
                </div>
            </div>
            
            <div class="panel panel-danger">
            <div class="panel-heading"><i class="fa fa-warning"></i> Ganti Password</div>
            
            <div class="panel-body">
                <form role="form" method="post">
    				<div class="form-group">
    					 <label>Password Lama</label><input type="password" required="" class="form-control" name="old" />
    				</div>
                    
    				<div class="form-group">
    					 <label>Password Baru</label><input type="password" required="" class="form-control" name="new" />
    				</div>
    				
                    <div class="form-group">
    					 <label>Verifikasi Password</label><input type="password" required="" class="form-control" name="renew" />
    				</div>
                    
    				 <button type="submit" class="btn btn-danger" name="change-password"><i class="fa fa-warning"></i> Change Password</button>
    			</form>
            </div>
        </div>
        </div>
    </div>    
</div>