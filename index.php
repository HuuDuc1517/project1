<?php include "database/connect.php"; ?>
<?php include "database/function.php"; ?>
<?php 
  updateRow();
  deleteRow();
  createRow();
  login($_POST['email'],$_POST['password']);
?>
<?php include "./includes/header.php"?>
<!-- nội dung cua index -->
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          this is the pege
        </div>         
      </div>
    </div>
<!-- kết thúc nọi dung của index -->
    <?php include "includes/footer.php"?>