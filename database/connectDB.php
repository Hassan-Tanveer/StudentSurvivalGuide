<!-- Connects to the database -->
<?php
$host='127.0.0.1';
$username='root';
$password='';
$dbname='studentsurvivalguide';

try{
  $db = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // Adding an Event
}catch (PDOException $e){
  echo "Connection to Database Failed.";
}
?>
