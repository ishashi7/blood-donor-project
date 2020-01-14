<?php
include("config.php");
session_start();
$error="";
?>
<?php 
 try {
  $con = new PDO ("mysql:host=localhost;dbname=blood_donor",'root','mysql');
  if(isset($_POST['alogin']))
  {	
  $email=$_POST["ademail"];	
  $password=$_POST["adpwd"];	
  $stmt = $con->prepare("SELECT * FROM admin WHERE  email=:email  AND  password=:password");
  $stmt->bindParam("email", $email,PDO::PARAM_STR) ;
  $stmt->bindParam("password", $password,PDO::PARAM_STR) ;
  $stmt->execute();
  $count=$stmt->rowCount();
  $data=$stmt->fetch(PDO::FETCH_OBJ);
  if($count)
  {
	header("Location: ./admin/bd_admin.php");
  }
  else
  {
   $error="Invalid email and password";
  }
 }
 }
catch (PDOException $e) {
echo "Error: ". $e -> getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/homecss.css">
  <script src="js/sweetalert.min.js" type="text/javascript"></script>
  <!--Modal Box Plugins-->
  <script src="js/jquery.min.js" type="text/javascript"></script>
  <script src="js/jqueryjs.js" type="text/javascript" charset="utf-8"></script>
  <link rel="stylesheet" href="css/jquerycss.css" type="text/css" media="screen" />
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


<div class="ban1">
  <div class="ban2">
    <img src="./img/baner.jpg"/>
  </div>
  <div class="ban3">
    <h3>Admin Login</h3>
      <hr>
    <form action="" method="post">
      <br>
      <label>Email</label>
      <br>
      <input type="text" name="ademail" placeholder=" Enter your Email" required />
      <br><br>
      <label>Password</label><br>
      <input type="password" name="adpwd" placeholder=" Enter your Password" required />
      <br><br>
	  <span style="color:red;"><?php echo $error ?></span><br><br>
      <input type="submit" name="alogin"  value="LOGIN"/>
      <br><br>
    </form>
    <hr>
    <a href="#ex1" rel="modal:open"><button>EMERGENCY REQUEST</button></a>

         <div id="ex1" style="display:none;">
            <form action="index.php" method="post">
              <fieldset>
                <legend><h3>Make an Emergency Request</h3></legend>
                <br>
                <label>Patient Name</label><br>
                <input type="text" name="name" placeholder="Enter Your Name" required />
                <br><br>
                <label>Blood Group Needed</label><br>
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
            <input type="phone" name="cnum" placeholder="Enter Contact Number" required />
            <br><br>
            <label>Date of When Blood Required</label><br>
            <input type="date" name="dor" required />
            <br><br>
            <label>Location</label><br>
            <input type="text" name="loca" placeholder="Enter Place of Location" required />
            <br><br>
            <label>Hospital Name</label><br>
            <input type="text" name="hname" placeholder="Enter Name of Hospital" required />
            <br><br>
            <input type="submit" name="mareq" value="MAKE A REQUEST"/>
            <br><br>
            <p>Note: Please Make a Call to this Number: 9000011111 After Making a Request to Respond Quickly</p>
            </fieldset>
            </form>
			<?php
			try {
            $con = new PDO ("mysql:host=localhost;dbname=blood_donor",'root','mysql');
			if(isset($_POST['mareq']))
			{
			$request_id=rand(1111,9999);
			$pname=$_POST['name'];	
			$bgroup=$_POST['bgrp'];
			$phone=$_POST['cnum'];
			$dor=$_POST['dor'];
			$location=$_POST['loca'];
			$hname=$_POST['hname'];
			$insert = $con->prepare("INSERT INTO emg_req(request_id,pname,bgroup,phone,dor,location,hname)
			 values(:request_id, :pname, :bgroup, :phone, :dor, :location, :hname)");
			 $insert->bindParam (':request_id',$request_id);
			 $insert->bindParam (':pname',$pname);
			 $insert->bindParam (':bgroup',$bgroup);
			 $insert->bindParam (':phone',$phone);
			 $insert->bindParam (':dor',$dor);
			 $insert->bindParam (':location',$location);
			 $insert->bindParam (':hname',$hname);
			 $check=$insert->execute();
			 if($check)
			 {
			   echo '<script language="javascript">swal("Thank You for Making Emergency Request..!!", "we will Inform You soon..!!", "success");</script>';
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
			
            <a href="#" rel="modal:close"></a>
              </div>
  </div>
</div>


<article>
  <aside>
     <a href="reg_don.php"><div class="redon">
        <img src="img/01.jpg" alt="register as donor"/>
        <h4>Register as Donor</h4>
     </div></a>

  <a href="post_need.php"><div class="pfn">
    <img src="img/02.jpg" alt="need blood"/>
    <h4>Post for Need</h4>
  </div></a>

</aside>


<div class="aside1">
  <div class="lon">
   <h3>LIST OF NEEDS</h3>
   <hr>
     <marquee direction="up" height="420px"> 
    <?php
	include("config.php");
	$selectdata = "SELECT pname,bgroup,phone,place,dnob,hname FROM post_need";
	$query = mysqli_query($con,$selectdata);
	while($row = mysqli_fetch_array($query))
    {
		echo "&nbsp &nbsp <b>Patient Name:</b> &nbsp".$row['pname']."<br>";
		echo "&nbsp &nbsp <b>Blood Group:</b> &nbsp".$row['bgroup']."<br>";
		echo "&nbsp &nbsp <b>Contact Number:</b> &nbsp".$row['phone']."<br>";
		echo "&nbsp &nbsp <b>Place:</b> &nbsp".$row['place']."<br>";
		echo "&nbsp &nbsp <b>Need Blood on:</b> &nbsp".$row['dnob']."<br>";
		echo "&nbsp &nbsp <b>Hospital Name:</b> &nbsp".$row['hname']."<br><br><hr><br>";
	}
	?>
    </marquee>
   </div>
</div>


<div class="aside2">

   <a href="up_avail.php"><div class="uysa">
     <img src="img/03.jpg" alt="Status"/>
     <h4>Update your Availabilty Status</h4>
   </div></a>

   <a href="term_cnd.php"><div class="tnc">
     <img src="img/04.jpg" alt="Terms and Conditions"/>
     <h4>Terms and Conditions</h4>
   </div></a>

</div>
</article>


<footer>
  <p>Copyright (c) 2018 Copyright Holder All Rights Reserved.</p>
</footer>
</body>
</html>
