<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <button id="btnAdd" data-toggle="modal" data-target="#myModal" class="btn btn-block btn-primary" style="width: 150px"><i class="fas fa-plus-circle"></i> Tambah</button>
                <br>
                <div class="table-responsive">
                    
                    <table id="example1" class="table table-bordered table-striped display nowrap">
                        <thead>
                            <tr>
                                <th width="7%">No.</th>
                                <th width="15%">NIP</th>
                                <th width="30%">NAMA</th>
                                <th width="25%">Gaji Bulan</th>
                                <th width="23%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="showdata">
                        <?php if ($penggajian->num_rows() > 0) {
                        $no=1;
                        foreach ($penggajian->result_object() as $key) {
                        ?>
                            <tr>
                                <td><?=$no?></td>
                                <td><?=$key->nip?></td>
                                <td><?=$key->nama_pegawai?></td>
                                <td><?=$key->bulan?> <?=$key->tahun?></td>
                                <td>
                                <button id="btnEdit" data-toggle="modal" class="btn btn-info item-edit" title="Ubah" data-id_gaji="<?=$key->id_gaji?>" data-nip="<?=$key->nip?>" data-bulan="<?=$key->bulan?>" data-tahun="<?=$key->tahun?>" data-gaji="<?=$key->gaji?>"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger item-delete" data="<?=$key->id_gaji?>" title="Hapus"><i class="fas fa-trash"></i></button>
                                <button class="btn btn-success" id="btnView" data-nip="<?=$key->nip?>" data-nama_pegawai="<?=$key->nama_pegawai?>" data-jabatan="<?=$key->jabatan?>" data-bulan="<?=$key->bulan?>" data-tahun="<?=$key->tahun?>" data-gaji="<?=$key->gaji?>" title="Lihat"><i class="fas fa-eye"></i></button></td>
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
                                <th width="7%">No.</th>
                                <th width="15%">NIP</th>
                                <th width="40%">NAMA</th>
                                <th width="15%">JABATAN</th>
                                <th width="23%">Aksi</th>
                            </tr>
                        </tfoot>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Input Penggajian</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
          <?= form_open('Penggajian/tambah'); ?>
          <div class="row col-12">
            <div class="col-6">
              <select name="bulan" id="bulan" class="form-control">
                <option value="">-- Pilih Bulan --</option>
                <option value="Januari">Januari</option>
                <option value="Februari">Februari</option>
                <option value="Maret">Maret</option>
                <option value="April">April</option>
                <option value="Mei">Mei</option>
                <option value="Juni">Juni</option>
                <option value="Juli">Juli</option>
                <option value="Agustus">Agustus</option>
                <option value="September">September</option>
                <option value="Oktober">Oktober</option>
                <option value="November">November</option>
                <option value="Desember">Desember</option>
              </select>
            </div>
            <div class="col-6">
              <input type="number" name="tahun" id="tahun" class="form-control" placeholder="Tahun" value="">
            </div>    
          </div>
      <div class="modal-body">
          <div class="row col-12">

                    <table id="example1" class="table table-bordered table-striped display nowrap">
                        <thead>
                            <tr>
                                <th width="7%">No.</th>
                                <th width="15%">NIP</th>
                                <th width="30%">NAMA</th>
                                <th width="25%">Jabatan</th>
                                <th width="23%">Gaji</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if ($pegawai->num_rows() > 0) {
                        $no=1;
                        foreach ($pegawai->result_object() as $key) {
                        ?>
                            <tr>
                                <td><?=$no?></td>
                                <td><?=$key->nip?></td><input type="hidden" name="nip[]" id="nip" value="<?=$key->nip?>"><input type="hidden" name="nama[]" id="nama" value="<?=$key->nama_pegawai?>"><input type="hidden" name="gaji[]" id="gaji" value="<?=$key->gaji?>"><input type="hidden" name="nohp[]" id="nohp" value="<?=$key->nohp?>">
                                <td><?=$key->nama_pegawai?></td>
                                <td><?=$key->jabatan?></td>
                                <td><?=$key->gaji?></td>
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
                                <th width="7%">No.</th>
                                <th width="15%">NIP</th>
                                <th width="30%">NAMA</th>
                                <th width="25%">Jabatan</th>
                                <th width="23%">Gaji</th>
                            </tr>
                        </tfoot>
                        </table>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" id="btnSave" class="btn btn-primary">Simpan</button>
      </div>
      <?= form_close(); ?>
    </div>
  </div>
</div>