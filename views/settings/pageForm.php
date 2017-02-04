<form method="post" action="" id="pageForm">
<table>
	<tr>
    	<td>Page Name</td>
        <td><input type="text" name="page_name" id="page_name" onBlur="generateUrl();" value="<?php echo isset($page['page_name']) ? $page['page_name'] : ''; ?>" /></td>
    </tr>
    <tr>
    	<td>Page Title</td>
        <td><input type="text" name="page_title" id="page_title" value="<?php echo isset($page['page_title']) ? $page['page_title'] : ''; ?>" /></td>
    </tr>
    <tr>
    	<td>Page URL</td>
        <td><input type="text" name="page_url" readonly="readonly" id="page_url" value="<?php echo isset($page['page_url']) ? $page['page_url'] : ''; ?>" /></td>
    </tr>
    <tr>
    	<td>Page Content</td>
        <td><textarea name="page_content" rows="9" cols="40" id="page_content"><?php echo isset($page['page_content']) ? $page['page_content'] : ''; ?></textarea></td>
    </tr>
    <tr>
    
        <td colspan="2">
        	<input type="hidden" name="page_id" id="page_id" value="<?php echo isset($page['page_id']) ?  $page['page_id'] : '';?>" />
        	<input type="submit" name="sub" id="sub" value="Save it!" /></td>
    </tr>
</table>
</form>
<?php
$newUrl = substr(FRONTEND_URL,0,strlen(FRONTEND_URL)-1); 
?>
<script>
	
	function generateUrl(){
		document.getElementById('page_url').value = '<?php echo $newUrl ?>?route='+document.getElementById('page_name').value;
	}
</script>

<script>
$(function(){
	$("#pageForm").validate({
			rules: {
				page_name: {
					required: true,
				},
				page_title:{
					required:true,
				},
				page_url: {
					required:true,
				},
				page_content:{
					required:true
				}
			},
			
			messages: {
				page_name: {
					required: "Field is Required",
				},
				page_title:{
					required:"Field is Required",
				},
				page_url: {
					required:"Field is Required",
				},
				page_content:{
					required:"Field is Required"
				}
			},
			submitHandler: function() {
				$("#pageForm").submit();//alert("submitted!");
			}
		});
});
</script>
