<?php
        include "include/header.php";?>

<?php
        include "include/menu.php";?>


 <?php
 //kiem tra nguoi dung co an submit
    $pro = new product();
    $cate=new category();

    

         if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
             $id = $_GET['productId']; 
        $add_product=$pro->update_product($_POST,$_FILES,$id);  
    }        
?>

<section id="main-content">
	<section class="wrapper">
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Sửa sản phẩm
                        </header>
                      
                        <div class="panel-body">
                        	<?php
                                if(isset($add_product)){
                                    echo $add_product;
                                }
                            ?>
                            <div class="position-center">
                                <form role="form" action="" method="post" enctype="multipart/form-data">
                                	  <div class="form-group">
                                    <label for="exampleInputPassword1">Tên danh mục sản phẩm</label>
                                      <select name="cateId" class="form-control input-sm m-bot15" >
                                          <?php
                                            
                                    

                                                 $searchpro=$pro->getProductById($_GET['productId']);
                                                $cateList=$cate->show_category();
                                                if( $searchpro && $cateList){
                                                    $result3=$searchpro->fetch_assoc();
                                                    while ($result=$cateList->fetch_assoc() ) {
                                                     if($result['cateId']==$result3['cateId']){ 
                                                     
                                                    
                                            ?>
                                            <option selected  value="<?php echo $result['cateId'] ?>"><?php echo $result['cateName'] ?></option>
                                            <?php
                                        }
                                            else{
                                            ?>
                                            <option   value="<?php echo $result['cateId'] ?>"><?php echo $result['cateName'] ?></option>
                            
                                            <?php
                                        }
                                        
                                    }
                                }
                                            ?>
                                    </select>

                                </div>
                          
                              
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm </label>
                                    <input type="text"  class="form-control"  name="productName"   value="<?php echo $result3['productName'];?>" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng sản phẩm </label>
                                    <input type="text"  class="form-control"  name="productAmount"  value="<?php echo $result3['productAmount'];?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea id="summernote" name="productDesc"  > <?php echo $result3['productDesc'];?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>

                                    <input type="file" name="image" class="form-control" value="">
                                    <img src="uploads/<?php echo $result3['productImage'] ?>" width="80">
                                </div>
                               <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm </label>
                                    <input type="text"  class="form-control"  name="productPrice"  value="<?php echo $result3['productPrice'];?>" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                      <select name="productStatus" class="form-control input-sm m-bot15">
                                        <?php 
                                            
                                            if($$result3['productStatus']==1){
                                        ?>
                                           <option selected value="1">Hiển thị</option>
                                            <option value="0">Ẩn</option>
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <option value="1">Hiển thị</option>
                                        <option  selected value="0">Ẩn</option>
                                        <?php
                                    }
                                    ?>
                                    </select>
                                </div>
                         
                               
                                <button type="submit" name="submit" class="btn btn-info">Sửa sản phẩm</button>
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
