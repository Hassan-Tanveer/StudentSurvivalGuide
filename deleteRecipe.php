<!-- Only accessible to logged in users
to delete their recipes -->
<?php
$db = mysqli_connect("127.0.0.1", "root", "", "studentsurvivalguide"); //127.0.0.1
//include("database/connectDB.php");

if(isset($_GET['del'])){

  $id=$_GET['del'];
  $sql = "DELETE FROM recipes WHERE RecipeID = '$id'";
  $res = mysqli_query($db, $sql);
  header('location: viewYourRecipes.php');
}
?>
