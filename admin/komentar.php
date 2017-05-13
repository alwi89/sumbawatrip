<script>
$(function(){
    document.title = 'Komentar';
    $('#data').DataTable({
        "ordering": false
    });
});
</script>
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 style="margin-top:30px;">
            Komentar
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
                            <th>Id Komentar</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Isi Komentar</th>
                            <th>Judul Penelitian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $x = mysql_query("select nama, d.nik, judul, k.* from komentar k join dosen d on k.nik=d.nik join hasil_penelitian h on k.id_hasil_penelitian=h.id_hasil_penelitian order by id_komentar desc");
                        while($y = mysql_fetch_array($x)){
                        ?>
                        <tr>
                            <td><?php echo $y['id_komentar']; ?></td>
                            <td><?php echo $y['nik']; ?></td>
                            <td><?php echo $y['nama']; ?></td>
                            <td><?php echo $y['komentar']; ?></td>
                            <td><?php echo $y['judul']; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                    
              </div>
        </section><!-- /.content -->