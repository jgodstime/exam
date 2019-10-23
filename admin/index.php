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
  <div class="jumbotron">
    <h1>Online Examination!</h1>

    <p>Admin Panel </p>
  </div>
  <div class="navbar navbar-default navbar-static-top">
    <div class="container">
      <a href="index.php" class="navbar-brand">Online Examination</a>




    </div>

  </div>

  <div class="container">

    <div class="row">

      <div class="col-md-8">
        <div class="panel panel-default">



          <div class="panel-body">
            <!--this panel gives me the boarder i have in my left div-->
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
        $user_id = mysql_result($query_run, 0, 'id'); // collecting the user id to store in session in a session data
        $_SESSION['user_id']=$user_id; // setting session
        header('Location: admin_main.php');
            }
        }
    }else{
        echo '<br><p class="bg-danger animated bounceInLeft">You must provide user name and password</p>';
    }
}
?>
            <h3> Welcome Admin. Sign in </h3>



            <!-- Small modal -->
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal"
                            data-whatever="@mdo">Sign in</button>

          
          </div>
        </div>

      </div>

    </div>
  </div>





  

  <?php
    include('includes/footer.php');
  ?>
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
                          <label for="exampleInputName2">User name:</label>
                          <input type="text" name="user_name" class="form-control" id="exampleInputName2"
                        </div>


                        <div class="form-group">
                          <label for="exampleInputName2">Password:</label>
                          <input type="password" name="password" class="form-control" id="exampleInputName2"
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
