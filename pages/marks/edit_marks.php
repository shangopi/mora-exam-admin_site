<?php

session_start();
include '../db_config.php';
$param = $_POST['param'];
$name = $_POST['name'];
$index_no = $_POST['index_no'];

$aa = substr($param,0,3).substr($param,7,3).substr($param,13,1);
$abc = $aa."_entered_by";
$bcd =  $aa."_checked";

$sql = "SELECT (".$param.") FROM tbl_marks WHERE index_no = (".$index_no.")";
$result=mysqli_query($db,$sql);
$rowcount=mysqli_num_rows($result);
$row = $result->fetch_assoc();




if($rowcount == 0){
    
    echo "<div class='alert alert-warning' role='alert'> Error !! Marks not entered yet !! </div>";
}
else{
            $sql = "UPDATE tbl_marks SET {$param} ='{$name}', {$abc} ='{$_SESSION['username']}',{$bcd}='0' WHERE index_no='{$index_no}'";
            
    
            if ($db->query($sql) === TRUE) {
                echo "<div class='alert alert-success' role='alert'> Success for ".$index_no."</div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'> Failed ".$db -> error."</div>";
    
            }



}





?>
