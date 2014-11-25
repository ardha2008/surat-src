<div class="row clearfix">
    <div class="col-lg-12">
        <?php if(!$diakses->isMobile()){?>
        
        <div class="carousel slide" id="carousel-351745">
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
			</div>
        <?php } ?>
            <hr />
    </div>
    
    
 <!--===================================================================================================-->   
    
    <div class="clearfix"></div>
		<?php if(!$diakses->isMobile()){?>
		  <div class="col-md-9 column">        
            <div class="alert alert-info">
            <p>
				Aplikasi ini masih dalam tahap pengembangan, Binary  : <strong><?php echo sha1('v.2.1') ?></strong>.
			</p>
            </div>
 
            
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
            					 <input type="text" name="id" value="1134010049" class="form-control"  placeholder="ID" />
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
                        
                        <li><strong>Superadmin</strong><br />ID:1134010049<br />password: ardha</li>
                        <hr />
                        <li><strong>Kepala Staff</strong><br />ID:1134010050<br />password: ardha</li>
                        <hr />
                        <li><strong>Staff</strong><br />ID:1134010051<br />password: ardha</li>
    				</div>
    			</div>	
		</div>
	</div>
