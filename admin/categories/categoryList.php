<?php include "database/connect.php"; ?>
<?php include "database/function.php"; ?>
<?php 
  updateRow();
  deleteRow();
  createRow();
?>
<?php include "./includes/header.php"?>
<!-- nội dung cua index -->
    <div class="container">
      <div class="row">
        <div class="col-md-6">
<!-- đây là nội dung hiển thị -->
        đây là trang categories
<!-- kết thúc nội dung hiển thị -->
        </div>         
      </div>
    </div>
<!-- kết thúc nọi dung của index -->
    <?php include "includes/footer.php"?>