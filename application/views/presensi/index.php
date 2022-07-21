<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="<?=base_url('presensi/absen')?>" class="btn btn-block btn-primary" style="width: 150px"><i class="fas fa-plus-circle"></i> Tambah</a>
                <br>
                <div class="table-responsive">
                    
                    <table id="example1" class="table table-bordered table-striped display nowrap">
                        <thead>
                            <tr>
                                <th width="7%">No.</th>
                                <th width="17%">NIP</th>
                                <th width="36%">NAMA</th>
                                <th width="17%">Tanggal</th>
                                <th width="10%">Ket.</th>
                                <th width="13%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="showdata">
                        <?php if ($presensi->num_rows() > 0) {
                        $no=1;
                        foreach ($presensi->result_object() as $key) {
                        ?>
                            <tr>
                                <td><?=$no?></td>
                                <td><?=$key->nip?></td>
                                <td><?=$key->nama_pegawai?></td>
                                <td><?=$key->tgl_masuk?></td>
                                <td><?=$key->ket?></td>
                                <td>
                                <button id="btnEdit" data-toggle="modal" class="btn btn-info item-edit" title="Ubah" data-nip="<?=$key->nip?>" data-nama_pegawai="<?=$key->nama_pegawai?>" data-tgl_masuk="<?=$key->tgl_masuk?>" data-ket="<?=$key->ket?>" data-id_absen="<?=$key->id_absen?>"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger item-delete" data="<?=$key->id_absen?>" title="Hapus"><i class="fas fa-trash"></i></button></td>
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
                                <th width="17%">NIP</th>
                                <th width="36%">NAMA</th>
                                <th width="17%">Tanggal</th>
                                <th width="10%">Ket.</th>
                                <th width="13%">Aksi</th>
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
<script>
  $(function(){
    //Edit
    $('#showdata').on('click', '.item-edit', function(){
      var nip = $(this).data("nip");
      var nama = $(this).data("nama_pegawai");
      var tgl = $(this).data("tgl_masuk");
      var ket = $(this).data("ket");
      var id = $(this).data("id_absen");
      $('#nip').val(nip);
      $('#nama_pegawai').val(nama);
      $('#tgl_masuk').val(tgl);
      $('#ket').val(ket);
      $('#id_absen').val(id);
      $('#myModal').modal('show');
      $('#myModal').find('.modal-title').text('Edit Presensi');
      $('#btnSave').text('EDIT');
    });


    $('#btnSave').click(function(){
      var nip = $('#nip').val();
      var tgl_masuk = $('#tgl_masuk').val();
      var ket = $('#ket').val();
      var id_absen = $('#id_absen').val();
      var tombol = $(this).text();

      if (tombol == 'EDIT') {
        $.ajax({
          type:'POST',
          url: '<?=base_url().'Presensi/ubah' ?>',
          data: {
            id_absen: id_absen,
            nip: nip,
            tgl_masuk: tgl_masuk,
            ket: ket,
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
            window.location="<?=base_url('Presensi')?>";
          }
        });
      }
    });

    //delete- 
    $('#showdata').on('click', '.item-delete', function(){
      var id_absen = $(this).attr('data');
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
            url: '<?php echo base_url() ?>Presensi/hapus',
            data:{id_absen:id_absen},
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
                window.location="<?=base_url('Presensi')?>";
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