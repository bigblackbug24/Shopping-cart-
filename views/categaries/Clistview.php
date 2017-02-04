
<table width="100%" height="" border="1">
<tr>
<td align="center"> ID </td> <td align="center"> Name </td> <td align="center"> Description </td> <td align="center"> Action <a href="<?php echo SITE_URL.'categaries/addcategaries/'; ?>">add</a></td>
</tr>
<?php
foreach($categories as $index=>$row){
	?>
    	<tr>

        	<td><?php echo $row['Cid'] ?></td>
            <td><?php echo $row['Cname'] ?></td>
            <td><?php echo $row['Cdiscription'] ?></td>
            <td><a href="<?php echo SITE_URL.'categaries/updatecategaries/'.$row['Cid']; ?>"> edit </a> / <a href="<?php echo SITE_URL.'categaries/deletecategaries/'.$row['Cid']; ?>"> delete </a></td>
        </tr>
    <?php
}
?>
<tr><td colspan="4" align="center"><?php echo $pagination; ?></td></tr>
</table>