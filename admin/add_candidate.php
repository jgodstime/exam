<?php
error_reporting(E_ALL);
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
                        <!--this panel gives me the boarder i have in my left div-->

                        <?php
        
          if (isset($_POST['submit_btn'])){
              $f_name= $_POST['f_name'];
               $o_name= $_POST['o_name'];
               $email= $_POST['email'];
               $phone= $_POST['phone'];
               $gender= $_POST['gender'];
              
              if(!empty($f_name) && !empty($o_name) && !empty($email) && !empty($phone) && !empty($gender)){
                  $ran1=rand(100,400);
                  $ran2=rand(1000,100);
                  $login_id = 'ONL'.$ran1.$ran2;
                  
                  $table='candidate_tbl';
                  echo save_candidate($table,$login_id,$f_name,$o_name,$email,$phone,$gender);
              }else{
                  echo '<br><p class="bg-danger animated bounceInLeft">All fields are required.</p>';
              }
          }
        
        
            
        ?>
                        <h3>Add Candidate</h3>
                        <form action="add_candidate.php" method="POST" class="text-left">
                            <div class="row">


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputName2">First Name:</label>
                                        <input type="text" name="f_name" class="form-control" id="exampleInputName2"
                                            placeholder="Enter first name">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputName2">Other Names:</label>
                                        <input type="text" name="o_name" class="form-control" id="exampleInputName2"
                                            placeholder="Enter other names">
                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="exampleInputName2">Email:</label>
                                        <input type="email" name="email" class="form-control" id="exampleInputName2"
                                            placeholder="Enter email">
                                    </div>
                                </div>


                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="exampleInputName2">Phone:</label>
                                        <input type="text" name="phone" class="form-control" id="exampleInputName2"
                                            placeholder="Enter phone number">
                                    </div>
                                </div>


                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label for="exampleInputName2">Gender:</label>
                                        <select class="form-control" name="gender">
                                            <option></option>
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12 text-right">

                                    <div class="form-group">
                                        <input type="submit" name="submit_btn" value="Submit" class="btn btn-primary">
                                    </div>
                                </div>

                            </div>


                        </form>
                    </div>
                </div>

            </div>

            <div class="col-md-4">

                <div class="list-group">
                    <a href="#" class="list-group-item disabled">
                        <h4>Quick Link</h4>
                    </a>
                    <a href="add_candidate.php" class="list-group-item">Add Candidate</a>
                    <a href="view_candidate.php" class="list-group-item">View Candidate</a>


                </div>

            </div><br>
        </div>
    </div>
    <?php
    include('includes/footer.php');
  ?>