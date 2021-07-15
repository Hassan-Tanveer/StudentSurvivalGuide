<!--
If the user has clicked
the logout button then logout
and redirect them to the home page
-->
<?php if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['Name']);
  header("location: index.php");
  exit();
}
?>

<div class="content">
  <!-- notification message -->
  <?php if (isset($_SESSION['success'])) : ?>
    <div class="error success" >
      <h3>
        <?php
        echo $_SESSION['success'];
        unset($_SESSION['success']);
        ?>
      </h3>
    </div>
  <?php endif ?>
</div>
