
	<form action="" method="post" id="installForm">
        <table>
        	<tr>
            	<td>Database Host</td>
                <td><input type="text" name="db_host" id="db_host" /></td>
            </tr>
            <tr>
            	<td>Database User</td>
                <td><input type="text" name="db_user" id="db_user" /></td>
            </tr>
            <tr>
            	<td>Database Password</td>
                <td><input type="text" name="db_password" id="db_password" /></td>
            </tr>
            <tr>
            	<td>Database Name</td>
                <td><input type="text" name="db_name" id="db_name" /></td>
            </tr>
            <tr>
            	<td colspan="2"><input type="submit" name="submit" value="Submit" /></td>
            </tr>
        </table>
   </form>

<script>
$(function(){
	$("#installForm").validate({
			rules: {
				db_host: {
					required: true,
				},
				db_user:{
					required:true,
				},
				db_name:{
					required:true
				},
			},
			
			messages: {
				db_host: {
					required: "Field Is required",
				},
				db_user:{
					required:"Field Is required",
				},
				db_name:{
					required:"Field Is required"
				},
			},
			submitHandler: function() {
				$("#installForm").submit();//alert("submitted!");
			}
		});
});
</script>
