<?php include 'header.php';?>

<script>
  $(document).ready(function () {
    $("#title123").text("Stream and Subjects");
    $("#n3").addClass("active");

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
<div class="col-md-12">
  <div class="container">
    <div class="card card-plain">
      <div class="card-header card-header-success">
        <h4 class="card-title text mt-0"> Subjects</h4>
        <p class="card-category"> Stream codes along with Subject codes are provided here</p>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="myTable" class="table table-bordered table-hover">
            <thead class="text-center text-light">
              <tr>
                <th>Stream ID</th>
                <th>Stream</th>
                <th>Subject 1</th>
                <th>Subject 2</th>
                <th>Subject 3</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Bio Stream</td>
                <td>09 - Biology</td>
                <td>01 - Physics</td>
                <td>02 - Chemistry</td>
              </tr>
              <tr>
                <td>2</td>
                <td>Maths Stream</td>
                <td>10 - Combined Mathematics</td>
                <td>01 - Physics</td>
                <td>02 - Chemistry</td>
              </tr>
              <tr>
                <td>3</td>
                <td>ICT (MATHS) </td>
                <td>10 - Combined Mathematics</td>
                <td>01 - Physics</td>
                <td>20 - Information and Communication Technology</td>
              </tr>
              <tr>
                <td>4</td>
                <td>ICT (BIO)</td>
                <td>09 - Biology</td>
                <td>02 - Chemistry</td>
                <td>20 - Information and Communication Technology</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php';?>
