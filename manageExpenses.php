<?php session_start();
$viewID = $_SESSION['id'];
?>
<?php include('includes/nav-dashboard.php');?>
<?php include('database/expenseServer.php');?>
<?php $db = mysqli_connect("127.0.0.1", "root", "", "studentsurvivalguide"); //127.0.0.1 ?>
<!-- <link type="text/css" href="css/manageExp.css" rel="stylesheet" /> -->

<!-- Search button style -->
<style>
  #searchExp {
    background-position: 10px 12px;
    /* Position the search icon */
    background-repeat: no-repeat;
    /* Do not repeat the icon image */
    width: 100%;
    /* Full-width */
    font-size: 16px;
    /* Increase font-size */
    padding: 12px 20px 12px 40px;
    /* Add some padding */
    border: 1px solid #ddd;
    /* Add a grey border */
    margin-bottom: 12px;
    /* Add some space below the input */
  }

  .btn-filter {
    background-color: #732791;
    color: white;
    width: 165px;
    margin-bottom: 5px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }

  .btn-filter:active {
    background-color: black;
    color: white;
  }

  .active {
    background-color: black;
    color: white;

  }

  #filterBtn {
    background-color: #732791;
    color: white;
    font-weight: bold
  }

  #filterBtn:hover,
  .btn-filter:hover {

    background-color: white;
    color: black;
    border: 1px solid #732791;
  }

  .empty {
    font-family: sans-serif;
    font-size: 16px;
    text-align: center;
    color: grey;
  }
</style>

<br />

<?php
          // if(isset($_POST['Show All'])){
            //     $query = "SELECT * FROM expenses WHERE User_ID = '$viewID'";
            //     $result = filterSelection($query);
            // }
            if (isset($_POST['Transport']))
            {
              $query = "SELECT * FROM expenses WHERE User_ID='$viewID' AND Category='Transport' ORDER BY Expense_Date";
              $result = filterSelection($query);
            }
            elseif (isset($_POST['Food&Drinks']))
            {
              $query = "SELECT * FROM expenses WHERE User_ID='$viewID' AND Category='Food & Drinks' ORDER BY Expense_Date";
              $result = filterSelection($query);
            }
            elseif (isset($_POST['Entertainment']))
            {
              $query = "SELECT * FROM expenses WHERE User_ID='$viewID' AND Category='Entertainment' ORDER BY Expense_Date";
              $result = filterSelection($query);
            }
            elseif (isset($_POST['Restaurants']))
            {
              $query = "SELECT * FROM expenses WHERE User_ID='$viewID' AND Category='Restaurants' ORDER BY Expense_Date";
              $result = filterSelection($query);
            }
            elseif (isset($_POST['Shopping']))
            {
              $query = "SELECT * FROM expenses WHERE User_ID='$viewID' AND Category='Shopping' ORDER BY Expense_Date";
              $result = filterSelection($query);
            }
            elseif (isset($_POST['Housing']))
            {
              $query = "SELECT * FROM expenses WHERE User_ID='$viewID' AND Category='Housing' ORDER BY Expense_Date";
              $result = filterSelection($query);
            }
            elseif (isset($_POST['Other']))
            {
              $query = "SELECT * FROM expenses WHERE User_ID='$viewID' AND Category='Other' ORDER BY Expense_Date";
              $result = filterSelection($query);
            }
            else{
              $viewID = $_SESSION['id'];
              $query = "SELECT * FROM expenses WHERE User_ID = '$viewID' ORDER BY Expense_Date";
              $result = filterSelection($query);
            }
            //Function to handle the sorting and filtering above
            function filterSelection($query){
              $db = mysqli_connect("127.0.0.1", "root", "", "studentsurvivalguide");
              $result = mysqli_query($db, $query);
              return $result;
            }
            ?>
<!-- END OF CATEGORIES FILTER -->


<h1 style="text-align: center"><i class="fas fa-file-invoice-dollar fa-lg mr-3"></i>Manage Expenses</h1>
<br />
<div class="container">
  <div class="row">
    <div class="col-sm-3">
      <!-- START OF: Collapsible Filter Box -->
      <p>
        <i class="fas fa-filter fa-lg mr-2"></i>
        <button id="filterBtn" class="btn shadow-sm" type="button" data-toggle="collapse"
          data-target="#collapseExpFilter" aria-expanded="false" aria-controls="collapseExample">
          Filter
        </button>
      </p>
    </div>

    <!-- SEARCH BAR -->
    <i style="margin-top: 15px; margin-left: 15px" class="fas fa-search fa-lg"></i>
    <div class="col">
      <input type="text" id="searchExp" onkeyup="searchFunction()" placeholder="Search for Expense Name...">
    </div>
  </div>


  <!-- START OF FILTER: CATEGORIES -->

  <!-- When Filter button is pressed, filter menu opens
                displaying the filter options -->
  <div class="collapse" id="collapseExpFilter">
    <form action="" method="post">
      <div class="card card-body bg-light">
        <div class="row" id="filter_result">
          <div class="col-md-3 mr-5">
            <div class="list-group">
              <h3 class="mt-3"><i class="mr-3 fas fa-th-list fa-sm">
                </i>Category
              </h3>
              <br />

              <!-- FILTER BUTTONS -->
              <div id="FilterBtnDiv">
                <button class="btn btn-filter active" name="Show All"> Show All Expenses</button>
                <button class="btn btn-filter" name="Transport">Transport</button>
                <button class="btn btn-filter" name="Food&Drinks">Food & Drinks</button>
                <button class="btn btn-filter" name="Entertainment">Entertainment</button>
                <button class="btn btn-filter" name="Restaurants">Restaurants</button>
                <button class="btn btn-filter" name="Shopping">Shopping</button>
                <button class="btn btn-filter" name="Housing">Housing</button>
                <button class="btn btn-filter" name="Other">Other</button>
              </div>

            </div>
          </div>

          <!-- FILTER: DATE RANGE -->

          <div class="col-md-4">
            <div class="list-group">
              <h3 class="mt-3"><i class="mr-3 fas fa-calendar-alt fa-sm"></i>Date From & To</h3>
              <br />
              <label><strong>From Date:</strong></label>
              <input type="date" name="fromExpenseDate">
              <br />
              <label><strong>To Date:</strong></label>
              <input type="date" name="toExpenseDate">
              <br />
              <button style="margin-bottom: 25px" class="btn btn-success shadow"
                name="searchExpDate" type="submit">
                <i class="fas fa-search mr-2"></i>
                Search Expense Date
              </button>
              <button class="btn btn-danger shadow" name="reset" type="reset">
                <i class="fas fa-undo mr-2"></i>
                Clear Filters
              </button>
            </div>
          </div>

          <!-- FILTER RECORDS BETWEEN TWO DATES  -->
          <?php
          if (isset($_POST['searchExpDate']))
          {
            $fromExpDate = $_POST['fromExpenseDate'];
            $toExpDate = $_POST['toExpenseDate'];
            // $viewID = $_SESSION['id'];
            $query = "SELECT * FROM expenses WHERE User_ID='$viewID' AND Expense_Date BETWEEN '$fromExpDate' AND '$toExpDate' ORDER BY Expense_Date";
            $result = filterDates($query);
          }
          // else {
          //   // $viewID = $_SESSION['id'];
          //   $query = "SELECT * FROM expenses WHERE User_ID = '$viewID' ORDER BY Expense_Date";
          //   $result = filterDates($query);
          // }
          
          //Function to handle filtering BETWEEN TWO DATES
          function filterDates($query){
            $db = mysqli_connect("127.0.0.1", "root", "", "studentsurvivalguide");
            $result = mysqli_query($db, $query);
            return $result;
            
          }
          ?>

          <!-- END OF DATE RANGE FILTER -->


          <!-- FILTER: AMOUNT SPENT -->

          <div class="col ml-4">
            <div class="list-group">
              <h3 class="mt-3"><i class="mr-3 fas fa-funnel-dollar fa-sm">
                </i>Amount Spent
              </h3>
              <br />
              <label><strong>Min. Amount Spent:</strong></label>
              <input type="number" name="startPrice" placeholder="Min. Amount Spent">
              <br />
              <label><strong>Max. Amount Spent:</strong></label>
              <input type="number" name="endPrice" placeholder="Max. Amount Spent">
              <br />
              <button style="margin-bottom: 25px" class="btn btn-success shadow"
                name="searchAmSpentDate" type="submit">
                <i class="fas fa-search mr-2"></i>
                Search Amount Spent Range
              </button>
            </div>
          </div>

          <!-- FILTER RECORDS BETWEEN AMOUNT SPENT RANGE -->
          <?php
          if (isset($_POST['searchAmSpentDate']))
          {
            $minAmount = $_POST['startPrice'];
            $maxAmount = $_POST['endPrice'];
            $query = "SELECT * FROM expenses WHERE User_ID='$viewID' AND Amount_Spent BETWEEN '$minAmount' AND '$maxAmount' ORDER BY Expense_Date";
            $result = filterAmountSpent($query);
          }
          // else {
          //   // $viewID = $_SESSION['id'];
          //   $query = "SELECT * FROM expenses WHERE User_ID = '$viewID' ORDER BY Expense_Date";
          //   $result = filterAmountSpent($query);
          // }
          
          //Function to handle filtering BETWEEN AMOUNT SPENT RANGE
          function filterAmountSpent($query){
            $db = mysqli_connect("127.0.0.1", "root", "", "studentsurvivalguide");
            $result = mysqli_query($db, $query);
            return $result;
          }
          ?>

          <!-- END OF AMOUNT SPENT FILTER -->

        </div>
      </div>
    </form>
  </div>
</div>
<br />

<div class="container">
  <div class="table-responsive col-xl-12">

    <form action="manageExpenses.php" method="post">
      <table id="ExpensesTable" class="table table-hover table-bordered shadow">
        <thead style="text-align: center; background-color: #591773; color: white">
          <tr>
            <th style="cursor: pointer" onclick="sortTable(0)" data-toggle="tooltip" data-placement="top"
              data-html="true"
              title="Sort Expense Name <u>Alphabetically</u> in <b>Ascending</b> and <b>Descending Order</b>"><i
                class="fas fa-sort fa-lg mr-2"></i>Expense Name</th>
            <th style="cursor: pointer" onclick="sortTable(1)" data-toggle="tooltip" data-placement="top"
              data-html="true"
              title="Sort Category <u>Alphabetically</u> in <b>Ascending</b> and <b>Descending Order</b>"><i
                class="fas fa-sort fa-lg mr-2"></i>Category</th>
            <th style="cursor: pointer" onclick="sortTable(2)" data-toggle="tooltip" data-placement="top"
              data-html="true" title="Sort Expense Date in <b>Ascending</b> and <b>Descending Order</b>"><i
                class="fas fa-sort fa-lg mr-2"></i>Expense
              Date</th>
            <th style="cursor: pointer" onclick="sortTable(3)" data-toggle="tooltip" data-placement="top"
              data-html="true" title="Sort Amount Spent in <b>Ascending</b> and <b>Descending Order</b>"><i
                class="fas fa-sort fa-lg mr-2"></i>Amount
              Spent</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>

          <?php
    $viewID = $_SESSION['id'];
    // $query = "SELECT * FROM expenses WHERE User_ID='$viewID' ORDER BY Expense_Date";
    // foreach ($db->query($query) as $data){
      while($data = mysqli_fetch_array($result)): 
      echo "<tr>";
      echo "<td>".$data['ExpenseName']."</td>";
      echo "<td>".$data['Category']."</td>";
      echo "<td>".$data['Expense_Date']."</td>";
      echo "<td>"."£".$data['Amount_Spent']."</td>";
      echo "<td style='text-align: center'>
      <a class='btn-edit' name='edit' style='color: white' href='editExpense.php?edit=$data[ExpenseID]'>
      <button class='btn btn-success shadow' type='button' name='edit' style='width: 100px'>
      <i class='fas fa-edit fa-lg'></i>
      Edit
      </a>
      </button>
      
      <br/>

      <a class='btn-del ajax_delete' name='Delete' style='color: white' href='deleteExpense.php?del=$data[ExpenseID]'>
      <button class='mt-2 btn btn-danger btn-del shadow' type='button' name='Delete' style='width: 100px'>
      <i class='fas fa-trash fa-lg'></i>
      Delete
      </a>
      </button>
      </td>";
      echo "</tr>";?>
          <!-- } -->
        </tbody>
        <?php
  endwhile;
    ?>
      </table>

      <!-- If there are no records, display a message -->
      <?php if(mysqli_num_rows($result) <= 0){ ?>
      <div class="todo-item">
        <div class="empty">
          <?php echo "You have no recorded expenses OR your filter search found no results "?>
        </div>
      </div>
      <?php } ?>

    </form>
  </div>
</div>
<br />
<br />

<!-- ENABLE ALL TOOLTIPS -->
<script>
  // Tooltips Initialization
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
</script>

<!-- Script: ALERT POP-UP for Deleting an expense -->
<script>
  $('.ajax_delete').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href')
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this expense!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        closeModal: false,
      })
      .then((willDelete) => {
        if (willDelete) {
          document.location.href = href;
          swal("Your expense has been deleted!", {
            icon: "success",
            timer: "4000",
          });
        } else {
          swal("Your expense is safe!", {
            title: "Cancelled Deletion",
            icon: "info",
          });
        }
      });
  })
</script>

<!-- Script for Sorting the table by clicking on the headers -->
<script>
  function sortTable(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("ExpensesTable");
    switching = true;
    //Set the sorting direction to ascending:
    dir = "asc";
    /*while loop will continue until
    no switching has been done:*/
    while (switching) {
      //no switching is done
      switching = false;
      rows = table.rows;
      /*Loop through all table rows (except the
      first, which contains table headers)*/
      for (i = 1; i < (rows.length - 1); i++) {
        //no switching:
        shouldSwitch = false;
        /*Get the two elements you want to compare,
        one from current row and one from the next:*/
        x = rows[i].getElementsByTagName("TD")[n];
        y = rows[i + 1].getElementsByTagName("TD")[n];
        /*check if the two rows should switch place,
        based on the direction, asc or desc:*/
        if (dir == "asc") {
          if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
            //if so, mark as a switch and break the loop:
            shouldSwitch = true;
            break;
          }
        } else if (dir == "desc") {
          if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
            //if so, mark as a switch and break the loop:
            shouldSwitch = true;
            break;
          }
        }
      }
      if (shouldSwitch) {
        /*If a switch has been marked, make the switch
        and mark that a switch has been done:*/
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
        //Each time a switch is done, increase this count by 1:
        switchcount++;
      } else {
        /*If no switching has been done AND the direction is "asc",
        set the direction to "desc" and run the while loop again.*/
        if (switchcount == 0 && dir == "asc") {
          dir = "desc";
          switching = true;
        }
      }
    }
  }
</script>

<!-- Search Your Recipes Script -->
<script>
  function searchFunction() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchExp");
    filter = input.value.toUpperCase();
    table = document.getElementById("ExpensesTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows
    // and hide records that don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }
</script>

<!-- Change text of filter button when clicked from "+ Filter" to "- Filter" -->
<script type="text/javascript">
  $(document).ready(function () {
    $('#filterBtn').click(function () {
      $(this).toggleClass("active");
      if ($(this).hasClass("active")) {
        $(this).text("Hide Filter");
      } else {
        $(this).text("Filter");
      }
    });
    // document ready  
  });
</script>

<!-- FILTERING AJAX/JS SCRIPT -->
<script>
  // $(document).ready(function () {

  //   $('.ExpCat').click(function () {
  //     echo "hello";
  //     var action = 'data';
  //     var category = get_filter_text('category');
  //     $.ajax({
  //       url: "filterExpenses.php",
  //       method: "POST",
  //       data: {
  //         action: action,
  //         category: category
  //       },
  //       success: function (response) {
  //         $('#filter_result').html(response);
  //       }
  //     });
  //   });


  //   function get_filter_text(text_id) {
  //     var filter = [];
  //     $('.' + text_id + ':checked').each(function () {
  //       filter.push($(this).val());
  //     });
  //     return filter;
  //   }

  // });
</script>


<!-- SCRIPT TO ADD ACTIVE CLASS TO FILTER BUTTONS -->
<script>
  // Get the container element
  var btnContainer = document.getElementById("FilterBtnDiv");

  // Get all buttons with class="btn" inside the container
  var btns = btnContainer.getElementsByClassName("btn-filter");

  // Loop through the buttons and add the active class to the current/clicked button
  for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function () {
      var current = document.getElementsByClassName("active");
      current[0].className = current[0].className.replace(" active", "");
      this.className += " active";
    });
  }
</script>