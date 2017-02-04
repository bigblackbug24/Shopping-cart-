<form method="post" action="" id="productForm" enctype="multipart/form-data">
<table>
	<tr>
    	<td><input type = "hidden" name="id" value="" placeholder="product id" size="20"  style="height:25px;">
Name:  </td>
		<td><input type="text" id="name" name="name" placeholder="product name" size="20"  style="height:25px;"></td>
	</tr>
    <tr>	
		<td>Price:</td>
        <td> <input type="text" id="price" name="price" placeholder="Product price" size="20"  style="height:25px;" /></td>
   	</tr>
    <tr>
		<td>Quantity:  </td>
		<td><input type="text" name="qty" id="qty" placeholder="product quantity" size="20"   style="height:25px;"></td>
	</tr>
    <tr>
    	<td>Size:</td>
		<td><input type="text" id="size" name="size" placeholder="product size" size="20"  style="height:25px;"></td>
   	</tr>
    <tr>
        <td>Color:</td>
        <td><input type="text" id="color" name="color" placeholder="product color" size="20"  style="height:25px;"></td>
    </tr>
	<tr>
    	<td>Description:</td>
        <td><input type="text" id="description" name="description" placeholder="product description" size="20"  style="height:25px;"></td>
    </tr>
    <tr>
		<td>specification:</td>
        <td><input type="text" id="specification" name="specification" placeholder="product specification" size="20"  style="height:25px;"></td>
    </tr>
    <tr>
    	<td>Discount:</td>
    	<td><input type="text" id="discount" name="discount" placeholder="product discount" size="20" style="height:25px;"></td>
    </tr>
    <tr>
		<td>Published:</td>
        <td><input type="text" id="published" name="published" placeholder="product published" size="20" style="height:25px;"></td>
    </tr>
    <tr>
		<td>available:</td>
        <td><input type="text" id="available" name="availabe" placeholder="" size="20" style="height:25px;"></td>
	</tr>
    <tr>
		<td>Select File:</td>
        <td><input type="file" name="file" /></td>
	</tr>
    <tr>
    	<td colspan="2">
			<input type="submit" name="sub" value="ADD" style="height:25px; width:60px;">
        </td>
    </tr>
  </table>
</form>

<script>
$(function(){
	$("#productForm").validate({
			rules: {
				name: {
					required: true,
					alphanum:true,
					minlength: 2
				},
				price:{
					required:true,
					number:true
				},
				qty: {
					required:true,
					number:true
				},
				size:{
					required:true
				},
				color:{
					required:true
				},
				description:{
					required:true
				},
				specification:{
					required:true
				},
				discount:{
					required:true
				},
				published:{
					required:true
				}
			},
			
			messages: {
				name: {
					required: "Field is Required",
					alphanum:"alpha numeric characters are allowed",
					minlength: "add minimum 2 characters"
				},
				price:{
					required:"Field is Required",
					number:"Only Numbers are allowed"
				},
				qty: {
					required:"Field is Required",
					number:"only numbers are allowed"
				},
				size:{
					required:"Field is Required"
				},
				color:{
					required:"Field is Required"
				},
				description:{
					required:"Field is Required"
				},
				specification:{
					required:"Field is Required"
				},
				discount:{
					required:"Field is Required"
				},
				published:{
					required: "Field is Required"
				}
			},
			submitHandler: function() {
				$("#productForm").submit();//alert("submitted!");
			}
		});
});
</script>
