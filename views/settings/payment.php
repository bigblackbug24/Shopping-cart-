<table>
	<tr>
    	<th>ID</th>
        <th>Name</th>
        <th>Active</th>
        <th>Action</th>
    </tr>
	<?php foreach($gateways as $gateway) { ?>
	<tr>
    	<td><?php echo $gateway['gateway_id']; ?></td>
        <td><?php echo $gateway['method_name']?></td>
        <td><?php echo $gateway['is_active'] == 1 ?'Yes' : 'No'; ?></td>
        <td><a href="<?php echo SITE_URL.'settings/edit_gateway/'.$gateway['gateway_id'] ?>">Edit Method</a>
        	<?php if($gateway['gateway_id'] != 1){ ?>
            <a href="<?php echo SITE_URL.'settings/delete_gateway/'.$gateway['gateway_id'] ?>">Delete Method</a>
			<?php } ?>
        </td>
    </tr>
    <?php } ?>
</table>
