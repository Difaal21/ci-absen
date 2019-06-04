<!-- CSS BACKGROUND -->
<style type="text/css">
	body {
		background: linear-gradient(to right, #0052D4, #65C7F7, #9CECFB);
	}
</style>
<!-- End of CSS -->



<body class="bg">
	<div class="container">
		<!-- Outer Row -->
		<div class="row justify-content-center">
			<div class="col-lg-6">
				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="col-lg">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4"><b>Login Sistem Absensi</b></h1>
									</div>

									<?= $this->session->flashdata('message'); ?>

									<!-- FORM LOGIN -->
									<form class="user" action="<?= base_url('home') ?>" method="post">
										<div class="form-group">
											<input type="text" name="username" class="form-control form-control-user" placeholder="Username" value="<?= set_value('username') ?>">
											<?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
										<div class="form-group">
											<input type="password" name="password" class="form-control form-control-user" placeholder="Password">
											<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>

										<button type="submit" class="btn btn-primary btn-user btn-block">
											<b>
												Login
											</b>
										</button>
									</form>
									<!-- END FORM LOGIN -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>