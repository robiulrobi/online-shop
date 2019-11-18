
<?php

$query_published=$obj_application->select_all_published_category();


?>

<!--    <script>
var xmlHttp= new XMLHttpRequest();
function showResult(given_string,objID){
    //alert(objID);
        var server_page = 'ajax_search.php?search='+given_string;
        xmlHttp.open('$_GET', server_page);
        xmlHttp.onreadystatechange = function () {
            if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                document.getElementById(objID).innerHTML = xmlHttp.responseText;
            }
        }
   xmlHttp.send(null);
    }
    
    
    </script>-->

        
        
        
        <div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php" class="active">Home</a></li>
								
								<?php while($category_publish=mysqli_fetch_assoc($query_published)) {?>
								
								<li><a href="category.php?id=<?php echo $category_publish['category_id'];?>"><?php echo $category_publish['category_name'];?></a></li>
								
								<?php } ?>
								
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
                                                    <input type="text" placeholder="Search"/>                         
						</div>
					</div>
				</div>
			</div>
		</div>