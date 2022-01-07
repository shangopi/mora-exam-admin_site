<?php
session_start();
include '../db_config.php';
$index_no = $name = $nic = $mail = $dis_id = $dis_name = $school = $phone = $stream = $dis_sit = $dis_rank = $gender = $medium = $address = $centre = "";


if(isset($_POST['index_no'])){
    
    $index_no = $_POST['index_no'];
    $sql2 = "SELECT * FROM tbl_students WHERE index_no = $index_no ";
    $result = mysqli_query($db, $sql2);
    if ($result->num_rows > 0) {
        echo "Faliled!!@danger@warning@Index Number Already exists. Check it in the students table@0" ;

    }
    

    
    
    else{
        
        if(isset($_POST['name'])){
            $name = $_POST['name'];
        }    
        if(isset($_POST['nic'])){
            $nic = $_POST['nic'];
        }
        if(isset($_POST['mail'])){
            $mail = $_POST['mail'];
        }
        if(isset($_POST['school'])){
            $school = $_POST['school'];
        }
        if(isset($_POST['phone'])){
            $phone = $_POST['phone'];
        }
        if(isset($_POST['stream'])){
            $stream = $_POST['stream'];
        }
        if(isset($_POST['dis_sit'])){
            $dis_sit = $_POST['dis_sit'];
        }
        if(isset($_POST['dis_rank'])){
            $dis_rank = $_POST['dis_rank'];
            $list = explode("@",$dis_rank);
            $dis_id = $list[0];
            $dis_name = $list[1];
    
        }
        if(isset($_POST['gender'])){
            $gender = $_POST['gender'];
        }
        if(isset($_POST['medium'])){
            $medium = $_POST['medium'];
        }
        if(isset($_POST['address'])){
            $address = $_POST['address'];
        }
        if(isset($_POST['centre'])){
            $centre = $_POST['centre'];
        }
     
    
           $sql = " INSERT INTO tbl_students( index_no, name, subject_group_id, medium, district_id_ranking, district_ranking, district_id_sitting,centre_id, nic, gender, school, address, email, telephone, datetime, user_id, checked) VALUES ('{$index_no}','{$name}','{$stream}','{$medium}','{$dis_id}','{$dis_name}','{$dis_sit}','{$centre}','{$nic}','{$gender}','{$school}','{$address}','{$mail}','{$phone}',now(),'{$_SESSION['username']}','0')";
    
                if ($db->query($sql) == TRUE) {
                    echo "Success!!@success@done_all@You have sucessfullly added the student@1";
                    
                    
                } else {
                    $x =$db -> error;
                    echo "Faliled!!@danger@warning@Index Number Already exists. Check it in the students table or Server Error";
                }
    }

    
         




}

?>