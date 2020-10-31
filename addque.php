<?php
session_start();
require('config.php');
$question=array();
$size=0;
$name=$_SESSION['name'];
// echo '<script>alert("'.$name.'")</script>';
$sq = "SELECT * FROM `tests` WHERE `test_name`='$name'"; 
    $result = $conn->query($sq);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$id=$row['test_id']; 
			
	}
}

if(isset($_POST['submit'])) {
    $num= isset($_POST['no'])?$_POST['no']:'';
    $ques= isset($_POST['question'])?$_POST['question']:'';
    $opt1= isset($_POST['option1'])?$_POST['option1']:'';
    $opt2= isset($_POST['option2'])?$_POST['option2']:'';
    $opt3= isset($_POST['option3'])?$_POST['option3']:'';
    $opt4= isset($_POST['option4'])?$_POST['option4']:'';
    $ans= isset($_POST['answer'])?$_POST['answer']:'';
    echo '<script>alert("'.$id.'")</script>';
    $sql2 = "INSERT INTO questions(`ques`, `opt1`, `opt2`,`opt3`,`opt4`,`ans`,`test_id`)
        VALUES ('".$ques."', '".$opt1."', '".$opt2."','".$opt3."','".$opt4."','".$ans."','".$id."')";

        if ($conn->query($sql2) === true) {
            echo "Added Sucessfull";
        }
}  
?>
<!DOCTYPE html>
    <head>
        <title>AddTests</title>
    </head>
    <body>
    <div>
        <form method="post">
        <p>
            <label>TestName</label>
            <h1><?php echo $name ?></h1>
        </p>
        <p>
            <label>Question No.</label>
            <input type="number" name="no" value=<?php echo $size+1 ?>>
        </p>
        <p>
			<label>Question</label>
			<textarea id="textarea" name="question" cols="50" rows="10">
            </textarea>
        </p>
        <p>
            <label>Options</label>
            <input type="text" name="option1">
            <input type="text" name="option2">
            <input type="text" name="option3">
            <input type="text" name="option4">
        </p>
        <p>
            <label>Answer</label>
            <input type="text" name="answer">
        </p>
        <p>
            <input type="submit" name="submit">
        </p>
        </form>
    </div>
     <pre>
    <?php print_r($_SESSION); ?>
    </body>
</html>