<table border="1" width="100">
<tr>
<td align="center"> Name </td> <td align="center"> email </td> <td align="center"> Phone# </td> <td align="center"> Message </td><td align="center">
Action</td> 
</tr>
<?php 
foreach($LIST as $index=>$row)
{
?>
<tr>
<td> <?php echo $row['name']; ?> </td>
<td> <?php echo $row['email']; ?> </td>
<td> <?php echo $row['phone_no']; ?> </td>
<td> <?php echo $row['message']; ?> </td>
<td> <a href="<?php echo SITE_URL.'pages/detail/'.$row['ID'];?>">view</a></td>
</tr>
<?php
}
?>
<tr><td colspan="5" align="center"><?php echo $pagination ?></td></tr>



</table>