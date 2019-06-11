<div class="container-fluid my-5 col-md-8 ">
    <h3 class="font-weight-bold text-primary text-center mb-3">
        My Profile
    </h3>
    <div class="card shadow">
        <div class="card-body">
            <div class="card text-center">
                <div class="card-header ">
                    <div class="card mx-auto mt-1 mb-4 " style="width: 10rem;">
                        <img class="card-img-top" src="<?= base_url('assets/img/profile/') . $info['image'];  ?>">
                        <h5 class="font-weight-bold text-dark mt-1">
                            <?= $info['siswa_name'];  ?>
                            <hr class="my-1">
                            <?= $info['username'];  ?>
                        </h5>
                    </div>
                    <div class="row col-md-8 mx-auto">
                        <div class="col-sm">
                            <h5 class="font-weight-bold text-dark">Kelas : <?= $info['kelas'];  ?> </h5>
                        </div>
                        <div class="col-sm">
                            <h5 class="font-weight-bold text-dark">Jurusan : <?= $info['jurusan'];  ?> </h5>
                        </div>
                    </div>
                    <div class="row col-md-8 mx-auto">
                        <div class="col-sm">
                            <h5 class="font-weight-bold text-dark ">Alamat : <?= $info['alamat'];  ?> </h5>
                        </div>
                        <!-- <div class="col-sm">
                            <h4 class="font-weight-bold text-dark mb-3 mt-3">Kelas : <?= $info['jurusan'];  ?> </h4>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>