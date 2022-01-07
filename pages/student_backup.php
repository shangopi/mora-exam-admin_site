<?php include 'header.php';?>

<?php
$_SESSION['user_status']='2';
$sql_students = "SELECT * FROM tbl_students ORDER BY datetime;";
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
    .dataTables_length select {
        -webkit-appearance: auto;
        position: relative;
        display: block;
        width: 100%;
        margin: 0 auto;
        font-family: 'Open Sans', 'Helvetica Neue', 'Segoe UI', 'Calibri', 'Arial', sans-serif;

        color: #60666d;

    }

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
<script>
    var count123 = 0;

    function close_123() {

        $('#id1').hide();
    }

    function del1(index_no) {

        $('#del_stu3').modal('show');
        $('#example3ModalLabel').text("Are you sure? \n you want to delete " + $('#a' + index_no).find("td:eq(2)")
            .text() +
            "  Details ?");

        $("#del_stu2").click(function () {

            $.ajax({
                type: "GET",
                url: "student/del_stu.php",
                data: {
                    index_no: index_no
                },
                success: function (data) {

                    //$('#dyn_txt').html(data);
                    $('#id5').show();
                    $('#id1').show();

                    $('#del_stu3').modal('hide');
                    $('#a' + index_no).hide();
                    $res = data.split("@");
                    $('#id1').removeClass('alert-warning');
                    $('#id1').removeClass('alert-danger');
                    $('#id1').removeClass('alert-success');
                    $('#id1').addClass('alert-' + $res[1]);
                    $('#id2').text($res[0]);
                    $('#id3').text($res[3]);
                    $('#id4').html($res[2]);




                }
            });
        });

    }

    function edit1(index_no) {
        $('#modal1').modal('hide');
        $('#edit_stu3').modal('show');
        $.ajax({
            type: "GET",
            url: "student/show_stud.php",
            data: {
                index_no: index_no
            },
            success: function (data) {
                $list = data.split("^")
                // $('#dyn_txt').html($list);

                $('#index_no3').val($list[0]);
                $('#name3').val($list[1]);
                //  $('#stream3').val($list[2]);
                if ($list[2] == "MATHS") {
                    $('#exampleRadios6').removeAttr('checked');
                    $('#exampleRadios7').removeAttr('checked');
                    $('#exampleRadios8').removeAttr('checked');
                    $('#exampleRadios5').attr('checked', true);
                } else if ($list[2] == "BIO") {
                    $('#exampleRadios5').removeAttr('checked');
                    $('#exampleRadios7').removeAttr('checked');
                    $('#exampleRadios8').removeAttr('checked');
                    $('#exampleRadios6').attr('checked', true);
                } else if ($list[2] == "ICT(MATHS)" || $list[2] == "ICT (MATHS)") {
                    $('#exampleRadios6').removeAttr('checked');
                    $('#exampleRadios5').removeAttr('checked');
                    $('#exampleRadios8').removeAttr('checked');
                    $('#exampleRadios7').attr('checked', true);
                } else if ($list[2] == "ICT(BIO)" || $list[2] == "ICT (BIO)") {
                    $('#exampleRadios6').removeAttr('checked');
                    $('#exampleRadios7').removeAttr('checked');
                    $('#exampleRadios5').removeAttr('checked');
                    $('#exampleRadios8').attr('checked', true);
                }




                //   $('#medium3').val($list[3]);
                if ($list[3] == "english" || $list[3] == "English") {
                    $('#exampleRadios4').removeAttr('checked');
                    $('#exampleRadios3').attr('checked', true);
                } else if ($list[3] == "tamil" || $list[3] == "Tamil") {
                    $('#exampleRadios3').removeAttr('checked');
                    $('#exampleRadios4').attr('checked', true);
                }

                if ($list[8] == "male" || $list[8] == "Male") {
                    $('#exampleRadios2').removeAttr('checked');
                    $('#exampleRadios1').attr('checked', true);
                } else if ($list[8] == "female" || $list[8] == "Female") {
                    $('#exampleRadios1').removeAttr('checked');
                    $('#exampleRadios2').attr('checked', true);
                }



                $('#uyt').val($list[14] + '@' + $list[4]);
                $('#id123').val($list[16] + '@' + $list[5]);
                $.ajax({
                    type: "GET",
                    url: "student/show_cent2.php",
                    data: {
                        id: $list[16],
                        id2: $list[15]
                    },
                    success: function (data) {

                        $('#dyn_txt1').html(data);

                    }
                });


                $('#nic3').val($list[7]);
                //   $('#gender3').val($list[8]);
                $('#school3').val($list[9]);
                $('#address3').val($list[10]);
                $('#mail3').val($list[11]);
                $('#phone3').val($list[12]);

                $("#edit_stu2").click(function () {


                    $.ajax({
                        type: "POST",
                        url: "student/edit_stu.php",
                        data: $('#frm').serialize(),
                        success: function (data) {
                            //$('#dyn_txt').html(data);

                            $('#id5').show();
                            $('#id1').show();
                            $res = data.split("@");
                            $('#id1').removeClass('alert-warning');
                            $('#id1').removeClass('alert-danger');
                            $('#id1').removeClass('alert-success');
                            $('#id1').addClass('alert-' + $res[1]);
                            $('#id2').text($res[0]);
                            $('#id3').text($res[3]);
                            $('#id4').html($res[2]);
                            $('#a' + index_no).find("td:eq(5)").html(
                                "<i  class='fa fa-circle text-danger' aria-hidden='true'></i>&nbsp; Unchecked"
                            );

                            $('#a' + index_no).find("td:eq(2)").text($('#name3').val());
                            $radioValue2 = $("input[name='stream']:checked").val();
                            $('#a' + index_no).find("td:eq(3)").text($radioValue2);
                            $temp = $('#uyt').val();
                            $res = $temp.split("@")[1];
                            $('#a' + index_no).find("td:eq(4)").text($res);
                            $('#edit_stu3').modal('hide');
                            //$('#a' + id).find("td:eq(2)").text()
                            //$('#a' + id).find("td:eq(2)").text();

                        }
                    });
                });


            }
        });


    }
    function show_table( display, page) {
            if (display == "gopi_null") {
                
                            
                            display = "10";
                        
                
            }
            var search = $('#searchtxt').val();
           
            


            $.ajax({
                type: "GET",
                url: "student/display_student.php",
                data: {
                    display: display,
                    page : page,
                    search : search
                },
                success: function (data) {

                    $('#table_here').html(data);

                }
            });


        }

    function view(index_no) {
        $index_no = index_no
        $.ajax({
            type: "GET",
            url: "student/show_stud.php",
            data: {
                index_no: $index_no
            },
            success: function (data) {
                $list = data.split("^")
                // $('#dyn_txt').html($list);
                $('#modal1').modal('show');
                $('#index_no1').val($list[0]);
                $('#name1').val($list[1]);
                $('#stream1').val($list[2]);
                $('#medium1').val($list[3]);
                $('#dis_rank1').val($list[4]);
                $('#dis_sit1').val($list[5]);
                $('#centre1').val($list[6]);
                $('#nic1').val($list[7]);
                $('#gender1').val($list[8]);
                $('#school1').val($list[9]);
                $('#address1').val($list[10]);
                $('#mail1').val($list[11]);
                $('#phone1').val($list[12]);
                if ($list[13] == 1) {
                    $('#check123').hide();
                } else {
                    $('#check123').show();
                }
                $("#edit1234").click(function () {
                    edit1($index_no);
                });
                $("#check123").click(function () {
                    $.ajax({
                        type: "GET",
                        url: "student/check.php",
                        data: {
                            index_no: $index_no
                        },
                        success: function (data) {

                            //$('#dyn_txt').html(data);
                            $('#id5').show();
                            $('#id1').show();
                            $('#a' + index_no).find("td:eq(5)").html(
                                "<i  class='fa fa-circle text-success' aria-hidden='true'></i>&nbsp; Checked"
                            );
                            $('#modal1').modal('hide');

                            $res = data.split("@");
                            $('#id1').removeClass('alert-warning');
                            $('#id1').removeClass('alert-danger');
                            $('#id1').removeClass('alert-success');
                            $('#id1').addClass('alert-' + $res[1]);
                            $('#id2').text($res[0]);
                            $('#id3').text($res[3]);
                            $('#id4').html($res[2]);

                        }
                    });
                });



            }
        });





    }

    $(document).ready(function () {


        $('#id5').hide();
        $("#title123").text("Students ");
        $("#n4").addClass("active");
        show_table("gopi_null","1");

        $('#id123').on('change', function () {
            $dis = this.value;
            $id = $dis.split("@")[0];
            $('#uyt').val($dis);

            $.ajax({
                type: "GET",
                url: "student/show_cent.php",
                data: {
                    id: $id
                },
                success: function (data) {

                    $('#dyn_txt1').html(data);

                }
            });

        });



        $('#myTable').DataTable({
            "lengthMenu": [
                [10, 25, 50, 100],
                ["10 STUDENTS ", "25 STUDENTS", "50 STUDENTS", "100 STUDENTS"]
            ],
            'responsive': true,

            "oLanguage": {

                "sLengthMenu": "Display _MENU_ per page",
                "sSearch": "Search Students"
            },

            //disabling sort for selected columns
            'columnDefs': [{
                'targets': [2, 6],
                /* column index */
                'orderable': false,
                /* true or false */
            }]



        });
        $('#myTable').removeClass('hide');


        //enabling bootstrap tooltip
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        })




    });
</script>
<style>
    .hide {
        display: none;
    }

    .badge {
        background-color: purple;


        .label {
            font-weight: bold;
        }
    }

    .badge:hover {
        background-color: green;
    }

    thead {
        background-color: purple;
    }


    /* Important part */
    #ii1 {
        overflow-y: initial;
    }

    #ii2 {
        height: 80vh;
        overflow-y: auto;
    }
</style>


<hr>

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


    <div id="dyn_txt"></div>

    <div class="row justify-content-end">
        <div class="col-6 col-lg-10">
            <h3 style="text-align:left">
                Total Students : <span id="deldel" class="badge badge-pill badge-success">
                    <?php echo $total_students ;  ?>
                </span>
            </h3>
        </div>
        <div class="col-6 col-lg-2">
            <a href="add_students.php">
                <button type="button" class="btn btn-success my-4"> <span class="material-icons"> add_circle_outline
                    </span>
                    &nbsp;Add Studets</button>
            </a>
        </div>

    </div>

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
                                            <i class="material-icons">account_circle</i> Basic
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#messages" data-toggle="tab">
                                            <i class="material-icons">domain</i> Exam
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#settings" data-toggle="tab">
                                            <i class="material-icons">alternate_email</i> Contact
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
                                                            <i class="material-icons">perm_identity</i> &nbsp; Full Name
                                                        </span>
                                                    </div>
                                                    <input id="name1" readonly type="text"
                                                        value="SHANMUGAVADIVEL GOPINATH" class="form-control">
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
                                                            <i class="material-icons">wc</i> &nbsp; Gender
                                                        </span>
                                                    </div>
                                                    <input id="gender1" readonly type="text" value="MALE"
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
                                                            <i class="material-icons">eco
                                                            </i> &nbsp; NIC Number
                                                        </span>
                                                    </div>
                                                    <input id="nic1" readonly type="text" value="992113740V"
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
                                                            <i class="material-icons">school</i> &nbsp; School
                                                        </span>
                                                    </div>
                                                    <input id="school1" readonly type="text"
                                                        value="Jaffna Hindu College" class="form-control">
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
                                                            <i class="material-icons">import_contacts</i> &nbsp; Stream
                                                        </span>
                                                    </div>
                                                    <input id="stream1" readonly type="text" value="MATHS"
                                                        class="form-control">
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
                                                            <i class="material-icons">label_important
                                                            </i> &nbsp; Index Number
                                                        </span>
                                                    </div>
                                                    <input id="index_no1" readonly type="text" value="190199A"
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
                                                            <i class="material-icons">translate</i> &nbsp; Medium
                                                        </span>
                                                    </div>
                                                    <input id="medium1" readonly type="text" value="Tamil"
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
                                                            <i class="material-icons">pin_drop</i> &nbsp; Centre
                                                        </span>
                                                    </div>
                                                    <input id="centre1" readonly type="text"
                                                        value="Jaffna Hindu College" class="form-control">
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
                                                            <i class="material-icons">gps_fixed</i> &nbsp; District (for
                                                            Sitting)
                                                        </span>
                                                    </div>
                                                    <input id="dis_sit1" readonly type="text" value="Jaffna"
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
                                                            <i class="material-icons">map</i> &nbsp; District (for
                                                            Ranking)
                                                        </span>
                                                    </div>
                                                    <input id="dis_rank1" readonly type="text" value="Jaffna"
                                                        class="form-control">
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
                                                            <i class="material-icons">mail</i> &nbsp; E-mail
                                                        </span>
                                                    </div>
                                                    <input id="mail1" readonly type="text"
                                                        value="shanmathujan@gmail.com" class="form-control">
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
                                                            <i class="material-icons">tty</i> &nbsp; Phone Number
                                                        </span>
                                                    </div>
                                                    <input id="phone1" readonly type="text" value="0766891372"
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
                                                            <i class="material-icons">home</i> &nbsp; Address
                                                        </span>
                                                    </div>
                                                    <input id="address1" readonly type="text"
                                                        value="Neervely South Neervely" class="form-control">
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
                    <button id="check123" type="button" class="btn btn-primary"> Check </button>


                </div>

            </div>
        </div>
    </div>

    <!-- Modal for delete student-->
    <div class="modal fade" id="del_stu3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Student !</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <h5 class="modal-title" id="example3ModalLabel">Delete Student</h5>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No Cancel</button>
                    <button type="submit" id="del_stu2" class="btn btn-primary">Yes Delete</button>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal for edit student-->
    <div class="modal fade modal-dialog-scrollable" id="edit_stu3" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div id="ii1" class="modal-dialog  modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">

                <div id="ii2" class="modal-body">
                    <div class="card" style="margin-bottom:0;">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Edit Student</h4>

                        </div>
                        <div class="card-body">
                            <form id="frm">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Index No. </label>
                                            <input readonly type="text" value="grt" VALUE="21" autofocus id="index_no3"
                                                pattern="[2]{1}[1]{1}[BM]{1}[0-9]{4}" required name="index_no"
                                                maxlength="7" minlength="7" class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating"> Full Name</label>

                                            <input type="text" value="grt" id="name3" required name="name"
                                                class="form-control">

                                        </div>
                                    </div>



                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">NIC Number </label>
                                            <input type="text" value="grt" id="nic3" name="nic" autocomplete="off"
                                                min-length="10" maxlength="12" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Email </label>
                                            <input value="grt" type="email" id="mail3"
                                                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="mail"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">School</label>
                                            <input value="grt" type="text" id="school3" autocomplete="off" name="school"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Telephone </label>
                                            <input value="grt" type="tel" PATTERN="[0]{1}[0-9]{9}" maxlength="10"
                                                id="phone3" name="phone" size="10" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">

                                            <div class="form-group">
                                                <label class="bmd-label-floating"> Address</label>
                                                <input ID="address3" value="grt" type="text" name="address"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label">District (for Sitting) </label>
                                            <select id="id123" required class="custom-select" autofocus=""
                                                name="dis_sit">
                                                <option value="" disabled selected hidden>Please Choose...</option>
                                                <?php
                                            if($total_districts > 0){
                                            while($row_district = mysqli_fetch_assoc($result_districts)){
                                                ?>



                                                <option
                                                    value="<?php echo $row_district['district_id'].'@'.$row_district['district']; ?>">
                                                    <?php echo $row_district['district']; ?></option>
                                                <?php }}?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label">District (for Ranking) </label>
                                            <select id="uyt" required class="custom-select" autofocus=""
                                                name="dis_rank">
                                                <option value="" disabled hidden>Please Choose...</option>
                                                <?php foreach($district_option as $dist_id => $dist_name) { ?>
                                                <option id="<?php echo "b".$dist_id ;?>"
                                                    value="<?php echo $dist_id."@".$dist_name; ?>">
                                                    <?php echo $dist_name; ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label">Center </label>
                                            <div id="dyn_txt1">
                                                <select id="centre45" required class="custom-select" autofocus=""
                                                    name="centre">
                                                    <option value="" disabled selected hidden>Please Choose...</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div id="c1" class=" card form-group">
                                            <div class="card-body">
                                                <div class="form-check form-check-radio custom-control custom-radio ">
                                                    <label class="bmd-label-static" for="exampleRadios5"> Stream
                                                    </label> <br>
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="stream"
                                                            id="exampleRadios5" value="MATHS">
                                                        Maths
                                                        <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div
                                                    class="form-check form-check-radio custom-control custom-radio form-check-inline">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="stream"
                                                            id="exampleRadios6" value="BIO">
                                                        Bio
                                                        <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-radio custom-control custom-radio ">

                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="stream"
                                                            id="exampleRadios7" value="ICT (MATHS)">
                                                        ICT (Maths)
                                                        <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div
                                                    class="form-check form-check-radio custom-control custom-radio form-check-inline">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="stream"
                                                            id="exampleRadios8" value="ICT (BIO)">
                                                        ICT (Bio)
                                                        <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                    <div id="ifs" class="invalid-feedback">Please choose a stream</div>
                                                    <div id="ifs2" class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div id="c2" class=" card form-group">
                                            <div class="card-body">
                                                <div class="form-check form-check-radio custom-control custom-radio">
                                                    <label class="bmd-label-static" for="exampleRadios"> Gender </label>
                                                    <br>
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="gender"
                                                            id="exampleRadios1" value="male">
                                                        Male
                                                        <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>

                                                </div>

                                                <div class="form-check form-check-radio custom-control custom-radio">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="gender"
                                                            id="exampleRadios2" value="female">
                                                        Female
                                                        <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                    <div id="ifg" class="invalid-feedback">Please Choose a gender</div>
                                                    <div id="ifg2" class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-md-4">
                                        <div id="c3" class="card form-group">
                                            <div class="card-body">
                                                <div class="form-check form-check-radio custom-control custom-radio">
                                                    <label class="bmd-label-static" for="exampleRadios"> Medium
                                                    </label> <br>
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="medium"
                                                            id="exampleRadios3" value="english">
                                                        English
                                                        <span class="circle">
                                                            <span class="check"></span>
                                                        </span>

                                                    </label>
                                                </div>
                                                <div class="form-check form-check-radio custom-control custom-radio">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="medium"
                                                            id="exampleRadios4" value="tamil">
                                                        Tamil
                                                        <span class="circle">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                    <div id="ifm2" class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                    <div id="ifm" class="invalid-feedback">Please Choose a medium</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>






                        </div>
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" id="edit_stu2" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>

            </div>
        </div>
    </div>









    <br>

    <div class=" table-responsive text-center ">
        <table style="width: 100%;" id="myTable" class="table table-bordered  responsive table-hover hide">
            <thead class="text-center text-light">
                <tr>
                    <th> ⇵</th>
                    <th>Index Number &nbsp; ⇵</th>
                    <th>Name </th>
                    <th>Stream &nbsp; ⇵</th>
                    <th>District (Ranking) &nbsp; ⇵</th>
                    <th>Checked &nbsp; ⇵</th>
                    <th> View & Modify Details </th>


                </tr>


            </thead>
            <tbody>

                <?php
                
                        if($total_students > 0){
                            $i=0;
                            while($row_students = mysqli_fetch_assoc($result_students)){
                                $i++;

                            ?>


                <tr id="<?php echo "a".$row_students['index_no']; ?>" width="100%">
                    <td><?php echo $i ?></td>
                    <td><?php echo $row_students['index_no'] ?></td>
                    <td><?php echo $row_students['name'] ?></td>
                    <td><?php echo $row_students['subject_group_id'] ?></td>
                    <td><?php echo $row_students['district_ranking'] ?></td>
                    <td><?php 
                        if($row_students['checked']==1){
                            echo "<i  class='fa fa-circle text-success' aria-hidden='true'></i>&nbsp;
                            Checked";
                        }
                        else{
                            echo "<i  class='fa fa-circle text-danger' aria-hidden='true'></i>&nbsp;
                            Unchecked";
                        }
                    ?>

                    </td>
                    <td class="bg-white123">
                        <button type="button" data-toggle="tooltip" data-placement="top" class="btn btn-info"
                            onclick="view('<?php echo $row_students['index_no']; ?>')"><span
                                class="material-icons">visibility</span></button>
                        <button type="button" data-toggle="tooltip" data-placement="top" class="btn btn-warning"
                            onclick="edit1('<?php echo $row_students['index_no'];  ?>')"><span
                                class="material-icons">create</span></button>
                        <button type="button" data-toggle="tooltip" data-placement="top" class="btn btn-danger"
                            onclick="del1('<?php echo $row_students['index_no'];  ?>')"><span
                                class="material-icons">delete</span></button>
                    </td>
                </tr>






                <?php } } else { ?>
                <tr>
                    <td class="text-center" colspan="11">No records found.</td>
                </tr>
                <?php } 
                    ?>






            </tbody>
        </table>





    </div>

</div>

<?php include 'footer.php';?>