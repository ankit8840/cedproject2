<?php
require('config.php');
$id=$_GET['id'];
$no=1;
$sql = "SELECT * FROM questions where test_id=$id";
    $result = $conn->query($sql);
    
    
$pg=1;
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
        <form method="POST">
            <table>
            <?php   if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td>Question:<?php echo $no ?> <?php echo $row['ques'] ?></td>
                </tr>
                <tr>
                    <td>1. <input type="radio" name="ans22" <?php if (isset($opt1) && $opt1== $row['opt1']) echo "checked";?>
                            value=<?php echo $row['opt1'] ?>><?php echo $row['opt1'] ?></td></tr>
                 <tr><td>2. <input type="radio" name="ans1" <?php if (isset($opt1) && $opt1== $row['opt2']) echo "checked";?>
                            value=<?php echo $row['opt2'] ?>><?php echo $row['opt2'] ?></td></tr>
                    <tr><td>3.<input type="radio" name="ans1" <?php if (isset($opt1) && $opt1== $row['opt3']) echo "checked";?>
                            value=<?php echo $row['opt3'] ?>><?php echo $row['opt3'] ?></td></tr>
                  <tr>  <td>4. <input type="radio" name="ans1" <?php if (isset($opt1) && $opt1== $row['opt4']) echo "checked";?>
                            value=<?php echo $row['opt4'] ?>><?php echo $row['opt4'] ?></td>
                </tr>
                <?php $no=$no+1; ?>
                    <?php endwhile; ?>
            <?php endif;?>
            </table>
            <input type="submit" name="submit" value="submit">
            <input type="submit" name="submit" value="pre">
            <?php $pg=$pg+1; ?>
        </form>
            <a href="#" data-id=<?php echo $pg ?> class="next">next</a>
           
    </div>
    
</body>
</html>