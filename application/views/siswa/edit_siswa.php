<!-- CSS BACKGROUND -->
<style type="text/css">
    .latar {
        background: linear-gradient(to left, #FF0000, #65C7F7, #9CECFB);
    }
</style>
<!-- End of CSS -->
<!-- FORM REGISTRATION -->
<div class="container col-md-6 ">
    <div class="latar card o-hidden border-0 shadow-lg my-5 ">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4"><b>Edit Data Siswa</b></h1>
                    </div>
                    <form class="user" method="post" action="">

                        <!-- ID -->
                        <input type="hidden" name="id" value="<?= $siswa['id']; ?>">

                        <!-- nis -->
                        <div class="form-group row">
                            <div class="col-sm">
                                <input type="text" class="form-control" readonly name="username" placeholder="Nis Siswa" value="<?= $siswa['username']; ?> ">
                                <?= form_error('username', '<small class="text-dark pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="form-group row">
                            <div class="col-sm">
                                <input type="text" class="form-control" name="password" placeholder="Password" value="<?= $siswa['password']; ?>">
                                <?= form_error('password', '<small class="text-dark pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <!-- Name -->
                        <div class="form-group row">
                            <div class="col-sm">
                                <input type="text" class="form-control" name="siswa_name" placeholder="Full Name" value="<?= $siswa['siswa_name']; ?>">
                                <?= form_error('siswa_name', '<small class="text-dark pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <!-- Kelas -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <select class="custom-select" name="kelas_id">
                                        <option selected value="<?= $siswa['kelas_id']; ?>"><?= $siswa['kelas']; ?>
                                        </option>
                                    </select>
                                    <?= form_error('kelas_id', '<small class="text-dark pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <select class="custom-select" name="jurusan_id">
                                        <option selected value="<?= $siswa['jurusan_id']; ?>"><?= $siswa['jurusan']; ?></option>
                                    </select>
                                    <?= form_error('jurusan_id', '<small class="text-dark pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>

                        <!-- Semester -->
                        <!-- <select class="form-group"> -->
                        <!-- <select class="custom-select" name="semester"> -->
                        <!-- <option selected>Semester</option> -->
                        <!-- <option value="1">1</option> -->
                        <!-- <option value="2">2</option> -->
                        <!-- </select> -->
                        <!-- </div> -->

                        <!-- Alamat -->
                        <div class="form-group row">
                            <div class="col-sm">
                                <input type="text" class="form-control" name="alamat" placeholder="Alamat Siswa" value="<?= $siswa['alamat']; ?>">
                                <?= form_error('alamat', '<small class="text-dark pl-3">', '</small>'); ?>
                            </div>
                        </div><button type="submit" class="btn btn-primary btn-user btn-block">
                            <b>
                                Edit Data
                            </b>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>