<?php
include '../db_config.php';

if(isset($_GET['index_no'])){
    $id = $_GET['index_no'];
        
        $sql ="DELETE FROM tbl_students WHERE index_no = '$id'";
            if ($db->query($sql) === TRUE) {
                echo "Success!!@warning@done_all@You have sucessfullly deleted the student@1";
            } 
            else {
                echo "Faliled!!@danger@warning@Index Number Already exists. Check it in the students table or Server Error";
}
}

?>