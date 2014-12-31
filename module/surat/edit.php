
<?php 
if(isset($_GET['id'])){ 
    $id=$_GET['id'];
    $result=mysql_fetch_array(get_one($id));
    }else{
        header('location:./?page=surat/index');
    } 
     
//print_r($result);exit() ?>
<script>
jQuery(function($){
   $("#tl").mask("9999/99/99");
});
</script>

<div class="row clearfix">
	
	<div class="col-md-12">
        <form method="post" enctype="multipart/form-data" role="form">
        <a href="./?page=surat/index" class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Kembali</a>
        <button type="submit" name="update_surat" class="btn btn-success"><i class="fa fa-save"></i> Perbarui</button>
        <div class="clearfix"></div><br />
        
            <fieldset>
                <legend>Perbarui Surat - <?php echo $result['idsurat'] ?></legend>
                
                <?php if(isset($_SESSION['success']) && $_SESSION['success'] == true){ ?><div class="alert alert-success">Berhasil Memperbarui data baru</div><?php unset($_SESSION['success']) ;};?>
                <?php if(isset($failed) && $failed == 1){ ?><div class="alert alert-warning"><i class="fa fa-warning"></i> Foto tidak dapat digunakan</div><?php };?>
                
                <div class="col-md-8">
                    <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-info"></i> Informasi Wajib</div>
            
                    <div class="panel-body">
                        <div class="form-horizontal">
                        
                              <div class="form-group">
                                <label class="col-sm-3 control-label">Nomor Surat*</label>
                                <div class="col-sm-5">
                                  <input type="text" autofocus="" value="<?php echo $result['idsurat'] ?>" class="form-control" name="idsurat" required="" placeholder="eg. 110/KERMA/UND/002"/>
                                  <input type="hidden" value="<?php echo $result['idsurat'] ?>" class="form-control" name="old_idsurat" required="" />
                                </div>
                              </div>
                              
                              <?php if(get_login('idbagian')==0 || get_login('idbagian')==1){?>
                                <input type="hidden" name="jenis_surat" value="<?php echo $result['jenis_surat'] ?>" />
                              <?php }else{?>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"></label>
                                    <div class="col-sm-5">
                                      <div class="radio">
                                          <label>
                                            <input type="radio" name="jenis_surat" required="" value="masuk" <?php if($result['jenis_surat'] == 'masuk') echo 'checked'?> />Surat Masuk
                                          </label>
                                        </div>
                                        <div class="radio">
                                          <label>
                                            <input type="radio" name="jenis_surat" required="" value="keluar" <?php if($result['jenis_surat'] == 'keluar') echo 'checked'?>/>Surat Keluar
                                          </label>
                                        </div>
                                    </div>
                                </div>
                              <?php } ?>
                            
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Perihal</label>
                                <div class="col-sm-5">
                                  <textarea class="form-control" name="perihal"><?php echo $result['perihal'] ?></textarea>
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <label class="col-sm-3 control-label">Jenis Surat</label>
                                <div class="col-sm-5">
                                  <select class="form-control" name="kategori">
                                    <?php $get_kategori=get_kategori();while($hasil=mysql_fetch_array($get_kategori)){?>
                                        <option value="<?php echo $hasil['idkategori'] ?>" <?php if($hasil['idkategori']==$result['idkategori']) echo 'selected'; ?> ><?php echo $hasil['keterangan_kategori'] ?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                              </div>
                            
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Tanggal Surat</label>
                                <div class="col-sm-5">
                                  <input type="text" name="tanggal_surat" id="tl" value="<?php echo $result['tanggal_surat'] ?>" class="form-control" placeholder="dd/mm/yyyy" required="" />
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-5">
                                  <div class="radio">
                                      <label>
                                        <input type="radio" name="publikasi" required="" value="1" <?php if($result['publikasi'] == '1') echo 'checked'?> />
                                        Publikasi
                                      </label>
                                    </div>
                                    <div class="radio">
                                      <label>
                                        <input type="radio" name="publikasi" required="" value="0" <?php if($result['publikasi'] == '0') echo 'checked'?> />
                                        Rahasia
                                      </label>
                                    </div>
                                </div>
                            </div>
                              
                        </div>
                    </div>
                </div>
                
            </div>
            
            <div class="col-md-4">
                    <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-th"></i> LAMPIRAN</div>
            
                    <div class="panel-body">
                        <div class="thumbnail">
                            <img src="./img/surat/<?php echo $result['lampiran'] ?>" />
                        </div>
                        <input type="hidden" name="old_lampiran" value="<?php echo $result['lampiran'] ?>" />
                        <input type="file" class="btn btn-primary" name="lampiran" />
                    </div>
                </div>
            </div>
            
              
        </fieldset>
        
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-user"></i> Informasi Lainnya</div>
                
                <div class="panel-body">
                     <div class="form-group">                    
                        <div class="col-xs-12">
                            <label>Disposisi</label>
                            <input type="text" class="form-control" name="disposisi" value="<?php echo $result['disposisi']  ?>" placeholder="" />
                        </div>                        
                    </div>
                    
                    
                    <div class="form-group">                    
                        <div class="col-xs-12">
                            <label>Catatan</label>
                            <input type="text" class="form-control" value="<?php echo $result['catatan']  ?>" name="keyword" placeholder="" />
                        </div>                        
                    </div>
 
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-user"></i> Tujuan surat</div>
                
                <div class="panel-body">
                     
                    <div class="form-group">                    

                            <div class="col-xs-12">
                                <label>Nama Instansi </label>
                                <input type="text" required="" name="tujuan" value="<?php echo $result['nama_tujuan']  ?>" class="form-control"/>
                            </div>
                            
                            <div class="col-xs-12">
                                <label>Alamat Instansi </label>
                                <textarea class="form-control" required="" name="alamat_tujuan"><?php echo $result['alamat_tujuan']  ?></textarea>
                            </div>
                 
                        </div>
                        
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-user"></i> Asal Surat</div>
                
                <div class="panel-body">
                     <div class="form-group">                    
                        <div class="col-xs-8">
                            <label id="label2">Nama Instansi</label>
                            <input type="text" class="form-control" name="nama_asal" required="" value="<?php echo $result['nama_asal']  ?>" placeholder="" />
                        </div>                        
                    </div>
                    
                    <div class="form-group">                    
                        <div class="col-xs-8">
                            <label id="label2">Alamat Instansi</label>
                            <textarea class="form-control" name="alamat_asal"><?php echo $result['alamat_asal']  ?></textarea>
                        </div>                        
                    </div>
                    

                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <button type="submit" name="tambah_surat" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
    
	   </form>
    </div>
</div>
