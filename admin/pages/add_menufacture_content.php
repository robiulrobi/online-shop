<?php
require'../classes/menufacture_class.php';
$obj_manufacture= new Manufacture();


//add manufacture code
if(isset($_POST['btn'])){
    
    
   $massage=$obj_manufacture->save_manufacture_info($_POST); 
}

//add manufacture code





?>





<div class="box-header" data-orginal-title>
           <h2>Add Manufacture Information</h2>
           <h4 style="color:green;"><?php if(isset($massage)) {echo $massage;} ?></h4>
   </div>
    <form action="" method="POST">
  <div class="form-group">
    <label for="formGroupExampleInput" class="text-black">Manufacture Name</label>
    <input type="text" name="manufacture_name" class="form-control" id="formGroupExampleInput" placeholder="Type menufacture name....">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2" class="text-black" >Manufacture Description</label>
    <div><textarea name="manufacture_description" rows="10" placeholder="Type menufacture description...." class="form-control" id="ckeditor" ></textarea></div>
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
    <input type="submit" name="btn" value="Published Your Menufacture" class="btn btn-primary">
     <input type="reset" name="btn" value="Reset" class="btn btn-danger">
  </div>
</form>

<!--ckeditor code-->

<!--
<script src="../assets/admin-assets/ckeditor/ckeditor.js"></script>
<script>
CKEDITOR.replace('ckeditor');
</script>
-->

<!--ckeditor code-->