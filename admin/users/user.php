<?php include "database/function.php"?>
<?php
  updateRow();
  createRow();

?>
<?php include "../includes/header.php";?>
<!-- noi dung index -->
<div class="container">
        <div class="row">
            <div class="col-md-6">

<!-- day la noi dung hien thi -->
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Email</th>
                    <th scope="col">Full name</th>
                    <th scope="col">password</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php showAllData();  ?>
                </tbody>
            </table>

<!-- ket thuc noi dung hien thi -->
            </div>
        </div>
    </div>
<!-- ket thuc noi dung -->   
<?php include "includes/footer.php"?>   