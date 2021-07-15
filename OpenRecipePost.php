<?php session_start();?>
<?php include('includes/nav-dashboard.php')?>

<?php
include("database/connectDB.php");
$UID = $_REQUEST['view'];
if(isset($_GET['view'])){
  $sqlstr = "SELECT * FROM recipes WHERE RecipeID = '$UID'";
  $rows=$db->query($sqlstr);


  //loop through recipe and display
  try{
      foreach($rows as $row){
        $RecipeTitle = $row['Title'];
        $RecipeBody = $row['Body'];
        $RecipeCategory = $row['Recipe_Category'];
        $SkillLevel = $row['Skill_Level'];
        $Post_Publicly = $row['Post_Publicly'];
        
        // Storing image from DB and location
        $Recipe_Image = $row['image_name'];
        $img = $row['image_name'];
        $img_src = './images/uploads/'.$img;
        
        $TimeStamp = $row['updated_at'];
      }
  } catch(PDOException $ex) {
      //this catches the exception when the query is thrown
      echo "A database error has occurred when querying the record(s). Please try again.<br> ";
      echo "Error details:". $ex->getMessage();
  }
 ?>
<div class="container">

    <div class="row">
        <!-- Post Content Column -->
        <div class="col-lg-8">
            <input type="hidden" name="RecipeID" value="<?php echo $UID['RecipeID'];?>">
            <h1 class="mt-4" name="Title"><?php echo $RecipeTitle?></h1>

            <!-- Author of post -->
            <p class="lead">
                by
                <?php 
          $db = mysqli_connect("127.0.0.1", "root", "", "studentsurvivalguide"); //127.0.0.1
          
          //SQL STATEMENT TO GET THE ID OF THE AUTHOR OF THE RECIPE GET THE NAME  
          $getIDSQL = "SELECT User_ID FROM recipes WHERE RecipeID = '$UID'";
          $result = $db->query($getIDSQL);

          while($row2 = $result->fetch_assoc()) {
            $getID = $row2['User_ID'];
          }
          
          //SQL STATEMENT TO GET NAME OF AUTHOR OF POST FROM THE ID STORED IN A VARIABLE  
          $getNameSQL = "SELECT Name FROM users Where users.User_ID = '$getID'";
          $result2 = $db->query($getNameSQL);
          while($row3 = $result2->fetch_assoc()) {
              $getName = $row3['Name'];
            }
            ?>
                <?php echo $getName?>
            </p>
            <hr>

            <!-- Date/Time -->
            <!-- Converting DateTime field from DB to 
            separate Date and Time format to display on View recipes page -->
            <?php $datePost = date('F d, Y' , strtotime($TimeStamp));?>
            <?php $timePost = date('H:i', strtotime($TimeStamp));?>

            <p>Posted on <?php echo $datePost ?> at <?php echo $timePost ?></p>
            <hr>


            <!-- Preview Image -->
            <img class="img-fluid rounded" src="<?php echo $img_src; ?>" alt="Image" width="300">
            <hr>

            <?php 
            $RecipeBody = str_replace( '&', '&amp;', $RecipeBody);?>

            <body name="Body" id="Body" cols="80" row="10"><?= $RecipeBody?></body>
            <hr>
            <br />

            <h5>Details</h5>
            <table class="table">
                <tr>
                    <th>Recipe Category</th>
                    <th>Skill Level</th>
                    <th>Shared Publicly</th>
                </tr>
                <tr>
                    <td name="Recipe_Category">
                        <!-- IF/ELSEIF STATEMENTS FOR RECIPE CATEGORY ICONS -->
                        <?php if($row ['Recipe_Category'] == 'Carnivore'){?>
                        <i class="fas fa-drumstick-bite fa-lg"></i>
                        <?php }
                                    elseif($row['Recipe_Category'] == 'Pescatarian'){ ?>
                        <i class="fas fa-fish fa-lg"></i>
                        <?php }
                                     elseif($row['Recipe_Category'] == 'Vegetarian'){?>
                        <i class="fas fa-carrot fa-lg"></i>
                        <?php }
                                    elseif($row['Recipe_Category'] == 'Vegan'){?>
                        <i class="fas fa-seedling fa-lg"></i>
                        <?php }?>
                        <?php echo $RecipeCategory?>
                    </td>

                    <td name="Skill_Level">
                        <i class="fas fa-medal fa-lg"></i>
                        <?php echo $SkillLevel?>
                    </td>


                    <!-- IF/ELSEIF STATEMENT FOR POSTED PUBLIC ICONS -->
                    <td name="Post_Publicly">
                        <?php if($row['Post_Publicly'] == "Yes"){ ?>
                        <i class="fas fa-check-circle fa-lg" style="color: green"></i>
                        <?php }
                        elseif($row['Post_Publicly'] == "No"){ ?>
                        <i class="fas fa-times-circle fa-lg" style="color: red"></i>
                        <?php } ?>
                        <?php echo $Post_Publicly?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<?php
 }
?>