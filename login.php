<?php
require 'config.php';
$errors =array();
if (isset($_POST['submit'])) {
    $username= isset($_POST['username'])?$_POST['username']:'';
    $password= isset($_POST['password'])?$_POST['password']:'';
    $sql = "SELECT * FROM userdata WHERE 
    `User_Name`='".$username."' AND `Password`='".$password." ' ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
  
        while ($row = $result->fetch_assoc()) {

            $role=$row['Role'];
        }
    }
    if($role=='ADMIN') {
        header('location:adminpanel.php');
    }
    else
     header('location:userpanel.php');
}
?>
<!DOCTYPE html>
<head>
<title>Login|Text Portal</title>
<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
<div id="wrapper">
        <div id="login-form">
          <h2>Login</h2>
            <form action="" method="POST">
                <p>
                    <label for="username">Username: 
                        <input type="text" name="username" required>
                    </label>
                </p>
                <p>
                    <label for="password">Password: 
                        <input type="text" name="password" required>
                    </label>
                </p>
                <p class="submit">
                    <input type="submit" name="submit" value="Login">
                </p>
                
            </form>
        </div>
    </div>
</body>
</html>