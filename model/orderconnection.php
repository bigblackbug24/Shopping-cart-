<?php 
include('model.php');
class Order extends Model
{
private $stmt;
private $dbHandler;

function __construct()
{
	$this->dbHandler=parent::__construct();
	
	}
	public function fetchallorders()
	{
		$per_page = $this->getConfig('limit');
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
		$start_from = ($page-1) * $per_page;
		
		$stmt=$this->dbHandler->prepare("select * from orders order by order_id DESC limit $start_from, $per_page");
		$stmt->execute();
		$output=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $output;
	}
	
	public function countAllOrders($mass = ''){
		$chunk = "";
		if($mass != ''){
			$chunk .= "where customer_fname LIKE'%".$mass['search']."%'";
		}
		$stmt=$this->dbHandler->prepare("select count(*) as count from orders ".$chunk);
		$stmt->execute();
		$output=$stmt->fetch(PDO::FETCH_ASSOC);
		return $output['count'];
	}
	
	public function order_view($Oval)
	{
		$stmt=$this->dbHandler->prepare("select * from orders left join cart on cart.order_id=orders.order_id inner join product 
		ON product.Pid=cart.Pid where orders.order_id=:worder_id");
		$stmt->bindparam(':worder_id',$Oval,PDO::PARAM_INT);
		$stmt->execute();
		
		$output=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $output;
		
		
		}
		public function findorder($mass)
	{
		$per_page = $this->getConfig('limit');
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
		$start_from = ($page-1) * $per_page;
		
		$stmt=$this->dbHandler->prepare("select * from orders INNER JOIN customer ON customer.customer_id= orders.customer_id where customer_fname
		LIKE'%".$mass['search']."%' limit $start_from, $per_page ");
		//$stmt->bindparam(':wcustomer_id',$Oval,PDO::PARAM_INT);
		$stmt->execute();
		$output=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $output;
		
		
		}
					
			
}
?>