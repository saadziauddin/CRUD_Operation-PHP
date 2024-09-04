<?php 
if(isset($_GET['delete_id'])){
  include "connection.php";
  $delete = $_GET['delete_id'];
  mysqli_query($connect, "DELETE FROM user WHERE ID = '$delete'");
  echo "<script>
        alert ('Permenantly Data Deleted')
        </script>";
  header('location:index.php');
}
?>
