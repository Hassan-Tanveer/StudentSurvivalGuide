<?php include('database/connectDB.php') ?>
<?php
//adding an event to the calendar

//makes a database connection
$db = mysqli_connect("127.0.0.1", "root", "", "studentsurvivalguide");

if(isset($_POST["Event_Name"]))
{
 $query = "INSERT INTO events (Event_Name, Start_Date, End_Date) 
 VALUES (:Event_Name, :Start_Date, :End_Date)";
 $statement = $db->prepare($query);
 $statement->execute(
  array(
   ':Event_Name' => $_POST['Event_Name'],
   ':Start_Date' => $_POST['Start_Date'],
   ':End_Date' => $_POST['End_Date']
  )
 );
 header("location: calendar.php");
}
?>