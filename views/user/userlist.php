<div id="table">
<table border="1">

<tr>
<th> User_id </th>
<th> First name </th>
<th> Last Name </th>
<th> Email </th>
<th> Action/ <a href="<?php echo SITE_URL.'User/adduser'; ?>"> add</a> </th>
   </tr>
   
<?php
foreach($USER as $index=>$row)
{
	 ?>
     <tr>
     <td> <?php echo $row['User_id'];?> </td>
	 <td> <?php echo $row['Fname']; ?></td>
     <td> <?php echo $row['Lname']; ?></td>
     <td> <?php echo $row['Email']; ?></td>
     <td> <a href="<?php echo SITE_URL.'User/updateuser/'.$row['User_id']; ?>"> update</a> / <a href="<?php echo SITE_URL.'user/deleteuser/'.$row['User_id']; ?>"> Delete</a></td>
	</tr>
     <?php 
}
?>
</table>
</div>