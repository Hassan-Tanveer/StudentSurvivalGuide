<?php session_start();
ob_start();?>
<?php include('includes/nav-dashboard.php')?>
<!-- <link type="text/css" href="css/addExpenseCSS.css" rel="stylesheet" /> -->

<style>
  .btn-cancel{
    background-color: red;
    color: white;
  }
  .btn-cancel:hover {
    background-color: grey;
  }
</style>

<?php
include("database/connectDB.php");
$UID = $_GET['edit'];
if(isset($_GET['edit'])){
  $sqlstr = "SELECT * FROM recipes WHERE RecipeID = '$UID'";
  $rows=$db->query($sqlstr);

  //loop through recipe and display

  try{
      foreach($rows as $row){
          
        $RecipeTitle = $row['Title'];
        $RecipeBody = $row['Body'];
        $RecipeCategory = $row['Recipe_Category'];
        // $CookTime = $row['Cook_Time'];
        $SkillLevel = $row['Skill_Level'];
        $Post_Publicly = $row['Post_Publicly'];
      }
  } catch(PDOException $ex) {
      //this catches the exception when the query is thrown
      echo "A database error has occurred when querying the record(s). Please try again.<br> ";
      echo "Error details:". $ex->getMessage();
  }
 ?>
<!-- The recipe to be edited are put
 in this form and displayed -->
<br />
<h1 style="text-align: center"><i class="fas fa-pen-square mr-3"></i>Edit Your Recipe</h1>
<br />

<div class="container bg-light shadow">
  <form action="" method="post">
    <div class="form-input">
      <input type="hidden" name="RecipeID" value="<?php echo $UID['RecipeID'];?>">

      <label><strong>Title:</strong></label>
      <input name="Title" value="<?php echo $RecipeTitle?>">

      <br />
      <br />

      <!-- <label>Content</label> -->

      <?php 
      $RecipeBody = str_replace( '&', '&amp;', $RecipeBody);?>
      <textarea name="Body" id="Body" cols="80" row="10"><?= $RecipeBody?></textarea>
      <script>
        CKEDITOR.replace('Body');
        // ClassicEditor.create(document.getElementById('Body'));
      </script>
      <br />


      <label><strong>Recipe Category:</strong></label>
      <!-- Retrieves (user chosen) dropdown value 
 for recipe category from database -->
      <?php $valueFromDB = $RecipeCategory;?>
      <select name="Recipe_Category" required>
        <?php
      $arr = array("Carnivore", "Pescatarian", "Vegetarian", "Vegan");
      foreach ($arr as $value) {
        $selected = $value == $valueFromDB ? "selected" : "";?>
        <option <?php echo $selected; ?>><?php echo $value; ?></option>
        <?php
      }
      ?>
      </select>

      <br />
      <br />

      <!-- <label><strong>Cook Time:</strong></label>
      <input type="time" name="Cook_Time" value="<?php echo $CookTime?>">
      <br />
      <br /> -->

      <label><strong>Skill Level:</strong></label>

      <?php $skillLevelFromDB = $SkillLevel;?>
      <select name="Skill_Level" required>
        <?php
      $arr2 = array("Easy", "More Effort", "Challenging");
      foreach ($arr2 as $value2) {
        $selected2 = $value2 == $skillLevelFromDB ? "selected" : "";?>
        <option <?php echo $selected2; ?>><?php echo $value2; ?></option>
        <?php
      }
      ?>
      </select>

      <br />
      <br />

      <label><strong>Post Publicly:</strong></label>
      <!-- Retrieves (user chosen) dropdown value 
 for posting publicly from database -->
      <?php $valueFromDB1 = $Post_Publicly;?>
      <select name="Post_Publicly" required>
        <?php
      $arr1 = array("Yes", "No");
      foreach ($arr1 as $value1) {
        $selected1 = $value1 == $valueFromDB1 ? "selected" : "";?>
        <option <?php echo $selected1; ?>><?php echo $value1; ?></option>
        <?php
      }
      ?>
      </select>

      <br />
      <br />

      <button class="btn btn-update btn-success shadow" type="submit" name="update" value="Update"
        style="margin: 10px; width: 180px">
        <i class="fas fa-check-circle fa-lg mr-2"></i>
        Update Recipe
      </button>

      <button class="btn btn-cancel btn-danger ajax_cancel shadow" name="cancel" value="Cancel"
        style="margin: 10px; width: 180px; height: 48px">
        <a class="ajax_cancel">
        <i class="fas fa-times-circle fa-lg mr-2"></i>
          Cancel
        </a>
      </button>

      <br />
      <br />

    </div>
  </form>
</div>
<br />
<br />

<?php
 }
?>
<?php

//When a recipe has been edited
//The 'update' button will update the recipe and
//Save the changes in the database.
if(isset($_POST['update'])){

  $RecipeTitle = $_POST['Title'];
  $RecipeBody = $_POST['Body'];
  $RecipeCategory = $_POST['Recipe_Category'];
  // $CookTime = $_POST['Cook_Time'];
  $SkillLevel = $_POST['Skill_Level'];
  $Post_Publicly = $_POST['Post_Publicly'];

  $viewID = $_SESSION['id'];

  $query1="UPDATE recipes
  SET Title ='$RecipeTitle', Body = '$RecipeBody', Recipe_Category = '$RecipeCategory', Skill_Level = '$SkillLevel', Post_Publicly = '$Post_Publicly'
  WHERE RecipeID ='$UID'";

$rows=$db->query($query1);

echo "<script type='text/javascript'>alert('Recipe has been updated');</script>";
echo "<script>window.location.href='viewYourRecipes.php'</script>";

// header("location: viewYourRecipes.php");
}
?>
<!-- <script>
 $('.btn-update').on('click', function(e) {
   e.preventDefault();
  swal({
    title: "Updated!",
    text: "Recipe Updated!",
    icon: "success",
    button: "Ok!",
    // timer: "3000",
  }),
  function(isConfirm){
    if(isConfirm){
      window.location.href = 'viewYourRecipes.php';
    }
  }
  });
  </script> -->

<!-- <script>
  $('.btn-update').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href')
    swal({
        title: "Updated",
        text: "Recipe Updated",
        icon: "success",
        buttons: "Ok",
      })
      .then((willUpdate) => {
        if (willUpdate) {
          document.location.href = 'viewYourRecipes.php';
        }
      });
  })
</script> -->

<!-- Script: ALERT POP-UP for Cancelling an recipe -->
<script>
  $('.ajax_cancel').on('click', function (e) {
        e.preventDefault();
        const href = $(this).attr('href')
        swal({
            title: "Are you sure?",
            text: "Any changes you have made will be discarded.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            closeModal: false,
          })
          .then((willCancel) => {
              if (willCancel) {
                swal("Updated Cancelled!", {
                  icon: "success",
                  timer: "4000",
                });
                document.location.href = "viewYourRecipes.php";
                }
              });
          })
</script>