<?php include 'header.php';?>

<?php
$_SESSION['user_status']='2';
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



<!-- title -->
<hr>
<br>
<br>




<script>
    $(document).ready(function () {
        

        $selected = "#sl1";
        $("#title123").text("Districts & Centers ");
        $("#n2").addClass("active");

        //enabling bootstrap tooltip
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        })

    });

    function add_cent1(id) {
        
        $('#add_cent').modal('show');
        $('#exampleModalLabel6').text("Add Centres in " + $('#a' + id).find("td:eq(2)").text() + " District");
        $('#add12').val($('#a' + id).find("td:eq(1)").text());


    }

    function edit_cent2(id1, id2) {
        $('#edit_cent4').modal('show');
        $('#exampleModalLabel7').text("Edit Centre Details in " + $('#a' + id1).find("td:eq(2)").text() + " District");
        $('#ght').val($('#c' + id2).find("td:eq(1)").text());
        $('#edit234').val($('#c' + id2).find("td:eq(0)").text());
        $('#edit23456').val($('#c' + id2).find("td:eq(2)").attr("id"));
        $($selected).removeAttr('selected');
        if ($('#c' + id2).find("td:eq(3)").text() == 'Male') {
            $selected = "#sl1";
        } else if ($('#c' + id2).find("td:eq(3)").text() == 'Female') {
            $selected = "#sl2";
        } else if ($('#c' + id2).find("td:eq(3)").text() == 'Mixed') {
            $selected = "#sl3";
        }
        $($selected).attr('selected', "selected");


    }

    function del_cent2(id1, id2) {
        $('#del_centre').modal('show');
        $('#de1').text("Delete Centre from " + $('#a' + id1).find("td:eq(2)").text() + " District");
        $('#de2').text("Are you sure? you want to delete " + $('#c' + id2).find("td:eq(1)").text() + " Centre");
        $('#de3').val($('#c' + id2).find("td:eq(0)").text());
        // alert(id2);

    }

    //Edit district
    function edit_cent(id) {
        $('#edit_dis').modal('show');
        $('#example2ModalLabel').text("Edit " + $('#a' + id).find("td:eq(2)").text() + " District Details");
        $('#edit12').val($('#a' + id).find("td:eq(3)").text());
        $('#edit123').val($('#a' + id).find("td:eq(4)").text());
        $('#edit1234').val($('#a' + id).find("td:eq(1)").text());
    }

    function del_cent(id) {
        $('#del_dis').modal('show');
        // Are you sure you want to delete this District?   
        $('#example3ModalLabel').text("Are you sure? you want to delete " + $('#a' + id).find("td:eq(2)").text() +
            " District Details ?");
        $('#del12345').val($('#a' + id).find("td:eq(1)").text());
    }
</script>
<style>
    thead {
        background-color: purple;
    }

    .bg-white123 {
        background-color: #F6F4F4;
    }

    .badge {
        background-color: purple;

        .label {
            font-weight: bold;
        }
    }
    .badge:hover {
  background-color: red;
}

</style>



<div class="container">

    <!-- code for showing editing results in alerts -->

    <?php
    if(isset($_GET['msg'])){ ?>
    <div class="alert alert-<?php echo $_GET['col']; ?>  alert-dismissible alert-with-icon fade show" role="alert">
        <h4 class="alert-heading"><?php echo $_GET['subject']; ?></h4>
        <?php echo $_GET['msg']; ?>
        <i class="material-icons" data-notify="icon"><?php echo $_GET['icon']; ?></i>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> <?php } ?>

    <!-- Modal for add district-->
    <div class="modal fade" id="add_dis" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add District</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form class="needs-validation" method="POST" name="add_dis" novalidate action="center/add_dis.php">
                        <div class="form-row">

                            <div class="col">
                                <label class="bmd-label-static" for="selectdis">Select District</label>
                                <select required class=" custom-select " type="text" id="selectids" autofocus=""
                                    name="district_id">
                                    <option value="" disabled selected hidden>Please Choose...</option>
                                    <?php foreach($district_option as $dist_id => $dist_name) { ?>
                                    <option id="<?php echo "b".$dist_id ;?>"
                                        value="<?php echo $dist_id."@".$dist_name; ?>">
                                        <?php echo $dist_name; ?>
                                    </option>
                                    <?php } ?>

                                </select>
                                <br>
                                <br>
                            </div>


                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-static"> Coordinator</label>
                                    <input name="coordinator" required type="text" class="form-control">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please Enter Valid Details.
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-static">Contact Number of coordinator</label>
                                    <input required pattern="[0-9]{10}" name="telephone" maxlength="10" type="text"
                                        class="form-control">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please Enter Valid Details.
                                    </div>

                                </div>
                            </div>
                        </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="add_dis" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal for edit district-->
    <div class="modal fade" id="edit_dis" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="example2ModalLabel">Edit District</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form class="needs-validation" method="POST" name="edit_dis" novalidate
                        action="center/edit_dis.php">
                        <div class="row">
                            <input type="hidden" id="edit1234" name="district_id" value=""> </input>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-static"> Coordinator</label>
                                    <input id="edit12" name="coordinator" required type="text" class="form-control">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please Enter Valid Details.
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-static">Contact Number of coordinator</label>
                                    <input id="edit123" required pattern="[0-9]{10}" name="telephone" maxlength="10"
                                        type="text" class="form-control">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please Enter Valid Details.
                                    </div>

                                </div>
                            </div>
                        </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="edit_dis" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal for delete district-->
    <div class="modal fade" id="del_dis" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete District !</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <h5 class="modal-title" id="example3ModalLabel">Delete District</h5>
                    <form method="POST" name="del_dis" novalidate action="center/del_dis.php">
                        <div class="row">
                            <input type="hidden" id="del12345" name="district_id" value=""> </input>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No Cancel</button>
                    <button type="submit" name="del_dis" class="btn btn-primary">Yes Delete</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal for add centers-->
    <div class="modal fade" id="add_cent" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel6">Add Centers</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form class="needs-validation" method="POST" name="add_cent" novalidate
                        action="center/add_cent.php">
                        <input type="hidden" id="add12" name="district_id" value=""> </input>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-static"> Centre Name </label>
                                    <input name="centre_name" required type="text" class="form-control">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please Enter Valid Details.
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-static">Google Maps link</label>
                                    <input required name="place" type="url" class="form-control">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please Enter Valid Details.
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="form-row">

                            <div class="col">
                                <label class="bmd-label-static" for="selectdis">Type of School</label>
                                <select required class=" custom-select " type="text" id="selectids" autofocus=""
                                    name="gender">
                                    <option value="" disabled selected hidden>Please Choose...</option>
                                    <option value="Male">Male School</option>
                                    <option value="Female">Female School</option>
                                    <option value="Mixed">Mixed School</option>


                                </select>

                            </div>


                        </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="add_cent" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal for edit centers-->
    <div class="modal fade" id="edit_cent4" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel7">Edit Centers</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form class="needs-validation" method="POST" name="add_cent" novalidate
                        action="center/edit_cent.php">

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-static"> Centre Name </label>
                                    <input name="centre_name" id="ght" required type="text" class="form-control">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please Enter Valid Details.
                                    </div>

                                </div>
                            </div>
                            <input type="hidden" id="edit234" name="centre_id" value=""> </input>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-static">Google Maps link</label>
                                    <input required id="edit23456" name="place" type="url" class="form-control">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please Enter Valid Details.
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="form-row">

                            <div class="col">
                                <label class="bmd-label-static" for="selectdis">Type of School</label>
                                <select required class=" custom-select " type="text" id="selectids" autofocus=""
                                    name="gender">
                                    <option value="" disabled selected hidden>Please Choose...</option>
                                    <option id="sl1" value="Male">Male School</option>
                                    <option id="sl2" value="Female">Female School</option>
                                    <option id="sl3" value="Mixed">Mixed School</option>


                                </select>

                            </div>


                        </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="edit_cent" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal for delete centre-->
    <div class="modal fade" id="del_centre" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="de1" class="modal-title">Delete Centre !</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <h5 class="modal-title" id="de2">Delete Centre</h5>
                    <form method="POST" name="del_dis" novalidate action="center/del_cent.php">
                        <div class="row">
                            <input type="hidden" id="de3" name="centre_id" value=""> </input>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No Cancel</button>
                    <button type="submit" name="del_cent" class="btn btn-primary">Yes Delete</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <div class="row justify-content-end">
        <div class="col-6 col-lg-10">
            <h3 style="text-align:left">
                Total Districts : <span class="badge badge-pill badge-success"> <?php echo $total_districts ;  ?>
                </span>
            </h3>
        </div>
        <div class="col-6 col-lg-2">
            <button type="button" class="btn btn-success my-4" data-toggle="modal" data-target="#add_dis"> <span
                    class="material-icons">
                    add_circle_outline

                </span> &nbsp;Add
                District</button>
        </div>

    </div>
    <br>

    <div class=" table-responsive text-center ">

        <table id="myTable" class="table table-bordered table-hover">
            <thead class="text-center text-light">
                <tr>
                    <th>#</th>
                    <th>District ID</th>
                    <th>District</th>
                    <th>Coordinator</th>
                    <th>Contact No.</th>
                    <th>Centres <br> <span>( Centre ID | Centre's Name | Place | Gender )</span> </th>
                    <?php if($_SESSION['user_status']=='2'){ ?> <th>ACTION</th> <?php } ?>

                </tr>


            </thead>
            <tbody>
                <?php
                        if($total_districts > 0){
                            $i=0;
                            while($row_district = mysqli_fetch_assoc($result_districts)){
                                $i++;
                                $sql_centre = "SELECT * FROM tbl_exam_centres WHERE district_id = '{$row_district['district_id']}' ORDER BY centre_id ASC";
                                $result_centre = mysqli_query($db, $sql_centre);
                                $num_centre = mysqli_num_rows($result_centre);

                                //code for add district ... skipping added districts
                                if (in_array($row_district['district'], $district_option))
                                {?>
                <script>
                    var $id3 = "<?php echo '#b'.$row_district['district_id'];?>"
                    $($id3).hide();
                </script>
                <?php
                                }


                            ?>


                <tr id="<?php echo "a".$row_district['district_id']; ?>" width="100%">
                    <td><?php echo $i ?></td>
                    <td><?php echo $row_district['district_id'] ?></td>
                    <td><?php echo $row_district['district'] ?></td>
                    <td><?php echo $row_district['coordinator'] ?></td>
                    <td><?php echo $row_district['telephone'] ?></td>
                    <?php if ($num_centre > 0){ ?>
                    <td class="bg-white123" style="padding:0">
                        <table class="table table-bordered table-hover" style="margin:0; width:100%">
                            <tbody>
                                <?php while($row_centre = mysqli_fetch_assoc($result_centre)){ ?>
                                <tr id="<?php echo "c".$row_centre['centre_id']; ?>" width="100%">
                                    <td width="5%"><?php echo $row_centre['centre_id'] ?></td>
                                    <td width="50%"><?php echo $row_centre['centre_name'] ?></td>

                                    <td width="10%" id="<?php echo $row_centre['place']; ?>"> <a
                                            href="<?php echo $row_centre['place']; ?>" target="_blank"
                                            class="badge badge-success"> <span class="material-icons">gps_fixed</span>
                                        </a>
                                    </td>
                                    <td width="10%"><?php echo $row_centre['gender'] ?></td>
                                    <?php if($_SESSION['user_status']=='2'){ ?>
                                    <td width="25%">

                                        <button class="btn btn-info" type="button" 
                                            onclick="edit_cent2(<?php echo $row_district['district_id'] ?>, <?php echo $row_centre['centre_id']  ?> )"><span
                                                class="material-icons">create</span></button>
                                        <button class="btn btn-danger" type="button"
                                            onclick="del_cent2(<?php echo $row_district['district_id'] ?>, <?php echo $row_centre['centre_id']  ?> )"><span
                                                class="material-icons">delete</span></button>
                                    </td>

                                    <?php } ?>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </td>
                    <?php } else { ?>
                    <td>No centres available.</td>
                    <?php }
                                    if($_SESSION['user_status']=='2'){ ?>
                    <td class="bg-white123">
                        <button type="button" data-toggle="tooltip" data-placement="top"
                            title="Add Center in <?php echo $row_district['district'] ?>" class="btn btn-success"
                            onclick="add_cent1(<?php echo $row_district['district_id']; ?>)"><span
                                class="material-icons">add_box</span></button>
                        <button type="button" data-toggle="tooltip" data-placement="top"
                            title="Edit Details of <?php echo $row_district['district'] ?> District"
                            class="btn btn-warning"
                            onclick="edit_cent(<?php echo $row_district['district_id'];  ?>)"><span
                                class="material-icons">create</span></button>
                        <button type="button" data-toggle="tooltip" data-placement="bottom"
                            title="Delete <?php echo $row_district['district'] ?> District" class="btn btn-danger"
                            onclick="del_cent(<?php echo $row_district['district_id'];  ?>)"><span
                                class="material-icons">delete</span></button>
                    </td>
                    <?php }
                     
                                    
                                    
                                    
                                    ?>
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





    <?php include 'footer.php';?>