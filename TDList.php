<?php session_start(); 
$viewID = $_SESSION['id']; ?>
<?php include('includes/nav-dashboard.php');?>
<?php include('database/TDListServer.php');?>

<?php $db = mysqli_connect("127.0.0.1", "root", "", "studentsurvivalguide"); //127.0.0.1?>

<style>
  * {
    padding: 0px;
    margin: 0px;
    box-sizing: border-box;
  }

  .main-section {
    background: transparent;
    max-width: 100%;
    width: 90%;
    height: 500px;
    margin: 30px auto;
    border-radius: 10px;
  }

  .add-section {
    width: 100%;
    background: #fff;
    margin: 0px auto;
    padding: 10px;
    border-radius: 15px;
  }

  .add-section input {
    display: block;
    width: 95%;
    height: 40px;
    margin: 10px auto;
    border: 2px solid #ccc;
    font-size: 16px;
    border-radius: 5px;
    padding: 0px 5px;
  }

  .add-section button {
    display: block;
    width: 95%;
    height: 40px;
    margin: 0px auto;
    border: none;
    outline: none;
    color: #fff;
    font-family: sans-serif;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
  }

  .add-section button:hover {
    box-shadow: 0 2px 2px 0 #ccc, 0 2px 3px 0 #ccc;
    opacity: 0.7;
  }

  .add-section button span {
    border: 1px solid #fff;
    border-radius: 50%;
    display: inline-block;
    width: 18px;
    height: 18px;
  }

  .show-todo-section {
    width: 100%;
    background: #fff;
    margin: 30px auto;
    padding: 10px;
    border-radius: 5px;
  }

  .todo-item {
    width: 95%;
    margin: 10px auto;
    padding: 20px 10px;
    box-shadow: 0 4px 8px 0 #ccc, 0 6px 20px 0 #ccc;
    border-radius: 5px;
  }

  .todo-item h2 {
    display: inline-block;
    padding: 5px 0px;
    font-size: 17px;
    font-family: sans-serif;
    color: #555;
  }

  .todo-item small {
    display: block;
    width: 100%;
    padding: 5px 0px;
    color: #888;
    padding-left: 30px;
    font-size: 14px;
    font-family: sans-serif;
  }

  .remove-to-do {
    display: block;
    float: right;
    width: 120px;
    font-family: sans-serif;
    color: rgb(139, 97, 93);
    text-decoration: none;
    text-align: right;
    padding: 0px 5px 8px 0px;
    border-radius: 50%;
    transition: background 1s;
    cursor: pointer;
  }

  /* .remove-to-do:hover {
    background: purple;
    color: black;
  } */

  .checked {
    color: red !important;
    text-decoration: line-through;
  }

  .todo-item input {
    margin: 0px 5px;
  }

  .empty {
    font-family: sans-serif;
    font-size: 16px;
    text-align: center;
    color: grey;
  }
</style>


<br />
<h1 style="text-align: center"><i class="fas fa-clipboard-list fa-lg mr-3"></i>To-Do List</h1>

<div class="main-section">
  <div class="container bg-dark shadow-lg" style="border-top-left-radius: 10px; border-top-right-radius: 10px">
    <br />
    <div class="add-section bg-light">
      <form action="database/TDListServer.php" method="post">
        <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error'){ ?>
        <input type="text" name="title" style="border-color: #ff6666" placeholder="This field is required" />
        <button type="submit">Add &nbsp; <span>&#43;</span></button>

        <?php }else{ ?>
        <input type="text" name="ListItem" placeholder="What do you need to do?" required />
        <button id="submit" class="btn btn-success shadow" type="submit" name="add_list">
          <i class="fas fa-plus-circle fa-lg mr-2"></i>
          Add To List
        </button>
        <?php } ?>
      </form>
      <br />
    </div>
    <?php
      $todos = mysqli_query($db, "SELECT * FROM todolist WHERE User_ID='$viewID' ORDER BY ListID DESC");
    ?>
    <div class="container show-todo-section">
      <!-- If there are no records, display a message -->
      <?php if(mysqli_num_rows($todos) <= 0){ ?>
      <div class="todo-item">
        <div class="empty">
          <?php echo "You have no items in your To-Do List"?>
        </div>
      </div>
      <?php } ?>

      <div class="container">
        <?php
      while($todo = mysqli_fetch_assoc($todos)){?>
        <div class="todo-item">
          <span id="<?php echo $todo['ListID'];?>" class="remove-to-do">
            <a class='btn-del ajax_delete' name='Delete' style='color: white'
              href="deleteList.php?del=<?php echo $todo['ListID']?>">
              <button class='btn btn-danger btn-del shadow' type='button' name='Delete'>
                <i class='fas fa-trash fa-lg mr-2'></i>
                Delete
            </a>
            </button>
          </span>

          <?php if($todo['checked']) {?>
          <input type="checkbox" class="check-box" name="check" data-todo-id="<?php echo $todo['ListID'];?>" checked />
          <h2 class="checked"><?php echo $todo['Title']?></h2>
          <?php } 
        
        else { ?>
          <input type="checkbox" data-todo-id="<?php echo $todo['ListID'];?> " class="check-box" />
          <h2><?php echo $todo['Title']?></h2>
          <?php } ?>
          <br />
          <small>Created on: <?php echo $todo['created_at']?></small>
        </div>
        <?php } ?>
      </div>
    </div>
    <br />
  </div>
</div>

<!-- <script src="js/jquery.min.js"></script> -->

<script src="js/jquery-3.2.1.min.js"></script>

<!-- Checking a checkbox and sending to server file -->
<script>
  $(document).ready(function () {
    $(".check-box").click(function (e) {
      const id = $(this).attr('data-todo-id');

      $.post('checkList.php', {
          id: id
        },
        (data) => {
          if (data != 'error') {
            const h2 = $(this).next();
            if (data === '1') {
              h2.toggleClass('checked');
            } else {
              h2.toggleClass('checked');
            }
          }

        }
      );
    });
  });
</script>


<!-- Script: ALERT POP-UP for Deleting a list item -->
<script>
  $('.ajax_delete').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href')
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this list item!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        closeModal: false,
      })
      .then((willDelete) => {
        if (willDelete) {
          document.location.href = href;
          swal("Your list item has been deleted!", {
            icon: "success",
            timer: "4000",
          });
        } else {
          swal("Your List Item is safe!", {
            title: "Cancelled Deletion",
            icon: "info",
          });
        }
      });
  })
</script>