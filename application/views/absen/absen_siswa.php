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
                                    <a class="badge badge-primary fas fa-school" href="">Hadir</a>
                                </h5>
                                <h5>
                                    <a href="" class="badge badge-warning fas fa-comments">Tidak Masuk</a>
                                </h5>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>




<!-- <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Pelajaran</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Absen</th>
                    <th>Catatan</th>
                </tr>
            </thead>
            <?php $n = 1; ?>
            <!--  -->
<!-- <tbody>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <a class="badge badge-primary fas fa-school" href="#">
                    Hadir
                </a>
                <a class="badge badge-warning fas fa-syringe" href="">
                    Sakit
                </a>
                <a class="badge badge-success fas fa-comments" href="">
                    Izin
                </a>
                <a class="badge badge-danger fas fa-skull" href="">
                    Alpa
                </a>
            </td>
            <td></td>
        </tr>
    </tbody> -->
<!-- <?php $n++; ?>
    </table> -->
</div> -->