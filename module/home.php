<div class="row clearfix">
		<div class="col-md-9 column">
           
            
            <div class="alert alert-info">
            <p>
				Aplikasi ini masih dalam tahap pengembangan, Binary  : <strong><?php echo sha1('v.2') ?></strong>.
			</p>
            </div>
            
			<div class="row clearfix">
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
		<div class="col-md-3 column">
			<form role="form" method="post">
                <div class="panel panel-default">
    				<div class="panel-heading">
    					<h3 class="panel-title">
    						<i class="fa fa-th-large"></i> LOGIN
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
	</div>
