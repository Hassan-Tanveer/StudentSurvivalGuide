<!-- Home page for the Student Survival Guide website -->
<?php
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location: dashboard.php");
}
?>
<!-- Stylesheet for navbar -->

<!-- <h1 style="text-align: center" id="logo">Student Survival Guide</h1> -->
<?php include('includes/header.php');?>
<div class="container">
  <a href="dashboard.php">
    <img src="images/logo1.png">
  </a>
</div>

<!-- Navbar for menu items -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: black" ;>
  <div id="mynav" class="container">
    <!-- <a class="navbar-brand" href="#">Student Survival Guide</a> -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" d="navbarDropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">event</i>
            Time Management
          </a>
          <div class="dropdown-menu shadow" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item mb-2 p-3" href="calendar.php"><i class="fas fa-calendar-check fa-2x mr-3"></i>Calendar</a>
            <a class="dropdown-item mb-2 p-3" href="TDList.php"><i class="fas fa-clipboard-list fa-2x mr-3"></i>To-Do List</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">restaurant</i>
            Recipes
          </a>
          <div class="dropdown-menu shadow" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item mb-2 p-3" href="addRecipes.php"><i class="fas fa-pen-square fa-2x mr-3"></i>Add Recipes</a>
            <a class="dropdown-item mb-2 p-3" href="viewYourRecipes.php"><i class="fas fa-tasks fa-2x mr-3"></i>Manage Your Recipes</a>
            <a class="dropdown-item mb-2 p-3" href="sharedRecipes.php"><i class="fas fa-users fa-2x mr-3"></i>Community Recipes</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">monetization_on</i>
            Finances
          </a>
          <div class="dropdown-menu shadow" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item mb-2 p-3" href="Budget.php"><i class="fas fa-piggy-bank fa-2x mr-3"></i>Budget</a>
            <a class="dropdown-item mb-2 p-3" href="addExpenses.php"><i class="fas fa-coins fa-2x mr-3"></i>Add Expenses</a>
            <a class="dropdown-item mb-2 p-3" href="manageExpenses.php"><i class="fas fa-file-invoice-dollar fa-2x mr-3"></i>Manage Expenses</a>
            <a class="dropdown-item mb-2 p-3" href="viewExpChart.php"><i class="fas fa-chart-pie fa-2x mr-3"></i>Expense Chart</a>
          </div>
        </li>
      </ul>
      <!-- Navbar item for My Account -->
      <ul class="nav navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">account_circle</i>
            My Account
          </a>
          <div class="dropdown-menu shadow" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item mt-2 p-3" href="dashboard.php"><i class="material-icons fa-2x mr-2">dashboard</i>Dashboard</a>
            <a class="log-out dropdown-item mb-2 p-3" href="index.php?logout='1'"><i class="material-icons fa-2x mr-2">exit_to_app</i>Log
              out</a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>


<!-- Script to highlight active page link  -->
<script>
  // Add active class to the current button (highlight it)
  // $(document).ready(function() {
  // 	$('#nav a[href^="/' + location.pathname.split("/")[1] + '"]').addClass('active');
  // });

  // Get the container element
  // var btnContainer = document.getElementById("mynav");

  // // Get all list items with class="nav-item" inside the container
  // var li = btnContainer.getElementsByClassName("nav-item");

  // // Loop through the buttons and add the active class to the current/clicked button
  // for (var i = 0; i < li.length; i++) {
  //   li[i].addEventListener("click", function () {
  //     var current = document.getElementsByClassName("active");

  //     // If there's no active class
  //     if (current.length > 0) {
  //       current[0].className = current[0].className.replace(" active", "");
  //     }
  //     // Add the active class to the current/clicked button
  //     this.className += " active";
  //   });
  // }
</script>