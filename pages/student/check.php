<?php
session_start();
include '../db_config.php';

if(isset($_GET['index_no'])){
    
    $id = $_GET['index_no'];
      

    
    

    
    $sql = "UPDATE tbl_students SET checked ='1', checked_by ='{$_SESSION['username']}',checked_datetime= now() WHERE  index_no = '$id'";
    
                if ($db->query($sql) == TRUE) {
                    echo "Success!!@success@done_all@You have sucessfullly checked the student details@1";
                    
                    
                } else {
                    $x =$db -> error;
                    echo "Faliled!!@danger@warning@Server Error";
                }
    }

    
         






?>