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
            <h1 class="h4 text-gray-900 mb-4"><b>Tambah Data Guru</b></h1>
          </div>
          <form class="user" method="post" action="">
            <!-- NIK -->
            <div class="form-group row">
              <div class="col-sm">
                <input type="text" class="form-control" name="username" placeholder="Nik Guru" value="<?= set_value('username') ?>">
                <?= form_error('username', '<small class="text-dark pl-3">', '</small>'); ?>
              </div>
            </div>

            <!-- Password -->
            <div class="form-group row">
              <div class="col-sm">
                <input type="text" class="form-control" name="password" placeholder="Password" value="<?= set_value('password') ?>">
                <?= form_error('password', '<small class="text-dark pl-3">', '</small>'); ?>
              </div>
            </div>

            <!-- Name -->
            <div class="form-group row">
              <div class="col-sm">
                <input type="text" class="form-control" name="name" placeholder="Full Name" value="<?= set_value('name') ?>">
                <?= form_error('name', '<small class="text-dark pl-3">', '</small>'); ?>
              </div>
            </div>

            <!-- Subjects Group -->
            <div class="form-group row">
              <div class="col-sm">
                <select class="custom-select" name="kelas_id">
                  <option selected>Kelas</option>
                  <option value=1>X</option>
                  <option value=2>XI</option>
                  <option value=3>XII</option>
                </select>
              </div>

              <!-- Kelas -->
              <div class="col-sm-6">
                <select class="custom-select" name="pelajaran_id">
                  <option selected>Pelajaran</option>
                  <option value="1">Biologi</option>
                  <option value="2">Fisika</option>
                  <option value="3">Kimia</option>
                  <option value="4">Ekonomi</option>
                  <option value="5">Geografi</option>
                  <option value="6">Sosiologi</option>
                </select>
              </div>
            </div>

            <!-- Alamat -->
            <div class="form-group row">
              <div class="col-sm">
                <input type="text" class="form-control" name="alamat" placeholder="Alamat Guru" value="<?= set_value('alamat') ?>">
                <?= form_error('alamat', '<small class="text-dark pl-3">', '</small>'); ?>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block">
              <b>
                Tambah Data
              </b>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>