<?php
        include "include/header.php";?>

<?php
        include "include/menu.php";?>

 <?php
    if(isset($_GET['cateId']) && $_GET['cateId'] !=NULL ){
        $id=$_GET['cateId'];
    }
	$class = new category();

?>

 <?php
    $class = new category();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $cateName = $_POST['cateName'];
        $cateDesc = $_POST['cateDesc'];
        $cateSeo = $_POST['cateSeo'];

        $updeate = $class->update_category($id,$cateName,$cateDesc,$cateSeo);
        
    }
?>
<section id="main-content">
	<section class="wrapper">
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Sửa danh mục sản phẩm
                        </header>
                      
                        <div class="panel-body">
                        	<?php
                        		if(isset($updeate)){

                        			echo $updeate;
                        		}
                        	?>
                            <?php
                                $get_cate_name=$class->getcateById($id);
                                if($get_cate_name){
                                    while ($result = $get_cate_name->fetch_assoc()) {
                                        
                                
                            ?>
                            <div class="position-center">
                                <form role="form" action="" method="post">
                              
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text"  class="form-control"  name="cateName"   value="<?php echo $result['cateName']; ?>">
                                </div>
                              
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="cateDesc" ><?php echo $result['cateDesc'];?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Từ khóa danh mục</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="cateSeo" ><?php echo $result['cateSeo']; ?></textarea>
                                </div>
                         
                               
                                <button type="submit" name="submit" class="btn btn-info">Sửa danh mục</button>
                                </form>
                            </div>
                            <?php
                        }
                    }
                    ?>
                        </div>
                    </section>

            </div>

 </div>
</section>
</section>
<?php
        include "include/footer.php";?>
