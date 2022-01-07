<?php
session_start();
$_SESSION['msg1'] = "";

include '../db_config.php';


$username = $_POST['uname'];
$password = $_POST['pw'];


$stmt = $db->prepare("SELECT status,username,password FROM tbl_users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
mysqli_stmt_store_result($stmt);

if(mysqli_stmt_num_rows($stmt) == 1){ 
    
    mysqli_stmt_bind_result($stmt,$status, $user1name, $hashed_password);
    mysqli_stmt_fetch($stmt);
    
    
    
    if(password_verify($password, $hashed_password)){
        if($status==0){
            $_SESSION['msg1'] = '<div class="alert alert-danger " role="alert">
            Your Account is not vertified yet !! Contact 0766891372 !!
          </div>';
          header('Location: ../signin.php');
        }
        else{
            $_SESSION['username'] = $username;
            $_SESSION['status'] = $status;
           
        
        header('Location: ../add_students.php');
        }
        
        


    }
    else{
        echo 'gsgd';
        $_SESSION['msg1'] = '<div class="alert alert-danger " role="alert">
        Your Username or password is incorrect !!
      </div>';
      
    header('Location: ../signin.php');
    }
}
else{
    $_SESSION['msg1'] = '<div class="alert alert-danger " role="alert">
        Your Username or password   is incorrect !!
      </div>';
      echo 'fgsegdgh';
    header('Location: ../signin.php');
}


?>