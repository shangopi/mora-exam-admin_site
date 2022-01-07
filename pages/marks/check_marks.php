<?php

session_start();
include '../db_config.php';
$param = $_POST['param'];
$name = $_POST['name'];
$index_no = $_POST['index_no'];


$aa = substr($param,0,3).substr($param,7,3).substr($param,13,1);
$abc = $aa."_checked_by";
$bcd =  $aa."_checked";

$sql = "UPDATE tbl_marks SET  {$abc} ='{$_SESSION['username']}',{$bcd}='1' WHERE index_no='{$index_no}'";
            
    
            if ($db->query($sql) === TRUE) {
                echo "<div class='alert alert-success' role='alert'> Success for index Number ".$index_no."</div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'> Failed ".$db -> error."</div>";
    
            }



?>
