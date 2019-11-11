<?php
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
  <script src="jq/jquery-1.12.2.js"></script>
  <script src="js/bootstrap.js"></script>
</head>

<body>
  

  <div class="container" style="padding-top:100px;">

    <div class="row">

      <div class="col-md-6 col-md-offset-3 ">

        <div class="panel panel-default">



          <div class="panel-body">
          <h3> Welcome back! Sign in</h3>

          <form action="index.php" method="POST">

          <?php       
        
if (isset($_POST['user_name']) && isset($_POST['password'])){
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    $password_hash = md5($password);



        if(!empty($user_name) && !empty($password)){
        $query= "SELECT `id` FROM `admin_tbl` WHERE `user_name`='".mysql_real_escape_string($user_name)."' AND `password`='".mysql_real_escape_string($password_hash)."'"; 
            if ($query_run =mysql_query($query)){
             $query_num_rows = mysql_num_rows($query_run);
                if($query_num_rows==0){
                echo '<br><p class="bg-danger animated bounceInLeft">Invalid user name/password combination</p>';
            }else if ($query_num_rows==1) {
        $admin_id = mysql_result($query_run, 0, 'id'); // collecting the user id to store in session in a session data
        $_SESSION['admin_id']=$admin_id; // setting session
        header('Location: admin_main.php');
            }
        }
    }else{
        echo '<br><p class="bg-danger animated bounceInLeft">You must provide user name and password</p>';
    }
}
?>


        <div class="form-group text-left">
          <label for="exampleInputName2">User name:</label>
          <input type="text" name="user_name" class="form-control" id="exampleInputName2"
        </div>


        <div class="form-group text-left" style="padding-top:15px;">
          <label for="exampleInputName2">Password:</label>
          <input type="password" name="password" class="form-control" id="exampleInputName2"
        </div>

       
    
<div class="form-group text-right" style="padding-top:7px;">
    <button type="submit" name="login_btn" class="btn btn-primary">Login</button>
</div>
</form>
            
            




          
          </div>
        </div>

      </div>

    </div>
  </div>





  
