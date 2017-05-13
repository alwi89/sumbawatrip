<script>
$(function(){
    $("#tgl_agenda").datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy',
        todayHighlight: true
    });
	document.title = 'Agenda';
	$('#data').DataTable({
		"ordering": false
	});
	$('#fagenda').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			lokasi: {
                validators: {
                    notEmpty: {
                        message: 'Lokasi harus diisi'
                    },
                }
            },
            tgl_agenda: {
                validators: {
                    notEmpty: {
                        message: 'Tgl Agenda harus diisi'
                    },
                }
            },
            isi: {
                validators: {
                    notEmpty: {
                        message: 'Isi Kegiatan harus diisi'
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
            Agenda
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
                    $a = mysql_query("select * from agenda where id_agenda='$_GET[id]'");
                    $b = mysql_fetch_array($a);
                }
                ?>
				<form action="agenda_proses.php" method="post" id="fagenda" class="form-horizontal"> 
				<input type="hidden" name="aksi" value="<?php echo isset($b)?'edit':'tambah'; ?>" />
				<input type="hidden" name="kode_lama" value="<?php echo isset($b)?$b['id_agenda']:''; ?>" />
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Lokasi</label>
                                <div class="col-lg-5">
                                    <input type="text" name="lokasi" class="form-control" value="<?php echo isset($b)?$b['lokasi']:''; ?>" maxlength="50" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Tgl Agenda</label>
                                <div class="col-lg-5">
                                    <input type="text" name="tgl_agenda" id="tgl_agenda" class="form-control" value="<?php echo isset($b)?date('d/m/Y', strtotime($b['tanggal'])):''; ?>" maxlength="50" />
                                </div>
                            </div>                            
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Isi Kegiatan</label>
                                <div class="col-lg-5">
                                    <textarea name="isi" class="form-control"><?php echo isset($b)?$b['isi_kegiatan']:''; ?></textarea>
                                </div>
                            </div>

							<div class="form-group">
                                <div class="col-lg-9 col-lg-offset-3">
									<input type="submit" value="Simpan" class="btn btn-primary" />
									<a href="?h=agenda"><input type="button" value="Batal" class="btn btn-default" /></a>
                                </div>
                            </div>
				</form>
                
                <table id="data" class="table table-bordered table-hover" cellspacing="0" width="100%">
                	<thead>
                        <tr>
                            <th>Id Agenda</th>
                            <th>Lokasi</th>
                            <th>Tanggal</th>
                            <th>Isi Kegiatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php 
                        $x = mysql_query("select * from agenda order by id_agenda desc");
                        while($y = mysql_fetch_array($x)){
                        ?>
                        <tr>
                            <td><?php echo $y['id_agenda']; ?></td>
                            <td><?php echo $y['lokasi']; ?></td>
                            <td><?php echo date('d/m/Y', strtotime($y['tanggal'])); ?></td>
                            <td><?php echo $y['isi_kegiatan']; ?></td>
                            <td align="center">
                            	<a href="?h=agenda&id=<?php echo $y['id_agenda']; ?>" title="edit"><img src="../templates/images/edit.png" width="20" height="20" /></a>
                                <a href="agenda_proses.php?id=<?php echo $y['id_agenda']; ?>" title="hapus" onclick="return confirm('yakin menghapus?')"><img src="../templates/images/remove.png" width="20" height="20" /></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
              </div>          
        </section><!-- /.content -->