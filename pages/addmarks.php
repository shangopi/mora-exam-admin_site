<?php include 'header.php';?>

<script>
  $(document).ready(function () {
    $("#title123").text("Add Marks");
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
          $(document).ready(function(){


          // this is the id of the form
              $("#frm1").submit(function(e) {
                

              e.preventDefault(); // avoid to execute the actual submit of the form.

              var form = $(this);
              var url = form.attr('action');

              $.ajax({
                    type: "POST",
                    url: "marks/add_marks.php",
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
        </script>





<div class="col-md-12">
  <div class="container">
    <div class="card card-plain">
      <div class="card-header card-header-success">
        
        <h4 class="card-title text mt-0"> Add Part <?php echo $_GET['part']?> of  <?php echo ucfirst($_GET['subject'])?></h4>
        <p class="card-category"> Add the marks</p>
      </div>
      <br><br>
      <div class="card-body p-5">
            <form id="frm1" onSubmit="search();return false;"  method="POST" id="frm">
                <div class="row">
                  <div class="col-md-4 ">
                    <div class="form-group">
                      <label class="bmd-label-floating">Index No. </label>
                      <input type="hidden" value="<?php echo $_GET['param']; ?>" name="param">
                      <input type="text" VALUE="" autofocus id="index_no" pattern="[0-9]{6}"
                        required name="index_no" maxlength="6" minlength="6" class="form-control">

                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">Marks</label>
                      <input type="text" id="name" required name="name" class="form-control">
                    </div>
                  </div>

                  <div class="col-md-4">
                  <div  class="stateshower" >
                  
                  </div>
                  
                </div>
                <br>
                    <div class="form-group col-md-12 text-center">
                      <button  id="submit1" class="btn btn-success"><i class="fa fa-plus"> </i> &nbsp &nbsp Add</button>

                    </div>

            </form>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php';?>
