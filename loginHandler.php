<?php

include('config.php');
session_start();

if (isset($_POST['submit'])) {
   $email = $_POST['username'];
   $password = $_POST['password'];
   $hashedPassword = md5($password);

   $sql = "SELECT * FROM users WHERE username='$email' AND password='$hashedPassword'";

   $result = mysqli_query($conn, $sql);

   if (mysqli_num_rows($result) > 0) {
       while ($row = mysqli_fetch_row($result)) {
         $role=  $row[4];
        
         $_SESSION['username'] = $row[1];
         $_SESSION['userId'] = $row[0];
         

         if($role=="admin"){
            header("Location: home.php");
         }
         else{
            echo "home";
           header("Location: homepage.php");
         }

       }

       echo "login success";
   } else {
      echo "Invalid email or password.";
   }
}

