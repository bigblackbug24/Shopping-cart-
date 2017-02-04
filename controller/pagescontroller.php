<?php 
include ('./model/pagesconnection.php');
class pagescontroller extends controller
{
	private $pages;
	
      function __construct()
	{
		$this->pages=new pages();
	}
	public function contactus()
	{
		if(isset($_SESSION['email']) && !empty($_SESSION['email']))
		{
			if(isset($_POST['sub']))
			{
				$this->pages->contactus($_POST);
			   header("location:" .$this->getUrl ('pages/plistview'));
			}
 		$output=$this->output('pages/contactus',array('pageTitle'=>'Contact us'));
		return $output;
		}
		else
		{
			header("location:" .$this->getUrl('user/login'));
		}
	}
	
	
	
	public function plistview()
	{
		if(isset($_SESSION['email']) && !empty($_SESSION['email']))
		{
			
			$list=$this->pages->listview($_POST);
			$pagination = $this->paginate($this->getUrl('pages/plistview'), $this->pages->countAllPages());   
			
 			$output=$this->output('pages/plistview',array('LIST'=>$list,'pageTitle'=>'List', 'pagination'=>$pagination));
			return $output;
		}
		else
		{
			header("location:" .$this->getUrl('user/login'));
		}
	}

	public function detail($val)
	{
		
		if(isset($_SESSION['email']) && !empty($_SESSION['email']))
		{
			
		if(isset($_POST['sub']))
		{
			mail ( $to , $subject ,  $message,$from  );
			
		}
			
				$detail=$this->pages->detail($val);
		
		$output=$this->output('pages/detail',array('DETAIL'=>$detail,'pageTitle'=>'detail'));
	return $output;
		}
		
		else
		{
			header("location:" .$this->getUrl('user/login'));
		}
	}
	
}

		
		 