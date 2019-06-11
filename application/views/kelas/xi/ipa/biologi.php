<!-- Begin Page Content -->
<div class="container-fluid">
    <h3 class="font-weight-bold text-primary mb-3 mt-3">Biologi Kelas XI : IPA</h3>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <?= $this->session->flashdata('message'); ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nis</th>
                            <th>Name</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Absen</th>
                            <th>Catatan</th>
                            <th>Persetujuan</th>
                        </tr>
                    </thead>
                    <?php $n = 1; ?>
                    <!-- SISWA Biologi KELAS 11 -->
                    <?php foreach ($siswa as $s) : ?>
                        <tbody>
                            <tr>
                                <td class="float"><?= $n; ?></td>
                                <td><?= $s['username']; ?></td>
                                <td><?= $s['siswa_name']; ?></td>
                                <td><?= $s['tanggal']; ?></td>
                                <td><?= $s['jam']; ?></td>
                                <td>
                                    <h5><a class="<?= $s['style'] ?> text-white"><?= $s['absen_name']; ?></a></h5>
                                </td>
                                <td><?= $s['keterangan']; ?></td>
                                <td>
                                    <h5><a class="<?= $s['konfirmasi_style'] ?> <?= $s['icon'] ?> text-white"> <?= $s['konfirmasi_name']; ?></a></h5>
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