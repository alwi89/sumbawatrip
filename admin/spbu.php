<script>
$(function(){
	document.title = 'Spbu';
	$('#data').DataTable({
		"ordering": false
	});
	$('#fspbu').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			nama: {
                validators: {
                    notEmpty: {
                        message: 'Nama Spbu harus diisi'
                    },
                }
            },
            wilayah: {
                validators: {
                    notEmpty: {
                        message: 'Wilayah harus dipilih'
                    },
                }
            },
            alamat: {
                validators: {
                    notEmpty: {
                        message: 'Alamat harus diisi'
                    },
                }
            },
            latitude: {
                validators: {
                    notEmpty: {
                        message: 'Latitude harus diisi'
                    },
                }
            },
            longitude: {
                validators: {
                    notEmpty: {
                        message: 'Longitude harus diisi'
                    },
                }
            }
        }
    });
});
</script>
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 style="margin-top:30px;">
            Spbu
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
             <?php if(isset($_COOKIE['berhasil'])){ ?>
             <div class="box box-solid box-success" id="berhasil">
                <div class="box-header">
                  <h3 class="box-title" id="judul_berhasil">sukses</h3>
                </div>
                <div class="box-body" id="pesan_berhasil"><?php echo $_COOKIE['berhasil']; ?></div>
              </div>
            <?php } ?>
            <?php if(isset($_COOKIE['gagal'])){ ?>
              <div class="box box-solid box-danger" id="gagal">
                <div class="box-header">
                  <h3 class="box-title" id="judul_gagal">gagal</h3>
                </div>
                <div class="box-body" id="pesan_gagal"><?php echo $_COOKIE['gagal']; ?></div>
              </div>
            <?php } ?>
              <div id="isi">
                <?php
                if(isset($_GET['id'])){
                    $a = query("select * from spbu where id_spbu='$_GET[id]'");
                    $b = mysqli_fetch_array($a);
                }
                ?>
				<form action="spbu_proses.php" method="post" id="fspbu" class="form-horizontal" enctype="multipart/form-data"> 
				<input type="hidden" name="aksi" value="<?php echo isset($b)?'edit':'tambah'; ?>" />
				<input type="hidden" name="kode_lama" value="<?php echo isset($b)?$b['id_spbu']:''; ?>" />
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Nama Spbu</label>
                                <div class="col-lg-5">
                                    <input type="text" name="nama" class="form-control" value="<?php echo isset($b)?$b['nama_spbu']:''; ?>" maxlength="50" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Wilayah</label>
                                <div class="col-lg-5">
                                    <select name="wilayah" class="form-control">
                                        <option value="">=pilh=</option>
                                        <?php
                                        $o = query("select * from wilayah order by nama_wilayah asc");
                                        while($p = mysqli_fetch_array($o)){
                                        ?>
                                            <option value="<?php echo $p['kode_wilayah']; ?>" <?php echo isset($b)&&$b['kode_wilayah']==$p['kode_wilayah']?'selected':''; ?>><?php echo $p['nama_wilayah']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Alamat</label>
                                <div class="col-lg-5">
                                    <input type="text" name="alamat" class="form-control" value="<?php echo isset($b)?$b['alamat']:''; ?>" maxlength="100" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Latitude</label>
                                <div class="col-lg-5">
                                    <input type="text" name="latitude" class="form-control" value="<?php echo isset($b)?$b['latitude']:''; ?>" maxlength="50" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Longitude</label>
                                <div class="col-lg-5">
                                    <input type="text" name="longitude" class="form-control" value="<?php echo isset($b)?$b['longitude']:''; ?>" maxlength="50" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Gambar</label>
                                <div class="col-lg-5">
                                    <input type="file" name="gambar" />
                                    <?php echo isset($b)&&$b['gambar']!=''?"<br /><img src=\"../spbu/".$b['gambar']."\" width=\"50\" height=\"50\" /":''; ?>
                                </div>
                            </div>
							<div class="form-group">
                                <div class="col-lg-9 col-lg-offset-3">
									<input type="submit" value="Simpan" class="btn btn-primary" />
									<a href="?h=spbu"><input type="button" value="Batal" class="btn btn-default" /></a>
                                </div>
                            </div>
				</form>
                
                <table id="data" class="table table-bordered table-hover" cellspacing="0" width="100%">
                	<thead>
                        <tr>
                            <th>Id Spbu</th>
                            <th>Nama Spbu</th>
                            <th>Wilayah</th>
                            <th>Alamat</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php 
                        $x = query("select * from spbu h join wilayah a on h.kode_wilayah=a.kode_wilayah order by id_spbu desc");
                        while($y = mysqli_fetch_array($x)){
                        ?>
                        <tr>
                            <td><?php echo $y['id_spbu']; ?></td>
                            <td><?php echo $y['nama_spbu']; ?></td>
                            <td><?php echo $y['nama_wilayah']; ?></td>
                            <td><?php echo $y['alamat']; ?></td>
                            <td><?php echo $y['latitude']; ?></td>
                            <td><?php echo $y['longitude']; ?></td>
                            <td><img src="../spbu/<?php echo $y['gambar']; ?>" width="50" height="50" /></td>
                            <td align="center">
                            	<a href="?h=spbu&id=<?php echo $y['id_spbu']; ?>" title="edit"><img src="../templates/images/edit.png" width="20" height="20" /></a>
                                <a href="spbu_proses.php?id=<?php echo $y['id_spbu']; ?>" title="hapus" onclick="return confirm('yakin menghapus?')"><img src="../templates/images/remove.png" width="20" height="20" /></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
              </div>          
        </section><!-- /.content -->