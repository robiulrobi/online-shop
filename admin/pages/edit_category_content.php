<?php
//session_start();

include'../classes/manage_category_class.php';


//edit category code
 if (isset($_GET['id'])){
         $category_id=$_GET['id'];
    $obj_manage_category = new Manage_category();
    $query_result = $obj_manage_category->update_category_info_by_id($category_id);
     
    $category_info= mysqli_fetch_assoc($query_result);

 }
  
//edit category code

//save update code

if(isset($_POST['btn'])){
    $massage=$obj_manage_category->Update_category_info($_POST);
}





?>











 <div class="box-header" data-orginal-title>
           <h2>Update Category Information</h2>
           <h2 style="color:blue;"><?php if(isset($massage)) echo $massage;?></h2>
           
   </div>
    <form action="" method="POST" name="edit_publication">
  <div class="form-group">
    <label for="formGroupExampleInput" class="text-black">Category Name</label>
    <input type="text" name="category_name" class="form-control" id="formGroupExampleInput" placeholder="Type Category name" value="<?php echo $category_info['category_name'] ?>">
    
    <input type="hidden" name="category_id" class="form-control" id="formGroupExampleInput" placeholder="Type Category name" value="<?php echo $category_info['category_id'] ?>">

  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2" class="text-black" >Category Description</label>
    <div><textarea name="category_description" rows="10" class="form-control" id="ckeditor" ><?php echo $category_info['category_description'] ?></textarea></div>
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
    <input type="submit" name="btn" value="Update Your Category" class="btn btn-primary">
     <input type="reset" name="btn" value="Reset" class="btn btn-danger">
  </div>
</form>

<!--for publication status-->
<script>
    
    document.forms['edit_publication'].elements['publication_status'].value='<?php echo $category_info['publication_status'] ?>';
    
</script>
<!--for publication status-->

<!--ckeditor code-->

<!--
<script src="../assets/admin-assets/ckeditor/ckeditor.js"></script>
<script>
CKEDITOR.replace('ckeditor');
</script>
-->

<!--ckeditor code-->
