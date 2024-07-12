<?php $this->load->view('headers');?>

	<div class="container pt-5 login-main-container">

		<?php if($this->session->flashdata('LogOut')) { ?>

				<div class="alert alert-success">
					<?php $this->session->flashdata('LogOut') ?>
				</div>

			<?php } ?>

		<h1 class="main-heading text-center">Login Details</h1>

		<div class="row">

			<div class="login-container mt-3 col-12 d-flex flex-row justify-content-center ">

			
					<?php 

					$attributes = array('id' => 'form' , 'class' => 'p-5 shadow');

					 echo form_open('LoginController',$attributes);?>
						<div class="mb-2">
							<label for="email" class="mb-2">Email</label>
							<input type="text" class="form-control" id="email" name="email">
							
						</div>
						<?= form_error('email');?>

						<div class="mb-2">
							<label for="password" class="mb-2">Password</label>
							<input type="password" class="form-control" id="password" name="password">
							

						</div>
						<?=form_error('password');?>
						<div class="d-flex flex-row justify-content-center pt-4">
							<button type="submit" class="login-button btn btn-primary">Login</button>
						</div>
						
					<?php form_close();?>
					
				
			</div>
		</div>
	</div>


</body>
</html>