<?php
session_start();

include '../db_config.php';

if(isset($_GET['index_nu'])){
    $index_nu = $_GET['index_nu'];
    
    $sql_marks = "SELECT * FROM tbl_marks WHERE index_no ='{$index_nu}'";
    $result_marks = mysqli_query($db, $sql_marks);
    $row = mysqli_fetch_assoc($result_marks);
    $out = $row['subject1_part1']."^".$row['subject1_part2']."^".$row['subject2_part1']."^".$row['subject2_part2']."^".$row['subject3_part1']."^".$row['subject3_part2']."^".$row['sub1_p1_entered_by']."^".$row['sub1_p2_entered_by']."^".$row['sub2_p1_entered_by']."^".$row['sub2_p2_entered_by']."^".$row['sub3_p1_entered_by']."^".$row['sub3_p2_entered_by']."^".$row['sub1_p1_checked_by']."^".$row['sub1_p2_checked_by']."^".$row['sub2_p1_checked_by']."^".$row['sub2_p2_checked_by']."^".$row['sub3_p1_checked_by']."^".$row['sub3_p2_checked_by'];
    echo $out;
}