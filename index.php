<?php
error_reporting(E_ALL);
require_once'connect.inc.php';
require_once'core.inc.php';
?>
<!doctype html>
<html>

<head>
    <title>Online Examination</title>

    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/animate.css">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/ibc.css" rel="stylesheet">
    <script src="jq/jquery-1.12.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">

</head>

<body>


<?php       
        
        if (isset($_POST['login_btn'])){
            $email = $_POST['email'];
            $login_id = $_POST['login_id'];
        
        
                if(!empty($email) && !empty($login_id)){
                $query= "SELECT `id` FROM `candidate_tbl` WHERE `email`='".mysql_real_escape_string($email)."' AND `login_id`='".mysql_real_escape_string($login_id)."'"; 
                    if ($query_run =mysql_query($query)){
                     $query_num_rows = mysql_num_rows($query_run);
                        if($query_num_rows==0){
                        echo '<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Invalid login credentials
                    </div>';
                    }else if ($query_num_rows==1) {
                $user_id = mysql_result($query_run, 0, 'id'); // collecting the user id to store in session in a session data
                $_SESSION['user_id']=$user_id; // setting session
                header('location: check_exam.php');
                    }
                }
            }else{
                echo '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                You must provide Login id and Email
            </div>';
            }
        }
        ?>

    <div class="jumbotron my-jumbotron">
        <span>Online Examination</span>
        <p style=" ">
                Department of Computer Engineering. AkwaIbom State Polytechnic
        </p>
        <p>
            <button type="button" style="border-radius:20px; padding-left:30px;padding-right:30px;"
                class="btn btn-lg btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Sign
                in</button>
        </p>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Sign in your account </h4>
                </div>
                <form action="index.php" method="POST">

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputName2">Login ID</label>
                            <input type="password" name="login_id" class="form-control" id="exampleInputName2"
                                placeholder="Enter login id">
                        </div>


                        <div class="form-group">

                            <label for="exampleInputName2">Email:</label>
                            <input type="email" name="email" class="form-control" id="exampleInputName2"
                                placeholder="Enter email">
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="login_btn" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <style>
        /* used to make the background image to be full*/

        body {
            margin: 0;
            padding: 0;
        }

        .my-jumbotron {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('img/jobbbb.jpg');

            background-repeat: no-repeat;
            height: 650px;
            background-size: 100% 100%;
            width: 100%;
            opacity: 2;
            font-size: 90px;
            color: white;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            display: block;
            padding-top: 2em;


        }
    </style>
</body>

</html>