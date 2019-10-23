<?php
error_reporting(E_ALL);
require_once'connect.inc.php';
require_once'core.inc.php';
?>
<!doctype html>
<html>

<head>
    <title>Online Examination </title>

    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/animate.css">
    <link href="css/bootstrap.css" rel="stylesheet">
    <script src="js/bootstrap.js"></script>
</head>

<body>
  

        <?php
	if (loggedin()){ // checking if the session is set and not empty
		$user_name = getuserfield('email'); // calling the function that displays the first name of user from the table
        $login_id = getuserfield('login_id');
		// echo 'You\'re logged in, '.$user_name.'.<a href="logout.php" style="color: Red;">Click to log out</a><br>';
	}else{
		header('location: index.php');// if session is empty redirect the user to the login form
	}
?>
  
   

              
                    <!--this panel gives me the boarder i have in my left div-->

                    <?php
//getting the candidate data to display in the exam summary
 $query = "SELECT * FROM `candidate_answer_tbl` WHERE `login_id`='$login_id'";
        $query_run = mysql_query($query);
             if(mysql_num_rows($query_run)==NULL){
                  header('location:no_question.php');
            }else{
        while($query_row = mysql_fetch_assoc($query_run)){
         $first_name = $query_row['first_name'];
         $other_name= $query_row['other_name'];
         $email= $query_row['email'];
         $phone= $query_row['phone'];
         $gender= $query_row['gender'];
        
    }  } 
            
            
//calculating the max question mark the candidate answer
 $query = "SELECT sum(mark) AS total_mark FROM `questions_tbl`";
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


                    
                 

                    <div class="container">

<div class="row">
<div class="col-md-5 col-md-offset-3">
                    <div style="padding-top:50px;" class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th colspan="2" class="text-center"><h4>EXAM SUMMARY</h4></th>
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
                                <tr>
                                    <td class="text-center" colspan="2"><a href="answered_questions.php" class=""> View answerd questoins</a>
                                </td>
                               

                                </tr>
                            </tbody>
                        </table>
                    </div>
                    

                    <?php

   

?>

                </div>
           

        </div>
    </div>



    <script type="text/javascript" src="js/jquery.js"></script>

</body>

</html>