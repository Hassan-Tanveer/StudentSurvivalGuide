<!-- Button trigger modal -->
<button type="button" class="btn dashboardLink" data-toggle="modal" data-target="#addRecipes">
<i class="fas fa-pen-square fa-2x mr-3"></i>
    Add Recipe
</button>

<!-- Modal -->
<div class="modal fade" id="addRecipes" tabindex="-1" role="dialog" aria-labelledby="AddRecipesLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="AddRecipesLabel">Add Recipe</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- ADD Recipe FORM -->
            <form id="addRecipeForm" action="database/recipesServer.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control" type="text" name="Title" placeholder="Recipe Title" required />
                    </div>
                    <div class="form-group">
                        <textarea name="Body" id="editor" cols="80" row="10" required></textarea>
                        <script>
                            CKEDITOR.replace('editor');
                        </script>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="Recipe_Category" required>
                            <option value="">Select a recipe category</option>
                            <option>Carnivore</option>
                            <option>Pescatarian</option>
                            <option>Vegetarian</option>
                            <option>Vegan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <select class="form-control" name="Skill_Level" required>
                            <option value="">Select the skill level</option>
                            <option>Easy</option>
                            <option>More Effort</option>
                            <option>Challenging</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <select class="form-control" name="Post_Publicly" requried>
                            <option value="">Post Publicly?</option>
                            <option>Yes</option>
                            <option>No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="file" name="myfile" class="form-control-file" required />
                    </div>
            </form>

            <div class="modal-footer">
                <!-- Submit , Close and Reset button -->
                <button type="button" class="btn btn-secondary shadow" data-dismiss="modal">
                    <i class="fas fa-window-close mr-1"></i>
                    Close
                </button>
                <button style="background-color:red; color:white;" type="reset" class="btn shadow" name="reset">
                    <i class="fas fa-undo mr-1"></i>
                    Reset
                </button>
                <button type="submit" id="submit" value="Upload" class="btn btn-primary shadow" name="add_recipe"
                    style="background-color: #0cb726; border-color: #0cb726">
                    <i class="fas fa-plus-circle mr-1"></i>
                    Add Recipe
                </button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>