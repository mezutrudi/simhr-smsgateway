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
                                <th width="20%">USERNAME</th>
                                <th width="50%">NAMA LENGKAP</th>
                                <th width="23%">AKSI</th>
                            </tr>
                        </thead>
                        <tbody id="showdata">
                        <?php if ($admin->num_rows() > 0) {
                        $no=1;
                        foreach ($admin->result_object() as $key) {
                        ?>
                            <tr>
                                <td><?=$no?></td>
                                <td><?=$key->username?></td>
                                <td><?=$key->nama_lengkap?></td>
                                <td>
                                <button id="btnEdit" data-toggle="modal" class="btn btn-info item-edit" title="Ubah" data-username="<?=$key->username?>" data-password="<?=$key->password?>" data-nama_lengkap="<?=$key->nama_lengkap?>" data-id_admin="<?=$key->id_admin?>"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger item-delete" data="<?=$key->id_admin?>" title="Hapus"><i class="fas fa-trash"></i></button></td>
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
                                <th width="20%">USERNAME</th>
                                <th width="50%">NAMA LENGKAP</th>
                                <th width="23%">AKSI</th>
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
            <div class="col-12">
              <input type="hidden" name="id_admin" id="id_admin" class="form-control" placeholder="ID">
              <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Username">
            </div>
            <div class="col-12">
              <label for="password" class="password">Password</label>
                <input type="text" name="password" id="password" class="form-control" placeholder="Password">
            </div>
            <div class="col-12">
              <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Nama Lengkap">
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
    $('#datemask').inputmask('yyyy-mm-dd', { 'placeholder': 'yyyy-mm-dd' })
    //Money Euro
    $('[data-mask]').inputmask()
    $('#btnAdd').click(function(){
      $('#id_admin').val("");
      $('#username').val("");
      $('#password').val("");
      $('#nama_lengkap').val("");
      $('#myModal').modal('show');
      $('#myModal').find('.modal-title').text('Tambah Data Admin');
      $('#btnSave').text('SIMPAN');
    });
    //Edit
    $('#showdata').on('click', '.item-edit', function(){
      var username = $(this).data("username");
      var password = $(this).data("password");
      var nama_lengkap = $(this).data("nama_lengkap");
      var id = $(this).data("id_admin");
      $('#username').val(username);
      $('#password').val();
      $('#nama_lengkap').val(nama_lengkap);
      $('#id_admin').val(id);
      $('#myModal').modal('show');
      $('#myModal').find('.modal-title').text('Edit Data Admin');
      $('#btnSave').text('EDIT');
    });


    $('#btnSave').click(function(){
      var id_admin = $('#id_admin').val();
      var username = $('#username').val();
      var password = $('#password').val();
      var nama_lengkap = $('#nama_lengkap').val();
      var tombol = $(this).text();

      var tombol = $(this).text();

      if (tombol == 'SIMPAN') {
        if (username == "") {
          Swal.fire('Username Harus Diisi');
        }else if (password == "") {
          Swal.fire('Password Harus Diisi');
        }else if (nama_lengkap == "") {
          Swal.fire('Nama Harus Diisi');
        }else{
          $.ajax({
            type:'POST',
            url: '<?=base_url().'Admin/tambah' ?>',
            data: {
              username: username,
              password: password,
              nama_lengkap: nama_lengkap,
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
              window.location="<?=base_url('Admin')?>";
            }
          });
        }
      }else{
        $.ajax({
          type:'POST',
          url: '<?=base_url().'Admin/ubah' ?>',
          data: {
            username: username,
            password: password,
            nama_lengkap: nama_lengkap,
            id_admin: id_admin,
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
            window.location="<?=base_url('Admin')?>";
          }
        });
      }
    });

    //delete- 
    $('#showdata').on('click', '.item-delete', function(){
      var id_admin = $(this).attr('data');
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
            url: '<?php echo base_url() ?>Admin/hapus',
            data:{id_admin:id_admin},
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
                window.location="<?=base_url('Admin')?>";
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