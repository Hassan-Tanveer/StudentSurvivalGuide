<?php

if (isset($_POST['add_budget'])) {

  include("connectDB.php");
  session_start();

  $budget = ($_POST['Budget']);
  $Start_Date = ($_POST['Start_Date']);
  $id = $_SESSION['id'];

  try {
    $sth=$db->prepare("INSERT INTO budget(User_ID, Budget, Start_Date)
    VALUES('$id', '$budget', '$Start_Date')");
    $sth->execute(array($id, $budget, $Start_Date));

    echo "<script type='text/javascript'>alert('Budget has been set successfully');</script>";
    // header("location: ../addExpenses.php");
    echo "<script>window.location.href='../Budget.php'</script>";
  }
  catch(PDOException $ex){
      //this catches the exception when it is thrown
      echo $ex->getMessage();
      echo $id;
  }
}
?>