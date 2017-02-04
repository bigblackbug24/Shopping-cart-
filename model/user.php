<?php
include('model.php');
class User extends Model
{
	private $conn;
	private $stmt;
	private $dbHandler;
	
	public function __construct(){
		$this->dbHandler = parent::__construct();//new PDO('mysql:host='.DBHOST.';dbname='.DATABASENAME, USER, PASS);	
	}
	
	public function authenticate($email,$password)
	{
		$stmt=$this->dbHandler->prepare("select * from user where Email=:wemail and password = :wpass");
		$stmt->bindParam(':wemail', $email, PDO::PARAM_STR);
		$stmt->bindParam(':wpass', $password, PDO::PARAM_STR);
			
		$stmt->execute();
//print_r(		$stmt->errorInfo ());
		//var_dump($stmt->rowCount());
		if ($stmt->rowCount() == 1)
		 {
			// exit("123123123");
      		return $stmt->fetch(PDO::FETCH_ASSOC);
				
		 }
		  else {
			 //exit("there");
			 return false;
		 }
	}
		 
					
			
	public function orderlist()
		 {
			 $stmt=$this->dbHandler->prepare("select orders.customer_id,orders.order_id,orders.order_date,orders.order_amount from orders INNER JOIN customer ON orders.customer_id=customer.customer_id order by order_id DESC LIMIT 5 ");
			 $stmt->execute();
			$output=$stmt->fetchAll(PDO::FETCH_ASSOC);
			//var_dump($output);
			//exit();
		    return $output;
			
			}
			public function customerlist()
			{
				$stmt=$this->dbHandler->prepare("select * from customer LIMIT 0,5 ");
				$stmt->execute();
				$output=$stmt->fetchAll(PDO::FETCH_ASSOC);
				return $output;
				
				
				}
 public function adduser($val)
 {
	 $stmt=$this->dbHandler->prepare('INSERT into user (Fname,Lname,Email,password) VALUES(:wFname,:wLname,:wemail,:wpassword)');
	 $stmt->bindparam(':wFname',$val['Fname'],PDO::PARAM_STR);
	 $stmt->bindparam(':wLname',$val['Lname'],PDO::PARAM_STR);
	 $stmt->bindparam(':wemail',$val['email'],PDO::PARAM_STR);
	 $stmt->bindparam(':wpassword',$val['password'],PDO::PARAM_STR);
	 
	 $check=$stmt->execute();
	 if($check)
	 {
		 return true;
	 }
	 else
	 {
	 return false;
	 }
 }
 
 
 public function updateuser($val)
 {

	 $stmt=$this->dbHandler->prepare("UPDATE user SET Fname=:wFname, Lname=:wLname, Email=:wemail,password=:wpassword WHERE User_id=:wuser_id");
	// 
	 $stmt->bindparam(':wFname',$val['Fname'],PDO::PARAM_STR);
	 $stmt->bindparam(':wLname',$val['Lname'],PDO::PARAM_STR);
	 $stmt->bindparam(':wemail',$val['email'],PDO::PARAM_STR);
	 $stmt->bindparam(':wpassword',$val['password'],PDO::PARAM_STR);
	 $stmt->bindparam(':wuser_id',$val['id'],PDO::PARAM_INT);
	 $stmt->execute();
	 if(9)
	 {
		 return true;
		 
	 }
	 else
	 {
		 return false;
		 
		 
		 }
		 
	 
	 
	 }
 
 
 
	 public function delete($id)
	 {
		 $stmt=$this->dbHandler->prepare("DELETE from user where User_id=:wuser_id");
		 $stmt->bindparam(':wuser_id',$id,PDO::PARAM_STR);
		 $check=$stmt->execute();
		 if($check)
		 { 
		 //echo '>>>>>>>>>>>>>>>>>>>>';
		 //exit();
			 return true;
			
			 }
			 else
			 {
				 return false;
				 }
		
	 }
	 
	 public function getuser_id($Uval)
	 {
		 $stmt=$this->dbHandler->prepare("select * from user where user_id=:wuser_id");
		 $stmt->bindparam(':wuser_id',$Uval,PDO::PARAM_INT);
		 $stmt->execute();
		 $row=$stmt->fetch(PDO::FETCH_ASSOC);
		 //var_dump($row);
		 //exit();
		 return $row;
		 
		 
		 }
	 
	 
	 
	 public function userlist()
	{
		$stmt=$this->dbHandler->prepare('select * from user ');
		$stmt->execute();
		$output=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $output;		
		}
		
		public function finduser()
		{
			$stmt=$this->dbHandler->prepare('select * from user where Fname=:wfname');
			$stmt->bindparam(':wfname',$name['sea'],PDO::PARAM_STR);
			$stmt->execute();
			//echo '<<<<<<<<<<<<<<<<<<<<<<<<<<<';
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
			return $row;
			
			
		}
	public function searchuser($mass)
		{
			$stmt=$this->dbHandler->prepare("select * from user where Fname LIKE '%".$mass['sea']."%'");
			 $stmt->execute();
			 $output=$stmt->fetchAll(PDO::FETCH_ASSOC);
			 return $output;
		 }
		 
		public function getOrdersStats(){
			$query = "Select
						CONCAT(extract(month from order_date),' / ', EXTRACT(year FROM order_date) ) as payment_month,
						count(order_id) as no_of_orders
						From
						orders
						Group by extract(month from order_date) desc LIMIT 0,12";
			$stmt = $this->dbHandler->prepare($query);
			 $stmt->execute();
			 $output=$stmt->fetchAll(PDO::FETCH_ASSOC);
			 return $output;

		}
		
		public function getProductsStats(){
			$query  = "select count(cart_id) as sales, Pname  from cart inner join product on product.Pid=cart.Pid group by cart.Pid";
			$stmt = $this->dbHandler->prepare($query);
			 $stmt->execute();
			 $output=$stmt->fetchAll(PDO::FETCH_ASSOC);
			 return $output;
		}
	
	
}
	
	

  
?>