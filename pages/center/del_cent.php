<?php
include '../db_config.php';

if(isset($_POST['del_cent'])){
    $id = $_POST['centre_id'];
    echo $id;
        $sql ="DELETE FROM tbl_exam_centres WHERE centre_id=$id";
            if ($db->query($sql) === TRUE) {
                header('Location: ../center.php?subject=Success!!&icon=done_all&col=warning&msg=You%20have%20sucessfully%20deleted%20the%20centre');
            } else {
                header('Location: ../center.php?subject=Failed!!&icon=warning&col=danger&msg=Unsuccessful%20Try%20again%20later');
            }
}

?>