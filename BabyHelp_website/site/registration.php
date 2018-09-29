<?php


include "connection.php";
 ?>

   <link rel="stylesheet" href="css/style.css">
<div id="regbox">

   <form id="registrationpage" action="index.php" method="post">
      <h1>Registration</h1>

         <input type="text" name="First_Name" class="input" placeholder="First Name" />
         <br>
         <input type="text" name="Last_Name" class="input" placeholder="Last Name" required/>
         <br>
		 <input type="tel" name="Contact_No" class="input" placeholder="Contact No" required/>
         <br>
         <input type="varchar" name="Email" class="input" placeholder="Email" required/>
         <br>
		 <input type="text" name="Gender" class="input" placeholder="Gender" required/>
         <br>
		 <input type="number_format" name="no_of_child" class="input" placeholder="Number of Children" required/>
         <br>
		 <input type="number_format" name="no_of_pm_child" class="input" placeholder="Number of Premature child" required/>
         <br>
         <input type="password" name="Password" class="input" placeholder="Password" required/>
		 <br>
         <input type="password" name="cpassword" class="input" placeholder="Re-enter Password" required/>
         <br>
         <input type="submit" name="signup" class="Registrationbutton" value="Submit" />

   </form>

   <?php

   if (isset($_POST['signup'])) {
      //echo '<script type="text/javascript"> alert("Register button click")</script>';

      $First_Name=$_POST['First_Name'];
      $Last_Name=$_POST['Last_Name'];
	  $Contact_No = $_POST['Contact_No'];
      $Email=$_POST['Email'];
      $Password=$_POST['Password'];
      $cpassword=$_POST['cpassword'];
	  $Gender = $_POST['Gender'];
	  $no_of_child =$_POST['no_of_child'];
	  $no_of_pm_child =$_POST['no_of_pm_child'];
	  

      if ($password == $cpassword) {
         $query = "SELECT * FROM manager WHERE email = '$Email' ";

         $query_run = mysqli_query ($con,$query);

         if (mysqli_num_rows($query_run)>0) {
            //all ready a user
            echo '<script type="text/javascript"> alert("User Exists !!")</script>';
         }
         else {
            $query1 = "INSERT INTO parent (First_name,Last_name,Contact_No,Email,Password,cpassword,Gender,no_of_child,no_of_pm_child)
                     VALUES ('".$_POST['First_Name']."','".$_POST['Last_Name']."','".$_POST['Contact_No']."','".$_POST['Email']."',
					 '".$_POST['Password']."','".$_POST['cpassword']."','".$_POST['Gender']."','".$_POST['no_of_child']."',
					 '".md5($_POST['no_of_pm_child'])."')";
            $query2 =  "INSERT INTO login (email,password) VALUES ('".$_POST['Email']."','".md5($_POST['Password'])."')";

			$query_run = mysqli_query ($con,$query1) && mysqli_query ($con,$query2);
        
            if ($query1_run) {
               echo '<script type="text/javascript"> alert("Member Add Successfully !!")</script>';
            }
            else {
               echo '<script type="text/javascript"> alert("!! Error !!")</script>';
            }


         }

      }
      else {
         echo '<script type="text/javascript"> alert("Please Enter Values !!")</script>';
      }
   }



    ?>
   <a href="login.php">Back to Login</a>
   <br><label id="msg">Only for Admin</label>
</div>

</body>
</html>
