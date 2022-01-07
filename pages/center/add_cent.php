<?php
include '../db_config.php';

if(isset($_POST['place'])){
    $id =$_POST['district_id'];
    $centre_name = $_POST['centre_name'];
    $place = $_POST['place'];
    $gender = $_POST['gender'];
    


       $sql = "INSERT INTO tbl_exam_centres (district_id, centre_name, place, gender)
            VALUES ('{$id}', '{$centre_name}', '{$place}','{$gender}')";

            if ($db->query($sql) === TRUE) {
                header('Location: ../center.php?subject=Success!!&col=success&icon=done_all&msg=You%20have%20sucessfully%20added%20the%20centre');
            } else {
                header('Location: ../center.php?subject=Failed!!&col=danger&icon=warning&msg=Unsuccessful%20Try%20again%20later');
    
            }





}

?>