
<?php
    session_start();
    include "connect.php";
    function createRow(){
        global $conn;
        if(isset($_POST['submit'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $FullName = $_POST['fullname'];
            $query = "INSERT INTO users(email, password, FullName) VALUES('$email','$password','$FullName')";  
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
              <td><a href='updateForm.php?email=$email&password=$password'><i class='fa-solid fa-pen-to-square text-success'></i></a></td>
              <td><a href='index.php?email=$email&delete=delete'><i class='fa-solid fa-trash text-danger'></i></a></td>
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
            
            $query = "SELECT * FROM users WHERE email = '".$_POST['email']."'AND password ='".$_POST['password']."'";  
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