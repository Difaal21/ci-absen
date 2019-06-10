<!-- CSS BACKGROUND -->
<style type="text/css">
    .latar {
        background: linear-gradient(to left, #FF0000, #65C7F7, #9CECFB);
    }
</style>
<!-- End of CSS -->


<!-- FORM REGISTRATION -->
<div class="container col-md-6">
    <div class="latar card o-hidden border-0 shadow-lg mt-3">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4"><b>Keterangan Tidak Masuk</b></h1>
                    </div>
                    <form class="user" method="post" action="">
                        <!-- NIM -->
                        <div class="form-group row">
                            <div class="col-sm">
                                <input type="text" class="form-control" name="username" placeholder="Nim " value="<?= $user['username'] ?>" readonly>
                                <?= form_error('username', '<small class="text-dark pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <!-- Name -->
                        <div class="form-group row">
                            <div class="col-sm">
                                <input type="text" class="form-control" name="name" placeholder="Full Name" value="<?= $user['siswa_name'] ?>" readonly>
                            </div>
                        </div>

                        <!-- Tanggal -->
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="input" class="form-control" name="tanggal" value="<?= date('d F Y') ?>" readonly>
                            </div>
                        </div>

                        <!-- Alasan -->
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <select class="custom-select" name="absen_id">
                                    <option selected disabled>Absen</option>
                                    <option value="2">Sakit</option>
                                    <option value="3">Izin</option>
                                    <option value="4">Alpa</option>
                                </select>
                                <?= form_error('absen_id', '<small class="text-white pl-3"><b>', '</b></small>'); ?>
                            </div>
                        </div>

                        <!-- pelajaran DAN Kelas -->
                        <div class=" form-group row">
                            <div class="col-sm-6">
                                <select class="custom-select" name="kelas_id">
                                    <option value="<?= $ket['kelas_id'] ?>"><?= $ket['kelas'] ?></option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <select class="required custom-select" name="pelajaran_id">
                                    <option selected disabled>Pelajaran</option>
                                    <?php foreach ($info as $i) : ?>
                                        <option value="<?= $i['pelajaran_id'] ?>"><?= $i['pelajaran'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('pelajaran_id', '<small class="text-white pl-3"><b>', '</b></small>'); ?>
                            </div>
                        </div>

                        <!-- Alasan -->
                        <div class="form-group row">
                            <div class="col-sm">
                                <textarea class="input form-control" name="keterangan" placeholder="Keterangan tidak masuk"></textarea>
                                <?= form_error('keterangan', '<small class="text-white pl-3"><b>', '</b></small>'); ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            <b>
                                Kirim
                            </b>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>