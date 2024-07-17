 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Assingment</title>

	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/student-user.min.css') ?>">

	<script src="<?= base_url('assets/assets/validations.js') ?>"></script>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	
	

</head>
<body>
	
	<div class="container-fluid main-table-container p-5">
		<div class="row">


			<?php if($this->session->tempdata('loginSuccess')) { ?>

				<div class="alert alert-success">
					<?=  $this->session->tempdata('loginSuccess') ;?>
				</div>

			<?php } ?>

			<?php if($this->session->tempdata('deleteSuccess')) { ?>

				<div class="alert alert-danger">
					<?php echo $this->session->tempdata('deleteSuccess'); ?>
				</div>

			<?php } ?>
			<?php if($this->session->tempdata('userAdd')) { ?>

				<div class="alert alert-success">
					<?php echo $this->session->tempdata('userAdd'); ?>
				</div>

			<?php } ?>

			<?php if($this->session->tempdata('AddError')) { ?>

				<div class="alert alert-danger">
					<?php echo $this->session->tempdata('AddError'); ?>
				</div>

			<?php } ?>


			<h1 class="table-heading text-center"> Student Details </h1>
			<div class="col-12 table-data">



				<!-- -->
				<div class="p-4 d-flex flex-row justify-content-between">
					<p class="justify-content-start"><?php echo $links; ?></p>
				
					
					<a href="LogoutController/logout" class="btn btn-danger text-center"> Logout</a>
						
					
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

						<?php 

						if(!empty($students)){

							foreach ($students as $value) { ?>
							
							<tr>
								<td><?= $value->id - 1?></td>

								<td contenteditable="true" data-field="name"><?= $value->name?></td>
								

								<td contenteditable="true"  data-field="subject_name"><?= $value->subject_name?> </td>
								
								
								<?php if($value->marks > 80):?>

									<td  class="table-success " contenteditable="true" data-field="marks"><?= $value->marks?> <input type="text" class="d-none" name="Uname" value="<?= $value->marks?>" ></td>
									

								<?php else:?>

									<td  class="table-primary" contenteditable="true" data-field="marks"><?= $value->marks?> <input type="text" name="Uname" class="d-none" value="<?= $value->marks?>" ></td>
									

								<?php endif;?>
								
								<td>
									<div class="dropdown">
									  <button class="btn  active dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									    Edit
									  </button>

									  <ul class="dropdown-menu">

									
									    <li><button class="dropdown-item btn btn-primary update-button" data-id="<?= $value->id ?>">Update</button></li>

									    <li><a class="dropdown-item"  href="<?= base_url('StudentsController/delete_user/').$value->id?>">Delete</a></li>
									    
									  </ul>
									</div>
								</td>
							</tr>

						<?php } } else { ?>

							<tr>
								<td colspan="5">No Data Found</td>
							</tr>
					<?php }?>

						

						
						
					</tbody>
				</table>
				</div>

				<div class="dropdown">
 

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
                
                echo form_open(base_url('StudentsController/add_student'))?>
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
                    <button type="submit" class="btn btn-primary">Add Student</button>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>


<script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.update-button').forEach(button => {
                button.addEventListener('click', function () {
                    let row = this.closest('tr');
                    let id = this.getAttribute('data-id');
                    let name = row.querySelector('[data-field="name"]').innerText;
                    let subject_name = row.querySelector('[data-field="subject_name"]').innerText;
                    let marks = row.querySelector('[data-field="marks"]').innerText;


                    let data = {
                    	id : id,
                    	name:name,
                    	subject_name:subject_name,
                    	marks:marks
                    }



                    let object = {
                    	method:'POST',
                    	headers :{
                    		'Content-Type':'application/json',
                    		Accept: "application/json",
                    	}
                    }

                    let url = <?= base_url('StudentsController/update_student') ?>;

                    fetch(, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            data
                        })
                    })
                        .then(response => response.json())
                        .then(data => {
                            alert('updating student');
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Error updating student');
                        });

                    
                });
            });
        });
    </script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>




</body>
</html> 