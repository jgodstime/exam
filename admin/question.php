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
                        <!--this panel gives me the boarder i have in my left div-->
                        <?php     
    
    if (isset($_POST['submit_btn'])){
        $question=$_POST['question'];
        $optionA=$_POST['optionA'];
        $optionB=$_POST['optionB'];
        $optionC=$_POST['optionC'];
        $optionD=$_POST['optionD'];
        $correct_answer=$_POST['correct_answer'];
        $mark=$_POST['mark'];
        $table='questions_tbl';
        if (!empty($question) && !empty( $optionA) && !empty( $optionB) && !empty( $optionC) && !empty( $optionD) && !empty($correct_answer) && !empty($mark)){
           echo save_jss1question($table,$question,$optionA,$optionB,$optionC,$optionD,$correct_answer,$mark); //calling the function that saves jss1question
            
        }else{
            echo '<br><p class="bg-danger animated bounceInLeft">All fields are required.</p>';
        }
        
        
        
    }
?>
                        <h3>Set Questions</h3>
                        <h5> N/B: Correct answer must be included in one of the option fields and the correct answer
                            field.</h5>
                        <h4>
                            <?php
                            $table='questions_tbl';
                            echo nummber_of_questions($table);
                        ?>
                        </h4>
                        <form action="question.php" method="POST" class="text-left">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" placeholder="Enter Question"
                                            name="question"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputName2">Option A:</label>
                                        <input type="text" name="optionA" class="form-control" id="exampleInputName2"
                                            placeholder="Enter Option A">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputName2">Option B:</label>
                                        <input type="text" name="optionB" class="form-control" id="exampleInputName2"
                                            placeholder="Enter Option B">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputName2">Option C:</label>
                                        <input type="text" name="optionC" class="form-control" id="exampleInputName2"
                                            placeholder="Enter Option C">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputName2">Option D:</label>
                                        <input type="text" name="optionD" class="form-control" id="exampleInputName2"
                                            placeholder="Enter Option D">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputName2">Correct Answer:</label>
                                        <input type="text" name="correct_answer" class="form-control"
                                            id="exampleInputName2" placeholder="Enter Correct Answer">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputName2">Mark:</label>
                                        <input type="text" name="mark" class="form-control" id="exampleInputName2"
                                            placeholder="Enter Mark" value="<?php if(isset($mark)){echo $mark;}?>">
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
                        <h4>Useful Link...Goto...</h4>

                    </a>
                    <a href="question.php" class="list-group-item">Set Question</a>
                    <a href="edit.php" class="list-group-item">Edit Question</a>
                    <a href="view.php" class="list-group-item">View Question</a>
                </div>

            </div>
        </div><br>
    </div>
    <?php
    include('includes/footer.php');
  ?>