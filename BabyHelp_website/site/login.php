<?php

include "connection.php";
?>

<link rel="stylesheet" href="css/style.css">

<div id="loginbox">
   <form id="loginpage" action="login.php" method="post">
      <h1>Login</h1>

         <input name="Email" type="text" class="input"  placeholder="Email" required/>
         <br>
         <input name="Password" type="password" class="input"  placeholder="Password" required/>
         <br>
         <input name="login" type="submit" class="loginbutton" value="SIGN IN" />

   </form>
   <?php

      if(isset($_POST['login'])){

         $Email=$_POST['Email'];
         $password=$_POST['Password'];

         $query = "SELECT * FROM login WHERE	email = '$Email' AND password = md5('$Password')";

         $query_run = mysqli_query($con,$query);

         if (mysqli_num_rows ($query_run) > 0) {
            //vaild
            $_SESSION['Email']=$Email;
           
         }
         else {
            //Invaild
            echo '<script type="text/javascript"> alert("Invaild User")</script>';
         }


      }



    ?>


   <a href="registration.php">Register</a>
   <br><label id="msg">Only for Admins</label>
</div>
