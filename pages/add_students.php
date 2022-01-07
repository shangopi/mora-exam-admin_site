<?php include 'header.php';?>
<?php

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
  );?>



<script>
  $(document).ready(function () {

    $submitted_once = 0;
    $("#title123").text("Add Student");
    $("#n4").addClass("active");
    $('#id5').hide();

    var input = $("#index_no");
    var len = input.val().length;
    input[0].focus();
    input[0].setSelectionRange(len, len);


    $("#index_no").focusout(function () {
      $var = $(this).val()[2];
      if ($var == 'B') {
        $('#exampleRadios6').attr('checked', true);
      }
      if ($var == 'M') {
        $('#exampleRadios5').attr('checked', true);
      }
    });


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

          $('#dyn_txt').html(data);

        }
      });

    });



    function check_radios() {

      if ($submitted_once > 0) {
        var radioValue1 = $("input[name='gender']:checked").val();
        var radioValue2 = $("input[name='stream']:checked").val();
        var radioValue3 = $("input[name='medium']:checked").val();

        if ((typeof radioValue3 == 'undefined')) {
          $let_submit = 0;
          $('#ifm').show();
          $('#c3').addClass("border border-danger");

        } else {
          $('#c3').removeClass("border border-danger");
          $('#c3').addClass("border border-success");
          $('#ifm2').show();
          $('#ifm').hide();
        }

        if ((typeof radioValue2 == 'undefined')) {
          $let_submit = 0;
          $('#ifs').show();
          $('#c1').addClass("border border-danger");
        } else {
          $('#ifs').hide();
          $('#ifs2').show();
          $('#c1').removeClass("border border-danger");
          $('#c1').addClass("border border-success");
        }
        if ((typeof radioValue1 == 'undefined')) {
          $let_submit = 0;
          $('#ifg').show();
          $('#c2').addClass("border border-danger");
        } else {
          $('#ifg').hide();
          $('#ifg2').show();
          $('#c2').removeClass("border border-danger");
          $('#c2').addClass("border border-success");
        }

      }


    }
    $('input[type=radio][name=gender]').change(function () {

      check_radios();


    });
    $('input[type=radio][name=stream]').change(function () {

      check_radios();


    });
    $('input[type=radio][name=medium]').change(function () {

      check_radios();


    });

    $('#frm').on("submit", function (event) {
      event.preventDefault();
      $submitted_once = 1;
      $let_submit = 1;
      check_radios();

      if ($let_submit == 1) {
        $.ajax({
          type: "POST",
          url: "student/add_stu.php",
          data: $(this).serialize(),
          success: function (data) {
            $('#id5').show();
            $res = data.split("@");
            $('#id1').removeClass('alert-danger');
            $('#id1').removeClass('alert-success');
            $('#id1').addClass('alert-' + $res[1]);
            $('#id2').text($res[0]);
            $('#id3').text($res[3]);
            $('#id4').html($res[2]);
            if ($res[4] == '1') {
              $("#frm")[0].reset();
            }

            $('#c2').removeClass("border border-success");
            $('#c1').removeClass("border border-success");
            $('#c3').removeClass("border border-success");
            $('#ifg2').hide();
            $('#ifm2').hide();
            $('#ifs2').hide();


            var len = input.val().length;
            input[0].focus();





          }
        });

      }

    });
  });
</script>

<hr>



<div class="container">
  <div id="dyn_txt1"></div>
  <!-- code for breadcrumb -->

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
      <li class="breadcrumb-item"><a href="student.php">Students</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add Student</li>
    </ol>
  </nav>

  <div class="content">

    <div class="container-fluid">
      <div id="id5">

        <div id="id1" class="alert alert-dismissible alert-with-icon fade show" role="alert">
          <h4 id="id2" class="alert-heading"></h4>
          <p id="id3"></p>
          <i class="material-icons" data-notify="icon">
            <div id="id4"></div>
          </i>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <br>
        </div>
      </div>



      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Add Student</h4>
              <p class="card-category">Complete the form below</p>
            </div>
            <div class="card-body">
              <form id="frm">
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label class="bmd-label-floating">Index No. </label>
                      <input type="text" VALUE="" autofocus id="index_no" pattern="[0-9]{6}"
                        required name="index_no" maxlength="6" minlength="6" class="form-control">

                    </div>
                  </div>
                  <div class="col-md-9">
                    <div class="form-group">
                      <label class="bmd-label-floating"> Full Name</label>

                      <input type="text" id="name" required name="name" class="form-control">

                    </div>
                  </div>

                </div>

                <br>
                <div class="row">
                  <div class="col-xl-4">
                    <div id="c1" class=" card form-group">
                      <div class="card-body">
                        <div class="form-check form-check-radio custom-control custom-radio ">
                          <label class="bmd-label-static" for="exampleRadios5"> Stream </label> <br>
                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="stream" id="exampleRadios5"
                              value="MATHS">
                            Maths
                            <span class="circle">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                        <div class="form-check form-check-radio custom-control custom-radio form-check-inline">
                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="stream" id="exampleRadios6" value="BIO">
                            Bio
                            <span class="circle">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                        <div class="form-check form-check-radio custom-control custom-radio ">

                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="stream" id="exampleRadios7"
                              value="ICT (MATHS)">
                            ICT (Maths)
                            <span class="circle">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                        <div class="form-check form-check-radio custom-control custom-radio form-check-inline">
                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="stream" id="exampleRadios7"
                              value="ICT (BIO)">
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
                        <div class="form-check form-check-radio custom-control custom-radio ">

                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="stream" id="exampleRadios7"
                              value="Other">
                            Other
                            <span class="circle">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-4 md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">District (for Sitting) </label>
                      <select id="id123" required class="custom-select" autofocus="" name="dis_sit">
                        <option value="" disabled selected hidden>Please Choose...</option>
                        <?php
                        if($total_districts > 0){
                          while($row_district = mysqli_fetch_assoc($result_districts)){
                            ?>



                        <option value="<?php echo $row_district['district_id'].'@'.$row_district['district']; ?>">
                          <?php echo $row_district['district']; ?></option>
                        <?php }}?>
                      </select>
                    </div>
                  </div>
                  <div class="col-xl-4 md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">District (for Ranking) </label>
                      <select id="uyt" required class="custom-select" autofocus="" name="dis_rank">
                        <option value="" disabled hidden>Please Choose...</option>
                        <?php foreach($district_option as $dist_id => $dist_name) { ?>
                        <option id="<?php echo "b".$dist_id ;?>" value="<?php echo $dist_id."@".$dist_name; ?>">
                          <?php echo $dist_name; ?>
                        </option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>


                </div>
                <br>
                <div class="row">
                  <div class="col-xl-3 col-md-6">
                    <div id="c2" class=" card form-group">
                      <div class="card-body">
                        <div class="form-check form-check-radio custom-control custom-radio">
                          <label class="bmd-label-static" for="exampleRadios"> Gender </label> <br>
                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="male">
                            Male
                            <span class="circle">
                              <span class="check"></span>
                            </span>
                          </label>

                        </div>

                        <div class="form-check form-check-radio custom-control custom-radio">
                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="gender" id="exampleRadios2"
                              value="female">
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
                  <div class="col-xl-3 col-md-6">
                    <div id="c3" class="card form-group">
                      <div class="card-body">
                        <div class="form-check form-check-radio custom-control custom-radio">
                          <label class="bmd-label-static" for="exampleRadios"> Medium </label> <br>
                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="medium" id="exampleRadios3"
                              value="english">
                            English
                            <span class="circle">
                              <span class="check"></span>
                            </span>

                          </label>
                        </div>
                        <div class="form-check form-check-radio custom-control custom-radio">
                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="medium" id="exampleRadios4"
                              value="tamil">
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
                  <div class="col-xl-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Center - Fill District fields to fill here </label>
                      <div id="dyn_txt">
                        <select required class="custom-select" autofocus="" name="centre">
                          <option value="" disabled selected hidden>Please Choose...</option>
                        </select>
                      </div>
                    </div>
                  </div>

                </div>
                <br>
                <div class="row">

<div class="col-md-4">
  <div class="form-group">
    <label class="bmd-label-floating">NIC Number </label>
    <input type="text" id="nic" name="nic" autocomplete="off" min-length="10" maxlength="12"
      class="form-control">
  </div>
</div>

<div class="col-md-8">
  <div class="form-group">
    <label class="bmd-label-floating">School</label>
    <input type="text" id="school" autocomplete="off" name="school" class="form-control">
  </div>
</div>




</div>
<div class="row">
<div class="col-md-8">
  <div class="form-group">
    <label class="bmd-label-floating">Email </label>
    <input type="email" id="mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="mail"
      class="form-control">
  </div>
</div>



<div class="col-md-4">
  <div class="form-group">
    <label class="bmd-label-floating">Telephone</label>
    <input type="tel" PATTERN="[0]{1}[0-9]{9}" maxlength="10" id="phone" name="phone" size="10"
      class="form-control">
  </div>
</div>

</div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Address</label>
                      <div class="form-group">
                        <label class="bmd-label-floating"> Enter the address here </label>
                        <textarea class="form-control" name="address" rows="5"></textarea>
                      </div>
                    </div>
                  </div>
                </div>


                <button type="submit" id="btn1" class="btn btn-primary pull-right">Add Student</button>
                <button type="button" onclick="$('#frm')[0].reset();" class="btn btn-secondary mx-2 pull-right">Reset the Form</button>

                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-profile">
            <div class="card-avatar">
              <a href="javascript:;">
                <img class="img" src="../assets/img/daru.jpg" />
              </a>
            </div>
            <div class="card-body">
              <h6 class="card-category text-gray">see how island topper feels regarding</h6>
              <h4 class="card-title">Mora Exams - 2021</h4>
              <hr>
              <div>
                <blockquote>
                  It is a very common notion of the society that the students who are in universities focus only in
                  their studies and have no care and concern towards the society. Our students have proved that to be
                  wrong.
                  <footer>
                    <cite>
                      DARUKEESAN
                    </cite>
                  </footer>
                </blockquote>
              </div>




              <a href="#" class="btn btn-primary btn-round">See more</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<style>
  #index_no-error,
  #name-error,
  #id123-error,
  #dis_rank-error,
  #gender-error {
    color: #d9534f;
  }

  blockquote {
    font-family: Georgia, serif;
    position: relative;
    margin: 0.5em;
    padding: 0.5em 2em 0.5em 3em;
  }

  /* Thanks: http://callmenick.com/post/styling-blockquotes-with-css-pseudo-classes */
  blockquote:before {
    font-family: Georgia, serif;
    position: absolute;
    font-size: 6em;
    line-height: 1;
    top: 0;
    left: 0;
    content: "\201C";
  }

  blockquote:after {
    font-family: Georgia, serif;
    position: absolute;
    /* display: block; don't use this, it raised the quote too high from the bottom - defeated line-height? */
    float: right;
    font-size: 6em;
    line-height: 1;
    right: 0;
    bottom: -0.5em;
    content: "\201D";
  }

  blockquote footer {
    padding: 0 2em 0 0;
    text-align: right;
  }
</style>
<?php include 'footer.php';?>
