<form id="categoryForm" method="post" action="">
ID:<input type="hidden" name="id" size="" placeholder="enter category id"  style="height:25px;">
<br>
Name:<input type="text" id="name" name="name" size="20" placeholder="enter category name"  style="height:25px;">
<br>
<br />
Discription:<input type="text" name="description" name="description" size="20" placeholder="enter category discription" style="height:25px;">
<br />
<br />
<input type="submit" name="sub" value="ADD" style="height:25px; width:60px;"/>
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