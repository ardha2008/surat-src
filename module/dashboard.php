<div class="row clearfix">
    
    <div class="col-lg-12">
        <div class="alert alert-info">
           <i class="glyphicon glyphicon-ok"></i> Selamat datang, <strong><?= get_login('nama') ?></strong>. Anda login sebagai <ins><?= get_login('keterangan') ?></ins>
        </div>
        <!--
        <div class="alert alert-warning">
           <i class="fa fa-info"></i> Perangkat <strong><ins>android-2bab7a15</ins></strong> mencoba melakukan singkronisasi, <a href="#">terima</a> atau abaikan
        </div>
        -->
    </div>
    
    
        <!--<div class="col-lg-12">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-info"></i> Info</div>
                    
                    <div class="panel-body">
                        Terakhir diakses pada <?php echo date('d M y') ?>
                    </div>
                </div>
            </div>
            
            <div class="col-md-8">
                <div class="col-sm-6">
                  <div class="thumbnail">
						<img alt="300x200" src="img/brush-pencil.png" />
						<div class="caption">
							<h3><strong>Manajemen surat</strong></h3>
							<p>Hak akses untuk mengatur menambah dan mengatur surat sesuai dengan akses masing-masing user.</p>
						</div>
					</div>  
                </div>
                
                <div class="col-sm-6">
                
                </div>
            </div>
            </div>-->
    
 
    <div class="col-lg-12">
        <div class="col-md-8">
            <div class="col-md-6">
            <div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-info"></i> Surat Masuk 
            </div>
            
            
                <ul class="list-group">
                <?php $data=get_surat_row('masuk','5');while($value=mysql_fetch_array($data)){?>
                    <li class="list-group-item"><i class="fa fa-envelope"></i> <a href="./?page=surat/detail&id=<?php echo $value['idsurat'] ?>"><?php echo $value['perihal'] ?></a> </li>
                <?php } ?>
                </ul>
                
            <div class="panel-footer">
                <a href="./?page=surat/index">Selengkapnya</a>
            </div>
            
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-info"></i> Surat Keluar 
            </div>
            
                <ul class="list-group">
                  
                    <?php $data=get_surat_row('keluar','5');while($value=mysql_fetch_array($data)){?>
                    <li class="list-group-item"><i class="fa fa-envelope"></i> <a href="./?page=surat/detail&id=<?php echo $value['idsurat'] ?>"><?php echo $value['perihal'] ?></a> </li>
                    <?php } ?>
               
                </ul>
                
            <div class="panel-footer">
                Selengkapnya ...
            </div>
            
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-info"></i> Jumlah
            </div>
            
                <ul class="list-group">
                  
                    <?php $data=get_surat_count();while($value=mysql_fetch_array($data)){?>
                    <li class="list-group-item"><i class="fa fa-envelope"></i> <?php echo $value['kategori'] ?> <span class="badge"><?php echo $value['jumlah'] ?></span></li>
                    <?php } ?>
               
                </ul>
                
            <div class="panel-footer">
                Selengkapnya ...
            </div>
            
        </div>
    </div>
    
        </div>
    
        <div class="col-md-4">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div class="panel-title"><i class="fa fa-th"></i> Login terakhir</div>
                </div>
                
                    <ul class="list-group">
                        <?php $data=get_last_login();while($logs=mysql_fetch_array($data)){?>
                        <li class="list-group-item"><i class="fa fa-users"></i> <?php echo $logs['nama'] ?> [ <?php echo $logs['time']?> ]</li>
                        <?php } ?>
                    </ul>
                
                <div class="panel-footer">
                    <button class="btn btn-default">More ...</button>
                </div>
            </div>
        </div>
    
    </div>

    


    
    <div class="clearfix"></div>
<!--    
    <fieldset>
        <legend>Pengumuman</legend>
        
        <div class="col-md-12">
        <p class="text-success"><i class="fa fa-info"></i> 14/20 Ponsel, 20/20 Email 24 September 2014 2:46 AM , pilih <a href="#">Detail</a> untuk info</p>
            <form class="form-horizontal" role="form">
              <div class="form-group">
                <div class="col-sm-6">
                  <textarea class="form-control" placeholder="Tulis pengumuman ...">Diberitahukan kepada seluruh staff pada tanggal 30 September 2014 diwajibkan mengikuti rapat</textarea>
                </div>
              </div>
              
              <div class="form-group">
                <div class="col-sm-2">
                  <input type="text" class="form-control" placeholder="8Bn9a"/>
                </div>
              </div>
              
              
              <div class="form-group">
                <div class="col-sm-4">
                  <button type="submit" class="btn btn-primary" disabled=""><i class="fa fa-send"></i> Kirim</button><p class="text-success"> Pesan terkirim</p>
                </div>
              </div>
            </form>
        </div>
    </fieldset>
</div>

-->