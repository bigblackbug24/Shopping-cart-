<html>
<head>
	<title><?php $title; ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL .'style.css'; ?>">
    </head>
<body bgcolor="#999999">
    <div class="main_container">
        <div class="header" >
            <img src="<?php echo SITE_URL.'images/cart.jpg'; ?>" width="852" height="210">	
        </div>
        <div class="container">
            <div id="sidebar" style= "color: #000, float:left;"> side Bar
               
                 <ul>
                    <li>
                     <a href="<?php echo SITE_URL.'product/listview/'; ?> "> Managedproduct </a>
                    </li>
                     <li>
                     <a href="<?php echo SITE_URL.'categaries/Clistview/'; ?> "> Managedcategaries </a>
                    </li>
                    <li>
                    
                    <a href="">Managed pages </a>
                    </li>
                    <li>
                    <a href="<?php echo SITE_URL.'pages/contactus' ?>"> Contactus </a>
                    </li>
                </ul>
              </div>
            </div>    
            <div class="content" align="center"><?php require(''.$template.'.php'); ?></div>
            <div style="clear:both;"></div>
        </div>
        <div style="clear:both;">Footer Section</div>
    </div>
</body>

</html>