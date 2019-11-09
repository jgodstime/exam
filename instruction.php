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
    
    $totalQuestion = 0;
    $query= "SELECT * FROM `questions_tbl`"; 
    if ($query_run =mysql_query($query)){
        $totalQuestion = mysql_num_rows($query_run);

    }
?>

    <div class="container">

        <div class="row">
            <div class="col-md-6 col-md-offset-3" style="padding-top:100px;">
                <div class="animated bounceInDown">
                    <div class="list-group">
                        <a class="list-group-item" style="font-size:24px;">
                            <strong> Question Instruction</strong>
                        </a>
                        <span class="list-group-item" style="font-size:18px;">
                            Hello <strong><?php echo $user_name; ?></strong>, there are
                            <strong><?php echo $totalQuestion;?></strong> question to answer all, you have 10 minutes to
                            answer each question.
                            <div class="text-center" style="padding-top:30px;padding-bottom:10px;">
                                <a href="display_questions.php" class="btn btn-primary">Start exam</a>
                            </div>
                        </span>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <script type="text/javascript" src="js/jquery.js"></script>

</body>

</html>