<div class="row clearfix">
	<div class="col-md-4">
        <div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading"><i class="fa fa-info"></i> Keterangan</div>
    
    			<div class="panel-body">
    				<p>Digunakan untuk mengatur bagian yang ada dalam instansi yang terdiri atas keterangan bagian dan id bagian</p>
    			</div>
    		</div>
    	</div>
        
        <div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading"><i class="fa fa-plus"></i> Tambah</div>
    
    			<div class="panel-body">
                
                <?php if(isset($success) && $success==1){?><div class="alert alert-success"><i class="fa fa-check"></i> Berhasil ditambahkan</div><?php } ?>
                <?php if(isset($failed) && $failed==1){?><div class="alert alert-danger"><i class="fa fa-times"></i> Data sudah ada</div><?php } ?>
    				
                    <form method="post">
                        <div class="form-group">
                            <input type="text" name="keterangan" required="" class="form-control" placeholder="Keterangan" />
                        </div>
                        
                        <button class="btn btn-primary" name="tambah_bagian"><i class="fa fa-check"></i> Submit</button>
                    </form>
    			</div>
    		</div>
    	</div>
    </div>

	<div class="col-md-8">
            <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-th"></i> Daftar Bagian</div>
                
                <div class="panel-body">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Bagian</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php $data=get_bagian();?>
                            <?php $i=1;while($result=mysql_fetch_array($data)){?>
                                <tr>
                                <td><?= $i ?></td>
                                <td><?= $result['keterangan'] ?></td>
                                <!--<td>Kepala Biro</td>-->
                                <td>
                                    <a id="" href="#" role="button" class="btn" data-toggle="modal"><i class="fa fa-eye"></i></a>
                                    <i class="fa fa-pencil"></i>
                                    <i class="fa fa-trash"></i>
                                </td>
                                </tr>
                            <?php $i++; } ?>
                        </tbody>
                    </table>
                </div>
            </div>
    	</div>
    </div>
    
</div>