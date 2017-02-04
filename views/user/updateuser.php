
<form method="post" action="">
ID: <input type="hidden"  name="id" value="<?php echo isset($Myuser['User_id']) ? $Myuser['User_id'] : ''; ?> ">
<br>
<br>
First Name :<input type="text" name="Fname" placeholder="Enter first name"required pattern="[a-zA-Z]{3,}[a-zA-Z\s]*$" size="30" value="<?php echo isset($Myuser['Fname']) ? $Myuser['Fname'] : 
''; ?> ">
<br>
<br>
Last Name :<input type="text" name="Lname"  placeholder="Enter last name" size="30"required pattern="[a-zA-Z]{3,}[a-zA-Z\s]*$" value="<?php echo isset($Myuser['Lname']) ? $Myuser['Lname'] :
 ''; ?> ">
<br>
<br>
Email : <input type="email" name="email" required placeholder="Enter email" size="30" value="<?php echo isset($Myuser['Email']) ? $Myuser['Email'] : ''; ?> ">
<br>
<br>
Password :<input type="password" name="password" required placeholder="enter password" size="30" value="<?php echo isset($Myuser['pasword']) ? 
$Myuser['password'] : ''; ?> ">
<br>
<br>
<input type="submit" name="submit" value="update">
</form>
</body>