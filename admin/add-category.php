<?php
        include "include/header.php";?>

<?php
        include "include/menu.php";?>

 <?php
	$class = new category();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     	$cateName = $_POST['cateName'];
     	$cateDesc = $_POST['cateDesc'];
     	$cateSeo = $_POST['cateSeo'];

     	$insertCat = $class->add_category($cateName,$cateDesc,$cateSeo);
     	
	}
?>
<section id="main-content">
	<section class="wrapper">
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm danh mục sản phẩm
                        </header>
                      
                        <div class="panel-body">
                        	<?php
                        		if(isset($insertCat)){
                        			echo $insertCat;
                        		}
                        	?>
                            <div class="position-center">
                                <form role="form" action="add-category.php" method="post">
                              
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text"  class="form-control"  name="cateName"  id="slug" placeholder="danh mục" >
                                </div>
                              
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="cateDesc" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Từ khóa danh mục</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="cateSeo" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                                </div>
                         
                               
                                <button type="submit" name="submit" class="btn btn-info">Thêm danh mục</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>

 </div>
</section>
</section>
<?php
        include "include/footer.php";?>
