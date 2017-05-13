<script>
$(function(){
    document.title = 'Hasil Penelitian';
    $('#data').DataTable({
        "ordering": false
    });
});
</script>
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 style="margin-top:30px;">
            Hasil Penelitian
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
                <table id="data" class="table table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Id Hasil</th>
                            <th>Judul</th>
                            <th>Lokasi</th>
                            <th>Dosen</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $x = mysql_query("select * from hasil_penelitian h join dosen d on h.nik=d.nik order by id_hasil_penelitian desc");
                        while($y = mysql_fetch_array($x)){
                        ?>
                        <tr>
                            <td><?php echo $y['id_hasil_penelitian']; ?></td>
                            <td><?php echo $y['judul']; ?></td>
                            <td><?php echo $y['lokasi']; ?></td>
                            <td><?php echo $y['nama'].' - '.$y['nik']; ?></td>
                            <td align="center">
                                <?php echo $y['file']!=''?"<a href=\"../hasil_penelitian/".$y['file']."\">download</a> | ":''; ?>
                                <a href="?h=upload_detail&id=<?php echo $y['id_hasil_penelitian']; ?>" title="lihat hasil penelitian">lihat</a> |
                                <a href="hasil_proses.php?id=<?php echo $y['id_hasil_penelitian']; ?>" title="hapus" onclick="return confirm('yakin menghapus?')"><img src="../templates/images/remove.png" width="20" height="20" /></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                    
              </div>
        </section><!-- /.content -->