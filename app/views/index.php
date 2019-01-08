<!DOCTYPE html>
<html>
<head>
	<title> Todo-List </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="../../assets/css/style.css">

		<!-- Jquery -->
	<script
  	src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="crossorigin="anonymous"></script>
</head>
<body>

	<h1> To-Do List App</h1>

	<div class="container">
		<section class="row">
			<div class="col-md-8">
				<form>
					<div class="form-group">
						<input id="newtask" type="text" name="name">
						<button id="addtaskbtn" type="submit" name="addtaskbtn" class="btn btn-primary"> Add Task </button>
					</div>
				</form>
			</div> <!-- end of column -->

		</section> <!-- end of row -->


	</div> <!-- end of container -->


	<script type="text/javascript">



	// add task	
	$("#addtaskbtn").click( () => {
		const newTask = $('#newtask').val();
		

		$.ajax({
			method : 'GET',
			url : '../controllers/add_task.php',
			data : {name : newTask}, 
		}) .done(console.log("added task"));

	});


	</script>

	<!-- display tasks -->

	<h2> Task Lists</h2>
	<ul id="taskList">

		<?php

			require_once '../controllers/connection.php';

			$sql = "SELECT * FROM tasks";
			$result = mysqli_query($conn, $sql);

			while($row = mysqli_fetch_assoc($result) ) { ?>
				<li data-id="<?php echo $row['id'] ; ?>">
					<?php echo $row['name'] . " is task number " . $row['id']; ?>
					<button class="deleteBtn btn-danger"> Delete </button>
				</li>

			<?php } ?>


	</ul>


	<script>
		//delete tasks
		$('#taskList').on('click', '.deleteBtn', function() {
			const task_id = $(this).parent().attr('data-id');

			$.ajax({
				method : 'POST',
				url : '../controllers/remove_task.php',
				data: { task_id : task_id }
			}) .done ( data => {
				$(this).parent().fadeOut();
			});
		});

	</script>




</body>
</html>