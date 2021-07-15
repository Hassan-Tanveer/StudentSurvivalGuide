<?php

if(isset($_POST['id'])){

    // require '../checklist_dbConn.php';
    require 'database/connectDB.php';
    // include('database/connectDB.php');
// $db = mysqli_connect("127.0.0.1", "root", "", "studentsurvivalguide"); //127.0.0.1

    $id = $_POST['id'];
    
    if(empty($id)){
        echo 'error';
    } 
    else {

        $todos = $db->prepare("SELECT ListID, checked FROM todolist WHERE ListID=?");
        $todos->execute([$id]);

        $todo = $todos->fetch();
        $uId = $todo['ListID'];
        $checked = $todo['checked'];

        $uChecked = $checked ? 0 : 1;

        $res = $db->query("UPDATE todolist SET checked=$uChecked WHERE ListID=$uId");

        if($res) {
            echo $checked;
        }
        else {
            echo "error";
        }
        $db = null;
        exit();
    }
}
else{
    header("Location: TDList.php");
}        
        ?>