<?php
session_start();
?>
<html>
<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title>EAS</title>
	
</head>

<?php
include 'datacon.php';
if(isset($_POST['submit'])){
      
$emaillg=mysqli_real_escape_string($conn, $_POST['email']);
$passwordlg=mysqli_real_escape_string($conn,$_POST['passwordlg']);

$select="SELECT * FROM registration WHERE email='$emaillg' AND password1='$passwordlg'";
$result=mysqli_query($conn,$select);
$_SESSION['result']=$result;
$_SESSION['emaillg']=$emaillg;


if (mysqli_num_rows($result)==1)
 {
       
      print 'sucess';
      echo '
      <!DOCTYPE html> 
      <html> 
      <style>
      body{
            background-image:url("wall/img1.jpg");
      }
      </style>
            <head> 
                  <title>Javascript open link without click</title> 
                  <style> 
                        .gfg { 
                              text-align:center; 
                              font-size:40px; 
                              font-weight:bold; 
                              color:white; 
                        } 
                  </style> 
                  <script> 
                        function myFunction() { 
                              window.open("ecreate.php", "_top"); 
                        } 
                  </script> 
            </head> 
            <body> 
                  <div class = "gfg" onmouseover = "myFunction()"> 
                              EMPLOYEE ATTENDANCE SYSTEM
                  </div> 
            </body> 
      </html> 
      ';
      }
else {
      print 'Invalid Password or Username';
      
  	}
}     
if(isset($_POST['submit2']))
      {
    //  $usernamerg=$_POST['usernamerg'];
      $password1=$_POST['password1'];
      $password2=$_POST['password2'];
      $email=$_POST['email'];
      $_SESSION['emaillg']=$email;
            if(strcmp($password1,$password2)==0)
            {
            $select1="SELECT * FROM registration WHERE email='$email'";
            $result1=mysqli_query($conn,$select1);
                  if (mysqli_num_rows($result1) == 1)
                   {
                  print 'Already Exists';
                
                        }
                   else {

                              print 'Sucessfully created ';
                              echo '
                              <!DOCTYPE html> 
                              <html> 
                              <head> 
                                    <title>Javascript open link without click</title> 
                                    <style> 
                                          .gfg { 
                                          text-align:center; 
                                          font-size:40px; 
                                          font-weight:bold; 
                                          color:green; 
                                    } 
                              </style> 
                              <script> 
                              function myFunction() { 
                                    window.open("details.html", "_top"); 
                              } 
                              </script> 
                              </head> 
                              <body> 
                                    <div class = "gfg" onmouseover = "myFunction()"> 
                                    EMPLOYEE ATTENDANCE SYSTEM
                              </div> 
                                    </body> 
                                    </html> 
                                    ';
                                    $entry="INSERT INTO registration VALUES('$password1','$password2','$email')";
                                      mysqli_query($conn,$entry);
                    }

             }
      

      }


?>
</html>
