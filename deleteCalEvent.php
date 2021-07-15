<?php

if(isset($_POST["EventID"]))
{
$db = mysqli_connect("127.0.0.1", "root", "", "studentsurvivalguide");
 $query = "DELETE from events WHERE EventID=:EventID";
 $statement = $db->prepare($query);
 $statement->execute(
  array(
   ':EventID' => $_POST['EventID']
  )
 );
}

?>
