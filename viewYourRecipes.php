<?php session_start(); ?>
<?php include('includes/nav-dashboard.php');?>
<?php include('database/recipesServer.php');?>
<?php $db = mysqli_connect("127.0.0.1", "root", "", "studentsurvivalguide"); //127.0.0.1 ?>

<!-- Search button style -->
<style>
  #searchInput {
    background-position: 10px 12px;
    /* Position the search icon */
    background-repeat: no-repeat;
    /* Do not repeat the icon image */
    width: 100%;
    /* Full-width */
    font-size: 16px;
    /* Increase font-size */
    padding: 12px 20px 12px 40px;
    /* Add some padding */
    border: 1px solid #ddd;
    /* Add a grey border */
    margin-bottom: 12px;
    /* Add some space below the input */
  }

  .empty {
    font-family: sans-serif;
    font-size: 16px;
    text-align: center;
    color: grey;
  }
</style>

<br />
<h1 style="text-align: center"><i class="fas fa-tasks mr-3"></i>Your Recipes</h1>
<br />

<div class="container">
  <div class="row">
    <!-- SEARCH BAR -->
    <i style="margin-top: 10px; margin-left: 25px" class="fas fa-search fa-2x"></i>
    <div class="col">
      <p>
        <input type="text" id="searchInput" class="shadow-sm" onkeyup="searchFunction()"
          placeholder="Search for recipes...">
      </p>
    </div>
  </div>


  <form action="viewYourRecipes.php" method="post" enctype="multipart/form-data">
    <table id="myRecipesTable" class="table table-hover table-responsive-sm shadow">
      <thead style='background-color: #591773; color: white'>
        <tr>
          <th style="text-align:center; border-right:solid">Recipe</th>
          <th style="text-align:center">Shared Publicly?</th>
          <th style="text-align:center">Actions</th>
        </tr>
      </thead>
      <?php
                $viewID = $_SESSION['id'];
                $query = "SELECT * FROM recipes WHERE User_ID='$viewID' ORDER BY timestamp DESC";
                $query_res = mysqli_query($db,$query);
                ?>

      <?php
                foreach ($db->query($query) as $data){
                    echo "<tr>";
                    // Get image name stored in DB and append to image location in directory 
                    $img = $data['image_name'];
                    $img_src = './images/uploads/'.$img;
                    ?>
      <!-- Display Image -->
      <td><img src="<?php echo $img_src; ?>" width="200px" height="150px">
        <?php echo "<a name='view' href='OpenRecipePost.php?view=$data[RecipeID]'>";
            // echo "<img src='data:image;base64,".base64_encode($data['Image']).'>"';
            echo "<h4 class='ml-2 d-md-inline'>$data[Title]</h4></a></td>";
            // echo "<td>".base64_encode($data['Image'])."</td>";
            ?>
        <!-- IF/ELSEIF STATEMENT FOR POSTED PUBLIC ICONS -->
      <td style="text-align: center"><?php if($data['Post_Publicly'] == "Yes"){ ?>
        <i class="fas fa-check-circle fa-lg" style="color: green"></i>
        <?php }
                elseif($data['Post_Publicly'] == "No"){ ?>
        <i class="fas fa-times-circle fa-lg" style="color: red"></i>
        <?php } ?>
        <?php
                echo "$data[Post_Publicly]</td>";
                  echo "<td style='text-align: center'>
                  <a class='btn-edit' name='edit' style='color: white' href='editRecipes.php?edit=$data[RecipeID]'>
                  <button class='btn btn-success shadow' type='button' name='edit' style='width: 100px'>
                  <i class='fas fa-edit fa-lg'></i>
                  Edit
                  </a>
                  </button>
                  
                  <br/>

                  <a class='btn-del ajax_delete_rec' name='Delete' style='color: white' href='deleteRecipe.php?del=$data[RecipeID]'>
                  <button class='mt-2 btn btn-danger btn-del shadow' type='button' name='Delete' style='width:100px'>
                  <i class='fas fa-trash fa-lg'></i>
                  Delete
                  </a>
                  </button>
                  </td>";
                  echo "</tr>";
                }
                ?>
    </table>
                       <!-- If there are no records, display a message -->
                       <?php if(mysqli_num_rows($query_res) <= 0){ ?>
      <div class="todo-item">
        <div class="empty">
          <?php echo "You have no recorded recipes"?>
        </div>
      </div>
      <?php } ?>
  </form>
</div>

<!-- [SweetAlert] Script for: Deleting an expense -->

<script>
  $('.ajax_delete_rec').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href')
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this recipe!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        closeModal: false,
      })
      .then((willDelete) => {
        if (willDelete) {
          document.location.href = href;
          swal("Recipe deleted!", {
            icon: "success",
            timer: "4000",
          });
        } else {
          swal("Your recipe is safe!", {
            title: "Cancelled Deletion",
            icon: "info",
          });
        }
      });
  })
</script>

<!-- Search Your Recipes Script -->
<script>
  function searchFunction() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myRecipesTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows
    // and hide records that don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }
</script>