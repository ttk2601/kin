<?php
        include "include/header.php";?>

<?php
        include "include/menu.php";?>


  <?php
    $class = new category();

?>
  <?php
    if(isset($_GET['cateId'])  ){
        $id=$_GET['cateId'];
        $delete = $class->delete_category($id);
    }
  $class = new category();

?>

<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách danh mục sản phẩm
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
            <th>Tên danh mục</th>
            <th>Từ khóa danh mục</th>
            <th>Sửa</th>
            <th>Xóa</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          <?php
              $show_cate=$class->show_category();
              if($show_cate){
                $i = 0;
                while ( $result = $show_cate->fetch_assoc() ) {
                  $i++;

                  
                
              
          ?>
          <tr>
            <td><span class="text-center"><?php echo $i; ?></span></td>
            <td><label class="i-checks m-b-none"><i></i></label></td>
            <td><?php echo $result['cateName'] ; ?></td>
            <td><span class="text-ellipsis"><?php echo $result['cateSeo'] ;?></span></td>
           
            <td>
              <a href="edit-category.php?cateId=<?php echo  $result['cateId'] ; ?>" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i> </a></td>


             <td><a href="?cateId=<?php echo  $result['cateId'] ; ?>"onclick="return confirm('Bạn có chắc là muốn xóa danh mục này không?')" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text fa-2x"></i> </a></td>
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