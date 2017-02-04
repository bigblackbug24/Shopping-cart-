<table border="1">
<tr>
<th> Name </th>
<th> Email </th>
<th> message </th>
</tr>
<?php 
foreach($DETAIL as $index=>$row)
{
?>
<tr>
<td> <?php echo $row['name']; ?> </td>
<td> <?php echo $row['email']; ?> </td>
<td> <?php echo $row['message']; ?> </td>
</tr>
<?php
}
?>
</table>
<br />
<br />
<h3>Reply :</h3>          
<textarea rows="6" cols="40" name="reply"  /> </textarea>
<br />
<br />
<input type="submit" name="sub" value="Send" />
