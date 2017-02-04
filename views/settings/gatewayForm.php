<form id="gatewayForm" method="post" action="">
<?php
$settings = json_decode($gateway['settings'], true); 
?>

	<table>
    	<tr>
        	<td>Gateway Name</td>
            <td><input type="text" id="method_name" name="method_name" value="<?php echo isset($gateway['method_name']) ? $gateway['method_name'] : ''; ?>" /></td>
         </tr>
         <tr>
            <td>ID</td>
            <td><input type="text" id="settings_id" name="settings[id]" value="<?php echo isset($settings['id']) ? $settings['id'] : '' ?>" /></td>
         </tr>
         <tr>
         <td>Secret Key</td>
         <td><input type="text" name="settings[secret_key]" value="<?php echo isset($settings['secret_key']) ? $settings['secret_key'] : '' ?>" /></td>
         </tr>
         <tr>
            <td>API Key</td>
            <td><input type="text" name="settings[api_key]" value="<?php echo isset($settings['api_key']) ? $settings['api_key'] : '' ?>" /></td>
        </tr>
        <tr>
        	<td colspan="2">
            <input type="hidden" name="gateway_id" value="<?php echo isset($gateway['gateway_id']) ? $gateway['gateway_id'] : ''; ?>" />
            <input type="submit" name="sub" value="Save" /></td>
        </tr>
    </table>
</form>

