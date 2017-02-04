<form method="post" action="" id="categoryForm">
ID:<input type="hidden" name="id" size="20" style="height:25px;" value=" <?php echo isset($categories['Cid']) ? $categories['Cid'] :'' ;?>" />
<br />
<br> 
Name: <input type="text" id="name" name="name" size="20" style="height:25px;" value="<?php echo isset($categories['Cname']) ? $categories['Cname']: '';?>" />
<br />
<br>
Discription:<input type="text" id="description" name="description" style="height:25px;" value="<?php echo isset($categaries['Cdiscription']) ?$categaries['Cdiscription']:'';?>"/>
<br />
<br>
<input type="submit" name="sub" value="UPDATE" style="height:25px; width:60px"/>
</table>
</form>
<script>
$(function(){
	$("#categoryForm").validate({
			rules: {
				name: "required",
				description: {
					required: true,
					minlength: 2
				}
			},
			messages: {
				firstname: "Please enter category name",
				username: {
					required: "Please enter a short description",
					minlength: "Your description must consist of at least 2 characters"
				},
			},
			submitHandler: function() {
				$("#categoryForm").submit();//alert("submitted!");
			}
		});
});
</script>