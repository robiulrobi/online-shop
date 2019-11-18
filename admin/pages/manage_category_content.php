<?php
//session_start();
include'../classes/manage_category_class.php';


$obj_manage_category = new Manage_category();




//unpublished code
if(isset($_GET['status'])){
    $category_id=$_GET['id'];
    if($_GET['status']=='unpublished'){
        $massage=$obj_manage_category->unpublished_category_by_id($category_id);
    }
}

//unpublished code

//published category code
if(isset($_GET['status'])){
    $category_id=$_GET['id'];
    if($_GET['status']=='published'){
        $massage=$obj_manage_category->published_category_by_id($category_id);
    }
}

//published category code

//delete category

if(isset($_GET['status'])){
    $category_id=$_GET['id'];
    if($_GET['status']=='delete'){
        $massage=$obj_manage_category->delete_category_by_id($category_id);
    }
}




//delete category


$query_result=$obj_manage_category->select_all_category_info();
    
    




?>
   

   
   <div class="row-fluid sortable">
    <div class="box span12">
       <div class="box-header" data-orginal-title>
           <h2>Manage Categoty Table</h2>
           <h3 class="text-success" style="text-align:center;"><?php if(isset($massage)) {echo $massage; unset($massage);}?></h3>
           <h3 class="text-success" style="text-align:center;"><?php if(isset($_SESSION['massage'])) {echo $_SESSION['massage']; unset($_SESSION['massage']);}?></h3>
           <div class="box-icon">
              <a href="#" class="btn-setting"></a>
              <a href="#" class="btn-setting"></a>
              <a href="#" class="btn-setting"></a>
           </div>
       </div>
       <div class="box-content">
          <table class="table table-bordered table-striped">
             <thead class="table table-primary">
                 <tr>
                     <th>Category ID</th>
                     <th>Category Name</th>
                     <th>Category Description</th>
                     <th>Publication Status</th>
                     <th>Action</th>
                 </tr>
             </thead>
             <tbody>
                <?php while($category_info=mysqli_fetch_assoc($query_result)) { ?>
                 <tr>
                     <td style="width: 10%;"><?php echo $category_info['category_id']?></td>
                     <td style="width: 10%;"><?php echo $category_info['category_name']?></td>
                     <td style="width: 50%;"><?php echo $category_info['category_description']?></td>
                     <td style="width: 15%;">
                        <?php
                         if($category_info['publication_status']==1){
                             echo 'Published';
                         }else{
                             echo 'Unpublished';
                         }
                         
                         ?>
                        
                    </td>
                     <td class="center" style="width: 15%;" >
                        <?php if($category_info['publication_status']==1){?>
                        
                         <a class="btn btn-success" href="?status=unpublished&&id=<?php echo $category_info['category_id']?>" title="unpublished">
                         <i class="fas fa-arrow-down"></i></a>
                         
                         <?php }else{?>
                         
                         <a class="btn btn-danger" href="?status=published&&id=<?php echo $category_info['category_id']?>" title="published"><i class="fas fa-arrow-up"></i></a>
                         
                         <?php } ?>
                         
                         <a class="btn btn-info" href="edit_category.php?id=<?php echo $category_info['category_id']?>"><i class="far fa-edit"></i></a>
                         
                         <a class="btn btn-danger" href="?status=delete&&id=<?php echo $category_info['category_id']?>" onclick=" return check_delete();" title="Delete"  ><i class="fas fa-trash"></i></a>
                     </td>
                 </tr>
                 <?php } ?>
                 
             </tbody>
              
          </table>
           
       </div>
        
    </div>