<?php
/**
 * MyClass File Doc Comment
 * php version 7.2.10
 *
 * @category MyClass
 * @package  MyPackage
 * @author   My Name <my.name@example.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 */
require 'config.php';
$message='';
$sucess='';
$errors =array();
if (isset($_POST['submit'])) {
    $username= isset($_POST['username'])?$_POST['username']:'';
    if (!preg_match("/^[a-zA-Z-' ]*$/", $username)) {
        $errors[]=array('input'=>'form','msg'=>'username must contains alphabets') ;
        
    }
    $password= isset($_POST['password'])?$_POST['password']:'';
    $password2= isset($_POST['password2'])?$_POST['password2']:'';
    $email= isset($_POST['email'])?$_POST['email']:'';
    if ($password!=$password2) {
        $errors[] = array('input'=>'password','msg'=>'password not match');
    }
    if (sizeof($errors)==0) {
        $sql = "INSERT INTO userdata(`User_Name`, `Password`, `Email`)
        VALUES ('".$username."', '".$password."', '".$email."')";

        if ($conn->query($sql) === true) {
            $sucess.= "Registration Sucessfull";
        } else {
            $errors[] = array('input'=>'form','msg'=>$conn->error);
        }
    }
    if (sizeof($errors)>0) {
        foreach ($errors as $key => $result) {
            $message.="error :".$result['msg'];

        }
    }
}
    $conn->close();

?>

<!DOCTYPE html>
<html>
<head>
   <title>
      Register
   </title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
    <div id="wrapper">
        <div id="signup-form">
            <h2>Sign Up</h2>
            <h2><?php echo $sucess  ?></h2>
            <form action="Register.php" method="POST">
                <p>
                    <label for="username">Username: 
                        <input type="text" name="username" required>
                    </label>
                </p>
                <p>
                    <label for="password">Password: 
                        <input type="password" name="password" required>
                    </label>
                </p>
                <p>
                    <label for="password2">Re-Password: 
                        <input type="password" name="password2" required>
                    </label>
                </p>
                <p>
                    <label for="email">Email: 
                        <input type="email" name="email" required>
                    </label>
                </p>
                <p class="submit">
                     <input type="submit" name="submit" value="Submit">
                </p>
                <p class="login">
                    Already Registered?<a href="login.php">Login Here</a>
                </p>
            </form>
        </div>
        <div class="error">
                <?php echo $message ?>
        </div>
    </div>
</body>
</html>