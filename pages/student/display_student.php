<?php
session_start();
$count_per = $_GET['display'];
$curr = $_GET['page'];
$y = ($curr-1) * $count_per ;
include '../db_config.php';
$_SESSION['user_status']='2';

if($_GET['search']==""){
    $sql_students = "SELECT * FROM tbl_students ORDER BY datetime LIMIT {$_GET['display']} OFFSET {$y};";
}
else{
  $sql_students = "SELECT * FROM tbl_students  WHERE name LIKE '%{$_GET['search']}%'  LIMIT {$_GET['display']} OFFSET {$y}";
}


$result_students = mysqli_query($db, $sql_students);
$total_students = mysqli_num_rows($result_students);

echo '<div class=" table-responsive text-center ">
<table style="width: 100%;" id="myTable" class="table table-bordered  responsive table-hover ">
    <thead class="text-center text-light">
        <tr>
            <th  style="background-color: #800080";> ⇵</th>
            <th style="background-color: #800080">Index Number &nbsp; ⇵</th>
            <th style="background-color: #800080">Name </th>
            <th style="background-color: #800080">Stream &nbsp; ⇵</th>
            <th style="background-color: #800080">District (Ranking) &nbsp; ⇵</th>
            <th style="background-color: #800080">Checked &nbsp; ⇵</th>
            <th style="background-color: #800080"> View & Modify Details </th>


        </tr>


    </thead>
    <tbody>';
                        
            
                        if($total_students > 0){
                            $i=0;
                            while($row_students = mysqli_fetch_assoc($result_students)){
                                $i++;
                                $x = $i + $y;
                                echo "<tr id='a'".$row_students['index_no']."width='100%'>";
                                echo "<td>".$x."</td>";
                                echo "<td>".$row_students['index_no']."</td>";
                                echo "<td>".$row_students['name']."</td>";
                                echo "<td>".$row_students['subject_group_id']."</td>";
                                echo "<td>".$row_students['district_ranking']."</td>";
                                
                                
                                if($row_students['checked']==1){
                                    echo "<td> <i  class='fa fa-circle text-success' aria-hidden='true'></i>&nbsp;
                                    Checked </td>";
                                }
                                else{
                                    echo "<td> <i  class='fa fa-circle text-danger' aria-hidden='true'></i>&nbsp;
                                    Unchecked </td>" ;
                                }

                                echo '<div><td class="bg-white123">
                        <button type="button" data-toggle="tooltip" data-placement="top" class="btn btn-info"
                            onclick="view('.$row_students['index_no'].')"><span
                                class="material-icons">visibility</span></button>
                        <button type="button" data-toggle="tooltip" data-placement="top" class="btn btn-warning"
                            onclick="edit1('.$row_students['index_no'].')"><span
                                class="material-icons">create</span></button>
                        <button type="button" data-toggle="tooltip" data-placement="top" class="btn btn-danger"
                            onclick="del1('.$row_students['index_no'].')"><span
                                class="material-icons">delete</span></button>
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
                $sql_students = "SELECT * FROM tbl_students ORDER BY datetime ;";
            }
            else{
              $sql_students = "SELECT * FROM tbl_students  WHERE name LIKE '{$_GET['search']}%' ";
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

                
