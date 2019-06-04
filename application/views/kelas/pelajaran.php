<!-- Begin Page Content -->
<div class="container-fluid">
    <h3 class="font-weight-bold text-primary mb-3 mt-3">Mata Pelajaran</h3>
    <!-- DataTales Example -->
    <div class="col-md-10 mx-auto card shadow ">
        <div class=" card-body">
            <div class="table-responsive">
                <?php
                $queryPelajaran =
                    "
					SELECT * 
                    FROM subjects_group sg 
                    JOIN tabel_pelajaran tp ON tp.pelajaran_id = sg.pelajaran_id
                    JOIN tabel_jurusan tj ON tj.jurusan_id = sg.jurusan_id 
					";
                $pelajaran = $this->db->query($queryPelajaran)->result_array();
                ?>
                <table class="table table-bordered" cellspacing="0" align="center">
                    <thead>
                        <tr>

                            <th>No</th>
                            <th>Jurusan</th>
                            <th>Mata Pelajaran</th>
                        </tr>
                    </thead>
                    <?php $n = 1; ?>
                    <?php foreach ($pelajaran as $p) : ?>
                        <tbody>
                            <tr>
                                <td class=" float"><?= $n; ?></td>
                                <td><?= $p['jurusan']; ?></td>
                                <td><?= $p['pelajaran']; ?></td>
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