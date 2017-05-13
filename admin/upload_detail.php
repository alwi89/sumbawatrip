
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 style="margin-top:30px;">
            Detail Hasil Penelitian
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
                <?php
                $a = mysql_query("select * from hasil_penelitian h join dosen d on h.nik=d.nik where id_hasil_penelitian='$_GET[id]'");
                $b = mysql_fetch_array($a);
                ?>
                <div id="isi" align="justify" style="margin-top: 10px;">
                
                  <b><?php echo $b['judul']; ?></b><br />
                  <span style="color:red;font-size: 9px;"><?php echo date('d/m/Y', strtotime($b['tanggal'])); ?></span><br />
                  <?php echo $b['isi_hasil_penelitian'].'<br />lokasi : '.$b['lokasi']; ?><br />
                  <?php echo isset($b)&&$b['file']!=''?"<a href=\"../hasil_penelitian/".$b['file']."\">download</a>":''; ?>
                  <div style="clear: both;">&nbsp;</div>
                  <span style="color: blue;font-size: 9px;">diposting oleh : <?php echo $b['nama'].' - '.$b['nik']; ?></span>
                <div style="clear: both;">&nbsp;</div>
                <?php
                $qkomentar = mysql_query("select * from komentar k join dosen d on k.nik=d.nik where id_hasil_penelitian='$b[id_hasil_penelitian]' order by id_komentar asc");
                $jmlkomentar = mysql_num_rows($qkomentar);
                ?>
                <div style="clear: both;">&nbsp;</div>
                <b><?php echo $jmlkomentar; ?> komentar</b>
                <?php while($hkomentar=mysql_fetch_array($qkomentar)) { ?>
                  <div style="border: 1px solid #cccccc;padding: 5px;margin-bottom: 10px;">
                    <u><?php echo $hkomentar['nama'].' - '.$hkomentar['nik']; ?></u><br />
                    <i><?php echo date('d/m/Y', strtotime($hkomentar['tanggal'])); ?></i><br />
                    <?php echo $hkomentar['komentar']; ?>
                  </div>
                <?php } ?>
                </div>
                <div style="clear: both;">&nbsp;</div>
        </section><!-- /.content -->