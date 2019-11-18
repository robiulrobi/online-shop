
<?php
require'../classes/menufacture_class.php';
$obj_manufacture = new Manufacture();


//edit manufacture code
 if (isset($_GET['id'])){
         $manufacture_id=$_GET['id'];
    $query_result = $obj_manufacture->edit_manufacture_info_by_id($manufacture_id);
    $manufacture_info= mysqli_fetch_assoc($query_result);

 }

//edit manufacture code


//edit save code
if(isset($_POST['btn'])){
    $massage=$obj_manufacture->update_manufacture_info($_POST);
}

//edit save code


?>






<div class="box-header" data-orginal-title>
           <h2>Update Manufacture Information</h2>
           <h4 style="color:green;"><?php if(isset($massage)) {echo $massage;} ?></h4>
   </div>
    <form action="" method="POST" name="edit_publication">
  <div class="form-group">
    <label for="formGroupExampleInput" class="text-black">Manufacture Name</label>
    <input type="text" name="manufacture_name" class="form-control" id="formGroupExampleInput" placeholder="Edit menufacture name...." value="<?php echo $manufacture_info['manufacture_name'] ?>">
    
    
<!--    //hidden manufacture_id-->
   
    <input type="hidden" name="manufacture_id" class="form-control" id="formGroupExampleInput" placeholder="Edit menufacture name...." value="<?php echo $manufacture_info['manufacture_id'] ?>">
    
    <!--    //hidden manufacture_id-->
    
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2" class="text-black" >Manufacture Description</label>
    <div><textarea name="manufacture_description" rows="10" placeholder="Edit menufacture description...." class="form-control" id="ckeditor" ><?php echo $manufacture_info['manufacture_description'] ?></textarea></div>
  </div>
  <div class="form-group">
<!--    <label for="formGroupExampleInput2">Publication Status</label>-->
        <select name="publication_status">
            <option>---Select Publication Status---</option>
            <option value="1">Published</option>
            <option value="0">Unpublished</option>
        </select>
  </div>
  <div class="form-group">
    <input type="submit" name="btn" value="Update Your Menufacture" class="btn btn-primary">
     <input type="reset" name="btn" value="Reset" class="btn btn-danger">
  </div>
</form>

<!--for publication-->
<script>
    
    document.forms['edit_publication'].elements['publication_status'].value='<?php echo $manufacture_info['publication_status'] ?>';
    
</script>
<!--for publication-->

<!--ckeditor code-->

<!--
<script src="../assets/admin-assets/ckeditor/ckeditor.js"></script>
<script>
CKEDITOR.replace('ckeditor');
</script>
-->

<!--ckeditor code-->