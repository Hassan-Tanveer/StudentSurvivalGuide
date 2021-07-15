<?php include('database/server.php');?>
<?php include('includes/nav-dashboard.php');?>

<!-- query for budget balance (total budget - total amount spent) -->
<?php
$viewID = $_SESSION['id'];

// Query 1
$query1 = "SELECT SUM(Amount_Spent) as totalAmSpent FROM expenses WHERE User_ID ='$viewID'";
$result = $db->query($query1);
while($row = $result->fetch_assoc()) {
    $totalSpent = $row['totalAmSpent'];
// $Amount = $row['Amount_Spent'];
// echo $row['SUM(Amount_Spent)'];
}

// Query 2
$query2 = "SELECT Budget as setBudget FROM budget WHERE User_ID='$viewID'";
$result2 = $db->query($query2);
try{

while($row = $result2->fetch_assoc()) {
    $budget = $row['setBudget'];
// echo $row['Budget'];
}
// echo $budget_balance = $row['Budget'] - $row['SUM(Amount_Spent)'];

if(isset($totalSpent, $budget)){
    $budget_balance = $budget - $totalSpent;
    // echo '<strong>Total Remaining Budget: </strong>'. + $budget_balance;
}
else{
  $budget = "";
  $totalSpent = "";
  $budget_balance =""; 
  $budget_message = "Budget not set!";
}
}
catch(Exception $e){
  echo "Budget needs to be set!";

}
?>

<style>
  .dashboardLink {
    background-color: #732791;
    color: white;
    border-radius: 12px;
    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

  }

  .dashboardLink:hover {
    background-color: black;
    color: white;
    border: 1px solid #732791;
    font-weight: bold;
    box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
  }

  .quickLinks,
  .quickLiink:visited,
  .quickLinks:link {
    text-decoration: none;
    color: white;
  }

  .quickLinks:hover {
    color: white;
  }
</style>

<div class="container">
  <br />
  <!-- Welcome message when the user has logged in -->
  <?php  if (isset($_SESSION['Email'])) : ?>
  <p>Welcome <strong><?php echo $_SESSION['Email']; ?></strong></p>
  <?php endif ?>

  <h1 style="text-align: center"><i class="material-icons fa-lg mr-2">dashboard</i>Your Dashboard</h1>
  <br />
</div>

<!-- Quick Add Buttons -->
<div class="container">
  <div class="card bg-light">
    <div class="col-md-auto card-body">
      <div class="row">




        <div class="col-sm-4 btn-group-vertical">
          <h3 class="mt-3" style="text-align: center">
          <i class="material-icons fa-lg mr-2">event</i>
            Time Management</h3>
          <br />
          <button class="btn dashboardLink" type="button">
            <a class="quickLinks" href="calendar.php">
              <i class="fas fa-calendar-check fa-2x mr-3"></i>
              View Calendar
            </a>
          </button>
          <button class="btn dashboardLink" style="margin-top:10px" type="button">
            <a class="quickLinks" href="TDList.php">
              <i class="fas fa-clipboard-list fa-2x mr-3"></i>
              To-Do List
            </a>
          </button>

        </div>
        <div class="col-sm-4 btn-group-vertical">
          <h3 class="mt-3" style="text-align: center">
            <i class="material-icons fa-lg mr-2">restaurant</i>
            Recipes</h3>
          <br />
          
          <?php include('QuickAddRecipe.php');?>

          <a class="quickLinks" href="viewYourRecipes.php">
            <button class="btn dashboardLink" style="margin-top:10px" type="button">
              <i class="fas fa-tasks fa-2x mr-3"></i>Manage Your Recipes
          </a>
          </button>
        </div>


        <div class="col-sm-4 btn-group-vertical">
          <h3 class="mt-3" style="text-align: center">
            <i class="material-icons fa-lg mr-2">monetization_on</i>
            Finances</h3>
          <br />
          <button class="btn dashboardLink" style="margin-bottom:-10px" type="button">
            <a class="quickLinks" href="Budget.php">
              <i class="fas fa-wallet fa-2x mr-3"></i>
              Manage Budget
            </a>
          </button>
          <br/>

          <?php include('QuickAddExpenses.php');?>

          <button class="btn dashboardLink" style="margin-top:10px" type="button">
            <a class="quickLinks" href="manageExpenses.php">
              <i class="fas fa-file-invoice-dollar fa-2x mr-3"></i>
              Manage Expenses
            </a>
          </button>

          <button class="btn dashboardLink" style="margin-top:10px" type="button">
            <a class="quickLinks" href="viewExpChart.php">
              <i class="fas fa-chart-pie fa-2x mr-3"></i>
              Expense Chart
            </a>
          </button>

        </div>
      </div>
    </div>
  </div>

  <!-- BUDGET BALANCE ON DASHBOARD -->

  <section id="main-content">
    <section class="wrapper">
      <div class="container">

        <!-- Budget Balance Card-->
        <div class="market-updates">
          <div class="col-md-5 market-update-gd">
            <div class="market-update-block clr-block-2">
              <div class="col-md-4 market-update-right">
                <i class="fa fa-shopping-cart"></i>
              </div>

              <div class="col-md-8 market-update-left">
                <h4>Budget Balance</h4>
                <?php if($budget_balance >= "0" && $totalSpent != NULL){ ?>
                <h3><?="£".$budget_balance?></h3>
                <?php }
              elseif($budget_balance < $budget && $totalSpent != NULL){?>
                <h3><?php echo "Over Budget: "."£".$budget_balance ?></h3>
                <?php }
              else{
                echo "<h4>No Budget Balance! <u>Set Your Budget</u> or <u>Add an Expense</u></h4>";
              }
              ?>
              </div>
            </div>
          </div>
        </div>

        <!-- <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-shopping-cart" aria-hidden="true"></i>
          </div>
          
          <div class="col-md-8 market-update-left">
					<h4>Remaining</h4>
						<h3><?=$budget_balance?> /-Month</h3>
            </div> -->
      </div>
    </section>
  </section>