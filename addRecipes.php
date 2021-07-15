<?php session_start(); ?>
<?php include('includes/nav-dashboard.php');?>
<?php include('database/recipesServer.php');?>


<br />
<h1 style="text-align: center"><i class="fas fa-pen-square mr-3"></i>Add Recipes</h1>
<br />
<div class="container bg-light shadow">
    <form action="database/recipesServer.php" method="post" enctype="multipart/form-data">
        <div class="form-input">
            <label><strong>Recipe Title:</strong></label>
            <input type="text" maxlength="35" name="Title" placeholder="Recipe Title" required />
            <br />
            <br />
            <!-- Text Editor -->
            <!-- <div id="editor"> -->
            <textarea name="Body" id="editor" cols="80" row="10" required></textarea>
            <script>
                CKEDITOR.replace('editor');
                // ClassicEditor.create(document.getElementById('editor'));
                // ClassicEditor
                //     .create(document.querySelector('#editor'))
                //     .then(editor => {
                //         console.log(editor);
                //     })
                //     .catch(error => {
                //         console.error(error);
                //     });
            </script>
            <!-- </div> -->

            <br />

            <div class="col">
                <label><b>Recipe Category:</b></label>
                <select name="Recipe_Category" required>
                    <option value="">Select a recipe category</option>
                    <option>Carnivore</option>
                    <option>Pescatarian</option>
                    <option>Vegetarian</option>
                    <option>Vegan</option>
                </select>
            </div>
            <br />

            <!-- <div class="col">
                <label><b>Cook Time:</b></label>
                <input type="time" name="Cook_Time" required>
            </div>
            <br /> -->

            <div class="col">
                <label><b>Skill Level:</b></label>
                <select name="Skill_Level" required>
                    <option value="">Select the skill level</option>
                    <option>Easy</option>
                    <option>More Effort</option>
                    <option>Challenging</option>
                </select>
            </div>
            <br />

            <div class="col">
                <label><b>Post Publicly:</b></label>
                <select name="Post_Publicly" required>
                    <option value="">Post Publicly?</option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>

            <br />
            <label><strong>Thumbnail Image:</strong></label>
            <input type="file" name="myfile" class="form-control-file" required />

            <br />
            <br />

            <!-- Submit and Reset Buttons -->
            <button onclick="success_alert()" type="submit" id="submit" class="btn btn-success shadow" name="add_recipe"
                value="Upload" style=" width: 160px">
                <i class="fas fa-plus-circle fa-lg mr-2"></i>
                Add Recipe
            </button>
            <button type="reset" class="btn btn-danger shadow" name="reset" style="width: 160px; margin: 10px">
                <i class="fas fa-undo fa-lg mr-2"></i>
                Reset
            </button>
            <br />
            <br />
        </div>
    </form>
</div>
<br />
<br />