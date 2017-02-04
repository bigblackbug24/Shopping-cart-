<?php

class installModel
{
	private $conn;
	private $stmt;
	private $dbHandler;
	/*private variable to create cart table.*/
	private $cartQuery = 'CREATE TABLE IF NOT EXISTS `cart` (
						  `Pid` int(5) NOT NULL,
						  `cart_id` int(5) NOT NULL AUTO_INCREMENT,
						  `cart_discription` varchar(20) NOT NULL,
						  `Pqty` int(10) NOT NULL,
						  `order_id` int(5) NOT NULL,
						  PRIMARY KEY (`cart_id`)
						)';

/*private variable to create trigger*/
	private $cartTriggerQuery = 'DROP TRIGGER IF EXISTS `delete_wishlist`;
						DELIMITER //
						CREATE TRIGGER `delete_wishlist` AFTER INSERT ON `cart`
						 FOR EACH ROW BEGIN
						
						   
						   delete from wishlist where Pid=new.Pid and customer_id=(select customer_id from orders inner join cart on cart.order_id=orders.order_id where cart.order_id=new.order_id and cart.Pid=new.Pid);
						   
						END
						//
						DELIMITER ;
';


/*private variable to create categories table.*/
	private $categoriesQuery = 'CREATE TABLE IF NOT EXISTS `catagaries` (
  `Cid` int(3) NOT NULL AUTO_INCREMENT,
  `Cname` varchar(15) NOT NULL,
  `Cdiscription` text NOT NULL,
  `parent` int(3) DEFAULT NULL,
  PRIMARY KEY (`Cid`)
)';



/*private variable to create cart table.*/
	private $insetCategariesQuery = "INSERT INTO `catagaries` (`Cid`, `Cname`, `Cdiscription`, `parent`) VALUES
(18, 'paints& N', 'now its available paints', 0),
(20, 'Desktops', '&lt;p&gt;\r\n	Example of category description text&lt;/p&gt;\r\n', 0),
(24, 'Phones &amp; PD', '', 0),
(25, 'Components', '', 0),
(26, 'PC', '', 20),
(27, 'Mac', '', 20),
(28, 'Monitors', '', 25),
(29, 'Mice and Trackb', '', 25),
(30, 'Printers', '', 25),
(31, 'Scanners', '', 25),
(32, 'Web Cameras', '', 25),
(33, 'Cameras', '', 0),
(34, 'MP3 Players', '&lt;p&gt;\r\n	Shop Laptop feature only the best laptop deals on the market.', 0),
(35, 'test 1', '', 28),
(36, 'test 2', '', 28),
(38, 'test 4', '', 34),
(39, 'test 6', '', 34),
(40, 'test 7', '', 34),
(41, 'test 8', '', 34),
(42, 'test 9', '', 34),
(43, 'test 11', '', 34),
(44, 'test 12', '', 34),
(45, 'Windows', '', 18),
(46, 'Macs', '', 18),
(47, 'test 15', '', 34),
(48, 'test 16', '', 34),
(49, 'test 17', '', 34),
(50, 'test 18', '', 34),
(51, 'test 19', '', 34),
(52, 'test 20', '', 34),
(53, 'test 21', '', 34),
(54, 'test 22', '', 34),
(55, 'test 23', '', 34),
(56, 'test 24', '', 34),
(57, 'Tablets', '', 0),
(58, 'test 25', '', 52);";


/*private variable to create cart table.*/
	private $contactUsQuery = 'CREATE TABLE IF NOT EXISTS `contactus` (
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_no` int(10) NOT NULL,
  `message` varchar(100) NOT NULL,
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
)';


/*private variable to create cart table.*/
	private $customerQuery = "CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_fname` varchar(35) NOT NULL,
  `customer_lname` varchar(15) NOT NULL,
  `customer_email` varchar(15) NOT NULL,
  `customer_password` varchar(40) NOT NULL,
  `customer_address` varchar(40) NOT NULL,
  `customer_number` varchar(20) NOT NULL,
  `customer_status` varchar(10) NOT NULL DEFAULT '',
  `customer_city` varchar(10) NOT NULL,
  `status` tinyint(2) DEFAULT '1',
  PRIMARY KEY (`customer_id`)
)";


/*private variable to create cart table.*/
	private $helpQuery = 'CREATE TABLE IF NOT EXISTS `help` (
  `discription` varchar(15) NOT NULL
) ';


/*private variable to create cart table.*/
	private $menuQuery = 'CREATE TABLE IF NOT EXISTS `menus` (
  `menu_id` int(3) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(150) DEFAULT NULL,
  `menu_slug` varchar(150) DEFAULT NULL,
  `menu_links` text,
  PRIMARY KEY (`menu_id`)
)';


/*private variable to create cart table.*/
	private $ordersQuery = 'CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(5) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `order_amount` int(10) NOT NULL,
  `transactionId` varchar(45) NOT NULL,
  PRIMARY KEY (`order_id`)
)';


/*private variable to create cart table.*/
	private $pageQuery = "CREATE TABLE IF NOT EXISTS `pages` (
  `page_id` int(3) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(50) DEFAULT NULL,
  `page_title` varchar(150) DEFAULT NULL,
  `page_content` text,
  `status` tinyint(1) DEFAULT '1',
  `page_url` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`page_id`)
) ";


/*private variable to create cart table.*/
	private $paymentQuery = "CREATE TABLE IF NOT EXISTS `payment_gateways` (
	  `gateway_id` int(3) NOT NULL AUTO_INCREMENT,
	  `method_name` varchar(150) DEFAULT NULL,
	  `is_active` tinyint(1) DEFAULT NULL,
	  `settings` text,
	  PRIMARY KEY (`gateway_id`)
	)";


/*private variable to create cart table.*/
	private $productQuery = 'CREATE TABLE IF NOT EXISTS `product` (
	  `Pid` int(10) NOT NULL AUTO_INCREMENT,
	  `category_id` int(4) NOT NULL,
	  `Pname` varchar(150) NOT NULL,
	  `Pprice` int(20) NOT NULL,
	  `Pqty` int(5) NOT NULL,
	  `Psize` varchar(35) NOT NULL,
	  `Pcolor` varchar(10) NOT NULL,
	  `Pdescription` varchar(100) NOT NULL,
	  `Pspecification` varchar(100) NOT NULL,
	  `Pdiscount` int(10) NOT NULL,
	  `Ppublished` varchar(10) NOT NULL,
	  `Pimage` varchar(150) NOT NULL,
	  `Pavailable` varchar(10) NOT NULL,
	  PRIMARY KEY (`Pid`)
	)';


/*private variable to create cart table.*/
	/*private $productInsertQuery = "INSERT INTO `product` (`Pid`, `category_id`, `Pname`, `Pprice`, `Pqty`, `Psize`, `Pcolor`, `Pdescription`, `Pspecification`, `Pdiscount`, `Ppublished`, `Pimage`, `Pavailable`) VALUES (NULL, 0, 'Laptop', 40, 5, '', 'black', 'It features a gorgeous full HD, 13.3-inch Infinity display, 5th-Gen Intel Core i3 CPU, 4GB of RAM - ', '', 5, '2015', '".SITE_URL."upload/download.jpg', 'yes'),
(NULL, 0, 'Samsung mobile', 12, 12, '', 'White', 'it has 2 GB ram front caera is 5 mpx,back camera 12 mpx.', '', 10, '2015', '".SITE_URL."upload/images (2).jpg', 'yes'),
(NULL, 0, 'I pohne', 70, 3, '', 'black', '2 GB ram 2 GB ROM 5 mpx front camera 15 mpx back camera', '', 0, '2013', '".SITE_URL."upload/iphone5b.gif', 'yes'),
(NULL, 0, 'mp3 player', 5000, 12, '', 'black', 'internal memory is 10 GB.......', '', 1, '2013', '".SITE_URL."upload/images (4).jpg', 'yes'),
(NULL, 0, 'huawei ', 14500, 12, '', 'black', '2mpx front cam 5 mpx back camera 2 gb memory.. dual sim..', '', 10, '2014', '".SITE_URL."upload/images (3).jpg', 'yes'),
(NULL, 0, 'camera', 16000, 3, '', 'black', '50mpx camera memory card available with charger.......', '', 1, '2015', '".SITE_URL."upload/download (1).jpg', 'yes'),
(NULL, 0, 'Tablet', 10, 5, '', 'black', 'It features a gorgeous full HD, 13.3-inch Infinity display, 5th-Gen Intel Core i3 CPU, 4GB of RAM - ', '', 0, '2010', '".SITE_URL."upload/images (7).jpg', 'NO'),
(NULL, 0, 'Nikon camera', 15, 4, '', 'blue', 'HD result 5.5 inch lcd and it is 15 mpx....owsome featchees...', '', 1, '2014', '".SITE_URL."upload/images (8).jpg', 'yes'),
(NULL, 0, 'mp3 player', 12, 12, '', 'black', '', '', 2, '2015', '".SITE_URL."upload/phil_sa.jpg', 'yes');";*/

/*private variable to create cart table.*/
	private $reviewQuery = "CREATE TABLE IF NOT EXISTS `review` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `author` varchar(64) CHARACTER SET utf8 NOT NULL,
  `text` text CHARACTER SET utf8 NOT NULL,
  `rating` int(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  PRIMARY KEY (`review_id`)
)";

	private $settingQuery = "CREATE TABLE IF NOT EXISTS `settings` (
	  `setting_id` int(6) NOT NULL AUTO_INCREMENT,
	  `field` varchar(150) DEFAULT NULL,
	  `description` varchar(150) DEFAULT NULL,
	  `value` text,
	  `type` varchar(50) DEFAULT 'config',
	  PRIMARY KEY (`setting_id`)
	)";
	
	private $userQuery = "CREATE TABLE IF NOT EXISTS `user` (
	  `User_id` int(10) NOT NULL AUTO_INCREMENT,
	  `Fname` varchar(100) NOT NULL,
	  `Lname` varchar(100) NOT NULL,
	  `Email` varchar(30) NOT NULL,
	  `password` varchar(35) NOT NULL,
	  PRIMARY KEY (`User_id`)
	)";
	
	private $wishlistQuery = "CREATE TABLE IF NOT EXISTS `wishlist` (
	  `Pid` int(5) NOT NULL,
	  `customer_id` int(5) NOT NULL,
	  `wishlist_id` int(10) NOT NULL AUTO_INCREMENT,
	  PRIMARY KEY (`wishlist_id`)
	) ";


	public function __construct(){
		$query=$this->dbHandler = new PDO('mysql:host='.DBHOST.';dbname='.DATABASENAME, USER, PASS);	
				return $this->dbHandler;//new PDO('mysql:host='.DBHOST.';dbname='.DATABASENAME, USER, PASS);	
	}
	
	public function setupDatabase(){

		
		$stmt=$this->dbHandler->prepare($this->cartQuery);
		$stmt->execute();
			
		$stmt=$this->dbHandler->prepare($this->cartTriggerQuery);
		$stmt->execute();
		
		$stmt=$this->dbHandler->prepare($this->categoriesQuery);
		$stmt->execute();
		
		$stmt=$this->dbHandler->prepare($this->insetCategariesQuery);
		$stmt->execute();
		
		$stmt=$this->dbHandler->prepare($this->contactUsQuery);
		$stmt->execute();
		
		$stmt=$this->dbHandler->prepare($this->customerQuery);
		$stmt->execute();
		
		$stmt=$this->dbHandler->prepare($this->helpQuery);
		$stmt->execute();
		
		$stmt=$this->dbHandler->prepare($this->menuQuery);
		$stmt->execute();
		
		$stmt=$this->dbHandler->prepare($this->ordersQuery);
		$stmt->execute();
		
		$stmt=$this->dbHandler->prepare($this->pageQuery);
		$stmt->execute();
		
		$stmt=$this->dbHandler->prepare($this->paymentQuery);
		$stmt->execute();
		
		$stmt=$this->dbHandler->prepare($this->productQuery);
		$stmt->execute();
		
		$productInsertQuery = "INSERT INTO `product` (`Pid`, `category_id`, `Pname`, `Pprice`, `Pqty`, `Psize`, `Pcolor`, `Pdescription`, `Pspecification`, `Pdiscount`, `Ppublished`, `Pimage`, `Pavailable`) VALUES (NULL, 0, 'Laptop', 40, 5, '', 'black', 'It features a gorgeous full HD, 13.3-inch Infinity display, 5th-Gen Intel Core i3 CPU, 4GB of RAM - ', '', 5, '2015', '".FRONTEND_URL."upload/download.jpg', 'yes'),
(NULL, 0, 'Samsung mobile', 12, 12, '', 'White', 'it has 2 GB ram front caera is 5 mpx,back camera 12 mpx.', '', 10, '2015', '".FRONTEND_URL."upload/images (2).jpg', 'yes'),
(NULL, 0, 'I pohne', 70, 3, '', 'black', '2 GB ram 2 GB ROM 5 mpx front camera 15 mpx back camera', '', 0, '2013', '".FRONTEND_URL."upload/iphone5b.gif', 'yes'),
(NULL, 0, 'mp3 player', 5000, 12, '', 'black', 'internal memory is 10 GB.......', '', 1, '2013', '".FRONTEND_URL."upload/images (4).jpg', 'yes'),
(NULL, 0, 'huawei ', 14500, 12, '', 'black', '2mpx front cam 5 mpx back camera 2 gb memory.. dual sim..', '', 10, '2014', '".FRONTEND_URL."upload/images (3).jpg', 'yes'),
(NULL, 0, 'camera', 16000, 3, '', 'black', '50mpx camera memory card available with charger.......', '', 1, '2015', '".FRONTEND_URL."upload/download (1).jpg', 'yes'),
(NULL, 0, 'Tablet', 10, 5, '', 'black', 'It features a gorgeous full HD, 13.3-inch Infinity display, 5th-Gen Intel Core i3 CPU, 4GB of RAM - ', '', 0, '2010', '".FRONTEND_URL."upload/images (7).jpg', 'NO'),
(NULL, 0, 'Nikon camera', 15, 4, '', 'blue', 'HD result 5.5 inch lcd and it is 15 mpx....owsome featchees...', '', 1, '2014', '".FRONTEND_URL."upload/images (8).jpg', 'yes'),
(NULL, 0, 'mp3 player', 12, 12, '', 'black', '', '', 2, '2015', '".FRONTEND_URL."upload/phil_sa.jpg', 'yes');";
		$stmt=$this->dbHandler->prepare($productInsertQuery);
		$stmt->execute();
		
		$stmt=$this->dbHandler->prepare($this->reviewQuery);
		$stmt->execute();
		
		$stmt=$this->dbHandler->prepare($this->settingQuery);
		$stmt->execute();
		
		$stmt=$this->dbHandler->prepare($this->userQuery);
		$stmt->execute();
		
		$stmt=$this->dbHandler->prepare($this->wishlistQuery);
		$stmt->execute();
		
		return true;
	}
	
	public function registerUser($mass){
		$fname = "Admin";
		$lname = "Admin";
		
		$query="INSERT INTO user (Fname, Lname, Email, password) values (:fname, :lname, :email, :password);";
		$stmt = $this->dbHandler->prepare($query);
		$stmt->bindparam(':fname',$fname,PDO::PARAM_STR);
		$stmt->bindparam(':lname',$lname,PDO::PARAM_STR);
		$stmt->bindparam(':email',$mass['email'],PDO::PARAM_STR);
		$stmt->bindparam(':password',$mass['password'],PDO::PARAM_STR);
		$stmt->execute();
	}
	
	public function saveSettings($mass){
		 $query = "INSERT INTO `settings` (`setting_id`, `field`, `description`, `value`, `type`) VALUES
				(NULL, 'theme', 'Active Theme', 'default', 'config'),
				(NULL, 'site_url', 'Site Url', '".FRONTEND_URL."', 'config'),
				(NULL, 'site_name', 'Site Title', '".$mass['site_title']."', 'config'),
				(NULL, 'store_owner', 'Store Owner', '".$mass['store_owner']."', 'config'),
				(NULL, 'phone_number', 'Phone Number', '".$mass['phone_number']."', 'config'),
				(NULL, 'address', 'Address', '".$mass['address']."', 'config'),
				(NULL, 'email', 'Email', '".$mass['email']."', 'config'),
				(NULL, 'logo', 'Site Logo', '".FRONTEND_URL."upload/logo.png', 'config'),
				(NULL, 'limit', 'Record per Page', '10', 'config');
";
		$stmt = $this->dbHandler->prepare($query);
		$stmt->execute();
		
		return true;
	}
	
}
	
	

  
?>