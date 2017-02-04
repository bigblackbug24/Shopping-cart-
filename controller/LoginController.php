<?php
include('./model/user.php');
class LoginController extends Controller
{
	public function Login()
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
					
					header("location:".SITE_URL('User/login'));
				}
			}
			
			$output = $this->outPut('User/login',array('pageTitle'=>'Admin Login'));
			return $output;
		}
		 else 
	  {
		
			header("location:".SITE_URL('User/dashboard') );
		
	  }
 } 
		public function index()
		{
			if(isset($_SESSION['email']) && !empty($_SESSION['email']))
			{
			$output=$this->output('User/dashboard',array('pageTitle'=>'Dashboard'));
		return $output;
		}
		else
		{
			header("location:".$this->getUrl('User/login'));
		}
		
		
	}
}


?>