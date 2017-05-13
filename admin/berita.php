<script src="../templates/plugins/ckeditor/ckeditor.js"></script>
<script>
$(function(){
    CKEDITOR.replace('deskripsi');
	document.title = 'Berita Wisata';
	$('#data').DataTable({
		"ordering": false
	});
    $("#tanggal").datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy',
        todayHighlight: true
    });
	$('#fwisata').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			judul: {
                validators: {
                    notEmpty: {
                        message: 'Judul harus diisi'
                    },
                }
            },
            hari: {
                validators: {
                    notEmpty: {
                        message: 'Hari harus diisi'
                    },
                }
            },
            tanggal: {
                validators: {
                    notEmpty: {
                        message: 'Tanggal harus diisi'
                    },
                }
            },
            jam: {
                validators: {
                    notEmpty: {
                        message: 'Jam harus diisi'
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
            Wisata
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
                    $a = query("select * from kabar_wisata where id_kabarwisata='$_GET[id]'");
                    $b = mysqli_fetch_array($a);
                }
                ?>
				<form action="berita_proses.php" method="post" id="fwisata" class="form-horizontal" enctype="multipart/form-data"> 
				<input type="hidden" name="aksi" value="<?php echo isset($b)?'edit':'tambah'; ?>" />
				<input type="hidden" name="kode_lama" value="<?php echo isset($b)?$b['id_kabarwisata']:''; ?>" />
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Judul</label>
                                <div class="col-lg-5">
                                    <input type="text" name="judul" class="form-control" value="<?php echo isset($b)?$b['judul']:''; ?>" maxlength="50" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Hari</label>
                                <div class="col-lg-5">
                                    <input type="text" name="hari" class="form-control" value="<?php echo isset($b)?$b['hari']:''; ?>" maxlength="50" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Tanggal</label>
                                <div class="col-lg-5">
                                    <input type="text" name="tanggal" id="tanggal" class="form-control" value="<?php echo isset($b)?date('d/m/Y', strtotime($b['tanggal'])):''; ?>" maxlength="50" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Jam</label>
                                <div class="col-lg-5">
                                    <input type="text" name="jam" class="form-control" value="<?php echo isset($b)?$b['jam']:''; ?>" maxlength="5" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="box-body pad">
                                    <textarea name="deskripsi" id="deskripsi"><?php echo isset($b)?$b['isi_kabarwisata']:'isi berita....'; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Alamat</label>
                                <div class="col-lg-5">
                                    <input type="text" name="alamat" class="form-control" value="<?php echo isset($b)?$b['alamat']:''; ?>" maxlength="50" />
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
                                    <?php echo isset($b)&&$b['gambar']!=''?"<br /><img src=\"../berita/".$b['gambar']."\" width=\"50\" height=\"50\" /":''; ?>
                                </div>
                            </div>
							<div class="form-group">
                                <div class="col-lg-9 col-lg-offset-3">
									<input type="submit" value="Simpan" class="btn btn-primary" />
									<a href="?h=wisata"><input type="button" value="Batal" class="btn btn-default" /></a>
                                </div>
                            </div>
				</form>
                
                <table id="data" class="table table-bordered table-hover" cellspacing="0" width="100%">
                	<thead>
                        <tr>
                            <th>Id Berita</th>
                            <th>Judul</th>
                            <th>Hari</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Alamat</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php 
                        $x = query("select * from kabar_wisata order by id_kabarwisata desc");
                        while($y = mysqli_fetch_array($x)){
                        ?>
                        <tr>
                            <td><?php echo $y['id_kabarwisata']; ?></td>
                            <td><?php echo $y['judul']; ?></td>
                            <td><?php echo $y['hari']; ?></td>
                            <td><?php echo date("d/m/Y", strtotime($y['tanggal'])); ?></td>
                            <td><?php echo $y['jam']; ?></td>
                            <td><?php echo $y['alamat']; ?></td>
                            <td><?php echo $y['latitude']; ?></td>
                            <td><?php echo $y['longitude']; ?></td>
                            <td><img src="../berita/<?php echo $y['gambar']; ?>" width="50" height="50" /></td>
                            <td align="center">
                            	<a href="?h=berita&id=<?php echo $y['id_kabarwisata']; ?>" title="edit"><img src="../templates/images/edit.png" width="20" height="20" /></a>
                                <a href="berita_proses.php?id=<?php echo $y['id_kabarwisata']; ?>" title="hapus" onclick="return confirm('yakin menghapus?')"><img src="../templates/images/remove.png" width="20" height="20" /></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
              </div>          
        </section><!-- /.content -->