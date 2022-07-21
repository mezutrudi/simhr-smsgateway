<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
              <div class="float-right">
                <a href="<?=base_url('presensi')?>" class="btn btn-success right"><i class="icon-action-undo"></i> Kembali</a>
              </div><br><br>
              
          <form action="<?=base_url('presensi/add')?>" method="post">
          <div class="row">
            <div class="col-6"><input type="date" class="form-control" name="tgl_masuk" id="tgl_masuk" value=""></div>
            <br><br>
            <table class="table table-bordered table-striped display nowrap">
                <thead>
                    <tr>
                        <th width="10%">No.</th>
                        <th width="15%">NIP</th>
                        <th width="40%">NAMA</th>
                        <th width="35%">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                <?php if ($pegawai->num_rows() > 0) {
                $no=1;
                foreach ($pegawai->result_object() as $key) {
                ?>
                    <tr>
                        <td><?=$no?></td>
                        <td><?=$key->nip?></td><input type="hidden" name="nip[]" id="nip" value="<?=$key->nip?>">
                        <td><?=$key->nama_pegawai?></td>
                        <td><select name="ket[]" id="ket" class="form-control">
                          <option value="H">Hadir</option>
                          <option value="I">Ijin</option>
                          <option value="A">Absen</option>
                          <option value="C">Cuti</option>
                        </select></td>
                    </tr>
                <?php
                $no++; 
                }
                } else {
                ?>
                    <tr>
                        <td colspan="7"><center>Data Kosong</center></td>
                    </tr>
                <?php 
                }
                 ?>
                </tbody>
                <tfoot>
                    <tr>
                      <th width="10%">No.</th>
                      <th width="15%">NIP</th>
                      <th width="40%">NAMA</th>
                      <th width="35%">Keterangan</th>
                    </tr>
                </tfoot>
                </table>
          </div>
          <div class="float-right">
          <button type="submit" class="btn btn-info right">Simpan</button>
          </div>
          </form>


      
            </div>
        </div>
    </div>
</div>
<script>
  $(function(){
    $('#datemask').inputmask('yyyy-mm-dd', { 'placeholder': 'yyyy-mm-dd' })
    //Money Euro
    $('[data-mask]').inputmask();


  });
</script>