<?php
        include "include/header.php";?>

<?php
        include "include/menu.php";?>

 <?php
	$sale = new sale();
	 if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        
        $addSale=$sale->add_sale($_POST);
  
    }
?>
<section id="main-content">
	<section class="wrapper">
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm chương trình khuyến mãi
                        </header>
                      
                        <div class="panel-body">
                        	<?php
                        		if(isset($addSale)){
                        			echo $addSale;
                        		}
                        	?>
                            <div class="position-center">
                                <form role="form" action="add-sale.php" method="post">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên chương trình khuyến mãi </label>
                                    <input type="text"  class="form-control"  name="saleName"  id="slug" placeholder="thương hiệu" >
                                </div>
                              

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
                                    <label for="exampleInputPassword1">Khuyến mãi (%)</label>
                                    <input type="text"  class="form-control"  name="sale"  id="slug" placeholder="thương hiệu" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Ngày bắt đầu (yyyy-mm-dd)</label>
                                     <input type="text"  class="form-control"  name="dateStart"  id="slug" placeholder="thương hiệu" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Ngày kết thúc (yyyy-mm-dd)</label>
                                     <input type="text"  class="form-control"  name="dateEnd"  id="slug" placeholder="thương hiệu" >
                                </div>
                         
                               
                                <button type="submit" name="submit" class="btn btn-info">Thêm </button>
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
