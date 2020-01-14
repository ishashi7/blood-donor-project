<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/homecss.css">
  <link rel="stylesheet" href="css/searchcss.css">
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
  <div class="dsform">
            <form action="search.php" method="post">
              <br><br>
              <fieldset>
                <legend><h3>SEARCH FOR DONOR</h3></legend>
                <br>
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
            <label>Status</label>
            <select name="status">
              <option>--select--</option>
              <option value="Availabe">Availabe</option>
              <option value="Un Availabe">Un Availabe</option>
            </select>
              <br><br>
            <input type="submit" name="search_donor" value="SEARCH"/>
            <br>
          </fieldset>
          </form>
  </div>
  <hr>
<br>
<h3 align="center">Your Search Results Will Be Displayed Here..</h3>
<br>
<?php
include("config.php");
if(isset($_POST['search_donor']))
{
$bgroup=$_POST['bgrp'];
$place=$_POST['place'];
$status=$_POST['status'];
$selectdata = "SELECT name,bgroup,phone,email,gender,dob,status,place,address FROM reg_don WHERE bgroup='$bgroup'AND place='$place'AND status='$status'";
$query=mysqli_query($con,$selectdata);
if($query){
?>
<table border="1" cellpadding="5">
<tr>
<th>NAME</th>
<th>BLOOD GROUP</th>
<th>PHONE</th>
<th>EMAIL</th>
<th>GENDER</th>
<th>DATE OF BIRTH</th>
<th>STATUS</th>
<th>PLACE</th>
<th>ADDRESS</th>
</tr>
<?php	
while($row=mysqli_fetch_array($query))
{
echo "<tr>";
echo "<td>".$row['name']."</td>";
echo "<td>".$row['bgroup']."</td>";
echo "<td>".$row['phone']."</td>";
echo "<td>".$row['email']."</td>";
echo "<td>".$row['gender']."</td>";
echo "<td>".$row['dob']."</td>";
echo "<td>".$row['status']."</td>";
echo "<td>".$row['place']."</td>";
echo "<td>".$row['address']."</td>";
echo "</tr>";
}
}
else
{
	echo '<script language="javascript">swal("Sorry Unable to process Try again later..!!", "No Data Matched for your Search Request", "error");</script>';
}
}
?>
</table>
<br><br>
</article>
<footer>
  <p>Copyright (c) 2018 Copyright Holder All Rights Reserved.</p>
</footer>
</body>
</html>
