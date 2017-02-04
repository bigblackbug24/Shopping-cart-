<table>
	<tr>
    	<td>ID</td>
    	<td>Menu name</td>
        <td>Menu Slug</td>
        <td>Action</td>
    </tr>
    <?php
	if($menus){
		foreach($menus as $menu){
		?>
			<tr>
            	<td><?php echo $menu['menu_id']; ?></td>
                <td><?php echo $menu['menu_name']; ?></td>
                <td><?php echo $menu['menu_slug']; ?></td>
                <td>
                	<!--<a href="<?php //echo SITE_URL.'settings/edit_menu/'.$menu['menu_id']; ?>">Edit</a>-->
                    <a href="<?php echo SITE_URL.'settings/delete_menu/'.$menu['menu_id']; ?>">Delete</a>
                </td>
            </tr>
		<?php
        }
	}
    ?>
</table>