                        </br>
                        </br>
                        </br>
                        
      <table border="1">
      <tr>
      <th> User_id </th>
      <th> First name </th>
      <th> Last name </th>
      <th> Email </th>
      </tr>
      
      
      <?php foreach ($USER as $index=>$row)
	  {
		   ?>
        <tr>
        <td> <?php echo $row['User_id']; ?> </td>  
           <td> <?php echo $row['Fname']; ?></td>
           <td> <?php echo $row ['Lname']; ?></td>
           <td> <?php  echo $row['Email'];?></td>
           </tr>
             
                        <?php } ?>
						</table>
                        