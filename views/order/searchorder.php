<table border="1">
<tr>
<th> order ID </th>
<th> order date </th>
<th> order amount </th>
<th> Transaction_Id </th> 
<th> Detail </th>
</tr>
</div>     <!-- end tr -->
<?php 
foreach($Corder as $index=>$row)
{
	?>
	<tr>

        	<td><?php echo $row['order_id']; ?></td>
            <td><?php echo $row['order_date']; ?></td>
            <td><?php echo $row['order_amount']; ?> </td>
            <td> <?php echo $row['transactionId'];?> </td>
            <td> <a href="<?php echo SITE_URL.'order/orderview/'.$row['order_id'];?>">view</a></td>
            </tr>
            
            <?php
			 }
			?>
<tr><td colspan="5" align="center"><?php echo $pagination ?></td></tr>
</table>
