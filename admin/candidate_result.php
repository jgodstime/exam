<?php
require_once'connect.inc.php';
require_once'core.inc.php';
require_once'function.php';

include('includes/header.php');
?>

<div class="container">

    <div class="row">

        <div class="col-md-8">
            <div class="panel panel-default">

                <div class="panel-body">
                
                    <?php
    if(isset($_POST['search_btn'])){
       $login_id= $_POST['login_id'];
        if(!empty($login_id)){
            
            //getting the candidate data to display in the exam summary
 $query = "SELECT * FROM `candidate_answer_tbl` WHERE `login_id`='$login_id'";
        $query_run = mysql_query($query);
            
if(mysql_num_rows($query_run)==NULL){
    echo '<br><p class="bg-danger animated bounceInLeft">Candidate not found</p>';
    }else{
        while($query_row = mysql_fetch_assoc($query_run)){
         $first_name = $query_row['first_name'];
         $other_name= $query_row['other_name'];
         $email= $query_row['email'];
         $phone= $query_row['phone'];
         $gender= $query_row['gender'];
        }  
                 
                 
//calculating the max question mark the candidate answer
 $query = "SELECT sum(mark) AS total_mark FROM `candidate_answer_tbl` WHERE login_id='$login_id'";
        $query_run = mysql_query($query);
                while($query_row = mysql_fetch_assoc($query_run)){
                 $question_total_mark = $query_row['total_mark'];
                }  
                 
                 
//Calculating the mark obtained by the candidate
 $query = "SELECT sum(your_mark) AS your_total_mark FROM `candidate_answer_tbl` WHERE login_id='$login_id'";
        $query_run = mysql_query($query);
        while($query_row = mysql_fetch_assoc($query_run)){
         $your_total_mark = $query_row['your_total_mark'];
    }
    
  
     ?>

                    <div style=";" class="table-responsive">
                        <table class="table table-bordered table-hover" style="background-color:white;">
                            <thead>
                                <tr>
                                    <th colspan="2" class="text-center">
                                        <h4>EXAM SUMMARY</h4>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>First Name</td>
                                    <td><?php echo $first_name?></td>
                                </tr>
                                <tr>
                                    <td>Last Name</td>
                                    <td><?php echo $other_name?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?php echo $email?></td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td><?php echo $phone?></td>
                                </tr>
                                <tr>
                                    <td>Mark</td>
                                    <td><?php echo $question_total_mark?></td>
                                </tr>
                                <tr>
                                    <td>Obtained Mark</td>
                                    <td><?php echo $your_total_mark?></td>
                                </tr>



                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <?php


             } 
            
        }else{
            echo '<br><p class="bg-danger animated bounceInLeft">Select a candidate id.</p>';
        }
    }
?>


                </div>
            </div>

        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">Select candidate login id</div>
                <div class="panel-body">
                    <form action="candidate_result.php" method="POST">
                        <div class="form-group">
                            <?php
                $query="SELECT DISTINCT `login_id` FROM `candidate_answer_tbl`";
                    ($query_run = mysql_query($query));
                        echo '<select name="login_id" id="item1" value=""  class="form-control">';
                echo '<option></option>';
                         while($row1 = mysql_fetch_assoc($query_run)){
                                echo '<option>';
                                    echo $row1['login_id'];
                                echo '</option>';
                             }
                echo '</select>'; 
                ?>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="search_btn" value="Search" class="btn btn-primary"
                                style="width: 120px;">
                        </div>

                </div>

                </form>
            </div>
        </div>





        <!-- displaying the question answered base on login id-->

        <div class="col-md-12">


            <div class="table-responsive">
                <h2 class="text-center">List of answered questions</h2>


                <table class="table table-hover table-bordered" style="background-color:white;">

                    <thead>
                        <tr>
                            <th>Question</th>
                            <th>Correct Answers</th>
                            <th>Your Answers</th>
                            <th>Mark</th>
                            <th>Your Mark</th>
                            <th>Time</th>
                        </tr>
                    </thead>

                    <?php

if(isset($_POST['login_id'])){

							$query="SELECT * FROM `candidate_answer_tbl` WHERE `login_id`='$login_id' ORDER BY `id` ASC";
							if ($query_run = mysql_query($query)){
	
								if(mysql_num_rows($query_run)==NULL){
									//echo 'Record not found.';
								}else{
									
								
								while ($query_row = mysql_fetch_assoc($query_run)){
									
									$question = $query_row['question'];
									$correct_answer = $query_row['correct_answer'];
                                    $your_answer = $query_row['your_answer'];
									$mark= $query_row['mark'];
									$your_mark= $query_row['your_mark'];
									$time= $query_row['time'];
											
					?>


                    <tr>
                        <td> <?php echo $question; ?> </td>
                        <td> <?php echo $correct_answer; ?> </td>
                        <td> <?php echo $your_answer; ?> </td>
                        <td> <?php echo $mark; ?> </td>
                        <td> <?php echo $your_mark; ?> </td>
                        <td> <?php echo $time; ?> </td>

                    </tr>

                    <?php
						}
								}

                            }
                            
                        }

						?>

                </table>


            </div>

        </div>
    </div>

</div><br>
</div>
<?php
    include('includes/footer.php');
  ?>