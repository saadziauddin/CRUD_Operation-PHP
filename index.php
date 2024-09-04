<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD Practice</title>
</head>
<body>
  
<?php
include "connection.php";
$data = mysqli_query($connect, 'SELECT * FROM user');
?>

<center><h3>Table with Database</h3>
<table border="1" width="60%" style="text-align: center;">
  <th>Name</th>
  <th>Email</th>
  <th>Password</th>
  <th>Status</th>
  <th>Salary</th>
  <th>Date</th>
  <th>Buttons</th>
<?php
while($fetchdata = mysqli_fetch_assoc($data)){
?>

<tr>
  <td><?php echo $fetchdata['Name']; ?></td>
  <td><?php echo $fetchdata['Email']; ?></td>
  <td><?php echo $fetchdata['Password']; ?></td>
  <td><?php echo $fetchdata['Status']; ?></td>
  <td><?php echo $fetchdata['Salary']; ?></td>
  <td><?php echo $fetchdata['Date']; ?></td>
  <td>
    <a href="?update_id=<?php echo $fetchdata['ID'] ?>">Update</a>
    <a href="coding.php?delete_id=<?php echo $fetchdata['ID'] ?>">Delete</a>
  </td>
</tr>
<?php } ?>
</table>


<?php
if (isset($_GET['update_id'])) {
  include "connection.php";
  $update = $_GET['update_id'];
  $data = mysqli_query($connect, "SELECT * FROM user WHERE ID = '$update' ");
  $fetchdata = mysqli_fetch_assoc($data);
?>

<center><h3>Update Form</h3>
<form method="POST">
  <input type="hidden" name="id" value="<?php echo $fetchdata['ID'] ?>"><br>
  <input type="text" name="name" value="<?php echo $fetchdata['Name'] ?>"><br>
  <input type="email" name="email" value="<?php echo $fetchdata['Email'] ?>"><br>
  <input type="password" name="password" value="<?php echo $fetchdata['Password'] ?>"><br>
  <input type="text" name="status" value="<?php echo $fetchdata['Status'] ?>"><br>
  <input type="text" name="salary" value="<?php echo $fetchdata['Salary'] ?>"><br>
  <input type="date" name="date" value="<?php echo $fetchdata['Date'] ?>"><br>
  <input type="submit" name="update" value="Update Data">
</form></center>
<?php } ?>

<?php

if (isset($_POST['update'])) {
  include "connection.php";
  $id = $_POST['id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $status = $_POST['status'];
  $salary = $_POST['salary'];
  $date = $_POST['date'];

  mysqli_query($connect, " UPDATE user SET Name='$name', Email='$email', Password='$password', Status='$status', Salary='$salary', Date='$date' WHERE ID='$id' ");

  header('location:index.php');
}

?>



<h3>Insert Data</h3>
<form method="POST">
  <input type="text" name="name" placeholder="Enter Your Name"><br>
  <input type="email" name="email" placeholder="abc@gmail.com"><br>
  <input type="password" name="password" placeholder="******"><br>
  <input type="text" name="status" placeholder="Enter Your Status"><br>
  <input type="text" name="salary" placeholder="Enter Your Salary"><br>
  <input type="date" name="date" ><br>
  <input type="submit" name="insert" value="Insert New Data">
</form></center>

<?php

if (isset($_POST['insert'])) {
  include "connection.php";
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $status = $_POST['status'];
  $salary = $_POST['salary'];
  $date = $_POST['date'];
  mysqli_query($connect, "INSERT INTO user(Name,Email,Password,Status,Salary,Date) 
                          VALUES('$name','$email','$password','$status','$salary','$date')");
  header('location:index.php');
}

?>

</body>
</html>