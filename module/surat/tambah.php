<script>
jQuery(function($){
   $("#tl").mask("9999/99/99");
});
</script>

<div class="row clearfix">
	
	<div class="col-md-12">
        <form method="post" enctype="multipart/form-data" role="form">
        
        <?php if(get_login('idbagian')==0){?>
            <a href="./?page=surat/riwayat" class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Kembali</a>
        <?php }else{ ?>
            <a href="./?page=surat/index" class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Kembali</a>
        <?php } ?>
        
        <button type="submit" name="tambah_surat" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
        <div class="clearfix"></div><br />
        
            <fieldset>
                <legend>Tambah Surat</legend>
                
                <?php if(isset($success) && $success == 1){ ?><div class="alert alert-success">Berhasil menambahkan data baru</div><?php };?>
                <?php if(isset($failed) && $failed == 1){ ?><div class="alert alert-warning"> Fungsi akan lebih baik ketika menggunakan lampiran</div><?php };?>
                
                <div class="col-md-8">
                    <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-info"></i> Informasi Wajib</div>
            
                    <div class="panel-body">
                        <div class="form-horizontal">
                        
                              <div class="form-group">
                                <label class="col-sm-3 control-label">Nomor Surat*</label>
                                <div class="col-sm-5">
                                  <input type="text" autofocus="" class="form-control" name="idsurat" required="" placeholder="eg. B/001/KERMW/11/2014"/>
                                </div>
                              </div>
                              
                              <?php if(get_login('idbagian')==0){?>
                                <input type="hidden" name="jenis_surat" value="masuk" />
                              <?php }else{?>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"></label>
                                    <div class="col-sm-5">
                                      <div class="radio">
                                          <label>
                                            <input type="radio" name="jenis_surat" required="" value="masuk" />
                                            Surat Masuk
                                          </label>
                                        </div>
                                        <div class="radio">
                                          <label>
                                            <input type="radio" name="jenis_surat" required="" value="keluar"/>
                                            Surat Keluar
                                          </label>
                                        </div>
                                    </div>
                                </div>
                              <?php } ?>
                            
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Perihal</label>
                                <div class="col-sm-5">
                                  <textarea class="form-control" name="perihal"></textarea>
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <label class="col-sm-3 control-label">Jenis Surat</label>
                                <div class="col-sm-5">
                                  <select class="form-control" name="kategori">
                                    <?php $get_kategori=get_kategori();while($hasil=mysql_fetch_array($get_kategori)){?>
                                        <option value="<?php echo $hasil['idkategori'] ?>"><?php echo $hasil['keterangan_kategori'] ?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                              </div>
                            
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Tanggal Surat</label>
                                <div class="col-sm-5">
                                  <input type="text" name="tanggal_surat" id="tl" class="form-control" placeholder="yyyy/mm/dd" required="" />
                                </div>
                              </div>
                              
                              <?php if(get_login('idbagian')==0){?>
                                <input type="hidden" name="publikasi" value="0" />
                              <?php }else{?>
                                <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-5">
                                  <div class="radio">
                                      <label>
                                        <input type="radio" name="publikasi" required="" value="1" />
                                        Publikasi
                                      </label>
                                    </div>
                                    <div class="radio">
                                      <label>
                                        <input type="radio" name="publikasi" required="" value="0"/>
                                        Rahasia
                                      </label>
                                    </div>
                                </div>
                            </div>
                              <?php } ?>
                              
                        </div>
                    </div>
                </div>
                
            </div>
            
            <div class="col-md-4">
                    <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-th"></i> 5 Data terakhir</div>
            
                    <div class="panel-body">
                        <ol>
                            <?php $data=get_last_surat('created_at',5);while($result=mysql_fetch_array($data)){?>
                                <li><?= $result['perihal'] ?></li>
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
                            <label>Keterangan Tambahan</label>
                            <textarea name="catatan" class="form-control"></textarea>
                        </div>                        
                    </div>
                    
                    <div class="form-group">                    
                        <div class="col-xs-8">
                            <label>Asal Surat</label>
                            <input type="text" class="form-control" name="asal_surat" placeholder="" />
                        </div>                        
                    </div>
                    
                    <div class="form-group">                    
                        <div class="col-xs-8">
                            <label>Disposisi</label>
                            <input type="text" class="form-control" name="disposisi" placeholder="" />
                        </div>                        
                    </div>
                    
                    <div class="form-group">                    
                        <div class="col-xs-8">
                            <label>Kata Kunci</label>
                            <input type="text" class="form-control" name="keyword" placeholder="" />
                            <small>*dipisahkan dengan koma</small>
                        </div>                        
                    </div>
                    
                </div>
                
                <div class="col-sm-6">
                    <div class="form-group">                    
                        <div class="col-xs-8">
                            <label>Lampiran</label>
                            <input type="file" name="lampiran" class="form-control" />
                        </div>                        
                    </div>
                </div>
                
                
                <div class="clearfix"></div><hr />
                <button type="submit" name="tambah_surat" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
            </div>
        </div>
        </div>
    
	   </form>
    </div>
</div>


