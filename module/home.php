<div class="row clearfix">
    <div class="col-lg-12">
        <?php if(!$diakses->isMobile()){?>
        
        <!--<div class="carousel slide" id="carousel-351745">
				<ol class="carousel-indicators">
					<li data-slide-to="0" data-target="#carousel-351745">
					</li>
					<li data-slide-to="1" data-target="#carousel-351745">
					</li>
					<li data-slide-to="2" data-target="#carousel-351745" class="active">
					</li>
				</ol>
				<div class="carousel-inner">
					<div class="item">
						<img alt="" src="./img/download.jpg" />
						<div class="carousel-caption">
							<h4>
								First Thumbnail label
							</h4>
							<p>
								Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
							</p>
						</div>
					</div>
					<div class="item">
						<img alt="" src="./img/download1.jpg" />
						<div class="carousel-caption">
							<h4>
								Second Thumbnail label
							</h4>
							<p>
								Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
							</p>
						</div>
					</div>
					<div class="item active">
						<img alt="" src="./img/download2.jpg" />
						<div class="carousel-caption">
							<h4>
								Third Thumbnail label
							</h4>
							<p>
								Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
							</p>
						</div>
					</div>
				</div> <a class="left carousel-control" href="#carousel-351745" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-351745" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
			</div>-->
        <?php } ?>
            <hr />
    </div>
    
    
 <!--===================================================================================================-->   
    
    <div class="clearfix"></div>
		<?php if(!$diakses->isMobile()){?>
		  <div class="col-md-9 column">        
            <div class="alert alert-info">
            <p>
				Aplikasi ini masih dalam tahap pengembangan, Binary  : <strong><?php echo sha1('skripsi') ?></strong>.
			</p>
            </div>
            <?php $ya='<i class="glyphicon glyphicon-ok"></i>';$tidak='<i class="glyphicon glyphicon-minus"></i>' ?>
            <!--
            <table class="table table-striped">
                <thead>
                    <th class="danger">Bagian <br />/ Hak Akses</th>
                    <th class="danger">Staf <br />Surat Keluar</th>
                    <th class="danger">Staf <br />Surat Masuk</th>
                    <th class="danger">Kepala<br />Staff</th>
                    <th class="danger">Admin</th>
                </thead>
                
                <tbody>
                    <tr>
                        <td class="success"><strong>Membuat Surat Keluar</strong></td>
                        <td><?php echo $ya ?></td>
                        <td><?php echo $tidak ?></td>
                        <td><?php echo $tidak ?></td>
                        <td><?php echo $tidak ?></td>
                    </tr>
                    
                    <tr>
                        <td class="success"><strong>Melihat Surat Keluar</strong></td>
                        <td><?php echo $ya ?></td>
                        <td><?php echo $tidak ?></td>
                        <td><?php echo $ya ?></td>
                        <td><?php echo $tidak ?></td>
                    </tr>
                    
                    <tr>
                        <td class="success"><strong>Mengubah Surat Keluar</strong></td>
                        <td><?php echo $ya ?></td>
                        <td><?php echo $tidak ?></td>
                        <td><?php echo $tidak ?></td>
                        <td><?php echo $tidak ?></td>
                    </tr>
                    
                    <tr>
                        <td class="success"><strong>Menghapus Surat Keluar</strong></td>
                        <td><?php echo $ya ?></td>
                        <td><?php echo $tidak ?></td>
                        <td><?php echo $tidak ?></td>
                        <td><?php echo $tidak ?></td>
                    </tr>
                    
                    <tr>
                        <td class="success"><strong>Mencari Surat Keluar</strong></td>
                        <td><?php echo $ya ?></td>
                        <td><?php echo $ya ?></td>
                        <td><?php echo $ya ?></td>
                        <td><?php echo $ya ?></td>
                    </tr>
                    
                    <tr>
                        <td class="info"><strong>Membuat Surat Masuk</strong></td>
                        <td><?php echo $tidak ?></td>
                        <td><?php echo $ya ?></td>
                        <td><?php echo $tidak ?></td>
                        <td><?php echo $tidak ?></td>
                    </tr>
                    
                    <tr>
                        <td class="info"><strong>Melihat Surat Masuk</strong></td>
                        <td><?php echo $tidak ?></td>
                        <td><?php echo $ya ?></td>
                        <td><?php echo $ya ?></td>
                        <td><?php echo $tidak ?></td>
                    </tr>
                    
                    <tr>
                        <td class="info"><strong>Mengubah Surat Masuk</strong></td>
                        <td><?php echo $tidak ?></td>
                        <td><?php echo $ya ?></td>
                        <td><?php echo $tidak ?></td>
                        <td><?php echo $tidak ?></td>
                    </tr>
                    
                    <tr>
                        <td class="info"><strong>Menghapus Surat Masuk</strong></td>
                        <td><?php echo $tidak ?></td>
                        <td><?php echo $ya ?></td>
                        <td><?php echo $tidak ?></td>
                        <td><?php echo $tidak ?></td>
                    </tr>
                    
                    <tr>
                        <td class="info"><strong>Mencari Surat Masuk</strong></td>
                        <td><?php echo $ya ?></td>
                        <td><?php echo $ya ?></td>
                        <td><?php echo $ya ?></td>
                        <td><?php echo $ya ?></td>
                    </tr>
                    
                    <tr>
                        <td class="active"><strong>Membuat Data Pegawai</strong></td>
                        <td><?php echo $tidak ?></td>
                        <td><?php echo $tidak ?></td>
                        <td><?php echo $ya ?></td>
                        <td><?php echo $ya ?></td>
                    </tr>
                    
                    <tr>
                        <td class="active"><strong>Melihat Data Pegawai</strong></td>
                        <td><?php echo $tidak ?></td>
                        <td><?php echo $tidak ?></td>
                        <td><?php echo $ya ?></td>
                        <td><?php echo $ya ?></td>
                    </tr>
                    
                    <tr>
                        <td class="active"><strong>Mengubah Data Pegawai</strong></td>
                        <td><?php echo $tidak ?></td>
                        <td><?php echo $tidak ?></td>
                        <td><?php echo $ya ?></td>
                        <td><?php echo $ya ?></td>
                    </tr>
                    
                    <tr>
                        <td class="active"><strong>Menghapus Data Pegawai</strong></td>
                        <td><?php echo $tidak ?></td>
                        <td><?php echo $tidak ?></td>
                        <td><?php echo $ya ?></td>
                        <td><?php echo $ya ?></td>
                    </tr>
                    
                    <tr>
                        <td class="success"><strong>Melihat Laporan <br /><small>(harian, bulanan, per tanggal)</small> </strong></td>
                        <td><?php echo $tidak ?></td>
                        <td><?php echo $tidak ?></td>
                        <td><?php echo $ya ?></td>
                        <td><?php echo $tidak ?></td>
                    </tr>
                    
                    <tr>
                        <td class="success"><strong>Mencetak / mengunduh Laporan</strong></td>
                        <td><?php echo $tidak ?></td>
                        <td><?php echo $tidak ?></td>
                        <td><?php echo $ya ?></td>
                        <td><?php echo $tidak ?></td>
                    </tr>
                    
                    <tr>
                        <td class="warning"><strong>Backup Database</strong></td>
                        <td><?php echo $tidak ?></td>
                        <td><?php echo $tidak ?></td>
                        <td><?php echo $tidak ?></td>
                        <td><?php echo $ya ?></td>
                    </tr>
                    
                    <tr>
                        <td class="warning"><strong>Reset Users</strong></td>
                        <td><?php echo $tidak ?></td>
                        <td><?php echo $tidak ?></td>
                        <td><?php echo $tidak ?></td>
                        <td><?php echo $ya ?></td>
                    </tr>
                    
                    <tr>
                        <td class="warning"><strong>Mengubah Hak Akses</strong></td>
                        <td><?php echo $tidak ?></td>
                        <td><?php echo $tidak ?></td>
                        <td><?php echo $tidak ?></td>
                        <td><?php echo $ya ?></td>
                    </tr>
                
                </tbody>
            </table>
 -->
            
			<div class="row clearfix">
            
				<div class="col-md-4 column">
					<div class="thumbnail">
						<img alt="300x200" src="img/frames.png" />
						<div class="caption">
							<h3><strong>Kustomasi Fitur</strong></h3>
                            <hr />
							<p>Memiliki fitur kustomasi fitur baru dengan mudah karena dibangun dengan manajemen file yang baik.</p>
						</div>
					</div>
				</div>
                
                <div class="col-md-4 column">
					<div class="thumbnail">
						<img alt="300x200" src="img/profle.png" />
						<div class="caption">
							<h3><strong>User Management</strong></h3>
                            <hr />
							<p>Fitur manajemen user dan profil pengguna nya sehingga tiap user memiliki tugas masing-masing.</p>
						</div>
					</div>
				</div>
                
                <div class="col-md-4 column">
					<div class="thumbnail">
						<img alt="300x200" src="img/rocket.png" />
						<div class="caption">
							<h3><strong>Efisiensi Data</strong></h3>
                            <hr />
							<p>Proses dan manajemen data lebih teratur sehingga memaksimalkan kinerja.</p>
						</div>
					</div>
				</div>
                
                <div class="clearfix"></div>
                
                <div class="col-md-4 column">
					<div class="thumbnail">
						<img alt="300x200" src="img/cloud-icon.png" />
						<div class="caption">
							<h3><strong>Penyimpanan Cloud</strong></h3>
                            <hr />
							<p>Model penyimpanan menggunakan cloud sehingga tidak menghabiskan space memori yang besar karena tersimpan di server cloud.</p>
						</div>
					</div>
				</div>
                
				<div class="col-md-4 column">
					<div class="thumbnail">
						<img alt="300x200" src="img/smartphone-message-icon.png" />
						<div class="caption">
							<h3><strong>Cross Platform</strong></h3>
                            <hr />
							<p>Memiliki fitur membuat, mengirim, dan menerima surat antar departemen secara langsung melalui gadget anda.</p>
						</div>
					</div>
				</div>
                
                <div class="col-md-4 column">
					<div class="thumbnail">
						<img alt="300x200" src="img/smartphone-SMS-icon.png" />
						<div class="caption">
							<h3><strong>SMS Gateway</strong></h3>
                            <hr />
							<p>SMS Gateway membuat anda tidak perlu khawatir karena laporan pengiriman maupun menerima surat akan disampaikan melalui pesan singkat atau SMS </p>		
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
		<div class="col-md-3 column">
			<form role="form" method="post">
                <div class="panel panel-default">
    				<div class="panel-heading">
    					<h3 class="panel-title">
    						<span class="glyphicon glyphicon-log-in"></span> LOGIN
    					</h3>
    				</div>
                    
    				<div class="panel-body">
    				        <?php if(isset($message)){?>
    				            <div class="alert alert-danger"><i class="fa fa-warning"></i> Gagal login</div>
    				        <?php } ?>
            				<div class="form-group">
            					 <input type="text" name="id" class="form-control"  placeholder="ID" />
            				</div>
            				<div class="form-group">
            					 <input type="password" name="password" class="form-control" placeholder="Password, ex: ardha" />
            				</div>			
    				</div>
    				<div class="panel-footer">
    					<button type="submit" name="login" class="btn btn-default btn-block"><i class="fa fa-sign-in"></i> Login</button>
    				</div>
    			</div>
            </form>
			
		</div>
        
        <div class="col-md-3 column">
                <div class="panel panel-primary">
    				<div class="panel-heading">
    					<h3 class="panel-title">
    						<i class="fa fa-warning"></i> <strong>INFO</strong>
    					</h3>
    				</div>
                    
    				<div class="panel-body">
                        
                        <strong>Superadmin</strong><br />ID:1134010049<br />password: ardha
                        <hr />
                        <strong>Kepala Staff</strong><br />ID:1134010050<br />password: ardha
                        <hr />
                        <strong>Surat Keluar</strong><br />ID:1134010051<br />password: ardha
                        <hr />
                        <strong>Surat Masuk</strong><br />ID:1134010052<br />password: ardha
    				</div>
    			</div>	
		</div>
	</div>
