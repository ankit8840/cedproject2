<?php
require 'config.php';
$sql = "SELECT * FROM tests ";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<head>
    <title>Test Portal</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div id="nav">
        <ul>
            <li><a href="dashbord.php">Home</a></li>
            <li><a href="addtest.php">AddTest</a></li>
            <li><a href="register.php">Logout</a></li>
        </ul>
    </div>
    <div>
       <table>
           <tr>
               <td>Id</td>
               <td>Name</td>
               <td>Action</td>
           </tr>
          <?php if ($result->num_rows > 0) :?>
            <?php while ($row = $result->fetch_assoc()) :?>
                <tr>
                    <td><?php echo $row['test_id']?></td>
                    <td><?php echo $row['test_name']?></td>
                    <td><a href="viewtest.php?id=<?php echo $row['test_id'] ?>" style="color:black">view</a></td>
                </tr>
            <?php endwhile; ?>
            <?php endif; ?>
       </table>
    </div>
</body>
</html>