<?php
        include "include/header.php";?>

<?php
        include "include/menu.php";?>

 <?php
	$sale = new sale();
	    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
             $id = $_GET['saleId']; 
        $update_sale=$sale->update_sale($_POST,$id);  
    }
?>
<section id="main-content">
	<section class="wrapper">
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Sửa chương trình khuyến mãi
                        </header>
                      
                        <div class="panel-body">
                        	<?php
                        		if(isset($update_sale)){
                        			echo $update_sale;
                        		}
                        	?>
                            <div class="position-center">
                                <form role="form" action="" method="post">
                                    <?php
                                        $getsale=$sale->getSaleById($_GET['saleId']);
                                        if($getsale){
                                            $result=$getsale->fetch_assoc();
                                           
                                    ?>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên chương trình khuyến mãi </label>
                                    <input type="text"  class="form-control"  name="saleName"  id="slug" placeholder="thương hiệu" value="<?php echo $result['saleName']?>" >
                                </div>
                              

                               <div class="form-group">
                                    <label for="exampleInputPassword1">Tên danh mục sản phẩm</label>
                                      <select name="cateId" class="form-control input-sm m-bot15">
                                            <?php
                                                $cate=new category();
                                                $cateList=$cate->show_category();
                                                if($cateList){
                                                    while ( $result1=$cateList->fetch_assoc() ) {
                                                        if( $result['cateId'] == $result1['cateId']){

                                                     
                                                    
                                            ?>
                                            <option selected value="<?php echo $result1['cateId'] ?>"><?php echo $result1['cateName'] ?></option>
                                        
                                        <?php
                                    }
                                        else{
                                        ?>
                                        <option  value="<?php echo $result1['cateId'] ?>"><?php echo $result1['cateName'] ?></option>
                                        <?php
                                    }
                                }
                            }
                                            ?>
                                    </select>

                                </div>
                              
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Khuyến mãi (%)</label>
                                    <input type="text"  class="form-control"  name="sale"  id="slug" placeholder="thương hiệu" value="<?php echo$result['sale']  ?>"  >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Ngày bắt đầu (yyyy-mm-dd)</label>
                                     <input type="text"  class="form-control"  name="dateStart"  id="slug" placeholder="thương hiệu" value="<?php echo $result['dateStart']  ?>"  >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Ngày kết thúc (yyyy-mm-dd)</label>
                                     <input type="text"  class="form-control"  name="dateEnd"  id="slug" placeholder="thương hiệu" value="<?php echo $result['dateEnd'] ?>"  >
                                </div>
                         
                               
                                <button type="submit" name="submit" class="btn btn-info">Sửa </button>
                                </form>
                            </div>
                            <?php
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
