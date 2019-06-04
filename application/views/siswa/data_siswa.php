<!-- Begin Page Content -->
<div class="container-fluid">
	<h3 class="font-weight-bold text-primary mb-3 mt-3">Tabel Data Siswa </h3>
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<div class="">
				<?= $this->session->flashdata('message'); ?>
			</div>
			<a class="btn btn-primary float-left " href="<?= base_url('siswa/tambah'); ?>">
				<b>Tambah Data Siswa</b>
			</a>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Nis</th>
							<th>Password</th>
							<th>Name</th>
							<th>Kelas</th>
							<th>Jurusan</th>
							<!-- <th>Semester</th> -->
							<th>Alamat</th>
							<th>Terdaftar</th>
							<th>Action</th>
						</tr>
					</thead>
					<?php $n = 1; ?>
					<?php foreach ($siswa as $s) : ?>
						<tbody>
							<tr>
								<td class="float"><?= $n; ?></td>
								<td><?= $s['username']; ?></td>
								<td><?= $s['password']; ?></td>
								<td><?= $s['siswa_name']; ?></td>
								<td><?= $s['kelas']; ?></td>
								<td><?= $s['jurusan']; ?></td>
								<!-- <td><?= $s['semester']; ?></td> -->
								<td><?= $s['alamat']; ?></td>
								<td><?= date('d F Y', $s['date_created']); ?></td>
								<td>
									<a class="badge badge-warning fas fa-edit" href="#">
										Edit
									</a>
									<a class="badge badge-danger far fa-times-circle " href="<?= base_url() ?>admin/deleteSiswa/<?= $s['siswa_id'] ?>">
										Delete
									</a>
								</td>
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