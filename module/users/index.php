<div class="row">
    <fieldset>
        <legend>Data Users</legend>
        
        <div class="col-lg-12">
            <table class="table table-striped">
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
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $result['nama'] ?></td>
                            <td>
                                <div class="col-xs-5">
                                    <select name="hak_akses" class="form-control">
                                    <?php $a=get_bagian();while($row=mysql_fetch_array($a)){?>
                                        <option value="<?php echo $row['idbagian'] ?>" <?php if($row['idbagian']==$result['idbagian']) echo 'selected' ?> ><?php echo $row['keterangan'] ?></option>        
                                    <?php } ?>
                                </select>
                                </div>
                            </td>
                            <td>Edit</td>
                        </tr>
                    <?php $i++; } ?>
                </tbody>
            </table>
        </div>
    </fieldset>
</div>