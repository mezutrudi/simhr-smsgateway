<center><h1>Laporan Absensi Karyawan</h1></center>
<p>Tanggal : <?=date('d-m-Y', strtotime($awal))?> s/d <?=date('d-m-Y', strtotime($akhir))?></p>
<div class="table-responsive">
    
    <table border="1" width="100%">
        <thead>
            <tr>
                <th width="7%">No.</th>
                <th width="17%">NIP</th>
                <th width="36%">NAMA</th>
                <th width="17%">Tanggal</th>
                <th width="10%">Ket.</th>
            </tr>
        </thead>
        <tbody id="showdata">
        <?php if ($presensi->num_rows() > 0) {
        $no=1;
        foreach ($presensi->result_object() as $key) { 
            $hadir = $key->ket;
        ?>
            <tr>
                <td><?=$no?></td>
                <td><?=$key->nip?></td>
                <td><?=$key->nama_pegawai?></td>
                <td><?=date('d-m-Y', strtotime($key->tgl_masuk))?></td>
                <td><?php if ($key->ket == 'H') {echo "Hadir";}elseif ($key->ket == 'I') {echo "Ijin";}elseif ($key->ket == 'A') {echo "Absen";}elseif ($key->ket == 'C') {echo "Cuti";}?></td>
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
            </tr>
        </tfoot>
        </table>
</div>