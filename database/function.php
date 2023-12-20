
<?php
    session_start();
    include "connect.php";
    function createRow(){
        global $conn;
        if(isset($_POST['submit'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $fullName = $_POST['fullname'];
            $query = "INSERT INTO users(email, password, FullName) VALUES('$email','$password','$fullName')";  
            $result = mysqli_query($conn, $query);
            if(!$result){
                die("query failed !!!".mysqli_error());
            } else {
                echo "Record Create";
            }
        }
    }

    // function readRows(){
    //     global $conn;
    //     $query = "SELECT * FROM users";
    //     $result = mysqli_query($conn, $query);
    //     if (mysqli_num_rows($result) > 0) {
    //         // output data of each row
    //         while($row = mysqli_fetch_assoc($result)) {
    //           echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    //         }
    //       } else {
    //         echo "0 results";
    //       }

            // if(!$result){
            //     die("query failed !!!".mysqli_error());
            // } else {
            //     echo "Record Create";
            // }       
    // }

    function showAllData(){
        global $conn;
        $query = "SELECT * FROM users";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("query failed".mysqli_error());
        } 
        $i = 0;
        while($row = mysqli_fetch_assoc($result)) {
              $email = $row['email'];
              $password = $row['password'];
              $fullName = $row['FullName'];
              echo "<tr>
              <td>".$i++."</td>
              <td>".$email."</td>
              <td>".$fullName."</td>
              <td>".$password."</td>
              <td>
                <a href='updateform.php?email=$email&password=$password'>
                <svg xmlns='http://www.w3.org/2000/svg' height='16' width='18' viewBox='0 0 576 512'><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d='M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V299.6l-94.7 94.7c-8.2 8.2-14 18.5-16.8 29.7l-15 60.1c-2.3 9.4-1.8 19 1.4 27.8H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zM549.8 235.7l14.4 14.4c15.6 15.6 15.6 40.9 0 56.6l-29.4 29.4-71-71 29.4-29.4c15.6-15.6 40.9-15.6 56.6 0zM311.9 417L441.1 287.8l71 71L382.9 487.9c-4.1 4.1-9.2 7-14.9 8.4l-60.1 15c-5.5 1.4-11.2-.2-15.2-4.2s-5.6-9.7-4.2-15.2l15-60.1c1.4-5.6 4.3-10.8 8.4-14.9z'/></svg></td>
              <td>
                <a href='index.php?email=$email&delete=delete'>
                <svg xmlns='http://www.w3.org/2000/svg' height='16' width='14' viewBox='0 0 448 512'><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d='M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z'/></svg></td>
              <tr>";
            }
        }

        function updateRow(){
            if(isset($_POST['update'])){
                global $conn;
                $query = "UPDATE users SET 
                Email='".$_POST['email']."' ,
                Password='".$_POST['password']."', 
                FullName=' ".$_POST['fullName']."' WHERE Email='".$_POST['emailOld']."'";
                $result = mysqli_query($conn,$query);
                if(!$result){
                    die("Query failed!".mysqli_error());
                }else{
                    echo "Record Update";
                }
            }
        }
        function deleteRow(){
            if(isset($_GET['delete'])){
                global $conn;
                $query = "DELETE FROM users WHERE Email='".$_GET['email']."'";
               
                $result = mysqli_query($conn,$query);
                if(!$result){
                    die("Query failed!".mysqli_error());
                }else{
                    echo "Record Delete Success!";
                }
            }
        }

    // ================================Login==========================================
    function login($email,$password){
        global $conn;
        if(isset($_POST['login'])){
            $password = mysqli_real_escape_string($conn, $password);
            
            $query = "SELECT * FROM users WHERE Email = '".$_POST['email']."'AND Password ='".$_POST['password']."'";  
            $result = mysqli_query($conn, $query);
            echo $query;
            if(!$result){
                die("query failed !!!".mysqli_error());
            } 
                while($row = mysqli_fetch_assoc($result)) {
                $db_email = $row['email'];
                $db_password = $row['password'];
                $db_fullname = $row['fullname'];
                if($password === $db_password && $email === $db_email){
                    $_SESSION['s_email'] = $db_email;
                    $_SESSION['s_fullname'] = $db_fullname;
                    header('location: /project1/admin');
                } else {
                    header('location: /project1/login.php');
                }
            }           
        }
     }

    function checkLogin(){
        if(isLogin()){
            header('Localhost: /project1/admin');
        }else{
            header('Localhost: /project1');
        }
    }
    function isLogin(){
        if(isset($_SESSION['s_email'])){
            return true;
        }
        return false;
    }

// ======================kết thúc phần login================================

?>