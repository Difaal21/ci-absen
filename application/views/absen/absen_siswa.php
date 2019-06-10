<div class="container-fluid col-md-9 my-5 mx-auto">
    <h3 class="font-weight-bold text-dark text-center">Absen Siswa</h3>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row text-center">
                <!-- FOREACH -->
                <?php foreach ($info as $i) : ?>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><b>Absen <?= $i['pelajaran'] ?></b></h5>
                                <hr class="sidebar-divider">
                                <p class="card-text">Kelas <?= $i['kelas'] ?>,
                                    Pelajaran <?= $i['pelajaran'] ?>,
                                    Jurusan <?= $i['jurusan'] ?>
                                    <p class="">Pengajar : <?= $i['guru_name'] ?> </p>
                                </p>
                                <h5>
                                    <a class="badge badge-primary fas fa-school" href="<?= $i['absen_url'] ?>"> Hadir</a>
                                </h5>
                                <h5>
                                    <a href="<?= base_url() ?>absen/keterangan_absen/<?= $i['pelajaran'] ?>" class=" badge badge-warning fas fa-comments"> Tidak Masuk</a>
                                </h5>
                                <h5>
                                    <a href="<?= $i['url'] ?>" class=" badge badge-danger fas fa-clipboard-list"> Lihat Absen</a>
                                </h5>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?= $this->session->flashdata('message'); ?>
</div>