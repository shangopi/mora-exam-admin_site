<?php
include '../db_config.php';

if(isset($_POST['del_dis'])){
    $id = $_POST['district_id'];
        echo $id;
        $sql ="DELETE FROM tbl_exam_districts WHERE district_id=$id";
            if ($db->query($sql) === TRUE) {
                header('Location: ../center.php?subject=Success!!&icon=done_all&col=warning&msg=You%20have%20sucessfully%20deleted%20the%20district');
            } else {
                header('Location: ../center.php?subject=Failed!!&icon=warning&col=danger&msg=Unsuccessful%20Try%20again%20later');
            }
}

?>