<?php
session_start();
$count_per = $_GET['display'];
$curr = $_GET['page'];
$y = ($curr-1) * $count_per ;
include '../db_config.php';
$_SESSION['user_status']='2';

if($_GET['search']==""){
    $sql_students = "SELECT index_no,name,subject_group_id FROM tbl_students ORDER BY datetime LIMIT {$_GET['display']} OFFSET {$y};";
}
else{
  $sql_students = "SELECT index_no,name,subject_group_id FROM tbl_students  WHERE index_no LIKE '%{$_GET['search']}%' OR name LIKE '%{$_GET['search']}%' LIMIT {$_GET['display']} OFFSET {$y}";
}


$result_students = mysqli_query($db, $sql_students);
$total_students = mysqli_num_rows($result_students);

echo '<div class=" table-responsive text-center ">
<table style="width: 100%;" id="myTable" class="table table-bordered  responsive table-hover hide">
    <thead class="text-center text-light">
        <tr>
            <th  style="background-color: #800080";> ⇵</th>
            <th style="background-color: #800080">Index Number</th>
            
            <th style="background-color: #800080">Name </th>
            <th style="background-color: #800080">Stream </th>
            <th style="background-color: #800080">Maths/Bio</th>
            <th style="background-color: #800080">Physics</th>
            <th style="background-color: #800080">Chemistry/ ICT </th>
            <th style="background-color: #800080"> View & Modify Details </th>


        </tr>


    </thead>
    <tbody>';
    

               
                        if($total_students > 0){
                            $i=0;
                            while($row_students = mysqli_fetch_assoc($result_students)){
                                $i++;
                                $sql_marks = "SELECT subject1_part1,subject1_part2,subject2_part1,subject2_part2,subject3_part1,subject3_part2 FROM tbl_marks WHERE index_no ='{$row_students['index_no']}'";
                                $result_marks = mysqli_query($db, $sql_marks);
                                $row_marks = mysqli_fetch_assoc($result_marks);
                                $bio1 = $row_marks['subject1_part1'];
                                $bio2 = $row_marks['subject1_part2'];
                                $bio = 0.5 * ($bio1 + $bio2);
                                $phy1 = $row_marks['subject2_part1'];
                                $phy2 = $row_marks['subject2_part2'];
                                $phy = 0.5 * ($phy1 + $phy2);
                                $che1 = $row_marks['subject3_part1'];
                                $che2 = $row_marks['subject3_part2'];
                                $che = 0.5 * ($che1 + $che2);
                                $x = $i + $y;
                                echo "<tr id='a'".$row_students['index_no']."width='100%'>";
                                echo "<td>".$x."</td>";
                                echo "<td>".$row_students['index_no']."</td>";
                                echo "<td>".$row_students['name']."</td>";
                                echo "<td>".$row_students['subject_group_id']."</td>";
                                
                                echo "<td>".$bio."</td>";
                                echo "<td>".$phy."</td>";
                                echo "<td>".$che."</td>";
                             
                                
                                echo '<div><td class="bg-white123">
                        <button type="button" data-toggle="tooltip" data-placement="top" class="btn btn-info"
                            onclick="view('.$row_students['index_no'].')">
                            <span     class="material-icons">visibility</span></button>
                        <button type="button" data-toggle="tooltip" data-placement="top" class="btn btn-warning"
                            onclick="window.location.href = \'manage_marks.php\';"><span
                                class="material-icons">create</span></button>
                        
                    </td>
                </tr></div>'


                                                      
                                                      
                                                      
                                                      ?>

                 


                <?php } } else { 
                    
                    echo ' <tr>
                    <td class="text-center" colspan="11">No records found.</td>
                </tr>';
                } 
                    
                echo '
                </tbody>
            </table>
                        <br>
            <div  class=" d-flex justify-content-center dataTables_paginate paging_simple_numbers" id="myTable_paginate">
            <ul class="pagination">';






            if($_GET['search']==""){
                $sql_students = "SELECT index_no,name FROM tbl_students ORDER BY datetime ;";
            }
            else{
              $sql_students = "SELECT index_no,name FROM tbl_students  WHERE name LIKE '{$_GET['search']}%' ";
            }
                
                $result_students = mysqli_query($db, $sql_students);
                $total = mysqli_num_rows($result_students);
                $pages =  ceil($total/$count_per);
                $a = $curr-1;
                $b = $curr+1;
               if($pages>0){
                if($curr==1){
                    echo '<li class="paginate_button page-item previous disabled" id="myTable_previous">   <a  href="#" aria-controls="myTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>';
                    
                }
                else{
                    echo '<li class="paginate_button page-item previous" id="myTable_previous">   <a onclick="show_table(10,'.$a.')" href="#" aria-controls="myTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>';

                }



                if($pages<=6){
                    for($i=1;$i<=$pages;$i++){
                        if($i==$curr){
                            echo '<li class="paginate_button page-item active"> <a href="#" aria-controls="myTable" data-dt-idx="1" tabindex="0" class="page-link">'.$i.'</a></li>';
                        }
                        else{
                            echo '<li class="paginate_button page-item "> <a onclick="show_table("10",'.$i.')" href="" aria-controls="myTable" data-dt-idx="1" tabindex="0" class="page-link">'.$i.'</a></li>';
                        }
                    }
                    

                }

                if($pages>7){
                        if($curr<5){

                            for($i=1;$i<=5;$i++){
                                if($i==$curr){
                                    echo '<li class="paginate_button page-item active"> <a href="#" aria-controls="myTable" data-dt-idx="1" tabindex="0" class="page-link">'.$i.'</a></li>';
                                }
                                else{
                                    echo '<li class="paginate_button page-item "> <a onclick="show_table(10,'.$i.')" href="#" aria-controls="myTable" data-dt-idx="1" tabindex="0" class="page-link">'.$i.'</a></li>';
                                }
                            }
                            echo'<li class="paginate_button page-item disabled" id="myTable_ellipsis"><a href="#" aria-controls="myTable" data-dt-idx="6" tabindex="0" class="page-link">…</a></li>
                            <li class="paginate_button page-item "><a  onclick="show_table(10,'.$pages.')"href="#" aria-controls="myTable" data-dt-idx="7" tabindex="0" class="page-link">'.$pages.'</a></li>';

                        }
                        else{
                            echo '<li class="paginate_button page-item "> <a  onclick="show_table(10,1)" href="#" aria-controls="myTable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>';
                            echo'<li class="paginate_button page-item disabled" id="myTable_ellipsis"><a  href="#" aria-controls="myTable" data-dt-idx="6" tabindex="0" class="page-link">…</a></li>';
                            
                            echo'<li class="paginate_button page-item " id="myTable_ellipsis"><a  onclick="show_table(10,'.$a.')" href="#" aria-controls="myTable" data-dt-idx="6" tabindex="0" class="page-link">'.$a.'</a></li>';
                            echo'<li class="paginate_button page-item  active" id="myTable_ellipsis"><a onclick="show_table(10,'.$curr.')" href="#" aria-controls="myTable" data-dt-idx="6" tabindex="0" class="page-link">'.$curr.'</a></li>';
                            if($curr!=$pages){
                                echo'<li class="paginate_button page-item " id="myTable_ellipsis"><a onclick="show_table(10,'.$b.')" href="#" aria-controls="myTable" data-dt-idx="6" tabindex="0" class="page-link">'.$b.'</a></li>';
                                echo'<li class="paginate_button page-item disabled" id="myTable_ellipsis"><a href="#" aria-controls="myTable" data-dt-idx="6" tabindex="0" class="page-link">…</a></li>';
                                echo '<li class="paginate_button page-item "><a onclick="show_table(10,'.$pages.')" href="#" aria-controls="myTable" data-dt-idx="7" tabindex="0" class="page-link">'.$pages.'</a></li>';


                            }
                            





                        }



                }














                if($pages == $curr){
                    echo ' <li class="paginate_button page-item next disabled" id="myTable_next"><a   href="#" aria-controls="myTable" data-dt-idx="8" tabindex="0" class="page-link">Next</a></li>
                    </ul></div>';

                }
                else{
                    echo ' <li class="paginate_button page-item next" id="myTable_next"><a onclick="show_table(10,'.$b.')" href="#" aria-controls="myTable" data-dt-idx="8" tabindex="0" class="page-link">Next</a></li>
                    </ul></div>';
                }
            }

                
/*
echo '
          
        
        <li class="paginate_button page-item previous disabled" id="myTable_previous">   <a href="#" aria-controls="myTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
        <li class="paginate_button page-item active"> <a href="#" aria-controls="myTable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
        <li class="paginate_button page-item "><a href="#" aria-controls="myTable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
        <li class="paginate_button page-item "><a href="#" aria-controls="myTable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
        <li class="paginate_button page-item "><a href="#" aria-controls="myTable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
        <li class="paginate_button page-item "><a href="#" aria-controls="myTable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
        <li class="paginate_button page-item disabled" id="myTable_ellipsis"><a href="#" aria-controls="myTable" data-dt-idx="6" tabindex="0" class="page-link">…</a></li>
        <li class="paginate_button page-item "><a href="#" aria-controls="myTable" data-dt-idx="7" tabindex="0" class="page-link">999</a></li>
        <li class="paginate_button page-item next" id="myTable_next"><a href="#" aria-controls="myTable" data-dt-idx="8" tabindex="0" class="page-link">Next</a></li>
        </ul></div>





    ';*/