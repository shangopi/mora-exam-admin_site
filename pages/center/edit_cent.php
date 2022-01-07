<?php
include '../db_config.php';

if(isset($_POST['edit_cent'])){
    $id = $_POST['centre_id'];
    $name = $_POST['centre_name'];
    $place = $_POST['place'];
    $gender = $_POST['gender'];

        $sql ="UPDATE tbl_exam_centres SET centre_name ='{$name}', place ='{$place}',gender='{$gender}' WHERE centre_id=$id";
        

            if ($db->query($sql) === TRUE) {
                
                header('Location: ../center.php?subject=Success!!&icon=done_all&col=info&msg=You%20have%20sucessfully%20edited%20the%20Centre%20Details');
            } else {
                
               header('Location: ../center.php?subject=Failed!!&icon=warning&col=danger&msg=Unsuccessful%20Try%20again%20later');
            }
}

?>