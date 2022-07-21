<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
              <form action="<?=base_url('Penggajian/cetakpdf')?>" method="post">
                <div class="row">
                  <div class="col-6">
                    <label for="bulan">Bulan</label>
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
                    <label for="tahun">Tahun</label>
                      <input type="number" class="form-control" name="tahun" id="tahun">
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