<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="styles.css">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
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

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
</style>
<body>
<a href="ecreate.php">BACK TO HOME</a>
<form id="regForm" action="ecreate.php" method="POST">
    <h1>Employee Details:</h1>
    <p><input placeholder="E-mail..." name="eemail" required></p>
    <p><input placeholder="Name..."  name="ename" required></p>
    
    <p><input placeholder="Phone..."name="eephone" required></p>

    Date Of Birth :
    <p><input placeholder="DD/MM/YYYY"  type="date" name="date" required></p>
    
    Address :
    <p><input placeholder="1-2-3/A2,abc,xyz." name="eaddress"required></p>

    Joined Date :
    <p><input placeholder="DD/MM/YYYY"  type="date" name="joindate" required></p>

    <p><input placeholder="Working Days"  type="number" name="workingdays" required></p>

    <p><input placeholder="Per Day Salary"  type="number" name="salary" required></p>
 
  <input type="submit" value="CREATE" name="empsubmit">
</form>



</body>
</html>


