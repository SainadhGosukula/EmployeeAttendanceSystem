<?php
session_start();
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <title>EAS</title>
        <style>
            input {
          padding: 0px;
          width: 100%;
          font-size: 17px;
          font-family: Raleway;
          border: 1px solid #aaaaaa;
        }
            </style>
</head>
<body>

<?php

include 'datacon.php';


if(isset($_POST['empsubmit']))
{     $eemail=$_POST['eemail'];
     $email=$_SESSION['emaillg'];
    $ename=$_POST['ename'];
  
    $eephone=$_POST['eephone'];
    $date=$_POST['date'];
    $eaddress=$_POST['eaddress'];
    $joindate=$_POST['joindate'];
    $workingdays=$_POST['workingdays'];
    $salary=$_POST['salary'];
$r6="INSERT INTO empdetails VALUES('$joindate','$eemail','$email','$ename','$eephone','$date','$eaddress','$workingdays','$salary')";
    mysqli_query($conn,$r6);
    
if (mysqli_query($conn, $r6)) {
    echo "New record created successfully";
} 

    
}
if(isset($_POST['detailssubmit']))
{
    $efname=$_POST['efname'];
    $elname=$_POST['elname'];
    $email=$_POST['email'];
    $ephone=$_POST['ephone'];
    $cname=$_POST['cname'];
    $cemail=$_POST['cemail'];
    $cyear=$_POST['cyear'];
    $caddress=$_POST['caddress'];

    
    $edetails="INSERT INTO details VALUES('$efname','$elname','$email','$ephone','$cname','$cemail','$cyear','$caddress')";
    mysqli_query($conn,$edetails);
}



?>
<html>
<a href="createemp.php">CREATE EMPLOYEES</a>
<a href="attendance.php">PROCEED WITH ATTENDANCE</a>
<a href="payslip.php">PAYSLIP</a>
<?php

if($_SESSION['emaillg'])
 {
    echo '<a href="logout.php">LOGOUT</a>';
}
?>
<br><br>
<?php  
    $y=$_SESSION['emaillg'];
    $q1="SELECT * FROM empdetails where email='$y'";
    $r1=mysqli_query($conn,$q1);
   // $r1=mysqli_query($conn,"SELECT employee name,employee phone,employee email,date,employee address,joindate FROM empdetails;");
    echo "<table border='1'>
<tr>
<th>Name</th>
<th>Phone No.</th>
<th>Email Id</th>
<th>Employer Mail</th>
<th>DOB</th>
<th>Address</th>
<th>Join Date</th>
<th>Per Day Salary</th>
</tr>";

while($row = mysqli_fetch_array($r1))
{
echo "<tr>";
echo "<td>" . $row['empname'] . "</td>";
echo "<td>" . $row['empphone'] . "</td>";
echo "<td>" . $row['empemail'] . "</td>";
echo "<td>" . $row['email']."</td>";
echo "<td>" . $row['date'] . "</td>";
echo "<td>" . $row['empaddress'] . "</td>";
echo "<td>" . $row['joindate'] . "</td>";
echo "<td>" . $row['per_day_salary'] . "</td>";
print "<form action = 'edit.php' method='post'>";
print "<td><input type='submit' value='edit'></td>";
print "</form>";
echo "</tr>";
}
echo "</table>";
?>
</body>
</html>