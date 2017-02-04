<table>
	<tr>
    	<td>ID</td>
        <td>Page Name</td>
        <td>Page Title</td>
        <td>Page Url</td>
        <td>Action</td>
    </tr>
    <?php
	if($pages){
		foreach($pages as $page){
			?>
			<tr>
			<td><?php echo $page['page_id']; ?></td>
			<td><?php echo $page['page_name']; ?></td>
			<td><?php echo $page['page_title']; ?></td>
			<td><?php echo $page['page_url']; ?></td>
			<td>
				<a href="<?php echo SITE_URL.'settings/edit_page/'.$page['page_id']; ?>">Edit</a>
				<a href="<?php echo SITE_URL.'settings/delete_page/'.$page['page_id']; ?>">Delete</a>
			</td>
		</tr>
		<?php
		}
		?>
		<tr><td colspan="5" align="center"><?php echo $pagination ?></td></tr>
        <?php
	} else {
		?>
        <tr><td colspan="5"> No Record Found</td></tr>
        <?php
	}
    ?>
</table>
