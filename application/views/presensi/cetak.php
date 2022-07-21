<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
              <form action="<?=base_url('Presensi/cetakpdf')?>" method="post">
                <div class="row">
                  <div class="col-6">
                    <label for="tgl_masuk">Tanggal Awal</label>
                      <input type="date" class="form-control" name="tgl_awal" id="tgl_awal" value="<?= set_value('tgl_awal') ?>">
                  </div>
                  <div class="col-6">
                    <label for="tgl_masuk">Tanggal Akhir</label>
                      <input type="date" class="form-control" name="tgl_akhir" id="tgl_akhir" value="<?= set_value('tgl_akhir') ?>">
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-2">
                    <button type="submit" class="btn btn-primary form-control">Cetak</button>
                  </div>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Modal title</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
          <form id="myForm" action="" method="post" class="form-horizontal">
          <div class="row">
            <div class="col-5">
              <input type="hidden" name="id_absen" id="id_absen" class="form-control">
              <label for="nip">NIP</label>
              <input type="text" name="nip" id="nip" class="form-control" disabled>
            </div>
            <div class="col-7">
              <label for="nama">Nama Pegawai</label>
              <input type="text" name="nama_pegawai" id="nama_pegawai" class="form-control" disabled>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <label for="tgl_masuk">Tanggal</label>
                <input type="date" class="form-control" name="tgl_masuk" id="tgl_masuk" disabled>
            </div>
            <div class="col-6">
              <label for="ket">ket</label>
              <select name="ket" id="ket" class="form-control">
                <option value="H">Hadir</option>
                <option value="A">Absen</option>
                <option value="I">Ijin</option>
                <option value="C">Cuti</option>
              </select>
            </div>            
          </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="button" id="btnSave" class="btn btn-primary"></button>
      </div>
    </div>
  </div>
</div>
