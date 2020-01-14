<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/homecss.css">
  <link rel="stylesheet" href="css/contactcss.css">
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
  <div class="coform">
            <form action="#" method="post">
            <br><br>
            <fieldset>
            <legend><h3>GET IN TOUCH</h3></legend>
            <br>
            <label>Name</label><br>
            <input type="text" name="uname" placeholder="Enter Your Name" required />
            <br><br>
            <label>Phone Number</label><br>
            <input type="phone" name="pnum" placeholder="Enter your Phone Number" required />
            <br><br>
            <label>Email Id</label><br>
            <input type="email" name="mail" placeholder="Enter your Mail Id" />
            <br><br>
            <label>Message</label><br>
            <input type="text" name="cmsg" placeholder="Enter your message" required />
            <br><br>
            <input type="submit" name="csend" value="SEND"/>
            <br>
          </fieldset>
          </form>
		  	<?php
			try {
            $con = new PDO ("mysql:host=localhost;dbname=blood_donor",'root','mysql');
			if(isset($_POST['csend']))
			{
			$contactid=rand(1111,9999);
			$name=$_POST['uname'];	
			$phone=$_POST['pnum'];
			$email=$_POST['mail'];
			$message=$_POST['cmsg'];
			$insert = $con->prepare("INSERT INTO c_inbox(contactid,name,phone,email,message)
			 values(:contactid, :name, :phone, :email, :message)");
			 $insert->bindParam (':contactid',$contactid);
			 $insert->bindParam (':name',$name);
			 $insert->bindParam (':phone',$phone);
			 $insert->bindParam (':email',$email);
			 $insert->bindParam (':message',$message);
			 $check=$insert->execute();
			 if($check)
			 {
			   echo '<script language="javascript">swal("Thank You for Contacting Life Saver..!!", "Our Team will Contact you soon ..!!", "success");</script>';
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
