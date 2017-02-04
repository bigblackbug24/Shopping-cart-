<table border="1">
<tr>
<td> Pid </td>
<td> Name </td>
<td> Price </td>
<td> Color </td>
<td> Quantity </td>
<td> Action </td>
</tr>
<?php 
foreach($aPRODUCT as $index=>$row)
{
	?>
    <tr>
	<td> <?php echo $row['Pid'];?> </td>

<td> <?php echo $row['Pname'];?> </td>
<td> <?php echo $row['Pprice'];?> </td>
<td> <?php echo $row['Pcolor'];?> </td>
<td> <?php echo $row['Pqty'];?> </td>
<td><a href="<?php echo SITE_URL.'product/addproduct'; ?>"> Add/</a><a href="<?php echo SITE_URL.'product/deletproduct/'.$row['Pid']; ?>"> Delete</a></td>
    
    </tr>
    
    <?php
}
    ?>
	</table>
   