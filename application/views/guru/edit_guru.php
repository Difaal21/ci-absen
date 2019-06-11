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
                        <h1 class="h4 text-gray-900 mb-4"><b>Edit Data Guru</b></h1>
                    </div>
                    <form class="user" method="post" action="">

                        <!-- ID -->
                        <input type="hidden" name="id" value="<?= $guru['id']; ?>">

                        <!-- NIK -->
                        <div class="form-group row">
                            <div class="col-sm">
                                <input type="text" readonly class="form-control" name="username" placeholder="Nik Guru" value="<?= $guru['username']; ?>">
                            </div>
                        </div>
                        <?= form_error('username', '<small class="text-dark pl-3">', '</small>'); ?>


                        <!-- Password -->
                        <div class="form-group row">
                            <div class="col-sm">
                                <input type="text" class="form-control" name="password" placeholder="Password" value="<?= $guru['password']; ?>">
                            </div>
                        </div>
                        <?= form_error('password', '<small class="text-dark pl-3">', '</small>'); ?>


                        <!-- Name -->
                        <div class="form-group row">
                            <div class="col-sm">
                                <input type="text" class="form-control" name="name" placeholder="Full Name" value="<?= $guru['guru_name']; ?>">
                            </div>
                        </div>
                        <?= form_error('guru_name', '<small class="text-dark pl-3">', '</small>'); ?>


                        <!-- Subjects Group -->
                        <div class="form-group row">
                            <div class="col-sm">
                                <select selected class="custom-select" name="kelas_id">
                                    <option selected><?= $guru['kelas']; ?></option>
                                </select>
                            </div>
                            <?= form_error('kelas_id', '<small class="text-dark pl-3">', '</small>'); ?>

                            <!-- Kelas -->
                            <div class="col-sm-6">
                                <select class="custom-select" name="pelajaran_id">
                                    <option selected><?= $guru['pelajaran']; ?></option>
                                </select>
                            </div>
                        </div>
                        <?= form_error('pelajaran_id', '<small class="text-dark pl-3">', '</small>'); ?>

                        <!-- Alamat -->
                        <div class="form-group row">
                            <div class="col-sm">
                                <input type="text" class="form-control" name="alamat" placeholder="Alamat Guru" value="<?= $guru['alamat_guru']; ?>">
                                <?= form_error('alamat', '<small class="text-dark pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
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