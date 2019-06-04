<!-- Begin Page Content -->
<div class="container-fluid mt-3">
	<h3 class="m-0 font-weight-bold text-primary mb-3 mt-3">Tabel Data Guru </h3>
	<!-- DataTales Example -->
	<div class="card shadow mb-4">

		<div class="card-header py-3">
			<div class="">
				<?= $this->session->flashdata('message'); ?>
			</div>
			<a class="btn btn-primary float-left" href="<?= base_url('guru/tambah'); ?>"><b>Tambah Data Guru</b> </a>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<form class="filter-form">
					<table class="table table-bordered table-dark" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>No</th>
								<th>Nik</th>
								<th>Password</th>
								<th>Name</th>
								<th>Kelas</th>
								<th>Pelajaran</th>
								<th>Alamat</th>
								<th>Terdaftar</th>
								<th>Action</th>
							</tr>
						</thead>
						<?php $n = 1; ?>
						<?php foreach ($guru as $g) : ?>
							<tbody>
								<tr>
									<td class="float"><?= $n; ?></td>
									<td><?= $g['username']; ?></td>
									<td><?= $g['password']; ?></td>
									<td><?= $g['guru_name']; ?></td>
									<td><?= $g['kelas']; ?></td>
									<td><?= $g['pelajaran']; ?></td>
									<td><?= $g['alamat_guru']; ?></td>
									<td><?= date('d F Y', $g['date_created_guru']); ?></td>
									<td>
										<a class="badge badge-warning mr-1 fas fa-edit" href="">
											Edit
										</a>
										<a class="badge badge-danger far fa-times-circle ml-1" href="<?= base_url() ?>admin/deleteGuru/<?= $g['guru_id'] ?>">
											Delete
										</a>
									</td>
								</tr>
							</tbody>
							<?php $n++; ?>
						<?php endforeach; ?>
					</table>
				</form>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->