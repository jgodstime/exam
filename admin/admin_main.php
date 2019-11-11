<?php
error_reporting(E_ALL);
require_once'connect.inc.php';
require_once'core.inc.php';
include('includes/header.php');
?>


<div class="container">

    <div class="row">

        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?php
        
            if (isset($_POST['submit_btn'])){
               
                header('location:question.php');
            }
            
        ?>
                    <h3>Set Questions</h3>
                    <form action="admin_main.php" method="POST" class="form-inline">
                        <div class="form-group"><br>

                            <input type="submit" name="submit_btn" value="Click to add Question"
                                class="btn btn-default animated bounceInUp">


                        </div>
                    </form>
                </div>
            </div>

        </div>


        <div class="col-md-4">
            <div class="list-group">
                <a href="#" class="list-group-item disabled">
                    <h4>Useful Link...Goto...</h4>

                </a>
                <a href="question.php" class="list-group-item">Set Question</a>
                <a href="edit.php" class="list-group-item">Edit Question</a>
                <a href="#" class="list-group-item">View Question</a>
            </div>

        </div>

    </div><br>
</div>

<?php
    include('includes/footer.php');
  ?>