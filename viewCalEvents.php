<?php include('database/connectDB.php') ?>
<?php

//makes database connection
$db = mysqli_connect("127.0.0.1", "root", "", "studentsurvivalguide");
//storing data in an array
$data = array();
//storing the session ID of a user in a variable
$viewID = $_SESSION['id'];
$query = "SELECT * FROM events ORDER BY EventID WHERE User_ID='$viewID'";

$statement = $db->prepare($query);
$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
    $data[] = array(
        'EventID'   => $row["EventID"],
        'Event_Name'   => $row["Event_Name"],
        'Start_Date'   => $row["Start_Date"],
        'End_Date'   => $row["End_Date"]
    );

}

echo json_encode($data);

?>