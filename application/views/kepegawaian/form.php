<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
              <div class="float-right">
                <a href="<?=base_url('Pegawai')?>" class="btn btn-success right"><i class="icon-action-undo"></i> Kembali</a>
              </div><br><br>
              
          <?php form_open_multipart()?>
          <form id="myForm" action="<?=base_url('Pegawai/proses')?>" method="post" class="form-horizontal">
          <div class="row">
            <div class="col-4">
              <label for="nip">NIP</label>
                <input type="number" name="nip" id="nip" class="form-control" placeholder="NIP" value="<?=$row->nip?>">
            </div>
            <div class="col-8">
              <label for="nama_pegawai">Nama</label>
                <input type="text" name="nama_pegawai" id="nama_pegawai" class="form-control" placeholder="Nama Pegawai" value="<?=$row->nama_pegawai?>">
            </div>            
          </div>
          <div class="row">
            <div class="col-4">
              <label for="jk">JK</label>
              <select name="jk" id="jk" class="form-control">
                <option value="">-- Pilih --</option>
                <option value="L" <?php if($row->jk == "L"){echo "selected";}?>>Laki-Laki</option>
                <option value="P" <?php if($row->jk == "P"){echo "selected";}?>>Perempuan</option>
              </select>
            </div>
            <div class="col-4">
              <label for="tmp_lahir">Tempat Lahir</label>
                <input type="text" name="tmp_lahir" id="tmp_lahir" class="form-control" placeholder="Tempat Lahir" value="<?=$row->tmp_lahir?>">
            </div>
            <div class="col-4">
              <label for="tgl_lahir">Tanggal Lahir</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                </div>
                <input type="text" name="tgl_lahir" id="tgl_lahir" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask value="<?=$row->tgl_lahir?>">
              </div>
            </div>      
          </div>
          <div class="row col-12">
              <label for="agama">Agama</label>
              <select name="agama" id="agama" class="form-control">
                <option value="">-- Pilih --</option>
                <option value="Islam" <?php if($row->agama == "Islam"){echo "selected";}?>>Islam</option>
                <option value="Kristen" <?php if($row->agama == "Kristen"){echo "selected";}?>>Kristen</option>
              </select>       
          </div>
          <div class="row col-12">
              <label for="alamat">Alamat</label>
              <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat"><?=$row->alamat?></textarea>
          </div>
          <div class="row">
            <div class="col-4">
              <label for="no_hp">No Hp</label>
                <input type="text" name="nohp" id="nohp" class="form-control" placeholder="No HP" value="<?=$row->nohp?>">
            </div>
            <div class="col-8">
              <label for="email">E-Mail</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="E-Mail" value="<?=$row->email?>">
            </div>            
          </div><br>
          <div class="row col-12">
            <label for="foto" id="label-foto">Foto</label>
            <input type="file" name="foto" id="foto" class="col-12">
          </div><br>
        <button type="submit" name="<?=$page?>" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
        <button type="reset" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i>Batal</button>
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