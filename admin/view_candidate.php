<?php
error_reporting(E_ALL);
require_once'connect.inc.php';
require_once'core.inc.php';
require_once'function.php';

    include('includes/header.php');
  ?>

<div class="container">
    <div class="row">
        <h2 class="text-center">List of Exam Candidate</h2>

        <div class="table-responsive">
            <table class="table table-hover table-bordered">


                <thead>


                    <tr>
                        <th>ID</th>
                        <th>Login ID</th>
                        <th>First Name</th>
                        <th>Other Names</th>
                        <th>Email</th>
                        <th>Phone>
                        <th>Gender</th>

                    </tr>
                </thead>

                <?php

							$query="SELECT * FROM `candidate_tbl` ORDER BY `id` ASC";
							if ($query_run = mysql_query($query)){
	
								if(mysql_num_rows($query_run)==NULL){
									echo 'No Candidate Found,'.'<a href="add_candidate.php">Click to add Candidate.</a>';
								}else{
									
								
								while ($query_row = mysql_fetch_assoc($query_run)){
									
									$id = $query_row['id'];
									$login_id= $query_row['login_id'];
									$first_name= $query_row['first_name'];
									$other_name= $query_row['other_name'];
									$email= $query_row['email'];
									$phone= $query_row['phone'];
									$gender= $query_row['gender'];
											
					?>


                <tr>
                    <td> <?php echo $id; ?> </td>
                    <td> <?php echo $login_id; ?> </td>
                    <td> <?php echo $first_name; ?> </td>
                    <td> <?php echo $other_name; ?> </td>
                    <td> <?php echo $email; ?> </td>
                    <td> <?php echo $phone; ?> </td>
                    <td> <?php echo $gender; ?> </td>
                </tr>

                <?php
						}
								}

							}	

						?>

            </table>

        </div>
    </div>

</div>
<?php
    include('includes/footer.php');
  ?>