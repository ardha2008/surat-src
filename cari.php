<?php require_once 'header.php';?>

<div class="row">
    <div class="well">
        <form class="form-inline" role="form">
          <div class="form-group">
            <div class="input-group">
              <label class="sr-only"></label>
                <select class="form-control" name="tanggal_awal">
                    <?php for($i=1;$i<32;$i++){?>
                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                    <?php } ?>
                </select>
            </div>
          </div>
          <div class="form-group">
            <label class="sr-only" for="exampleInputPassword2">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox"> Remember me
            </label>
          </div>
          <button type="submit" class="btn btn-default">Sign in</button>
        </form>
    </div>
</div>