<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/homecss.css">
  <link rel="stylesheet" href="css/postneedcss.css">
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
  <div class="pnform">
            <form action="#" method="post">
              <br><br>
              <fieldset>
                <legend><h3>POST FOR NEED</h3></legend>
                <br>
                <label>Patient Name</label><br>
                <input type="text" name="pname" placeholder="Enter Your Name" required />
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
            <input type="phone" name="num" placeholder="Enter Contact Number" required />
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
            <label>Date of Day Blood is Needed</label><br>
            <input type="date" name="dnob"/>
            <br><br>
            <label>Hospital Name & Location</label><br>
            <input type="text" name="hname" placeholder="Enter Hospital Name" required />
            <br><br>
            <input type="submit" name="posneed" value="POST"/>
            <br>
          </fieldset>
          </form>
		  <?php
			try {
            $con = new PDO ("mysql:host=localhost;dbname=blood_donor",'root','mysql');
			if(isset($_POST['posneed']))
			{
			$postid=rand(1111,9999);
			$pname=$_POST['pname'];	
			$bgroup=$_POST['bgrp'];
			$phone=$_POST['num'];
			$place=$_POST['place'];
			$dnob=$_POST['dnob'];
			$hname=$_POST['hname'];
			$insert = $con->prepare("INSERT INTO post_need(postid,pname,bgroup,phone,place,dnob,hname)
			 values(:postid, :pname, :bgroup, :phone, :place, :dnob, :hname)");
			 $insert->bindParam (':postid',$postid);
			 $insert->bindParam (':pname',$pname);
			 $insert->bindParam (':bgroup',$bgroup);
			 $insert->bindParam (':phone',$phone);
			 $insert->bindParam (':place',$place);
			 $insert->bindParam (':dnob',$dnob);
			 $insert->bindParam (':hname',$hname);
			 $check=$insert->execute();
			 if($check)
			 {
			   echo '<script language="javascript">swal("Thank You..!! Your Post Has been Posted..!!", "Our Volunteers will reach you soon..!!", "success");</script>';
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
