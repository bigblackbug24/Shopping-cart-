
              <div id="table" >
  <table>
  <tr>
  
  <th> product_id</th>
  <th> order_date</th>
  <th> product_name</th>
  <th> product_qty</th>
  <th> product_price</th>
  <th> Total</th>
   
 </tr> 


            <?php 

foreach($array as $index=>$row)
{
?>
<tr>
<td> <?php echo $row['Pid'];?></td>
<td> <?php echo $row['order_date'];?></td>

<td> <?php echo $row['Pname'];?></td>
<td> <?php echo $row['Pqty'];?></td>
<td> <?php echo $row['Pprice'];?></td>
<td> <?php echo $row['Pprice'] * $row['Pqty'];?></td>

</tr>
<?php
}
?>
</table>
</div>