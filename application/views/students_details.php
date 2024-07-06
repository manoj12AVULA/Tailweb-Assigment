 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Students Details</title>

	<link rel="stylesheet" type="text/css" href="assets/student-user.min.css">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	
	
</head>
<body>

	
		<?php if ($this->session->flashdata('success')): ?>

			<p style="color:red;"><?php $this->session->flashdata('success')?></p>

		<?php elseif($this->session->flashdata('Error')):?>

			<p style="color:red;"><?php $this->session->flashdata('Error')?></p>

		<!-- Delete User Session Flashdata -->

		<?php elseif($this->session->flashdata('deleteSuccess')):?>
			<p style="color:red;"><?php $this->session->flashdata('deleteSuccess')?></p>

		<?php elseif($this->session->flashdata('deleteError')):?>
			<p style="color:red;"><?php $this->session->flashdata('deleteError')?></p>

			<!-- Add User Session Flashdata -->

		<?php elseif($this->session->flashdata('userAdd')):?>
			<p style="color:red;"><?php $this->session->flashdata('userAdd')?></p>
		<?php elseif($this->session->flashdata('AddError')):?>
			<p style="color:red;"><?php $this->session->flashdata('AddError')?></p>

		<?php endif;?>
	

	<div class="container-fluid main-table-container p-5">
		<div class="row">


			<h1 class="table-heading text-center"> Student Details</h1>
			<div class="col-12 table-data">

				<!-- -->
				<div class="p-4 d-flex flex-row justify-content-end">
					<a href="<?= base_url('LogoutController')?>" class="btn btn-danger"> Logout </a>
					
				</div>
				
				
				<div class="table-data">
				<table class="table table-hover table-data text-center">
					<thead class="table-dark">
						<tr>
							<th>Id</th>
							<th>Name</th>
							<th>Subject Name</th>
							<th>Marks</th>
							<th>Action</th>
							</tr>
					</thead>
					<tbody class="table-hover table-group-divider">

						<?php foreach ($students as $value) { ?>
							
							<tr>
								<td class="table-id"><?= $value->id?></td>
								<td><?= $value->name?></td>
								<td><?= $value->subject_name?></td>
								<?php if($value->marks > 80):?>
									<td class="table-success"><?= $value->marks?></td>
								<?php else:?>
									<td class="table-primary"><?= $value->marks?></td>
								<?php endif;?>
								<td>
									<div class="dropdown">
									  <button class="btn btn-primary active dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									    Edit
									  </button>
									  <ul class="dropdown-menu">
									    <li><a class="dropdown-item" href="<?= base_url('StudentsController/update_user/').$value->id?>">Update</a></li>
									    <li><a class="dropdown-item" href="<?= base_url('StudentsController/delete_user/').$value->id?>">Delete</a></li>
									    
									  </ul>
									</div>
								</td>
							</tr>

						<?php }?>
						
					</tbody>
				</table>
				</div>

				<div class="p-5">
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStudentModal">
				        Add Student
				    </button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addStudentModalLabel">Add Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                

                <?php 
                $attribit = array('id'=>'addStudentForm');
                echo form_open(base_url('StudentsController/add_student'),$attribit)?>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" required>
                    </div>
                    <div class="mb-3">
                        <label for="marks" class="form-label">Marks</label>
                        <input type="number" class="form-control" id="marks" name="marks" required>
                    </div>
                    <button type="submit" class="btn add-student-button">Add Student</button>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>


	
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html> 