<?php
include ('./model/productconnection.php');
class ProductController extends Controller
{
	private $product;
	function __construct()
	{
		$this->product=new product();
	}
	public function addproduct()
	{		
		if(isset($_SESSION['email']) && !empty($_SESSION['email']))
		{
			if(isset($_POST['sub']))
			{
				$_POST['file'] = $this->uplod();
				$this->product->add($_POST);
					//var_dump($_POST);
					//exit();
				
				header("location: ".$this->getUrl('product/listview'));
			
				 
//				echo "insert into mytabl field(id, pname,description) values(".$_POST['id'].",".$_POST['name'].",".$_POST['qty'].")";
			}
			
			$output = $this->outPut('product/addproduct',array('pageTitle'=>'Add New Products'));
			return $output;
		} 
		  else 
		{
		
			header("location: ".$this->getUrl('user/login'));
		
		}
	} 
	
	//naming convention????????? why garments
	public function updateproduct($Pid)
	{
		if(isset($_SESSION['email']) && !empty($_SESSION['email']))
		{
			if(isset($_POST['sub']))
			 {
		        $this->product->update($_POST);
			//var_dump($_POST);
			//exit();
			     header("location: ".$this->getUrl('product/listview'));
	         } 
			 //fetch all data and save in product variable
			$product = $this->product->getProduct($Pid);
			//var_dump($product);
			//exit();	
			$output = $this->outPut('/product/updateproduct',array('product'=>$product, 'pageTitle'=>'Edit Product', 'addLink'=>$this->getUrl('product/addproduct')));
			//
			return $output;
		}
		 else{
			header("location: ".SITE_URL."user/login");}
		 
	}
	
	//set what ?????
	public function deletproduct($id)
	{
		if(isset($_SESSION['email']) && !empty($_SESSION['email']))
		{
			
			$this->product->delete($id);
			header("location: ".$this->getUrl('product/listview'));
		}
		else
		{
			header("location: ".SITE_URL."user/login");
			}
	}
	public function listview()
	{
		if(isset($_SESSION['email']) && !empty($_SESSION['email']))
		{
			$var=$this->product->fetchproduct();// there is call the function from productconnection...
			$pagintion = $this->paginate($this->getUrl('product/listview'), $this->product->countAllProducts());
			//fetch all data and save in $var variable
			$output=$this->output('/product/listview',array('products' => $var, 'pageTitle'=>'Manage Product', 'addLink'=> $this->getUrl('product/addproduct'),'AddText'=>'Add new', 'pagination'=>$pagintion));
			
			return $output;
		}
		else
		{
			
			header("location: ".SITE_URL."user/login");
		}
	}
	
	
	public function uplod()
	{
		
		
		
				
				 
				 $_fname=$_FILES['file']['name'];
				 $_ftemp=$_FILES['file']['tmp_name'];
				 $store=UPLOAD_PATH."/upload/".$_fname;
				 $filename = FRONTEND_URL."upload/".$_fname;
		// var_dump($store);
		//exit();
				 move_uploaded_file($_ftemp,$store);
			 
				 return $filename;
		
		
		}
		
	public function searchproduct()
	{
		$pagination = '';
		if(isset($_GET['search']))
		{
			$Aproduct=$this->product->search($_GET);
			$queryS = isset($_GET['search']) ? '?search='.$_GET['search'] : '';
			$pagination = $this->paginate($this->getUrl('product/searchproduct'.$queryS), $this->product->countAllProducts($_GET));
		}
		$output=$this->output('product/searchproduct',array('aPRODUCT'=>$Aproduct, 'pageTitle'=>'Search Product', 'pagination'=>$pagination));
		return $output;
		
	}	
		public function findproduct()
		{
			$output=$this->output('product/findproduct',array('pageTitle'=>'Search Product'));
			return $output;
			
			
			}

}
?>