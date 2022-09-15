<?php
        include "include/header.php";?>

<?php
        include "include/menu.php";?>

  <?php
    $class = new sale();
     $cate = new category();

?>
  <?php
    if(isset($_GET['saleId'])  ){
        $id=$_GET['saleId'];
        $delete = $class->delete_sale($id);
    }


?>

<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách chương trình khuyến mãi
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
            <th>Tên chương trình</th>
            <th>Tên danh mục</th>
            <th>Khuyến mãi (%)</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày kết thúc</th>
            <th>Sửa/Xóa</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          <?php
              $show_sale=$class->show_sale();
              if($show_sale){
                $i = 0;
                while ( $result = $show_sale->fetch_assoc() ) {
                  $i++;

                  
                
              
          ?>
          <tr>
            <td><span class="text-center"><?php echo $i; ?></span></td>
            <td><label class="i-checks m-b-none"><i></i></label></td>
            <td><?php echo $result['saleName'] ; ?></td>
            <td><span class="text-ellipsis"><?php 
                  $catesreach=$cate->getcateById($result['cateId']);
                  if($catesreach){
                    $result1=$catesreach->fetch_assoc();
                      ?>
             </span><?php echo $result1['cateName'];?></td>
                <?php
                     }
                      ?>
                      <td><?php echo $result['sale'] ; ?></td>
                      <td><?php echo $result['dateStart'] ; ?></td>
                      <td><?php echo $result['dateEnd'] ; ?></td>
            <td> 
              <a href="edit-sale.php?saleId=<?php echo  $result['saleId'] ; ?>" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i> </a>[]
              <a href="?saleId=<?php echo  $result['saleId'] ; ?>"onclick="return confirm('Bạn có chắc là muốn xóa không?')" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text fa-2x"></i> </a>
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