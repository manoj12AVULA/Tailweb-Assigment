<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Assingment</title>
	<link rel="stylesheet" type="text/css" href="student-user.min.css">
	<script src="assets/validations.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>
<body>

	<div class="container pt-5 login-main-container">
		<div class="row">

			<h1 class="main-heading text-center ">Login Details</h1>

			<div class="login-container mt-3 col-12 d-flex flex-row justify-content-center ">

			
					<?php 

					$attributes = array('id' => 'form' , 'class' => 'p-5 shadow');

					echo form_open(base_url(),$attributes);?>
						<div class="mb-2">
							<label for="email" class="mb-2">Email</label>
							<input type="text" class="form-control" id="email" name="email">
							<p id="Erequired" class="text-danger"></p>
						</div>
						<div class="mb-2">
							<label for="password" class="mb-2">Password</label>
							<input type="text" class="form-control" id="password" name="password">
							<p id="Prequired" class="text-danger"></p>

						</div>
						<div class="d-flex flex-row justify-content-center pt-4">
							<button type="submit" class="login-button btn btn-primary">Login</button>
						</div>
					<?php form_close();?>
					
				
			</div>
		</div>
	</div>


</body>
</html>