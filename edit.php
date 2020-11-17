<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title>EAS</title>
</head>
<body>
<a href="ecreate.php">BACK TO HOME</a>
<?php
    include 'datacon.php';
    print " <h2>EDIT EMPLOYEE</h2>
        <form action='edit.php' method='post'>
        
        <input type='email' name='emailsearch' placeholder='enter employee email id' required>
        <input type='submit' name='search'>
        </form>";
      
        
    if(isset($_POST['search']))
    {
        $es=$_POST['emailsearch'];
        $r1="SELECT * FROM empdetails WHERE empemail = '$es'";
        $r2=mysqli_query($conn,$r1);
        if(mysqli_num_rows($r2)==1)
        {
            echo $es;
            print "<form action ='edit.php'>";
           print "<input type='submit' name='update' value='update'>";
           print "<input type='submit' name='delete' value='delete'>"; 
           print "</form>";
        }

    }
if(isset($_GET['delete']))
{
    print "<form action='edit.php'>
            Confirm Ones:<br>
            <input type='email' name='demail' placeholder='employee email id' required>
            <input type='submit' name='demp' value='Delete Submit'>
            </form>
            ";
}
if(isset($_GET['demp']))
{
    $demail=$_GET['demail'];
   // DELETE FROM table_name WHERE some_column = some_value
   $d1="DELETE FROM empdetails WHERE empemail='$demail'";
   mysqli_query($conn,$d1);
   echo "DELETED SUCCESSFULLY";
}

if(isset($_GET['update']))
{
 
         
    print"
                                                       
                <form action='edit.php'>
                <h3> ENTER UPDATE ALL FIELDS</h3>
                    <b>ENTER EMPLOYEE EMAIL ID for Confirmation:</b></br>
                    <p><input placeholder='eamil id'  name='empemail' required></p>
                    <p><input placeholder='Name...'  name='ename' required></p>
                    
                    <p><input placeholder='Phone...' name='eephone' required></p>
                
                    Date Of Birth :
                    <p><input placeholder='DD/MM/YYYY'  type='date' name='date' required></p>
                    
                    Address :
                    <p><input placeholder='1-2-3/A2,abc,xyz.' name='eaddress' required></p>
                
                    Joined Date :
                    <p><input placeholder='DD/MM/YYYY'  type='date' name='joindate' required></p>
                
                    <p><input placeholder='Working Days'  type='number' name='workingdays' required></p>
                
                    <input type='submit' value='UPDATE SUBMIT' name='empsubmit'>
                </form>";
               
}
if(isset($_GET['empsubmit'])){
    $empemail=$_GET['empemail'];
    $ename=$_GET['ename'];
    $eephone=$_GET['eephone'];
    $date=$_GET['date'];
    $eaddress=$_GET['eaddress'];
    $joindate=$_GET['joindate'];
    $workingdays=$_GET['workingdays'];
/*UPDATE table_name SET column1=value, column2=value2,...WHERE some_column=some_value */
    $u1="UPDATE empdetails SET empname='$ename',empphone='$eephone',date='$date',empaddress='$eaddress',
        joindate='$joindate',workingdays='$workingdays' WHERE empemail='$empemail'";
mysqli_query($conn,$u1);

    echo "Update Successfully";
}
?>
</body>
</html>