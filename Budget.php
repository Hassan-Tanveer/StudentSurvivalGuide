<?php session_start(); ?>
<?php include('includes/nav-dashboard.php');?>
<?php include('database/budgetServer.php');?>

<?php $db = mysqli_connect("127.0.0.1", "root", "", "studentsurvivalguide"); //127.0.0.1
echo $db->connect_error;?>



<br />
<h1 style="text-align: center"><i class="fas fa-piggy-bank fa-lg mr-3"></i>Budget</h1>
<hr style="width: 1150px">

<!--  BUDGET CARDS-->
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="market-updates">
                <div class="col-md-auto market-update-gd">
                    <div class="market-update-block clr-block-1">
                        <div class="col-md-auto  market-update-right">
                            <i class="fas fa-wallet fa-3x" style="color: white" aria-hidden="true"></i>
                        </div>
                        <div class="col-md-auto market-update-left">
                            <h4>Set Budget</h4>

                            <!-- query for budget balance (total budget - total amount spent) -->
                            <?php
                            $viewID = $_SESSION['id'];
                            
                            // Query 1 - CALCULATION: Get total amount spent from user's expenses 
                            $query1 = "SELECT SUM(Amount_Spent) as totalAmSpent FROM expenses WHERE User_ID ='$viewID'";
                            $result = $db->query($query1);
                            while($row = $result->fetch_assoc()) {
                                $totalSpent = $row['totalAmSpent'];
                                // $Amount = $row['Amount_Spent'];
                                // echo $row['SUM(Amount_Spent)'];
                            }
                            
                            // Query 2 - CALCULATION: Get the user's set budget
                            $query2 = "SELECT Budget as setBudget FROM budget WHERE User_ID='$viewID'";
                            $result2 = $db->query($query2);
                            $budget ="";
                            $budget_balance ="";
                            while($row = $result2->fetch_assoc()) {
                                $budget .= $row['setBudget'];
                                // echo $row['Budget'];
                                // echo $budget_balance = $row['Budget'] - $row['SUM(Amount_Spent)'];
                                if(isset($totalSpent, $budget)){
                                    $budget_balance .= $budget - $totalSpent;
                                    // echo '<strong>Total Remaining Budget: </strong>'. + $budget_balance;
                                }
                                else{
                                    // $budget = "";
                                    // $totalSpent = "";
                                    // $budget_balance =""; 
                                    // echo "Budget not set!!!";
                                }
                            }
                            ?>
                            <?php
                            if($budget > "0" && $budget != NULL){?>
                            <h3><?="£".$budget?></h3>
                            <?php }  
                            else{ ?>
                            <h3><?php echo "Budget Not Set!"?></h3>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="market-updates">
                <div class="col-md-auto market-update-gd">
                    <div class="market-update-block clr-block-2">
                        <div class="col-md-auto market-update-right">
                            <i class="fas fa-shopping-cart fa-3x" style="color: white"></i>
                        </div>
                        <div class="col-md-auto market-update-left">
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
        </div>
    </div>
</div>

<!-- BUDGET FORM -->
<div class="container">
    <div class="jumbotron bg-dark shadow">
        <h4 style="text-align: center; color: white">Set Your Budget</h4>
        <p style="color:white; text-align:center">Setting a budget can help you manage your finances better.</p>
        <form id="addBudgetForm" action="database/budgetServer.php" method="post">
            <div class="form-input">
                <input style="padding:5px; margin:4px;" type="number" step="any" min="0.00" name="Budget"
                    placeholder="Budget" required />
                <input style="padding:5px" type="date" name="Start_Date" required />
                <br />
                <button style="padding:10px; margin:10px; width:150px" type="submit" class="btn btn-primary shadow"
                    name="add_budget">
                    <i class="fas fa-plus-circle fa-lg mr-2"></i>
                    Add Budget
                </button>
                <?php 
                $query3 = "SELECT * FROM budget WHERE User_ID='$viewID'";
                $result3 = $db->query($query3);
                while($data3 = mysqli_fetch_array($result3)){
                    // $getBudgetID = $data3['BudgetID'];

                    echo 
                    "
                    <a class='btn ajax_deleteBudget' style='text-decoration: none; color:white' href='deleteBudget.php?del=$data3[BudgetID]'>
                    <button style='padding:10px; margin:5px; width:150px' class='mt-2 btn shadow ajax_deleteBudget' type='reset' name='del'>
                    <i class='fas fa-undo fa-lg mr-2'></i>
                    Clear Budget
                    </button>
                    </a>";

                }?>
                <!-- 
                <button style="padding:10px; margin:5px; width:150px" type="reset" class="btn shadow ajax_deleteBudget"
                    name="reset_budget">
                    <?php '<a href="deleteBudget.php?del='.$data3['BudgetID'].'">' ?>
                    <i class="fas fa-undo fa-lg mr-2"></i>
                    Reset Budget
                    </a> -->
                </button>
            </div>
        </form>
    </div>
</div>


<!-- Script: ALERT POP-UP for Deleting an expense -->
<script>
    $('.ajax_deleteBudget').on('click', function (e) {
        e.preventDefault();
        const href = $(this).attr('href')
        swal({
                title: "Are you sure?",
                text: "Once reset, your set budget will be deleted!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                closeModal: false,
            })
            .then((willDelete) => {
                if (willDelete) {
                    document.location.href = href;
                    swal("Your budget has been deleted!", {
                        icon: "success",
                        timer: "4000",
                    });
                } else {
                    swal("Your budget is safe!", {
                        title: "Cancelled Deletion",
                        icon: "info",
                    });
                }
            });
    })
</script>