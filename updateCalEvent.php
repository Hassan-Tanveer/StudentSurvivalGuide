<?php

//makes a database connection
$db = mysqli_connect("127.0.0.1", "root", "", "studentsurvivalguide");

if(isset($_POST["Event_ID"]))
{
 $query = "UPDATE events SET Event_Name=:Event_Name, Start_Date=:Start_Date, End_Date=:End_Date 
 WHERE Event_ID=:Event_ID
 ";
 $statement = $db->prepare($query);
 $statement->execute(
  array(
   ':Event_Name'  => $_POST['Event_Name'],
   ':Start_Date' => $_POST['Start_Date'],
   ':End_Date' => $_POST['End_Date'],
   ':Event_ID'   => $_POST['Event_ID']
  )
 );
}

?>