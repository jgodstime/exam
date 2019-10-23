<?php
//error_reporting(E_ALL);
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


    <div style="text-align:center;">
        <?php
	if (loggedin()){ // checking if the session is set and not empty
		$user_name = getuserfield('email'); // calling the function that displays the first name of user from the table
        $login_id = getuserfield('login_id');
		// echo 'You\'re logged in, '.$user_name.'.<a href="logout.php" style="color: Red;">Click to log out</a><br>';
	}else{
		header('location: index.php');// if session is empty redirect the user to the login form
	}
?>
    </div>
    <div class="container">

        <div class="row">

                
                    <?php
         
    //increamenting the session value to get 1 to infinity..as long as this page keeps refreshing the session id will keep incrementing by 1
    if(!isset($_SESSION['id'])){
        $_SESSION['id']= 0;
    }
     
 $_SESSION['id']= $_SESSION['id']+1;

    //storing the session increamented value in a variable
$increament =$_SESSION['id'];

            
//getting the questions from the question tbl
$query = "SELECT * FROM `questions_tbl` WHERE `id`='$increament'";
$query_run = mysql_query($query);

if(mysql_num_rows($query_run)==NULL){
      header('location:result1.php');
    }else{
        while ($query_row = mysql_fetch_assoc($query_run)){
         $question_number = $query_row['id'];
         $question = $query_row['question'];
         $optiona = $query_row['optiona'];
         $optionb= $query_row['optionb'];
         $optionc= $query_row['optionc'];
         $optiond= $query_row['optiond'];
         $correct_answer= $query_row['correct_answer'];
         $mark= $query_row['mark'];
    }
}
   

?>

<div class="col-md-6 col-md-offset-3">
                    <!--this panel gives me the boarder i have in my left div-->
                    <div class="text-center">
                    <h3 class="text-center">Answer the questions at once</h3>
                    <span class="text-center" style="font-size:20px;" id="seconds"></span><span class=""
                            style="font-size:20px;">&nbsp;Seconds left</span>
                   
                    <!-- <span id="feedback"></span> -->
                    </div>
                   
                    <form method="post" class="animated bounceInLeft">
                    

                      
                    <div class="list-group">
                        <a class="list-group-item active" style="font-size:25px;">
                        <?php if(isset($question)){echo $question;}?>
                        </a>
                        <a class="list-group-item"> 
                            <input type="radio" class="aa" name="options" id="optiona" value="<?php if(isset($optiona)){echo $optiona;}?>"/>  <?php if(isset($optiona)){echo $optiona;}?>   
                        </a>
                        <a class="list-group-item">
                            <input type="radio" class="aa" name="options" id="optionb" value="<?php if(isset($optionb)){echo $optionb;}?>"/>  <?php if(isset($optionb)){echo $optionb;}?>
                        </a>
                        <a class="list-group-item">
                            <input type="radio" class="aa" name="options" id="optionc" value="<?php if(isset($optionc)){echo $optionc;}?>"/>  <?php if(isset($optionc)){echo $optionc;}?>
                        </a>
                        <a class="list-group-item">
                            <input type="radio" class="aa" name="options" id="optiond" value="<?php if(isset($optiond)){echo $optiond;}?>"/> <?php if(isset($optiond)){echo $optiond;}?>
                        </a>
                    </div>
                    </form>
            </div>


        </div>
    </div>



    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript">
        var seconds = 10;
        setInterval(
            function () {
                if (seconds <= 1) {
                    window.location = 'display_questions.php';
                } else {
                    document.getElementById('seconds').innerHTML = --seconds;
                }
            },
            1000);




        //checking if any of the radio button is clicked
        $('input:radio[name="options"]').change(function () {
            //collecting the current value of a radio button that is clicked
            var user_answer = $('input[name="options"]:checked').val();

            //collecting the variables stored in php to jquery
            var question_number = '<?php echo($question_number) ?>';
            var correct_answer = '<?php echo($correct_answer) ?>';
            var question = '<?php echo($question) ?>';
            var mark = '<?php echo($mark) ?>';
            var login_id = '<?php echo($login_id) ?>';

            $.post('process.php', {
                user_answer: user_answer,
                question_number: question_number,
                question: question,
                correct_answer: correct_answer,
                mark: mark,
                login_id: login_id
            }, function (data) {
                $('#feedback').html(data);
                window.location = 'display_questions.php';
            });




        });
    </script>

<style>
    input{
        height:17px;
        width:17px;
    }


    .list-group-item{
        font-size:17px;
    }
</style>
    </body>

</html>