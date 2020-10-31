<?php
session_start();
require('config.php');
$question=array();
$size=0;
$name='';
if(isset($_POST['submit'])) {
    $name= isset($_POST['name'])?$_POST['name']:'';
        $_SESSION['name']=$name;
        $sql = "INSERT INTO tests( `test_name`)
        VALUES ('".$name."')";
        if ($conn->query($sql) === true) {
            header('location:addque.php');
        }
    }
    // foreach ($question as $key2=>$que) {
    // array_push($test,$que);
    // }
          

//session_destroy();
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
            <input type="text" name="name" value=<?php echo $name ?>>
        </p>
        <p>
            <input type="submit" name="submit" value="Add">
        </p>
        </form>
    </body>
</html>