<div class="container-fluid py-3">
    <h3 class="font-weight-bold text-primary">Print Dokumen Absen</h3>
    <div class="card shadow">
        <div class="card-header">
            <a class="btn btn-light active" href="<?= base_url('cetak/absen'); ?>"><b>Print Dokumen</b></a></div>
        <div class="card-body">
            <?= $this->session->flashdata('message'); ?>
            <div class="table-responsive">
                <table class="table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nis</th>
                            <th>Name</th>
                            <th>Kelas</th>
                            <th>Pelajaran</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Pengajar</th>
                            <th>Absen</th>
                            <th>Catatan</th>
                            <th>Persetujuan</th>
                        </tr>
                    </thead>
                    <?php $n = 1; ?>
                    <!-- Print Dokumen -->
                    <?php foreach ($ket as $k) : ?>
                        <tbody>
                            <tr>
                                <td class="float"><?= $n; ?></td>
                                <td><?= $k['username']; ?></td>
                                <td><?= $k['siswa_name']; ?></td>
                                <td><?= $k['kelas']; ?></td>
                                <td><?= $k['pelajaran']; ?></td>
                                <td><?= $k['tanggal']; ?></td>
                                <td><?= $k['jam']; ?></td>
                                <td><?= $k['guru_name']; ?></td>
                                <td>
                                    <h5><a class="<?= $k['style'] ?> text-white"><?= $k['absen_name']; ?></a></h5>
                                </td>
                                <td><?= $k['keterangan']; ?></td>
                                <td>
                                    <h5><a class="<?= $k['konfirmasi_style'] ?> <?= $k['icon'] ?> text-white"> <?= $k['konfirmasi_name']; ?></a></h5>
                                </td>
                            </tr>
                        </tbody>
                        <?php $n++; ?>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>