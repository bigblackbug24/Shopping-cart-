<head>
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL.'css/searchbox.css'; ?>" />

<form id="search-form" method="GET" action="<?php echo SITE_URL.'customers/find' ?>">
<input id="search" type="search" name="find" placeholder= "Search..." size="70">
	<input id="submit" type="submit"  value="search" name="find" >
						
						</form>
                        </head>
                        <table>
	<tr>
    	<td>ID</td>
        <td>Customer Name</td>
        <td>Email</td>
        <td>Phone</td>
        <td>Status</td>
        <td>Action</td>
    <tr>
    <?php
	foreach($customers as $customer){
		?>
        <tr>
            <td><?php echo $customer['customer_id'] ?></td>
            <td><?php echo $customer['customer_fname']. ' '.$customer['customer_lname'] ?></td>
            <td><?php echo $customer['customer_email'] ?></td>
            <td><?php echo $customer['customer_number'] ?></td>
            <td><?php echo $customer['status'] == 1 ? 'Active' : 'Blocked'; ?></td>
            <td>
            	<a href="<?php echo SITE_URL.'customer/mark_customer/block/'.$customer['customer_id'] ?>">Block</a>
                <a href="<?php echo SITE_URL.'customer/mark_customer/unblock/'.$customer['customer_id'] ?>">Un Block</a>
                <a href="<?php echo SITE_URL.'customer/mark_customer/delete/'.$customer['customer_id'] ?>">Delete</a>
            </td>
        </tr>
        <?php
	}
    ?>
</table>