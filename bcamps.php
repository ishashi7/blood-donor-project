<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/homecss.css">
  <link rel="stylesheet" href="css/bcampscss.css">
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
  <div class="bcform">
            <form action="bcamps.php" method="post">
              <br><br>
              <fieldset>
                <legend><h3>BLOOD DONATION CAMPS REGISTRATION</h3></legend>
                <br>
            <label>Organised By:</label>
            <input type="text" name="oname" placeholder="Enter Name of Organisation" required />
            <label>Blood Bank:</label>
            <input type="text" name="bname" placeholder="Enter Name of Blood Bank" required />
            <br><br>
            <label>Contact Number: </label>
            <input type="phone" name="num" placeholder="Enter Contact Number" required />
			
            <label>&nbsp &nbsp &nbsp&nbsp Email ID: </label>
            <input type="email" name="mail" placeholder="Enter your Mail id" />
            <br><br>
            <label>Scheduled Date: </label>
            <input type="date" name="doc" required />
            <label>&nbsp &nbsp &nbsp&nbsp  Place</label>
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
            <label>Camp Address: </label>
            <input type="text" name="addre" placeholder="Enter Address" required />
             <br><br>
            <input type="submit" name="bcamp" value="REGISTER"/>
            <br><br>
          </fieldset>
          </form>
		  <?php
			try {
            $con = new PDO ("mysql:host=localhost;dbname=blood_donor",'root','mysql');
			if(isset($_POST['bcamp']))
			{
			$campid=rand(1111,9999);
			$orgname=$_POST['oname'];	
			$bbname=$_POST['bname'];
			$phone=$_POST['num'];
			$email=$_POST['mail'];
			$doc=$_POST['doc'];
			$place=$_POST['place'];
			$caddress=$_POST['addre'];
			$insert = $con->prepare("INSERT INTO bd_camps(campid,orgname,bbname,phone,email,doc,place,caddress)
			 values(:campid, :orgname, :bbname, :phone, :email, :doc, :place, :caddress)");
			 $insert->bindParam (':campid',$campid);
			 $insert->bindParam (':orgname',$orgname);
			 $insert->bindParam (':bbname',$bbname);
			 $insert->bindParam (':phone',$phone);
			 $insert->bindParam (':email',$email);
			 $insert->bindParam (':doc',$doc);
			 $insert->bindParam (':place',$place);
			 $insert->bindParam (':caddress',$caddress);
			 $check=$insert->execute();
			 if($check)
			 {
			   echo '<script language="javascript">swal("Thank You for Organising Camp..!!", "we will support you on our behalf..!!", "success");</script>';
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
<hr>


<section>
  <br>
<h3 align="center">BLOOD DONOR CAMPS</h3>
  <br>



    <?php
    include("config.php");
	$selectdata = "SELECT orgname,bbname,phone,email,doc,place,caddress FROM bd_camps";
	$query = mysqli_query($con,$selectdata);
	while($row = mysqli_fetch_array($query))
    {
	?>
	<div class="camps">
    <ul>
      <br>
      <li><b>Organised By:</b>&nbsp
	  <?php echo $row['orgname']?>
	  </li>
      <br>
      <li><b>Blood Bank:</b>&nbsp
	  <?php echo $row['bbname']?>
	  </li>
      <br>
      <li><b>Phone Number:</b>&nbsp
	   <?php echo $row['phone']?>
	  </li>
      <br>
      <li><b>Email Id:</b>&nbsp
	  <?php echo $row['email']?>
	  </li>
	  <br>
      <li><b>Scheduled Date(yyyy/mm/dd):</b>&nbsp
	  <?php echo $row['doc']?>
	  </li>
      <br>
      <li><b>Place:</b>&nbsp
	  <?php echo $row['place']?>
	  </li>
      <br>
      <li><b>Camp Address/Location:</b>&nbsp
	  <?php echo $row['caddress']?>
	  </li>
  </div>
	<?php
	}
	?>
<br>
</section>


</article>
<footer>
  <p>Copyright (c) 2018 Copyright Holder All Rights Reserved.</p>
</footer>
</body>
</html>
