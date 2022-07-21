<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <button id="btnAdd" data-toggle="modal" class="btn btn-block btn-primary" style="width: 150px"><i class="fas fa-plus-circle"></i> Tambah</button>
                <br>
                <div class="table-responsive">
                    
                    <table id="example1" class="table table-bordered table-striped display nowrap">
                        <thead>
                            <tr>
                                <th width="7%">No.</th>
                                <th width="15%">NIP</th>
                                <th width="40%">NAMA</th>
                                <th width="15%">JABATAN</th>
                                <th width="23%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="showdata">
                        <?php if ($kepegawaian->num_rows() > 0) {
                        $no=1;
                        foreach ($kepegawaian->result_object() as $key) {
                        ?>
                            <tr>
                                <td><?=$no?></td>
                                <td><?=$key->nip?></td>
                                <td><?=$key->nama_pegawai?></td>
                                <td><?=$key->jabatan?></td>
                                <td>
                                <button id="btnEdit" data-toggle="modal" class="btn btn-info item-edit" title="Ubah" data-id_kep="<?=$key->id_kep?>" data-nip="<?=$key->nip?>" data-jabatan="<?=$key->jabatan?>" data-prestasi="<?=$key->prestasi?>" data-sk="<?=$key->sk?>" data-skill="<?=$key->skill?>" data-gaji="<?=$key->gaji?>"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger item-delete" data="<?=$key->id_kep?>" title="Hapus"><i class="fas fa-trash"></i></button>
                                <button class="btn btn-success" id="btnView" data-nip="<?=$key->nip?>" data-nama_pegawai="<?=$key->nama_pegawai?>" data-jabatan="<?=$key->jabatan?>" data-prestasi="<?=$key->prestasi?>" data-sk="<?=$key->sk?>" data-skill="<?=$key->skill?>" data-gaji="<?=$key->gaji?>" title="Lihat"><i class="fas fa-eye"></i></button></td>
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
<div id="myModal1" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Modal title</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
          <form id="myForm" action="" method="post" class="form-horizontal">
          <div class="row">
            <div class="col-4">
              <label for="nip1">NIP</label>
                <input type="text" name="nip1" id="nip1" class="form-control" disabled>
            </div> 
            <div class="col-8">
              <label for="nama1">Nama</label>
                <input type="text" name="nama1" id="nama1" class="form-control" disabled>
            </div>            
          </div>
          <div class="row col-12">
              <label for="prestasi1">Prestasi</label>
              <textarea name="prestasi1" id="prestasi1" class="form-control" disabled></textarea>
          </div>
          <div class="row">
            <div class="col-12">
              <label for="sk1">SK</label>
                <input type="text" name="sk1" id="sk1" class="form-control" disabled>
            </div>            
          </div>
          <div class="row col-12">
              <label for="skill1">Skill</label>
              <textarea name="skill1" id="skill1" class="form-control" disabled></textarea>
          </div>
            <div class="col-12">
              <label for="gaji1">Gaji</label>
                <input type="number" name="gaji1" id="gaji1" class="form-control" disabled>
            </div>           
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
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
            <div class="col-12">
              <input type="hidden" name="id_kep" id="id_kep" class="form-control">
              <label for="nip">Pegawai</label>
              <select name="nip" id="nip" class="form-control">
                <option value="">-- Pilih Pegawai --</option>                
                <?php foreach($pegawai->result_object() as $p) { ?>
                  <option value="<?=$p->nip?>">(<?=$p->nip?>)<?=$p->nama_pegawai?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <label for="jabatan">Jabatan</label>
                <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="Jabatan">
            </div>            
          </div>
          <div class="row col-12">
              <label for="prestasi">Prestasi</label>
              <textarea name="prestasi" id="prestasi" class="form-control" placeholder="Prestasi"></textarea>
          </div>
          <div class="row">
            <div class="col-12">
              <label for="sk">SK</label>
                <input type="text" name="sk" id="sk" class="form-control" placeholder="SK">
            </div>            
          </div>
          <div class="row col-12">
              <label for="skill">Skill</label>
              <textarea name="skill" id="skill" class="form-control" placeholder="Skill"></textarea>
          </div>
          <div class="row col-12">
              <label for="gaji">Gaji</label>
                <input type="number" name="gaji" id="gaji" class="form-control" placeholder="Gaji">
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
<script>
  $(function(){
    $('#datemask').inputmask('yyyy-mm-dd', { 'placeholder': 'yyyy-mm-dd' })
    //Money Euro
    $('[data-mask]').inputmask();
    $('#btnView').click(function(){
      var nip = $(this).data("nip");
      var nama = $(this).data("nama_pegawai");
      var jabatan = $(this).data("jabatan");
      var prestasi = $(this).data("prestasi");
      var sk = $(this).data("sk");
      var skill = $(this).data("skill");
      var gaji = $(this).data("gaji");
      $('#nip1').val(nip);
      $('#nama1').val(nama);
      $('#jabatan1').val(jabatan);
      $('#prestasi1').val(prestasi);
      $('#sk1').val(sk);
      $('#skill1').val(skill);
      $('#gaji1').val(gaji);
      $('#myModal1').modal('show');
      $('#myModal1').find('.modal-title').text('Detail Kepegawaian');
      $('#btnSave').text('SIMPAN');
    });
    $('#btnAdd').click(function(){
      $('#id_kep').val("");
      $('#nip').val("");
      $('#jabatan').val("");
      $('#prestasi').val("");
      $('#sk').val("");
      $('#skill').val("");
      $('#gaji').val("");
      $('#myModal').modal('show');
      $('#myModal').find('.modal-title').text('Kepegawaian');
      $('#label-foto').text('Upload Foto');
      $('#btnSave').text('SIMPAN');
    });
    //Edit
    $('#showdata').on('click', '.item-edit', function(){
      var id_kep = $(this).data("id_kep");
      var nip = $(this).data("nip");
      var jabatan = $(this).data("jabatan");
      var prestasi = $(this).data("prestasi");
      var sk = $(this).data("sk");
      var skill = $(this).data("skill");
      var gaji = $(this).data("gaji");
      $('#nip').val(nip);
      $('#jabatan').val(jabatan);
      $('#prestasi').val(prestasi);
      $('#sk').val(sk);
      $('#skill').val(skill);
      $('#gaji').val(gaji);
      $('#id_kep').val(id_kep);
      $('#myModal').modal('show');
      $('#myModal').find('.modal-title').text('Edit Data Pegawai');
      $('#btnSave').text('EDIT');
    });


    $('#btnSave').click(function(){
      var nip = $('#nip').val();
      var jabatan = $('#jabatan').val();
      var prestasi = $('#prestasi').val();
      var sk = $('#sk').val();
      var skill = $('#skill').val();
      var gaji = $('#gaji').val();
      var id_kep = $('#id_kep').val();
      var tombol = $(this).text();

      var tombol = $(this).text();

      if (tombol == 'SIMPAN') {
        if (nip == "") {
          Swal.fire('Pegawai Harus Diisi');
        }else if (jabatan == "") {
          Swal.fire('Jabatan Harus Diisi');
        }else{
          $.ajax({
            type:'POST',
            url: '<?=base_url().'Kepegawaian/tambah' ?>',
            data: {
              nip: nip,
              jabatan: jabatan,
              prestasi: prestasi,
              sk: sk,
              skill: skill,
              gaji: gaji,
            },
            success: function(data){
              $('#myModal').modal('hide');
              Swal.fire({
                title: 'Sukses',
                text: 'Data Berhasil diubah',
                icon: 'success',
                timer: 2000
              });
              // TampilKelas();
              window.location="<?=base_url('Kepegawaian')?>";
            }
          });
        }
      }else{
        $.ajax({
          type:'POST',
          url: '<?=base_url().'Kepegawaian/ubah' ?>',
          data: {
            nip: nip,
            jabatan: jabatan,
            prestasi: prestasi,
            sk: sk,
            skill: skill,
            gaji: gaji,
            id_kep: id_kep,
          },
          success: function(data){
            $('#myModal').modal('hide');
            Swal.fire({
              title: 'Sukses',
              text: 'Data Berhasil diubah',
              icon: 'success',
              timer: 2000
            });
            // TampilKelas();
            window.location="<?=base_url('Kepegawaian')?>";
          }
        });
      }
    });

    //delete- 
    $('#showdata').on('click', '.item-delete', function(){
      var id_kep = $(this).attr('data');
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      })

      Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Data yang terhapus tidak dapat dikembalikan !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus!',
        cancelButtonText: 'Batal',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            type: 'ajax',
            method: 'get',
            async: false,
            url: '<?php echo base_url() ?>Kepegawaian/hapus',
            data:{id_kep:id_kep},
            dataType: 'json',
            success: function(response){
              if(response.success){
                $('#deleteModal').modal('hide');
                // $('.alert-success').html('Employee Deleted successfully').fadeIn().delay(4000).fadeOut('slow');
                Swal.fire({
                  title: 'Sukses!',
                  text: 'Data Berhasil Terhapus',
                  icon: 'success',
                  timer: 2000
                });
                // TampilKelas();
                window.location="<?=base_url('Kepegawaian')?>";
              }else{
                alert('Error');
              }
            },
            error: function(){
              Swal.fire('Error');
              // alert('Hapus Setting Wali Kelas Terlebih Dahulu');
            }
          });
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          Swal.fire({
            title: 'Dibatalkan',
            text: 'Data Anda masih Aman :)',
            icon: 'error',
            timer: 2000
          });
        }
      });
    });

  });
</script>