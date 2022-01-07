<?php
include '../db_config.php';

if(isset($_POST['add_dis'])){
    $dis = $_POST['district_id'];
    $list = explode("@",$dis);
    $id = $list[0];
    $name = $list[1];
    $coord = $_POST['coordinator'];
    $phone = $_POST['telephone'];

       $sql = "INSERT INTO tbl_exam_districts (district_id, district, coordinator, telephone)
            VALUES ('{$id}', '{$name}', '{$coord}','{$phone}')";

            if ($db->query($sql) ==TRUE) {
                header('Location: ../center.php?subject=Success!!&col=success&icon=done_all&msg=You%20have%20sucessfully%20added%20the%20district');
            } else {
                header('Location: ../center.php?subject=Failed!!&col=danger&icon=warning&msg=Unsuccessful%20Try%20again%20later');
    
            }





}

?>