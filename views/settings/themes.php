<form method="post" action="">

	<?php foreach($themes as $theme) { 
		?>
				<div>
                	<h3><?php echo $theme['name']; ?></h3>
                    <p>
                    	<img src="<?php echo $theme['path'].'/screen.png' ?>" width="200" alt="<?php echo $theme['path'].'/screen.png' ?>" />
                    </p>
                    <input type="radio" name="theme" value="<?php echo $theme['name']  ?>" <?php echo $theme['name'] == $activeTheme ? 'checked="checked"' : ''; ?> />
                </div>	
    <?php } ?>
<input type="submit" name="sub" value="Update Theme"/>
</form>