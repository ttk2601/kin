<?php
        include "include/header.php";?>

<?php
        include "include/menu.php";?>


 <?php
 //kiem tra nguoi dung co an submit
    $class = new product();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        
        $add_product=$class->add_product($_POST,$_FILES);

        
        
    }
?>


<section id="main-content">
	<section class="wrapper">
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm sản phẩm
                        </header>
                      
                        <div class="panel-body">
                        	<?php
                                if(isset($add_product)){
                                    echo $add_product;
                                }
                            ?>
                            <div class="position-center">
                                <form role="form" action="add-product.php" method="post" enctype="multipart/form-data">
                                	  <div class="form-group">
                                    <label for="exampleInputPassword1">Tên danh mục sản phẩm</label>
                                      <select name="cateId" class="form-control input-sm m-bot15">
                                            <?php
                                                $cate=new category();
                                                $cateList=$cate->show_category();
                                                if($cateList){
                                                    while ($result=$cateList->fetch_assoc() ) {
                                                     
                                                    
                                            ?>
                                            <option value="<?php echo $result['cateId'] ?>"><?php echo $result['cateName'] ?></option>
                                            <?php
                                        }
                                    }
                                            ?>
                                    </select>

                                </div>
                          
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm </label>
                                    <input type="text"  class="form-control"  name="productName"  placeholder="danh mục" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng sản phẩm </label>
                                    <input type="text"  class="form-control"  name="productAmount"  placeholder="danh mục" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea id="summernote" name="productDesc"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                               <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm </label>
                                    <input type="text"  class="form-control"  name="productPrice"  placeholder="danh mục" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                      <select name="productStatus" class="form-control input-sm m-bot15">
                                           <option value="1">Hiển thị</option>
                                            <option value="0">Ẩn</option>
                                            
                                    </select>
                                </div>
                         
                               
                                <button type="submit" name="submit" class="btn btn-info">Thêm sản phẩm</button>
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
