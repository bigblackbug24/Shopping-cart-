<style>
	#custom_menu { display:none; }
</style>
<form method="post" action="">
	<table>
    	<tr>
        	<td>Menu Name</td>
        	<td><input type="text" name="menu_name" id="menu_name" value="<?php echo isset($menu['menu_name']) ? $menu['menu_name'] : ''; ?>" /></td>
    	</tr>
        <tr>
        	<td>Menu slug</td>
        	<td><input type="text" name="menu_slug" id="menu_slug" value="<?php echo isset($menu['menu_name']) ? $menu['menu_name'] : ''; ?>" /></td>
    	</tr>
        <tr>
        	<td>Select Menu Items</td>
        	<td>
            	<label> Pages<input id="page_check" type="checkbox" class="menu_item" name="menu_item" value="2" /></label>
                <label> Custom<input id="custom_check" type="checkbox" class="menu_item" name="menu_item" value="1" /></label>
                <label id="custom_menu"> Menu Text<input type="text" name="custom_text" id="custom_text" value="" />, menu Link <input type="text" name="custom_link" id="custom_link" /><input type="button" name="button" value="Add" id="add_custom_link" /> </label>
            </td>
    	</tr>
        <tr>
        	<td colspan="2">
	            <div id="menu_container"> No Menu Added Yet</div>
            </td>
        </tr>
        <tr>
        	<td colspan="2"><input type="submit" name="sub" value="Save !!!" /></td>
        </tr>
    </table>
</form>
<script>
	$(function(){
		$("img.remove_menu").click(function(){
			alert('there');
			$(this).parent('p').remove();
		});
		
		$("#menu_name").blur(function(){
			var value = $(this).val();
			$("#menu_slug").val(value.replace('\ ', '_'));
		});
		
		$("#add_custom_link").click(function(){
			var text = $("#custom_text").val();
			var link1 = $("#custom_link").val();
			$.post("<?php echo SITE_URL.'settings/getMenusItems/custom' ?>",{'title':text,'link':link1},function(data){
				$("#menu_container").append(data);
			});
			
			//$("#menu_container").append('<p> <a href="'+link1+'">'+text+'</a> <input type="hidden" name="menu_links[]" value="'+data+'" /></p>')
		});
		
		$(".menu_item").click(function(){
			if($(this).attr('id') == 'custom_check' ){
				if($(this).is(':checked')){
					$("#custom_menu").show();	
				} else{
					$("#custom_menu").hide();	
				}
			} else if($(this).attr('id') == 'category_check'){
		
				if($(this).is(':checked')){
					$.get('<?php echo SITE_URL ?>settings/getMenusItems/categories',function(data){
						$(document).find(".category_menu").remove();
						$("#menu_container").html('');
						$("#menu_container").append(data);
					});
				} else{
					$(document).find(".category_menu").remove();	
				}
			
			} else if ($(this).attr('id') == 'page_check'){
				if($(this).is(':checked')){
					$.get('<?php echo SITE_URL ?>settings/getMenusItems/Pages',function(data){
						$(document).find(".page_menu").remove();
						$("#menu_container").html('');
						$("#menu_container").append(data);
					});
				} else{
					$(document).find(".page_menu").remove();	
				}
			}
		});
	});
</script>