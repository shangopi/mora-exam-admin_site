<?php include 'header.php';?>

<script>
  $(document).ready(function () {
    $("#title123").text("Check Marks");
    $("#n5").addClass("active");

  });
</script>
<style>
  thead {
    background-color: purple;

  }
</style>
<hr>
<br>
<br>

<?php if($_SESSION['status']<2){
          header('Location: student.php');
        } 
        
        
        if(!isset($_GET['param'])){
          ?>
          <script>
              window.location.href = "manage_marks.php";
            </script>
          <?php
        }
        
        
        ?>

        <script>

          function func(){
            $index_no = $("#index_no").val();
            $str = $("#temp").val();
            $str = $str + "&index_no="+$index_no;
             window.location.href = $str;
          }

          $(document).ready(function(){
            

              



                      // this is the id of the form
              $("#frm1").submit(function(e) {
                

              e.preventDefault(); // avoid to execute the actual submit of the form.

              var form = $(this);
              var url = form.attr('action');

              $.ajax({
                    type: "POST",
                    url: "marks/check_marks.php",
                    data: form.serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                      
                      $(".stateshower").html(data);
                      $("#name").val("");
                      $("#index_no").focus();
                    }
                  });


              });
              // jQuery methods go here...

          });


          function load123() {
              
              $var1 = $("#index_no").val();
              if($var1.length==6){
                $("#name").val($var1);
                
                $.ajax({
                    type: "GET",
                    url: "marks/show_param_marks.php",
                    data: {
                        index_no: $("#index_no").val(),
                       param : $("#param").val()
                },
                    success: function(data)
                    {
                      
                      $("#submit1").removeAttr('disabled');
                      $("#submit2").removeAttr('disabled');
                      
                      $("#name").val(data);
                      if($("#name").val()=="Index Number Doesn't Exists"){
                        $("#submit1").attr('disabled',"");
                        $("#submit2").attr('disabled',"");
                      }
                      
                      $("#index_no").focus();
                    }
                  });





              }
              else{
                $("#submit1").attr('disabled',"");
                $("#submit2").attr('disabled',"");
                $(".stateshower").html("");
              }
              
                
            }
        </script>





<div class="col-md-12">
  <div class="container">
    <div class="card card-plain">
      <div class="card-header card-header-info">
        
        <h4 class="card-title text mt-0"> Check Part <?php echo $_GET['part']?> of  <?php echo ucfirst($_GET['subject'])?></h4>
        <p class="card-category"> Check the marks</p>
      </div>
      <br><br>
      <div class="card-body p-5">
            <form id="frm1" onSubmit="search();return false;"  method="POST" id="frm">
                <div class="row">
                  <div class="col-md-4 ">
                    <div class="form-group">
                      <label class="bmd-label-floating">Index No. </label>
                      <input type="hidden" id="param" value="<?php echo $_GET['param']; ?>" name="param">
                      <input onkeyup="load123()" type="text" VALUE="" autofocus id="index_no" pattern="[0-9]{6}"
                        required name="index_no" maxlength="6" minlength="6" class="form-control">

                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="label">Marks</label>
                      <input type="text" readonly id="name" required name="name" class="form-control">
                    </div>
                  </div>

                  <div class="col-md-4">
                  <div id="success-alert" class="stateshower" >
                  
                  </div>
                  
                </div>
                <br>
                    <div class="form-group col-md-12 text-center">
                      <?php 
                        $strr = 'editmarks.php?subject='.$_GET['subject'].'&part='.$_GET['part'].'&param='.$_GET['param'];
                        
                      ?>
                      <input type="hidden" name="temp"  id="temp" value="<?php echo $strr; ?>">
                      <button type="submit" id="submit1" disabled class="btn btn-success"><i class="fa fa-check"> </i> &nbsp &nbsp Check</button>
                      <button onclick="func(); return false;" id="submit2" disabled class="btn btn-warning"><i class="fa fa-edit"> </i> &nbsp &nbsp Edit</button>

                    </div>

            </form>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php';?>
