<?php include "database/function.php"?>
<?php 
  updateRow();
  createRow();
  deleteRow();
  if(isset($_POST['login'])){
    login($_POST['email'],$_POST['password']);
  }
  
?>
<?php include "includes/header.php";?>
<!-- noi dung cua index -->
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                this is index pages
            </div>
        </div>
    </div>
<!-- ket thuc noi dung cua index   -->
<?php include "includes/footer.php"?>