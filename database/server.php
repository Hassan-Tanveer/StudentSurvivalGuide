<!-- Server handles user's registering
and logging in to the website -->
<?php
session_start();

// initializing variables
$User_ID ="";
$Name = "";
$Email = "";
$errors = array();
//Connects to the database
$db = mysqli_connect("127.0.0.1", "root", "", "studentsurvivalguide");

// Registering the user
if (isset($_POST['reg_user'])) {
  // Receive all input values from the form
  $Name = mysqli_real_escape_string($db, $_POST['Name']);
  $Email = mysqli_real_escape_string($db, $_POST['Email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // Form Validation: Ensures that the form is correctly filled
  // by adding (array_push()) corresponding error into $errors array
  if (empty($Name)) { array_push($errors, "Name is required."); }
  if (empty($Email)) { array_push($errors, "Email is required."); }
  if (empty($password_1)) { array_push($errors, "Password is required."); }
  if ($password_1 != $password_2) {
    // array_push($errors, "Passwords do not match");
    echo "<script type='text/javascript'>alert('Passwords do not match');</script>";
    echo "<script>window.location.href='index.php'</script>";
  }

  // Checks the database to make sure
  // a user does not already exist with the same name and email
  $user_check_query = "SELECT * FROM users WHERE Email='$Email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // If user exists
    if ($user['Email'] === $Email) { //If email exists
      array_push($errors, "Email already exists");
    }
  }

  // Register the user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password_1); //encrypt the password (using hashing) before saving in the database

    $query = "INSERT INTO users (Name, Email, password) VALUES('$Name', '$Email', '$password')";
    mysqli_query($db, $query);
    $_SESSION['Name'] = $Name;
    // echo $_SESSION['message'] = "You have registered and can now log in.";
    echo "<script type='text/javascript'>alert('registered');</script>";
    // header("location: ../addExpenses.php");
    echo "<script>window.location.href='index.php'</script>";
    // header('location: index.php');
    
  }
}

// Logging the user in
if (isset($_POST['login_user'])) {
  $Email = mysqli_real_escape_string($db, $_POST['Email']);
  $password = mysqli_real_escape_string($db, $_POST['Password']);

  // Form validation: Ensures that the form is correctly filled
  if (empty($Email)) {
    array_push($errors, "Email is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  // Logs the user in if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM users WHERE Email='$Email' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['Email'] = $Email;
      foreach ($db->query($query) as $data){

        $id = '';
        if( isset( $_GET['id']))
        {
            $id = $_GET['id'];
          }
        $idd = $data['User_ID'];
        $_SESSION['id'] = $data['User_ID'];
      }

      $_SESSION['success'] = "You are now logged in";

      header("location: dashboard.php");
    }else {
      // array_push($errors, "Wrong username/password combination");
      echo "<script type='text/javascript'>alert('Wrong username/password entered');</script>";
      echo "<script>window.location.href='index.php'</script>";
    }
  }
}
?>