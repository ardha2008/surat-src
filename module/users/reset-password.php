<?php if(!isset($_POST['id-reset'])) header('Location:./?page=users/index'); ?>

<?php $id=$_POST['id-reset']; ?>
<div class="row">
    <div class="col-md-12">
        <fieldset>
            <legend>Change Password - IDNYA</legend>
            
            
            <div class="col-md-8">
            
            <?php if(isset($success)){?><div class="alert alert-success"><i class="fa fa-info"></i> <strong>Berhasil memperbarui password</strong></div><?php } ?>
            <a href="./?page=users/index"><button class="btn btn-primary"><i class="fa fa-backward"></i> Kembali </button></a><div class="clearfix"></div><br />
            
                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fa fa-users"></i> Reset Password</div>
                
                    <div class="panel-body">
                        <form class="form-horizontal" method="post" role="form">
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">ID</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="id" value="<?php echo $id ?>" readonly="" />
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Password Baru</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" name="password" placeholder="Password"/>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" name="reset-password" class="btn btn-success">Perbarui</button>
                            </div>
                          </div>
                        
                        </form>
                    </div>
                </div>
            
            </div>
        </fieldset>
    </div>
</div>