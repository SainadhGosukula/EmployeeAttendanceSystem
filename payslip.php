<?php
session_start();
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      
      * {
          box-sizing: border-box;
        }
        
        body {
          background-color: #f1f1f1;
           font-family: Raleway;
           margin: 100px auto;
           font-family: Raleway;
           padding: 10px;
           width: 70%;
           min-width: 300px;

        }
        a:link, a:visited {
            background-color:#0B5345;
            color: white;
            padding: 15px 25px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
          }
          
          a:hover, a:active {
            background-color:black;
          }
        
        #regForm1 {
          background-color: #ffffff;
          margin: 100px auto;
          font-family: Raleway;
          padding: 40px;
          width: 50%;
          min-width: 300px;
          opacity: 0.8;
        }
        
        h1 {
          text-align: center;  
        }
       
        input,select{
          padding:3px;
          width: 30%;
          font-size: 17px;
          font-family: Raleway;
          border: 1px solid #aaaaaa;
        }
        input[type=submit]{
            background-color:#212F3C;
            border: none;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
        }
        button {
          background-color: #4CAF50;
          color: #ffffff;
          border: none;
          padding: 10px 20px;
          font-size: 17px;
          font-family: Raleway;
          cursor: pointer;
        }
        
        button:hover {
          opacity: 0.8;
        }
        /* The container */
.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 18px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 20px;
  width: 20px;
  background-color: black;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.container .checkmark:after {
 	top: 9px;
	left: 9px;
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: black;
}
      
    </style>	
		<title>EAS</title>
</head>
   <body>
   <a href="ecreate.php">BACK TO HOME</a>
    <section id= #regForm1>
    
<?php
include "datacon.php";
$x=$_SESSION['emaillg'];

$sql="SELECT * FROM empdetails where email='$x'";
$result=mysqli_query($conn,$sql);

?>
<h1>EMPLOYEE PAYSLIP</h1>
<form method ="post">
    Employee:
    <select name="guy">
<?php
foreach($result as $row){
?>
<option value="<?php echo $row['empemail'];?>"><?php echo $row['empemail'];?></option><br>
<?php
}
?>
</select>
<br><br>
From date:
<input type="text" name="fromdate" placeholder="yyyy-mm-dd">
To date:
<input type="text" name="todate" placeholder="yyyy-mm-dd">
<input type="submit"  name="sub3" value="GENERATE">
</form>
<?php
if(isset($_POST['sub3'])){
    $empemail=$_POST['guy'];
    $fromdate=$_POST['fromdate'];
    $todate=$_POST['todate'];
    $email=$_SESSION['emaillg'];
    echo"<br><h3>Employee UserName: $empemail";
    echo"<br>From: $fromdate To: $todate</h3>";
    //SELECT * FROM Orders WHERE OrderDate BETWEEN #01/07/1996# AND #31/07/1996#;
    //SELECT * FROM `attendance` WHERE date BETWEEN '2019-10-31' AND '2019-11-06'
    $sq1="SELECT * FROM attendance WHERE empemail='$empemail' AND status='P' AND(date BETWEEN '$fromdate' AND '$todate')";
    $s2=mysqli_query($conn,$sq1);
        echo "<table border='1'>
        <tr>
        <th>S.No</th>
        <th>Employer Email</th>
        <th>Employee Email</th>
        <th>Date</th>
        <th>Status</th>
        <th>Remarks</th>
        </tr>";
       $i=1;
        while($row = mysqli_fetch_array($s2))
        {
            echo "<tr>";
            echo "<td>".$i++."</td>";
            echo "<td>".$row['eemail']."</td>";
            echo "<td>".$row['empemail']."</td>";
            echo "<td>".$row['date']."</td>";
            echo "<td>".$row['status']."</td>";
            echo "<td>".$row['remarks']."</td>";
            echo "</tr>";
        }
        echo "</table>";
        $per_day_salary="SELECT per_day_salary,empname from empdetails where empemail='$empemail'";
        $s3=mysqli_query($conn,$per_day_salary);
        while($row=mysqli_fetch_assoc($s3)){
          $results_of_per_day_salary=$row["per_day_salary"];
          $name_employee=$row["empname"];
        }
        $grand=$results_of_per_day_salary * ($i-1);
        echo "<br><h2>TOTAL SALARY OF $name_employee is Rupees $grand</h2>";
    }

?>

</section>
<button onclick="myFunction()">Print</button>

<script>
function myFunction() {
  window.print();
}
</script>
</body>
</html>













