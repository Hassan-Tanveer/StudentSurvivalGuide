<?php
/* Displays all successful messages */
// session_start();
?>


<div class="form">
    <h1>Success</h1>
    <p>
    <?php
    if( isset($_SESSION['message']) AND !empty($_SESSION['message'])):
        echo $_SESSION['message'];
    else:
        header("location: index.php");
    endif;
    ?>
    </p>
    <!-- <a href="index.php"><button class="button button-block">Home</button></a> -->
</div>
