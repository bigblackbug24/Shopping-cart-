<form method="post" action="" enctype="multipart/form-data">
<table>
	<?php foreach($configs as $config) { ?>
	<tr>
    	<td><?php echo $config['description']; ?></td>
        <td><?php if($config['field'] != 'logo') {  ?>
        		<input type="text" name="<?php echo $config['field'] ?>" id="<?php echo $config['field'] ?>" value="<?php echo $config['value']; ?>" <?php echo $config['field'] =='theme' ? 'readonly="readonly"' : ''; ?> />
                <?php } else {
					?>
                    <input type="file" name="file" id="file" />
                    <?php
				}?></td>
        <td><?php echo $config['field'] == 'logo' ? '<img src="'.$config['value'].'" width="50" />': '';?></td>
    </tr>
    <?php } ?>
</table>
<input type="submit" name="sub" value="Update" style="height:25px; width:60px;"/>
</form>