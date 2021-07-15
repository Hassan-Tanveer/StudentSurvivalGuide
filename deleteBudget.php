<?php
$db = mysqli_connect("127.0.0.1", "root", "", "studentsurvivalguide"); //127.0.0.1

// DELETE BUDGET WHEN RESET BUDGET BUTTON IS PRESSED
if(isset($_GET['del'])){

  $id=$_GET['del'];
  $sql = "DELETE FROM budget WHERE BudgetID = '$id'";
  $res = mysqli_query($db, $sql);
  header('location: Budget.php');
}
?>
