<?php include 'header.php'; ?>

<script>
  $(document).ready(function() {
    $("#title123").text("Manage Marks");
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
<div class="col-md-12">
  <div class="container">
    <div class="card card-plain">
      <div class="card-header card-header-success">
        <?php if($_SESSION['status']<2){
          header('Location: student.php');
        }  ?>
        <h4 class="card-title text mt-0"> Manage Subjects</h4>
        <p class="card-category"> Redirctions of Manage Marks</p>
      </div>

      
        <div class="table-responsive">
          <table id="myTable" class="table table-bordered table-hover">
            <thead class="text-center text-light">
              <tr>
                <th width="40%">Subject</th>
                <th width="30%">Part 1</th>
                <th width="30%">Part 2</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><b>Maths</b>
                <td class="text-center"><a href="addmarks.php?subject=maths&part=1&param=subject1_part1" type="button" class="btn btn-success ml-2"><i class="fa fa-plus"></i></a><a href="editmarks.php?subject=maths&part=1&param=subject1_part1" type="button" class="btn btn-warning ml-2"><i class="fa fa-edit"></i></a><a href="checkmarks.php?subject=maths&part=1&param=subject1_part1" type="button" class="btn btn-info ml-2"><i class="fa fa-check"></i></a></td>
                <td class="text-center"><a href="addmarks.php?subject=maths&part=2&param=subject1_part2" type="button" class="btn btn-success ml-2"><i class="fa fa-plus"></i></a><a href="editmarks.php?subject=maths&part=2&param=subject1_part2" type="button" class="btn btn-warning ml-2"><i class="fa fa-edit"></i></a><a href="checkmarks.php?subject=maths&part=2&param=subject1_part2" type="button" class="btn btn-info ml-2"><i class="fa fa-check"></i></a></td>
              </tr>
              <tr>
                <td><b>Bio</b></td>
                <td class="text-center"><a href="addmarks.php?subject=bio&part=1&param=subject1_part1" type="button" class="btn btn-success ml-2"><i class="fa fa-plus"></i></a><a href="editmarks.php?subject=bio&part=1&param=subject1_part1" type="button" class="btn btn-warning ml-2"><i class="fa fa-edit"></i></a><a href="checkmarks.php?subject=bio&part=1&param=subject1_part1" type="button" class="btn btn-info ml-2"><i class="fa fa-check"></i></a></td>
                <td class="text-center"><a href="addmarks.php?subject=bio&part=2&param=subject1_part2" type="button" class="btn btn-success ml-2"><i class="fa fa-plus"></i></a><a href="editmarks.php?subject=bio&part=2&param=subject1_part2" type="button" class="btn btn-warning ml-2"><i class="fa fa-edit"></i></a><a href="checkmarks.php?subject=bio&part=2&param=subject1_part2" type="button" class="btn btn-info ml-2"><i class="fa fa-check"></i></a></td>

              </tr>
              <tr>
                <td><b>Physics</b></td>
                <td class="text-center"><a href="addmarks.php?subject=physics&part=1&param=subject2_part1" type="button" class="btn btn-success ml-2"><i class="fa fa-plus"></i></a><a href="editmarks.php?subject=physics&part=1&param=subject2_part1" type="button" class="btn btn-warning ml-2"><i class="fa fa-edit"></i></a><a href="checkmarks.php?subject=physics&part=1&param=subject2_part1" type="button" class="btn btn-info ml-2"><i class="fa fa-check"></i></a></td>
                <td class="text-center"><a href="addmarks.php?subject=physics&part=2&param=subject2_part2" type="button" class="btn btn-success ml-2"><i class="fa fa-plus"></i></a><a href="editmarks.php?subject=physics&part=2&param=subject2_part2" type="button" class="btn btn-warning ml-2"><i class="fa fa-edit"></i></a><a href="checkmarks.php?subject=physics&part=2&param=subject2_part2" type="button" class="btn btn-info ml-2"><i class="fa fa-check"></i></a></td>
              </tr>
              <tr>
                <td><b>Chemistry</b></td>
                <td class="text-center"><a href="addmarks.php?subject=chemistry&part=1&param=subject3_part1" type="button" class="btn btn-success ml-2"><i class="fa fa-plus"></i></a><a href="editmarks.php?subject=chemistry&part=1&param=subject3_part1" type="button" class="btn btn-warning ml-2"><i class="fa fa-edit"></i></a><a href="checkmarks.php?subject=chemistry&part=1&param=subject3_part1" type="button" class="btn btn-info ml-2"><i class="fa fa-check"></i></a></td>
                <td class="text-center"><a href="addmarks.php?subject=chemistry&part=2&param=subject3_part2" type="button" class="btn btn-success ml-2"><i class="fa fa-plus"></i></a><a href="editmarks.php?subject=chemistry&part=2&param=subject3_part2" type="button" class="btn btn-warning ml-2"><i class="fa fa-edit"></i></a><a href="checkmarks.php?subject=chemistry&part=2&param=subject3_part2" type="button" class="btn btn-info ml-2"><i class="fa fa-check"></i></a></td>
              </tr>
              <tr>
                <td><b>ICT</b></td>
                <td class="text-center"><a href="addmarks.php?subject=ict&part=1&param=subject3_part1" type="button" class="btn btn-success ml-2"><i class="fa fa-plus"></i></a><a href="editmarks.php?subject=ict&part=1&param=subject3_part1" type="button" class="btn btn-warning ml-2"><i class="fa fa-edit"></i></a><a href="checkmarks.php?subject=ict&part=1&param=subject3_part1" type="button" class="btn btn-info ml-2"><i class="fa fa-check"></i></a></td>
                <td class="text-center"><a href="addmarks.php?subject=ict&part=2&param=subject3_part2" type="button" class="btn btn-success ml-2"><i class="fa fa-plus"></i></a><a href="editmarks.php?subject=ict&part=2&param=subject3_part2" type="button" class="btn btn-warning ml-2"><i class="fa fa-edit"></i></a><a href="checkmarks.php?subject=ict&part=2&param=subject3_part2" type="button" class="btn btn-info ml-2"><i class="fa fa-check"></i></a></td>>
              </tr>

            </tbody>
          </table>
        </div>
      
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>