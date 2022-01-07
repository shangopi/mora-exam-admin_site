<?php
include '../db_config.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];



      $sql = "SELECT centre_id, centre_name FROM tbl_exam_centres WHERE district_id = $id ";
      $result = $db->query($sql);?>
            <select id="ty123" required class="custom-select" autofocus="" name="centre">
            
                        
                      
<?php
            if ($db->query($sql) == TRUE) {
                while($row = $result->fetch_assoc()) {
                    if($row['centre_id']==$_GET['id2']){ ?>
                    <option selected value="<?php echo $row['centre_id']; ?>"> <?php echo $row['centre_name'];?></option>  
<?php
                    }
                    else {
                    
                    ?>

                
                  <option value="<?php echo $row['centre_id']; ?>"> <?php echo $row['centre_name'];?></option>  
                 <?php }}
                 ?>
                 </select>

<?php
            } else {
                echo "Error ";
    

            
            

        }

    

}

?>