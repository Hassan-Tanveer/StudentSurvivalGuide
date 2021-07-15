<!-- This server handles the 'Add Expense' page interaction -->
<?php
if (isset($_POST['add_expense'])) {

  include("connectDB.php");
  session_start();

  $ExpenseName = ($_POST['ExpenseName']);
  $Category = ($_POST['Category']);
  $Expense_Date = ($_POST['Expense_Date']);
  $Amount_Spent = ($_POST['Amount_Spent']);
  $id = $_SESSION['id'];

  try{
    // Uses the form data to insert(add) a record into mySQL database
    $sth=$db->prepare("INSERT INTO expenses(User_ID, ExpenseName, Category, Expense_Date, 
    Amount_Spent)
      VALUES ('$id','$ExpenseName', '$Category', '$Expense_Date', 
      '$Amount_Spent')");
        $sth->execute(array($id, $ExpenseName, $Category, $Expense_Date, $Amount_Spent));
        
        echo "<script type='text/javascript'>alert('Expense has been added');</script>";
        // header("location: ../addExpenses.php");
        echo "<script>window.location.href='../manageExpenses.php'</script>";

        //   echo '<div class="alert alert-success alert-dismissible fade in">
        //   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        //   <strong>Success!</strong>
        // </div>';

      } catch (PDOException $ex){
        //this catches the exception when it is thrown
        echo $ex->getMessage();
        echo $id;
      }
    }

    ?>