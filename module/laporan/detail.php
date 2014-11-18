<?php 

$bulan=array(1=>'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des') ;
$tanggal=date('j');
$bulan_x=date('m');
$tahun=date('Y');
?>

<div class="row">
    <div class="well">
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
              
              <div class="form-group">
                <div class="input-group">
                  <label>SAMPAI DENGAN</label>
                </div>
              </div>
              
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
              
              <div class="radio">
                  <label>
                    <input type="radio" name="berdasar" value="tanggal_surat" checked="" />
                    Berdasarkan tanggal surat
                  </label>
                </div>
              
              <div class="clearfix"></div>
              
              <div class="radio">
                  <label>
                    <input type="radio" name="berdasar" value="created_at" />
                    Berdasarkan tanggal posting
                  </label>
                </div>
              
              <div class="clearfix"></div><br />
              <button class="btn btn-primary" name="cari_laporan"><i class="fa fa-search"></i> Cari</button>
            </form>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel"></div>
    </div>
</div>
