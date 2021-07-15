<?php session_start(); ?>
<?php include('includes/nav-dashboard.php');?>
<?php include('database/expenseServer.php');?>

<!-- form input to add an expense -->

<body>
  <br />
  <h1 style="text-align: center"><i class="fas fa-coins fa-lg mr-3"></i>Add Expenses</h1>
  <br />
  <div class="container bg-light shadow">
    <form id="addExpenseForm" action="database/expenseServer.php" method="post">
      <!-- Form input to add an expense -->
      <div class="form-input">
        <input type="text" name="ExpenseName" placeholder="Expense Name" required />
        <br />
        <select name="Category" required>
          <option value="">Select a category</option>
          <option>Transport</option>
          <option>Food & Drinks</option>
          <option>Entertainment</option>
          <option>Restaurants</option>
          <option>Shopping</option>
          <option>Housing</option>
          <option>Other</option>
        </select>
        <br />
        <input type="date" name="Expense_Date" required />
        <br />
        <input type="number" step="any" min="0.00" name="Amount_Spent" placeholder="Amount Spent" required />
        <br />

        <!-- Submit and Reset button -->
        <br />

        
        <button style="margin:10px" onclick="success_alert()" type="submit" id="submit" class="btn btn-primary shadow"
        name="add_expense">
        <i class="fas fa-plus-circle fa-lg mr-2"></i>
          Add Expense
        </button>
        <button style="margin:10px; width: 160px" type="reset" class="btn shadow" name="reset">
        <i class="fas fa-undo fa-lg mr-2"></i>
        Reset
      </button>
        <br />
        <br />
        <br />
      </div>
    </form>
  </div>
</body>
<!-- Script for: Success alert for adding an expense -->
<!-- <script>
  $('#button').click(function success_alert(){  
  swal({
    title: "Success!",
    text: "Expense Added!",
    icon: "success",
    button: "Ok!",
    timer: "3000",
  });
})
  </script> -->