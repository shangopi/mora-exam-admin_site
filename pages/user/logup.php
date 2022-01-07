<?php
session_start();
$_SESSION['msg'] = "";
include '../db_config.php';
$username = $_POST['uname'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$password = $_POST['pw'];
$password_hash = password_hash($password, PASSWORD_BCRYPT);


    $stmt = $db->prepare("INSERT INTO tbl_users (firstname,lastname,username,password) VALUES (?, ?, ?,?)");
    $stmt->bind_param("ssss", $fname, $lname, $username,$password_hash);

    
    
    
    $result = $stmt->execute();
    if ($result) {
        $_SESSION['msg'] = '<div class="alert alert-success" role="alert">
        Your Registration is successful!!! After validating, you will be allowed to login !!
      </div>';
    } else {
        $_SESSION['msg'] = '<div class="alert alert-danger " role="alert">
        Something went wrong! Contact 0766891372 !!
      </div>';
       
    }
    $stmt->close();
    header('Location: ../signup.php');




?>