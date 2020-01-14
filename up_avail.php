<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/homecss.css">
  <link rel="stylesheet" href="css/up_availcss.css">
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
  <div class="uaform">
            <form action="up_avail.php" method="post">
              <br><br>
              <fieldset>
                <legend><h3>Update Your Availability Status</h3></legend>
                <br>
                <p>Enter Phone Number Mentioned in Donor Registration<//p>
                <br><br>
            <label>Your Phone Number</label><br>
            <input type="phone" name="ypnum" placeholder="Enter Contact Number" required />
            <br><br>
            <label>Status</label>
            <select name="status">
              <option>--select--</option>
              <option value="Availabe">Availabe</option>
              <option value="Un Availabe">Un Availabe</option>
            </select>
              <br><br>
            <input type="submit" name="yavail" value="UPDATE"/>
            <br>
          </fieldset>
          </form>
		  <?php
	      include("config.php");
		  if(isset($_POST['yavail'])){
			  $phone=$_POST['ypnum'];
			  $status=$_POST['status'];
			  $updatedata="UPDATE reg_don SET status='$status' WHERE phone='$phone'";
			  $query = mysqli_query($con,$updatedata);
			  if($query)
			  {
				  echo '<script language="javascript">swal("Your Status has been updated Successfully..!!", "you can change your status any time..!!", "success");</script>';
			  }
			  else
			  {
				  echo '<script language="javascript">swal("Sorry!", "Unable to process Try again later..!!", "error");</script>';
			  }
		  }
	      ?>
  </div>
</article>

<footer>
  <p>Copyright (c) 2018 Copyright Holder All Rights Reserved.</p>
</footer>
</body>
</html>
