<?php 

$bulan=array(1=>'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des') ;
$tanggal=date('j');
$bulan_x=date('m');
$tahun=date('Y');
?>

<div class="col-md-4">
        <div class="panel panel-primary">
        
        <div class="panel-heading"><i class="fa fa-book"></i> CETAK LAPORAN</div>
        
        <div class="panel-body">
            <label>Dari</label>
            <form class="form-inline" method="post" role="form">
                  <div class="form-group">
                    <div class="input-group">
                      <label class="sr-only"></label>
                        <select class="form-control" name="tanggal_awal">
                            <?php for($i=1;$i<=31;$i++){?>
                                <option value="<?php echo $i ?>" <?php if($i==$tanggal) echo 'selected' ?>><?php echo $i ?></option>
                            <?php } ?>
                        </select>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="input-group">
                      <label class="sr-only"></label>
                        <select class="form-control" name="bulan_awal">
                            <?php for($i=1;$i<=12;$i++){?>
                                <option value="<?php echo $i ?>" <?php if($i==$bulan_x) echo 'selected' ?>><?php echo $bulan[$i] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="input-group">
                      <label class="sr-only"></label>
                        <select class="form-control" name="tahun_awal">
                            <?php for($i=2013;$i<=2014;$i++){?>
                                <option value="<?php echo $i ?>" <?php if($i==$tahun) echo 'selected' ?>><?php echo $i ?></option>
                            <?php } ?>
                        </select>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="form-group">
                    <div class="input-group">
                      <label>Hingga</label>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="form-group">
                    <div class="input-group">
                      <label class="sr-only"></label>
                        <select class="form-control" name="tanggal_akhir">
                            <?php for($i=1;$i<=31;$i++){?>
                                <option value="<?php echo $i ?>" <?php if($i==$tanggal) echo 'selected' ?>><?php echo $i ?></option>
                            <?php } ?>
                        </select>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="input-group">
                      <label class="sr-only"></label>
                        <select class="form-control" name="bulan_akhir">
                            <?php for($i=1;$i<=12;$i++){?>
                                <option value="<?php echo $i ?>" <?php if($i==$bulan_x) echo 'selected' ?>><?php echo $bulan[$i] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="input-group">
                      <label class="sr-only"></label>
                        <select class="form-control" name="tahun_akhir">
                            <?php for($i=2013;$i<=2014;$i++){?>
                                <option value="<?php echo $i ?>" <?php if($i==$tahun) echo 'selected' ?>><?php echo $i ?></option>
                            <?php } ?>
                        </select>
                    </div>
                  </div>
                  
                  <div class="clearfix"></div><br />
                  <button class="btn btn-primary" name="cetak_laporan"><i class="fa fa-search"></i> Cari</button>
                    
                </form>
        </div>
        
        <?php if(isset($dari) && isset($sampai)){?>
            <div class="panel-footer">
                <a href="./export.php?as=pdf&dari=<?php echo $dari ?>&sampai=<?php echo $sampai?>" target="_blank"><button class="btn btn-danger btn-block"><i class="fa fa-book"></i> Klik disini untuk versi cetak</button></a>
            </div>
        <?php } ?>
        
        </div>
    </div>