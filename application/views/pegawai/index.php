<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <button id="btnAdd" data-toggle="modal" class="btn btn-block btn-primary" style="width: 150px"><i class="fas fa-plus-circle"></i> Tambah</button>
                <!-- <a href="<?=base_url('Pegawai/add')?>" class="btn btn-block btn-primary" style="width: 150px"><i class="fas fa-plus-circle"></i>Tambah</a> -->
                <br>
                <div class="table-responsive">
                    
                    <table id="example1" class="table table-bordered table-striped display nowrap">
                        <thead>
                            <tr>
                                <th width="7%">No.</th>
                                <th width="20%">NIP</th>
                                <th width="50%">NAMA</th>
                                <th width="23%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="showdata">
                        <?php if ($pegawai->num_rows() > 0) {
                        $no=1;
                        foreach ($pegawai->result_object() as $key) {
                        ?>
                            <tr>
                                <td><?=$no?></td>
                                <td><?=$key->nip?></td>
                                <td><?=$key->nama_pegawai?></td>
                                <td>
                                <button id="btnEdit" data-toggle="modal" class="btn btn-info item-edit" title="Ubah" data-nip="<?=$key->nip?>" data-nama_pegawai="<?=$key->nama_pegawai?>" data-jk="<?=$key->jk?>" data-tmp_lahir="<?=$key->tmp_lahir?>" data-tgl_lahir="<?=$key->tgl_lahir?>" data-agama="<?=$key->agama?>" data-alamat="<?=$key->alamat?>" data-nohp="<?=$key->nohp?>" data-email="<?=$key->email?>"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger item-delete" data="<?=$key->nip?>" title="Hapus"><i class="fas fa-trash"></i></button></td>
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
                                <th>No.</th>
                                <th>NIP</th>
                                <th>NAMA</th>
                                <th>Aksi</th>
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
            <div class="col-4">
              <label for="nip">NIP</label>
                <input type="number" name="nip" id="nip" class="form-control" placeholder="NIP" value="">
            </div>
            <div class="col-8">
              <label for="nama_pegawai">Nama</label>
                <input type="text" name="nama_pegawai" id="nama_pegawai" class="form-control" placeholder="Nama Pegawai">
            </div>            
          </div>
          <div class="row">
            <div class="col-4">
              <label for="jk">JK</label>
              <select name="jk" id="jk" class="form-control">
                <option value="">-- Pilih --</option>
                <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>
              </select>
            </div>
            <div class="col-4">
              <label for="tmp_lahir">Tempat Lahir</label>
                <input type="text" name="tmp_lahir" id="tmp_lahir" class="form-control" placeholder="Tempat Lahir">
            </div>
            <div class="col-4">
              <label for="tgl_lahir">Tanggal Lahir</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                </div>
                <input type="text" name="tgl_lahir" id="tgl_lahir" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask>
              </div>
            </div>      
          </div>
          <div class="row col-12">
              <label for="agama">Agama</label>
              <select name="agama" id="agama" class="form-control">
                <option value="">-- Pilih --</option>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
              </select>       
          </div>
          <div class="row col-12">
              <label for="alamat">Alamat</label>
              <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat"></textarea>
          </div>
          <div class="row">
            <div class="col-4">
              <label for="nohp">No Hp</label>
                <input type="text" name="nohp" id="nohp" class="form-control" placeholder="No HP" value="">
            </div>
            <div class="col-8">
              <label for="email">E-Mail</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="E-Mail">
            </div>            
          </div><br>
<!--           <div class="row col-12">
            <label for="foto" id="label-foto">Foto</label>
            <input type="file" name="foto" id="foto" class="col-12">
          </div> -->
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
    $('[data-mask]').inputmask()
    $('#btnAdd').click(function(){
      $('#nip').val("");
      $('#nama_pegawai').val("");
      $('#jk').val("");
      $('#tmp_lahir').val("");
      $('#tgl_lahir').val("");
      $('#agama').val("");
      $('#nohp').val("");
      $('#email').val("");
      $('#alamat').val("");
      $('#myModal').modal('show');
      $('#myModal').find('.modal-title').text('Tambah Data Pegawai');
      // $('#label-foto').text('Upload Foto');
      $('#btnSave').text('SIMPAN');
    });
    //Edit
    $('#showdata').on('click', '.item-edit', function(){
      var nip = $(this).data("nip");
      var nama = $(this).data("nama_pegawai");
      var jk = $(this).data("jk");
      var tmp_lahir = $(this).data("tmp_lahir");
      var tgl_lahir = $(this).data("tgl_lahir");
      var agama = $(this).data("agama");
      var alamat = $(this).data("alamat");
      var nohp = $(this).data("nohp");
      var email = $(this).data("email");
      // var foto = $(this).data("foto");
      $('#nama_pegawai').val(nama);
      $('#jk').val(jk);
      $('#tmp_lahir').val(tmp_lahir);
      $('#tgl_lahir').val(tgl_lahir);
      $('#agama').val(agama);
      $('#alamat').val(alamat);
      $('#nohp').val(nohp);
      $('#email').val(email);
      // $('#foto').val(foto);
      $('#nip').val(nip);
      $('#myModal').modal('show');
      $('#myModal').find('.modal-title').text('Edit Data Pegawai');
      $('#btnSave').text('EDIT');
    });


    $('#btnSave').click(function(){
      var nip = $('#nip').val();
      var nama_pegawai = $('#nama_pegawai').val();
      var jk = $('#jk').val();
      var tmp_lahir = $('#tmp_lahir').val();
      var tgl_lahir = $('#tgl_lahir').val();
      var agama = $('#agama').val();
      var nohp = $('#nohp').val();
      var email = $('#email').val();
      var alamat = $('#alamat').val();
      // var foto = $('#foto').val();
      var tombol = $(this).text();

      var tombol = $(this).text();

      if (tombol == 'SIMPAN') {
        if (nama_pegawai == "") {
          Swal.fire('Nama Harus Diisi');
        }else if (jk == "") {
          Swal.fire('JK Harus Diisi');
        }else{
          $.ajax({
            type:'POST',
            url: '<?=base_url().'Pegawai/tambahpegawai' ?>',
            data: {
              nama_pegawai: nama_pegawai,
              jk: jk,
              tmp_lahir: tmp_lahir,
              tgl_lahir: tgl_lahir,
              agama: agama,
              alamat: alamat,
              nohp: nohp,
              email: email,
              // foto: foto,
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
              window.location="<?=base_url('Pegawai')?>";
            }
          });
        }
      }else{
        $.ajax({
          type:'POST',
          url: '<?=base_url().'Pegawai/ubahpegawai' ?>',
          data: {
            nama_pegawai: nama_pegawai,
            jk: jk,
            tmp_lahir: tmp_lahir,
            tgl_lahir: tgl_lahir,
            agama: agama,
            alamat: alamat,
            nohp: nohp,
            email: email,
            // foto: foto,
            nip: nip,
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
            window.location="<?=base_url('Pegawai')?>";
          }
        });
      }
    });

    //delete- 
    $('#showdata').on('click', '.item-delete', function(){
      var nip = $(this).attr('data');
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
            url: '<?php echo base_url() ?>Pegawai/hapuspegawai',
            data:{nip:nip},
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
                window.location="<?=base_url('Pegawai')?>";
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