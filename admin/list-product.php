<?php
        include "include/header.php";?>

<?php
        include "include/menu.php";?>

  <?php
    if(isset($_GET['productId'])  ){
        $id=$_GET['productId'];
        $delete = $pro->delete_product($id);
    }
    if(isset($_GET['activeProductId'])  ){
        $id=$_GET['activeProductId'];
        $active = $pro->active_product($id);
    }
    if(isset($_GET['unactiveProductId'])  ){
        $id=$_GET['unactiveProductId'];
        $unactive = $pro->unactive_product($id);
    }

?>

<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách sản phẩm
    </div>

    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
             
              </label>
             
            </th>
            <th >STT</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Tên danh mục</th>
        
            <th>Giá</th>
            <th>Đã nhập</th>
             <th>Đã bán</th>
            <th>Còn lại</th>
           
            <th>Hiển thị</th>
            


            <th>Sửa/Xóa </th>
           
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          <?php
              $show_product=$pro->show_product();
              if($show_product){
                $i = 0;
                while ( $result = $show_product->fetch_assoc() ) {
                  $i++;

          ?>
          <tr>
            <td><span class="text-center"><?php echo $i; ?></span></td>
            <td><label class="i-checks m-b-none"><i></i></label></td>
            <td><?php echo $result['productName'] ; ?></td>
            <td> <img src="uploads/<?php echo $result['productImage'] ?>" width="80"> </td>
           	 <td><?php 
           	 			$cateId=$result['cateId'];
           	 			$searchcate=$cate->getcateById($cateId);
           	 			if($searchcate){
           	 				$result1 = $searchcate->fetch_assoc();

           	 			
           	 			echo $result1['cateName'];
           	 		}

           	  ?></td>
             
           	  <td><?php echo $result['productPrice'] ; ?></td>
               <td><?php echo $result['productAmount']; ?></td>
               <td><?php
                $result2=$selled->getSumById($result['productId']);
                if($result2){
                  $conLai=$result2->fetch_assoc();
                  echo $conLai['SUM(amount)'];
                }

               ?>
              </td>
           	  <td>
             <?php
                $result2=$selled->getSumById($result['productId']);
                if($result2){
                  $daBan=$result2->fetch_assoc();
                  $conlai=$result['productAmount']-$daBan['SUM(amount)'];
                  if( $conlai<10 && $conlai>0){
                    echo "Sắp hết ($conlai)";
                  }
                  if($conlai ==0){
                    echo "Hết hàng";
                  }
                  if( $conlai>=10){
                    echo $conlai;
                  }
                }
               
               ?>
              </td>

           	  
               <td><span class="text-ellipsis">
              <?php
               if($result['productStatus']==0){
                ?>
                <a  href="?activeProductId=<?php echo  $result['productId'] ; ?>"><span class="fa-thumb-styling fa fa-thumbs-down fa-2x " style="color:green"></span></a>
                <?php
                 }else{
                ?>  
                <a href="?unactiveProductId=<?php echo  $result['productId'] ; ?>"><span class="fa-thumb-styling fa fa-thumbs-up fa-2x" style="color:red"></span></a>
                <?php
               }
              ?>
            </span></td>


            <td>
              <a href="edit-product.php?productId=<?php echo  $result['productId'] ; ?>" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i> </a> []

              	<a href="?productId=<?php echo  $result['productId'] ; ?>"onclick="return confirm('Bạn có chắc là muốn xóa sản phẩm này không?')" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text fa-2x"></i> </a>
          </td>


          </tr>
         <?php
            }
              }
         ?>

        </tbody>
      </table>
    </div>
  	
  </div>
</div>
</section>
</section>
<?php
        include "include/footer.php";?>