<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/homecss.css">
  <link rel="stylesheet" href="css/regcss.css">
  <script src="js/sweetalert.min.js" type="text/javascript"></script>
  <!--Modal Box Plugins-->
  <!--Modal Box-->
  <title>Blood Donor</title>
</head>
<body>
<header>
  <img src="./img/he.jpg"/>
</header>
<nav>
    <ul>
      <a href="index.php"><li>HOME</li></a>
      <a href="search.php"><li>SEARCH DONOR</li></a>
      <a href="bbanks.php"><li>BLOOD BANKS</li></a>
      <a href="bcamps.php"><li>BLOOD DONATION CAMPS</li></a>
      <a href="contact.php"><li>CONTACT US</li></a>
    </ul>
</nav>


<article>
  <div class="rform">
            <form action="reg_don.php" method="post">
              <br><br>
              <fieldset>
                <legend><h3>Register As a Donor</h3></legend>
                <br>
                <label>Name</label><br>
                <input type="text" name="uname" placeholder="Enter Your Name" required />
                <br><br>
                <label>Blood Group</label><br>
                <select name="bgrp">
                  <option selected="selected" value="Select One">Select One</option>
	                <option value="A+">A+</option>
                  	<option value="A-">A-</option>
                  	<option value="AB+">AB+</option>
                  	<option value="AB-">AB-</option>
                  	<option value="B+">B+</option>
                  	<option value="B-">B-</option>
                  	<option value="O+">O+</option>
                  	<option value="O-">O-</option>
                  	<option value="A1+">A1+</option>
                  	<option value="A1-">A1-</option>
                  	<option value="A2+">A2+</option>
                  	<option value="A2-">A2-</option>
                  	<option value="A1B+">A1B+</option>
                  	<option value="A1B-">A1B-</option>
                  	<option value="A2B+">A2B+</option>
                  	<option value="A2B-">A2B-</option>
                  	<option value="Bombay Blood Group">Bombay Blood Group</option>
                </select>
                <br><br>
            <label>Contact Number</label><br>
            <input type="phone" name="pnum" placeholder="Enter Contact Number" required />
            <br><br>
            <label>Email ID</label><br>
            <input type="email" name="mail" placeholder="Enter your Mail id" />
            <br><br>
            <input type="radio" name="gender" value="male"> Male &nbsp
            <input type="radio" name="gender" value="female"> Female
            <br><br>
            <label>Date of Birth</label><br>
            <input type="date" name="dob" required />
            <br><br>
            <label>Status</label>
            <select name="status">
              <option>--select--</option>
              <option value="Availabe">Availabe</option>
              <option value="Un Availabe">Un Availabe</option>
            </select>
            <br><br>
            <label>Place</label><br>
            <select name="place">
                    <option value="">--Select--</option>
                    <option value="ADILABAD">ADILABAD</option>
                    <option value="BHADRADRI KOTHAGUDEM">BHADRADRI KOTHAGUDEM</option>
                    <option value="HYDERABAD">HYDERABAD</option>
                    <option value="JAGTIAL">JAGTIAL</option>
                    <option value="JANGOAN">JANGOAN</option>
                    <option value="JAYASHANKAR BHUPALPALLI">JAYASHANKAR BHUPALPALLI</option>
                    <option value="JOGULAMBA GADWAL">JOGULAMBA GADWAL</option>
                    <option value="KAMAREDDY">KAMAREDDY</option>
                    <option value="KARIMNAGAR">KARIMNAGAR</option>
                    <option value="KHAMMAM">KHAMMAM</option>
                    <option value="KUMRAMBHEEM ASIFABAD">KUMRAMBHEEM ASIFABAD</option>
                    <option value="MAHABUBABAD">MAHABUBABAD</option>
                    <option value="MAHABUBNAGAR">MAHABUBNAGAR</option>
                    <option value="MANCHERIAL">MANCHERIAL</option>
                    <option value="MEDAK">MEDAK</option>
                    <option value="MEDCHAL-MALKAJIGIRI">MEDCHAL-MALKAJIGIRI</option>
                    <option value="NAGARKURNOOL">NAGARKURNOOL</option>
                    <option value="NALGONDA">NALGONDA</option>
                    <option value="NIRMAL">NIRMAL</option>
                    <option value="NIZAMABAD">NIZAMABAD</option>
                    <option value="PEDDAPALLI">PEDDAPALLI</option>
                    <option value="RAJANNA SIRCILLA">RAJANNA SIRCILLA</option>
                    <option value="RANGA REDDY">RANGA REDDY</option>
                    <option value="SANGAREDDY">SANGAREDDY</option>
                    <option value="SIDDIPET">SIDDIPET</option>
                    <option value="SURYAPET">SURYAPET</option>
                    <option value="VIKARABAD">VIKARABAD</option>
                    <option value="WANAPARTHY">WANAPARTHY</option>
                    <option value="WARANGAL RURAL">WARANGAL RURAL</option>
                    <option value="WARANGAL URBAN">WARANGAL URBAN</option>
                    <option value="YADADRI BHUVANAGIRI">YADADRI BHUVANAGIRI</option>
            </select>
            <br><br>
            <label>Address</label><br>
            <input type="text" name="addre" placeholder="Enter your Address" required />
            <br><br>
            <input type="submit" name="dreg" value="REGISTER"/>
            <br>
          </fieldset>
          </form>
		  <?php
			try {
            $con = new PDO ("mysql:host=localhost;dbname=blood_donor",'root','mysql');
			if(isset($_POST['dreg']))
			{
			$regid=rand(1111,9999);
			$name=$_POST['uname'];	
			$bgroup=$_POST['bgrp'];
			$phone=$_POST['pnum'];
			$email=$_POST['mail'];
			$gender=$_POST['gender'];
			$dob=$_POST['dob'];
			$status=$_POST['status'];
			$place=$_POST['place'];
			$address=$_POST['addre'];
			$insert = $con->prepare("INSERT INTO reg_don(regid,name,bgroup,phone,email,gender,dob,status,place,address)
			 values(:regid, :name, :bgroup, :phone, :email, :gender, :dob, :status, :place, :address)");
			 $insert->bindParam (':regid',$regid);
			 $insert->bindParam (':name',$name);
			 $insert->bindParam (':bgroup',$bgroup);
			 $insert->bindParam (':phone',$phone);
			 $insert->bindParam (':email',$email);
			 $insert->bindParam (':gender',$gender);
			 $insert->bindParam (':dob',$dob);
			 $insert->bindParam (':status',$status);
			 $insert->bindParam (':place',$place);
			 $insert->bindParam (':address',$address);
			 $check=$insert->execute();
			 if($check)
			 {
			   echo '<script language="javascript">swal("Thank You for Registering as Donor..!!", "your help may save someones Lifes..!!", "success");</script>';
			  }
			  else
			  {
				echo '<script language="javascript">swal("Sorry!", "Unable to process Try again later..!!", "error");</script>';

			  }
			}
			}
			catch (PDOException $e) {
			echo "Error: ". $e -> getMessage();
			}
			?>
		  
		  
		  
		  
  </div>
</article>


<footer>
  <p>Copyright (c) 2018 Copyright Holder All Rights Reserved.</p>
</footer>
</body>
</html>
