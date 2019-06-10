<!-- Begin Page Content -->
<div class="container-fluid my-5">
    <h3 class="font-weight-bold text-primary text-center ">Mata Pelajaran</h3>
    <!-- DataTales Example -->
    <div class="col-md-9 card shadow mx-auto ">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jurusan</th>
                            <th>Pelajaran</th>
                        </tr>
                    </thead>
                    <?php $n = 1; ?>
                    <tbody>
                        <?php foreach ($pelajaran as $p) : ?>
                            <tr>
                                <td class="float"><?= $n; ?></td>
                                <td><?= $p['jurusan'] ?></td>
                                <td><?= $p['pelajaran'] ?></td>
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