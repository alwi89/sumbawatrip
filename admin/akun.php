<script>
$(function(){
	document.title = 'Akun';
	$('#data').DataTable({
		"ordering": false
	});
	$('#fadmin').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			id_admin: {
                validators: {
                    notEmpty: {
                        message: 'Id Admin harus diisi'
                    },
                }
            },                                                          
            username: {
                validators: {
                    notEmpty: {
                        message: 'Username harus diisi'
                    },
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Password harus diisi'
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
            Akun
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
                $a = query("select * from admin where id_admin='$_SESSION[adm]'");
                $b = mysqli_fetch_array($a);
                ?>
				<form action="akun_proses.php" method="post" id="fadmin" class="form-horizontal"> 
				<input type="hidden" name="kode_lama" value="<?php echo isset($b)?$b['id_admin']:''; ?>" />
							<div class="form-group">
                            	<label class="col-lg-3 control-label">Id Admin</label>
                                <div class="col-lg-5">
									<input type="text" name="id_admin" class="form-control" value="<?php echo isset($b)?$b['id_admin']:''; ?>" maxlength="50" readonly />
							  	</div>
							</div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Username</label>
                                <div class="col-lg-5">
                                    <input type="text" name="username" class="form-control" value="<?php echo isset($b)?$b['username']:''; ?>" maxlength="50" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Password</label>
                                <div class="col-lg-5">
                                    <input type="password" name="password" class="form-control" value="<?php echo isset($b)?$b['password']:''; ?>" maxlength="50" />
                                </div>
                            </div>                            

							<div class="form-group">
                                <div class="col-lg-9 col-lg-offset-3">
									<input type="submit" value="Simpan" class="btn btn-primary" />
									<a href="?h=akun"><input type="button" value="Batal" class="btn btn-default" /></a>
                                </div>
                            </div>
				</form>
              </div>          
        </section><!-- /.content -->