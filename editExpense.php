<!-- Allows the user to edit their expenses -->
<?php session_start();
ob_start();?>
<?php include('includes/nav-dashboard.php')?>
<?php
include("database/connectDB.php");
$UID = $_GET['edit'];
if(isset($_GET['edit'])){
  $sqlstr = "SELECT * FROM expenses WHERE ExpenseID = '$UID'";
  $rows=$db->query($sqlstr);

  //loop through all the returned expense and display them in a table
  try{
    foreach ($rows as $row) {

      $ExpenseName = $row['ExpenseName'];
      $Category = $row['Category'];
      $Expense_Date = $row['Expense_Date'];
      $AmountSpent = $row['Amount_Spent'];
    }

  } catch (PDOException $ex){
    //this catches the exception when the query is thrown
    echo "A database error has occurred when querying the record(s). Please try again.<br> ";
    echo "Error details:". $ex->getMessage();
  }
  ?>

<style>
  .btn-cancel{
    background-color: red;
    color: white;
  }
  .btn-cancel:hover {
    background-color: grey;
  }
</style>

  <br />
  <h1 style="text-align: center"><i class="fas fa-coins fa-lg mr-3"></i>Edit Your Expense</h1>
  <br/>
<!-- The details for expense to be edited
  are put in this form and displayed -->
  <div class="container bg-light shadow">
<form action="" method="post">
  <div class="form-input">

    <input type="hidden" name="ExpenseID" value="<?php echo $UID['Event_ID'];?>" />

    <label>Name</label>
    <input type="text" name="ExpenseName" value="<?php echo $ExpenseName; ?>" /><br>

    <label>Category</label>
    <!-- <input type="text" name="Category" value="<?php echo $Category; ?>" /> -->

    <!-- Retrieves (user chosen) dropdown value from database -->
    <?php $valueFromDB = $Category;?>
    <select name="Category" required>
      <?php
      $arr = array("Transport", "Food & Drinks", "Entertainment", "Restaurants", "Shopping", "Housing", "Other");
      foreach ($arr as $value) {
        $selected = $value == $valueFromDB ? "selected" : "";?>
      <option <?php echo $selected; ?>><?php echo $value; ?></option>
      <?php
      }
      ?>
    </select>

    <br />

    <label>Date</label>
    <input type="date" name="Expense_Date" value="<?php echo $Expense_Date?>" required /><br>

    <label>Amount Spent</label>
    <input type="number" name="Amount_Spent" value="<?php echo $AmountSpent; ?>" required /><br>

      <button style="padding:10px; margin:10px; width:170px" type="submit" class="btn shadow" name="update" value="Update">
        <i class="fas fa-check-circle fa-lg mr-2"></i>  
        Update Expense
      </button>
      
      <button type="reset" style="padding:10px; margin:10px; width:170px" class="btn btn-danger btn-cancel shadow ajax_cancel" name="cancel" value="Cancel">
        <i class="fas fa-times-circle fa-lg mr-2"></i>  
        Cancel
      </button>
      <br/>
      <br/>

    <!-- <input type="submit" name="update" value="Update" /> -->
  </div>
</form>
</div>

<?php
}
?>

<?php
//When the details for an expense have been changed
//The 'update' button will update the event and
//Save the changes in the database.
if(isset($_POST['update'])){

  $ExpenseName = $_POST["ExpenseName"];
  $Category = $_POST["Category"];
  $Expense_Date = $_POST["Expense_Date"];
  $AmountSpent = $_POST["Amount_Spent"];

  $viewID = $_SESSION['id'];

  $query1="UPDATE expenses
  SET ExpenseName ='$ExpenseName', Category = '$Category', Expense_Date = '$Expense_Date', Amount_Spent = '$AmountSpent'
  WHERE ExpenseID ='$UID'";

$rows=$db->query($query1);
echo "<script type='text/javascript'>alert('Expense has been updated');</script>";
echo "<script>window.location.href='manageExpenses.php'</script>";
  // header("location: manageExpenses.php");
}
?>

<!-- Script: ALERT POP-UP for Cancelling an expense -->
<script>
  $('.ajax_cancel').on('click', function (e) {
        e.preventDefault();
        const href = $(this).attr('href')
        swal({
            title: "Are you sure?",
            text: "Any changes you have made will be discarded.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            closeModal: false,
          })
          .then((willCancel) => {
              if (willCancel) {
                swal("Updated Cancelled!", {
                  icon: "success",
                  timer: "4000",
                });
                document.location.href = "manageExpenses.php";
                }
              });
          })
</script>