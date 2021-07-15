<!-- This server handles the 'Add Recipes' page interaction -->
<?php
if (isset($_POST['add_recipe'])) {

  include("connectDB.php");
  session_start();

  $RecipeTitle = ($_POST['Title']);
  $RecipeBody = $_POST['Body'];
  $RecipeCategory = ($_POST['Recipe_Category']);
  $SkillLevel = ($_POST['Skill_Level']);
  $Post_Publicly = ($_POST['Post_Publicly']); 
  // $uploadImage = addslashes(file_get_contents($_FILES['Image']['tmp_name']));
  // $RecipeImage =($_POST['Image']);

  //Uploading Image files
$name=$_FILES["myfile"]["name"];
$target_dir = "../images/uploads/";
$target_file = $target_dir.basename($_FILES["myfile"]["name"]);
// $img_upload=$_FILES["myfile"]["tmp_name"];

 // Select file type
 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

 // Valid file extensions
 $extensions_arr = array("jpg","jpeg","png","gif");

  $id = $_SESSION['id'];

  try{

    // Check extension
  if( in_array($imageFileType,$extensions_arr) ){
    
    // Only the user has permission to write the file hence the permission code 0755
    // if (!is_dir('../images/uploads/')) {
		// 	mkdir('../images/uploads/', true);         
		// }
	
    // delcaring location to save files with an extension 
    // $img_upload_dir = '../images/uploads/'.$name;

    // Moving image file to delcared location
    // move_uploaded_file($img_upload, $img_upload_dir);
    move_uploaded_file($_FILES['myfile']['tmp_name'],$target_dir.$name);
    
    // Uses the form data to insert(add) a record into mySQL database
    $sth=$db->prepare("INSERT INTO recipes(User_ID, Title, Body, Recipe_Category, Skill_Level, Post_Publicly, image_name)
      VALUES ('$id','$RecipeTitle', '$RecipeBody', '$RecipeCategory', '$SkillLevel', '$Post_Publicly', '$name')");
        $sth->execute(array($id, $RecipeTitle, $RecipeBody, $RecipeCategory, $SkillLevel, $Post_Publicly, $name));
        
        echo "<script type='text/javascript'>alert('Recipe has been added');</script>";
        echo "<script>window.location.href='../viewYourRecipes.php'</script>";

        //   echo "<div class='alert alert-success alert-dismissible fade in'>
        //   <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        //   <strong>Success!</strong>
        // </div>";
      }
    }
      
      catch (PDOException $ex){
        //this catches the exception when it is thrown
        echo $ex->getMessage();
        echo $id;
      }
    }
    ?>