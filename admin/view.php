<?php
require_once'connect.inc.php';
require_once'core.inc.php';
require_once'function.php';

include('includes/header.php');
?>

	<div class="container">

	

		<div class="row">
					<h2 class="text-center">List of Questions</h2>
					<?php
		if(isset($_POST['deleteBtn'])){
			$questionId = $_POST['deleteId'];
			$query="DELETE  FROM `questions_tbl` WHERE id='$questionId'";
			if(mysql_query($query)){
				echo '<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					Question successfully deleted .
				</div>';
			}else{
				echo '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					Unable to delete question at this time.
				</div>';
			}
		}

	?>

			<div class="table-responsive">
				<table class="table table-hover table-bordered">
					<thead>
						<tr>
							<th>ID</th>
							<th>Question</th>
							<th>Option A</th>
							<th>Option B</th>
							<th>Option C</th>
							<th>Option D</th>
							<th>Corrent Answer</th>
							<th>Mark</th>
							<!-- <th>Action</th> -->
						</tr>
					</thead>

					<?php
								$query="SELECT * FROM `questions_tbl` ORDER BY `id` ASC";
								if ($query_run = mysql_query($query)){
		
									if(mysql_num_rows($query_run)==NULL){
										echo 'No question found,'.'<a href="">Click to add question.</a>';
									}else{
										
									
									while ($query_row = mysql_fetch_assoc($query_run)){
										
										$id = $query_row['id'];
										$question = $query_row['question'];
										$optiona = $query_row['optiona'];
										$optionb= $query_row['optionb'];
										$optionc= $query_row['optionc'];
										$optiond= $query_row['optiond'];
										$correct_answer= $query_row['correct_answer'];
										$mark= $query_row['mark'];			
						?>


					<tr>
						<td> <?php echo $id; ?> </td>
						<td> <?php echo $question; ?> </td>
						<td> <?php echo $optiona; ?> </td>
						<td> <?php echo $optionb; ?> </td>
						<td> <?php echo $optionc; ?> </td>
						<td> <?php echo $optiond; ?> </td>
						<td> <?php echo $correct_answer; ?> </td>
						<td> <?php echo $mark; ?> </td>
						<td> 
						<!-- <form action="<?php $_SERVER['REQUEST_URI'];?>" method="post">
							<input type="hidden" name="deleteId" value="<?php echo $id; ?>">
							<button name="deleteBtn" class="btn btn-danger" type="submit">Delete</button>
						</form>   -->
						
						</td>
					</tr>

					<?php
							}
									}

								}	

							?>

				</table>
			</div>

		</div><br>
	</div>
	<?php
    include('includes/footer.php');
  ?>