<?php session_start(); ?>
<?php include('includes/nav-dashboard.php');?>
<?php include('database/recipesServer.php');?>

<?php $db = mysqli_connect("127.0.0.1", "root", "", "studentsurvivalguide"); //127.0.0.1 ?>

<!-- Search Button Styling -->
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

    #readmore {
        color: white;
        background-color: #732791;
    }

    #readmore:hover {
        background-color: white;
        color: black;
        border: 1px solid #732791;
    }

    #filterBtn {
        background-color: #732791;
        color: white;
        font-weight: bold
    }

    #filterBtn:hover,
    .btn-filter:hover {

        background-color: white;
        color: black;
        border: 1px solid #732791;
    }

    .btn-filter {
        background-color: #732791;
        color: white;
        width: 165px;
        margin-bottom: 5px
    }

    .btn-filter:active {
        background-color: black;
        color: white;
    }

    .active {
        background-color: black;
        color: white;
    }
</style>

<br />
<h1 style="text-align:center"><i class="fas fa-users fa-lg mr-3"></i>Community Recipes</h1>
<br />

<!-- Bootstrap Cards: Shared recipes layout -->
<div class="container-md">
    <div class="row">
        <div class="col-sm-3">
            <!-- START OF: Collapsible Filter Box -->
            <p>
                <i class="fas fa-filter fa-lg mr-2" style="margin-left:10px"></i>
                <button id="filterBtn" class="btn shadow-sm" type="button" data-toggle="collapse"
                    data-target="#collapseRecFilter" aria-expanded="false" aria-controls="collapseExample">
                    Filter
                </button>
            </p>
        </div>

        <!-- SEARCH BAR -->
        <i style="margin-top: 15px; margin-left: 25px" class="fas fa-search fa-lg"></i>
        <div class="col">
            <input type="text" id="searchInput" onkeyup="searchFunction()" placeholder="Search for recipes...">
        </div>
    </div>

    <!-- When Filter button is pressed, filter menu opens
                displaying the filter options -->
    <div class="collapse" id="collapseRecFilter">
        <div class="card card-body bg-light">
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group" id="filterBtns">
                        <h3 class="mt-2"><i class="mr-3 fas fa-utensils fa-sm"></i>Diet Type</h3>
                        <br />
                        <!-- <div class="list-group-item checkbox"> -->
                        <label>
                            <button style="width: 120px" class="btn btn-filter shadow common_selector diet">
                                Show All
                            </button>
                        </label>

                        <label>
                            <button style="width: 120px" class="btn btn-filter shadow common_selector diet" value="Carnivore">
                                Carnivore
                            </button>
                            <?php 
                            // if(isset($_POST['Carnivore'])){
                            //     $query = "SELECT * FROM recipes WHERE Post_Publicly = 'Yes' AND Recipe_Category ='Carnivore'";
                            //     $filterResult = filterSelection($query);
                            // }
                            // else{
                            //     $query = "SELECT * FROM recipes WHERE Post_Publicly = 'Yes' ORDER BY updated_at DESC";
                            //     $filterResult = filterSelection($query);
                            // }
                            // function filterSelection($query) {
                            //     $db = mysqli_connect("127.0.0.1", "root", "", "studentsurvivalguide");
                            //     $filterResult = mysqli_query($db, $query);
                            //     return $filterResult;
                            // }
                                ?>
                        </label>
                        <!-- </div> -->
                        <label>
                            <button style="width: 120px" name="Pescatarian" class="btn btn-filter shadow common_selector diet"
                                value="Pescatarian">
                                Pescatarian
                            </button>

                        </label>

                        <label>
                            <button style="width: 120px" name="Vegetarian" class="btn btn-filter shadow common_selector diet"
                                value="Vegetarian">
                                Vegetarian
                            </button>
                        </label>

                        <label>
                            <button style="width: 120px" name="Vegan" class="btn btn-filter shadow common_selector diet"
                                value="Vegan">
                                Vegan
                            </button>
                        </label>
                        <!-- </div> -->
                    </div>
                </div>

                <!-- (SINGLE) FILTER BUTTONS FOR DIET TYPE -->
                <?php
                
                if (isset($_POST['Carnivore']))
                {
                    $query = "SELECT * FROM recipes WHERE Post_Publicly = 'Yes' AND Category='Carnivore'";
                    $result = filterSelection($query);
                }
                elseif (isset($_POST['Pescatarian']))
                {
                    $query = "SELECT * FROM recipes WHERE Post_Publicly = 'Yes' AND Category='Pescatarian'";
                    $result = filterSelection($query);
                }
                elseif (isset($_POST['Vegetarian']))
                {
                    $query = "SELECT * FROM recipes WHERE Post_Publicly = 'Yes' AND Category='Vegetarian'";
                    $result = filterSelection($query);
                }
                elseif (isset($_POST['Vegan']))
                {
                    $query = "SELECT * FROM recipes WHERE Post_Publicly = 'Yes' AND Category='Vegan'";
                    $result = filterSelection($query);
                }
                else
                {
                    $query = "SELECT * FROM recipes WHERE Post_Publicly = 'Yes' ORDER BY updated_at DESC";
                    $result = filterSelection($query);
                }

                //Function to handle the sorting and filtering above
                function filterSelection($query)
                {
                    $db = mysqli_connect("127.0.0.1", "root", "", "studentsurvivalguide");  
                    $result = mysqli_query($db, $query);
                    return $result;
                }
                ?>

                <div class="col-md-3">
                    <div class="list-group">
                        <h3 class="mt-2"><i class="mr-3 fas fa-medal fa-sm"></i>Skill Level</h3>
                        <br />
                        <label>
                            <button style="width: 120px" name="Easy" class="btn btn-filter shadow common_selector skill"
                                value="Easy">
                                Easy
                            </button>
                        </label>
                        <label>
                            <button style="width: 120px" name="MoreEffort" class="btn btn-filter shadow common_selector skill"
                                value="More Effort">
                                More Effort
                            </button>
                        </label>
                        <label>
                            <button style="width: 120px" name="Challenging" class="btn btn-filter shadow common_selector skill"
                                value="Chsllenging">
                                Challenging
                            </button>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!-- (SINGLE) FILTER BUTTONS FOR SKILL LEVEL-->
        <?php
        if (isset($_POST['Easy']))
        {
            $query = "SELECT * FROM recipes WHERE Post_Publicly = 'Yes' AND Skil_Level='Easy'";
            $result = filterSelection($query);
        }
        elseif (isset($_POST['More Effort']))
        {
            $query = "SELECT * FROM recipes WHERE Post_Publicly = 'Yes' AND Skil_Level='More Effort'";
            $result = filterSelection($query);
        }
        elseif (isset($_POST['Challenging']))
        {
            $query = "SELECT * FROM recipes WHERE Post_Publicly = 'Yes' AND Skil_Level='Challenging'";
            $result = filterSelection($query);
        }
        // else{
        //     $query = "SELECT * FROM recipes WHERE Post_Publicly = 'Yes' ORDER BY updated_at DESC";
        //     $result = filterSelection($query);
        // }
        ?>

    </div>
    <!-- END OF FILTER -->

    <div class="card-body">
        <div class="row" id="recipeItems">
            <div class="mt-4">
                <div class="col-sm">
                    <div class="card-columns">
                        <?php
                        // $query = "SELECT * FROM recipes WHERE Post_Publicly ='Yes' ORDER BY updated_at DESC";    
                        foreach ($db->query($query) as $data){
                                // Storing image from DB and location
                                $Recipe_Image = $data['image_name'];
                                $img = $data['image_name'];
                                $img_src = './images/uploads/'.$img;
                                ?>
                        <div class="RecipeCards card bg-light booking-card shadow-sm">
                            <!-- Card image -->
                            <div class="view overlay">
                                <img class="card-img-top" src="<?php echo $img_src; ?>" alt="Card image cap">
                                <a href="#!">
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                            <!-- Card content -->
                            <div class="card-body">
                                <div class="column">
                                    <!-- Title -->
                                    <h4 class="card-title font-weight-bold"><a><?php echo $data['Title'];?></a>
                                    </h4>

                                    <!-- Author -->
                                    <p class="lead">
                                        by
                                        <?php
                                        $viewID = $data['User_ID'];
                                        $getNameSQL = "SELECT Name FROM users WHERE User_ID = '$viewID'";
                                        $result = $db->query($getNameSQL);
                                        while($row = $result->fetch_assoc()) {
                                            $getName = $row['Name'];
                                        }
                                        ?>
                                        <?php echo $getName?>
                                    </p>

                                    <hr>

                                    <div class="row">
                                        <div class="col-md-auto">
                                            <p class="mb-2">
                                                <!-- IF/ELSEIF STATEMENTS FOR RECIPE CATEGORY ICONS -->
                                                <?php if($data ['Recipe_Category'] == 'Carnivore'){?>
                                                <i class="fas fa-drumstick-bite fa-lg"></i>
                                                <?php }
                                    elseif($data['Recipe_Category'] == 'Pescatarian'){ ?>
                                                <i class="fas fa-fish fa-lg"></i>
                                                <?php }
                                     elseif($data['Recipe_Category'] == 'Vegetarian'){?>
                                                <i class="fas fa-carrot fa-lg"></i>
                                                <?php }
                                    elseif($data['Recipe_Category'] == 'Vegan'){?>
                                                <i class="fas fa-seedling fa-lg"></i>
                                                <?php }?>


                                                <!-- Display Recipe_Category -->
                                                <strong><?php echo $data['Recipe_Category']?></strong>
                                            </p>



                                            <!-- Display Cook Time -->
                                            <!-- Converting DateTime field from DB to format the Cook Time -->
                                            <!-- <?php $formatCookTime = date('h:m' , strtotime($data['Cook_Time']));?>
                                    <p class="mb-2"><strong>
                                    <i class="fas fa-clock fa-lg"></i><?php echo $formatCookTime?></strong>
                                    </p> -->

                                        </div>

                                        <div class="col-md-auto">
                                            <!-- Display Skill Level -->
                                            <p class="mb-2">
                                                <i class="fas fa-medal fa-lg"></i>
                                                <strong><?php echo $data['Skill_Level']?></strong>
                                            </p>
                                        </div>
                                    </div>

                                    <br />

                                    <!-- Button -->
                                    <?php
                                    echo "
                                    <a name='view' href='OpenRecipePost.php?view=$data[RecipeID]' >
                                    <button id='readmore' class='btn shadow' type='button' style='width: 150px'>
                                    <i class='fas fa-book-open fa-lg' style='padding: 5px'></i>
                                    Read More
                                    </button></a>";
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End of Card Format -->


<!-- START OF FILTERING SCRIPTS -->
<script>
    // $(document).ready(function () {
    //     filter_data();

    //     function filter_data() {
    //         $('.filter_data').html('<div id="loading" style="" ></div>');
    //         var action = 'filter_recipes';
    //         var diet = get_filter('diet');
    //         var skill = get_filter('skill');
    //         $.ajax({
    //             url: "filterRecipes.php",
    //             method: "POST",
    //             data: {
    //                 action: filter_recipes,
    //                 diet: diet,
    //                 skill: skill,
    //             },
    //             success: function (data) {
    //                 $('.filter_data').html(data);
    //             }
    //         });
    //     }

    //     function get_filter(class_name) {
    //         var filter = [];
    //         $('.' + class_name + ':checked').each(function () {
    //             filter.push($(this).val());
    //         });
    //         return filter;
    //     }

    //     $('.common_selector').click(function () {
    //         filter_data();
    //     });

    // });
</script>

<!-- Change text of filter button when clicked from "+ Filter" to "- Filter" -->
<script type="text/javascript">
    $(document).ready(function () {
        $('#filterBtn').click(function () {
            $(this).toggleClass("active");
            if ($(this).hasClass("active")) {
                // $(this).addClass("fas fa-filter fa-lg");
                $(this).text("Hide Filter");
            } else {
                // var icon = document.createElement("I");
                // document.getElementById("icon").appendChild(icon);
                $(this).text("Filter");

            }
        });
        // document ready  
    });
</script>

<!-- END OF FILTERING SCRIPTS -->


<!-- Search Your Recipes Script -->
<script>
    function searchFunction() {
        var input, filter, cards, cardContainer, h4, title, i;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        cardContainer = document.getElementById("recipeItems");
        cards = cardContainer.getElementsByClassName("RecipeCards");
        for (i = 0; i < cards.length; i++) {
            title = cards[i].querySelector(".card-body h4.card-title");
            if (title.innerText.toUpperCase().indexOf(filter) > -1) {
                cards[i].style.display = "";
            } else {
                cards[i].style.display = "none";
            }
        }
    }
</script>


<!-- FILTERING SCRIPT -->
<script>
    //   $(document).ready(function () {

    //     $('.common_selector').click(function () {
    //       var action = 'data';
    //       var category = get_filter_text('category');

    //       $.ajax({
    //         url: "filterExpenses.php",
    //         method: "POST",
    //         data: {
    //           action: action,
    //           category: category
    //         },
    //         success: function (response) {
    //           $('#filter_result').html(response);
    //         }
    //       });
    //     });


    //     function get_filter_text(text_id) {
    //       var filter = [];
    //       $('.' + text_id + ':checked').each(function () {
    //         filter.push($(this).val());
    //       });
    //       return filter;
    //     }

    //   });
</script>

<script>
    var btnContainer = document.getElementById("filterBtns");

    // Get all buttons with class="btn" inside the container
    var btns = btnContainer.getElementsByClassName("btn-filter");

    // Loop through the buttons and add the active class to the current/clicked button
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function () {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
    }
</script>