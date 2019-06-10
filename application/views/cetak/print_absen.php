<script type="text/javascript">
    function proses() {
        window.print();
    }
</script>
<div class="col-md-6 mx-auto my-5">
    <div class="card text-center">
        <div class="card-body">
            <h4 class="text-dark"><b><?= $user['siswa_name'] ?></b></h4>
            <h5 class="text-dark"><b><?= $user['username'] ?></b></h5>
            <h5 class="text-dark"><b><?= $user['kelas'] ?> <?= $user['jurusan'] ?></b></h5>
        </div>
        <div class="table-responsive text-dark">
            <table class="table-bordered table-sm" width="100%">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Absen</th>
                        <th scope="col">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="col">1</th>
                        <th scope="row">Hadir</th>
                        <td><b><?= $hadir; ?></b></td>
                    </tr>
                    <tr>
                        <th scope="col">2</th>
                        <th scope="row">Sakit</th>
                        <td><b><?= $sakit; ?></b></td>
                    </tr>
                    <tr>
                        <th scope="col">3</th>
                        <th scope="row">Izin</th>
                        <td><b><?= $izin; ?></b></td>
                    </tr>
                    <tr>
                        <th scope="col">4</th>
                        <th scope="row">Alpa</th>
                        <td><b><?= $alpa; ?></b></td>
                    </tr>
                    <tr>
                        <th scope="row" colspan="2">Total</th>
                        <td><b><?= $total; ?></b></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <button type="submit" value="CETAK" onclick="proses()" class="cetak badge badge-danger float-right mt-3">CETAK</button>
</div>