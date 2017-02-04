<?php
include('./model/customerModel.php');
class CustomerController extends Controller {
	
	private $customer;
	public function __construct(){
		$this->customer=new CustomerModel;
	}

	public function index(){
		if(isset($_SESSION['email']) && !empty($_SESSION['email']))
		{
			$customers=$this->customer->getAllCustomers();
			$pagination = $this->paginate($this->getUrl('customer'), $this->customer->countAllCustomers());
			$output=$this->output('customers/index',array('customers'=>$customers, 'pageTitle'=>'Manage Customers','findLink'=> $this->getUrl('customer/find'),'FindText'=>'find Customer', 'pagination'=>$pagination));
			
			return $output;
		}
		else
		{
			header("location:" .$this->getUrl('user/login'));
		}	
	}
	
	public function mark_customer($action,$customer){
		
		if(isset($_SESSION['email']) && !empty($_SESSION['email']))
		{
			if($action == 'block'){
				$this->customer->markCustomerAs($customer, 0);
			} else if($action == 'unblock') {
				$this->customer->markCustomerAs($customer, 1);
			} else if($action == 'delete') {
				$this->customer->deleteCustomer($customer);
			}
			header("location: ".$this->getUrl('customer'));
		}
		else
		{
			header("location:" .$this->getUrl('user/login'));
		}	
	}
	
	public function find(){
		//echo '>>>>>>>>>>>>>>>';
		//exit();
		if(isset($_SESSION['email']) && !empty($_SESSION['email']))
		{ 
		     
			 
			$customers=$this->customer->getAllCustomers($_GET);
			 
			$output=$this->output('customers/find',array('customers'=>$customers,'pageTitle'=>'Customers'));
			return $output;
			
		}
		
		else
		{
			header("location:" .$this->getUrl('user/login'));
		}	
	}
	
	
	
}


?>