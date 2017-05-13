<script>
$(function(){
	document.title = 'Wilayah';
	$('#data').DataTable({
		"ordering": false
	});
	$('#fwilayah').bootstrapValidator({
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
                        message: 'Nama Wilayah harus diisi'
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
            Wilayah
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
                    $a = query("select * from wilayah where kode_wilayah='$_GET[id]'");
                    $b = mysqli_fetch_array($a);
                }
                ?>
				<form action="wilayah_proses.php" method="post" id="fwilayah" class="form-horizontal"> 
				<input type="hidden" name="aksi" value="<?php echo isset($b)?'edit':'tambah'; ?>" />
				<input type="hidden" name="kode_lama" value="<?php echo isset($b)?$b['kode_wilayah']:''; ?>" />
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Nama Wilayah</label>
                                <div class="col-lg-5">
                                    <input type="text" name="nama" class="form-control" value="<?php echo isset($b)?$b['nama_wilayah']:''; ?>" maxlength="50" />
                                </div>
                            </div>
							<div class="form-group">
                                <div class="col-lg-9 col-lg-offset-3">
									<input type="submit" value="Simpan" class="btn btn-primary" />
									<a href="?h=wilayah"><input type="button" value="Batal" class="btn btn-default" /></a>
                                </div>
                            </div>
				</form>
                
                <table id="data" class="table table-bordered table-hover" cellspacing="0" width="100%">
                	<thead>
                        <tr>
                            <th>Kode Wilayah</th>
                            <th>Nama Wilayah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php 
                        $x = query("select * from wilayah order by kode_wilayah desc");
                        while($y = mysqli_fetch_array($x)){
                        ?>
                        <tr>
                            <td><?php echo $y['kode_wilayah']; ?></td>
                            <td><?php echo $y['nama_wilayah']; ?></td>
                            <td align="center">
                            	<a href="?h=wilayah&id=<?php echo $y['kode_wilayah']; ?>" title="edit"><img src="../templates/images/edit.png" width="20" height="20" /></a>
                                <a href="wilayah_proses.php?id=<?php echo $y['kode_wilayah']; ?>" title="hapus" onclick="return confirm('yakin menghapus?')"><img src="../templates/images/remove.png" width="20" height="20" /></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
              </div>          
        </section><!-- /.content -->