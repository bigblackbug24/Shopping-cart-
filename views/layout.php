<html>
<head>



<meta content="text/html; charset=utf-8" http-equiv="Content-Type">

<title>Dashboard - Admin Template</title>

<link type="text/css" rel="stylesheet" href="<?php echo SITE_URL.'css/theme.css'; ?>" >
<link type="text/css" rel="stylesheet" href="<?php echo SITE_URL.'css/style.css';?>" >
<link type="text/css" rel="stylesheet" href="<?php echo SITE_URL.'css/table.css';?>">
<link type="text/css" rel="stylesheet" href="<?php echo SITE_URL.'css/dropdown.css';?>">
<script src="<?php echo SITE_URL;?>js/jquery.min.js"></script>
<script src="<?php echo SITE_URL;?>js/jquery.validate.min.js"></script>
<script>
   var StyleFile = "theme" + document.cookie.charAt(6) + ".css";
   document.writeln('<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL. 'css';?>/' + StyleFile + '">');
</script><link href="css/themeg.css" type="text/css" rel="stylesheet">

<!--[if IE]>
<link rel="stylesheet" type="text/css" href="css/ie-sucks.css" />
<![endif]-->
</head>
<body>


	<div id="container">

    	<div id="header">
                   	<h2> Admin area</h2>
                    
                 <div id="topmenu" style="<?php echo !isset($_SESSION['email']) ? 'background:none':'';  ?>" >

   <?php if(isset($_SESSION['email']))
			{
				 ?>

            	<ul>
                   

                	<li><a href="<?php echo SITE_URL.'User/dashboard' ;?>">Dashboard</a></li>
                    <li><a href="<?php echo SITE_URL.'order/orderlist'; ?>">Orders</a></li>
                	<li><a href="<?php echo SITE_URL.'User/userlist'; ?>">Users</a></li>
                	<li><a href="<?php echo SITE_URL.'product/listview'; ?>">Manage Products</a></li>
                    <li><a href="<?php echo SITE_URL.'settings'; ?>">Settings</a></li>
                    <li><a href="<?php echo SITE_URL.'pages/plistview'; ?>">Help Queries</a></li>
                     <li style="float:right;"> <a href="<?php echo SITE_URL.'User/logout'; ?>"> logout</a></li>
              </ul>
       <?php } ?>       
          </div>
      </div>
        <div id="top-panel" style="background:none;">
            <div id="panel">
                <!-- <ul>
                    <li><a class="report" href="#">Sales Report</a></li>
                    <li><a class="report_seo" href="#">SEO Report</a></li>
                    <li><a class="feed" href="#">RSS Feed</a></li>
                </ul> -->
            </div>
      </div>
      
 <div id="wrapper">
            <div id="content">
       			<div id="rightnow">
                    <h3 class="reallynow">
                        <span><?php echo $pageTitle ?></span>
                        <?php if(isset($addLink)){ ?>
                        <a class="add" href="<?php echo $addLink ;?>"><?php echo $AddText ;?></a>
                        <?php } if( isset($findLink)) { ?>
                        <a class="search" href="<?php echo $findLink  ?>"><?php echo $FindText; ?></a>
                        <?php } ?>
                        <br>
                    </h3>
			   
			  </div>
           
                  
              </div>
            </div>
       
                       <div id="sidebar" style="<?php echo !isset($_SESSION['email']) ? 'background:none':'';  ?>">
                       <?php if(isset($_SESSION['email'])){ ?>
  				<ul>
                	<li><h3><a class="house" href="<?php echo SITE_URL.'User/dashboard' ;?>">Dashboard</a></h3>
                        <ul>
                        	<li><a class="report" href="<?php echo SITE_URL.'sales/report' ?>">Sales Report</a></li>
                        </ul>
                    </li>
                    <li><h3><a class="folder_table" href="<?php echo SITE_URL.'order/orderlist'?>">Manage Orders</a></h3>
          				<ul>
                        	
                          <li><a class="shipping" href="<?php echo SITE_URL.'order/shipping' ?>">Shipping Methods</a></li>
                            
                        </ul>
                    </li>
                    <li><h3><a class="manage" href="<?php echo SITE_URL.'settings' ?>">Manage Site</a></h3>
          				<ul>
                        	<li><a class=""  href="<?php echo SITE_URL.'settings' ?>">Site Settings</a></li>
                            <li><a class=""  href="<?php echo SITE_URL.'categaries/Clistview' ?>">Categories</a></li>
                            <li><a class=""  href="<?php echo SITE_URL.'settings/theme' ?>">Themes</a></li>
                            <li><a class=""  href="<?php echo SITE_URL.'settings/pages' ?>">Pages</a></li>
                            <li><a class=""  href="<?php echo SITE_URL.'settings/menus' ?>">Menus</a></li>
                            <li><a class=""  href="<?php echo SITE_URL.'settings/payment' ?>">Payments</a></li>
                        </ul>
                    </li>
                  <li><h3><a class="user" href="<?php echo SITE_URL.'User/userlist'; ?>">Manage Users</a></h3>
          				<ul>
                            <li><a class="useradd" href="<?php echo SITE_URL.'User/adduser'?>">Add user</a></li>
                            <li><a class="search" href="<?php echo SITE_URL.'User/searchuser'  ?>">Find user</a></li>
                            <li><a class="useradd" href="<?php echo SITE_URL.'customer'?>">Manage Customers</a></li>

                        </ul>
                    </li>
				</ul>       
                <?php } ?>
          </div>
          
          
       
               <div id="content" align="center"><?php require(''.$template.'.php'); ?></div>
                  </div>
  
           <?php if(isset($_SESSION['email']))
			{
				 ?>
       
        <div id="footer">
        <div id="credits">
   		
        </div>
        <div id="styleswitcher">
            <ul>
                <li><a id="defswitch" title="Default" href="javascript: document.cookie='theme='; window.location.reload();">d</a></li>
                <li><a id="blueswitch" title="Blue" href="javascript: document.cookie='theme=1'; window.location.reload();">b</a></li>
                <li><a id="greenswitch" title="Green" href="javascript: document.cookie='theme=2'; window.location.reload();">g</a></li>
                <li><a id="brownswitch" title="Brown" href="javascript: document.cookie='theme=3'; window.location.reload();">b</a></li>
                <li><a id="mixswitch" title="Mix" href="javascript: document.cookie='theme=4'; window.location.reload();">m</a></li>
                <li><a id="defswitch" title="Mix" href="javascript: document.cookie='theme=5'; window.location.reload();">m</a></li>
            </ul>
        </div><br>

        </div>
</div>

<?php }
?>


</body>
</html>