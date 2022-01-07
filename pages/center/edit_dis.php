<?php
include '../db_config.php';

if(isset($_POST['edit_dis'])){
    $id = $_POST['district_id'];
    $coord = $_POST['coordinator'];
    $phone = $_POST['telephone'];


        $sql ="UPDATE tbl_exam_districts SET coordinator='{$coord}',telephone='{$phone}' WHERE district_id=$id";
            if ($db->query($sql) == TRUE) {
                
                header('Location: ../center.php?subject=Success!!&icon=done_all&col=info&msg=You%20have%20sucessfully%20edited%20the%20district%20Details');
            } else {
                header('Location: ../center.php?subject=Failed!!&icon=warning&col=danger&msg=Unsuccessful%20Try%20again%20later');
            }
}

?>