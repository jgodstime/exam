
<!doctype html>
<html>
    <head>
        <title>Online Examination</title>
		
        <meta charset="utf-8"/>
         <link rel="stylesheet" href="css/animate.css">
		 <link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/ibc.css" rel="stylesheet">
		 <script src="jq/jquery-1.12.2.js"></script>
          <script src="js/bootstrap.js"></script>
  <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
          
        <style>
            .jumbotron{
                background-image: radial-gradient(circle, #3c5beb, #9738b9, #b01683, #ae1454, #9c2a30);
            }
           
        </style> 
    </head> 
 	<body>
        <div class="jumbotron">
              <h1>Online Examination</h1>
              
            <h3> Department of Computer Engineering. AkwaIbom State Polytechnic </h3>
            
            </div>
        <div class="navbar navbar-default navbar-static-top">	
            <div class="container">
                <a href="#" class="navbar-brand" style="color:#9c2a30;">Admin Panel</a>

                
                <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                <div class="collapse navbar-collapse navHeaderCollapse">
                    
                    <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="admin_main.php">Home</a></li>
                        
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Candidate <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="add_candidate.php">Add Candidate</a></li>
                            <li><a href="view_candidate.php">View Candidate</a></li>
                            <li><a href="candidate_result.php">Candidate result</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Question <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="question.php">Set Questions</a></li>
                            <li><a href="edit.php">Edit Questions</a></li>
                            <li><a href="view.php">View Questions</a></li>
                        </ul>
                    </li>
     

                        

                      


                        
                    
                    </ul>
                </div>
            </div>
           
        </div>

        
    <div style="text-align:center;">
        <?php
	if (loggedin()){ // checking if the session is set and not empty
		$user_name = getuserfield('user_name'); // calling the function that displays the first name of user from the table
		 $id = getuserfield('id');
		echo 'You\'re logged in, '.$user_name.'.<a href="logout.php" style="color: Red;">Click to log out</a><br>';


	}else{
		header('location: index.php');// if session is empty redirect the user to the login form
	}
?>
    </div>

