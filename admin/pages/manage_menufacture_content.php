<?php
require'../classes/menufacture_class.php';
$obj_manufacture = new Manufacture();


//unpublished code

 if(isset($_GET['status'])){
     $manufacture_id=$_GET['id'];
     if($_GET['status']=='unpublished'){
        $massage =$obj_manufacture->unpublished_manufacture_info_by_id($manufacture_id); 
     }
    
 }

//unpublished code

//published code

 if(isset($_GET['status'])){
     $manufacture_id=$_GET['id'];
     if($_GET['status']=='published'){
     $massage =$obj_manufacture->published_manufacture_info_by_id($manufacture_id);
     }
   
 }

//published code

//delete code

if(isset($_GET['status'])){
    $manufacture_id=$_GET['id'];
    if($_GET['status']=='delete'){
       $massage=$obj_manufacture->delete_manufacture_info_by_id($manufacture_id); 
    }
}

//delete code






$query_result=$obj_manufacture->select_all_manufacture_info();



?>







<div class="row-fluid sortable">
    <div class="box span12">
       <div class="box-header" data-orginal-title>
           <h2>Manage Menufacture Table</h2>
           <h3 class="text-success" style="text-align:center;"><?php if(isset($massage)) {echo $massage; unset($massage);}?></h3>
           
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
                     <th>Menufacture ID</th>
                     <th>Menufacture Name</th>
                     <th>Menufacture Description</th>
                     <th>Publication Status</th>
                     <th>Action</th>
                 </tr>
             </thead>
             <tbody>
                <?php while($manufacture_info=mysqli_fetch_assoc($query_result)) { ?>
                 <tr>
                     <td style="width: 10%;"><?php echo $manufacture_info['manufacture_id']; ?></td>
                     <td style="width: 10%;"><?php echo $manufacture_info['manufacture_name']; ?></td>
                     <td style="width: 50%;"><?php echo $manufacture_info['manufacture_description']; ?></td>
                     <td style="width: 15%;">
                        <?php 
                         if($manufacture_info['publication_status']==1){
                             echo 'Published';
                         }else{
                             echo 'Unpublished';
                         }
                         
                         ?>
                    </td>
                    <td class="center" style="width: 15%;">
                        <?php if($manufacture_info['publication_status']==1) { ?>
                        
                         <a class="btn btn-success" href="?status=unpublished&&id=<?php echo $manufacture_info['manufacture_id'] ?>" title="unpublished">
                         <i class="fas fa-arrow-up"></i></a>
                         
                         <?php }else { ?>
                         
                         <a class="btn btn-danger" href="?status=published&&id=<?php echo $manufacture_info['manufacture_id'] ?>" title="published">
                         <i class="fas fa-arrow-down"></i></a>
                         
                         <?php } ?>
                         
                         <a class="btn btn-info" href="edit_manufacture.php?id=<?php echo $manufacture_info['manufacture_id'] ?>"><i class="far fa-edit"></i></a>
                         
                         <a class="btn btn-danger" href="?status=delete&&id=<?php echo $manufacture_info['manufacture_id'] ?>" title="Delete" onclick=" return check_delete();"><i class="fas fa-trash"></i></a>
                     </td>
                 </tr>
                 <?php } ?>
             </tbody>
              
          </table>
           
       </div>
        
    </div>