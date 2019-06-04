<!-- Begin Page Content -->
<div class="container-fluid">
    <h3 class="font-weight-bold text-primary mb-3 mt-3">Ilmu Pengetahuan Alam </h3>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kelas</th>
                            <th>Pelajaran</th>
                            <th>Pengajar</th>
                        </tr>
                    </thead>
                    <?php $n = 1; ?>
                    <tbody>
                        <?php foreach ($jurusanIpa as $j) : ?>
                            <tr>
                                <td class="float"><?= $n; ?></td>
                                <td><?= $j['kelas'] ?></td>
                                <td>
                                    <a class="nav-link" href="<?= base_url($j['url']); ?>">
                                        <?= $j['pelajaran'] ?>
                                    </a>
                                </td>
                                <td><?= $j['guru_name'] ?></td>
                            </tr>
                        </tbody>
                        <?php $n++; ?>
                    <?php endforeach; ?>
                    <!-- ENDFOREACH -->
                </table>
                </a>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->