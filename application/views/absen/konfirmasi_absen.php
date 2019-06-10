<!-- Begin Page Content -->
<div class="container-fluid">
    <h3 class="font-weight-bold text-primary mb-3 mt-3">Konfirmasi Absen Siswa</h3>
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
                            <!-- <th>Kelas</th>
                            <th>Pelajaran</th> -->
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Pengajar</th>
                            <th>Absen</th>
                            <th>Catatan</th>
                            <th>Persetujuan</th>
                        </tr>
                    </thead>
                    <?php $n = 1; ?>
                    <!-- SISWA Biologi KELAS 10 -->
                    <?php foreach ($ket as $k) : ?>
                        <tbody>
                            <tr>
                                <td class="float"><?= $n; ?></td>
                                <td><?= $k['username']; ?></td>
                                <td><?= $k['siswa_name']; ?></td>
                                <!-- <td><?= $k['kelas']; ?></td> -->
                                <!-- <td><?= $k['pelajaran']; ?></td> -->
                                <td><?= $k['tanggal']; ?></td>
                                <td><?= $k['jam']; ?></td>
                                <td><?= $k['guru_name']; ?></td>
                                <td>
                                    <h5><a class="<?= $k['style'] ?> text-white"><?= $k['absen_name']; ?></a></h5>
                                </td>
                                <td><?= $k['keterangan']; ?></td>
                                <td>
                                    <h5><?php if ($k['konfirmasi_id'] == 1) { ?>
                                            <a href="<?= base_url() ?>absen/changeAction/<?= $k['as_id'] ?>/konfirmasi" class="<?= $k['konfirmasi_style'] ?> <?= $k['icon'] ?>"> <?= $k['konfirmasi_name']; ?></a>
                                        <?php  } elseif ($k['konfirmasi_id'] == 2) {  ?>
                                            <a href="<?= base_url() ?>absen/changeAction/<?= $k['as_id'] ?>/tolak" class="<?= $k['konfirmasi_style'] ?> <?= $k['icon'] ?>"> <?= $k['konfirmasi_name']; ?></a>
                                        <?php } else {  ?><a href="<?= base_url() ?>absen/changeAction/<?= $k['as_id'] ?>/tunggu_konfirmasi" class="<?= $k['konfirmasi_style'] ?> <?= $k['icon'] ?>"> <?= $k['konfirmasi_name']; ?></a>
                                        <?php } ?>
                                    </h5>
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