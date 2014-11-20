<?php require_once 'header.php';?>

<?php $bulan=array(1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'); ?>
<div class="row">

    <div class="alert alert-info"><i class="fa fa-info"> </i> Fitur pencarian berguna untuk mencari data surat </div>
    
    <div class="col-md-12">
        <div class="well">
        <label>Berdasarkan tanggal</label>
        <form class="form-inline" method="post" role="form">
          <div class="form-group">
            <div class="input-group">
              <label class="sr-only"></label>
                <select class="form-control" name="tanggal">
                    <?php for($i=1;$i<=31;$i++){?>
                        <option value="<?php if($i<10){echo '0'.$i ;}else{ echo $i;}?>"><?php if($i<10){echo '0'.$i ;}else{ echo $i;}?></option>
                    <?php } ?>
                </select>
            </div>
          </div>
          
          <div class="form-group">
            <div class="input-group">
              <label class="sr-only"></label>
                <select class="form-control" name="bulan">
                    <?php for($i=1;$i<=12;$i++){?>
                        <option value="<?php if($i<10){echo '0'.$i ;}else{ echo $i;}?>"><?php echo $bulan[$i] ?></option>
                    <?php } ?>
                </select>
            </div>
          </div>
          
          <div class="form-group">
            <div class="input-group">
              <label class="sr-only"></label>
                <select class="form-control" name="tahun">
                    <?php for($i=2014;$i<=2014;$i++){?>
                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                    <?php } ?>
                </select>
            </div>
          </div>
          <div class="clearfix"></div><br />
          <button type="submit" name="cari" value="tanggal" class="btn btn-primary"><i class="fa fa-search"></i> Cari</button>
        </form>
    </div>
    </div>
    
        <?php if(isset($query)){
            while($result=mysql_fetch_array($query)){?>
            <div class="col-md-4 column">
			 <div class="panel panel-default">
                <div class="panel-heading"><strong><?php echo $result['perihal']?></strong>  <?php echo $result['tanggal_surat'] ?></div>
                
                <div class="panel-body">
                
                    <div class="thumbnail">
                        <img src="./img/surat/<?php echo $result['lampiran'] ?>" />
                    </div>
                    
                    <?php echo $result['catatan'] ?>
                </div>
                
                
             </div>     
            </div>
            <?php }
        } ?>
</div>