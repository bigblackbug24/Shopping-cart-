<?php 
include('model.php');
class CustomerModel extends Model
{
	private $stmt;
	private $dbHandler;

	function __construct()
	{
		$this->dbHandler=parent::__construct();
	}		
	
	function getAllCustomers($find = ''){
		$chunk = '';
		if(!empty($find)){
			$chunk = "where customer_fname like '%".$find."%' or customer_lname like '%".$find."%'";
		}
		$per_page = $this->getConfig('limit');
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
		$start_from = ($page-1) * $per_page;
		
		$stmt=$this->dbHandler->prepare("select * from customer ".$chunk." limit $start_from, $per_page");
		$stmt->execute();
		$output=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $output;
	}
	
	function countAllCustomers($find =''){
		$chunk = '';
		if(!empty($find)){
			$chunk = "where customer_fname like '%".$find."%' or customer_lname like '%".$find."%'";
		}
		$per_page = $this->getConfig('limit');
		$stmt=$this->dbHandler->prepare("select count(*) as count from customer ".$chunk."");
		$stmt->execute();
		$output=$stmt->fetch(PDO::FETCH_ASSOC);
		return $output['count'];
	}		
	
	function markCustomerAs($customer,$value){

		$stmt=$this->dbHandler->prepare("update customer set status=:wstatus where customer_id = :wcustomer_id ");
		$stmt->bindparam(':wstatus',$value,PDO::PARAM_INT);
		$stmt->bindparam(':wcustomer_id',$customer,PDO::PARAM_INT);
		$stmt->execute();
		return true;
	}
	
	function deleteCustomer($customer){
		$stmt=$this->dbHandler->prepare("delete from customer where customer_id = :wcustomer_id ");
		$stmt->bindparam(':wcustomer_id',$customer,PDO::PARAM_INT);
		$stmt->execute();
		return true;
	}
	public function find()
	{
		$stmt=$this->dbHandler->prepare("select * from customer where customer_fname LIKE '%".$mass['find']."or customer_lname LIKE '%".$mass['find']."");
		
		$stmt->execute();
		$output=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $output;
		}
			
}
?>