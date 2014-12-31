<?php 
if(isset($_GET['id'])){ 
    $id=$_GET['id'];
    $result=mysql_fetch_array(get_one($id));
    }else{
        header('location:./?page=surat/index');
    } 
     
//print_r($result);exit() ?>

<div class="row clearfix">
	
	<div class="col-md-12">
        <form method="post" enctype="multipart/form-data" role="form">
        <a href="./?page=surat/index" class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i> Kembali</a>
        
        <div class="clearfix"></div><br />
        
            <fieldset>
                <legend>Detail Surat - <?php echo $result['idsurat'] ?></legend>
                
                <?php if(isset($success) && $success == 1){ ?><div class="alert alert-success">Berhasil menambahkan data baru</div><?php };?>
                <?php if(isset($failed) && $failed == 1){ ?><div class="alert alert-warning"><i class="fa fa-warning"></i> Foto tidak dapat digunakan</div><?php };?>
                
                <div class="col-md-8">
                    <div class="panel panel-default">
                    <div class="panel-heading"><div class="panel-title"><i class="fa fa-info"></i> Informasi Wajib</div></div>
            
                    <div class="panel-body">
                        <div class="form-horizontal">
                        
                              <div class="form-group">
                                <label class="col-sm-3 control-label">Nomor Surat*</label>
                                <div class="col-sm-5">
                                  <input type="text" autofocus="" disabled="" value="<?php echo $result['idsurat'] ?>" class="form-control" name="idsurat" required="" placeholder="eg. 110/KERMA/UND/002"/>
                                </div>
                              </div>
                              
                            
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Perihal</label>
                                <div class="col-sm-5">
                                  <p class="form-control-static"><?php echo $result['perihal'] ?></p>
                                </div>
                              </div>
                            
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Tanggal Surat</label>
                                <div class="col-sm-5">
                                  <p class="form-control-static"><?php echo $result['tanggal_surat'] ?></p>
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-5">
                                <?php if($result['publikasi'] == '0'){?><div class="alert alert-danger"><i class="fa fa-danger"></i> Surat ini bersifat <strong>TERTUTUP</strong></div><?php } ?>
                                <?php if($result['publikasi'] == '1'){?><div class="alert alert-success"><i class="fa fa-info"></i> Surat ini bersifat <strong>TERBUKA</strong></div><?php } ?>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Dicatat oleh </label>
                                <div class="col-sm-5">
                                  <p class="form-control-static"><?php echo $result['nama'] ?></p>
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
                    </div>
                </div>
            </div>
            
              
        </fieldset>
        
        <div class="col-lg-4">
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <h4 class="panel-title"><i class="fa fa-info"></i> Informasi Lain</h4>
                </div>
                
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label">Disposisi</label>
                        <input type="text" disabled="" class="form-control" value="<?php echo $result['disposisi'] ?>" />
                    </div>
                </div>
                
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label">Disposisi</label>
                        <input type="text" disabled="" class="form-control" value="<?php echo $result['catatan'] ?>" />
                    </div>
                </div>
                
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label">Tanggal Posting</label>
                        <input type="text" disabled="" class="form-control" value="<?php echo $result['created_at'] ?>" />
                    </div>
                </div>
                
              </div>
        </div>
        
        <div class="col-lg-4">      
             
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <h4 class="panel-title"><i class="fa fa-info"></i> Asal Surat</h4>
                </div>
                
                <div class="panel-body">
                    <label><?php echo $result['nama_asal'] ?></label>
                    <address><?php echo $result['alamat_asal'] ?></address>                                
                  </div>
                
              </div>
            
        </div>
        
        <div class="col-lg-4">      
             
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <h4 class="panel-title"><i class="fa fa-info"></i> Tujuan Surat</h4>
                </div>
                
                <div class="panel-body">
                    <label><?php echo $result['nama_tujuan'] ?></label>
                    <address><?php echo $result['alamat_tujuan'] ?></address>                                
                  </div>
                
              </div>
            
        </div>
        
    
	   </form>
    </div>
</div>
