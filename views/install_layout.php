<?php
$dirname = basename(dirname(dirname(dirname(__FILE__))));
 $url = 'http://';
$url .=$_SERVER['SERVER_NAME']=='localhost' ? $_SERVER['SERVER_NAME'].'/'.$dirname : $_SERV‌​ER['SERVER_NAME']; 
$SITE_URL = $url;
?>
<html>
<head>



<meta content="text/html; charset=utf-8" http-equiv="Content-Type">

<title>Dashboard - Admin Template</title>

<link type="text/css" rel="stylesheet" href="<?php echo $SITE_URL.'/Admin/css/theme.css'; ?>" >
<link type="text/css" rel="stylesheet" href="<?php echo $SITE_URL.'/Admin/css/style.css';?>" >
<link type="text/css" rel="stylesheet" href="<?php echo $SITE_URL.'/Admin/css/table.css';?>">
<link type="text/css" rel="stylesheet" href="<?php echo $SITE_URL.'/Admin/css/dropdown.css';?>">
<script src="<?php echo $SITE_URL;?>/Admin/js/jquery.min.js"></script>
<script src="<?php echo $SITE_URL;?>/Admin/js/jquery.validate.min.js"></script>
<script>
   var StyleFile = "theme" + document.cookie.charAt(6) + ".css";
   document.writeln('<link rel="stylesheet" type="text/css" href="<?php echo $SITE_URL. '/Admin/css';?>/' + StyleFile + '">');
</script><link href="<?php echo $SITE_URL;?>/Admin/css/themeg.css" type="text/css" rel="stylesheet">

<!--[if IE]>
<link rel="stylesheet" type="text/css" href="<?php echo $SITE_URL;?>/Admin/css/ie-sucks.css" />
<![endif]-->
</head>
<body>


	<div id="container">

    	<div id="header">
                   	<h2>Installation</h2>
                    
                 <div id="topmenu">
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
       
                       
          
          
       
               <div id="content" align="center"><?php require(''.$template.'.php'); ?></div>
                  </div>

</body>
</html>