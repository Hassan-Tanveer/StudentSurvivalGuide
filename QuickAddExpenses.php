<!-- <link type="text/css" href="css/addExpenseCSS.css" rel="stylesheet" /> -->

<!-- <div class="jumbotron"> -->

<!-- Button trigger modal -->
<button type="button" class="btn dashboardLink" style="margin-bottom:0px" data-toggle="modal" data-target="#addExpenses">
<i class="fas fa-coins fa-2x mr-3"></i>Add Expenses
</button>

<!-- Modal -->
<div class="modal fade" id="addExpenses" tabindex="-1" role="dialog" aria-labelledby="AddExpensesLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="AddExpensesLabel">Add Expenses</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!-- ADD EXPENSE FORM -->
      <form id="addExpenseForm" action="database/expenseServer.php" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input class="form-control" type="text" name="ExpenseName" placeholder="Expense Name" required />
          </div>
          <div class="form-group">
            <select class="form-control" name="Category" required>
              <option value="">Select a category</option>
              <option>Transport</option>
              <option>Food & Drinks</option>
              <option>Entertainment</option>
              <option>Restaurants</option>
              <option>Shopping</option>
              <option>Housing</option>
              <option>Other</option>
            </select>
          </div>
          <div class="form-group">
            <input class="form-control" type="date" name="Expense_Date" required />
          </div>
          <div class="form-group">
            <input class="form-control" type="number" step="any" min="0.00" name="Amount_Spent"
              placeholder="Amount Spent" required />
          </div>
      </form>

      <div class="modal-footer">
        <!-- Submit , Close and Reset button -->
        <button type="button" class="btn btn-secondary shadow" data-dismiss="modal">
          <i class="fas fa-window-close mr-1"></i>
          Close
        </button>
        <button style="background-color:red; color:white;" type="reset" class="btn shadow" name="reset">
          <i class="fas fa-undo mr-1"></i>
          Reset
        </button>
        <button type="submit" class="btn btn-primary shadow" name="add_expense"
          style="background-color: #0cb726; border-color: #0cb726">
          <i class="fas fa-plus-circle mr-1"></i>
          Add Expense
        </button>
      </div>
      </form>
    </div>
  </div>
</div>
  </div>