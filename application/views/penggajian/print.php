<div>
    <h1><center>Laporan Gaji Karyawan</center></h1>
    <table border="1" width="100%">
        <thead>
            <tr style="background-color:#31b0d5;">
                <th width="7%">No.</th>
                <th width="15%">NIP</th>
                <th width="30%">NAMA</th>
                <th width="25%">Gaji Bulan</th>
                <th width="23%">Jumlah</th>
            </tr>
        </thead>
        <?php 
            function rupiah($angka){
                
                $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
                return $hasil_rupiah;
             
            }
        ?>
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
                <td><?=rupiah($key->gaji)?></td>
            </tr>
        <?php
        $no++; 
        }
        } else {
        ?>
            <tr>
                <td colspan="5"><center>Data Kosong</center></td>
            </tr>
        <?php 
        }
         ?>
        </tbody>
        <tfoot>
            <tr style="background-color:#31b0d5;">
                <th width="7%">No.</th>
                <th width="15%">NIP</th>
                <th width="30%">NAMA</th>
                <th width="25%">Gaji Bulan</th>
                <th width="23%">Jumlah</th>
            </tr>
        </tfoot>
        </table>
</div>