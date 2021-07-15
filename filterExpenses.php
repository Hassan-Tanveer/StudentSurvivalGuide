<?php 
// include('database/connectDB.php');
$db = mysqli_connect("127.0.0.1", "root", "", "studentsurvivalguide");

if(isset($_POST['action'])){
    $sql = "SELECT * FROM expenses WHERE Category !=''";

    if(isset($_POST['category'])){
        $category = implode("','", $_POST['category']);
        $sql .= "AND Category IN('".$category."')";  
    }
    
    $result = $db->query($sql);
    $output = '';

    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){?>
            <?php
            $output .= 
            '
            <tr> 
            // <td>'.$row['ExpenseName'].'</td>
            <td>'.$row['Category'].'</td>
            // <td>'.$row['Expense_Date'].'</td>
            // <td>'."£".''.$row['Amount_Spent'].'</td>
            // <td style="text-align: center"><button class="btn btn-success shadow" type="button" name="edit" style="width: 100px">
            // <a class="btn-edit" name="edit" style="color: white" href="editExpense.php?edit=$data[ExpenseID]">
            // <i class="fas fa-edit fa-lg"></i>
            // Edit
            // </button>
            // </a>
            
            // <br/>
      
            // <button class="mt-2 btn btn-danger btn-del shadow" type="button" name="Delete" style="width: 100px">
            // <a class=Wbtn-del ajax_delete" name="Delete" style="color: white" href="deleteExpense.php?del=$data[ExpenseID]">
            // <i class="fas fa-trash fa-lg"></i>
            // Delete
            // </button>
            // </a>
            // </td>
            </tr>'; 
        }
    }
    else{
        $output = "<h3>No Results Found!</h3>";
    }
    echo $output;
}
?>