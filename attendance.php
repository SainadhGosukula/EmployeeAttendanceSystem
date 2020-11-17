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
date_default_timezone_set('Asia/Kolkata');
include "datacon.php";
$x=$_SESSION['emaillg'];
$sql="SELECT * FROM empdetails where email='$x'";
$result=mysqli_query($conn,$sql);

?>
<h1>EMPLOYEE ATTENDANCE</h1>
<form method ="post">
    <select name="guy">
<?php
foreach($result as $row){
?>
<option value="<?php echo $row['empemail'];?>"><?php echo $row['empemail'];?></option><br>
<?php
}
?>
</select>
<input type="text" name="date" value="<?php echo date('Y-m-d');?>"><br>
<label class="container">PRESENT
  <input type="radio" checked="checked" name="status" value="P">
  <span class="checkmark"></span>
</label>
<label class="container">ABSENT
  <input type="radio" name="status" value="A">
  <span class="checkmark"></span>
</label>
<input type="txt" name="remarks" placeholder="ADD REMARKS IF ANY"><br>
<input type="submit"  name="sub" value="ENTER">
</form>
<?php
if(isset($_POST['sub'])){
    $empemail=$_POST['guy'];
    $date=$_POST['date'];
    $status=$_POST['status'];
    $remarks=$_POST['remarks'];
    $email=$_SESSION['emaillg'];
    $sql1="INSERT INTO attendance VALUES(' ','$empemail','$email','$date','$status','$remarks')";
                       
      if (mysqli_query($conn, $sql1)) {
        echo "New record created successfully";
    } else {
                            echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
          }
 //   echo "ENTER SUCCESSFULLY";
        }


    if(isset($_POST['sub']))
    {
        $search1=$_POST['guy'];
        $sq1="SELECT * FROM attendance WHERE empemail='$search1'";
        $s2=mysqli_query($conn,$sq1);
        echo "<table border='1'>
        <tr>
        
        <th>Employee Email</th>
        <th>Date</th>
        <th>Status</th>
        <th>Remarks</th>
        <th>Employer email</th>
        </tr>";
       
        while($row = mysqli_fetch_array($s2))
        {
            echo "<tr>";
          
            echo "<td>".$row['empemail']."</td>";
            echo "<td>".$row['date']."</td>";
            echo "<td>".$row['status']."</td>";
            echo "<td>".$row['remarks']."</td>";
            echo "<td>".$row['eemail']."</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
?>
</section>
</body>
</html>













