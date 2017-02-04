<?php
include('./model/user.php');
class UserController extends Controller {
	
	private $user;
	function __construct(){
		$this->user=new User;
		
	}
	
	
	public function login()
	{
		
		if(!isset($_SESSION['email']) || empty($_SESSION['email']))
		{
			//var_dump($_SESSION['email']);
				//exit();
			if(isset($_POST['sub']))
			{
				$isAuth = $this->user->authenticate($_POST['email'],$_POST['pass']);
				
				if($isAuth != false)
				{
					
					$_SESSION['email'] = $isAuth['Email'];
					//$_SESSION['name']  = 'Usman';
					
					header("location: ".$this->getUrl('user/dashboard'));
				}
				 else
				  {
					
					header("location:".$this->getUrl('User/login'));
				}
			}
			
			$output = $this->outPut('User/login',array('pageTitle'=>'Admin Login'));
			return $output;
		} else 
	  {
		
			header("location:".SITE_URL.'User/dashboard' );
		
	  }
 } 
	
	public function dashboard(){
		if(isset($_SESSION['email']) && !empty($_SESSION['email'])){

			$order=$this->user->orderlist($_POST);
			$customer=$this->user->customerlist($_POST);
			$orderStats = $this->user->getOrdersStats();
			$productStats = $this->user->getProductsStats();
			
	      	$output=$this->output('User/dashboard',array('Order'=>$order,'CUSTOMER'=>$customer, 'pageTitle'=>'Dashboard'.'','AddText'=>'add new',	'addLink'=> $this->getUrl('product/addproduct').'','findLink'=> $this->getUrl('product/findproduct').'','FindText'=>'find product', 'orderStats'=>$orderStats,'productStats'=>$productStats));
			//var_dump($output);
			//exit();

						
			
			//var_dump($customer);
			//exit();
			
			return $output;
			
			
		} else{
			header("location: ".SITE_URL.'User/login');

		}
	}

public function adduser()
{
	if(isset($_SESSION['email']) && !empty($_SESSION['email']))
	{
	 if(isset($_POST['submit']))
	  {
	    $this->user->adduser($_POST);
	
	   header("location:".$this->getUrl('User/userlist'));
	  }
	
	 $output=$this->output('User/adduser', array('pageTitle'=>'Add User'));
	 return $output;
	}
	   else
	 {
		
		header("location:".$this->getUrl('User/login'));
	}
}

 public function updateuser($Uval)
 {
	 
	 if(isset($_SESSION['email']) && !empty($_SESSION['email']))
	 {
		 if(isset($_POST['submit']))
		 {
			//var_dump($_POST); 
		 $this->user->updateuser($_POST);
		
		 //exit();
		 header("location:".$this->getUrl('User/userlist'));
		 }
		 
		 $user=$this->user->getuser_id($Uval);
		 $output=$this->output('User/updateuser',array('Myuser'=>$user, 'pageTitle'=>'Edit User'));
		// var_dump($output);
		// exit();
	 return $output;
	 }
	 
	 else{
		 
		 header("location:".$this->getUrl('User/login'));
	     } 
		 
  }



	public function deleteuser($id)
	{
		if(isset($_SESSION['email']) && !empty($_SESSION['email']))
		{
		$this->user->delete($id);
		//var_dump($rrr);
		//exit();
		
	header("location:".$this->getUrl('User/userlist'));
		
		}
		else
		{
			header("location:".$this->getUrl('User/login'));
			
			}
	}
	
		public function userlist()
	{
		$user=$this->user->userlist();
		$output=$this->output('User/userlist',array('USER'=>$user, 'pageTitle'=>'Manage Users','findLink'=> $this->getUrl('User/searchuser').
		'','FindText'=>'find user'));
		//var_dump($output);
		//exit();
		return $output;
		
		
		}
	public function finduser()
	{
		if(isset($_GET['sea']))
	
			$user=$this->user->searchuser($_GET);
			//var_dump($user);
			//exit();
		
$output=$this->output('User/finduser',array('USER'=>$user, 'pageTitle'=>'Search Users'));
		return $output;			
	}
	public function searchuser()
	{
		
		$output=$this->output('User/searchuser',array('pageTitle'=>'Search User'));
			return $output;
			

		
		}
	
		public function logout(){
		session_destroy();
		header("location: ".$this->getUrl('User/login'));
	}
	
}


?>