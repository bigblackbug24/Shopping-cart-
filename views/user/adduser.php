<form method="post" action="">
<table>
<tr><td>
First Name :</td>
<td><input type="text" name="Fname" required pattern="[a-zA-Z]{3,}[a-zA-Z\s]*$" placeholder="Enter first name" size="30">
</td></tr>
<tr>
<td>
Last Name :</td>
<td><input type="text" name="Lname" required pattern="[a-zA-Z]{3,}[a-zA-Z\s]*$" placeholder="Enter last name" size="30">
</td></tr>
<tr><td>
Email :</td>
<td> 
<input type="email" name="email"  required placeholder="enter your email" size="30">
</td></tr>
<tr><td>
Password :</td>
<td>
<input type="password" name="password"  requirded placeholder="enter password" size="30">
</td></tr>

</table>
<input type="submit" name="submit" value="Add" style="height:40px; width:40px; alignment-adjust:central;">

</form>
</body>