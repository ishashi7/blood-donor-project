<?php
include("../config.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Blood Donor/Admin</title>
  <link rel="stylesheet" href="../css/admin_style.css">
  <script src="../js/sweetalert.min.js" ></script>
</head>
<body>
<header>
  <img src="../img/he.jpg" alt="header image"/>
</header>

<article>
  <br>
  <h3 align="center"><a href="bd_admin.php"><button>HOME</button></a> &nbsp &nbsp Welcome to Blood Donor Admin Panel &nbsp &nbsp <a href="logout.php"><button>LOGOUT</button></a></h3>
  <br>
  <hr>
<div class="nav_pan">

   <a href="bd_admin.php"><div class="pan_1">
     <p>Emergency Requests</p>
   </div></a>

   <a href="admin_dr.php"><div class="pan_2">
     <p>Donor Registrations</p>
   </div></a>

   <a href="admin_pn.php"><div class="pan_3">
     <p>Posts of Need</p>
   </div></a>

   <a href="admin_camps.php"><div class="pan_4">
     <p>Donation Camps</p>
   </div></a>

   <a href="admin_inbox.php"><div class="pan_5">
     <p>Inbox</p>
   </div></a>

</div>


<div class="con_pan">
  <table border="1">
    <fieldset>
      <legend><h3>Inbox/Message Requests</h3></legend>
      <form action="admin_inbox.php" method="post">
      <input type="submit" name="show_inb" value="SHOW ALL MESSAGES"/>
      <br><br>
      </form>
      <form action="admin_inbox.php" method="post">
      <label>Enter Inbox ID: </label>
      <input type="text" name="inbid" placeholder="Enter Inbox Id" required />
      <input type="submit" name="del_inb" value="DELETE MESSAGE"/>
      </form>
    </fieldset>
  </table>
  <br>
  <hr>
  <br>
  <p align="center">Your Data Will Be Displayed Below</p>
  <br>
  <?php  
if(isset($_POST['show_inb']))
{
$selectdata = "SELECT *FROM c_inbox";
$query=mysqli_query($con,$selectdata);
if($query){
?>
<table border="1">
<tr>
<th>SL.NO</th>
<th>CONTACT-ID</th>
<th>NAME</th>
<th>PHONE</th>
<th>EMAIL</th>
<th>MESSAGE</th>
</tr>
<?php	
while($row=mysqli_fetch_array($query))
{
echo "<tr>";
echo "<td>".$row['id']."</td>";
echo "<td>".$row['contactid']."</td>";
echo "<td>".$row['name']."</td>";
echo "<td>".$row['phone']."</td>";
echo "<td>".$row['email']."</td>";
echo "<td>".$row['message']."</td>";
echo "</tr>";
}
}
else
{
echo '<script language="javascript">swal("Sorry Unable to process Try again later..!!", "No Data Matched for your Search Request", "error");</script>';
}
}
?>
<!--Delete Back end-->
<?php  
if(isset($_POST['del_inb']))
{
$contactid=$_POST['inbid'];
$deldata = "DELETE FROM c_inbox WHERE contactid='$contactid'";
$query=mysqli_query($con,$deldata);
if($query)
{
echo '<script language="javascript">swal("Data has Been Deleted..!!", "Data of Given Request Id Removed", "success");</script>';
}
else
{
echo '<script language="javascript">swal("Sorry Unable to process Try again later..!!", "No Data Matched for your Search Request", "error");</script>';
}
}
?>
</table>
<br><br>
</div>

</article>

<footer>
  <p>Copyright (c) 2018 Copyright Holder All Rights Reserved.</p>
</footer>
</body>
</html>
