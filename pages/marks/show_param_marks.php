<?php
session_start();
include '../db_config.php';

if(isset($_GET['index_no'])){
    $index_nu = $_GET['index_no'];
    $param =$_GET['param'];
    $sql_marks = "SELECT (".$param.") FROM tbl_marks WHERE index_no ='{$index_nu}'";
    $result_marks = mysqli_query($db, $sql_marks);
    $rowcount=mysqli_num_rows($result_marks);
    if($rowcount==0){
        echo "Index Number Doesn't Exists";
    }
    else{
        $row = mysqli_fetch_assoc($result_marks);
        echo $row[$param];

    }
    

}

?>