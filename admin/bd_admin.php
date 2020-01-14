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
  <script src="../js/sweetalert.min.js" ></script>
  <link rel="stylesheet" href="../css/admin_style.css">
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
      <legend><h3>Emergency Requests</h3></legend>
      <form action="bd_admin.php" method="post">
      <input type="submit" name="show_erq" value="SHOW ALL REQUESTS"/>
      </form>
      <br><br>
      <form action="" method="post">
      <label>Enter Emergency Request ID: </label>
      <input type="text" name="reqid" placeholder="Enter Request Id" required />
      <input type="submit" name="del_req" value="DELETE REQUEST"/>
      </form>
    </fieldset>
  </table>
  <br>
  <hr>
  <br>
  <p align="center">Your Data Will Be Displayed Below</p>
  <br>
<?php  
if(isset($_POST['show_erq']))
{
$selectdata = "SELECT *FROM emg_req";
$query=mysqli_query($con,$selectdata);
if($query){
?>
<table border="1" cellpadding="3">
<tr>
<th>SL.NO</th>
<th>REQUEST ID</th>
<th>PATIENT NAME</th>
<th>BLOOD GROUP</th>
<th>PHONE</th>
<th>DATE OF BIRTH</th>
<th>LOCATION</th>
<th>HOSPITAL NAME</th>
<th>OPERATION</th>
</tr>
<?php	
while($row=mysqli_fetch_array($query))
{
echo "<tr>";
echo "<td>".$row['id']."</td>";
echo "<td>".$row['request_id']."</td>";
echo "<td>".$row['pname']."</td>";
echo "<td>".$row['bgroup']."</td>";
echo "<td>".$row['phone']."</td>";
echo "<td>".$row['dor']."</td>";
echo "<td>".$row['location']."</td>";
echo "<td>".$row['hname']."</td>";
echo "<td><input type='submit' value='SEND SMS' name='send_all'/></td>";
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
if(isset($_POST['del_req']))
{
$request_id=$_POST['reqid'];
$deldata = "DELETE FROM emg_req WHERE request_id='$request_id'";
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
