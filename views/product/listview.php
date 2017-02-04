
<div id="table">
<table width="100%" height="" border="1">
<tr>
<th > id </th>
 <th > name </th> 
 <th > Price </th>
 <th>image</th>
 <th> qty </th> 
 <th> size </th>
 <th>Action / <a href="<?php echo SITE_URL.'product/addproduct'; ?>">add</a></th></tr>
<?php
foreach($products as $index=>$row){
	?>
    	<tr>

        	<td><?php echo $row['Pid'] ?></td>
            <td><?php echo $row['Pname'] ?></td>
            <td><?php echo $row['Pprice'] ?> </td>
            <td><?php echo $row['Pimage'] ?></td>
            <td><?php echo $row['Pqty'] ?></td>
            <td><?php echo $row['Psize'] ?></td>
 <td><a href="<?php echo SITE_URL.'product/updateproduct/'.$row['Pid']; ?>"> edit </a> / <a href="<?php echo SITE_URL.'product/deletproduct/'.$row['Pid']; ?>"> delete </a></td>
        </tr>
    <?php
}
?>
<tr><td colspan="7" align="center"><?php echo $pagination ?></td></tr>

</table>
</div>