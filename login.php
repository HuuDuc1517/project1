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
<!-- đây là nội dung hiển thị cua trang login -->
<form action="index.php" , method="post">
        <div class="container">
            <h1>Login</h1>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">
                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>
                    Email
                </label>
                <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" placeholder="plese inter email" name="email">
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-2 col-form-label">
                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z"/></svg>
                Password 

                </label>
                <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3" placeholder="plese inter password" name="password">
            </div>
        </div>    
        <button type="submit" class="btn btn-primary" value="regeter" name="login">login</button>
        <button type="reset" class="btn btn-primary" value="reset"> Reset </button>
    </form>
<!-- kết thúc nội dung hiển thị -->
        </div>         
      </div>
    </div>
<!-- kết thúc nọi dung của index -->
    <?php include "includes/footer.php"?>