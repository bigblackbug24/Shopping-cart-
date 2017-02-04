                 
<form id="productForm" method="post" action="" enctype="multipart/form-data">
<table border="1">
ID:<input type="hidden" name="id" value="<?php echo isset($product['Pid']) ? $product['Pid'] : ''; ?>" placeholder="product id" size="20" style="height:25px;">
<br>
<br />
Name:<input type="text" name="name" placeholder="product name" size="20"  style="height:25px;" value="<?php echo isset($product['Pname']) ? $product['Pname'] : ''; ?>">
<br>
<br />
Price: <input type="text" name="price" placeholder="Product price" size="20"  style="height:25px;"  value="<?php echo isset($product['Pprice']) ?
$product['Pprice']: '' ;?>" />
<br />
<br />
Quantity:<input type="text" name="qty" plhaceholder="product quantity" size="20" style="height:25px;" value="<?php echo isset($product['Pqty']) ? $product['Pqty'] : ''; ?>">
<br>
<br />
Size:<input type="text" name="size" placeholder="product size" size="20" style="height:25px;" value="<?php echo isset($product['Psize']) ? $product['Psize'] : ''; ?>">
<br>
<br />
Color:<input type="text" name="color" placeholder="product color" size="20" style="height:25px;" value="<?php echo isset($product['Pcolor']) ? $product['Pcolor'] : ''; ?>">
<br>
<br />
Description:<input type="text" name="description" placeholder="product description" size="20" style="height:25px;" value="<?php echo isset($product['Pdescription']) ? $product['Pdescription'] : ''; ?>">
<br>
<br />
specification:<input type="text" name="specification" placeholder="product specification" size="20"  style="height:25px;" value="<?php echo isset ($product['Pspecification']) ? $product['Pspecification']: '' ;?>">
<br />
<br />
Discount:<input type="text" name="discount" placeholder="product dicount" size="20" style="height:25px;" value="<?php echo isset($product['Pdiscount']) ? $product['Pdiscount'] : ''; ?>">
<br><br />
Published:<input type="text" name="published" placeholder="product published" size="20" style="height:25px;" value="<?php echo isset($product['Ppublished']) ? $product['Ppublished'] : ''; ?>">
<br>
<br />
available:<input type="text" name="availabe" placeholder="" size="20" style="height:25px;" value="<?php echo isset($product['Pavailable']) ? $product['Pavailable'] :'' ; ?>">
<br>
<br />
<input type="file" name="file"   />
<br>
<br />
<input type="submit" name="sub" value="UPDATE " style="height:25px; width:80px;">
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
