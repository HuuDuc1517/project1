<?php include "database/function.php"?>
<?php
    // echo $_GET['email'];
    global $conn;
    $sql = "SELECT * FROM `users` WHERE emaail = '".$_GET['email']."'";
    $result =mysqli_query($conn,$sql);
    echo $sql;
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
  <?php include "includes/header.php";?>
<!-- thanh menu -->
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="index.php", method="post">
                    <?php
                        while($row = mysqli_fetch_assoc($result))
                        {
                    ?>
                    <h1>Login</h1>
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Full name</label>
                        <i class="fa-solid fa-envelope"></i><input type="text" name="fullname" value="<?=$row['fullname']?>" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <i class="fa-solid fa-envelope"></i><input type="email" name="email" value="<?=$row['email']?>" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <i class="fa-solid fa-lock-open"></i><input type="password" name="password" value="<?=$row['password']?>" class="form-control" id="password" placeholder="**********">
                    </div>
                    <div class="mb-3">
                    <i class="fa-solid fa-right-to-bracket"></i><input type="submit" value="Register" name="submit">
                        <input type="reset" value="Reset">
                    </div>
                    <?php
                        }
                    ?>
                </form>
            </div>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>