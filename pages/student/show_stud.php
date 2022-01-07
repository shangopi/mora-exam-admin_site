<?php
include '../db_config.php';
$district_option = array(
    '1' => 'Ampara',
    '2' => 'Anuradhapura',
    '3' => 'Badulla',
    '4' => 'Batticaloa',
    '5' => 'Colombo',
    '6' => 'Galle',
    '7' => 'Gampaha',
    '8' => 'Hambantota',
    '9' => 'Jaffna',
    '10' => 'Kalutara',
    '11' => 'Kandy',
    '12' => 'Kegalle',
    '13' => 'Kilinochchi',
    '14' => 'Kurunegala',
    '15' => 'Mannar',
    '16' => 'Matale',
    '17' => 'Matara',
    '18' => 'Monaragala',
    '19' => 'Mullaitivu',
    '20' => 'Nuwara-Eliya',
    '21' => 'Polonnaruwa',
    '22' => 'Puttalam',
    '23' => 'Ratnapura',
    '24' => 'Trincomalee',
    '25' => 'Vavuniya'
  );

  
if(isset($_GET['index_no'])){
    $id = $_GET['index_no'];



      $sql = "SELECT * FROM tbl_students WHERE index_no = '$id'";
      $result = $db->query($sql);
            
            
                        
                      

            if ($db->query($sql) == TRUE) {
                while($row = $result->fetch_assoc()) {
                    $sql2 = "SELECT centre_name FROM tbl_exam_centres WHERE centre_id = '".$row['centre_id']."'";
                    $result2 = $db->query($sql2);
                    $row2 = $result2->fetch_assoc();
                     $centre_name = $row2['centre_name'];
                    
                    echo $row['index_no'].'^'.$row['name'].'^'.$row['subject_group_id'].'^'.$row['medium'].'^'.$row['district_ranking'].'^'.$district_option[$row['district_id_sitting']].'^'.$centre_name.'^'.$row['nic'].'^'.$row['gender'].'^'.$row['school'].'^'.$row['address'].'^'.$row['email'].'^'.$row['telephone'].'^'.$row['checked'].'^'.$row['district_id_ranking'].'^'.$row['centre_id'].'^'.$row['district_id_sitting'].'^'.$row['user_id'].'^'.$row['checked_by'] ;
                   
                  }
                 
               





            } else {
                echo $db -> error;
    

            }
            





}

?>