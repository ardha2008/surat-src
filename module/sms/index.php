<div class="row">

     <div class="col-md-6">
        <div class="panel panel-default">
        <div class="panel-heading"><i class="fa fa-list"></i> Penerima SMS</div>
        
        <div class="panel-body">
            <form class="form-inline">
                <div class="form-group">
                    <?php $data=get_bagian();while($result=mysql_fetch_array($data)){?>
                      <input type="checkbox" value="<?php echo $result['idbagian'] ?>" /> <?php echo $result['keterangan'] ?><br /> 
                    <?php } ?>
                </div>                    
            </form>
        
        </div>
     </div>
     
     </div>
</div>