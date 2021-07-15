<?php

if(isset($_POST['add_list'])){
    
    include("connectDB.php");
    session_start();

    $ListItem = ($_POST['ListItem']);
    $id = $_SESSION['id'];

    try{
        $sth=$db->prepare("INSERT INTO ToDoList(User_ID, Title)
      VALUES ('$id','$ListItem')");
        $sth->execute(array($id, $ListItem));

        echo "<script type='text/javascript'>alert('List Item has been added');</script>";
        echo "<script>window.location.href='../TDList.php'</script>";
    }
    catch (PDOException $ex){
        //this catches the exception when it is thrown
        echo $ex->getMessage();
        echo $id;
      }

}
?>