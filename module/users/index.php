<div class="row">
    <!--<form method="post">-->
        <fieldset>
        <legend>Data Users</legend>
        
        <div class="col-lg-12">
        
        <?php if(isset($success)){?><div class="alert alert-success"><strong>Hak akses telah diperbarui</strong></div><?php } ?>
            <table class="table table-bordered">
                <thead>
                    <th class="success">No</th>
                    <th class="success">NIP</th>
                    <th class="success">Hak Akses</th>
                    <th class="success"></th>
                </thead>
                
                <tbody>
                    <?php $i=1;
                    $data=get_pegawai('b.idbagian');
                    while($result=mysql_fetch_array($data)){?>
                    <input type="hidden" name="id[]" value="<?php echo $result['idusers'] ?>" />
                        <tr>
                            <td><?php echo $result['idpegawai'] ?></td>
                            <td><?php echo $result['nama'] ?></td>
                            <td>
                                <div class="col-xs-5">
                                    <select disabled="" id="pilih" name="hak_akses[]" class="form-control">
                                    <?php $a=get_bagian();while($row=mysql_fetch_array($a)){?>
                                        <option value="<?php echo $row['idbagian'] ?>" <?php if($row['idbagian']==$result['idbagian']) echo 'selected' ?> ><?php echo $row['keterangan'] ?></option>        
                                    <?php } ?>
                                </select>
                                </div>
                            </td>
                            <form method="post" action="./?page=users/reset-password">
                                <input type="hidden" name="id-reset" value="<?php echo $result['idpegawai'] ?>" />
                                <td><button class="btn btn-primary"><i class="fa fa-gear"></i> Reset Password</button></td>
                            </form>
                        </tr>
                    <?php $i++; } ?>
                </tbody>
            </table>
        
        </div>
    </fieldset>
    <!--</form>-->
</div>
