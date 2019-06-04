<!-- Begin Page Content -->
<div class="container-fluid">
    <h3 class="font-weight-bold text-primary mb-3 mt-3">Biologi Kelas XI : IPA</h3>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <!-- QUERY SISWA -->
                <?php
                $querySiswa =
                    "
					SELECT u.username,ts.name, tk.kelas, tp.pelajaran
					FROM tabel_siswa ts
					JOIN user u ON ts.siswa_id = u.id
					JOIN tabel_kelas tk ON tk.kelas_id = ts.kelas_id 
                    JOIN tabel_jurusan tj ON tj.jurusan_id = ts.jurusan_id
                    JOIN tabel_pelajaran tp ON tp.pelajaran_id = tk.kelas_id
                    WHERE tk.kelas_id = 2 AND tj.jurusan_id = 1
					";
                $siswa = $this->db->query($querySiswa)->result_array();
                ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>

                            <th>No</th>
                            <th>Nis</th>
                            <th>Name</th>
                            <th>Kelas</th>
                            <th>Pelajaran</th>
                            <th>Tanggal</th>
                            <th>Absen</th>
                            <th>Catatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php $n = 1; ?>
                    <?php foreach ($siswa as $s) : ?>
                        <tbody>
                            <tr>
                                <td class="float"><?= $n; ?></td>
                                <td><?= $s['username']; ?></td>
                                <td><?= $s['name']; ?></td>
                                <td><?= $s['kelas']; ?></td>
                                <td><?= $s['pelajaran']; ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a class="badge badge-warning" href="#">
                                        Konfirmasi
                                    </a>
                                    <a class="badge badge-danger ml-1" href="">
                                        Tolak
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                        <?php $n++; ?>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->