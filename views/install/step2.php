<form action="" method="post" id="step2Form">
	<table>
    	<tr>
        	<td>Site Title</td>
            <td><input type="text" name="site_title" id="site_title" /></td>
        </tr>
        <tr>
        	<td>Site Owner</td>
            <td><input type="text" name="store_owner" id="store_owner" /></td>
        </tr>
        <tr>
        	<td>Phone Number</td>
            <td><input type="text" name="phone_number" id="phone_number" /></td>
        </tr>
        <tr>
        	<td>Address</td>
            <td><input type="text" name="address" id="address" /></td>
        </tr>
        <tr>
        	<td>Email</td>
            <td><input type="text" name="email" id="email" /></td>
        </tr>
        <tr>
        	<td>Password</td>
            <td><input type="text" name="password" id="password" /></td>
        </tr>
        <tr>
        	<td colspan="2" align="center"><input type="submit" name="submit" value="Submit" /></td>
        </tr>
    </table>
</form>

<script>
$(function(){
	$("#step2Form").validate({
			rules: {
				site_title: {
					required: true,
					minlength: 5
				},
				store_owner:{
					required:true,
				},
				phone_number: {
					required:true,
					digits:true
				},
				address:{
					required:true
				},
				email:{
					required:true,
					email: true
				},
				password:{
					required:true
				}
			},
			
			messages: {
				site_title: {
					required: "Field Is required",
					minlength: "Enter Atleast 5 characters"
				},
				store_owner:{
					required: "Field is required",
				},
				phone_number: {
					required:"Field Is required",
					digits: "Only Numbers are Allowed"
				},
				address:{
					required:"Field Is Required"
				},
				email:{
					required: "Field is required",
					email: "enter Valid email address"
				},
				password:{
					required: "field is required"
				}
			},
			submitHandler: function() {
				$("#step2Form").submit();//alert("submitted!");
			}
		});
});
</script>
