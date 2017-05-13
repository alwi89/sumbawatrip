<script>
$(function(){
    document.title = 'Dosen';
    $('#data').DataTable({
        "ordering": false
    });
    $('#fregistrasi').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nik: {
                validators: {
                    notEmpty: {
                        message: 'NIK harus diisi'
                    },
                }
            },
            nama: {
                validators: {
                    notEmpty: {
                        message: 'Nama harus diisi'
                    },
                }
            },
            jabatan: {
                validators: {
                    notEmpty: {
                        message: 'Jabatan harus diisi'
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
            no_hp: {
                validators: {
                    notEmpty: {
                        message: 'No HP harus diisi'
                    },
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Email harus diisi'
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
            Dosen
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
                    $a = mysql_query("select * from dosen where nik='$_GET[id]'");
                    $b = mysql_fetch_array($a);
                }
                ?>
                <form action="dosen_proses.php" method="post" id="fregistrasi" class="form-horizontal"> 
                        <input type="hidden" name="aksi" value="<?php echo isset($b)?'edit':'tambah'; ?>" />
                        <input type="hidden" name="kode_lama" value="<?php echo isset($b)?$b['nik']:''; ?>" />
                            <div class="form-group">
                                <label class="col-lg-3 control-label">NIK</label>
                                <div class="col-lg-5">
                                    <input type="text" name="nik" class="form-control" value="<?php echo isset($b)?$b['nik']:''; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Nama</label>
                                <div class="col-lg-5">
                                    <input type="text" name="nama" class="form-control" value="<?php echo isset($b)?$b['nama']:''; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Jabatan</label>
                                <div class="col-lg-5">
                                    <input type="text" name="jabatan" value="<?php echo isset($b)?$b['jabatan']:''; ?>" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Alamat</label>
                                <div class="col-lg-5">
                                    <input type="text" name="alamat" value="<?php echo isset($b)?$b['alamat']:''; ?>" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">No. Hp</label>
                                <div class="col-lg-5">
                                    <input type="text" name="no_hp" value="<?php echo isset($b)?$b['no_hp']:''; ?>" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Email</label>
                                <div class="col-lg-5">
                                    <input type="text" name="email" value="<?php echo isset($b)?$b['email']:''; ?>" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Username</label>
                                <div class="col-lg-5">
                                    <input type="text" name="username" value="<?php echo isset($b)?$b['username']:''; ?>" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Password</label>
                                <div class="col-lg-5">
                                    <input type="password" name="password" value="<?php echo isset($b)?$b['password']:''; ?>" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-9 col-lg-offset-3">
                                    <input type="submit" value="Simpan" class="btn btn-primary" />
                                    <a href="?h=dosen"><input type="button" value="Batal" class="btn btn-default" /></a>
                                </div>
                            </div>
                </form>
                <table id="data" class="table table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Alamat</th>
                            <th>No Hp</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $x = mysql_query("select * from dosen order by nama asc");
                        while($y = mysql_fetch_array($x)){
                        ?>
                        <tr>
                            <td><?php echo $y['nik']; ?></td>
                            <td><?php echo $y['nama']; ?></td>
                            <td><?php echo $y['jabatan']; ?></td>
                            <td><?php echo $y['alamat']; ?></td>
                            <td><?php echo $y['no_hp']; ?></td>
                            <td><?php echo $y['email']; ?></td>
                            <td><?php echo $y['username']; ?></td>
                            <td><?php echo $y['password']; ?></td>
                            <td align="center">
                                <a href="?h=dosen&id=<?php echo $y['nik']; ?>" title="edit"><img src="../templates/images/edit.png" width="20" height="20" /></a>
                                <a href="dosen_proses.php?id=<?php echo $y['nik']; ?>" title="hapus" onclick="return confirm('yakin menghapus?')"><img src="../templates/images/remove.png" width="20" height="20" /></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                
              </div>          
        </section><!-- /.content -->