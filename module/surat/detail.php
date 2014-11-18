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
                    <div class="panel-heading"><i class="fa fa-info"></i> Informasi Wajib</div>
            
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
                                <?php if($result['public'] == '0'){?><div class="alert alert-danger"><i class="fa fa-danger"></i> Surat ini bersifat <strong>TERTUTUP</strong></div><?php } ?>
                                <?php if($result['public'] == '1'){?><div class="alert alert-success"><i class="fa fa-info"></i> Surat ini bersifat <strong>TERBUKA</strong></div><?php } ?>
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
        
        <div class="col-lg-12">      
             <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#detail" aria-expanded="true" aria-controls="collapseOne">
                     <i class="fa fa-user"></i> Informasi Lainnya
                    </a>
                  </h4>
                </div>
                
                <div id="detail" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">
                    <div class="col-sm-6">
                                
                                <div class="form-group">                    
                                    <div class="col-xs-8">
                                        <label>Keterangan Tambahan</label>
                                        <p class="form-control-static"><?php echo $result['catatan'] ?></p>
                                    </div>                        
                                </div>
                                
                                <div class="form-group">                    
                                    <div class="col-xs-8">
                                        <label>Asal Surat</label>
                                        <p class="form-control-static"><?php if($result['asal_surat']=='') {echo $result['asal_surat'];  }else{ echo 'Asal surat belum diatur';} ?></p>
                                    </div>                        
                                </div>
                                
                                <div class="form-group">                    
                                    <div class="col-xs-8">
                                        <label>Disposisi</label>
                                        <p class="form-control-static"><?php echo $result['disposisi'] ?></p>
                                    </div>                        
                                </div>
                                
                                <div class="form-group">                    
                                    <div class="col-xs-8">
                                        <label>Kata Kunci</label>
                                        <p class="form-control-static"><?php echo $result['kata_kunci'] ?></p>
                                    </div>                        
                                </div>
                                
                            </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    
	   </form>
    </div>
</div>
