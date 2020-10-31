<?php
require('config.php');
$id=$_GET['id'];

$sql = "SELECT * FROM questions where test_id=$id";
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
            <li><a href="register.php">Logout</a></li>
        </ul>
    </div>
    <div>
        <table>
        <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['ques'] ?></td>
            </tr>
            <tr>
                <td><?php echo $row['opt1'] ?></td>
                <td><?php echo $row['opt2'] ?></td>
                <td><?php echo $row['opt3'] ?></td>
                <td><?php echo $row['opt4'] ?></td>
            </tr>
            <tr>
            <td><?php echo $row['ans'] ?></td>
            </tr>
            <?php endwhile; ?>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>