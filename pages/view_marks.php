<?php include 'header.php';?>
<?php
$_SESSION['user_status']='2';
$sql_students = "SELECT * FROM tbl_students ORDER BY datetime LIMIT 10;";
$result_students = mysqli_query($db, $sql_students);
$total_students = mysqli_num_rows($result_students);
$sql_districts = "SELECT * FROM tbl_exam_districts ORDER BY district ASC";
$result_districts = mysqli_query($db, $sql_districts);
$total_districts = mysqli_num_rows($result_districts);
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

?>
<style>
    /* code for loader */
    .loader {
        border: 4px solid #f3f3f3;
        /* Light grey */
        border-top: 4px solid purple;
        /* Blue */
        border-radius: 50%;
        width: 30px;
        height: 30px;
        animation: spin 2s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>


<!-- modal for view details -->
<div id="modal1" style="transform :translateY(10%); " class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog .modal-sm	" role="document">
        <div class="modal-content" style="background-color:#f5edf5;">


            <div class="card" style=" ">
                <div class="card-header card-header-tabs card-header-primary">
                    <div class="nav-tabs-navigation d-flex justify-content-center">
                        <div class="nav-tabs-wrapper">

                            <ul class="nav nav-tabs " data-tabs="tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#profile" data-toggle="tab">
                                        <i class="material-icons">blur_on</i>
                                        Subject 1
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#messages" data-toggle="tab">
                                        <i class="material-icons">blur_on</i>
                                        Subject 2
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#settings" data-toggle="tab">
                                        <i class="material-icons">blur_on</i>
                                        Subject 3
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="profile">
                            <table class="table">
                                <tbody>
                                    <tr>

                                        <td>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">bubble_chart</i> &nbsp; Part 1 - Marks
                                                    </span>
                                                </div>
                                                <input id="ss11" readonly type="text" value="SHANMUGAVADIVEL GOPINATH"
                                                    class="form-control">
                                            </div>
                                        </td>
                                        <td class="td-actions text-right">

                                        </td>
                                    </tr>
                                    <tr>

                                        <td>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">bubble_chart</i> &nbsp; Part 2 - Marks
                                                    </span>
                                                </div>
                                                <input id="ss12" readonly type="text" value="MALE" class="form-control">
                                            </div>
                                        </td>
                                        <td class="td-actions text-right">

                                        </td>
                                    </tr>
                                    <tr>

                                        <td>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">bubble_chart</i> &nbsp; Part 1 - Entered by  
                                                    </span>
                                                </div>
                                                <input id="ss111" readonly type="text" value="MALE" class="form-control">
                                            </div>
                                        </td>
                                        <td class="td-actions text-right">

                                        </td>
                                    </tr>
                                    <tr>

                                        <td>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">bubble_chart</i> &nbsp; Part 2 - Entered by 
                                                    </span>
                                                </div>
                                                <input id="ss121" readonly type="text" value="MALE" class="form-control">
                                            </div>
                                        </td>
                                        <td class="td-actions text-right">

                                        </td>
                                    </tr>
                                    <tr>

                                        <td>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">bubble_chart</i> &nbsp; Part 1 - Checked by 
                                                    </span>
                                                </div>
                                                <input id="ss112" readonly type="text" value="MALE" class="form-control">
                                            </div>
                                        </td>
                                        <td class="td-actions text-right">

                                        </td>
                                    </tr>
                                    <tr>

                                        <td>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">bubble_chart</i> &nbsp; Part 2 - Checked by 
                                                    </span>
                                                </div>
                                                <input id="ss122" readonly type="text" value="MALE" class="form-control">
                                            </div>
                                        </td>
                                        <td class="td-actions text-right">

                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="messages">
                            <table class="table">
                                <tbody>
                                    <tr>

                                        <td>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">bubble_chart</i> &nbsp; Part 1 - Marks
                                                    </span>
                                                </div>
                                                <input id="ss21" readonly type="text" value="SHANMUGAVADIVEL GOPINATH"
                                                    class="form-control">
                                            </div>
                                        </td>
                                        <td class="td-actions text-right">

                                        </td>
                                    </tr>
                                    <tr>

                                        <td>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">bubble_chart</i> &nbsp; Part 2 - Marks
                                                    </span>
                                                </div>
                                                <input id="ss22" readonly type="text" value="MALE" class="form-control">
                                            </div>
                                        </td>
                                        <td class="td-actions text-right">

                                        </td>
                                    </tr>
                                    <tr>

                                        <td>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">bubble_chart</i> &nbsp; Part 1 - Entered by  
                                                    </span>
                                                </div>
                                                <input id="ss211" readonly type="text" value="MALE" class="form-control">
                                            </div>
                                        </td>
                                        <td class="td-actions text-right">

                                        </td>
                                    </tr>
                                    <tr>

                                        <td>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">bubble_chart</i> &nbsp; Part 2 - Entered by 
                                                    </span>
                                                </div>
                                                <input id="ss221" readonly type="text" value="MALE" class="form-control">
                                            </div>
                                        </td>
                                        <td class="td-actions text-right">

                                        </td>
                                    </tr>
                                    <tr>

                                        <td>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">bubble_chart</i> &nbsp; Part 1 - Checked by 
                                                    </span>
                                                </div>
                                                <input id="ss212" readonly type="text" value="MALE" class="form-control">
                                            </div>
                                        </td>
                                        <td class="td-actions text-right">

                                        </td>
                                    </tr>
                                    <tr>

                                        <td>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">bubble_chart</i> &nbsp; Part 2 - Checked by 
                                                    </span>
                                                </div>
                                                <input id="ss222" readonly type="text" value="MALE" class="form-control">
                                            </div>
                                        </td>
                                        <td class="td-actions text-right">

                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="settings">
                            <table class="table">
                                <tbody>
                                    <tr>

                                        <td>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">bubble_chart</i> &nbsp; Part 1 - Marks
                                                    </span>
                                                </div>
                                                <input id="ss31" readonly type="text" value="SHANMUGAVADIVEL GOPINATH"
                                                    class="form-control">
                                            </div>
                                        </td>
                                        <td class="td-actions text-right">

                                        </td>
                                    </tr>
                                    <tr>

                                        <td>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">bubble_chart</i> &nbsp; Part 2 - Marks
                                                    </span>
                                                </div>
                                                <input id="ss32" readonly type="text" value="MALE" class="form-control">
                                            </div>
                                        </td>
                                        <td class="td-actions text-right">

                                        </td>
                                    </tr>
                                    <tr>

                                        <td>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">bubble_chart</i> &nbsp; Part 1 - Entered by  
                                                    </span>
                                                </div>
                                                <input id="ss311" readonly type="text" value="MALE" class="form-control">
                                            </div>
                                        </td>
                                        <td class="td-actions text-right">

                                        </td>
                                    </tr>
                                    <tr>

                                        <td>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">bubble_chart</i> &nbsp; Part 2 - Entered by 
                                                    </span>
                                                </div>
                                                <input id="ss321" readonly type="text" value="MALE" class="form-control">
                                            </div>
                                        </td>
                                        <td class="td-actions text-right">

                                        </td>
                                    </tr>
                                    <tr>

                                        <td>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">bubble_chart</i> &nbsp; Part 1 - Checked by 
                                                    </span>
                                                </div>
                                                <input id="ss312" readonly type="text" value="MALE" class="form-control">
                                            </div>
                                        </td>
                                        <td class="td-actions text-right">

                                        </td>
                                    </tr>
                                    <tr>

                                        <td>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">bubble_chart</i> &nbsp; Part 2 - Checked by 
                                                    </span>
                                                </div>
                                                <input id="ss322" readonly type="text" value="MALE" class="form-control">
                                            </div>
                                        </td>
                                        <td class="td-actions text-right">

                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="messages">
                            <table class="table">
                                <tbody>
                                    <tr>

                                        <td>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">bubble_chart</i> &nbsp; Part 1 - Marks
                                                    </span>
                                                </div>
                                                <input id="ss21" readonly type="text" value="SHANMUGAVADIVEL GOPINATH"
                                                    class="form-control">
                                            </div>
                                        </td>
                                        <td class="td-actions text-right">

                                        </td>
                                    </tr>
                                    <tr>

                                        <td>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">bubble_chart</i> &nbsp; Part 2 - Marks
                                                    </span>
                                                </div>
                                                <input id="ss22" readonly type="text" value="MALE" class="form-control">
                                            </div>
                                        </td>
                                        <td class="td-actions text-right">

                                        </td>
                                    </tr>
                                    

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

            <div style="transform :translateY(-28px); " class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="edit1234" type="button" class="btn btn-warning"> Edit </button>



            </div>

        </div>
    </div>
</div>

<div class="container">
    <br>
    <br>

    <div id="id5">

        <div id="id1" class="alert alert-dismissible alert-with-icon fade show" role="alert">
            <h4 id="id2" class="alert-heading">
                <div class="loader"></div> <br>
                Wait ..... Page is loading
            </h4>
            <p id="id3"></p>
            <i class="material-icons" data-notify="icon">
                <div id="id4"></div>
            </i>
            <button type="button" class="close" onclick="close_123()">
                <span aria-hidden="true">&times;</span>
            </button>
            <br>
        </div>
    </div>

    <div class="row justify-content-end">
        <div class="col-6 col-lg-10">
            <h3 style="text-align:center">


            </h3>
        </div>
        <div class="col-6 col-lg-2">
            <a href="add_students.php">
                <button type="button" class="btn btn-success my-4"> <span class="material-icons"> add_circle_outline
                    </span>
                    &nbsp;Add Marks</button>
            </a>
        </div>
    </div>
    <div class=" row" style="text-align: center;">

        <div class="dropdown col-12 col-sm-6 ">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Display Preference
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a onclick="show_table('10','1','1')" class="dropdown-item" href="#">DISPLAY 10 STUDENTS</a>
                <a onclick="show_table('25','1','1')" class="dropdown-item" href="#">DISPLAY 25 STUDENTS</a>
                <a onclick="show_table('50','1','1')" class="dropdown-item" href="#">DISPLAY 50 STUDENTS</a>
            </div>
        </div>
        <div class="col-12  col-sm-6 " id="myTable_filter" class="dataTables_filter"><label>Search Students<span
                    class="bmd-form-group bmd-form-group-sm"><input onkeyup="show_table('10','1')" type="search"
                        id="searchtxt" class="form-control form-control-sm" placeholder=""
                        aria-controls="myTable"></span></label>
        </div>
    </div>

    <br>



    <script>
        function show_table(display, page, order_by) {
            if (display == "gopi_null") {


                display = "10";


            }
            var search = $('#searchtxt').val();




            $.ajax({
                type: "GET",
                url: "marks/display_marks.php",
                data: {
                    display: display,
                    page: page,
                    search: search,
                    order_by: order_by
                },
                success: function (data) {

                    $('#table_here').html(data);
                    

                }
            });


        }


        $(document).ready(function () {


            $('#id5').hide();
            $("#title123").text("View Marks ");
            $("#n6").addClass("active");
            show_table("gopi_null", "1", "1");
            
        })

        function view(index_nu) {
            $('#modal1').modal('show');
            $.ajax({
                type: "GET",
                url: "marks/show_marks.php",
                data: {
                    index_nu : index_nu
                },
                success: function (data) {
                    
                    $list = data.split("^");
                    
                    $('#ss11').val($list[0]);
                    $('#ss12').val($list[1]);
                    $('#ss21').val($list[2]);
                    $('#ss22').val($list[3]);
                    $('#ss31').val($list[4]);
                    $('#ss32').val($list[5]);
                    $('#ss111').val($list[6]);
                    $('#ss121').val($list[7]);
                    $('#ss211').val($list[8]);
                    $('#ss221').val($list[9]);
                    $('#ss311').val($list[10]);
                    $('#ss321').val($list[11]);
                    
                    if($list[11]==""){
                        $('#ss112').val("Not Checked");
                    }
                    else{
                        $('#ss112').val($list[11]);
                    }
                    if($list[12]==""){
                        $('#ss122').val("Not Checked");
                    }
                    else{
                        $('#ss122').val($list[12]);
                    }
                    if($list[13]==""){
                        $('#ss212').val("Not Checked");
                    }
                    else{
                        $('#ss212').val($list[13]);
                    }
                    if($list[14]==""){
                        $('#ss222').val("Not Checked");
                    }
                    else{
                        $('#ss222').val($list[14]);
                    }
                    if($list[15]==""){
                        $('#ss312').val("Not Checked");
                    }
                    else{
                        $('#ss312').val($list[15]);
                    }
                    if($list[16]==""){
                        $('#ss322').val("Not Checked");
                    }
                    else{
                        $('#ss322').val($list[16]);
                    }

                }
            });


        }

       
    </script>

    <div id="table_here">


    </div>



</div>

<?php include 'footer.php';?>