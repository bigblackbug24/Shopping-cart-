<?php 
include ('./model/categaries_connection.php');
class CategariesController extends Controller
{
	private $categaries;
	function __construct()
	 {
		$this->categaries=new categaries();
		
		}

	public function addcategaries()
	{
		if(isset($_SESSION['email']) && !empty($_SESSION['email']))
		{
			if(isset($_POST['sub']))
			{ 
			//echo 'heloo usamn';
				$this->categaries->add($_POST);
				header("location:".$this->getUrl('categaries/Clistview'));
			}
			$output=$this->output('categaries/addcategaries',array('pageTitle'=>'Add New Category'));
			return $output;
		}
		else
		{
			header("location:" .$this->getUrl('user/login'));
		}	
	}
	
	public function updatecategaries($Cid)
	{
		if(isset($_SESSION['email']) && !empty($_SESSION['email']))
		{
			if(isset($_POST['sub']))
			{
				$this->categaries->update($_POST);
				header("location:".$this->getUrl('categaries/Clistview'));
			}
			$categaries=$this->categaries->get($Cid);
			
			$output=$this->output('categaries/updatecategaries',array('categories'=> $categaries, 'pageTitle'=>'Edit Category'));
			return $output;
		}
			else
			{
				header("location:".$this->getUrl('user/login'));
	
			}
	}
	//delete spelling mistake
	public function deletecategaries($var)
	{
		if(isset($_SESSION['email']) && !empty($_SESSION['email']))
		{
			
			$this->categaries->delete($var);
			header("location: ".$this->getUrl('categaries/Clistview'));
		}
		else
		{
			//use helper function to get basic url. when sy
			header("location:".$this->getUrl('user/login'));
		}
	}
	public function Clistview()
	{
		if(isset($_SESSION['email']) && !empty($_SESSION['email']))
		{
			$Cvar=$this->categaries->fetch();
			$pagination = $this->paginate($this->getUrl('categaries/ClistView'), $this->categaries->countCategories());
			$output=$this->output('categaries/Clistview', array('categories' => $Cvar, 'pageTitle'=>'Mange Categories', 'pagination'=>$pagination));
		    return $output;
		}
		else
		{
			header("location:".$this->getUrl('user/login'));
		}
	}
}
?>
