<script type="text/javascript" src="https://www.google.com/jsapi"></script>
			
<div id="">
                   
  <div id="curve_chart" style="width:100%;"></div>
</div>
<div id="">
                   
  <div id="piechart_3d" style="width:100%;"></div>
</div>
<div class="clear" style="clear:both;"></div>
<div id="infobox">
                    <h3>Last 5 Orders</h3>
                    <table style=" width:auto">
						<thead>
							<tr>
                            	<th>Customer</th>
                                <th>Items</th>
                                <th>Grand Total</th>
                            </tr>
						</thead>
						<tbody>
                        <?php
						foreach($Order as $index=>$row)
						{
                        ?>
							<tr>
                            	<td><a href="#"><?php echo $row['customer_id']; ?></a></td>
                                <td><?php echo $row['order_date']; ?></td>
                                <td><?php echo $row['order_amount']; ?></td>
                                
                                
                                                            </tr>
                            <?php
						}
							?>
						</tbody>
					</table>            
                  </div>
                  <div id="infobox">
                    <h3>New Customers</h3>
                    <table style="width: auto;">
						<thead>
							<tr>
                            	<th>Customer Id</th>
                                <th>customer name</th>
                                <th>customer city</th>
                                <th>customer Address</th>
                            </tr>
						</thead>
						<tbody>
                        <?php 
						foreach ($CUSTOMER as $index=>$row)
						{
						?>
							<tr>
                            	<td><a href="#"><?php echo  $row['customer_id'];?></a></td>
                                <td><?php echo $row['customer_fname'];?></td>
                                <td><?php echo $row['customer_city'];?></td>
                                <td><?php echo $row['customer_address'];?></td>
                            </tr>
                            <?php
						}
						?>
							
                              
						</tbody>
					</table>                 
                  </div>
<script type="text/javascript"
          src="https://www.google.com/jsapi?autoload={
            'modules':[{
              'name':'visualization',
              'version':'1',
              'packages':['corechart']
            }]
          }"></script>

    <script type="text/javascript">
      google.setOnLoadCallback(drawChart);

      function drawChart() {
        
		var rows=[];
		rows.push(['Month', 'Orders']);
		<?php
			foreach($orderStats as $row){
				?>
				rows.push(['<?php echo $row['payment_month'] ?>',<?php echo $row['no_of_orders']  ?>]);
				<?php
			} 
		?>
		
		var data = google.visualization.arrayToDataTable(rows);

        var options = {
          title: 'Order Statistics',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
	<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
		  var rows=[];
		  rows.push(['Product', 'Sale']);
		  <?php
			foreach($productStats as $row){
				?>
				rows.push(['<?php echo $row['Pname'] ?>',<?php echo $row['sales']  ?>]);
				<?php
			} 
		?>
		
        var data = google.visualization.arrayToDataTable(rows);

        var options = {
          title: 'All Product Sales',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
