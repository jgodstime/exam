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
                        <?php 
if(isset($_POST['search_btn'])){
        $question_number = $_POST['question_number'];
        $question=$_POST['question'];
        $optionA=$_POST['optionA'];
        $optionB=$_POST['optionB'];
        $optionC=$_POST['optionC'];
        $optionD=$_POST['optionD'];
        $correct_answer=$_POST['correct_answer'];
        $mark=$_POST['mark'];
    if (!empty($question_number)){
        $query="SELECT * FROM `questions_tbl` WHERE `id`='$question_number'";
        $query_run=mysql_query($query);
        if(mysql_num_rows($query_run)==NULL){
          echo '<p class="bg-danger animated bounceInLeft">Question with this question number not found.</p>';
        }else{
            while($query_row=mysql_fetch_assoc($query_run)){
                 $question = $query_row['question']; 
                 $optionA = $query_row['optiona']; 
                 $optionB = $query_row['optionb'];
                 $optionC = $query_row['optionc'];
                 $optionD = $query_row['optiond'];
                 $correct_answer = $query_row['correct_answer'];
                 $mark = $query_row['mark'];

            }
         echo '<p class="bg-success animated bounceInLeft">Question Found! Edit and make update.</p>';
             }


    }else{
        echo '<p class="bg-danger animated bounceInLeft">Question Number field is required.</p>';
    }

}else if(isset($_POST['update_btn'])){
     $question_number = $_POST['question_number'];
        $question=$_POST['question'];
        $optionA=$_POST['optionA'];
        $optionB=$_POST['optionB'];
        $optionC=$_POST['optionC'];
        $optionD=$_POST['optionD'];
        $correct_answer=$_POST['correct_answer'];
        $mark=$_POST['mark'];
    if (!empty($question) && !empty($optionA) && !empty($optionB) && !empty($optionC) && !empty($optionD) && !empty($correct_answer) && !empty($mark) && !empty($question_number)){
             $table='questions_tbl';
        echo update_tbl($question_number,$table,$question,$optionA,$optionB,$optionC,$optionD,$correct_answer,$mark); 
       
        }else{
            echo '<br><p class="bg-danger animated bounceInLeft">All fields are required.</p>';
        }
}
        ?>
                        <h3>Edit Questions</h3>
                        <h5> N/B: Correct answer must be included in one of the option fields and the correct answer
                            field.</h5>
                        <?php
        //echo the function that displays number of question
            // echo nummber_of_questions();
        ?>
                        <form action="edit.php" method="POST" class="text-left">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Waiting for the search..."
                                        name="question"> <?php if(isset($question)){echo $question;}?></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName2">Option A:</label>
                                    <input type="text" name="optionA" class="form-control" id="exampleInputName2"
                                        placeholder="Waiting for the search..."
                                        value="<?php if(isset($optionA)){echo $optionA;}?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName2">Option B:</label>
                                    <input type="text" name="optionB" class="form-control" id="exampleInputName2"
                                        placeholder="Waiting for the search..."
                                        value="<?php if(isset($optionB)){echo $optionB;}?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName2">Option C:</label>
                                    <input type="text" name="optionC" class="form-control" id="exampleInputName2"
                                        placeholder="Waiting for the search..."
                                        value="<?php if(isset($optionC)){echo $optionC;}?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName2">Option D:</label>
                                    <input type="text" name="optionD" class="form-control" id="exampleInputName2"
                                        placeholder="Waiting for the search..."
                                        value="<?php if(isset($optionD)){echo $optionD;}?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName2">Correct Answer:</label>
                                    <input type="text" name="correct_answer" class="form-control" id="exampleInputName2"
                                        placeholder="Waiting for the search..."
                                        value="<?php if(isset($correct_answer)){echo $correct_answer;}?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName2">Mark:</label>
                                    <input type="text" name="mark" class="form-control" id="exampleInputName2"
                                        placeholder="Waiting for the search..."
                                        value="<?php if(isset($mark)){echo $mark;}?>">
                                </div>
                            </div>

                            <div class="col-md-12 text-right">
                                <div class="form-group">
                                    <input type="submit" name="update_btn" value="Update" class="btn btn-primary">
                                </div>
                            </div>










                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Search With Question Number</div>
                    <div class="panel-body">

                        <label for="exampleInputName2">Enter Question #:</label>
                        <input type="text" name="question_number" class="form-control" id="exampleInputName2"
                            placeholder="Enter #"
                            value="<?php if(isset($question_number)){echo $question_number;}?>"><br>
                        <input type="submit" name="search_btn" value="Search" class="btn btn-primary"
                            style="width: 120px;">
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <?php
    include('includes/footer.php');
  ?>