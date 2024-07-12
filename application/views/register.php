

<?php $this->load->view('headers');

?>



<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div>
				<h1 class="text-center">Enter Your Details</h1>
				<?= form_open()?>

				<div class="mb-2">
					<label for="fname">Full Name</label>
					<input type="text" name="fname" class="form-control">
				</div>
				<?= form_error('fname')?>

				<div class="mb-2">
					<label for="email">Email</label>
					<input type="text" name="email" class="form-control">
				</div>
				<?= form_error('email')?>

				<div class="mb-2">
					<label for="password">Password</label>
					<input type="password" name="password" class="form-control">
				</div>
				<?= form_error('password')?>

				
		<button type="submit" class="btn btn-primary"> Save</button>

		<?= form_close()?>
	</div>
</div>
</div>
</div>